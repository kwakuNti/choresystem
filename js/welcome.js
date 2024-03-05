function redirectToWebpage() {
    window.location.href = '../login/login.php';
}

var button = document.getElementById('redirectButton');

button.addEventListener('click', redirectToWebpage);