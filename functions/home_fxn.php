<?php
require_once('../actions/get_all_assignment_action.php');

// Execute the necessary functions and assign the output to variables
$assignmentsInProgress = getAllInProgressAssignments();
$incompleteAssignments = getAllIncompleteAssignments();
$completedAssignments = getAllCompletedAssignments();
$recentAssignments = getAllRecentAssignments();
