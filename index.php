<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">

     <!-- bootstrap icon -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary p-4">
          <div class="container">
               <a class="navbar-brand" href="#">
                    <img src="./img/paw.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Doggy Store
               </a>

               <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                              <a class="nav-link" aria-current="page" href="#"><span><img
                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABEUlEQVRIS+2UTQ4BQRCFzSkIiZ8QLDiBWDiBy9i4AReylIi4ABIb8bMgbsErqZbWpmfezGR2JnmpdE/3+6p/qoNCzl+Qs38hCaCEZJaQzBlBDyY5FiDma6ilpkfEIQNhAGK+gtrQVQE1RAoSB7Azv8F0oIANYoWBRAHCzO0VUBAfIMrcnK1sUywkDMCY0xAXkMScgriAHWb1oLse6IW56xhT1+0qI+6hvpnnAp76o4HImhsvgZy18fH1AeKur29hJsFEgDHcZlDXcT2gPYEWVn8qgLw5RU/KJ/Q3swJ+slLDsP5UK/gDvo6P2tcsZyCvZZWsXt8wKVAp1PfnFpTc+TnUSQnZYt7Uro20FUvzcwe8ANqiUhkj6HowAAAAAElFTkSuQmCC" /></span>
                                   Home</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="#"><span><img
                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAB0UlEQVRIS9WUzSvlURjHXc0CSzWDvCUTkmKjLGxkJsbGmJLiD5A1hVgiCnvTbCw0kxJqEjJWWA8lKXQVIawUO3y+t+d3+93j0u13k5z69JzznOflPOctlPLKLfTK8VPiJUgl6U9oh/QEF3CH3Qx0wr3fJ16CbgzGEwzsmsl38qUE2Uwe2cq/IP/BD5iDFWg052Vkg83NI+thDW6gFM68JG4Ff5hog1mTshuBfhiGQXMcQg44Ovm0wm/Q9kaaP0Ed43W4hc++VazS/wotsGB+35FauSr5Zroc5AFkQC1sugl2UZRDD0x4K0BeQybkwanpc5EncAmffLa99EdhG6rcBBdmnG/Omi+AYwugqg6tX4Lct77fvhBdGBRL5xmzRTpIHehf6IMPoP1vskD/kR2QBtNQYfpFpFYu/Rjo8KNn6D8DZYyevjlL6Exk574J3X21eG/lI/ortwKNH8xJe1gJG6DHo2p+QbXNbyG7rD+FrAFVGNl3W1Bsxya8BEG/kCf+bqA3SdBMdbp6ZValJ/bo6Eov+fSBKjgnQJYT3BvqWylONsFz2xZPH6iC95VA34K+h2RaGOciL4B7TXVj9Nz1pwdpOzjpa4/erKAPKuHk7z/BI+F0YRmSae3JAAAAAElFTkSuQmCC" /></span>Pet
                                   shop</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="#"><span><img
                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABAElEQVRIS2NkoDFgpLH5DMPLAn9gcHUAsQaFwXYdqL8EiLeBzEEOohdAvjiFhsO03wMylNEt+A+VpTReUMxBNozuFrQAfVQNxK1AXENC0BHtgw9AQ/mB+CMQC9DCAlw+4AJathCIY4H4BxaLifYBLkcvAErEAzGITqSGBQlQQ0AGgtjzkQwNB7JXoVlCkg+0gJpPQw0AuRoUNKAggoFvQIY+EN9BEiPaApBBIMNBluAD14CSxkAMiw+iLQAFCcjVxACQWlh8EG0BMQZjUzNwFjwEOkeOXGej6XsA5CuCxJDLIlBx3QnE6hRacgmovxKIMYprCs3Frp3Sopmgo4a+BQCT1zgZO1N1UwAAAABJRU5ErkJggg==" /></span>
                                   Gallery</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="login.php"><span><img
                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA7UlEQVRIS2NkoDFgpLH5DKRYcAboGCUgPgjEB6D0RSD9H58jSbEAm0HvgIYfgloIsvQSuoW4LAAp1MXhskSguCMQOwCxHJqak0C+BbIYLgvweRtZjxrQMGuoZXFQg1HMJGQBsjzMUlL04IxkbIaNWoCSHggFkTI0Od5D0oU1CEmJMGQDPgIN/g3EIrSy4DXQ4A9ArEorC0AZ7CcQv6SVBdgyOVXjYNQCvGU8ctKWAoaVOxDbAXECKYUdvuI6Glp6gopr5GQKMn8TEPsTU1zji0RkObIrHGwWgCoTkItpVmVis5SgGCl1MkHDsCkAAGHQTBkMWFBjAAAAAElFTkSuQmCC" /></span>
                                   Login</a>
                         </li>
                    </ul>
                    <form class="d-flex" role="search">
                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
               </div>
          </div>
     </nav>

     <!-- Jumbotron / Hero -->
     <div class="p-5 mb-4 bg-body-tertiary rounded-3 bg-primary-subtle">
          <div class="container py-5">
               <h1 class="display-5 fw-bold">Selamat Datang di Doggy Store</h1>
               <p class="col-md-8 fs-4">Temukan anjing pilihan anda disini</p>
               <button class="btn btn-primary btn-lg" type="button">Explore</button>
          </div>
     </div>

     <!-- pet shop -->
     <div class="mt-5">
          <div class="container">
               <div>
                    <h1>Pet shop</h1>
                    <p>Berikut adalah daftar hewan anjing yang tersedia di platform kami</p>
               </div>
               <div class="mt-5 d-flex justify-content-center flex-wrap gap-5">
                    <?php
                    $sql = "SELECT * FROM dogshop ORDER BY id DESC";
                    $hasil = $conn->query($sql);

                    while ($row = $hasil->fetch_assoc()) {
                         ?>
                         <div class="card" style="width: 18rem; ">
                              <img src="img/<?= $row["gambar"] ?>" class="card-img-top image-ratio" alt="gambar anjing">
                              <div class="card-body">
                                   <h5 class="card-title"><?= $row["nama_anjing"] ?></h5>
                                   <div class="row mt-3">
                                        <p class="col"><span><i class="bi bi-calendar-day"></i></span>
                                             <?= $row["tgl_lahir"] ?></p>
                                        <p class="col"><span><i class="bi bi-cake2"></i></span> <?= $row["umur"] ?></p>
                                   </div>
                                   <div class="row">
                                        <p class="col"><strong>Rp</strong> <?= $row["harga"] ?></p>
                                        <p class="col"><?= $row["jenis_kelamin"] ?></p>
                                   </div>
                                   <div class="row">
                                        <p class="col"><span><i class="bi bi-shop"></i></span>
                                             <?= $row["nama_toko_peternak"] ?></p>
                                        <p class="col"><span><i class="bi bi-geo-alt-fill"></i></span>
                                             <?= $row["kota_peternak"] ?></p>
                                   </div>
                              </div>
                         </div>
                         <?php
                    }
                    ?>
               </div>
          </div>
     </div>

     <!-- Gallery -->
     <div class="">
          <div class="container mt-5">
               <div>
                    <h1>Gallery</h1>
                    <p>Berikut adalah daftar dokumentasi pengiriman hewan saat tiba di lokasi pelanggan kami</p>
               </div>
               <div class="mt-5 d-flex justify-content-center gap-5">
                    <?php
                    $sql = "SELECT * FROM gallery ORDER BY id DESC";
                    $hasil = $conn->query($sql);
                    if ($hasil) {
                         while ($row = $hasil->fetch_assoc()) {
                              ?>
                              <div class="card" style="width: 18rem;">
                                   <img src="img/<?= $row["gambar"] ?>" class="card-img-top image-ratio" alt="...">
                                   <div class="card-body">
                                        <p class="card-text"><?= $row["deskripsi"] ?></p>
                                   </div>
                              </div>
                              <?php
                         }
                    }
                    ?>
               </div>
          </div>
     </div>

     <footer class="bg-primary-subtle mt-5 p-5">
          <div class="container">
               <div>
                    <div>
                         <h2 class="" href="#">
                              <img src="./img/paw.png" alt="Logo" width="50" height="39"
                                   class="d-inline-block align-text-top">
                              Doggy Store
                         </h2>
                         <p>Platform khusus penjualan hewan anjing</p>
                    </div>
                    <div class="row">
                         <div class="mt-4 col ">
                              <p><span><i class="bi bi-calendar-day"></i></span> Hari Kerja</p>
                              <p>Senin - Jumat</p>
                              <p><span><i class="bi bi-clock"></i></span> Jam Operasional</p>
                              <p><strong>09:00 - 21:00</strong></p>
                         </div>
                         <div class="mt-4 col">
                              <p><span><i class="bi bi-building"></i></span> Alamat Kantor</p>
                              <p>Jl. Merdeka No. 21, Semarang Timur, Rejosari, Kota Semarang</p>
                              <p><span><i class="bi bi-telephone-fill"></i></span> No Handphone / WA</p>
                              <p>081136114811</p>
                         </div>
                         <div class="mt-4 col">
                              <p><span><i class="bi bi-envelope"></i></span> Email</p>
                              <p>doggystore@gmail.com</p>
                              <p><span><i class="bi bi-instagram"></i></span> instagram</p>
                              <p>doggystoreofficial</p>
                         </div>
                    </div>
               </div>
          </div>
     </footer>

     <div class="">
          <div class="container">
               <div class="text-center">
                    <p class="p-4 mb-0"><strong>Copyright © 2025 Ferdynand Ergy Pramudani. All rights reserved.</strong>
                    </p>
               </div>
          </div>
          <div class="text-center bg-primary-subtle">
               <p class="p-4 mb-0"><strong>A11.2023.15389</strong></p>
          </div>
     </div>



     <!-- Boxicons -->
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
          crossorigin="anonymous"></script>
</body>

</html>