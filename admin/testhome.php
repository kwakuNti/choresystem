<?php include("../settings/core.php");
checkLogin();
checkUserRole(1);

require_once('../functions/home_fxn.php');
$filterOption = isset($_POST['chores']) ? $_POST['chores'] : 'recent';

// Fetch assignments based on filter option
switch ($filterOption) {
    case 'finished':
        $assignments = $completedAssignments;
        break;
    case 'ongoing':
        $assignments = $assignmentsInProgress;
        break;
    case 'unfinished':
        $assignments = $incompleteAssignments;
        break;
    default:
        $assignments = $recentAssignments;
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/dash.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>

</head>
<body>
    <div class="dashboard">
        <section class="navigation">
            <img src="../images/working.png" alt="icon" class="logo">

            <div>
                <span id="dashboard" class="material-symbols-outlined" title="Dashboard">dashboard</span>
                <span id="timeline" class="material-symbols-outlined" title="Mange Chores">timeline</span>
                <span id="people" class="material-symbols-outlined">groups</span>
                <span  id="add" class="material-symbols-outlined" title="Assign Chore">Assignment</span>
                <span id="settings" class="material-symbols-outlined" title="Settings">settings</span>
                <span  id="logout" class="material-symbols-outlined" title="Log out">logout</span>
            </div>

            <img src="../images/p2.jpg" alt="user" class="user">

        </section>

        <section class="main">
            <div class="search">
                <form action="">
                    <input type="text" name="search" id="searchChore" placeholder="Search here">
                    <span class="material-symbols-outlined">search</span>
                </form>

                <div class="notification">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="material-symbols-outlined">edit</span>
                </div>
            </div>


            <div class="title">
            <h1>My Dashboard : Admin</h1>
                <label for="ChoreFilter">Sort By</label>
                <form method="POST">
                    <select name="chores" id="ChoreFilter" onchange="this.form.submit()">
                        <option value="recent" <?php if ($filterOption == 'recent') echo 'selected'; ?>>Recent Chores</option>
                        <option value="finished" <?php if ($filterOption == 'finished') echo 'selected'; ?>>Finished Chores</option>
                        <option value="ongoing" <?php if ($filterOption == 'ongoing') echo 'selected'; ?>>On-going Chores</option>
                        <option value="unfinished" <?php if ($filterOption == 'unfinished') echo 'selected'; ?>>Unfinished Chores</option>
                    </select>
                </form>
            </div>

            <div class="chore_list">
                <?php foreach ($assignments as $assignment): ?>
                    <div class="chore" data-status="<?php echo $assignment['sname']; ?>" title="<?php echo $assignment['status_name']; ?>">
                        <div class="category <?php echo 'category_color'.$assignment['cid']; ?>"></div>
                        <h2><?php echo $assignment['chorname']; ?></h2>
                        <p><?php echo $assignment['description']; ?></p>
                        
                        <ul class="activity">
                            <?php foreach ($assignment['activities'] as $activity): ?>
                                <li><?php echo $activity; ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="meta">
                            <div class="worker">
                                <img src="<?php echo $assignment['assigned_by_image']; ?>" alt="profile" class="stack">
                            </div>
                            <span class="material-symbols-outlined">more_vert</span>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="chore" data-status="failed" title="Failed Chore">
                    <div class="category category_color3"></div>
                    <h2>Laundry</h2>
                    <p>1 day ago</p>
                    
                    <ul class="activity">
                        <li>Washing clothes</li>
                        <li>Folding laundry</li>
                    </ul>
                    
                    <div class="meta">
                        <div class="worker">
                            <img src="../images/p4.jpg" alt="profile" class="stack">
                        </div>
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                </div>

                <div class="chore" data-status="finished" title="Finised Chore">
                    <div class="category category_color4"></div>
                    <h2>Home Maintenance</h2>
                    <p>Finished Chore</p>
                    
                    <ul class="activity">
                        <li>Changing light bulbs</li>
                        <li>Fixing leaky faucets</li>
                    </ul>
                    
                    <div class="meta">
                        <div class="worker">
                            <img src="../images/p5.jpg" alt="profile" class="stack">
                        </div>
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                </div>


                <div class="chore" data-status="recent" title="Recent Chore">
                    <div class="category"></div>
                    <h2>Tech and Electronics</h2>
                    <p>12 hours ago</p>
                    
                    <ul class="activity">
                        <li>Organizing cables and wires</li>
                        <li>Cleaning computer peripherals</li>
                    </ul>
                    
                    <div class="meta">
                        <div class="worker">
                            <img src="../images/p6.jpg" alt="profile" class="stack">
                        </div>
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                </div>



                <div class="chore" data-status="finished" title="Finised Chore">
                    <div class="category"></div>
                    <h2>Pet Care</h2>
                    <p>1 week ago</p>
                    
                    <ul class="activity">
                        <li>Feeding pets</li>
                        <li>Grooming pets</li>
                    </ul>
                    
                    <div class="meta">
                        <div class="worker">
                            <img src="../images/p7.jpg" alt="profile" class="stack">
                        </div>
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="secondary">
            <div class="chart">
                <h2>Total Projects</h2>
                <canvas id="myChart" width="200" height="200"></canvas>
                <div class="complete">
                    <h3>3 Completed</h3>
                    <p>from 5 projects</p>
                </div>
            </div>

            <div class="recent_chores">
                <div class="listing">
                    <div class="title">
                        <div class="category category_color1"></div>
                            <h2>Cleaning</h2>
                            <p>by Clifford Nkansah</p>
                    </div>
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                <div class="listing">
                    <div class="title">
                        <div class="category category_color2"></div>
                            <h2>Pet Care</h2>
                            <p>by Isabella Nkansah</p>
                        </div>
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                    <div class="listing">
                    <div class="title">
                        <div class="category category_color3"></div>
                            <h2>Tech and Electronics</h2>
                            <p>by Perry Nkansah</p>
                        </div>
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                    <div class="listing">
                    <div class="title">
                        <div class="category category_color4"></div>
                            <h2>Home Maintenance</h2>
                            <p>by Kobby Kootin</p>
                        </div>
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                </div>
        </section>
    </div>
    
<script src="../js/scriptdash.js"></script>
</body>
</html>