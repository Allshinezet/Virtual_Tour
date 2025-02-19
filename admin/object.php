<?php 
  
  $data = queryAll("SELECT * FROM tabel_objek");

?>

<h1 class='page mt-3 mb-4'>Data Object</h1>
<a href="tambah_object.php" class='btn btn-primary mb-3'>Tambah Object</a>
<div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
  <div class='table-responsive'>
    <table class='table table-striped table-bordered'>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Gambar Tour</th>
          <th>Gambar Detail</th>
          <th>Gambar 360</th>
          <th>QR Code</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php
        $no = 1;
        foreach($data as $row) :
      ?>
      <tbody>
        <?php if(empty($data)) : ?>
        <tr>
            <td colspan="4">Data tidak ditemukan!</td>
        </tr>
        <?php endif; ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['nama_object']; ?></td>
          <td><img src="assets/img/uploads/<?php echo $row['gambar_tour']; ?>" width="60"></td>
          <td><img src="assets/img/uploads/<?php echo $row['gambar_detail']; ?>" width="60"></td>
          <td><img src="assets/img/uploads/<?php echo $row['gambar_360']; ?>" width="60"></td>
          <td><img src="assets/img/uploads/<?php echo $row['qrcode']; ?>" width="60"></td>
          <td><?php echo $row['deskripsi']; ?></td>
          <td>
            <a href="edit_object.php?id_object=<?= $row['id_object']; ?>" class="btn btn-success mb-3"><i class="bi bi-pencil-square"></i></a>
            <a onclick="return confirm('Apakah yakin menghapus data ?')" href="hapus_object.php?id_object=<?= $row['id_object']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>        
    </table>
  </div>
</div>