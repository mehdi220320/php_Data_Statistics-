<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to get the current page's filename
function getCurrentPage() {
    return basename($_SERVER['PHP_SELF']);
}
$current_page = getCurrentPage();

// Redirect to log if the user is not logged in
if (!isset($_SESSION['user_id'])||!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}else{
    $user_id=$_SESSION['user_id'];
    $email=$_SESSION['email'];
    $role = $_SESSION['role'];
}

// Define the access control logic
function isAccessAllowed($role, $page) {
    $rolePages = [
        'administrateur' => ['Index.php', 'UsersTable.php','updateuser.php','RequestList.php','RequestTreatment.php','AddAuditeur.php'],
        'auditeur' => ['Index.php','RequestList.php','RequestTreatment.php'],
        'client' => ['Profile.php','MyRequestList.php','CreateRequest.php'],
    ];
    return isset($rolePages[$role]) && in_array($page, $rolePages[$role]);
}

// Redirect to error page if access is not allowed
if ($role && !isAccessAllowed($role, $current_page)) {
    header('Location: error.php');
    exit;
}

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>
<body id="page-top">
<div id="wrapper">
    <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
            </a>
            <hr class="sidebar-divider my-0" />
            <ul class="navbar-nav text-light" id="accordionSidebar">

                <!--     Administrateur Views ...               -->
                <?php if ($role === "administrateur"): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === 'Index.php') ? 'active' : '' ?>" href="Index.php"><i class="fas fa-tachometer-alt"></i><span>Index</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === 'UsersTable.php') ? 'active' : '' ?>" href="UsersTable.php"><i class="fas fa-user"></i><span>Users Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === 'RequestList.php') ? 'active' : '' ?>" href="RequestList.php"><i class="fas fa-user"></i><span>Request List Table</span></a>
                    </li>
                <?php endif; ?>
                <!--     employeur Views ...               -->
                <?php if ($role === "auditeur"): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === ' Index.php') ? 'active' : '' ?>" href="Index.php"><i class="fas fa-user"></i><span>Auditeur</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === 'RequestList.php') ? 'active' : '' ?>" href="RequestList.php"><i class="fas fa-user"></i><span>Request List Table</span></a>
                    </li>
                <?php endif; ?>
                <!--     Client Views ...               -->
                <?php if ($role === "client"): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === 'Profile.php') ? 'active' : '' ?>" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === 'MyRequestList.php') ? 'active' : '' ?>" href="MyRequestList.php"><i class="fas fa-user"></i><span>My Request List Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === 'CreateRequest.php') ? 'active' : '' ?>" href="CreateRequest.php"><i class="fas fa-user"></i><span>Create a Request</span></a>
                    </li>
                <?php endif;?>
                <li class="nav-item">
                    <a class="nav-link " href="logout.php"><i class="fas fa-user"></i><span>Logout </span></a>
                </li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>

