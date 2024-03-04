<?php
include("../settings/core.php");
include("../settings/connection.php");

function getAllChores() {
    global $conn;

    $result = array();
    $sql = "SELECT * FROM Chores";

    $query_result = mysqli_query($conn, $sql);

    if ($query_result) {
        if (mysqli_num_rows($query_result) > 0) {
            while ($row = mysqli_fetch_assoc($query_result)) {
                $result[] = $row;
            }
        } else {
            echo "No records found.";
        }
    } else {
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
    }
    mysqli_close($conn);

    return $result;
}

// $allChores = getAllChores();


