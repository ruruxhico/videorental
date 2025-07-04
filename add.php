<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];

    $poster = '';

    if (isset($_FILES['poster']) && $_FILES['poster']['error'] == 0) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $posterName = basename($_FILES['poster']['name']);
        $targetFile = $uploadDir . time() . '_' . $posterName;

        if (move_uploaded_file($_FILES['poster']['tmp_name'], $targetFile)) {
            $poster = $targetFile;
        }
    }

    if (addVideo($title, $director, $release_year, $poster)) {
        header("Location: index.php?page=view");
        exit();
    } else {
        echo '<div class="alert alert-danger">Failed to add video.</div>';
    }
}
?>

<div class="card card-primary" enctype="multipart/form-data">
    <div class="card-header">
        <h3 class="card-title">Add New Video</h3>
    </div>
    <form method="post" enctype="multipart/form-data">
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
            <div class="form-group">
                <label>Poster Image</label>
                <input type="file" class="form-control" name="poster">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Video</button>
        </div>
    </form>
</div>