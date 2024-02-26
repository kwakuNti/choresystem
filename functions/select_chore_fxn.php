<?php
include '../settings/connection.php';

// SQL query to select chores
$sql = "SELECT * FROM Chores";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if query was successful
if ($result) {
    // Fetch all rows as an associative array
    $chores = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Output HTML for select dropdown with a class name for styling
    echo '<label for="chore" class="chore-label">Chore</label>';
    echo '<select id="chore" name="chore" class="chore-select">';
    foreach ($chores as $chore) {
        echo '<option value="' . $chore['cid'] . '">' . $chore['chorname'] . '</option>';
    }
    echo '</select>';
} else {
    echo "Error: " . mysqli_error($conn);
}
