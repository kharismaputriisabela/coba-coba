<?php
require_once 'classes/DB.php';
require_once 'classes/Futsal.php';
require_once 'classes/Badminton.php';
require_once 'classes/Basket.php';

$pdo = DB::getInstance();
$query = "SELECT * FROM penyewaan_lapangan";
$stmt = $pdo->query($query);
$semuaData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPendapatan = 0;
$kategoriData = ['Futsal' => [], 'Badminton' => [], 'Basket' => []];

foreach ($semuaData as $row) {
    // Instansiasi objek berdasarkan kategori untuk menggunakan method class
    if ($row['jenis_lapangan'] == 'Futsal') {
        $obj = new Futsal($row['id_sewa'], $row['nama_penyewa'], $row['tanggal_sewa'], $row['durasi_jam'], $row['jumlah_tim']);
    } elseif ($row['jenis_lapangan'] == 'Badminton') {
        $obj = new Badminton($row['id_sewa'], $row['nama_penyewa'], $row['tanggal_sewa'], $row['durasi_jam'], $row['jumlah_court'], $row['kategori_turnamen']);
    } else {
        $obj = new Basket($row['id_sewa'], $row['nama_penyewa'], $row['tanggal_sewa'], $row['durasi_jam'], $row['jumlah_pemain'], $row['penggunaan_lampu']);
    }
    
    $kategoriData[$row['jenis_lapangan']][] = $obj;
    $totalPendapatan += $obj->hitungBiaya();
}
?>

<!DOCTYPE html>
<html>
<head><title>Sistem Penyewaan Lapangan</title></head>
<body>
    <h1>Statistik Penyewaan</h1>
    <p>Total Penyewaan: <?php echo count($semuaData); ?></p>
    <p>Total Pendapatan: Rp <?php echo number_format($totalPendapatan); ?></p>

    <?php foreach ($kategoriData as $kategori => $daftarData): ?>
        <h2>Kategori: <?php echo $kategori; ?></h2>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Detail Informasi</th>
                <th>Biaya Sewa</th>
            </tr>
            <?php foreach ($daftarData as $item): ?>
                <tr>
                    <td><?php echo $item->tampilkanInformasi(); ?></td>
                    <td>Rp <?php echo number_format($item->hitungBiaya()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</body>
</html>