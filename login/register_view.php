
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <section class="sec">
        <div class="form-box">
            <div class="form-text">
                <h1> Register</h1>
                <p>Already have an account? <span><a href="login_view.php">Login</a></span></p>
            </div>

            <form class="register" id="registerForm" action="../actions/register_user_action.php" method="post" onsubmit="validateAndRedirect()">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>

                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>

                <label>Gender</label>
                <div class="gender">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>

                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>

                <?php include '../functions/select_role_fxn.php'; ?>

                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" placeholder="Select your date of birth" required>

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" title="Enter a valid email address">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[,#\$!@%^&*()\/?])[A-Za-z\d,#\$!@%^&*()\/?]{8,}$" title="Minimum 8 characters, at least one letter and one number">

                <label for="passwordRetype">Retype Password</label>
                <input type="password" id="passwordRetype" name="passwordRetype" placeholder="Retype your password" required>

                <button type="submit" class="register-button">Register</button>

                <div id="feedback" class="feedback">
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] === "User already registered") {
                        echo "swal('Error', 'User already registered', 'error');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "Please fill in all required fields with valid data.") {
                        echo "swal('Error', 'Please fill in all required fields with valid data.', 'error');";
                    }
                    ?>
                });
            </script>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="footer">
            <div>
                <h3>About</h3>
                <p> A start up company</p>
                <p> To welcome blah blah</p>
                <p>Ya broooo</p>
            </div>
            <div>
                <h3> Contact Us</h3>
                <P> Reach whenever you feel like</P>
                <p> the future is exciting</p>
                <p> Bonah is bad</p>
            </div>
            <div>
                <h3> Quick Links</h3>
                <p> choresmanagement.com</p>
                <p>Get help</p>
                <p> Customer assitance</p>
            </div>
        </div>
    </div>
    <p style="text-align: center;"> Copyright 2024</p>
    </footer>
<script src="../js/register.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.6/purify.min.js"></script>
</body>
</html>
