<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Session Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .session-data {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .token {
            word-break: break-all;
            background: #e9ecef;
            padding: 10px;
            border-radius: 3px;
            font-family: monospace;
            margin: 10px 0;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Session Data</h1>
    
    <div class="session-data">
        <h2>Current Session Information:</h2>
        <p><strong>User ID:</strong> <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        
        <h3>CSRF Token:</h3>
        <div class="token">
            <?php echo htmlspecialchars($_SESSION['csrf_token']); ?>
        </div>
        
        <p><small>This token is used to prevent CSRF attacks. It's:</small></p>
        <ul>
            <li>Generated when you log in</li>
            <li>Stored in your session</li>
            <li>Included in forms as a hidden field</li>
            <li>Validated on the server for each request</li>
        </ul>
    </div>

    <a href="profile.php" class="button">Back to Profile</a>
    <a href="update_profile.php" class="button">Update Profile</a>
</body>
</html> 