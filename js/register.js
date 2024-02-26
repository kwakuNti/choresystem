function validateAndRedirect() {


    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var gender = document.querySelector('input[name="gender"]:checked');
    var familyRole = document.getElementById("familyRole").value;
    var dob = document.getElementById("dob").value;
    var phone = document.getElementById("phone").value;
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var passwordRetypeInput = document.getElementById("passwordRetype");
    var feedback = document.getElementById("feedback");

    if (firstName.trim() === "" || lastName.trim() === "" || gender === null || familyRole === "0" || dob.trim() === "" || phone.trim() === "") {
        feedback.innerHTML = "Please fill in all required fields with valid data.";
        return;
    }

    var email = emailInput.value.trim();
    var password = passwordInput.value.trim();
    var passwordRetype = passwordRetypeInput.value.trim();

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[,#\$!@%^&*()\/?])[A-Za-z\d,#\$!@%^&*()\/?]{8,}$/;

    if (!emailRegex.test(email)) {
        feedback.innerHTML = "Invalid email address";
        return;
    }

    if (!passwordRegex.test(password)) {
        feedback.innerHTML = "Invalid password";
        return;
    }

    if (password !== passwordRetype) {
        feedback.innerHTML = "Passwords do not match";
        return;
    }
}