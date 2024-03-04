<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management</title>
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
        <div>
          <h1>Chore list</h1>
        </div>
        <div>
          <p class="c">add a chore</p>
          <span id="add" class="material-symbols-outlined" onclick="openModal()">add</span>
        </div>
      </section>
      <section class="new-chores">
        <table id="choreTable" class="chore-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Chore</th>
              <th>Status</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody id="choreContainer"></tbody>
        </table>
      </section>

      <div id="choreModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>

          <section class="create-chore">
            <h2>Create a New Chore</h2>
            <form id="createChoreForm" onsubmit="return false;">
              <label for="choreName">Chore Name:</label>
              <input type="text" id="choreName" name="choreName" placeholder="Enter chore name" required>

              <label for="assignPerson">Assign Person 1:</label>
              <input type="text" id="assignPerson" name="assignPerson" placeholder="Enter Person  name" required>


              <label for="dueDate">Due Date:</label>
              <input type="date" id="dueDate" name="dueDate" required>

              <label for="description">Description:</label>
              <textarea id="description" name="description" placeholder="Enter chore description"></textarea>

              <button type="submit">Assign Chore</button>
            </form>
          </section>

        </div>
      </div>
    </section>
  </div>

<script src="../js/choremangement.js"></script>
</body>
</html>
