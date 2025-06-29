<?php
    if (!function_exists('getVideos')) {
        include_once 'config.php';

        function getVideos() {
            global $conn;
            $query = "SELECT * FROM videos ORDER BY id DESC";
            $result = mysqli_query($conn, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        function getVideoById($id) {
            global $conn;
            $stmt = mysqli_prepare($conn, "SELECT * FROM videos WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_assoc($result);
        }

        function addVideo($title, $director, $release_year) {
            global $conn;
            $stmt = mysqli_prepare($conn, "INSERT INTO videos (title, director, release_year) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssi", $title, $director, $release_year);
            return mysqli_stmt_execute($stmt);
        }

        function updateVideo($id, $title, $director, $release_year) {
            global $conn;
            $stmt = mysqli_prepare($conn, "UPDATE videos SET title = ?, director = ?, release_year = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "ssii", $title, $director, $release_year, $id);
            return mysqli_stmt_execute($stmt);
        }

        function deleteVideo($id) {
            global $conn;
            $stmt = mysqli_prepare($conn, "DELETE FROM videos WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "i", $id);
            return mysqli_stmt_execute($stmt);
        }
    }
?>