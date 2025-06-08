# CSRF Protection Demo Application

This is a demonstration application showcasing various security measures against Cross-Site Request Forgery (CSRF) attacks and other web security best practices. The application is built using PHP and includes modern UI design with Tailwind CSS.

## Features

### Security Features
- CSRF Protection using secure tokens
- Session Management
- Security Headers Implementation
- Input Validation and Sanitization
- Origin Validation
- XSS Protection
- Clickjacking Prevention

### Application Features
- User Authentication
- Profile Management
- Session Data Viewing
- Security Status Dashboard
- Interactive CSRF Attack Demonstration
- Security Headers Testing

## Prerequisites

- PHP 7.4 or higher
- XAMPP (or similar local development environment)
- Web browser with modern JavaScript support

## Installation

1. Clone or download this repository to your XAMPP's `htdocs` directory:
   ```
   C:\xampp\htdocs\csrf
   ```

2. Start XAMPP Control Panel and ensure Apache is running

3. Access the application through your web browser:
   ```
   http://localhost/csrf
   ```

## Project Structure

```
csrf/
├── login.php                 # Login page with authentication
├── profile.php              # User profile dashboard
├── update_profile.php       # Profile update form
├── process_profile_update.php # Profile update handler
├── view_session.php         # Session data viewer
├── logout.php              # Logout handler
├── csrf_test.html          # CSRF attack demonstration
├── security_headers_test.php # Security headers testing
├── clickjacking_demo.php    # Clickjacking prevention demo
├── malicious_page.html     # Malicious page simulation
├── normalclick.html        # Normal click demonstration
└── click_malpage.html      # Clickjacking attack simulation
```

## Security Measures

### CSRF Protection
- Implements secure token-based CSRF protection
- Tokens are regenerated after each successful form submission
- Validates request origin and method
- Includes demonstration of CSRF attack attempts

### Security Headers
- Content Security Policy (CSP)
- X-Frame-Options
- X-Content-Type-Options
- X-XSS-Protection
- Referrer-Policy

### Session Security
- Secure session management
- Session validation
- Automatic session timeout
- Protection against session hijacking

### Input Validation
- Server-side input validation
- Input sanitization
- Length and format validation
- Secure error handling

## Testing the Application

### CSRF Protection Test
1. Log in to the application
2. Navigate to the CSRF Protection Test page
3. Follow the interactive demonstration to understand how CSRF protection works

### Security Headers Test
1. Access the Security Headers Test page
2. View the current security headers configuration
3. Test the effectiveness of security measures

### Clickjacking Prevention
1. Visit the Clickjacking Demo page
2. Observe how the application prevents clickjacking attempts
3. Compare normal clicks with malicious click attempts

## Development Notes

### Database Integration
The application includes commented database code in `process_profile_update.php`. To enable database functionality:

1. Create a MySQL database
2. Update the database connection code in `process_profile_update.php`
3. Create the necessary tables for user management

### Security Considerations
- Always keep PHP and all dependencies updated
- Regularly review and update security headers
- Monitor error logs for suspicious activities
- Implement rate limiting for production use
- Use HTTPS in production environment

## Contributing

Feel free to submit issues and enhancement requests!

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments

- Tailwind CSS for the modern UI design
- PHP Security Best Practices community
- OWASP for security guidelines and recommendations
