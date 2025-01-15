<div class="container">
     <!-- Button trigger modal -->
     <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
          <i class="bi bi-plus-lg"></i> Tambah Anjing
     </button>
     <div class="row">
          <div class="table-responsive" id="petshop_data">

          </div>
          <!-- Awal Modal Tambah -->
          <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
               aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Anjing</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                   aria-label="Close"></button>
                         </div>
                         <form method="post" action="" enctype="multipart/form-data">
                              <div class="modal-body">
                                   <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Nama Anjing</label>
                                        <input type="text" class="form-control" name="nama"
                                             placeholder="contoh: Golden Retriever" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="tgl">Tgl Lahir</label>
                                        <input type="date" class="form-control" name="tgl" required>
                                   </div>

                                   <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Umur Anjing</label>
                                        <input type="text" class="form-control" name="umur"
                                             placeholder="contoh: 1.5 tahun" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Harga</label>
                                        <input type="text" class="form-control" name="harga"
                                             placeholder="contoh: 1.000.000" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="kelamin"
                                             placeholder="contoh: Jantan / Betina" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Nama Breeder</label>
                                        <input type="text" class="form-control" name="namabreeder"
                                             placeholder="contoh: Goldenretriever family" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi"
                                             placeholder="contoh: Bandung" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" name="gambar">
                                   </div>
                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                   <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <!-- Akhir Modal Tambah -->
     </div>
</div>

<!-- JQuery Ajax -->
<script>
     $(document).ready(function () {
          function load_data(hlm) {
               $.ajax({
                    url: "petshop_data.php",
                    method: "POST",
                    data: { hlm: hlm },
                    success: function (data) {
                         $('#petshop_data').html(data);
                    }
               });
          }

          load_data();

          $(document).on('click', '.halaman', function () {
               var hlm = $(this).attr("id");
               load_data(hlm);
          });
     });
</script>

<?php
include "upload_foto.php";

if (isset($_POST['simpan'])) {
     $nama = $_POST['nama'];
     $tanggal = $_POST['tgl'];
     $umur = $_POST['umur'];
     $harga = $_POST['harga'];
     $kelamin = $_POST['kelamin'];
     $namaBreeder = $_POST['namabreeder'];
     $lokasi = $_POST['lokasi'];
     $gambar = '';

     $nama_gambar = $_FILES['gambar']['name'];

     if ($nama_gambar != '') {
          $cek_upload = upload_foto($_FILES["gambar"]);

          if ($cek_upload['status']) {
               $gambar = $cek_upload['message'];
          } else {
               echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=petshop';
            </script>";
               die;
          }
     }

     if (isset($_POST['id'])) {
          $id = $_POST['id'];

          if ($nama_gambar == '') {
               $gambar = $_POST['gambar_lama'];
          } else {
               unlink("img/" . $_POST['gambar_lama']);
          }

          $stmt = $conn->prepare("UPDATE dogshop 
                                SET 
                                nama_anjing = ?,
                                tgl_lahir = ?,
                                umur = ?,
                                harga = ?,
                                jenis_kelamin = ?,
                                nama_toko_peternak = ?,
                                kota_peternak = ?,
                                gambar = ?
                                WHERE id = ?");

          $stmt->bind_param("ssssssssi", $nama, $tanggal, $umur, $harga, $kelamin, $namaBreeder, $lokasi, $gambar, $id);
          $simpan = $stmt->execute();
     } else {
          $stmt = $conn->prepare("INSERT INTO dogshop (gambar, nama_anjing, tgl_lahir, umur, harga, jenis_kelamin, nama_toko_peternak, kota_peternak)
                                VALUES (?,?,?,?,?,?,?,?)");

          $stmt->bind_param("ssssssss", $gambar, $nama, $tanggal, $umur, $harga, $kelamin, $namaBreeder, $lokasi);
          $simpan = $stmt->execute();
     }

     if ($simpan) {
          echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=petshop';
        </script>";
     } else {
          echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=petshop';
        </script>";
     }

     $stmt->close();
     $conn->close();
}

if (isset($_POST['hapus'])) {
     $id = $_POST['id'];
     $gambar = $_POST['gambar'];

     if ($gambar != '') {
          unlink("img/" . $gambar);
     }

     $stmt = $conn->prepare("DELETE FROM dogshop WHERE id = ?");
     $stmt->bind_param("i", $id);
     $hapus = $stmt->execute();

     if ($hapus) {
          echo "<script>
            alert('Hapus data sukses');
            document.location='admin.php?page=petshop';
        </script>";
     } else {
          echo "<script>
            alert('Hapus data gagal');
            document.location='admin.php?page=petshop';
        </script>";
     }

     $stmt->close();
     $conn->close();
}
?>