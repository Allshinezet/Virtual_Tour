<?php
    include "fungsi.php";
    include "header.php";

    // Jika tidak ada id di url
    if(!isset($_GET['id_object'])) {
      header('location:../');
      exit;
    }
  
    // Ambil id di url
    // untuk menghindari sql injection gunakan fungsi real_escape_string pada fungsi mysqli
    $conn = koneksi();
    $id_object = $conn->real_escape_string($_GET['id_object']);

    // menampilkan data mahasiswa berdasarkan id
    $dt = query("SELECT * FROM tabel_objek WHERE id_object = '$id_object'");

    // Jika tombil edit ditekan
    if(isset($_POST['editwst'])) {
        editwst($_POST);
    }
?>

<h2 class='page mt-3 mb-4'>Edit Data Object</h2>
<div class="card mb-4">
  <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_object" value="<?= $dt['id_object']; ?>">
      <div class="mb-3">
        <label class="form-label">Nama Wisata</label>
        <input type="text" class="form-control" name="nama_object" required value="<?= $dt['nama_object']; ?>">
      </div>
      <div class="mb-3">
        <input type="hidden" name="gambar_lama" value="<?= $dt['gambar_tour']; ?>">
        <label for="formFile" class="form-label">Gambar Tour</label>
        <input class="gambar_tour" type="file" id="formFile" name="gambar_tour" onchange="previewImage()">
        <td colspan="3">
          <img src="assets/img/uploads/<?= $dt['gambar_tour']; ?>" width="120" style="display: block; margin: auto;" class="img-preview">
        </td>
      </div>
      <div class="mb-3">
        <input type="hidden" name="gambar_lama2" value="<?= $dt['gambar_detail']; ?>">
        <label for="formFile" class="form-label">Gambar Detail</label>
        <input class="gambar_detail" type="file" id="formFile" name="gambar_detail" onchange="previewImage2()">
        <td colspan="3">
          <img src="assets/img/uploads/<?= $dt['gambar_detail']; ?>" width="120" style="display: block; margin: auto;" class="img-preview2">
        </td>
      </div>
      <div class="mb-3">
        <input type="hidden" name="gambar_lama3" value="<?= $dt['gambar_360']; ?>">
        <label for="formFile" class="form-label">Gambar 360</label>
        <input class="gambar_360" type="file" id="formFile" name="gambar_360" onchange="previewImage3()">
        <td colspan="3">
          <img src="assets/img/uploads/<?= $dt['gambar_360']; ?>" width="120" style="display: block; margin: auto;" class="img-preview3">
        </td>
      </div>
      <div class="mb-3">
        <input type="hidden" name="gambar_lama4" value="<?= $dt['qrcode']; ?>">
        <label for="formFile" class="form-label">QR Code</label>
        <input class="qrcode" type="file" id="formFile" name="qrcode" onchange="previewImage4()">
        <td colspan="3">
          <img src="assets/img/uploads/<?= $dt['qrcode']; ?>" width="120" style="display: block; margin: auto;" class="img-preview4">
        </td>
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control" rows="3" required value="<?= $dt['deskripsi']; ?>"></input>
      </div>
      <button class="btn btn-primary" name="editwst" type="submit">Simpan</button>
    </form>
  </div>
</div>

<?php 
 include "footer.php";
?>