<?php
include "admin/fungsi.php";
include "inc_header.php";

// Koneksi ke database
$conn = koneksi();

// Mendapatkan tanggal hari ini
$tanggal = date('Y-m-d');

// Cek apakah sudah ada entri untuk hari ini
$result = mysqli_query($conn, "SELECT * FROM pengunjung WHERE tanggal = '$tanggal'");
if (mysqli_num_rows($result) > 0) {
    // Jika sudah ada, update jumlah pengunjung
    mysqli_query($conn, "UPDATE pengunjung SET jumlah = jumlah + 1 WHERE tanggal = '$tanggal'");
} else {
    // Jika belum ada, insert entri baru
    mysqli_query($conn, "INSERT INTO pengunjung (tanggal, jumlah) VALUES ('$tanggal', 1)");
}

// Ambil total pengunjung
$result = mysqli_query($conn, "SELECT SUM(jumlah) AS total_pengunjung FROM pengunjung");
$data = mysqli_fetch_assoc($result);
$total_pengunjung = $data['total_pengunjung'];
?>

<!-- HOME -->
<div class='halaman carousel slide' id='myCarousel' data-bs-ride='carousel'>
  <div class='carousel-indicators'>
    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='1' aria-label='Slide 2'></button>
    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='2' aria-label='Slide 3'></button>
  </div>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
      <img src='img/satu_(1).jpg' alt='' />
    </div>
    <div class='carousel-item'>
      <img src='img/satu_(2).jpg' alt='' />
    </div>
    <div class='carousel-item'>
      <img src='img/satu_(3).jpg' alt='' />
    </div>
  </div>
  <button class='carousel-control-prev' type='button' data-bs-target='#myCarousel' data-bs-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#myCarousel' data-bs-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>
<!-- END HOME -->

<!-- ABOUT -->
<section id='about' class='halaman p-5'>
  <div class='container mt-5'>
    <div class='row align-items-center justify-content-between'>
      <div class='col-md-6'>
        <img src='img/satu_(6).jpg' class='img-fluid' alt='foto' style='border-radius: 10px' />
      </div>
      <div class='card-about col-md-6 mt-3 text-dark shadow p-3 mb-5 rounded'>
        <div class='h-100 p-3'>
          <h1 class='fw-bold'>Apa itu Virtual Tour?</h1>
          <p class='fs-4 lh-base' style='text-align: justify;'>
          Virtual Tour merupakan website sistem informasi yang menyajikan berbagai fasilitas yang ada di SMK 5 Peknabaru, SMK 5 Pekanbaru dengan foto pemandangan 360 derajat. 
          <a href='virtual/index.html' class='text-decoration-none text-primary'>Klik disini untuk melihat virtual tour</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End ABOUT -->

<?php
$tampil = queryAll("SELECT * FROM tabel_objek");
?>
<!-- TOUR -->
<section id='tour' class='halaman py-5 text-dark'>
  <div class='container'>
    <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5'>
      <?php
      foreach ($tampil as $data) :
      ?>
        <div class='col'>
          <div class='card shadow-sm mt-5'>
            <img src="admin/assets/img/uploads/<?php echo $data['gambar_tour']; ?>">
            <div class='card-body'>
              <p class='card-text'><?php echo $data['nama_object']; ?></p>
              <div class='d-flex justify-content-center align-items-center'>
                <a href="view.php?id_object=<?= $data['id_object']; ?>" class='btn btn-sm btn-primary'>View 360</a>
                <a href="details.php?id_object=<?= $data['id_object']; ?>" class='btn btn-sm btn-primary ms-4'>Detail</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End TOUR -->

<!-- CONTACT -->
<section id='contact' class='contact'>
  <div class='container'>
    <div class='section-title'>
      <h2>Contact</h2>
    </div>

    <div class='row contact-card shadow p-3 mb-5 rounded'>
      <div class='col-lg-5'>
        <div class='info'>
          <div class='address mb-5'>
            <i class='bi bi-geo-alt'></i>
            <h4>Lokasi :</h4>
            <p>Jl. Yos Sudarso, Umban Sari, Kec. Rumbai, Kota Pekanbaru, Riau 28266</p>
          </div>
          <div class='email mb-5'>
            <i class='bi bi-envelope'></i>
            <h4>Email :</h4>
            <p>allshinezet@gmail.com</p>
          </div>
          <div class='phone mb-5'>
            <i class='bi bi-phone'></i>
            <h4>Nomor :</h4>
            <p>+6285271941854</p>
          </div>
        </div>
      </div>

      <div class='col-lg-7'>
        <form action='' method='post' role='form'>
          <div class='row'>
            <div class='col-md-6 form-group'>
              <input type='text' name='Nama' class='form-control' id='name' placeholder='Name' required />
            </div>
            <div class='col-md-6 form-group mt-3 mt-md-0'>
              <input type='email' name='Email' class='form-control' id='email' placeholder='Email' required />
            </div>
          </div>
          <div class='form-group mt-3'>
            <input type='text' class='form-control' name='Subject' id='subject' placeholder='Subject' required />
          </div>
          <div class='form-group mt-3'>
            <textarea class='form-control' name='Message' rows='5' placeholder='Message' required></textarea>
          </div>
          <button class='btn btn-primary mt-3' type='submit' name='proses'>Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- End CONTACT -->

<?php
if (isset($_POST['proses'])) {
  $nama = $_POST['Nama'];
  $email = $_POST['Email'];
  $subject = $_POST['Subject'];
  $message = $_POST['Message'];
  mysqli_query($conn, "INSERT INTO data_form (Nama, Email, Subjek, Pesan) VALUES ('$nama', '$email', '$subject', '$message')") or die(mysqli_error($conn));

  echo "<script>
                alert('Berhasil Disimpan');
             </script>";
}
?>

<!-- FOOTER -->
<footer>
    <div class="container text-center">
        <p>Total Pengunjung: <?php echo $total_pengunjung; ?></p>
    </div>
</footer>
<!-- END FOOTER -->

<!-- GRAFIK PENGUNJUNG -->
<section id='visitor-chart' class='halaman py-5'>
  <div class='container'>
    <h2 class='text-center'>Grafik Pengunjung</h2>
    <canvas id="visitorChart" width="400" height="200"></canvas>
  </div>
</section>
<!-- END GRAFIK PENGUNJUNG -->

<?php
include "inc_footer.php";
?>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('get_visitor_data.php') // Pastikan path ini benar
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const labels = data.map(item => item.tanggal);
            const values = data.map(item => item.total_pengunjung);

            const ctx = document.getElementById('visitorChart').getContext('2d');
            const visitorChart = new Chart(ctx, {
                type: 'line', // Mengubah tipe grafik menjadi 'line'
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Pengunjung',
                        data: values,
                        fill: false, // Tidak mengisi area di bawah garis
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.1 // Mengatur kelengkungan garis
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error:', error));
    });
</script>