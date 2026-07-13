<?php
class Basket extends PenyewaanLapangan {
    protected $jumlahPemain;
    protected $penggunaanLampu;

    public function __construct($id, $nama, $tanggal, $durasi, $jumlahPemain, $lampu) {
        parent::__construct($id, $nama, $tanggal, 'Basket', $durasi);
        $this->jumlahPemain = $jumlahPemain;
        $this->penggunaanLampu = $lampu;
    }

    public static function getDataBasket() {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT * FROM penyewaan_lapangan WHERE jenis_lapangan = 'Basket'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hitungBiaya() {
        $biaya = 100000 * $this->durasiJam;
        return $this->penggunaanLampu ? $biaya + 25000 : $biaya;
    }

    public function tampilkanInformasi() { return "Basket: {$this->namaPenyewa} - Biaya: Rp" . $this->hitungBiaya(); }
}