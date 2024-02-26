<?php
session_start();
include("../settings/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Email and password are required";
        exit;
    }

    // Prepare and execute the query to retrieve user data
    $query = "SELECT * FROM People WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // User not registered
        header("Location: ../login/login_view.php?msg=User not registered");
        exit;
    } else {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['passwd'])) {
            $_SESSION['user_id'] = $user['pid'];
            $_SESSION['role_id'] = $user['rid'];
            header("Location: ../view/dash.php");
            exit;
        } else {
            // Incorrect password
            header("Location: ../login/login_view.php?msg=Incorrect password");
            exit;
        }
    }
} else {
    // Invalid request method
    echo "Invalid request method";
    exit;
}
