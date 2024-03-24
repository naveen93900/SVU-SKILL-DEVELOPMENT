function validateLogin() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var errorMessage = document.getElementById('error-message');

    // Simple validation, you can replace this with your authentication logic
    if (username === 'demo' && password === 'demo123') {
        errorMessage.textContent = ''; // Clear any previous error message
        alert('Login successful!');
    } else {
        errorMessage.textContent = 'Invalid username or password';
    }
}
function openNav() {
    document.getElementById("navbar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("navbar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
