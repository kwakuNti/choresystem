<?php
include("../settings/connection.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Chores WHERE cid = $id";

    if(mysqli_query($conn, $sql)) {
        header("Location: ../admin/chore_control_view.php?msg=Deleted successfully");
        exit();
    } else {
        header("Location: ../admin/chore_control_view.php?msg=Deletion Failed");
    }
} else {
    // Redirect to chore display page if id is not set in GET URL
    header("Location: ../admin/chore_control_view.php?msg=No record found");
    exit();
}

mysqli_close($conn);
