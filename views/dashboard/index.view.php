<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="min-h-screen bg-gray-100">
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>
    
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
            <p class="text-gray-600 mt-2">Welcome back, <?= htmlspecialchars($userData['username']) ?>!</p>
        </div>
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 font-medium">Total Users</p>
                        <p class="text-2xl font-bold text-gray-800"><?= number_format($totalUsers) ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 font-medium">Active Users</p>
                        <p class="text-2xl font-bold text-gray-800"><?= number_format($activeUsers) ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 font-medium">Growth</p>
                        <p class="text-2xl font-bold text-gray-800">+<?= $growth ?>%</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Profile Info Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">Profile Information</h2>
                <a href="profile.php" class="text-blue-600 hover:text-blue-700 font-medium">Edit Profile</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Username</p>
                    <p class="font-semibold text-gray-800"><?= htmlspecialchars($userData['username']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-semibold text-gray-800"><?= htmlspecialchars($userData['email']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Member Since</p>
                    <p class="font-semibold text-gray-800"><?= date('F j, Y', strtotime($userData['created_at'])) ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Last Updated</p>
                    <p class="font-semibold text-gray-800">
                        <?= isset($userData['updated_at']) ? date('F j, Y', strtotime($userData['updated_at'])) : 'Never' ?>
                    </p>
                </div>
            </div>
            <?php if (!empty($userData['bio'])): ?>
            <div class="mt-4">
                <p class="text-sm text-gray-600">Bio</p>
                <p class="text-gray-800 mt-1"><?= htmlspecialchars($userData['bio']) ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
