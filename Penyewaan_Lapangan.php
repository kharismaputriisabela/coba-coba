<?php
// PenyewaanLapangan.php
abstract class PenyewaanLapangan {
    // Property protected
    protected $idSewa;
    protected $namaPenyewa;
    protected $tanggalSewa;
    protected $jenisLapangan;
    protected $durasiJam;

    // Constructor untuk inisialisasi data dasar
    public function __construct($id, $nama, $tanggal, $jenis, $durasi) {
        $this->idSewa = $id;
        $this->namaPenyewa = $nama;
        $this->tanggalSewa = $tanggal;
        $this->jenisLapangan = $jenis;
        $this->durasiJam = $durasi;
    }

    // Method abstract yang harus diimplementasikan di subclass
    abstract public function hitungBiaya();
    
    abstract public function tampilkanInformasi();
}
?>