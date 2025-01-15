<div class="container">
     <!-- Button trigger modal -->
     <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
          <i class="bi bi-plus-lg"></i> Tambah Gallery
     </button>
     <div class="row">
          <div class="table-responsive" id="gallery_data">

          </div>

          <!-- Modal Tambah -->
          <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
               aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Gallery</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                   aria-label="Close"></button>
                         </div>
                         <form method="post" action="" enctype="multipart/form-data">
                              <div class="modal-body">
                                   <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" name="gambar" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                                   </div>
                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                   <input type="submit" value="Simpan" name="simpan" class="btn btn-primary">
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <!-- Akhir Modal Tambah -->
     </div>
</div>


<script>
     $(document).ready(function () {
          function load_data(hlmn) {
               $.ajax({
                    url: "gallery_data.php",
                    method: "POST",
                    data: {
                         hlmn: hlmn
                    },
                    success: function (data) {
                         $('#gallery_data').html(data);
                    }
               });
          }

          load_data();

          $(document).on('click', '.halamann', function () {
               var hlmn = $(this).attr("id");
               load_data(hlmn);
          });
     });


</script>


<?php
include "upload_foto.php";

// Jika tombol simpan diklik
if (isset($_POST['simpan'])) {
     $gambar = '';
     $id = $_POST['id'] ?? null;
     $deskripsi = $_POST['deskripsi'] ?? '';  // Menangkap deskripsi dari form

     // Jika ada file yang dikirim
     if (!empty($_FILES['gambar']['name'])) {
          // Validasi file gambar
          $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
          if (!in_array($_FILES['gambar']['type'], $allowed_types)) {
               echo "<script>
            alert('Hanya file gambar yang diizinkan.');
            document.location='admin.php?page=gallery';
            </script>";
               die;
          }

          // Penamaan otomatis gambar menggunakan timestamp
          $extension = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
          $gambar = time() . '.' . $extension;

          // Pindahkan file ke folder tujuan
          if (!move_uploaded_file($_FILES['gambar']['tmp_name'], "img/" . $gambar)) {
               echo "<script>
            alert('Gagal mengunggah gambar.');
            document.location='admin.php?page=gallery';
            </script>";
               die;
          }

          // Hapus gambar lama jika ada
          if (!empty($_POST['gambar_lama']) && file_exists("img/" . $_POST['gambar_lama'])) {
               unlink("img/" . $_POST['gambar_lama']);
          }
     } else {
          // Jika tidak mengganti gambar, gunakan gambar lama
          $gambar = $_POST['gambar_lama'];
     }

     // Jika ID ada, lakukan update
     if ($id) {
          // Update data jika ID ada, termasuk deskripsi
          $stmt = $conn->prepare("UPDATE gallery SET gambar = ?, deskripsi = ? WHERE id = ?");
          $stmt->bind_param("ssi", $gambar, $deskripsi, $id);
     } else {
          // Insert data baru jika ID tidak ada, termasuk deskripsi
          $stmt = $conn->prepare("INSERT INTO gallery (gambar, deskripsi) VALUES (?, ?)");
          $stmt->bind_param("ss", $gambar, $deskripsi);
     }

     $simpan = $stmt->execute();

     if ($simpan) {
          echo "<script>
        alert('Simpan data sukses');
        document.location='admin.php?page=gallery';
        </script>";
     } else {
          echo "<script>
        alert('Simpan data gagal');
        document.location='admin.php?page=gallery';
        </script>";
     }

     $stmt->close();
     $conn->close();
}

// Jika tombol hapus diklik
if (isset($_POST['hapus'])) {
     $id = $_POST['id'];
     $gambar = $_POST['gambar'];

     // Hapus file gambar jika ada
     if (!empty($gambar) && file_exists("img/" . $gambar)) {
          unlink("img/" . $gambar);
     }

     // Hapus data dari database
     $stmt = $conn->prepare("DELETE FROM gallery WHERE id = ?");
     $stmt->bind_param("i", $id);
     $hapus = $stmt->execute();

     if ($hapus) {
          echo "<script>
        alert('Hapus data sukses');
        document.location='admin.php?page=gallery';
        </script>";
     } else {
          echo "<script>
        alert('Hapus data gagal');
        document.location='admin.php?page=gallery';
        </script>";
     }

     $stmt->close();
     $conn->close();
}
?>