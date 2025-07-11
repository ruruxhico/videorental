<?php
include 'functions.php';
$videos = getVideos();
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"> 
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">All Videos</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Director</th>
                    <th>Release Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($videos)): ?>
                    <?php foreach ($videos as $video): ?>
                        <tr>
                            <td><?= htmlspecialchars($video['title']) ?></td>
                            <td><?= htmlspecialchars($video['director']) ?></td>
                            <td><?= htmlspecialchars($video['release_year']) ?></td>
                            <td>
                                <a href="index.php?page=edit&id=<?= $video['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="index.php?page=delete&id=<?= $video['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this video?')">Delete</a>
                                <a href="index.php?page=view_single&id=<?= $video['id'] ?>" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center">No videos found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
