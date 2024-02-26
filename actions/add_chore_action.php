<?php
include("../settings/connection.php");
include("../settings/core.php");

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["choreName"]) && !empty($_POST["choreName"])) {
        $choreName = $_POST["choreName"];

        $check_sql = "SELECT cid FROM Chores WHERE chorname = ?";
        if ($check_stmt = mysqli_prepare($conn, $check_sql)) {
            mysqli_stmt_bind_param($check_stmt, "s", $choreName);
            mysqli_stmt_execute($check_stmt);
            mysqli_stmt_store_result($check_stmt);

            if (mysqli_stmt_num_rows($check_stmt) > 0) {
                // Chore already exists
                header("Location: ../admin/chore_control_view.php?msg=Chore already exists");
                exit;
            }
        } else {
            echo "ERROR: Could not prepare query: $check_sql. " . mysqli_error($conn);
            exit;
        }

        $insert_sql = "INSERT INTO Chores (chorname) VALUES (?)";
        if ($stmt = mysqli_prepare($conn, $insert_sql)) {
            mysqli_stmt_bind_param($stmt, "s", $choreName);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admin/chore_control_view.php?msg=Chore added successfully");
                exit;
            } else {
                header("Location: ../admin/chore_control_view.php?msg=Chore Addition Failed");
                
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "ERROR: Could not prepare query: $insert_sql. " . mysqli_error($conn);
            exit;
        }

        mysqli_close($conn);
    } else {
        echo "Chore name is required.";
    }
} else {
    header("location: chore_control_view.php");
    exit;
}
