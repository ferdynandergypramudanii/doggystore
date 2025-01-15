<?php
//query untuk mengambil data article
$sql1 = "SELECT * FROM dogshop ORDER BY id DESC";
$hasil1 = $conn->query($sql1);

//menghitung jumlah baris data article
$jumlah_anjing = $hasil1->num_rows;

$sql2 = "SELECT * FROM gallery ORDER BY id DESC";
$hasil2 = $conn->query($sql2);

//menghitung jumlah baris data article
$jumlah_gallery = $hasil2->num_rows;
?>
<div class="d-flex flex-wrap gap-5  justify-content-center pt-4 mt-5 mb-5 pb-5">
     <div class="mt-4">
          <div class="card border border-primary-subtle mb-3 shadow" style="max-width: 18rem;">
               <div class="card-body">
                    <div class="d-flex justify-content-between">
                         <div class="p-3">
                              <h5 class="card-title"><i class="bi bi-newspaper"></i> Jumlah Anjing</h5>
                         </div>
                         <div class="p-3">
                              <span class="badge rounded-pill text-bg-primary fs-2"><?php echo $jumlah_anjing; ?></span>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="mt-4">
          <div class="card border border-primary-subtle mb-3 shadow" style="max-width: 18rem;">
               <div class="card-body">
                    <div class="d-flex justify-content-between">
                         <div class="p-3">
                              <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5>
                         </div>
                         <div class="p-3">
                              <span
                                   class="badge rounded-pill text-bg-primary fs-2"><?php echo $jumlah_gallery; ?></span>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>