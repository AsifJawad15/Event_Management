# Contact Form Configuration Guide

## Email Setup with Mailtrap

The contact form is now configured to send emails to the admin using Mailtrap.io sandbox.

### Current Configuration (.env)
```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=fa05d66845bdf2
MAIL_PASSWORD=6701b4781948cf
MAIL_FROM_ADDRESS="asif@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### How It Works

1. **User submits contact form** → Form validation
2. **Email sent to admin** → Goes to Mailtrap inbox (not real email)
3. **Admin reads email** → Login to https://mailtrap.io to view messages

### Testing the Contact Form

1. Go to: `http://your-domain/contact`
2. Fill in the form (all fields required)
3. Click "Send Message"
4. Success message will appear
5. Check Mailtrap inbox at: https://mailtrap.io

### Email Content

The email sent to admin includes:
- Sender's name
- Sender's email (clickable)
- Subject
- Message content
- Timestamp and source info

### Routes

- **GET** `/contact` → Display contact page
- **POST** `/contact` → Submit contact form (route name: `contact.submit`)

### Controller Methods

**FrontController.php**:
- `contact()` → Shows contact page with contact info
- `contact_submit()` → Processes form and sends email

### Features

✅ Dark theme matching home page
✅ Form validation with error messages
✅ Success/error flash messages
✅ Email sent to admin via Mailtrap
✅ Beautiful email template with HTML formatting
✅ Responsive design
✅ Single navigation bar (dark-nav)
✅ Contact info cards with icons
✅ Google Maps integration (if configured)

### Admin Email Setup

The email is sent to the first admin in the database. Make sure:
1. Admin record exists in `admins` table
2. Admin has a valid email address
3. Check admin email with: `SELECT email FROM admins WHERE id = 1;`

### Mailtrap Dashboard

Login to view test emails:
- URL: https://mailtrap.io
- Check your inbox to see all contact form submissions
- Emails won't go to real inboxes (sandbox mode)

### For Production

When going live, replace Mailtrap settings with real SMTP:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com  # or your SMTP server
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="Your Event Name"
```

### Troubleshooting

If emails don't send:
1. Check `storage/logs/laravel.log` for errors
2. Verify admin email exists in database
3. Clear config cache: `php artisan config:clear`
4. Test Mailtrap credentials are correct
5. Check Mailtrap inbox quotas

---
**Last Updated**: October 18, 2025
