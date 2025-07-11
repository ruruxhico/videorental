<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo & Toggle Button -->
    <div class="d-flex align-items-center justify-content-between brand-link">
        <span class="brand-text font-weight-light">Video Rental</span>
        <button id="sidebarToggle" class="sidebar-toggle-btn" title="Toggle Sidebar">☰</button>
    </div>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="index.php?page=video_dashboard" class="nav-link">
                        <i class="fa-solid fa-house nav-icon"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=add" class="nav-link">
                        <i class="nav-icon fas fa-plus-square"></i>
                        <p>Add Video</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=view" class="nav-link">
                        <i class="nav-icon fas fa-video"></i>
                        <p>View All Videos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>


<!-- Sidebar toggle script -->

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("sidebarToggle");

    // Load collapsed state from localStorage
    if (localStorage.getItem("sidebar-collapsed") === "true") {
        document.body.classList.add("sidebar-collapsed");
    }

    toggleBtn.addEventListener("click", () => {
        const collapsed = document.body.classList.toggle("sidebar-collapsed");
        localStorage.setItem("sidebar-collapsed", collapsed);
        document.cookie = "sidebar-collapsed=" + collapsed + "; path=/";
    });
});
</script>




