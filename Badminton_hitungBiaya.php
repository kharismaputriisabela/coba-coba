public function hitungBiaya() {
    // Biaya = 30.000 x jumlah_court
    return 30000 * $this->jumlahCourt;
}

public function tampilkanInformasi() {
    return "Nama: {$this->namaPenyewa} | Tanggal: {$this->tanggalSewa} | Jenis: {$this->jenisLapangan} | Biaya: Rp" . number_format($this->hitungBiaya());
}