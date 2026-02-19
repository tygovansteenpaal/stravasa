<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="min-h-screen bg-gray-100">
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>
    
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Edit Profile</h1>
            <p class="text-gray-600 mt-2">Update your profile information</p>
        </div>
        
        <!-- Edit Form -->
        <div class="bg-white rounded-lg shadow-md p-8 max-w-2xl">
            <div id="error-message" class="hidden bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4"></div>
            <div id="success-message" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4"></div>
            
            <form id="updateProfileForm" enctype="multipart/form-data">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                    <input type="text" name="username" value="<?= htmlspecialchars($userData['username']) ?>" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Email (read-only)</label>
                    <input type="email" value="<?= htmlspecialchars($userData['email']) ?>" disabled
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Bio</label>
                    <textarea name="bio" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    ><?= htmlspecialchars($userData['bio'] ?? '') ?></textarea>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Profile Picture</label>
                    <input type="file" name="profile_picture" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Max file size: 5MB. Allowed: JPG, PNG, GIF</p>
                </div>
                
                <div class="flex space-x-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">
                        Save Changes
                    </button>
                    <a href="profile.php"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 px-6 rounded-lg transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
