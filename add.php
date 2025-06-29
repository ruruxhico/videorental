<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];

    if (addVideo($title, $director, $release_year)) {
        header("Location: index.php?page=view");
        exit();
    } else {
        echo '<div class="alert alert-danger">Failed to add video.</div>';
    }
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Video</h3>
    </div>
    <form method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label>Director</label>
                <input type="text" class="form-control" name="director" required>
            </div>
            <div class="form-group">
                <label>Release Year</label>
                <input type="number" class="form-control" name="release_year" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Video</button>
        </div>
    </form>
</div>