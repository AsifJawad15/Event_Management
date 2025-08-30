# Laravel 11 Multi-Authentication System

## Event Management System with Multi-Guard Authentication

This project demonstrates a complete **Multi-Authentication System** built with **Laravel 11**, featuring separate authentication guards for **Admin** and **User** roles with different database tables and middleware protection.

## 🚀 Features

### Authentication System
- **Multi-Guard Authentication** (Admin & User)
- **Multi-Table Authentication** (separate tables for admins and users)
- **Email Verification** for user registration
- **Password Reset** functionality for both admin and users
- **Middleware Protection** for routes
- **Session Management** with proper logout functionality

### Admin Features
- Admin login/logout system
- Admin dashboard
- Password reset via email
- Protected admin routes with middleware

### User Features
- User registration with email verification
- User login/logout system
- User dashboard
- Password reset via email
- Protected user routes with middleware

### Front-end
- Clean, simple interface
- Responsive design
- Error handling and validation messages
- Success/failure notifications

## 📋 Requirements

- PHP >= 8.2
- Composer
- Laravel 11
- MySQL/SQLite Database
- Mail server configuration (for email features)

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/AsifJawad15/Event_Management.git
   cd Event_Management
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   - Update your `.env` file with database credentials
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run Migrations & Seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Mail Configuration (Optional)**
   - Configure your mail settings in `.env` for email features
   ```env
   MAIL_MAILER=smtp
   MAIL_HOST=your_smtp_host
   MAIL_PORT=587
   MAIL_USERNAME=your_email
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=tls
   ```

7. **Start the application**
   ```bash
   php artisan serve
   ```

## 🎯 Usage

### Default Admin Credentials
- **Email:** admin@gmail.com
- **Password:** 1234

### Access Points

#### Front-end Routes
- **Home:** `http://127.0.0.1:8000/`
- **About:** `http://127.0.0.1:8000/about`
- **User Login:** `http://127.0.0.1:8000/login`
- **User Register:** `http://127.0.0.1:8000/register`

#### Admin Routes
- **Admin Login:** `http://127.0.0.1:8000/admin/login`
- **Admin Dashboard:** `http://127.0.0.1:8000/admin/dashboard` (Protected)
- **Admin Forget Password:** `http://127.0.0.1:8000/admin/forget-password`

#### User Routes
- **User Dashboard:** `http://127.0.0.1:8000/dashboard` (Protected)
- **User Forget Password:** `http://127.0.0.1:8000/forget_password`

## 🏗️ Project Structure

### Authentication Guards
```php
// config/auth.php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
],
```

### Middleware
- **User Middleware:** Protects user routes using `web` guard
- **Admin Middleware:** Protects admin routes using `admin` guard

### Database Tables
- **users:** Store user data with email verification
- **admins:** Store admin data
- **password_reset_tokens:** Handle password reset tokens
- **sessions:** Manage user sessions

## 🔧 Key Components

### Models
- `User.php` - User model with MustVerifyEmail interface
- `Admin.php` - Admin model extending Authenticatable

### Controllers
- `FrontController` - Handles front-end pages
- `Admin/AdminController` - Handles admin authentication and dashboard
- `User/UserController` - Handles user authentication and dashboard

### Middleware
- `Admin.php` - Protects admin routes
- `User.php` - Protects user routes

### Mail
- `Websitemail.php` - Handles email sending for verification and password reset

## 🔐 Security Features

- **CSRF Protection** on all forms
- **Input Validation** for all requests
- **Password Hashing** using Laravel's Hash facade
- **Email Verification** for user accounts
- **Token-based Password Reset** system
- **Middleware Protection** for authenticated routes

## 🚧 Development

### Running Tests
```bash
php artisan test
```

### Clearing Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📞 Support

If you encounter any issues or have questions, please create an issue in the GitHub repository.

---

**Built with ❤️ using Laravel 11**

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
