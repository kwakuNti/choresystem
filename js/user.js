function switchUser() {
    var feedbackDiv = document.querySelector(".feedback");
    feedbackDiv.textContent = "Switching User";
    window.location.href="UserDashboard.html"
  }

  function searchChores() {
    var searchInput = document.getElementById("searchChore").value.toLowerCase();
    alert("Searching for user: " + searchInput);
    return false;
  }

  document.getElementById('dashboard').addEventListener('click', function() {
    window.location.href = '../admin/dash.php';
  });
 