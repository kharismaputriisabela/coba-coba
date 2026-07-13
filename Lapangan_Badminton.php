<?php
class Badminton extends PenyewaanLapangan {
    protected $jumlahCourt;
    protected $kategoriTurnamen;

    public function __construct($id, $nama, $tanggal, $durasi, $jumlahCourt, $kategori) {
        parent::__construct($id, $nama, $tanggal, 'Badminton', $durasi);
        $this->jumlahCourt = $jumlahCourt;
        $this->kategoriTurnamen = $kategori;
    }

    public static function getDataBadminton() {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT * FROM penyewaan_lapangan WHERE jenis_lapangan = 'Badminton'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hitungBiaya() { return 30000 * $this->jumlahCourt * $this->durasiJam; }
    public function tampilkanInformasi() { return "Badminton: {$this->namaPenyewa} - Biaya: Rp" . $this->hitungBiaya(); }
}