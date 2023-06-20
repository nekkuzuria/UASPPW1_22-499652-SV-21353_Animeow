# ANIMEOW - PLATFORM STREAMING ANIME MOVIES 
Amanda Farliana Setyasari (22/499652/SV/21353)

Penjelasan Website - Animeow
Animeow adalah sebuah website platform streaming anime movies yang dirancang untuk memenuhi kebutuhan para penggemar anime. Melalui website ini, pengguna dapat dengan mudah menonton berbagai judul anime populer secara online. Dengan menyediakan koleksi anime yang cukup lengkap, fitur pencarian yang cukup efisien, Animeow berupaya mencakup berbagai permasalahan yang sering dihadapi oleh penggemar anime, seperti sulitnya menemukan anime yang diinginkan, kesulitan dalam menonton anime secara legal, atau keterbatasan aksesibilitas terhadap judul-judul anime tertentu. Dengan demikian, Animeow menjadi solusi yang memudahkan pengguna untuk mengeksplorasi dunia anime dan menikmati tontonan yang mereka sukai.

Kriteria Penilaian
- Desain rapi mengikuti kaidah atau prinsip desain
- Website responsive, dapat diakses melalui device: Mobile, Tablet dan Laptop
- Direct feedback ke pengguna website
- Konten dinamis dari database


Bagaimana Animeow Memenuhi 4 Kriteria Penilaian

** - Desain rapi mengikuti kaidah atau prinsip desain **
Login Page
![image](https://github.com/nekkuzuria/UASPPW1_22-499652-SV-21353_Animeow/assets/44936062/6c00f210-8b67-451a-ba8e-577e06b0384d)
```html
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
```
Desain Umum: Form login dan form sign up menggunakan pendekatan desain kartu tiga dimensi (3D). Terdapat dua sisi pada setiap kartu: bagian depan (card-front) untuk form login dan bagian belakang (card-back) untuk form sign up. Pengguna dapat memilih antara kedua sisi dengan mengklik opsi "Log In" atau "Sign Up". Setiap kartu memiliki efek animasi yang memberikan kesan tiga dimensi.
Form Login: Kartu depan (card-front) berisi form login. Terdapat input field untuk memasukkan username (loguser) dan password (logpass). Icon ikonografi digunakan untuk mengilustrasikan jenis input field yang sesuai (ikon pengguna dan ikon kunci). Tombol "Login" digunakan untuk mengirimkan form login.
Form Sign Up: Kartu belakang (card-back) berisi form sign up. Terdapat input field untuk memasukkan email (logemail), username (loguser), password (logpass1), dan konfirmasi password (logpass2). Icon ikonografi juga digunakan untuk mengilustrasikan jenis input field yang sesuai. Tombol "Sign Up" digunakan untuk mengirimkan form sign up.


Home Page
![image](https://github.com/nekkuzuria/UASPPW1_22-499652-SV-21353_Animeow/assets/44936062/311ed707-31e0-4d32-a0e9-d07688d21158)
```html
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
```
Bagian ini menampilkan daftar film anime yang dipilih sebagai fitur utama. Film-film tersebut ditampilkan dalam bentuk kartu (card) dengan gambar poster film, judul film, dan deskripsi singkat. Setiap kartu film memiliki tautan yang mengarahkan pengguna ke halaman detail film (movie-detail.php) ketika diklik. Daftar film yang ditampilkan dapat disesuaikan berdasarkan hasil pencarian yang dikirimkan melalui query string.

Movie Details Page
![image](https://github.com/nekkuzuria/UASPPW1_22-499652-SV-21353_Animeow/assets/44936062/28321b13-8a8a-4eb8-b0ef-5e2f1f663d84)
```html
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
```
Desain Umum: Bagian ini terdiri dari dua kolom dalam sebuah baris. Kolom pertama (col-md-6) digunakan untuk menampilkan poster film, sedangkan kolom kedua (col-md-6) digunakan untuk menampilkan informasi terkait film.
Poster Film: Poster film ditampilkan menggunakan elemen <img> dengan class "img-fluid poster". Poster film diambil dari link yang tersimpan dalam variabel $image.
Informasi Film: Informasi film ditampilkan dalam kolom kedua. Terdapat judul film (title) yang ditampilkan sebagai elemen <h2>. Informasi lainnya seperti tahun rilis (release_year), durasi (duration), dan studio produksi (studio) ditampilkan sebagai elemen <p>. Deskripsi film (description) ditampilkan sebagai elemen <p> juga.


** - Website responsive, dapat diakses melalui device: Mobile, Tablet dan Laptop **
Desktop
![image](https://github.com/nekkuzuria/UASPPW1_22-499652-SV-21353_Animeow/assets/44936062/87d0a172-3301-4676-ae6d-7f4d725a9f77)
Tablet
![image](https://github.com/nekkuzuria/UASPPW1_22-499652-SV-21353_Animeow/assets/44936062/89edc98f-82af-49cf-8a02-4ad579773ce1)
Mobile
![image](https://github.com/nekkuzuria/UASPPW1_22-499652-SV-21353_Animeow/assets/44936062/06ee409c-a828-43a2-9c64-c7523d5f2ffc)



