<?php
// Set all security headers
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Content-Security-Policy: default-src 'self'; form-action 'self';");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Security Headers Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .header-test {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .test-case {
            margin: 15px 0;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 3px;
        }
        .success {
            color: #28a745;
        }
        .failure {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>Security Headers Test Page</h1>
    
    <div class="header-test">
        <h2>Current Security Headers:</h2>
        <div class="test-case">
            <h3>X-Frame-Options: DENY</h3>
            <p>Try to embed this page in an iframe - it should fail</p>
            <code>&lt;iframe src="http://localhost/csrf/security_headers_test.php"&gt;&lt;/iframe&gt;</code>
        </div>

        <div class="test-case">
            <h3>Content-Security-Policy</h3>
            <p>Try to load external resources - they should be blocked</p>
            <code>&lt;script src="https://example.com/script.js"&gt;&lt;/script&gt;</code>
        </div>

        <div class="test-case">
            <h3>X-Content-Type-Options: nosniff</h3>
            <p>Browser won't try to guess file types</p>
            <p>Example: A .txt file with JavaScript won't execute</p>
        </div>

        <div class="test-case">
            <h3>X-XSS-Protection</h3>
            <p>Browser's XSS filter is enabled</p>
            <p>Try: <code>?test=&lt;script&gt;alert(1)&lt;/script&gt;</code></p>
        </div>

        <div class="test-case">
            <h3>Referrer-Policy</h3>
            <p>Click this link to test referrer policy:</p>
            <a href="https://example.com" target="_blank">External Link</a>
            <p>Check the referrer in the network tab</p>
        </div>
    </div>

    <h2>How to Test These Headers:</h2>
    <ol>
        <li>Open Developer Tools (F12)</li>
        <li>Go to Network tab</li>
        <li>Refresh the page</li>
        <li>Click on the main request</li>
        <li>Look at the "Response Headers" section</li>
        <li>You should see all these security headers listed</li>
    </ol>

    <p><a href="profile.php">Back to Profile</a></p>
</body>
</html> 