<?php
session_start();
include 'koneksi.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Insert the data into the wishlist table
    $sql = "INSERT INTO wishlist VALUES (" . $user_id . ", " . $movie_id . ")";
    if ($conn->query($sql) === TRUE) {
        echo "<alert>Item added to watchlist successfully</alert>";
    } else {
        echo "<alert>Error</alert>";
    }
}

$conn->close();
?>
