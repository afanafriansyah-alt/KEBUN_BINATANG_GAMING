<?php
/**
 * Class TiketTerusan
 * Subclass dari abstract class Tiket untuk menangani tiket terusan
 * Implementasi dari konsep Inheritance (Pewarisan) dalam OOP
 */

require_once 'Tiket.php';

class TiketTerusan extends Tiket {
    
    // ========== PROPERTI TAMBAHAN: Spesifik untuk Tiket Terusan ==========
    protected $paket_wahana;  // Paket wahana yang disertakan dalam tiket terusan


    /**
     * Constructor TiketTerusan
     * Memanggil parent constructor untuk menginisialisasi properti induk
     * dan menginisialisasi properti tambahan spesifik tiket terusan
     * 
     * @param int    $id_tiket         - ID tiket
     * @param string $nama_pengunjung  - Nama pengunjung
     * @param string $tanggal_kunjungan - Tanggal kunjungan (Y-m-d)
     * @param string $hari_kunjungan   - Hari kunjungan
     * @param float  $harga_dasar      - Harga dasar
     * @param string $paket_wahana     - Paket wahana yang termasuk
     */
    public function __construct($id_tiket, $nama_pengunjung, $tanggal_kunjungan, $hari_kunjungan, $harga_dasar, $paket_wahana) {
        // Panggil parent constructor untuk menginisialisasi properti induk
        parent::__construct($id_tiket, $nama_pengunjung, $tanggal_kunjungan, $hari_kunjungan, $harga_dasar);
        
        // Inisialisasi properti tambahan
        $this->paket_wahana = $paket_wahana;
    }


    // ========== GETTER METHOD: Properti Tambahan ==========
    
    /**
     * Getter untuk Paket Wahana
     */
    public function getPaketWahana() {
        return $this->paket_wahana;
    }


    // ========== IMPLEMENTASI ABSTRACT METHODS ==========
    
    /**
     * Implementasi abstract method hitungTotalHarga()
     * Menghitung harga dengan tambahan biaya flat paket wahana
     * Total Harga = harga_dasar + Rp50.000
     * 
     * @return float - Total harga dengan biaya paket wahana
     */
    public function hitungTotalHarga() {
        // Harga dasar ditambah biaya flat paket wahana sebesar Rp50.000
        return $this->harga_dasar + 50000;
    }


    /**
     * Implementasi abstract method tampilkanInformasiTiket()
     * Menampilkan nama paket wahana yang termasuk dalam tiket
     * 
     * @return string - Nama paket wahana
     */
    public function tampilkanInformasiTiket() {
        return $this->paket_wahana;
    }


    // ========== METODE QUERY SPESIFIK: Mengambil data dari database ==========
    
    /**
     * Static method untuk mengambil daftar semua tiket terusan dari database
     * Menjalankan query: SELECT * FROM tabel_tiket WHERE jenis_tiket = 'Terusan'
     * 
     * @param PDO $db - Object koneksi PDO dari class Database
     * @return array  - Array berisi semua data tiket terusan
     */
    public static function getDaftarTerusan($db) {
        try {
            // Persiapkan SQL query dengan prepared statement (untuk keamanan)
            $query = "SELECT * FROM tabel_tiket WHERE jenis_tiket = 'Terusan'";
            $stmt = $db->prepare($query);
            
            // Eksekusi prepared statement
            $stmt->execute();
            
            // Ambil semua hasil dalam bentuk array asosiatif
            $daftarTiket = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $daftarTiket;

        } catch (PDOException $e) {
            // Tangani error jika query gagal
            echo "Error Query Tiket Terusan: " . $e->getMessage();
            return array();
        }
    }
}
?>
