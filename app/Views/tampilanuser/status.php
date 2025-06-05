<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penjualan Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
            background-color: whitesmoke;
        }

        .dropdown-menu {
            background-color: #ffc107;
            /* same color as the navbar */
            border: none;
            /* remove the border */
        }

        .image {
            display: block;
            width: 100%;
            height: auto;
        }

        .text {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border-radius: 5px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            color: white;
            font-size: x-large;
        }

        .text h2 {
            margin: 0 0 10px 0;
        }

        .text p {
            margin: 0 0 20px 0;
        }

        .overlay-image {
            position: absolute;
            top: 10%;
            /* Sesuaikan posisi vertikal */
            left: 5%;
            /* Sesuaikan posisi horizontal */
            width: 400px;
            /* Sesuaikan dengan ukuran gambar overlay */
            height: auto;
        }

        .garuda {
            position: absolute;
            top: 20%;
            /* Sesuaikan posisi vertikal */
            left: 230%;
            /* Sesuaikan posisi horizontal */
            width: 225px;
            /* Sesuaikan dengan ukuran gambar overlay */
            height: auto;
        }

        .gambarrr {
            position: relative;
            width: 500px;
            /* Sesuaikan dengan ukuran gambar latar belakang */
            height: auto;
        }

        .carousel-container {
            position: relative;
            max-width: 750px;
            /* Sesuaikan dengan kebutuhan Anda */
            margin: 0 auto;
            overflow: hidden;
        }

        .carousel-slide {
            display: none;
            width: 100%;
            height: 400px;
        }

        .carousel-slide img {
            width: 100%;
            height: auto;
        }

        .carousel-text {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding: 20px;
            color: white;
            background: rgba(0, 0, 0, 0.7);
        }

        .carousel-text h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <!-- Navbar kecil -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black mb-0" style="height: 38px;">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" style="color: yellow; padding-left:50px;"><i class="fas fa-clock"></i> Setiap hari : 6.00-16.00</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:yellow; padding-left:50px;"><i class="fas fa-phone-alt"></i> No hp : 083875807836</a>
                    </li>
                </ul>
                <span class="navbar-text" style="color: yellow; padding-right: 50px;">
                    Penjualan tiket online
                </span>
            </div>
        </div>
    </nav>
    <!-- end Navbar kecil -->

    <!-- Navbar besar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-warning mb-0" style="height: 85px;">
        <div class="container">
            <a class="navbar-brand" href="#"><b>Tiket Online</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url() ?>/tampilanuser">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>/status">Status</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="dropdown">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= session('nama') ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="<?= base_url() ?>logout">Logout</a></li>
                        </ul>
                    </div>
                </span>
            </div>
        </div>
    </nav>
    <!-- end Navbar besar -->

    <!-- Gambar -->
    <div class="gambarrr">
        <img class="image" src="https://images.pexels.com/photos/399187/pexels-photo-399187.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" width="300" height="200" style="filter: brightness(50%); width: 100vw; height: 50vh;object-fit: cover;">
        <img src="https://4.bp.blogspot.com/-56aHPY7bNS8/WjhxuF3aRRI/AAAAAAAAGEw/bSO6PKQ0cCEFX70Hnm_1Jl4GXb-CJN6mwCLcBGAs/s1600/psms%2Bmedan.png" alt="" class="overlay-image">
        <img src="https://combinesia.web.id/wp-content/uploads/2022/08/IDN.png" alt="" class="garuda">
    </div>
    <div class="text">
        <h2 class="text-center">Website Terbaik Untuk Membeli Tiket</h2>
        <p class="text-center">Temukan tiket pertandingan tim kesukaan anda!</p>
    </div>
    <!-- end Gambar -->

    <!--Text-->
    <div class="p-3 m-3 bg-body-secondary">
        <div class="container" style="text-align: justify;">
            <p class="text-center">Kami senang Anda memilih kami untuk mendapatkan tiket pertandingan sepak bola favorit Anda. Dengan antrian yang cepat dan proses pembelian yang mudah, kami berkomitmen memberikan pengalaman belanja tiket terbaik bagi Anda.
                <br>
                Temukan berbagai pertandingan dari liga-liga terkemuka hingga turnamen internasional, dan pesan tiket Anda dengan aman dan terpercaya. Jangan lewatkan kesempatan untuk menyaksikan aksi ketat cepat langsung dari tribun!
                <br>
                Nikmati pengalaman menonton sepak bola secara langsung dengan tiket dari kami. Terima kasih telah berkunjung, dan selamat menikmati pertandingan!
                <br>
            <h3 class="text-center">Selamat Menonton!</h3>
            </p>
        </div>
    </div>
    <!--Text-->

    <hr style="border: 2px solid black;">
    <br>

    <h3 class="text-center">Daftar Pesanan </h3>

    <!-- Table -->
    <div class="container">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead style="background-color: #4CAF50; color: white;">
                <tr class="text-center">
                    <td>ID PEMBELIAN</td>
                    <td>ID PERTANDINGAN</td>
                    <td>ID TIKET</td>
                    <td>JUMLAH</td>
                    <td>METODE PEMBAYARAN</td>
                    <td>BUKTI PEMBAYARAN</td>
                    <td>TOTAL HARGA</td>
                    <td>TANGGAL PEMBELIAN</td>
                    <td>STATUS</td>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pembelian as $pmb) { ?>
                    <tr class="text-center">
                        <td><?= $pmb['id_pembelian'];  ?></td>
                        <td><?= $pmb['id_pertandingan']; ?></td>
                        <td><?= $pmb['id_tiket']; ?></td>
                        <td><?= $pmb['jumlah']; ?></td>
                        <td><?= $pmb['metode_pembayaran']; ?></td>
                        <td><?= $pmb['bukti_pembayaran']; ?></td>
                        <td><?= $pmb['total_harga']; ?></td>
                        <td><?= $pmb['tanggal_pembelian']; ?></td>
                        <td><?= $pmb['status']; ?></td>
                        <td>
                        <a href="<?= base_url('invoice/cetak/' . $pmb['id_pembelian']) ?>">Cetak Tiket</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- end Table -->
    <br>
    <hr style="border: 2px solid black;">
    <!-- carousel -->
    <div class="carousel-container">
        <div class="carousel-slide">
            <img src="https://wallpapercave.com/wp/wp2124378.jpg" alt="Gambar 1" width="">
            <div class="carousel-text">
                <h2>Sepakbola</h2>
                <p>Sejatinya sepakbola adalah romantisme paling nyata <br> untuk kita yang tidak punya tempat bercerita</p>
            </div>
        </div>
        <div class="carousel-slide">
            <img src="https://wallpapercave.com/wp/wp2124401.jpg" alt="Gambar 2">
            <div class="carousel-text">
                <h2>Sepakbola</h2>
                <p>Sejatinya sepakbola adalah romantisme paling nyata <br> untuk kita yang tidak punya tempat bercerita</p>
            </div>
        </div>
        <div class="carousel-slide">
            <img src="https://i.ytimg.com/vi/S5GJ8IX-b-Y/maxresdefault.jpg" alt="Gambar 3">
            <div class="carousel-text">
                <h2>Sepakbola</h2>
                <p>Sejatinya sepakbola adalah romantisme paling nyata <br> untuk kita yang tidak punya tempat bercerita</p>
            </div>
        </div>
    </div>
    <!-- end carousel -->
    <br>
    <!-- Footer -->
    <footer style="background-color: black; color: white; padding: 20px; text-align: center;">
        <p>Copyright &copy; 2024. All rights reserved.</p>
    </footer>
    <!-- end Footer -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        let slideIndex = 0;
        carousel();

        function carousel() {
            let i;
            const slides = document.getElementsByClassName("carousel-slide");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Ganti angka 2000 dengan waktu (dalam milidetik) antara perpindahan gambar
        }
    </script>
</body>

</html>