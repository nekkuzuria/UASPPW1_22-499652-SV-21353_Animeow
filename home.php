<?php
session_start();
if (!isset($_SESSION['status_login'])) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animeow - Streaming Anime Movie</title>
    <link rel="icon" href="assets/logo.png">
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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

    <!-- MOVIE LIST START -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Featured Movies</h2>
            <div class="row d-flex flex-wrap">
                <?php
                include 'koneksi.php';

                if (isset($_GET['query'])) {
                    $query = $_GET['query'];
                    $sql = "SELECT * FROM movie WHERE title LIKE '%$query%'";
                } else {
                    $sql = "SELECT * FROM movie";
                }

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $image = $row['poster_link'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $id = $row['movie_id'];

                        echo '<div class="col-md-3">
                                <div class="card mb-3">
                                    <a href="movie-detail.php?id=' . $id . '" target="_blank">
                                        <img src="' . $image . '" class="card-img-top" alt="' . $title . '" >  
                                    </a>  
                                </div>
                                <p class="card-title h6 mb-5">' . $title . '</p>
                            </div>';
                    }
                } else {
                    echo 'No results found';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- MOVIE LIST END -->


    <!-- FOOTER START -->
    <footer class="py-3 bg-dark text-white text-center">
        <div class="container">
            <p>&copy; 2023 Animeow. All rights reserved.</p>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- Load Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/script/monochrome/bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>