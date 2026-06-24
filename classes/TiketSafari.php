<?php
/**
 * Class TiketSafari
 * Subclass dari abstract class Tiket untuk menangani tiket safari
 * Implementasi dari konsep Inheritance (Pewarisan) dalam OOP
 */

require_once 'Tiket.php';

class TiketSafari extends Tiket {
    
    // ========== PROPERTI TAMBAHAN: Spesifik untuk Tiket Safari ==========
    protected $asal_negara;   // Asal negara pengunjung safari
    protected $nomor_paspor;  // Nomor paspor pengunjung internasional


    /**
     * Constructor TiketSafari
     * Memanggil parent constructor untuk menginisialisasi properti induk
     * dan menginisialisasi properti tambahan spesifik tiket safari
     * 
     * @param int    $id_tiket         - ID tiket
     * @param string $nama_pengunjung  - Nama pengunjung
     * @param string $tanggal_kunjungan - Tanggal kunjungan (Y-m-d)
     * @param string $hari_kunjungan   - Hari kunjungan
     * @param float  $harga_dasar      - Harga dasar
     * @param string $asal_negara      - Asal negara pengunjung
     * @param string $nomor_paspor     - Nomor paspor
     */
    public function __construct($id_tiket, $nama_pengunjung, $tanggal_kunjungan, $hari_kunjungan, $harga_dasar, $asal_negara, $nomor_paspor) {
        // Panggil parent constructor untuk menginisialisasi properti induk
        parent::__construct($id_tiket, $nama_pengunjung, $tanggal_kunjungan, $hari_kunjungan, $harga_dasar);
        
        // Inisialisasi properti tambahan
        $this->asal_negara = $asal_negara;
        $this->nomor_paspor = $nomor_paspor;
    }


    // ========== GETTER METHODS: Properti Tambahan ==========
    
    /**
     * Getter untuk Asal Negara
     */
    public function getAsalNegara() {
        return $this->asal_negara;
    }

    /**
     * Getter untuk Nomor Paspor
     */
    public function getNomorPaspor() {
        return $this->nomor_paspor;
    }


    // ========== IMPLEMENTASI ABSTRACT METHODS ==========
    
    /**
     * Implementasi abstract method hitungTotalHarga()
     * (Isi logika perhitungan di Tahap 5)
     * 
     * @return float
     */
    public function hitungTotalHarga() {
        // TODO: Implementasi logika perhitungan harga untuk tiket safari
        return 0;
    }


    /**
     * Implementasi abstract method tampilkanInformasiTiket()
     * (Isi logika tampilan di Tahap 5)
     * 
     * @return void
     */
    public function tampilkanInformasiTiket() {
        // TODO: Implementasi logika tampilan informasi tiket safari
    }


    // ========== METODE QUERY SPESIFIK: Mengambil data dari database ==========
    
    /**
     * Static method untuk mengambil daftar semua tiket safari dari database
     * Menjalankan query: SELECT * FROM tabel_tiket WHERE jenis_tiket = 'Safari'
     * 
     * @param PDO $db - Object koneksi PDO dari class Database
     * @return array  - Array berisi semua data tiket safari
     */
    public static function getDaftarSafari($db) {
        try {
            // Persiapkan SQL query dengan prepared statement (untuk keamanan)
            $query = "SELECT * FROM tabel_tiket WHERE jenis_tiket = 'Safari'";
            $stmt = $db->prepare($query);
            
            // Eksekusi prepared statement
            $stmt->execute();
            
            // Ambil semua hasil dalam bentuk array asosiatif
            $daftarTiket = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $daftarTiket;

        } catch (PDOException $e) {
            // Tangani error jika query gagal
            echo "Error Query Tiket Safari: " . $e->getMessage();
            return array();
        }
    }
}
?>
