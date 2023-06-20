<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Streaming Anime Mogies - Anime</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            </div>
            
        </div>
    </header>
    <?php
    include 'koneksi.php';

    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        $sql = "SELECT * FROM movie WHERE title LIKE '%$query%'";
        echo '<script>window.location="home.php?query=' . $query . '"</script>';
    }
    ?>
    <!-- HEADER END -->

    <!-- USER PROFILE START -->
    <section class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 d-flex justify-content-center">
                    <h2 class="mb-4">User Profile</h2>
                    <form>
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName" value="John Doe" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" value="johndoe@example.com" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" value="********" readonly>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- USER PROFILE END -->

    <!-- FOOTER START -->
    <footer class="py-3 bg-dark text-white text-center">
        <div class="container">
            <p>&copy; 2023 Streaming Platform. All rights reserved.</p>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- Load Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>