// Show Signup Form and Hide Login Form
function showSignup() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signupForm').style.display = 'block';
}

// Show Login Form and Hide Signup Form
function showLogin() {
    document.getElementById('signupForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
}

// Validate Login Form
function validateLogin() {
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    if (email === '' || password === '') {
        alert('Please fill in both fields.');
        return false;
    }
    alert('Login successful!');
    return true;
}

// Validate Signup Form
function validateSignup() {
    const name = document.getElementById('signupName').value;
    const email = document.getElementById('signupEmail').value;
    const password = document.getElementById('signupPassword').value;
    const confirmPassword = document.getElementById('signupConfirmPassword').value;

    if (name === '' || email === '' || password === '' || confirmPassword === '') {
        alert('Please fill in all fields.');
        return false;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    }

    alert('Signup successful!');
    return true;
}


// Redirect when clicking the Font Awesome icon (by class name)
document.querySelector('.redirect-icon').addEventListener('click', function() {
    window.location.href = 'login.html'; 
});

