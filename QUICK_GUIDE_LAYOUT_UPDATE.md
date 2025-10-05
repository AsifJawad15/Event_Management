# Quick Guide: Updating Frontend Pages to Use Common Layout

## Step-by-Step Instructions

### For Each Frontend Page (e.g., speakers.blade.php, blog.blade.php, etc.):

#### BEFORE (Old Structure):
```blade
<!doctype html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="...">
    <!-- Individual CSS files -->
</head>
<body>
    <!-- Individual navigation code -->
    <div class="navbar">...</div>
    
    <!-- Page content -->
    <div class="container">
        Your content here
    </div>
    
    <!-- Individual footer code -->
    <footer>...</footer>
    
    <!-- Individual script files -->
    <script src="..."></script>
</body>
</html>
```

#### AFTER (New Structure):
```blade
@extends('front.layout.master')

@section('title', 'Page Title')

@section('main_content')
    <!-- Only your page-specific content -->
    <div class="container">
        Your content here
    </div>
@endsection
```

---

## What Gets Removed

Remove all these from individual pages:
- ❌ `<!doctype html>`
- ❌ `<html>` tag
- ❌ `<head>` section
- ❌ CSS file includes
- ❌ Navigation code
- ❌ Footer code
- ❌ JavaScript file includes
- ❌ `<body>` tag

## What Gets Kept

Keep only:
- ✅ Page-specific content
- ✅ Page-specific variables/data
- ✅ Blade directives (@foreach, @if, etc.)
- ✅ Dynamic content from controllers

---

## Example Conversion

### Example 1: Speakers Page

**BEFORE:**
```blade
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Speakers</title>
    <link href="{{ asset('dist-front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist-front/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <a href="/">Home</a>
        <a href="/speakers">Speakers</a>
    </div>
    
    <div class="speaker-section">
        <h1>Our Speakers</h1>
        @foreach($speakers as $speaker)
            <div class="speaker-card">
                <img src="{{ asset('uploads/'.$speaker->photo) }}">
                <h2>{{ $speaker->name }}</h2>
            </div>
        @endforeach
    </div>
    
    <footer>
        <p>Copyright 2025</p>
    </footer>
    
    <script src="{{ asset('dist-front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/bootstrap.min.js') }}"></script>
</body>
</html>
```

**AFTER:**
```blade
@extends('front.layout.master')

@section('title', 'Speakers - Event Conference')

@section('main_content')
    <div class="speaker-section">
        <h1>Our Speakers</h1>
        @foreach($speakers as $speaker)
            <div class="speaker-card">
                <img src="{{ asset('uploads/'.$speaker->photo) }}">
                <h2>{{ $speaker->name }}</h2>
            </div>
        @endforeach
    </div>
@endsection
```

---

### Example 2: Contact Page with Custom JavaScript

**BEFORE:**
```blade
<!doctype html>
<html>
<head>
    <title>Contact Us</title>
    <link href="..." rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    
    <div class="contact-section">
        <form id="contactForm">
            <input type="text" name="name">
            <input type="email" name="email">
            <button type="submit">Send</button>
        </form>
    </div>
    
    <!-- Footer -->
    
    <script src="..."></script>
    <script>
        $('#contactForm').submit(function(e) {
            // Custom validation
        });
    </script>
</body>
</html>
```

**AFTER:**
```blade
@extends('front.layout.master')

@section('title', 'Contact Us - Event Conference')

@section('main_content')
    <div class="contact-section">
        <form id="contactForm">
            <input type="text" name="name">
            <input type="email" name="email">
            <button type="submit">Send</button>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    $('#contactForm').submit(function(e) {
        // Custom validation
    });
</script>
@endsection
```

---

### Example 3: Page with Custom CSS

**AFTER:**
```blade
@extends('front.layout.master')

@section('title', 'Custom Page')

@section('styles')
<style>
    .custom-section {
        background: #f8f9fa;
        padding: 50px 0;
    }
</style>
@endsection

@section('main_content')
    <div class="custom-section">
        Your custom content
    </div>
@endsection
```

---

## Pages to Update

Update these frontend blade files:

### In `resources/views/front/`:
- [ ] home.blade.php
- [ ] speakers.blade.php
- [ ] schedule.blade.php
- [ ] pricing.blade.php
- [ ] blog.blade.php
- [ ] blog_detail.blade.php
- [ ] sponsors.blade.php
- [ ] sponsor_detail.blade.php
- [ ] organisers.blade.php
- [ ] organiser_detail.blade.php
- [ ] accommodations.blade.php
- [ ] photo_gallery.blade.php
- [ ] video_gallery.blade.php
- [ ] faq.blade.php
- [ ] testimonials.blade.php
- [ ] contact.blade.php
- [ ] term.blade.php
- [ ] privacy.blade.php

### User Dashboard Pages (in `resources/views/user/` or `resources/views/attendee/`):
- [ ] dashboard.blade.php
- [ ] profile.blade.php
- [ ] tickets.blade.php
- [ ] messages.blade.php

---

## Testing Checklist

After updating each page:

1. **Visual Check:**
   - [ ] Navigation appears at top
   - [ ] Footer appears at bottom
   - [ ] Logo shows correctly
   - [ ] Theme color applied

2. **Functionality Check:**
   - [ ] All links work
   - [ ] Forms submit correctly
   - [ ] Modals/popups work
   - [ ] JavaScript features work

3. **Responsive Check:**
   - [ ] Mobile menu works
   - [ ] Layout looks good on mobile
   - [ ] Layout looks good on tablet

4. **Performance Check:**
   - [ ] Page loads quickly
   - [ ] No console errors
   - [ ] Images load correctly

---

## Common Issues & Solutions

### Issue 1: "Undefined variable $setting_data"
**Solution:** Make sure you cleared the cache:
```bash
php artisan config:clear
php artisan view:clear
php artisan cache:clear
```

### Issue 2: "Logo/Favicon not showing"
**Solution:** 
1. Check if files exist in `public/uploads/`
2. Go to Admin > Settings and upload logo/favicon
3. Check file permissions

### Issue 3: "Theme color not applying"
**Solution:**
1. Set theme color in Admin > Settings > Theme Color
2. Enter hex code without # (e.g., "e74c3c" not "#e74c3c")
3. Clear browser cache (Ctrl+Shift+R)

### Issue 4: "Navigation links not working"
**Solution:** 
Check routes in `routes/web.php` match the route names used in nav.blade.php

### Issue 5: "Footer social icons not showing"
**Solution:**
Enter social media URLs in Admin > Settings > Footer
Leave blank if you don't want to show an icon

---

## Verification Command

To verify all layout files exist:
```bash
dir resources\views\front\layout
```

Should show:
- master.blade.php
- nav.blade.php
- scripts.blade.php
- sidebar.blade.php
- styles.blade.php

---

## Need Help?

1. Check `FRONTEND_LAYOUT_DOCUMENTATION.md` for detailed documentation
2. Check Laravel logs: `storage/logs/laravel.log`
3. Check browser console for JavaScript errors (F12)
4. Verify database has settings data: `SELECT * FROM settings WHERE id=1;`

---

**Remember:** Always test on a development environment first before deploying to production!
