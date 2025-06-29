<?php
include 'functions.php';

if (isset($_GET['id'])) {
    deleteVideo($_GET['id']);
}

header("Location: index.php?page=view");
exit();