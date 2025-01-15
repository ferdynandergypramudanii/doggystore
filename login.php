<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) {
     header("location:admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $username = $_POST['user'];

     //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
     $password = md5($_POST['pass']);

     //prepared statement
     $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

     //parameter binding 
     $stmt->bind_param("ss", $username, $password);//username string dan password string

     //database executes the statement
     $stmt->execute();

     //menampung hasil eksekusi
     $hasil = $stmt->get_result();

     //mengambil baris dari hasil sebagai array asosiatif
     $row = $hasil->fetch_array(MYSQLI_ASSOC);

     //check apakah ada baris hasil data user yang cocok
     if (!empty($row)) {
          //jika ada, simpan variable username pada session
          $_SESSION['username'] = $row['username'];

          //mengalihkan ke halaman admin
          header("location:admin.php");
     } else {
          //jika tidak ada (gagal), alihkan kembali ke halaman login
          header("location:login.php");
     }

     //menutup koneksi database
     $stmt->close();
     $conn->close();
} else {
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
                    <a class="navbar-brand" href="index.php">
                         <img src="./img/paw.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                         Doggy Store
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                         aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                    </button>
               </div>
          </nav>

          <!-- form  -->
          <section class="mt-5">
               <div class="container d-flex justify-content-center">
                    <form class="p-5 border border-2 border-primary-subtle rounded-4 w-50" action="" method="post">
                         <div class="text-center">
                              <img src="./img/paw.png" alt="" width="60" height="60">
                              <h1>Login</h1>
                              <p>Silahkan Login untuk memulai pembelian/penjualan!</p>
                         </div>
                         <div class="mb-3 mt-5">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" class="form-control" id="username" name="user" placeholder="Username">
                              <div id="emailHelp" class="form-text">We'll never share your credential with anyone else.</div>
                         </div>
                         <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" class="form-control" id="password" name="pass" placeholder="Password">
                         </div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
          </div>



          <!-- Boxicons -->
          <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
               integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
               crossorigin="anonymous"></script>
     </body>

     </html>
     <?php
}
?>