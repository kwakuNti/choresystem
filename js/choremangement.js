document.getElementById('dashboard').addEventListener('click', function() {
  window.location.href = '../view/dash.php';
});

document.getElementById('people').addEventListener('click', function() {
  window.location.href = 'user.html';
});

var modal = document.getElementById("choreModal");

window.onclick = function (event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
};

function openModal() {
  modal.style.display = "block";
}

function closeModal() {
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
