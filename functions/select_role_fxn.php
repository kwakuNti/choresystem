<?php
include '../settings/connection.php';

$sql = "SELECT * FROM Family_name";

$result = mysqli_query($conn, $sql);

if ($result) {
    $family_roles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    echo '<label for="familyRole">Family Role</label>';
    echo '<select id="familyRole" name="familyRole">';
    foreach ($family_roles as $role) {
        echo '<option value="' . $role['fid'] . '">' . $role['fam_name'] . '</option>';
    }
    echo '</select>';
} else {
    echo "Error: " . mysqli_error($conn);
}


