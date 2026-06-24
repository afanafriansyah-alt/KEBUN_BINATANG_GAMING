<?php
/**
 * Abstract Class Tiket
 * Mendeskripsikan struktur umum data tiket untuk sistem tiket kebun binatang
 * Menggunakan prinsip Abstraksi untuk mendefinisikan template yang harus diimplementasikan oleh child class
 */

abstract class Tiket {
    
    // ========== ENKAPSULASI: Protected Properties ==========
    // Properti ini hanya dapat diakses oleh class ini dan child class-nya
    
    protected $id_tiket;              // ID unik tiket
    protected $nama_pengunjung;       // Nama pengunjung pemegang tiket
    protected $tanggal_kunjungan;     // Tanggal kunjungan ke kebun binatang
    protected $hari_kunjungan;        // Hari kunjungan (Senin, Selasa, dst)
    protected $harga_dasar;           // Harga dasar tiket


    /**
     * Constructor untuk Abstract Class Tiket
     * Menginisialisasi properti-properti tiket saat object dibuat
     * atau saat data di-fetch dari database
     * 
     * @param int    $id_tiket         - ID tiket
     * @param string $nama_pengunjung  - Nama pengunjung
     * @param string $tanggal_kunjungan - Tanggal dalam format Y-m-d
     * @param string $hari_kunjungan   - Nama hari (Senin, Selasa, dst)
     * @param float  $harga_dasar      - Harga dasar tiket
     */
    public function __construct($id_tiket, $nama_pengunjung, $tanggal_kunjungan, $hari_kunjungan, $harga_dasar) {
        $this->id_tiket = $id_tiket;
        $this->nama_pengunjung = $nama_pengunjung;
        $this->tanggal_kunjungan = $tanggal_kunjungan;
        $this->hari_kunjungan = $hari_kunjungan;
        $this->harga_dasar = $harga_dasar;
    }


    // ========== GETTER METHODS: Untuk mengakses protected properties ==========
    
    /**
     * Getter untuk ID Tiket
     */
    public function getIdTiket() {
        return $this->id_tiket;
    }

    /**
     * Getter untuk Nama Pengunjung
     */
    public function getNamaPengunjung() {
        return $this->nama_pengunjung;
    }

    /**
     * Getter untuk Tanggal Kunjungan
     */
    public function getTanggalKunjungan() {
        return $this->tanggal_kunjungan;
    }

    /**
     * Getter untuk Hari Kunjungan
     */
    public function getHariKunjungan() {
        return $this->hari_kunjungan;
    }

    /**
     * Getter untuk Harga Dasar
     */
    public function getHargaDasar() {
        return $this->harga_dasar;
    }


    // ========== ABSTRACT METHODS: Template untuk implementasi di child class ==========
    
    /**
     * Abstract method untuk menghitung total harga tiket
     * Setiap child class HARUS mengimplementasikan method ini dengan logika hitung masing-masing
     * (misalnya: berdasarkan kategori umur, jenis tiket, diskon, dll)
     * 
     * @return float - Total harga tiket setelah perhitungan
     */
    abstract public function hitungTotalHarga();


    /**
     * Abstract method untuk menampilkan informasi lengkap tiket
     * Setiap child class HARUS mengimplementasikan method ini
     * untuk menampilkan data tiket sesuai format dan kategori masing-masing
     * 
     * @return void
     */
    abstract public function tampilkanInformasiTiket();
}
?>
