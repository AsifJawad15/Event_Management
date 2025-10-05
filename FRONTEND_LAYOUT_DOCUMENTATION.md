# Frontend Layout Structure Implementation

## Overview
This document describes the common layout structure implemented across all frontend pages.

## Layout Files Created

### 1. **master.blade.php** (Main Layout File)
**Location:** `resources/views/front/layout/master.blade.php`

**Purpose:** This is the main template file that all frontend pages will extend.

**Features:**
- Dynamic favicon from settings (`$setting_data->favicon`)
- Dynamic theme color CSS (applies to 20+ CSS selectors)
- Includes navigation, footer, styles, and scripts
- Newsletter subscription form in footer
- Dynamic footer content (address, email, phone, social media links)
- Dynamic copyright text
- Toast notifications (iziToast) for success/error messages

**Usage in Pages:**
```blade
@extends('front.layout.master')

@section('title', 'Page Title')

@section('main_content')
    <!-- Your page content here -->
@endsection
```

---

### 2. **nav.blade.php** (Navigation Header)
**Location:** `resources/views/front/layout/nav.blade.php`

**Features:**
- Dynamic logo from settings (`$setting_data->logo`)
- Responsive Bootstrap navigation
- Main menu items: Home, Speakers, Schedule, Pricing, Blog
- Dropdown menu (Pages): Sponsors, Organizers, Accommodations, Photo Gallery, Video Gallery, FAQ, Testimonials
- Contact link
- User authentication check (shows Dashboard or Login button)

**Routes Used:**
- `front.home` - Home page
- `front.speakers` - Speakers listing
- `front.schedule` - Event schedule
- `front.pricing` - Pricing/tickets
- `front.blog` - Blog listing
- `front.sponsors` - Sponsors page
- `front.organisers` - Organizers page
- `front.accommodations` - Accommodations listing
- `front.photo_gallery` - Photo gallery
- `front.video_gallery` - Video gallery
- `front.faq` - FAQ page
- `front.testimonials` - Testimonials
- `front.contact` - Contact page
- `user.dashboard` - User dashboard (authenticated users)
- `login` - Login page (guests)

---

### 3. **styles.blade.php** (CSS Includes)
**Location:** `resources/views/front/layout/styles.blade.php`

**CSS Files Included:**
- `animate.css` - Animation library
- `bootstrap.min.css` - Bootstrap framework
- `font-awesome.min.css` - Icon library
- `magnific-popup.css` - Popup/lightbox
- `owl.carousel.min.css` - Carousel slider
- `iziToast.min.css` - Toast notifications
- `global.css` - Global styles
- `style.css` - Main stylesheet
- `responsive.css` - Responsive design
- `spacing.css` - Spacing utilities

---

### 4. **scripts.blade.php** (JavaScript Includes)
**Location:** `resources/views/front/layout/scripts.blade.php`

**JavaScript Files Included:**
- jQuery 3.3.1
- Popper.js (Bootstrap dependency)
- Bootstrap 4
- jQuery Easing
- Modernizr
- jQuery Appear
- jQuery CountTo
- Magnific Popup
- Owl Carousel
- jQuery Countdown
- jQuery ScrollTo
- Typed.js
- iziToast
- custom.js

**Dynamic Features:**
- Event countdown timer (reads from `HomeBanner` model)
- Countdown automatically initializes if banner data exists

---

### 5. **sidebar.blade.php** (User Dashboard Sidebar)
**Location:** `resources/views/front/layout/sidebar.blade.php`

**Purpose:** Used in user dashboard pages for navigation

**Menu Items:**
- Dashboard (`user.dashboard`)
- My Tickets (`attendee.tickets`)
- Messages (`user.message`)
- Profile (`user.profile`)
- Logout (`logout`)

**Features:**
- Active state highlighting using `Route::is()`
- Bootstrap list-group styling

---

## Settings System Integration

### AppServiceProvider Configuration
**File:** `app/Providers/AppServiceProvider.php`

The `$setting_data` variable is shared globally across all views via the AppServiceProvider:

```php
public function boot(): void
{
    Paginator::useBootstrap();
    
    $setting = Setting::where('id', 1)->first();
    
    // If no setting exists, create a default one
    if (!$setting) {
        $setting = Setting::create([
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'banner' => 'banner.jpg',
            'ticket_purchase_expire_date' => '2025-12-31',
            'theme_color' => 'e74c3c',
            'copyright' => '© 2025 Event Management. All Rights Reserved.',
        ]);
    }
    
    View::share('setting_data', $setting);
}
```

