<?php
include '../settings/connection.php';

// Check if assignment ID is provided in the URL parameter
if(isset($_GET['assignment_id'])) {
    $assignmentId = $_GET['assignment_id'];

    // Write the DELETE query using the assignment ID
    $sql = "DELETE FROM Assignment WHERE assignmentid = $assignmentId";

    // Execute the query
    if(mysqli_query($conn, $sql)) {
        // Redirect to assignment display page if execution is successful
        header("Location: ../admin/assign_a_chore_view.php?msg=Assignment Deleted");
        exit;
    } else {
        header("Location: ../admin/assign_a_chore_view.php?msg=Failed to Delete");
        exit;
    }
} else {
    // Redirect to assignment display page if assignment ID is not provided
    header("Location: ../admin/assign_a_chore_view.php");
    exit;
}