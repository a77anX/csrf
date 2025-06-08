<?php
// This page will be vulnerable to clickjacking
// No X-Frame-Options header is set
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vulnerable Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .demo-container {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }
        .demo-box {
            flex: 1;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .vulnerable {
            background: #fff3cd;
            border-color: #ffeeba;
        }
        .protected {
            background: #d4edda;
            border-color: #c3e6cb;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
            cursor: pointer;
        }
        .button:hover {
            background: #0056b3;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            z-index: 1000;
        }
        iframe {
            width: 100%;
            height: 300px;
            border: none;
        }
    </style>
</head>
<body>
    <h1>Clickjacking Attack Demo</h1>
    
    <div class="demo-container">
        <div class="demo-box vulnerable">
            <h2>Vulnerable Page</h2>
            <p>This page can be embedded in an iframe (no X-Frame-Options header)</p>
            <form action="process_profile_update.php" method="post">
                <input type="hidden" name="username" value="hacked">
                <button type="submit" class="button">Update Profile</button>
            </form>
        </div>

        <div class="demo-box protected">
            <h2>Protected Page</h2>
            <p>This page cannot be embedded (has X-Frame-Options: DENY)</p>
            <a href="security_headers_test.php" class="button">View Protected Page</a>
        </div>
    </div>

    <h2>Clickjacking Attack Demo</h2>
    <p>Below is a demonstration of how a malicious site could embed the vulnerable page:</p>
    
    <div style="position: relative; margin: 20px 0;">
        <iframe src="clickjacking_demo.php" id="attackFrame"></iframe>
        <div class="overlay" id="overlay">
            Click here to win a prize!
        </div>
    </div>

    <div class="demo-box">
        <h3>How the Attack Works:</h3>
        <ol>
            <li>The malicious page embeds the vulnerable page in an iframe</li>
            <li>An overlay is placed on top of the iframe</li>
            <li>The overlay looks like a legitimate button or link</li>
            <li>When the user clicks the overlay, they actually click the button in the iframe</li>
            <li>This can lead to unwanted actions being performed</li>
        </ol>

        <h3>How to Prevent:</h3>
        <ul>
            <li>Set X-Frame-Options: DENY header</li>
            <li>Use Content-Security-Policy frame-ancestors directive</li>
            <li>Implement frame-busting JavaScript (though headers are more reliable)</li>
        </ul>

        <h3>Try it yourself:</h3>
        <p>Click the overlay above. You'll see that it triggers the form submission in the iframe.</p>
        <p>Now try to embed the protected page (security_headers_test.php) - it won't work!</p>
    </div>

    <script>
        // This simulates a malicious overlay
        document.getElementById('overlay').addEventListener('click', function(e) {
            e.preventDefault();
            alert('This is what a clickjacking attack looks like! The overlay made you click the button in the iframe.');
        });
    </script>
</body>
</html> 