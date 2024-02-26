function redirectToWebpage() {
    window.location.href = 'Login.html';
}

var button = document.getElementById('redirectButton');

button.addEventListener('click', redirectToWebpage);