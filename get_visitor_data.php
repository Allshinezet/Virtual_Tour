<?php
include "admin/fungsi.php"; // Pastikan ini mengandung koneksi ke database
$conn = koneksi();

// Ambil data pengunjung
$query = "SELECT tanggal, SUM(jumlah) as total_pengunjung FROM pengunjung GROUP BY tanggal";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>