// Main JavaScript for Stravasa

// Login Form Handler
const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = new FormData(loginForm);
        const submitButton = loginForm.querySelector('button[type="submit"]');
        
        // Add loading state
        submitButton.classList.add('btn-loading');
        submitButton.disabled = true;
        
        try {
            const response = await fetch('api/auth/login.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                window.location.href = 'pages/dashboard.php';
            } else {
                showError(data.message);
                submitButton.classList.remove('btn-loading');
                submitButton.disabled = false;
            }
        } catch (error) {
            showError('An error occurred. Please try again.');
            submitButton.classList.remove('btn-loading');
            submitButton.disabled = false;
        }
    });
}

// Register Form Handler
const registerForm = document.getElementById('registerForm');
if (registerForm) {
    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = new FormData(registerForm);
        const submitButton = registerForm.querySelector('button[type="submit"]');
        
        // Add loading state
        submitButton.classList.add('btn-loading');
        submitButton.disabled = true;
        
        try {
            const response = await fetch('api/auth/register.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showSuccess('Registration successful! Redirecting to login...');
                setTimeout(() => {
                    window.location.href = 'login.php';
                }, 2000);
            } else {
                showError(data.message);
                submitButton.classList.remove('btn-loading');
                submitButton.disabled = false;
            }
        } catch (error) {
            showError('An error occurred. Please try again.');
            submitButton.classList.remove('btn-loading');
            submitButton.disabled = false;
        }
    });
}

// Update Profile Form Handler
const updateProfileForm = document.getElementById('updateProfileForm');
if (updateProfileForm) {
    updateProfileForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = new FormData(updateProfileForm);
        const submitButton = updateProfileForm.querySelector('button[type="submit"]');
        
        // Add loading state
        submitButton.classList.add('btn-loading');
        submitButton.disabled = true;
        
        try {
            const response = await fetch('../api/user/update.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showSuccess('Profile updated successfully!');
                setTimeout(() => {
                    window.location.href = 'profile.php';
                }, 1500);
            } else {
                showError(data.message);
                submitButton.classList.remove('btn-loading');
                submitButton.disabled = false;
            }
        } catch (error) {
            showError('An error occurred. Please try again.');
            submitButton.classList.remove('btn-loading');
            submitButton.disabled = false;
        }
    });
}

// Logout Function
async function logout() {
    if (confirm('Are you sure you want to logout?')) {
        try {
            const response = await fetch('../api/auth/logout.php', {
                method: 'POST'
            });
            
            const data = await response.json();
            
            if (data.success) {
                window.location.href = '../login.php';
            }
        } catch (error) {
            console.error('Logout error:', error);
            window.location.href = '../login.php';
        }
    }
}

// Show Error Message
function showError(message) {
    const errorDiv = document.getElementById('error-message');
    if (errorDiv) {
        errorDiv.textContent = message;
        errorDiv.classList.remove('hidden');
        errorDiv.classList.add('shake');
        
        // Remove shake animation after it completes
        setTimeout(() => {
            errorDiv.classList.remove('shake');
        }, 500);
        
        // Auto hide after 5 seconds
        setTimeout(() => {
            errorDiv.classList.add('hidden');
        }, 5000);
    }
}

// Show Success Message
function showSuccess(message) {
    const successDiv = document.getElementById('success-message');
    if (successDiv) {
        successDiv.textContent = message;
        successDiv.classList.remove('hidden');
        
        // Auto hide after 5 seconds
        setTimeout(() => {
            successDiv.classList.add('hidden');
        }, 5000);
    }
}

// Image Preview for Profile Picture Upload
const profilePictureInput = document.querySelector('input[name="profile_picture"]');
if (profilePictureInput) {
    profilePictureInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // You can add preview functionality here
                console.log('Image selected:', file.name);
            };
            reader.readAsDataURL(file);
        }
    });
}

// Check for session expiration warning
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('expired') === '1') {
    showError('Your session has expired. Please login again.');
}

// Add fade-in animation to page elements
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.bg-white');
    elements.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add('fade-in');
        }, index * 100);
    });
});
