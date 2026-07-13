public function hitungBiaya() {
    return 50000 * $this->durasiJam;
}

public function tampilkanInformasi() {
    return "Nama: {$this->namaPenyewa} | Tanggal: {$this->tanggalSewa} | Jenis: {$this->jenisLapangan} | Biaya: Rp" . number_format($this->hitungBiaya());
}