### Settings Available in All Views
- `$setting_data->logo` - Site logo
- `$setting_data->favicon` - Site favicon
- `$setting_data->banner` - Banner image
- `$setting_data->theme_color` - Primary theme color (hex without #)
- `$setting_data->copyright` - Copyright text
- `$setting_data->footer_address` - Footer address
- `$setting_data->footer_email` - Footer email
- `$setting_data->footer_phone` - Footer phone
- `$setting_data->footer_facebook` - Facebook URL
- `$setting_data->footer_twitter` - Twitter URL
- `$setting_data->footer_linkedin` - LinkedIn URL
- `$setting_data->footer_instagram` - Instagram URL
- `$setting_data->ticket_purchase_expire_date` - Ticket expiration date

---

## Dynamic Theme Color

The theme color is applied to 20+ CSS selectors including:
- Buttons (backgrounds and hover states)
- Links
- Icons
- Section headings
- Counters
- Testimonial icons
- Contact form elements
- User sidebar active states
- Footer subscribe button
- Schedule tabs
- And more...

The theme color is injected as inline CSS in the `<style>` tag within the `<head>` section of master.blade.php.

---

## Footer Features

### Newsletter Subscription
- Form action: `route('subscribe_submit')`
- Email validation required
- Submit button styled with theme color

### Footer Links
- **Links Column:** Home, Sponsors, Speakers, Organizers
- **Pages Column:** Terms of Use, Privacy Policy, Schedule, Contact Us
- **Contact Column:** Address, Email, Phone (only shown if data exists)
- **Social Media Icons:** Facebook, Twitter, LinkedIn, Instagram (only shown if URLs exist)
- **Newsletter Column:** Email subscription form

### Dynamic Copyright
- Displays copyright text from settings
- Centered in footer-bottom section

---

## How to Use This Layout

### Step 1: Extend the Master Layout
In any frontend blade file (e.g., `home.blade.php`, `speakers.blade.php`), add:

```blade
@extends('front.layout.master')
```

### Step 2: Define the Page Title
```blade
@section('title', 'Your Page Title')
```

### Step 3: Add Your Content
```blade
@section('main_content')
    <div class="container">
        <h1>Your Page Content Here</h1>
        <!-- Your HTML here -->
    </div>
@endsection
```

### Step 4: (Optional) Add Custom CSS
```blade
@section('styles')
    <style>
        /* Your custom CSS */
    </style>
@endsection
```

### Step 5: (Optional) Add Custom JavaScript
```blade
@section('scripts')
    <script>
        // Your custom JavaScript
    </script>
@endsection
```

---

## Example Page Implementation

```blade
@extends('front.layout.master')

@section('title', 'Speakers - Event Conference')

@section('main_content')
<div class="static-banner-detail">
    <div class="banner-fixed"></div>
    <div class="container">
        <h1 class="page-title">Our Speakers</h1>
        <p class="page-subtitle">Meet our amazing speakers</p>
    </div>
</div>

<div class="speaker-section pt_70 pb_70">
    <div class="container">
        <div class="row">
            @foreach($speakers as $speaker)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="speaker-box">
                    <img src="{{ asset('uploads/'.$speaker->photo) }}" alt="{{ $speaker->name }}">
                    <h2>{{ $speaker->name }}</h2>
                    <p>{{ $speaker->designation }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
```

---

## Routes Summary

### Frontend Routes (Prefix: `front.`)
- home - `/`
- about - `/about`
- speakers - `/speakers`
- speaker - `/speaker/{slug}`
- schedule - `/schedule`
- pricing - `/pricing`
- blog - `/blog`
- sponsors - `/sponsors`
- organisers - `/organisers`
- accommodations - `/accommodations`
- photo_gallery - `/photo-gallery`
- video_gallery - `/video-gallery`
- faq - `/faq`
- testimonials - `/testimonials`
- contact - `/contact`
- term - `/terms`
- privacy - `/privacy`

### User Routes (Authenticated)
- user.dashboard - `/dashboard`
- user.profile - `/profile`
- user.message - `/my-messages`
- attendee.tickets - `/my-tickets`
- attendee.invoice - `/ticket-invoice/{id}`

### Authentication Routes
- login - Login page
- logout - Logout action

---

## Next Steps

1. **Update All Frontend Pages** - Make sure all frontend blade files extend `front.layout.master`
2. **Test Settings** - Upload logo, favicon, and set theme color in admin panel
3. **Verify Routes** - Ensure all navigation links work correctly
4. **Test Responsive Design** - Check mobile/tablet views
5. **Test User Dashboard** - Verify sidebar navigation for logged-in users
6. **Test Newsletter** - Verify subscription form works

---

## Cache Commands

After making changes to views or configuration, run:

```bash
php artisan config:clear
php artisan view:clear
php artisan cache:clear
```

---

## File Locations Summary

```
resources/views/front/layout/
├── master.blade.php    (Main layout)
├── nav.blade.php       (Navigation header)
├── styles.blade.php    (CSS includes)
├── scripts.blade.php   (JavaScript includes)
└── sidebar.blade.php   (User dashboard sidebar)

app/Providers/
└── AppServiceProvider.php (Global settings configuration)

routes/
└── web.php (All route definitions)

app/Models/
└── Setting.php (Settings model)
```

---

## Support

If you encounter any issues:
1. Check browser console for JavaScript errors
2. Check Laravel logs: `storage/logs/laravel.log`
3. Verify all routes are defined in `routes/web.php`
4. Ensure settings data exists in database (check `settings` table)
5. Clear cache using artisan commands above

---

**Last Updated:** {{ date('Y-m-d') }}
**Laravel Version:** 10.x
**Bootstrap Version:** 4.x
