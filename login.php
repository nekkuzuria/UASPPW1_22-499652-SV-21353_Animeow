<!-- Kurang icon transisi -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Animeow</title>
    <link rel="icon" href="assets/logo.png">
    <!-- Load CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <a href="#" class="logo" target="_blank">
        <img src="assets/logo.png" alt="">
    </a>

    <!-- LOGIN FORM START -->
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log" ></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Log In</h4>
                                            <form method="POST" autocomplete="off">
                                                <div class="form-group">
                                                    <input type="text" name="loguser" class="form-style" placeholder="Your Username" id="loguser" autocomplete="none">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="new-password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <input type="submit" name="login" value="Login" class="btn mt-4">
                                            </form>
                                            <?php
                                            if (isset($_POST['login'])) {
                                                include 'koneksi.php';
                                                $username = $_POST['loguser'];
                                                $password = $_POST['logpass'];

                                                $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . MD5($password). "'");
                                                if (mysqli_num_rows($cek) > 0) {
                                                    $d = mysqli_fetch_object($cek);
                                                    session_start();
                                                    $_SESSION['status_login'] = true;
                                                    $_SESSION['user_id'] = $d->user_id;
                                                    echo '<script>window.location="home.php"</script>';
                                                } else {
                                                    echo '<script>alert("Username or password is incorrect")</script>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Sign Up</h4>
                                            <form method="POST" autocomplete="false">
                                                <div class="form-group mt-2">
                                                    <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="none">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="loguser" class="form-style" placeholder="Your Username" id="loguser" autocomplete="none">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass1" class="form-style" placeholder="Your Password" id="logpass1" autocomplete="new-password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass2" class="form-style" placeholder="Confirm Your Password" id="logpass2" autocomplete="new-password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <input type="submit" name="signup" value="Sign Up" class="btn mt-4">
                                            </form>
                                            <?php
                                            if (isset($_POST['signup'])) {
                                                include 'koneksi.php';
                                                $email          = $_POST['logemail'];
                                                $username       = $_POST['loguser'];
                                                $password1      = $_POST['logpass1'];
                                                $password2      = $_POST['logpass2'];

                                                if($password1 != $password2){
                                                    echo '<script>alert("Password confirmation doesn\'t match");</script>';
                                                } else{
                                                    $insert = mysqli_query($conn, "INSERT INTO user (username, email, password) VALUES ('" . $username . "', '" . $email . "', '" . MD5($password1) . "')");
                                                    if($insert){
                                                        echo '<script>alert("Sign up successful! Please login.")</script>';
                                                        echo '<script>window.location="login.php"</script>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN FORM END -->

    <!-- FOOTER START -->
    <footer class="py-3 bg-dark text-white text-center">
        <div class="container">
            <p>&copy; 2023 Animeow. All rights reserved.</p>
        </div>
    </footer>
    <!-- FOOTER END -->


    <!-- Load JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/script/monochrome/bundle.min.js"></script>
</body>

</html>