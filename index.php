<?php
include 'functions.php';
session_start();

$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Video Rental System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include 'menu.php'; ?>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <?php
                switch ($page) {
                    case 'add': include 'add.php'; break;
                    case 'edit': include 'edit.php'; break;
                    case 'delete': include 'delete.php'; break;
                    case 'view': include 'view.php'; break;
                    case 'view_single': include 'view_single.php'; break;
                    default:
                        echo '<div class="alert alert-info mt-3">Welcome to the Video Rental System!</div>';
                }
                ?>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <strong>&copy; <?= date("Y") ?> Video Rental</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>
</div>

<!-- AdminLTE Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
