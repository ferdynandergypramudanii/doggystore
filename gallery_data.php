<table class="table table-hover w-100">
     <thead class="table-primary">
          <tr>
               <th>No</th>
               <th class="">Gambar</th>
               <th class="">Deskripsi</th>
               <th class="">Aksi</th>
          </tr>
     </thead>
     <tbody>
          <?php
          include "koneksi.php";

          $hlmn = (isset($_POST['hlmn'])) ? $_POST['hlmn'] : 1;
          $limit = 3;
          $limit_start = ($hlmn - 1) * $limit;
          $no = $limit_start + 1;

          $sql = "SELECT * FROM gallery ORDER BY id DESC LIMIT $limit_start, $limit";
          $hasil = $conn->query($sql);

          while ($row = $hasil->fetch_assoc()) {
               ?>
               <tr>
                    <td><?= $no++ ?></td>
                    <td>
                         <?php
                         if ($row["gambar"] != '') {
                              if (file_exists('img/' . $row["gambar"])) {
                                   ?>
                                   <img src="img/<?= htmlspecialchars($row["gambar"]) ?>" width="100">
                                   <?php
                              }
                         }
                         ?>
                    </td>
                    <td><?= htmlspecialchars($row["deskripsi"]) ?></td>
                    <td>
                         <a href="#" title="edit" class="badge rounded-pill text-bg-success" data-bs-toggle="modal"
                              data-bs-target="#modalEdit<?= $row["id"] ?>">
                              <i class="bi bi-pencil"></i>
                         </a>
                         <a href="#" title="delete" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal"
                              data-bs-target="#modalHapus<?= $row["id"] ?>">
                              <i class="bi bi-x-circle"></i>
                         </a>

                         <!-- Awal Modal Edit -->
                         <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static"
                              data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                   <div class="modal-content">
                                        <div class="modal-header">
                                             <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit
                                                  Gallery</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                  aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="" enctype="multipart/form-data">
                                             <div class="modal-body">
                                                  <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                  <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
                                                  <div class="mb-3">
                                                       <label for="gambar" class="form-label">Ganti
                                                            Gambar</label>
                                                       <input type="file" class="form-control" name="gambar">
                                                  </div>
                                                  <div class="mb-3">
                                                       <label class="form-label">Gambar Lama</label>
                                                       <br>
                                                       <?php if (!empty($row["gambar"]) && file_exists('img/' . $row["gambar"])): ?>
                                                            <img src="img/<?= htmlspecialchars($row["gambar"]) ?>" width="100">
                                                       <?php else: ?>
                                                            <p>Tidak ada gambar.</p>
                                                       <?php endif; ?>
                                                  </div>
                                                  <div class="mb-3">
                                                       <label for="deskripsi" class="form-label">Deskripsi</label>
                                                       <textarea class="form-control" name="deskripsi" rows="3"
                                                            required><?= htmlspecialchars($row["deskripsi"]) ?></textarea>
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
                         <!-- Akhir Modal Edit -->

                         <!-- Awal Modal Hapus -->
                         <div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static"
                              data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                   <div class="modal-content">
                                        <div class="modal-header">
                                             <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi
                                                  Hapus Gallery</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                  aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="">
                                             <div class="modal-body">
                                                  <div class="mb-3">
                                                       <label for="formGroupExampleInput" class="form-label">Yakin akan
                                                            menghapus gambar
                                                            ini?</label>
                                                       <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                       <input type="hidden" name="gambar" value="<?= $row["gambar"] ?>">
                                                  </div>
                                             </div>
                                             <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary"
                                                       data-bs-dismiss="modal">Batal</button>
                                                  <input type="submit" value="Hapus" name="hapus" class="btn btn-danger">
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </div>
                         <!-- Akhir Modal Hapus -->
                    </td>
               </tr>
               <?php
          }
          ?>
     </tbody>
</table>



<?php
$sql1 = "SELECT * FROM gallery";
$hasil1 = $conn->query($sql1);
$total_records = $hasil1->num_rows;
?>

<p>Total gallery : <?php echo $total_records; ?></p>
<nav class="mb-2">
     <ul class="pagination justify-content-end">
          <?php
          $jumlah_page = ceil($total_records / $limit);
          $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
          $start_number = ($hlmn > $jumlah_number) ? $hlmn - $jumlah_number : 1;
          $end_number = ($hlmn < ($jumlah_page - $jumlah_number)) ? $hlmn + $jumlah_number : $jumlah_page;

          if ($hlmn == 1) {
               echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
               echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
          } else {
               $link_prev = ($hlmn > 1) ? $hlmn - 1 : 1;
               echo '<li class="page-item halamann" id="1"><a class="page-link" href="#">First</a></li>';
               echo '<li class="page-item halamann" id="' . $link_prev . '"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
          }

          for ($i = $start_number; $i <= $end_number; $i++) {
               $link_active = ($hlmn == $i) ? ' active' : '';
               echo '<li class="page-item halamann ' . $link_active . '" id="' . $i . '"><a class="page-link" href="#">' . $i . '</a></li>';
          }

          if ($hlmn == $jumlah_page) {
               echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
               echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
          } else {
               $link_next = ($hlmn < $jumlah_page) ? $hlmn + 1 : $jumlah_page;
               echo '<li class="page-item halamann" id="' . $link_next . '"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
               echo '<li class="page-item halamann" id="' . $jumlah_page . '"><a class="page-link" href="#">Last</a></li>';
          }
          ?>
     </ul>
</nav>