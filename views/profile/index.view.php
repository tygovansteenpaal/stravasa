<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="min-h-screen bg-gray-100">
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>
    
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">My Profile</h1>
            <p class="text-gray-600 mt-2">View and manage your profile information</p>
        </div>
        
        <!-- Profile Card -->
        <div class="bg-white rounded-lg shadow-md p-8 max-w-2xl">
            <div class="flex items-center mb-6">
                <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-3xl font-bold">
                    <?= strtoupper(substr($userData['username'], 0, 2)) ?>
                </div>
                <div class="ml-6">
                    <h2 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($userData['username']) ?></h2>
                    <p class="text-gray-600"><?= htmlspecialchars($userData['email']) ?></p>
                </div>
            </div>
            
            <div class="border-t pt-6">
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Bio</p>
                        <p class="text-gray-800 mt-1">
                            <?= !empty($userData['bio']) ? htmlspecialchars($userData['bio']) : 'No bio yet' ?>
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Member Since</p>
                        <p class="text-gray-800 mt-1"><?= date('F j, Y', strtotime($userData['created_at'])) ?></p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Last Updated</p>
                        <p class="text-gray-800 mt-1">
                            <?= isset($userData['updated_at']) ? date('F j, Y g:i A', strtotime($userData['updated_at'])) : 'Never' ?>
                        </p>
                    </div>
                </div>
                
                <div class="mt-8">
                    <a href="edit-profile.php" 
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
