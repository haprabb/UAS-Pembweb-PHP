<?php
session_start();
include "../config/connection.php";

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/admin-style.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Travel Admin</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="<?php echo $page === 'dashboard' ? 'active' : ''; ?>">
                <a href="?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="<?php echo $page === 'users' ? 'active' : ''; ?>">
                <a href="?page=users"><i class="fas fa-users"></i> User Management</a>
            </li>
            <li class="<?php echo $page === 'packages' ? 'active' : ''; ?>">
                <a href="?page=packages"><i class="fas fa-box"></i> Tour Packages</a>
            </li>
            <li class="<?php echo $page === 'transport' ? 'active' : ''; ?>">
                <a href="?page=transport"><i class="fas fa-bus"></i> Transportation</a>
            </li>
            <li class="<?php echo $page === 'hotels' ? 'active' : ''; ?>">
                <a href="?page=hotels"><i class="fas fa-hotel"></i> Hotels/Partners</a>
            </li>
            <li class="<?php echo $page === 'bookings' ? 'active' : ''; ?>">
                <a href="?page=bookings"><i class="fas fa-calendar-check"></i> Bookings</a>
            </li>
            <li class="<?php echo $page === 'finance' ? 'active' : ''; ?>">
                <a href="?page=finance"><i class="fas fa-money-bill"></i> Financial</a>
            </li>
            <li class="<?php echo $page === 'promos' ? 'active' : ''; ?>">
                <a href="?page=promos"><i class="fas fa-percent"></i> Promos</a>
            </li>
            <li class="<?php echo $page === 'reviews' ? 'active' : ''; ?>">
                <a href="?page=reviews"><i class="fas fa-star"></i> Reviews</a>
            </li>
            <li class="<?php echo $page === 'settings' ? 'active' : ''; ?>">
                <a href="?page=settings"><i class="fas fa-cog"></i> Settings</a>
            </li>
            <li class="<?php echo $page === 'reports' ? 'active' : ''; ?>">
                <a href="?page=reports"><i class="fas fa-chart-bar"></i> Reports</a>
            </li>
            <li class="<?php echo $page === 'roles' ? 'active' : ''; ?>">
                <a href="?page=roles"><i class="fas fa-user-shield"></i> Roles</a>
            </li>
            <li class="<?php echo $page === 'website' ? 'active' : ''; ?>">
                <a href="?page=website"><i class="fas fa-globe"></i> Website</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="ml-auto">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="../logic/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid">
            <?php
            switch($page) {
                case 'dashboard':
                    include 'pages/dashboard.php';
                    break;
                case 'users':
                    include 'pages/users.php';
                    break;
                case 'packages':
                    include 'pages/packages.php';
                    break;
                case 'transport':
                    include 'pages/transport.php';
                    break;
                case 'hotels':
                    include 'pages/hotels.php';
                    break;
                case 'bookings':
                    include 'pages/bookings.php';
                    break;
                case 'finance':
                    include 'pages/finance.php';
                    break;
                case 'promos':
                    include 'pages/promos.php';
                    break;
                case 'reviews':
                    include 'pages/reviews.php';
                    break;
                case 'settings':
                    include 'pages/settings.php';
                    break;
                case 'reports':
                    include 'pages/reports.php';
                    break;
                case 'roles':
                    include 'pages/roles.php';
                    break;
                case 'website':
                    include 'pages/website.php';
                    break;
                default:
                    include 'pages/dashboard.php';
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/js/admin-script.js"></script>

</body>
</html>
