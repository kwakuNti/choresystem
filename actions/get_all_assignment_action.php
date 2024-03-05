<?php
include "../settings/connection.php";

function getAllAssignments() {
    global $conn;

    // Write the SELECT query
    $sql = "SELECT A.*, C.chorname, P.fname AS assigned_by_name, S.sname AS status_name
    FROM Assignment A
    INNER JOIN Chores C ON A.cid = C.cid
    INNER JOIN People P ON A.who_assigned = P.pid
    INNER JOIN Status S ON A.sid = S.sid";
    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if execution was successful
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Fetch records and assign to variable
            $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $assignments; // Return the result variable
        } else {
            return [];
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        // You can choose to return false or handle the error in a different way
        return false;
    }
}

function getAllInProgressAssignments() {
    global $conn;

    $sql = "SELECT * FROM Assignment WHERE sid = 2 AND date_due > CURDATE()";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $assignmentsInProgress = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignmentsInProgress;
    } else {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}

$test = getAllCompletedAssignments();
print_r($test);

$test1 = getAllInProgressAssignments();
print_r($test1);

$test = getAllInProgressAssignments();
print_r($test);






// Function 3: Get all chore assignments incomplete
function getAllIncompleteAssignments() {
    global $conn;

    $sql = "SELECT * FROM Assignment WHERE sid = 4 AND date_due < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $incompleteAssignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $incompleteAssignments;
    } else {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}

// Function 4: Get all chore assignments completed
function getAllCompletedAssignments() {
    global $conn;

    $sql = "SELECT * FROM Assignment WHERE sid = 3";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $completedAssignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $completedAssignments;
    } else {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}

// Function 5: Get all recent chore assignments
function getAllRecentAssignments() {
    global $conn;

    $sql = "SELECT * FROM Assignment WHERE sid = 2 ORDER BY assignmentid DESC LIMIT 3";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $recentAssignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $recentAssignments;
    } else {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}
