<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];

    if (updateVideo($id, $title, $director, $release_year)) {
        header("Location: index.php?page=view");
        exit();
    } else {
        echo '<div class="alert alert-danger">Failed to update video.</div>';
    }
}

if (isset($_GET['id'])) {
    $video = getVideoById($_GET['id']);
    if (!$video) {
        echo '<div class="alert alert-warning">Video not found.</div>';
        return;
    }
} else {
    echo '<div class="alert alert-danger">No video ID provided.</div>';
    return;
}
?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit Video</h3>
    </div>
    <form method="post">
        <input type="hidden" name="id" value="<?= $video['id'] ?>">
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($video['title']) ?>" required>
            </div>
            <div class="form-group">
                <label>Director</label>
                <input type="text" name="director" class="form-control" value="<?= htmlspecialchars($video['director']) ?>" required>
            </div>
            <div class="form-group">
                <label>Release Year</label>
                <input type="number" name="release_year" class="form-control" value="<?= $video['release_year'] ?>" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Update Video</button>
            <a href="index.php?page=view" class="btn btn-default">Cancel</a>
        </div>
    </form>
</div>