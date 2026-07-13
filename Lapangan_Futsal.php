<?php
require_once 'PenyewaanLapangan.php';
require_once 'DB.php';

class Futsal extends PenyewaanLapangan {
    protected $jumlahTim;

    public function __construct($id, $nama, $tanggal, $durasi, $jumlahTim) {
        parent::__construct($id, $nama, $tanggal, 'Futsal', $durasi);
        $this->jumlahTim = $jumlahTim;
    }

    public static function getDataFutsal() {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT * FROM penyewaan_lapangan WHERE jenis_lapangan = 'Futsal'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hitungBiaya() { return 50000 * $this->durasiJam; }
    public function tampilkanInformasi() { return "Futsal: {$this->namaPenyewa} - Biaya: Rp" . $this->hitungBiaya(); }
}