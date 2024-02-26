<?php
// Include connection file
include("../settings/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["choreId"], $_POST["choreName"])) {
        $choreId = $_POST["choreId"];
        $choreName = $_POST["choreName"];

        $sql = "UPDATE Chores SET chorname = ? WHERE cid = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $choreName, $choreId);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admin/chore_control_view.php?msg=Chore updated successfully");
                exit;
            } else {
                header("Location: ../admin/chore_control_view.php?msg=Chore update failed");
                
            }

            mysqli_stmt_close($stmt);
        } else {
            header("Location: ../admin/chore_control_view.php?msg=Query preparation failed");
            exit;
        }
    } else {
        header("Location: ../admin/chore_control_view.php?msg=Invalid chore data");
        exit;
    }
} else {
    // If form not submitted via POST, redirect to chore control view page
    header("Location: ../admin/chore_control_view.php");
    exit;
}

