<?php
include '../functions/get_all_assignment_fxn.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assign Chore</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="../css/assign.css">
    <link rel="stylesheet" href="../css/assign_view.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<body>
  <div class="dashboard">
    <H1 class="main-text">Chore Manager</H1>
    <section class="navigation">
      <img src="../images/working.png" alt="icon" class="logo">
      <div>
        <span id="dashboard" class="material-symbols-outlined">dashboard</span>
        <span id="people" class="material-symbols-outlined">groups</span>
        <span  id="addx" class="material-symbols-outlined" title="Assign Chore" onclick="openAssignmentModal()">Assignment</span>
        <span id="add" class="material-symbols-outlined" onclick="openModal()">add</span>
        <span class="material-symbols-outlined">settings</span>
        <span  id="logout" class="material-symbols-outlined" title="Log out">logout</span>
      </div>
      <img src="../images/p2.jpg" alt="user" class="user">
    </section>

    <section class="main">
      <div class="search">
        <form id="searchForm" onsubmit="searchChores(); return false;">
          <input type="text" name="search" id="searchChore" placeholder="Search here">
          <span class="material-symbols-outlined" onclick="searchChores()">search</span>
        </form>
      </div>

    <div class="header">
        <h2>Chore Assignments</h2>
        <button class="assign-button" id="assign-button">Assign a chore</button>
    </div>
    <div class="table-container">
        <table class="chore-table">
            <thead>
                <tr>
                    <th>Chore Name</th>
                    <th>Assigned By</th>
                    <th>Date Assigned</th>
                    <th>Date Due</th>
                    <th>Chore Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assignments as $assignment): ?>
                <tr>
                    <td><?php echo $assignment['chorname']; ?></td>
                    <td><?php echo $assignment['assigned_by_name']; ?></td>
                    <td><?php echo $assignment['date_assign']; ?></td>
                    <td><?php echo $assignment['date_due']; ?></td>
                    <td><?php echo $assignment['status_name']; ?></td>
                    <td>
                        <a href="../actions/delete_assignment_action.php?assignment_id=<?php echo $assignment['assignmentid']; ?>"><span class='material-symbols-outlined'>delete</span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="../js/assign.js"></script>
    <script src="../js/choremangement.js"></script>
</body>
</html>
