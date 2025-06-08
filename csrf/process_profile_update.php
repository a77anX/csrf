<?php
// Set security headers
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Content-Security-Policy: default-src 'self'; form-action 'self';");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Authentication required");
}

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method");
}

// Verify request origin
$allowed_origins = ['http://localhost', 'http://localhost:80'];
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
if (!in_array($origin, $allowed_origins) && !empty($origin)) {
    die("Invalid request origin");
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Validate CSRF token
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    // Log the attempt
    error_log("CSRF attack attempt detected from IP: " . $_SERVER['REMOTE_ADDR']);
    die("CSRF Attack detected!");
}

// Validate and sanitize input
if (!isset($_POST['username']) || empty($_POST['username'])) {
    die("Username is required");
}

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
if (strlen($username) < 3 || strlen($username) > 50) {
    die("Username must be between 3 and 50 characters");
}

try {
    // TODO: Add your database connection code here
    // $pdo = new PDO("mysql:host=localhost;dbname=your_database", "username", "password");
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Update user profile in database
    // $stmt = $pdo->prepare("UPDATE users SET username = ? WHERE id = ?");
    // $stmt->execute([$username, $_SESSION['user_id']]);
    
    // Regenerate CSRF token after successful update
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    
    // Redirect to profile page or show success message
    header("Location: profile.php");
    exit();
} catch (PDOException $e) {
    // Log the error and show generic message to user
    error_log("Database error: " . $e->getMessage());
    die("An error occurred while updating your profile. Please try again later.");
}
?>
