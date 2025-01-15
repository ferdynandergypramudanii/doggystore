<?php
session_start();

include "koneksi.php";

//check jika belum ada user yang login arahkan ke halaman login
if (!isset($_SESSION['username'])) {
     header("location:login.php");
}
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

     <!-- jquery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>


<body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary p-4">
          <div class="container">
               <a class="navbar-brand" href="index.php">
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
                              <a class="nav-link hover-effect px-3 py-2 rounded-4" aria-current="page"
                                   href="admin.php"><span><i class="bi bi-table"></i></span>
                                   Dashboard</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link hover-effect px-3 py-2 rounded-4"
                                   href="admin.php?page=petshop"><span><img
                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAB0UlEQVRIS9WUzSvlURjHXc0CSzWDvCUTkmKjLGxkJsbGmJLiD5A1hVgiCnvTbCw0kxJqEjJWWA8lKXQVIawUO3y+t+d3+93j0u13k5z69JzznOflPOctlPLKLfTK8VPiJUgl6U9oh/QEF3CH3Qx0wr3fJ16CbgzGEwzsmsl38qUE2Uwe2cq/IP/BD5iDFWg052Vkg83NI+thDW6gFM68JG4Ff5hog1mTshuBfhiGQXMcQg44Ovm0wm/Q9kaaP0Ed43W4hc++VazS/wotsGB+35FauSr5Zroc5AFkQC1sugl2UZRDD0x4K0BeQybkwanpc5EncAmffLa99EdhG6rcBBdmnG/Omi+AYwugqg6tX4Lct77fvhBdGBRL5xmzRTpIHehf6IMPoP1vskD/kR2QBtNQYfpFpFYu/Rjo8KNn6D8DZYyevjlL6Exk574J3X21eG/lI/ortwKNH8xJe1gJG6DHo2p+QbXNbyG7rD+FrAFVGNl3W1Bsxya8BEG/kCf+bqA3SdBMdbp6ZValJ/bo6Eov+fSBKjgnQJYT3BvqWylONsFz2xZPH6iC95VA34K+h2RaGOciL4B7TXVj9Nz1pwdpOzjpa4/erKAPKuHk7z/BI+F0YRmSae3JAAAAAElFTkSuQmCC" /></span>Pet
                                   shop</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link hover-effect px-3 py-2 rounded-4"
                                   href="admin.php?page=gallery"><span><img
                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABAElEQVRIS2NkoDFgpLH5DMPLAn9gcHUAsQaFwXYdqL8EiLeBzEEOohdAvjiFhsO03wMylNEt+A+VpTReUMxBNozuFrQAfVQNxK1AXENC0BHtgw9AQ/mB+CMQC9DCAlw+4AJathCIY4H4BxaLifYBLkcvAErEAzGITqSGBQlQQ0AGgtjzkQwNB7JXoVlCkg+0gJpPQw0AuRoUNKAggoFvQIY+EN9BEiPaApBBIMNBluAD14CSxkAMiw+iLQAFCcjVxACQWlh8EG0BMQZjUzNwFjwEOkeOXGej6XsA5CuCxJDLIlBx3QnE6hRacgmovxKIMYprCs3Frp3Sopmgo4a+BQCT1zgZO1N1UwAAAABJRU5ErkJggg==" /></span>
                                   Gallery</a>
                         </li>
                    </ul>
                    <ul style="list-style: none;">
                         <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-primary fw-bold" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   <?= $_SESSION['username'] ?>
                              </a>
                              <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                              </ul>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>

     <section class="mt-5">
          <div class="container">
               <?php
               if (isset($_GET['page'])) {
                    ?>
                    <h4 class="lead display-6 pb-4 border-bottom border-primary-subtle"><?= ucfirst($_GET['page']) ?></h4>
                    <?php
                    include($_GET['page'] . ".php");
               } else {
                    ?>
                    <h1 class="lead display-5 pb-4 border-bottom border-primary-subtle">Dashboard</h1>
                    <?php
                    include("dashboard.php");
               }
               ?>
          </div>
     </section>

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
                    <div class="d-flex justify-content-between flex-wrap">
                         <div class="mt-4 ">
                              <p><span><i class="bi bi-calendar-day"></i></span> Hari Kerja</p>
                              <p>Senin - Jumat</p>
                              <p><span><i class="bi bi-clock"></i></span> Jam Operasional</p>
                              <p><strong>09:00 - 21:00</strong></p>
                         </div>
                         <div class="mt-4">
                              <p><span><i class="bi bi-building"></i></span> Alamat Kantor</p>
                              <p>Jl. Merdeka No. 21, Semarang Timur, Rejosari, Kota Semarang</p>
                              <p><span><i class="bi bi-telephone-fill"></i></span> No Handphone / WA</p>
                              <p>081136114811</p>
                         </div>
                         <div class="mt-4">
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
                    <p class="p-4 mb-0">Copyright © 2025 Ferdynand Ergy Pramudani. All rights reserved
                    </p>
               </div>
          </div>
     </div>



     <!-- Boxicons -->
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
          crossorigin="anonymous"></script>
</body>

</html>