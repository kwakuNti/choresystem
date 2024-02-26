<?php
// Include database connection
include '../settings/connection.php';

// SQL query to select users
$sql = "SELECT * FROM People WHERE rid = 3"; // Assuming role_id is the column representing roles

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if query was successful
if ($result) {
    // Fetch all rows as an associative array
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Output HTML for select dropdown
    echo '<label for="user" class="chore-label">User:</label>';
    echo '<select id="user" name="user" class="chore-select">';
    foreach ($users as $user) {
        echo '<option value="' . $user['pid'] . '">' . $user['fname'] . '</option>';
    }
    echo '</select>';
} else {
    // If query failed, display error
    echo "Error: " . mysqli_error($conn);
}
