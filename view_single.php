<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $video = getVideoById($_GET['id']);
    if ($video):
?>
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Video Details</h3>
    </div>
    <div class="card-body">
        <p><strong>Title:</strong> <?= htmlspecialchars($video['title']) ?></p>
        <p><strong>Director:</strong> <?= htmlspecialchars($video['director']) ?></p>
        <p><strong>Release Year:</strong> <?= htmlspecialchars($video['release_year']) ?></p>
        
        <?php if (!empty($video['poster'])): ?>
            <p><strong>Poster:</strong><br>
                <img src="<?= $video['poster'] ?>" alt="Poster" style="max-width: 200px;">
            </p>
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
