function validateAndRedirect() {
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var feedback = document.getElementById("feedback");

    if (!emailInput.checkValidity()) {
        feedback.textContent = "Invalid email address";
        return;
    }

    if (!passwordInput.checkValidity()) {
        feedback.textContent = "Invalid password";
        return;
    }
}

