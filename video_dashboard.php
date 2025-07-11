<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
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
                                            </div>
                                            <div class="video-actions">
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

            </div>
        </section>
    </div>