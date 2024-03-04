<?php
session_start();
include("../settings/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $familyRole = $_POST['familyRole'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRetype = $_POST['passwordRetype'];

    // Basic validation
    if (empty($firstName) || empty($lastName) || empty($gender) || empty($familyRole) || empty($dob) || empty($phone) || empty($email) || empty($password) || empty($passwordRetype)) {
        header("Location: ../login/register_view.php?msg=Please fill in all required fields with valid data.");
        exit;
    }

    // Check if passwords match
    if ($password !== $passwordRetype) {
        echo "Passwords do not match";
        exit;
    }

    // Check if email is already registered
    $query = "SELECT * FROM People WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: ../login/register_view.php?msg=User already registered");
        exit;
    }

    // Encrypt the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $rid = 3;

    // Insert user data into the database
    $insertQuery = "INSERT INTO People (rid, fid, fname, lname, gender, dob, tel, email, passwd)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("isssissss", $rid,$familyRole, $firstName, $lastName, $gender,  $dob, $phone, $email, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: ../login/login_view.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
        exit;
    }
}
