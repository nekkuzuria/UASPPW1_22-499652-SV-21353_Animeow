<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];

    $query = "SELECT movie.*, studio.studio FROM movie INNER JOIN studio ON movie.studio_id = studio.studio_id WHERE movie.movie_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];

    echo '<title>' . $title . ' - Streaming Anime Movies - Animeow</title>';
    ?>
    <!-- Load CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/logo.png">
</head>

<body>
    <!-- HEADER START -->
    <header class="py-1">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center logo-home">
                <a href="home.php">
                    <img src="assets/logo.png" alt="Movie Platform Logo" class="me-3">
                </a>
            </div>
            <div class="d-flex align-items-center">
                <form method="GET" class="search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="query" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <a href="watchlist.php" class="mt-4 "><i class="fas fa-heart heart-icon mb-4"></i></a>
                <div class="dropdown">
                    <a class="text-white me-3 dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="uil uil-user-circle user-icon"></i>
                    </a>
                    <ul class="dropdown-menu mt-3" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="profile.php">Your Profile</a></li>
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END -->
    <!-- MOVIE DETAIL START -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    include 'koneksi.php';

                    if (isset($_GET['query'])) {
                        $query = $_GET['query'];
                        $sql = "SELECT * FROM movie WHERE title LIKE '%$query%'";
                        echo '<script>window.location="home.php?query=' .$query . '"</script>';  
                    } else {

                        $query = "SELECT movie.*, studio.studio FROM movie INNER JOIN studio ON movie.studio_id = studio.studio_id WHERE movie.movie_id='$id'";
                        $result = mysqli_query($conn, $query);

                        while (mysqli_fetch_assoc($result)) {
                            $image = $row['poster_link'];
                            $description = $row['description'];
                            $title = $row['title'];
                            $releaseYear = $row['release_year'];
                            $duration = $row['duration'];
                            $studio = $row['studio'];
                            $video = $row['video_link'];
                            $_SESSION['movie_id'] = $row['movie_id'];

                            echo '  <img src="' . $image . '" alt="Movie Poster" class="img-fluid poster">
                            </div>
                            <div class="col-md-6">
                                <h2 class="mb-4">' . $title . '</h2>
                                <p><strong>Release Year:</strong> ' . $releaseYear . '</p>
                                <p><strong>Duration:</strong> ' . $duration . '</p>
                                <p><strong>Studio:</strong> ' . $studio . '</p>
                                <h4 class="mt-4">Description</h4>
                                <p> ' . $description . '</p>
                                <a href="' . $video . '" class="btn btn-primary mt-4" target="_blank">Watch Now</a>
                                <a href="add_to_wishlist.php" class="btn btn-outline-danger mt-4"><i class="fas fa-heart"></i> Add to Watchlist</a>
                            </div>';
                        }
                    }
                    ?>


                </div>
            </div>
    </section>
    <!-- MOVIE DETAIL END -->

    <!-- FOOTER START -->
    <footer class="py-3 bg-dark text-white text-center">
        <div class="container">
            <p>&copy; 2023 Animeow. All rights reserved.</p>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- Load JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>