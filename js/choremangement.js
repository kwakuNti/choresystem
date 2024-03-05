document.getElementById('dashboard').addEventListener('click', function() {
  window.location.href = '../admin/dash.php';
});

document.getElementById('people').addEventListener('click', function() {
  window.location.href = '../view/user.php';
});

document.getElementById('logout').addEventListener('click', function() {
  window.location.href = '../login/Logout.php';
});

// Function to handle clicks outside the modals
window.onclick = function(event) {
  var assignmentModal = document.getElementById("assignmentModal");
  var choreModal = document.getElementById("choreModal");

  // Close assignment modal if clicked outside
  if (event.target == assignmentModal) {
    assignmentModal.style.display = "none";
  }

  // Close chore modal if clicked outside
  if (event.target == choreModal) {
    choreModal.style.display = "none";
  }
}

// Function to open assignment modal
function openAssignmentModal() {
  var modal = document.getElementById("assignmentModal");
  modal.style.display = "block";
}

// Function to close assignment modal
function closeAssignmentModal() {
  var modal = document.getElementById("assignmentModal");
  modal.style.display = "none";
}

// Function to open chore modal
function openModal() {
  var modal = document.getElementById("choreModal");
  modal.style.display = "block";
}

// Function to close chore modal
function closeModal() {
  var modal = document.getElementById("choreModal");
  modal.style.display = "none";
}

document.getElementById("createChoreForm").addEventListener("submit", function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  var choreNameInput = document.getElementById("choreName");
  if (choreNameInput) {
      var choreName = choreNameInput.value;

      // Check if choreName is not empty
      if (choreName.trim() !== "") {
          // Perform further actions with the chore name
          console.log("Chore name:", choreName);

          // Submit the form
          this.submit();

          closeModal(); // Optionally close the modal
      } else {
          console.error("Chore name cannot be empty.");
      }
  } else {
      console.error("Input element with ID 'choreName' not found.");
  }
});
