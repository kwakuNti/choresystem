<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <section class="sec">
        <div class="form-box">
            <div class="form-text">
                <h1> Login</h1>
                <p>First time? <span><a href="Register.php">Create an account</a> </span></p>
            </div>

        <form class="login" id="loginForm" action="../actions/login_user_action.php" method="post" onsubmit="validateAndRedirect()">
            <label for="email">Enter your email</label>
            <input type="email" id="email" name="email" class="email" required pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" title="Enter a valid email address">
            
            <label for="password">Password</label>
                <div class="password-container">
                <input type="password" id="password" name="password" class="password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[,#\$!@%^&*()\/?])[A-Za-z\d,#\$!@%^&*()\/?]{8,}$" title="Minimum 8 characters, at least one letter and one number">
                
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="submit-button" >Login</button>

                <div id="feedback" class="feedback"></div>
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
<script src = "../js/login.js" ></script>
</body>
</html>