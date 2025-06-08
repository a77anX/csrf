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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - CSRF Demo</title>
    <meta http-equiv="Content-Security-Policy" content="default-src 'self' https:; style-src 'self' 'unsafe-inline' https:;">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-semibold text-gray-800">CSRF Demo</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <form method="post" action="logout.php" class="inline">
                        <button type="submit" class="text-red-600 hover:text-red-900 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between mb-8 px-4 sm:px-0">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Your Profile
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    View and manage your profile information
                </p>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Profile Information Card -->
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="space-y-6">
                        <!-- User Information -->
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                Profile Information
                            </h3>
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">User ID</dt>
                                    <dd class="mt-1 text-sm text-gray-900"><?php echo htmlspecialchars($_SESSION['user_id']); ?></dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Username</dt>
                                    <dd class="mt-1 text-sm text-gray-900"><?php echo htmlspecialchars($_SESSION['username']); ?></dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-4">
                            <a href="update_profile.php" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                Update Profile
                            </a>
                            <a href="view_session.php" 
                               class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                View Session Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Status Card -->
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                        Security Status
                    </h3>
                    <div class="space-y-4">
                        <!-- Session Status -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-900">Active Session</h4>
                                <p class="mt-1 text-sm text-gray-500">
                                    Your session is active and secure
                                </p>
                            </div>
                        </div>

                        <!-- CSRF Protection -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-900">CSRF Protection</h4>
                                <p class="mt-1 text-sm text-gray-500">
                                    CSRF protection is enabled for all forms
                                </p>
                            </div>
                        </div>

                        <!-- Security Headers -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-900">Security Headers</h4>
                                <p class="mt-1 text-sm text-gray-500">
                                    All security headers are properly configured
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links Card -->
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                        Quick Links
                    </h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <a href="security_headers_test.php" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                            Security Headers Test
                        </a>
                        <a href="csrf_test.html" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                            CSRF Protection Test
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html> 