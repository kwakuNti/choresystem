<?php
require_once('../settings/core.php');
checkLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/edit.css">
<link rel="stylesheet" href="../css/assign.css">
<title>Assign Chore</title>
</head>
<body>
<h2>Assign Chore</h2>
<form id="assignChoreForm" action="../actions/assign_a_chore_action.php" method="post">
    <?php include('../functions/select_user_fxn.php'); ?>
    <?php include('../functions/select_chore_fxn.php'); ?>
    <label for="dueDate">Due Date:</label>
    <input type="date" id="dueDate" name="dueDate" class="due-date">
    <input type="submit" value="Assign Chore" class="assign-button">
    <input type="submit" value="Assign Chore">
</form>

</body>
</html>
