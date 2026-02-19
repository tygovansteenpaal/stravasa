<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - <?= APP_NAME ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 to-pink-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Create Account</h2>
                <p class="text-gray-600 mt-2">Join us today</p>
            </div>
            
            <div id="error-message" class="hidden bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4"></div>
            <div id="success-message" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4"></div>
            
            <form id="registerForm">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                    <input type="text" name="username" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    <p class="text-xs text-gray-500 mt-1">At least 6 characters</p>
                </div>
                
                <button type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105">
                    Create Account
                </button>
            </form>
            
            <p class="text-center text-gray-600 text-sm mt-6">
                Already have an account? 
                <a href="login.php" class="text-purple-600 hover:text-purple-700 font-semibold">Sign in</a>
            </p>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
