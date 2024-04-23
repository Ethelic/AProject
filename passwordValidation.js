document.getElementById('passwordForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('exampleUserName').value;
    var password1 = document.getElementById('exampleInputPassword1').value;
    var password2 = document.getElementById('exampleInputPassword2').value;
    var email1 = document.getElementById('exampleInputEmail1').value;
    var email2 = document.getElementById('exampleInputEmail2').value;
    var errorMessage = document.getElementById('error-message');

    if (username.trim().length === 0 || username.length < 4) {
        errorMessage.textContent = 'Username must be filled and have at least 4 characters.';
        return;
    }

    if (password1.length < 8 || password2.length < 8) {
        errorMessage.textContent = 'Passwords must be at least 8 characters long.';
        return;
    } else if (password1 !== password2) {
        errorMessage.textContent = 'Passwords do not match.';
        return; 
    }

    if (email1 !== email2) {
        errorMessage.textContent = 'Email addresses do not match.';
        return;
    } else if (!isValidEmail(email1) || !isValidEmail(email2)) {
        errorMessage.textContent = 'Invalid email address.';
        return;
    }

    errorMessage.textContent = '';

    document.getElementById('passwordForm').submit();
});

function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}