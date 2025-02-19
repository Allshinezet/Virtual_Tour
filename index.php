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
    mysqli_query($conn, "UPDATE pengunjung SET jumlah = jumlah + 1 WHERE tanggal = '$tanggal'");
} else {
    mysqli_query($conn, "INSERT INTO pengunjung (tanggal, jumlah) VALUES ('$tanggal', 1)");
}

// Ambil total pengunjung
$result = mysqli_query($conn, "SELECT SUM(jumlah) AS total_pengunjung FROM pengunjung");
$data = mysqli_fetch_assoc($result);
$total_pengunjung = $data['total_pengunjung'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Virtual Tour SMK 5 Pekanbaru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Styling untuk responsif */
        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        @media (max-width: 768px) {
            .row-cols-md-3 .col {
                width: 100%;
            }
            .contact .info {
                text-align: center;
            }
            .contact .col-lg-5,
            .contact .col-lg-7 {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- HOME -->
<div class='halaman carousel slide' id='myCarousel' data-bs-ride='carousel'>
  <div class='carousel-indicators'>
    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='1' aria-label='Slide 2'></button>
    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='2' aria-label='Slide 3'></button>
  </div>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
      <img src='img/satu_(1).jpg' alt=''>
    </div>
    <div class='carousel-item'>
      <img src='img/satu_(2).jpg' alt=''>
    </div>
    <div class='carousel-item'>
      <img src='img/satu_(3).jpg' alt=''>
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
        <img src='img/satu_(6).jpg' class='img-fluid' alt='foto' style='border-radius: 10px'>
      </div>
      <div class='col-md-6 mt-3 text-dark shadow p-3 mb-5 rounded'>
        <h1 class='fw-bold'>Apa itu Virtual Tour?</h1>
        <p class='fs-4 lh-base' style='text-align: justify;'>
          Virtual Tour merupakan website sistem informasi yang menyajikan berbagai fasilitas yang ada di SMK 5 Pekanbaru dengan foto pemandangan 360 derajat.
          <a href='virtual/index.html' class='text-decoration-none text-primary'>Klik disini untuk melihat virtual tour</a>
        </p>
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
    <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4'>
      <?php foreach ($tampil as $data): ?>
        <div class='col'>
          <div class='card shadow-sm'>
            <img src="admin/assets/img/uploads/<?php echo $data['gambar_tour']; ?>">
            <div class='card-body text-center'>
              <p class='card-text'><?php echo $data['nama_object']; ?></p>
              <a href="view.php?id_object=<?= $data['id_object']; ?>" class='btn btn-sm btn-primary'>View 360</a>
              <a href="details.php?id_object=<?= $data['id_object']; ?>" class='btn btn-sm btn-primary ms-4'>Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End TOUR -->

<!-- FOOTER -->
<footer class="text-center p-3">
    <p>Total Pengunjung: <?php echo $total_pengunjung; ?></p>
</footer>
<!-- END FOOTER -->

<!-- GRAFIK PENGUNJUNG -->
<section id='visitor-chart' class='halaman py-5'>
  <div class='container'>
    <h2 class='text-center'>Grafik Pengunjung</h2>
    <div style="width: 100%; max-width: 600px; margin: auto;">
        <canvas id="visitorChart"></canvas>
    </div>
  </div>
</section>
<!-- END GRAFIK PENGUNJUNG -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('get_visitor_data.php')
    .then(response => response.json())
    .then(data => {
        const labels = data.map(item => item.tanggal);
        const values = data.map(item => item.total_pengunjung);

        const ctx = document.getElementById('visitorChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: values,
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    })
    .catch(error => console.error('Error:', error));
});
</script>

</body>
</html>

<?php include "inc_footer.php"; ?>
