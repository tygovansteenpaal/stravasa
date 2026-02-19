<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - <?= APP_NAME ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-100 to-blue-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Forgot Password?</h2>
                <p class="text-gray-600 mt-2">Enter your email to reset your password</p>
            </div>
            
            <div id="error-message" class="hidden bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4"></div>
            <div id="success-message" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4"></div>
            
            <form id="forgotPasswordForm">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                </div>
                
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105">
                    Send Reset Link
                </button>
            </form>
            
            <div class="text-center mt-6">
                <a href="login.php" class="text-sm text-gray-600 hover:text-gray-800">
                    ← Back to login
                </a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const successDiv = document.getElementById('success-message');
            successDiv.textContent = 'Password reset feature coming soon!';
            successDiv.classList.remove('hidden');
        });
    </script>
</body>
</html>
