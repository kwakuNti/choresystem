<?php
require_once('../settings/core.php');
include('../settings/connection.php');
checkLogin();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input data
    $userId = $_POST['user'];
    $choreId = $_POST['chore'];
    $dueDate = $_POST['dueDate'];
    $statusId = 1;
    $randomDate = date('Y-m-d', strtotime('-1 year'));

    // Insert the new chore assignment into the database
    $query = "INSERT INTO Assignment (cid, sid, date_assign, date_due, last_updated, date_completed, img, who_assigned)
            VALUES (?, ?, NOW(), ?, NOW(), ?, '', ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iissi", $choreId, $statusId, $dueDate,$randomDate, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->close();

    header("Location: ../admin/assign_a_chore_view.php?msg=Assigned Sucessfully");
    exit;
} else {
    header("Location: ../admin/assign_a_chore.php?msg=Sorry could not assign");
    exit;
}
