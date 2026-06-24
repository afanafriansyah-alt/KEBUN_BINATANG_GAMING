<?php
/**
 * File Koneksi Database
 * Menggunakan PDO untuk koneksi yang aman ke database DB_ZOO_PBO_TRPL_AFANSIGMA
 */

class Database {
    // Konfigurasi database
    private $host = 'localhost';
    private $db_name = 'DB_ZOO_PBO_TRPL_AFANSIGMA';
    private $username = 'root';
    private $password = '';
    private $conn;

    /**
     * Fungsi untuk membuat koneksi ke database
     * Menggunakan PDO dengan error handling menggunakan try-catch
     * 
     * @return object|null Mengembalikan object PDO jika berhasil, null jika gagal
     */
    public function connect() {
        $this->conn = null;

        try {
            // DSN (Data Source Name) untuk koneksi PDO ke MySQL
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8mb4';
            
            // Buat koneksi PDO dengan error handling
            $this->conn = new PDO(
                $dsn,
                $this->username,
                $this->password,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Mode error handling
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC  // Default fetch mode
                )
            );

            // Jika koneksi berhasil, tampilkan pesan (opsional, bisa dihapus di production)
            // echo "Koneksi database berhasil!";

        } catch (PDOException $e) {
            // Jika koneksi gagal, tangkap exception dan tampilkan error message
            echo "Error Koneksi Database: " . $e->getMessage();
            return null;
        }

        return $this->conn;
    }

    /**
     * Fungsi untuk mendapatkan koneksi yang sudah dibuat
     * 
     * @return object Mengembalikan object PDO
     */
    public function getConnection() {
        return $this->conn;
    }

    /**
     * Fungsi untuk menutup koneksi database
     */
    public function disconnect() {
        $this->conn = null;
    }
}
?>
