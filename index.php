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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penyewaan Lapangan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }
        
        header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        header p {
            font-size: 1.1em;
            opacity: 0.9;
        }
        
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }
        
        .stat-card h3 {
            color: #667eea;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            opacity: 0.7;
        }
        
        .stat-card .value {
            font-size: 2em;
            font-weight: bold;
            color: #333;
        }
        
        .stat-card.futsal { border-top: 4px solid #FF6B6B; }
        .stat-card.badminton { border-top: 4px solid #4ECDC4; }
        .stat-card.basket { border-top: 4px solid #FFE66D; }
        .stat-card.total { border-top: 4px solid #667eea; }
        
        .content-section {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .content-section h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.8em;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        
        .kategori-section {
            margin-bottom: 40px;
        }
        
        .kategori-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .kategori-header h3 {
            font-size: 1.5em;
            color: #333;
            margin: 0;
        }
        
        .kategori-header .count {
            background: #667eea;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            margin-left: 15px;
            font-size: 0.9em;
            font-weight: bold;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .data-table thead {
            background: #f8f9fa;
        }
        
        .data-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #667eea;
        }
        
        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .data-table tbody tr {
            transition: background 0.2s;
        }
        
        .data-table tbody tr:hover {
            background: #f8f9fa;
        }
        
        .data-table .biaya {
            font-weight: bold;
            color: #667eea;
        }
        
        .empty-message {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
        
        footer {
            text-align: center;
            color: white;
            margin-top: 40px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>⚽ Dashboard Penyewaan Lapangan</h1>
            <p>Sistem Manajemen Penyewaan Lapangan Olahraga</p>
        </header>
        
        <div class="dashboard">
            <div class="stat-card total">
                <h3>Total Penyewaan</h3>
                <div class="value"><?php echo count($semuaData); ?></div>
            </div>
            
            <div class="stat-card futsal">
                <h3>Futsal</h3>
                <div class="value"><?php echo count($kategoriData['Futsal']); ?></div>
            </div>
            
            <div class="stat-card badminton">
                <h3>Badminton</h3>
                <div class="value"><?php echo count($kategoriData['Badminton']); ?></div>
            </div>
            
            <div class="stat-card basket">
                <h3>Basket</h3>
                <div class="value"><?php echo count($kategoriData['Basket']); ?></div>
            </div>
            
            <div class="stat-card total">
                <h3>Total Pendapatan</h3>
                <div class="value">Rp <?php echo number_format($totalPendapatan, 0, ',', '.'); ?></div>
            </div>
        </div>
        
        <div class="content-section">
            <h2>📊 Detail Penyewaan</h2>
            
            <?php foreach ($kategoriData as $kategori => $daftarData): ?>
                <div class="kategori-section">
                    <div class="kategori-header">
                        <h3>
                            <?php 
                            $icon = '';
                            if ($kategori == 'Futsal') $icon = '⚽';
                            elseif ($kategori == 'Badminton') $icon = '🏸';
                            else $icon = '🏀';
                            echo $icon . ' ' . $kategori;
                            ?>
                        </h3>
                        <span class="count"><?php echo count($daftarData); ?> penyewaan</span>
                    </div>
                    
                    <?php if (count($daftarData) > 0): ?>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Detail Penyewaan</th>
                                    <th>Biaya Sewa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $totalKategori = 0;
                                foreach ($daftarData as $item): 
                                    $biaya = $item->hitungBiaya();
                                    $totalKategori += $biaya;
                                ?>
                                    <tr>
                                        <td><?php echo $item->tampilkanInformasi(); ?></td>
                                        <td class="biaya">Rp <?php echo number_format($biaya, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div style="text-align: right; margin-top: 15px; padding-top: 15px; border-top: 2px solid #f0f0f0;">
                            <strong>Total <?php echo $kategori; ?>: </strong>
                            <span class="biaya">Rp <?php echo number_format($totalKategori, 0, ',', '.'); ?></span>
                        </div>
                    <?php else: ?>
                        <div class="empty-message">Tidak ada data penyewaan untuk kategori ini</div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        
        <footer>
            <p>© 2024 Sistem Penyewaan Lapangan | Dibuat dengan ❤️</p>
        </footer>
    </div>
</body>
</html>