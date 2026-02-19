<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?= APP_NAME ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                <p class="text-gray-600 mt-2">Sign in to your account</p>
            </div>
            
            <div id="error-message" class="hidden bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4"></div>
            
            <form id="loginForm">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                        <span class="ml-2 text-sm text-gray-700">Remember me</span>
                    </label>
                    <a href="forgot-password.php" class="text-sm text-blue-600 hover:text-blue-700">Forgot password?</a>
                </div>
                
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105">
                    Sign In
                </button>
            </form>
            
            <p class="text-center text-gray-600 text-sm mt-6">
                Don't have an account? 
                <a href="register.php" class="text-blue-600 hover:text-blue-700 font-semibold">Sign up</a>
            </p>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
