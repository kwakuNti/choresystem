var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            'Completed',
            'Ongoing',
            'Stalled'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    },
});

// Search Project
const chore = document.querySelectorAll('.chore')

const displayChore = (values) =>{
    chore.forEach(element =>{
        element.style.display = "none"
        const title = element.querySelector('h2').innerHTML.toUpperCase();
        const status = element.dataset.status.toUpperCase();
        const recent = element.querySelector('p').innerHTML.toUpperCase();

        if (title.includes(values)){
            element.style.display = "block"
        }
        else if(values != 'RECENT' && status.includes(values)){
            element.style.display = "block"
        }
        else if(values === 'RECENT' && recent.includes('HOUR') || recent.includes('RECENT')){
            element.style.display = "block"
        }
    })
}

searchChore.addEventListener('input', (e) =>{
    displayChore(e.target.value.toUpperCase())
})

ChoreFilter.addEventListener('input', (e) =>{
    displayChore(e.target.value.toUpperCase())
})




  






  function searchChores() {
    var searchInput = document.getElementById("searchChore").value.toLowerCase();

    var table = document.getElementById("choreTable");
    var rows = table.getElementsByTagName("tr");

    for (var i = 0; i < rows.length; i++) {
      var row = rows[i];
      var cells = row.getElementsByTagName("td");

      var choreName = cells[1].textContent.toLowerCase();
      var assignPerson = cells[0].textContent.toLowerCase();

      if (choreName.includes(searchInput) || assignPerson.includes(searchInput)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }

    return false;
  }

  
  document.getElementById('dashboard').addEventListener('click', function() {
    window.location.href = '../admin/dash.php';
  });
  
  
  document.getElementById('people').addEventListener('click', function() {
    window.location.href = 'user.html';
  });

  document.getElementById('timeline').addEventListener('click', function() {
    window.location.href = '../admin/chore_control_view.php';
  });

  document.getElementById('logout').addEventListener('click', function() {
    window.location.href = '../login/Logout.php';
  });

  document.getElementById('add').addEventListener('click', function() {
    window.location.href = '../admin/assign_a_chore_view.php';
  });
  