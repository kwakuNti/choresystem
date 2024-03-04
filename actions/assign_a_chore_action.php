<?php
// Perform necessary processing to add chore assignment to the database
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once('db_connection.php');

    // Retrieve user and chore information from the form
    $user = $_POST['user'];
    $chore = $_POST['chore'];

    $sql = "INSERT INTO chore_assignment (user_id, chore_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user, $chore);
    $stmt->execute();

    header("Location: ../assign_chore_view.php");
    exit;
}
