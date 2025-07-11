<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];

    $poster = null;

    if (isset($_FILES['poster']) && $_FILES['poster']['error'] === 0) {
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


    if (updateVideo($id, $title, $director, $release_year, $poster)) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"> 
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit Video</h3>
    </div>
    <form method="post" enctype="multipart/form-data">
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

            <div class="form-group">
            <label>Change Poster (optional)</label>
            <input type="file" name="poster" class="form-control">
            </div>

        <?php if (!empty($video['poster'])): ?>
            <div class="form-group">
                <label>Current Poster:</label><br>
                <img src="<?= $video['poster'] ?>" alt="Poster" style="max-width: 150px;">
            </div>
        <?php endif; ?>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Update Video</button>
            <a href="index.php?page=view" class="btn btn-default">Cancel</a>
        </div>
    </form>
</div>