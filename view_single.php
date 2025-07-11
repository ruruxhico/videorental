<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $video = getVideoById($_GET['id']);
    if ($video):
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"> 
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Video Details</h3>
    </div>
    <div class="card-body">
        <p><strong>Title:</strong> <?= htmlspecialchars($video['title']) ?></p>
        <p><strong>Director:</strong> <?= htmlspecialchars($video['director']) ?></p>
        <p><strong>Release Year:</strong> <?= htmlspecialchars($video['release_year']) ?></p>
        
        <?php if (!empty($video['poster']) && file_exists($video['poster'])): ?>
        <p><strong>Poster:</strong><br>
            <img src="<?= htmlspecialchars($video['poster']) ?>" style="max-width: 200px;">
        </p>
        <?php else: ?>
            <p><strong>Poster:</strong> No poster available.</p>
        <?php endif; ?>

    </div>
    <div class="card-footer">
        <a href="index.php?page=view" class="btn btn-secondary">Back to List</a>
    </div>
</div>
<?php
    else:
        echo '<div class="alert alert-warning mt-3">Video not found.</div>';
    endif;
} else {
    echo '<div class="alert alert-danger mt-3">No video ID specified.</div>';
}
?>
