# 🎟️ Evento - Professional Event Management System

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

A comprehensive, feature-rich event management platform built with Laravel 12, designed for organizing conferences, seminars, workshops, and large-scale events with integrated ticketing and payment solutions.

[Features](#-key-features) • [Installation](#-installation) • [Usage](#-usage) • [Documentation](#-documentation) • [Contributing](#-contributing)

</div>

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Key Features](#-key-features)
- [Technology Stack](#-technology-stack)
- [System Requirements](#-system-requirements)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [API Endpoints](#-api-endpoints)
- [Payment Integration](#-payment-integration)
- [Testing](#-testing)
- [Deployment](#-deployment)
- [Contributing](#-contributing)
- [License](#-license)
- [Support](#-support)

---

## 🌟 Overview

**Evento** is a modern, full-featured event management system built on Laravel 12.x framework. It provides an end-to-end solution for event organizers to manage complex events, handle ticket sales with multiple payment gateways, coordinate speakers and schedules, and provide attendees with a seamless registration and participation experience.

The platform is designed with scalability, security, and user experience in mind, making it suitable for:
- Corporate conferences and summits
- Academic workshops and seminars
- Trade shows and exhibitions
- Community meetups and networking events
- Virtual and hybrid events

### 🎯 Project Highlights

- **Multi-Event Support**: Manage multiple events simultaneously with dedicated event pages
- **Real-time Dashboard**: Comprehensive admin dashboard with analytics and insights
- **Responsive Design**: Mobile-first approach with Tailwind CSS for optimal user experience
- **SEO Optimized**: Built-in SEO features with slug generation and meta tags
- **Email Notifications**: Automated email system for registrations, confirmations, and updates
- **Content Management**: Built-in blog and FAQ system for event-related content

---

## 🚀 Key Features

### 👥 User Management
- **Multi-role System**: Separate interfaces for administrators, organizers, and attendees
- **Secure Authentication**: Email verification, password reset, and secure login system
- **User Dashboard**: Personalized dashboard for ticket management and event history
- **Profile Management**: Users can update their profiles and manage communication preferences

### 🎪 Event Management
- **Comprehensive Event Details**: Name, description, location, venue, dates, times, and more
- **Event Status Control**: Draft, published, upcoming, ongoing, and completed states
- **Featured Events**: Highlight important events on the homepage
- **Auto-generated Slugs**: SEO-friendly URLs for all events
- **Banner & Thumbnails**: Visual representation with image uploads
- **Capacity Management**: Set maximum attendees and track registrations
- **Event Tags**: Categorize and organize events efficiently
- **Organizer Information**: Display organizer details with contact information

### 🎫 Advanced Ticketing System
- **Multiple Package Types**: Create various ticket packages with different pricing tiers
- **Package Facilities**: Define features included in each ticket package
- **Dynamic Pricing**: Flexible pricing structure for different attendee categories
- **Ticket Limits**: Set maximum tickets per package to control capacity
- **Ticket Status Tracking**: Monitor ticket sales, approvals, and cancellations
- **Invoice Generation**: Automatic PDF invoice creation for purchases
- **Digital Tickets**: Email delivery of ticket confirmations

### 💳 Payment Integration
- **Multiple Payment Gateways**:
  - **bKash**: Bangladesh's leading mobile payment solution
  - **Nagad**: Digital payment system with API integration
  - **Bank Transfer**: Manual verification system for bank payments
- **Payment Status Tracking**: Real-time payment status updates
- **Transaction Management**: Complete transaction history and audit trail
- **Secure Processing**: PCI-compliant payment handling
- **Multi-currency Support**: Configure different currencies
- **Payment Notifications**: Automated email confirmations

### 📅 Schedule & Speaker Management
- **Multi-day Schedules**: Organize events spanning multiple days
- **Session Management**: Create detailed session schedules with times and locations
- **Speaker Profiles**: Comprehensive speaker information with photos and bios
- **Speaker-Session Linking**: Associate multiple speakers with sessions
- **Schedule View**: Public-facing schedule with filtering options
- **Time Zone Support**: Handle events across different time zones

### 🤝 Sponsors & Partners
- **Sponsor Categories**: Organize sponsors by tier (Platinum, Gold, Silver, etc.)
- **Sponsor Profiles**: Detailed sponsor pages with logos, descriptions, and links
- **Sponsor Showcase**: Homepage integration for sponsor visibility
- **Media Gallery**: Display sponsor logos and promotional materials

### 🏢 Organizer Management
- **Organizer Profiles**: Detailed information about event organizers
- **Contact Information**: Display organizer contact details
- **Organizer Portfolio**: Showcase past and upcoming events
- **Slug-based URLs**: SEO-friendly organizer profile pages

### 🏨 Accommodation Listing
- **Hotel Integration**: List nearby hotels and accommodation options
- **Pricing Information**: Display room rates and booking details
- **Location Details**: Maps and directions to accommodations
- **Booking Links**: Direct links to hotel booking systems

### 📸 Media Galleries
- **Photo Gallery**: Upload and display event photos in an organized gallery
- **Video Gallery**: Embed videos from YouTube or upload directly
- **Gallery Management**: Admin interface for media organization
- **Responsive Viewing**: Optimized display across all devices

### 📝 Content Management
- **Blog System**: Create and publish event-related blog posts
- **FAQ Section**: Answer common questions with categorized FAQs
- **Custom Pages**: Create terms of service, privacy policy, and contact pages
- **Rich Text Editor**: WYSIWYG editor for content creation
- **Post Categories**: Organize blog content efficiently

### 📧 Communication Tools
- **Newsletter System**: Subscriber management with email verification
- **Bulk Messaging**: Send updates to all subscribers
- **Attendee Messaging**: Direct communication with event participants
- **Email Templates**: Customizable email templates
- **Message History**: Track all communications

### 🎨 Customization & Branding
- **Logo Management**: Upload custom logo and favicon
- **Theme Color Control**: Customize the color scheme
- **Banner Management**: Control homepage and page banners
- **Footer Customization**: Update footer information and links
- **Homepage Sections**: Configure homepage counters, testimonials, and features
- **Settings Panel**: Centralized configuration management

### 📊 Admin Dashboard
- **Event Selection**: Choose which event to manage
- **Analytics Overview**: View ticket sales, revenue, and attendee statistics
- **Attendee Management**: View and manage all registered attendees
- **Ticket Approval**: Approve or reject ticket purchases (for manual review)
- **Message Center**: Respond to attendee inquiries
- **User Management**: Manage user accounts and permissions

### 🔒 Security Features
- **CSRF Protection**: Laravel's built-in CSRF protection
- **SQL Injection Prevention**: Eloquent ORM with prepared statements
- **XSS Protection**: Input sanitization and output escaping
- **Authentication Middleware**: Route protection for sensitive areas
- **Password Encryption**: Bcrypt password hashing
- **Email Verification**: Prevent spam registrations

---

## 🛠️ Technology Stack

### Backend Technologies
- **Framework**: Laravel 12.x (Latest LTS)
- **Language**: PHP 8.2+
- **ORM**: Eloquent ORM
- **Authentication**: Laravel's built-in authentication system
- **Queue Management**: Laravel Queue with Database driver
- **Caching**: Database cache driver (configurable)
- **Session**: Database session driver

### Frontend Technologies
- **CSS Framework**: Tailwind CSS 4.0
- **Build Tool**: Vite 7.0
- **JavaScript**: Vanilla JavaScript with Axios
- **Templating**: Blade Template Engine
- **Icons**: Font Awesome / Custom icons
- **Responsive Design**: Mobile-first approach

### Database
- **Primary**: MySQL / MariaDB
- **Alternative**: SQLite (for development)
- **Migrations**: Laravel migration system
- **Seeders**: Database seeding for testing

### Payment Gateways
- **bKash API**: Bangladesh mobile payment integration
- **Nagad API**: Integration via `xenon/nagad-api` package
- **Bank Transfer**: Manual verification system

### Development Tools
- **Package Manager**: Composer (PHP dependencies)
- **Node Package Manager**: NPM (Frontend dependencies)
- **Testing**: PHPUnit 11.5
- **Debugging**: Laravel Pail for log monitoring
- **Code Quality**: Laravel Pint for code formatting
- **API Testing**: Laravel Tinker
- **Version Control**: Git

### Additional Packages
- **Laravel Tinker**: REPL for Laravel
- **Laravel Sail**: Docker development environment
- **Faker**: Test data generation
- **Mockery**: Mocking framework for testing
- **Collision**: Beautiful error reporting

---

## 💻 System Requirements

### Server Requirements
- **PHP**: 8.2 or higher
- **Composer**: 2.x or higher
- **Node.js**: 18.x or higher (with NPM)
- **Database**: MySQL 8.0+ / MariaDB 10.3+ / PostgreSQL 12+ / SQLite 3.8.8+

### PHP Extensions (Required)
- BCMath PHP Extension
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- Filter PHP Extension
- Hash PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Session PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- GD or Imagick PHP Extension (for image processing)

### Recommended Server Configuration
- **Memory Limit**: 256MB minimum (512MB recommended)
- **Max Execution Time**: 300 seconds
- **Upload Max Filesize**: 20MB minimum
- **Post Max Size**: 25MB minimum

---

## 📦 Installation

### Quick Start

1. **Clone the Repository**
   ```bash
   git clone https://github.com/AsifJawad15/Event_Management.git
   cd Event_Management
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js Dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   # For Windows (CMD)
   copy .env.example .env
   
   # For Windows (PowerShell) or Linux/Mac
   cp .env.example .env
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Configure Database**
   
   Edit the `.env` file and update these values:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=evento_db
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

7. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed Database (Optional)**
   ```bash
   php artisan db:seed
   ```

9. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

10. **Build Frontend Assets**
    ```bash
    # For development
    npm run dev
    
    # For production
    npm run build
    ```

11. **Start Development Server**
    ```bash
    php artisan serve
    ```

12. **Access the Application**
    - Frontend: `http://localhost:8000`
    - Admin Panel: `http://localhost:8000/admin`

### Alternative Installation (Using Laravel Sail)

For Docker-based development environment:

```bash
# Install dependencies using Docker
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

# Start Sail
./vendor/bin/sail up -d

# Run migrations
./vendor/bin/sail artisan migrate

# Build assets
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

---

## ⚙️ Configuration

### Mail Configuration

Update `.env` file for email functionality:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@evento.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Payment Gateway Configuration

#### bKash Configuration
```env
BKASH_APP_KEY=your_app_key
BKASH_APP_SECRET=your_app_secret
BKASH_USERNAME=your_username
BKASH_PASSWORD=your_password
BKASH_BASE_URL=https://checkout.sandbox.bka.sh/v1.2.0-beta
```

#### Nagad Configuration
```env
NAGAD_MODE=sandbox
NAGAD_MERCHANT_ID=your_merchant_id
NAGAD_MERCHANT_NUMBER=your_merchant_number
NAGAD_PUBLIC_KEY=your_public_key
NAGAD_PRIVATE_KEY=your_private_key
```

### Cache Configuration

For production environments, consider using Redis:

```env
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### File Storage Configuration

```env
FILESYSTEM_DISK=local
# For cloud storage (AWS S3)
# AWS_ACCESS_KEY_ID=
# AWS_SECRET_ACCESS_KEY=
# AWS_DEFAULT_REGION=us-east-1
# AWS_BUCKET=
```

---

## 📖 Usage

### Admin Access

1. **Default Admin Login**
   - Navigate to `/admin/login`
   - Use default credentials (set during seeding) or register a new admin
   - Access the admin dashboard

2. **Creating an Event**
   - Go to Admin Dashboard → Events → Create New Event
   - Fill in event details (name, description, dates, location, etc.)
   - Upload banner and thumbnail images
   - Set event status (Draft/Published)
   - Save the event

3. **Managing Tickets**
   - Navigate to Packages section
   - Create ticket packages with pricing
   - Add facilities to each package
   - Set maximum tickets per package
   - Assign packages to events

4. **Adding Speakers**
   - Go to Speakers section
   - Add speaker details (name, bio, photo, social links)
   - Associate speakers with events

5. **Creating Schedule**
   - Navigate to Schedule Days section
   - Create days for multi-day events
   - Add sessions with time slots
   - Link speakers to sessions

### User Experience

1. **Registration**
   - Users can register via `/register`
   - Email verification required
   - Access to user dashboard after verification

2. **Browsing Events**
   - View all events on homepage or `/events`
   - Filter by upcoming, featured, or all events
   - View detailed event information

3. **Purchasing Tickets**
   - Browse available ticket packages
   - Select package and quantity
   - Fill in billing information
   - Choose payment method
   - Complete payment
   - Receive email confirmation with invoice

4. **User Dashboard**
   - View all purchased tickets
   - Access invoices
   - Update profile information
   - Send messages to organizers

---

## 📁 Project Structure

```
evento/
├── app/
│   ├── Console/          # Artisan commands
│   ├── Http/
│   │   ├── Controllers/  # Application controllers
│   │   │   ├── Admin/    # Admin panel controllers
│   │   │   ├── User/     # User authentication controllers
│   │   │   └── FrontController.php  # Main frontend controller
│   │   └── Middleware/   # HTTP middleware
│   ├── Mail/             # Email classes
│   ├── Models/           # Eloquent models (30+ models)
│   └── Providers/        # Service providers
│
├── bootstrap/            # Application bootstrap files
├── config/               # Configuration files
├── database/
│   ├── factories/        # Model factories
│   ├── migrations/       # Database migrations (40+ migrations)
│   └── seeders/          # Database seeders
│
├── public/               # Public assets
│   ├── uploads/          # User uploaded files
│   ├── dist-front/       # Compiled frontend assets
│   └── index.php         # Entry point
│
├── resources/
│   ├── css/              # CSS source files
│   ├── js/               # JavaScript source files
│   └── views/            # Blade templates
│       ├── admin/        # Admin panel views
│       ├── front/        # Frontend views
│       └── user/         # User dashboard views
│
├── routes/
│   ├── web.php           # Web routes (150+ routes)
│   └── console.php       # Console routes
│
├── storage/              # Storage for logs, cache, sessions
├── tests/                # Automated tests
├── vendor/               # Composer dependencies
├── .env.example          # Environment example
├── artisan               # Laravel Artisan CLI
├── composer.json         # PHP dependencies
├── package.json          # Node.js dependencies
└── vite.config.js        # Vite configuration
```

### Key Models

- **Event**: Main event model with relationships
- **Ticket**: Ticket purchases and management
- **Package**: Ticket package definitions
- **PackageFacility**: Features included in packages
- **User**: User authentication and profiles
- **Admin**: Admin user model
- **Speaker**: Speaker profiles and information
- **Schedule**: Event schedule sessions
- **ScheduleDay**: Multi-day event organization
- **Sponsor**: Event sponsors and partners
- **SponsorCategory**: Sponsor tier organization
- **Organiser**: Event organizer information
- **Accommodation**: Hotel listings
- **Photo/Video**: Media gallery models
- **Post**: Blog post management
- **Faq**: Frequently asked questions
- **Message**: User-organizer communication
- **Subscriber**: Newsletter subscriptions
- **Setting**: Site-wide configuration

---

## 🔌 API Endpoints

### Public Routes
- `GET /` - Homepage
- `GET /events` - All events listing
- `GET /event/{slug}` - Single event details
- `GET /speakers` - All speakers
- `GET /speaker/{slug}` - Speaker profile
- `GET /schedule` - Event schedule
- `GET /sponsors` - Sponsors listing
- `GET /blog` - Blog posts
- `GET /post/{slug}` - Single blog post
- `GET /faq` - FAQs
- `POST /subscribe` - Newsletter subscription

### Authenticated Routes
- `GET /dashboard` - User dashboard
- `GET /profile` - User profile
- `POST /profile` - Update profile
- `GET /my-tickets` - User's tickets
- `GET /ticket-invoice/{id}` - View invoice
- `GET /buy-ticket/{id}` - Purchase ticket
- `POST /payment` - Process payment

### Admin Routes (Protected)
All admin routes are prefixed with `/admin` and require authentication:
- `GET /admin/dashboard` - Admin dashboard
- `GET /admin/events` - Manage events
- `GET /admin/speakers` - Manage speakers
- `GET /admin/schedules` - Manage schedules
- `GET /admin/packages` - Manage ticket packages
- `GET /admin/tickets` - View all tickets
- `GET /admin/attendees` - Manage attendees
- `GET /admin/sponsors` - Manage sponsors
- `GET /admin/messages` - View messages
- `GET /admin/subscribers` - Manage subscribers
- `GET /admin/settings` - Site settings

---

## 💰 Payment Integration

### Supported Payment Methods

#### 1. bKash Mobile Banking
- Real-time payment processing
- Automatic payment verification
- Instant ticket confirmation
- Success/Cancel callback handling

#### 2. Nagad Digital Payment
- Secure API integration via `xenon/nagad-api`
- Merchant verification
- Transaction tracking
- Webhook notifications

#### 3. Bank Transfer
- Manual verification workflow
- Admin approval required
- Transaction info submission
- Email confirmation upon approval

### Payment Flow

1. User selects ticket package
2. Fills billing information
3. Chooses payment method
4. Redirected to payment gateway
5. Completes payment
6. Redirected back with status
7. Ticket generated and emailed
8. Admin can verify/approve transaction

---

## 🧪 Testing

### Running Tests

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature

# Run with coverage
php artisan test --coverage

# Run specific test file
php artisan test tests/Feature/EventTest.php
```

### Creating Tests

```bash
# Create feature test
php artisan make:test EventTest

# Create unit test
php artisan make:test EventTest --unit
```

### Test Database

Configure test database in `phpunit.xml`:

```xml
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
```

---

## 🚀 Deployment

### Production Checklist

1. **Environment Configuration**
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   ```

2. **Optimize Application**
   ```bash
   # Cache configuration
   php artisan config:cache
   
   # Cache routes
   php artisan route:cache
   
   # Cache views
   php artisan view:cache
   
   # Optimize autoloader
   composer install --optimize-autoloader --no-dev
   ```

3. **Build Assets**
   ```bash
   npm run build
   ```

4. **Set Permissions**
   ```bash
   # For Linux/Mac
   chmod -R 755 storage bootstrap/cache
   chown -R www-data:www-data storage bootstrap/cache
   ```

5. **Set up Queue Worker**
   ```bash
   # Using Supervisor (recommended)
   php artisan queue:work --daemon
   ```

6. **Configure Web Server**
   
   **Apache (.htaccess)**
   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteRule ^(.*)$ public/$1 [L]
   </IfModule>
   ```
   
   **Nginx**
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```

7. **SSL Certificate**
   - Install SSL certificate (Let's Encrypt recommended)
   - Force HTTPS in .env: `APP_URL=https://yourdomain.com`

8. **Database Backup**
   - Set up automated database backups
   - Configure backup retention policy

---

## 🤝 Contributing

We welcome contributions from the community! Here's how you can help:

### How to Contribute

1. **Fork the Repository**
   ```bash
   git clone https://github.com/AsifJawad15/Event_Management.git
   ```

2. **Create a Feature Branch**
   ```bash
   git checkout -b feature/amazing-feature
   ```

3. **Make Your Changes**
   - Write clean, documented code
   - Follow PSR-12 coding standards
   - Add tests for new features

4. **Commit Your Changes**
   ```bash
   git commit -m "Add amazing feature"
   ```

5. **Push to Branch**
   ```bash
   git push origin feature/amazing-feature
   ```

6. **Open a Pull Request**
   - Provide clear description of changes
   - Reference any related issues
   - Wait for code review

### Code Style

This project follows Laravel coding standards:
- PSR-12 coding standard
- Use Laravel Pint for formatting: `./vendor/bin/pint`
- Write descriptive commit messages
- Add PHPDoc blocks for methods and classes

### Reporting Issues

- Use GitHub Issues for bug reports
- Include steps to reproduce
- Provide system information
- Add screenshots if applicable

---

## 📄 License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details.

```
MIT License

Copyright (c) 2025 Asif Jawad

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
```

---

## 📞 Support

### Getting Help

- **Documentation**: Read this README thoroughly
- **Issues**: [GitHub Issues](https://github.com/AsifJawad15/Event_Management/issues)
- **Discussions**: [GitHub Discussions](https://github.com/AsifJawad15/Event_Management/discussions)
- **Email**: Contact the maintainer through GitHub

### Useful Resources

- [Laravel Documentation](https://laravel.com/docs/12.x)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Vite Documentation](https://vitejs.dev/)
- [MySQL Documentation](https://dev.mysql.com/doc/)

---

## 🙏 Acknowledgments

- Built with ❤️ using [Laravel](https://laravel.com)
- Styled with [Tailwind CSS](https://tailwindcss.com)
- Payment integration by [Xenon](https://github.com/xenon) for Nagad API
- Icons from [Font Awesome](https://fontawesome.com)
- Community contributions and feedback

---

## 📊 Project Status

- **Version**: 1.0.0
- **Status**: Active Development
- **Last Updated**: October 2025
- **Laravel Version**: 12.x
- **PHP Version**: 8.2+

---

<div align="center">

**Made with ❤️ by [Asif Jawad](https://github.com/AsifJawad15)**

⭐ Star this repository if you find it helpful!

[Report Bug](https://github.com/AsifJawad15/Event_Management/issues) · [Request Feature](https://github.com/AsifJawad15/Event_Management/issues) · [Contribute](https://github.com/AsifJawad15/Event_Management/pulls)

</div>
