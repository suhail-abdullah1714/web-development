document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const inputs = form.querySelectorAll('input');

    const validators = {
        fullName: (value) => {
            return value.trim().length < 2 ? 'Name must be at least 2 characters' : '';
        },
        email: (value) => {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return !emailRegex.test(value) ? 'Please enter a valid email address' : '';
        },
        password: (value) => {
            return value.length < 8 ? 'Password must be at least 8 characters' : '';
        },
        confirmPassword: (value) => {
            const password = form.querySelector('input[name="password"]').value;
            return value !== password ? 'Passwords do not match' : '';
        }
    };

    const validateInput = (input) => {
        const name = input.name;
        // Map input names to validator keys
        let validatorKey = name;
        if (name === 'full_name') validatorKey = 'fullName';
        if (name === 'confirm_password') validatorKey = 'confirmPassword';

        if (validators[validatorKey]) {
            const errorMessage = validators[validatorKey](input.value);
            const errorElement = input.parentElement.querySelector('.error-message');

            if (errorMessage) {
                input.classList.add('error');
                if (errorElement) errorElement.textContent = errorMessage;
                return false;
            } else {
                input.classList.remove('error');
                if (errorElement) errorElement.textContent = '';
                return true;
            }
        }
        return true;
    };

    // Real-time validation
    inputs.forEach(input => {
        input.addEventListener('blur', () => validateInput(input));
        input.addEventListener('input', () => {
            if (input.classList.contains('error')) {
                validateInput(input);
            }
            // Also re-validate confirm password when password changes
            if (input.name === 'password') {
                const confirmInput = form.querySelector('input[name="confirm_password"]');
                if (confirmInput.value) validateInput(confirmInput);
            }
        });
    });

    form.addEventListener('submit', (e) => {
        let isValid = true;

        inputs.forEach(input => {
            if (!validateInput(input)) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });

    // Check for URL parameters to show success/error messages
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');
    const statusDiv = document.getElementById('formStatus');

    if (status === 'success') {
        statusDiv.textContent = "Account created successfully! You can now log in.";
        statusDiv.className = 'status-message success visible';
        window.history.replaceState({}, document.title, window.location.pathname);
        form.reset();
    } else if (status === 'error') {
        statusDiv.textContent = message || "An error occurred. Please try again.";
        statusDiv.className = 'status-message error visible';
    }
});
