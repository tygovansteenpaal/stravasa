// Validation Helper Functions

const Validation = {
    // Email validation
    email: function(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    },
    
    // Username validation (alphanumeric and underscore)
    username: function(username) {
        const regex = /^[a-zA-Z0-9_]+$/;
        return regex.test(username);
    },
    
    // Password strength check
    password: function(password) {
        return password.length >= 6;
    },
    
    // Required field check
    required: function(value) {
        return value.trim() !== '';
    },
    
    // Length validation
    length: function(value, min, max) {
        const len = value.length;
        if (max) {
            return len >= min && len <= max;
        }
        return len >= min;
    },
    
    // Match validation (for password confirmation)
    match: function(value1, value2) {
        return value1 === value2;
    }
};

// Real-time form validation
function setupFormValidation(formId) {
    const form = document.getElementById(formId);
    if (!form) return;
    
    const inputs = form.querySelectorAll('input[required]');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateInput(this);
        });
        
        input.addEventListener('input', function() {
            // Remove error styling on input
            this.classList.remove('border-red-500');
            const errorMsg = this.nextElementSibling;
            if (errorMsg && errorMsg.classList.contains('error-message')) {
                errorMsg.remove();
            }
        });
    });
}

function validateInput(input) {
    const value = input.value;
    const name = input.name;
    let isValid = true;
    let errorMessage = '';
    
    // Required check
    if (input.hasAttribute('required') && !Validation.required(value)) {
        isValid = false;
        errorMessage = 'This field is required';
    }
    
    // Specific validations
    if (isValid && value) {
        switch (name) {
            case 'email':
                if (!Validation.email(value)) {
                    isValid = false;
                    errorMessage = 'Please enter a valid email address';
                }
                break;
            case 'username':
                if (!Validation.username(value)) {
                    isValid = false;
                    errorMessage = 'Username can only contain letters, numbers, and underscores';
                } else if (!Validation.length(value, 3, 50)) {
                    isValid = false;
                    errorMessage = 'Username must be between 3 and 50 characters';
                }
                break;
            case 'password':
                if (!Validation.password(value)) {
                    isValid = false;
                    errorMessage = 'Password must be at least 6 characters';
                }
                break;
        }
    }
    
    // Show/hide error
    if (!isValid) {
        input.classList.add('border-red-500');
        showInputError(input, errorMessage);
    } else {
        input.classList.remove('border-red-500');
        removeInputError(input);
    }
    
    return isValid;
}

function showInputError(input, message) {
    removeInputError(input);
    const errorDiv = document.createElement('p');
    errorDiv.className = 'error-message text-red-500 text-xs mt-1';
    errorDiv.textContent = message;
    input.parentNode.insertBefore(errorDiv, input.nextSibling);
}

function removeInputError(input) {
    const errorMsg = input.nextElementSibling;
    if (errorMsg && errorMsg.classList.contains('error-message')) {
        errorMsg.remove();
    }
}

// Initialize validation on page load
document.addEventListener('DOMContentLoaded', function() {
    setupFormValidation('loginForm');
    setupFormValidation('registerForm');
    setupFormValidation('updateProfileForm');
});
