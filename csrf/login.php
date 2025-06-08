<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Simple login logic for testing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // For testing purposes, accept any username/password
    if (!empty($username) && !empty($password)) {
        $_SESSION['user_id'] = 1; // Simulate user ID
        $_SESSION['username'] = $username;
        header("Location: profile.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CSRF Demo</title>
    <meta http-equiv="Content-Security-Policy" content="default-src 'self' https:; style-src 'self' 'unsafe-inline' https:;">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-xl shadow-lg">
        <!-- Header -->
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Welcome Back
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Please sign in to your account
            </p>
        </div>

        <!-- Login Form -->
        <form class="mt-8 space-y-6" method="post" action="login.php">
            <div class="rounded-md shadow-sm -space-y-px">
                <!-- Username Field -->
                <div>
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" name="username" type="text" required 
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                           placeholder="Username">
                </div>
                <!-- Password Field -->
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required 
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                           placeholder="Password">
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember_me" type="checkbox" 
                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Forgot password?
                    </a>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Lock Icon -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign in
                </button>
            </div>
        </form>

        <!-- Demo Notice -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                Demo: Any username/password will work
            </p>
        </div>

        <!-- Security Notice -->
        <div class="mt-4 p-4 bg-yellow-50 rounded-md border border-yellow-100">
            <div class="flex">
                <div class="flex-shrink-0">
                    <!-- Warning Icon -->
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">
                        Security Notice
                    </h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>
                            This is a demo application. In a real application, you would need to:
                        </p>
                        <ul class="list-disc list-inside mt-1 space-y-1">
                            <li>Use secure password hashing</li>
                            <li>Implement proper authentication</li>
                            <li>Use HTTPS</li>
                            <li>Implement rate limiting</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 