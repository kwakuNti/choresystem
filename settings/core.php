<?php
// core.php

session_start();

function getUserRole() {
    if (isset($_SESSION['role_id'])) {
        return $_SESSION['role_id'];
    } else {
        return null;
    }
}

function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login/login_view.php");
        exit();
    }
}

function checkUserRole($required_role) {
    $role_id = getUserRole();

    if (!$role_id || $role_id != $required_role) {
        if ($role_id == 3) {
            header("Location: ../view/UserDashboard.php");
        } else {
            header("Location: ../admin/dash.php");
        }
        exit();
    }
}
