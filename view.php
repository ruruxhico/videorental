<?php
include 'functions.php';
$videos = getVideos();
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> 
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">All Videos</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if (!empty($videos)): ?>
                <?php foreach ($videos as $video): ?>
                    <div class="col-md-4 mb-4">
                        <div class="video-card">
                            <?php if (!empty($video['poster']) && file_exists($video['poster'])): ?>
                                <img src="<?= htmlspecialchars($video['poster']) ?>" alt="<?= htmlspecialchars($video['title']) ?>" class="video-poster">
                            <?php else: ?>
                                <div class="no-poster-placeholder">No Poster</div>
                            <?php endif; ?>
                            <div class="video-info">
                                <h5 class="video-title"><?= htmlspecialchars($video['title']) ?></h5>
                                <p class="video-director">Director: <?= htmlspecialchars($video['director']) ?></p>
                                <p class="video-year">Year: <?= htmlspecialchars($video['release_year']) ?></p>
                            </div>
                            <div class="video-actions">
                                <a href="index.php?page=edit&id=<?= $video['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="index.php?page=delete&id=<?= $video['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this video?')">Delete</a>
                                <a href="index.php?page=view_single&id=<?= $video['id'] ?>" class="btn btn-primary btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">No videos found.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
