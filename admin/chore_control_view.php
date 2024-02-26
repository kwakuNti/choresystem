<?php
include("../functions/chore_fxn.php");
checkLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="../css/chore.css">
</head>
<body>
  <div class="dashboard">
    <H1 class="main-text">Chore Manager</H1>
    <section class="navigation">
      <img src="../images/working.png" alt="icon" class="logo">
      <div>
        <span id="dashboard" class="material-symbols-outlined">dashboard</span>
        <span id="people" class="material-symbols-outlined">groups</span>
        <span id="add" class="material-symbols-outlined" onclick="openModal()">add</span>
        <span class="material-symbols-outlined">settings</span>
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

      <section class="chorelist">
          <h1>Chore list</h1>
        <div>
          <span id="add" class="material-symbols-outlined" onclick="openModal()">add</span>
        </div>
      </section>
      <section class="new-chores">
        <?php
        displayChores($allchores);
      ?>

</div>
      </section>
      <div id="choreModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>

          <section class="create-chore">
            <h2>Create a New Chore</h2>
            <form id="createChoreForm" action="../actions/add_chore_action.php" method="post">
              <label for="choreName">Chore Name:</label>
              <input type="text" id="choreName" name="choreName" placeholder="Enter chore name" required>
              <button type="submit">Add Chore</button>
              <div id="feedback" class="feedback">
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] === "Chore added successfully") {
                        echo "swal('Success', 'Chore added successfully', 'success');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "Deleted successfully") {
                      echo "swal('Success', 'Deleted successfully', 'success');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "Deletion Failed") {
                      echo "swal('Error', 'Deletion Failed', 'error');";
                    }
                    // if (isset($_GET['msg']) && $_GET['msg'] === "No chores found") {
                    //   echo "swal('Error', 'No chores found', 'error');";
                    // }
                    if (isset($_GET['msg']) && $_GET['msg'] === "No records found.") {
                      echo "swal('Error', 'No records found.', 'error');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "Chore already exists") {
                      echo "swal('Error', 'Chore already exists', 'error');";
                    }
                    ?>
                });
            </script>
                </div>
            </form>

          </section>

        </div>
      </div>
    </section>
  </div>

<script src="../js/choremangement.js"></script>
</body>
</html>

