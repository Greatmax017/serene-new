# Contact Form Implementation

## Overview
The contact form on the website now sends emails to **amen@serenetouchcareservices.co.uk** using a PHP handler.

## Files Created/Modified

### 1. **contact-form-handler.php** (New)
- Located in the root directory
- Handles form submission and sends emails
- Includes validation and sanitization
- Redirects back to the contact page with success/error messages

### 2. **contact-us/index.html** (Modified)
- Updated form action to point to the PHP handler
- Updated field names for proper processing
- Added success/error message display area
- Added JavaScript to show success/error messages

## Form Fields
The form collects the following information:
- **Name** (required)
- **Email** (required)
- **Phone** (optional)
- **Subject** (optional)
- **Message** (required)

## Server Requirements

### PHP Mail Configuration
The form uses PHP's built-in `mail()` function. Your server must have:
1. PHP installed (version 5.4 or higher recommended)
2. Mail function enabled in php.ini
3. A properly configured mail server (SMTP)

### For Production Deployment
If the PHP `mail()` function doesn't work on your server, you may need to:

1. **Use PHPMailer** (recommended for better reliability):
   ```bash
   composer require phpmailer/phpmailer
   ```

2. **Update contact-form-handler.php** to use PHPMailer:
   ```php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
   require 'vendor/autoload.php';
   
   $mail = new PHPMailer(true);
   // Configure SMTP settings
   ```

3. **Configure SMTP settings** with your hosting provider's details

## Testing

### Local Testing
If testing locally, you may need:
- A local mail server (like MailHog or Mailcatcher)
- Or configure SMTP settings

### Production Testing
1. Upload all files to your web server
2. Ensure PHP is enabled
3. Visit the contact page: `/contact-us/`
4. Fill out and submit the form
5. Check the inbox at amen@serenetouchcareservices.co.uk

## Security Features
- Input sanitization to prevent XSS attacks
- Email validation
- CSRF protection through POST-only requests
- No direct PHP file access (redirects if accessed directly)

## Troubleshooting

### Emails Not Being Sent
1. Check if PHP mail function is enabled: Create a test file with `<?php phpinfo(); ?>`
2. Check server error logs for mail-related errors
3. Verify SPF/DKIM records are configured for your domain
4. Contact your hosting provider about mail configuration
5. Consider using an SMTP service (like SendGrid, Mailgun, or AWS SES)

### Form Not Submitting
1. Check browser console for JavaScript errors
2. Verify file paths are correct
3. Ensure PHP files have proper permissions (644 for files, 755 for directories)

## Alternative Email Services

If the built-in mail function doesn't work, consider:
1. **SendGrid** - Free tier available, reliable delivery
2. **Mailgun** - Good for transactional emails
3. **AWS SES** - Cost-effective for high volume
4. **SMTP2GO** - Easy setup

## Support
For issues or questions, contact your web developer or hosting provider.

