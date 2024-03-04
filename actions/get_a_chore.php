<?php
include("../settings/core.php");

// Function to get a chore by ID
function getChoreById($choreId) {
    global $conn;

    // Prepare and execute the SELECT query
    $stmt = $conn->prepare("SELECT * FROM chores WHERE cid = ?");
    $stmt->bind_param("i", $choreId);
    $stmt->execute();

    // Check if execution was successful
    if (!$stmt) {
        die("Error executing query: " . $conn->error);
    }

    // Get the result
    $result = $stmt->get_result();

    // Check if any records were returned
    if ($result->num_rows == 0) {
        return null; // No chore found with the given ID
    }
    $chore = $result->fetch_assoc();
    $stmt->close();
    
    return $chore;
}
