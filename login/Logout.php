<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
    <link rel="stylesheet" href="../css/logout.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<section class="sec">
        <div class="form-box">
            <div class="form-text">
                <h1> Logout</h1>
                <p>Are you sure you want to log out ?<span><a href="../admin/dash.php">Back to Dashboard</a> </span></p>
            </div>
            <form id="logoutForm" action="../login/logout_view.php" method="post">
                <button type="submit" class="submit-button" >Log Out</button>
            </form>
                <div id="feedback" class="feedback">

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
<script src = "../js/login.js" ></script>
</body>
</html>