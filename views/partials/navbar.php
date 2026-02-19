<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="dashboard.php" class="text-2xl font-bold text-blue-600"><?= APP_NAME ?></a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-6 items-center">
                <a href="dashboard.php" class="text-gray-700 hover:text-blue-600 transition font-medium">
                    Dashboard
                </a>
                <a href="profile.php" class="text-gray-700 hover:text-blue-600 transition font-medium">
                    Profile
                </a>
                
                <!-- User Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                            <?= strtoupper(substr($userData['username'], 0, 1)) ?>
                        </div>
                        <span class="font-medium"><?= htmlspecialchars($userData['username']) ?></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block">
                        <a href="profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            My Profile
                        </a>
                        <a href="edit-profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            Edit Profile
                        </a>
                        <div class="border-t my-2"></div>
                        <button onclick="logout()" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                            Logout
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <a href="dashboard.php" class="block py-2 text-gray-700 hover:text-blue-600">Dashboard</a>
            <a href="profile.php" class="block py-2 text-gray-700 hover:text-blue-600">Profile</a>
            <a href="edit-profile.php" class="block py-2 text-gray-700 hover:text-blue-600">Edit Profile</a>
            <button onclick="logout()" class="block w-full text-left py-2 text-red-600">Logout</button>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
