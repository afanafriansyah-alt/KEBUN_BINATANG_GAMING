<?php
/**
 * Class TiketReguler
 * Subclass dari abstract class Tiket untuk menangani tiket reguler
 * Implementasi dari konsep Inheritance (Pewarisan) dalam OOP
 */

require_once 'Tiket.php';

class TiketReguler extends Tiket {
    
    // ========== PROPERTI TAMBAHAN: Spesifik untuk Tiket Reguler ==========
    protected $status_member;  // Status membership pengunjung (member/non-member)


    /**
     * Constructor TiketReguler
     * Memanggil parent constructor untuk menginisialisasi properti induk
     * dan menginisialisasi properti tambahan spesifik tiket reguler
     * 
     * @param int    $id_tiket         - ID tiket
     * @param string $nama_pengunjung  - Nama pengunjung
     * @param string $tanggal_kunjungan - Tanggal kunjungan (Y-m-d)
     * @param string $hari_kunjungan   - Hari kunjungan
     * @param float  $harga_dasar      - Harga dasar
     * @param string $status_member    - Status member (member/non-member)
     */
    public function __construct($id_tiket, $nama_pengunjung, $tanggal_kunjungan, $hari_kunjungan, $harga_dasar, $status_member) {
        // Panggil parent constructor untuk menginisialisasi properti induk
        parent::__construct($id_tiket, $nama_pengunjung, $tanggal_kunjungan, $hari_kunjungan, $harga_dasar);
        
        // Inisialisasi properti tambahan
        $this->status_member = $status_member;
    }


    // ========== GETTER METHOD: Properti Tambahan ==========
    
    /**
     * Getter untuk Status Member
     */
    public function getStatusMember() {
        return $this->status_member;
    }


    // ========== IMPLEMENTASI ABSTRACT METHODS ==========
    
    /**
     * Implementasi abstract method hitungTotalHarga()
     * (Isi logika perhitungan di Tahap 5)
     * 
     * @return float
     */
    public function hitungTotalHarga() {
        // TODO: Implementasi logika perhitungan harga untuk tiket reguler
        return 0;
    }


    /**
     * Implementasi abstract method tampilkanInformasiTiket()
     * (Isi logika tampilan di Tahap 5)
     * 
     * @return void
     */
    public function tampilkanInformasiTiket() {
        // TODO: Implementasi logika tampilan informasi tiket reguler
    }


    // ========== METODE QUERY SPESIFIK: Mengambil data dari database ==========
    
    /**
     * Static method untuk mengambil daftar semua tiket reguler dari database
     * Menjalankan query: SELECT * FROM tabel_tiket WHERE jenis_tiket = 'Reguler'
     * 
     * @param PDO $db - Object koneksi PDO dari class Database
     * @return array  - Array berisi semua data tiket reguler
     */
    public static function getDaftarReguler($db) {
        try {
            // Persiapkan SQL query dengan prepared statement (untuk keamanan)
            $query = "SELECT * FROM tabel_tiket WHERE jenis_tiket = 'Reguler'";
            $stmt = $db->prepare($query);
            
            // Eksekusi prepared statement
            $stmt->execute();
            
            // Ambil semua hasil dalam bentuk array asosiatif
            $daftarTiket = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $daftarTiket;

        } catch (PDOException $e) {
            // Tangani error jika query gagal
            echo "Error Query Tiket Reguler: " . $e->getMessage();
            return array();
        }
    }
}
?>
