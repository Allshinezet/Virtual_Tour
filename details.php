<?php
include "admin/fungsi.php";
include "inc_header.php";

// Jika tidak ada id di URL
if (!isset($_GET['id_object'])) {
    header('location:../');
    exit;
}

// Koneksi ke database
$conn = koneksi();
$id_object = $conn->real_escape_string($_GET['id_object']);

// Ambil data objek wisata berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM tabel_objek WHERE id_object = '$id_object'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Objek Wisata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Responsif Gambar */
        .tour-details-slider img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .card {
            border: none;
        }
        .modal-body img {
            max-width: 100%;
            height: auto;
        }
        @media (max-width: 768px) {
            .tour-details .row {
                flex-direction: column;
            }
            .modal-body img {
                width: 80%;
            }
        }
    </style>
</head>
<body>

<?php while ($rows = mysqli_fetch_array($query)) { ?>
    <main id='main' class="halaman">
        
        <!-- Breadcrumbs -->
        <section class='breadcrumbs'>
            <div class='container'>
                <div class='d-flex justify-content-between align-items-center'>
                    <h2>Details</h2>
                    <ol>
                        <li><a href='index.php#tour'>Tour</a></li>
                        <li><?php echo $rows['nama_object']; ?></li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- Detail Wisata -->
        <section id='tour-details' class='tour-details py-5'>
            <div class='container'>

                <div class='row gy-4 align-items-center'>
                    <div class='col-lg-8'>
                        <div class='tour-details-slider text-center'>
                            <img src="admin/assets/img/uploads/<?php echo $rows['gambar_detail']; ?>" alt='gambar' 
                                data-bs-toggle='modal' data-bs-target='#exampleModal' type='button'>
                        </div>
                    </div>

                    <div class='col-lg-4'>
                        <div class='card p-4 shadow rounded'>
                            <h3 class='text-center'><?php echo $rows['nama_object']; ?></h3>
                            <p><strong>Deskripsi:</strong> <?php echo $rows['deskripsi']; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Detail Wisata -->

    </main>

    <!-- Modal untuk QR Code -->
    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content text-center'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Scan Untuk Melihat Lokasi Object</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <img src="admin/assets/img/uploads/<?php echo $rows['qrcode']; ?>" alt='QR Code' class='img-fluid'>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php include "inc_footer.php"; ?>

</body>
</html>
