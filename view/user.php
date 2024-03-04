
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="../css/chore.css">
</head>
<body>
  <div class="dashboard">
    <H1 class="main-text">Users</H1>
    <section class="navigation">
      <img src="../images/working.png" alt="icon" class="logo">
      <div>
        <span id="dashboard" class="material-symbols-outlined">dashboard</span>
        <span class="material-symbols-outlined">settings</span>
      </div>
    </section>

    <section class="main">
      <section>
        <div class="user-details">
            <span class="active-dot"></span>
            <span class="user-admin" >User: Admin</span>
            <p> </p>
          </div>
          <button onclick="switchUser()">Switch User</button>
          <div class="feedback"></div>
<style>

</style>
      </section>

      <script src="../js/user.js"></script>
</body>
</html>
