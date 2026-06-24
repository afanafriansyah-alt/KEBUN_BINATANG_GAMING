<?php
/**
 * TAHAP 6: Sistem Manajemen Tiket Kebun Binatang
 * File Antarmuka (Dashboard) utama dengan Bootstrap
 * Menampilkan 3 tabel: Tiket Reguler, Terusan, dan Safari
 * Menggunakan prinsip OOP dan Polimorfisme untuk menampilkan data
 */

// Include file koneksi database
require_once 'koneksi/database.php';

// Include file kelas-kelas OOP
require_once 'classes/Tiket.php';
require_once 'classes/TiketReguler.php';
require_once 'classes/TiketTerusan.php';
require_once 'classes/TiketSafari.php';

// Buat instance database dan buat koneksi
$database = new Database();
$db = $database->connect();

// Ambil data dari database menggunakan static methods
$daftarReguler = TiketReguler::getDaftarReguler($db);
$daftarTerusan = TiketTerusan::getDaftarTerusan($db);
$daftarSafari = TiketSafari::getDaftarSafari($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Tiket Kebun Binatang</title>
    
    <!-- Bootstrap 5 CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome untuk ikon (opsional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Custom CSS untuk styling tambahan */
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container-main {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }
        
        .header-title {
            text-align: center;
            color: #667eea;
            margin-bottom: 10px;
            font-weight: 700;
            font-size: 2.5rem;
        }
        
        .header-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 40px;
            font-size: 1rem;
        }
        
        .section-title {
            color: #fff;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 12px 20px;
            border-radius: 8px;
            margin-top: 30px;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.3rem;
        }
        
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }
        
        table {
            margin-bottom: 0;
        }
        
        table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
        }
        
        table tbody tr:hover {
            background-color: #f0f0f0;
            transition: 0.3s ease;
        }
        
        .badge-reguler {
            background-color: #28a745;
        }
        
        .badge-terusan {
            background-color: #007bff;
        }
        
        .badge-safari {
            background-color: #ff6f00;
        }
        
        .harga-total {
            font-weight: 700;
            color: #667eea;
            font-size: 1.1rem;
        }
        
        .info-detail {
            color: #666;
            font-size: 0.95rem;
            font-style: italic;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container-main container">
        
        <!-- Header -->
        <div class="header">
            <h1 class="header-title">
                <i class="fas fa-ticket-alt"></i> Sistem Manajemen Tiket Kebun Binatang
            </h1>
            <p class="header-subtitle">Dashboard Data Tiket Pengunjung</p>
        </div>

        <!-- ========== TABEL TIKET REGULER ========== -->
        <div class="section-title">
            <i class="fas fa-users"></i> Tabel Tiket Reguler
        </div>

        <?php if (!empty($daftarReguler)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th width="15%">ID Tiket</th>
                            <th width="20%">Nama Pengunjung</th>
                            <th width="12%">Tanggal Kunjungan</th>
                            <th width="10%">Hari</th>
                            <th width="20%">Status Member</th>
                            <th width="18%">Harga Dasar</th>
                            <th width="18%">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $noReguler = 1;
                        foreach ($daftarReguler as $tiket): 
                            // Buat object TiketReguler dari data database
                            $tiketObj = new TiketReguler(
                                $tiket['id_tiket'],
                                $tiket['nama_pengunjung'],
                                $tiket['tanggal_kunjungan'],
                                $tiket['hari_kunjungan'],
                                $tiket['harga_dasar'],
                                $tiket['status_member']
                            );
                        ?>
                            <tr>
                                <td class="text-center"><strong><?php echo $noReguler++; ?></strong></td>
                                <td><span class="badge badge-reguler"><?php echo htmlspecialchars($tiketObj->getIdTiket()); ?></span></td>
                                <td><?php echo htmlspecialchars($tiketObj->getNamaPengunjung()); ?></td>
                                <td><?php echo htmlspecialchars($tiketObj->getTanggalKunjungan()); ?></td>
                                <td><?php echo htmlspecialchars($tiketObj->getHariKunjungan()); ?></td>
                                <td>
                                    <div class="info-detail"><?php echo $tiketObj->tampilkanInformasiTiket(); ?></div>
                                </td>
                                <td>Rp<?php echo number_format($tiketObj->getHargaDasar(), 0, ',', '.'); ?></td>
                                <td><span class="harga-total">Rp<?php echo number_format($tiketObj->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="no-data">
                <i class="fas fa-exclamation-circle"></i> Data Tiket Reguler tidak ditemukan
            </div>
        <?php endif; ?>


        <!-- ========== TABEL TIKET TERUSAN ========== -->
        <div class="section-title">
            <i class="fas fa-roller-coaster"></i> Tabel Tiket Terusan
        </div>

        <?php if (!empty($daftarTerusan)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th width="15%">ID Tiket</th>
                            <th width="20%">Nama Pengunjung</th>
                            <th width="12%">Tanggal Kunjungan</th>
                            <th width="10%">Hari</th>
                            <th width="20%">Paket Wahana</th>
                            <th width="18%">Harga Dasar</th>
                            <th width="18%">Total Harga (+Rp50K)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $noTerusan = 1;
                        foreach ($daftarTerusan as $tiket): 
                            // Buat object TiketTerusan dari data database
                            $tiketObj = new TiketTerusan(
                                $tiket['id_tiket'],
                                $tiket['nama_pengunjung'],
                                $tiket['tanggal_kunjungan'],
                                $tiket['hari_kunjungan'],
                                $tiket['harga_dasar'],
                                $tiket['paket_wahana']
                            );
                        ?>
                            <tr>
                                <td class="text-center"><strong><?php echo $noTerusan++; ?></strong></td>
                                <td><span class="badge badge-terusan"><?php echo htmlspecialchars($tiketObj->getIdTiket()); ?></span></td>
                                <td><?php echo htmlspecialchars($tiketObj->getNamaPengunjung()); ?></td>
                                <td><?php echo htmlspecialchars($tiketObj->getTanggalKunjungan()); ?></td>
                                <td><?php echo htmlspecialchars($tiketObj->getHariKunjungan()); ?></td>
                                <td>
                                    <div class="info-detail"><?php echo $tiketObj->tampilkanInformasiTiket(); ?></div>
                                </td>
                                <td>Rp<?php echo number_format($tiketObj->getHargaDasar(), 0, ',', '.'); ?></td>
                                <td><span class="harga-total">Rp<?php echo number_format($tiketObj->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="no-data">
                <i class="fas fa-exclamation-circle"></i> Data Tiket Terusan tidak ditemukan
            </div>
        <?php endif; ?>


        <!-- ========== TABEL TIKET SAFARI ========== -->
        <div class="section-title">
            <i class="fas fa-globe"></i> Tabel Tiket Safari
        </div>

        <?php if (!empty($daftarSafari)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th width="12%">ID Tiket</th>
                            <th width="18%">Nama Pengunjung</th>
                            <th width="12%">Tanggal Kunjungan</th>
                            <th width="8%">Hari</th>
                            <th width="20%">Asal Negara & Paspor</th>
                            <th width="15%">Harga Dasar</th>
                            <th width="15%">Total (+50% Surcharge)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $noSafari = 1;
                        foreach ($daftarSafari as $tiket): 
                            // Buat object TiketSafari dari data database
                            $tiketObj = new TiketSafari(
                                $tiket['id_tiket'],
                                $tiket['nama_pengunjung'],
                                $tiket['tanggal_kunjungan'],
                                $tiket['hari_kunjungan'],
                                $tiket['harga_dasar'],
                                $tiket['asal_negara'],
                                $tiket['nomor_paspor']
                            );
                        ?>
                            <tr>
                                <td class="text-center"><strong><?php echo $noSafari++; ?></strong></td>
                                <td><span class="badge badge-safari"><?php echo htmlspecialchars($tiketObj->getIdTiket()); ?></span></td>
                                <td><?php echo htmlspecialchars($tiketObj->getNamaPengunjung()); ?></td>
                                <td><?php echo htmlspecialchars($tiketObj->getTanggalKunjungan()); ?></td>
                                <td><?php echo htmlspecialchars($tiketObj->getHariKunjungan()); ?></td>
                                <td>
                                    <div class="info-detail"><?php echo $tiketObj->tampilkanInformasiTiket(); ?></div>
                                </td>
                                <td>Rp<?php echo number_format($tiketObj->getHargaDasar(), 0, ',', '.'); ?></td>
                                <td><span class="harga-total">Rp<?php echo number_format($tiketObj->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="no-data">
                <i class="fas fa-exclamation-circle"></i> Data Tiket Safari tidak ditemukan
            </div>
        <?php endif; ?>

        <!-- Footer -->
        <div class="text-center mt-5" style="color: #999; font-size: 0.9rem;">
            <p>&copy; 2024 Sistem Manajemen Tiket Kebun Binatang | PBO TRPL Afansigma</p>
        </div>

    </div>

    <!-- Bootstrap 5 JS dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
