<?php
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?page=admin");
    exit;
}
// ==================================
// AKTIFKAN ERROR (BANTU DEBUG)
// ==================================
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ==================================
// KONEKSI DATABASE (PDO)
// ==================================
require_once __DIR__ . "/../../config/database.php";

$db = Database::connect();

// ==================================
// QUERY DATA BOOKING
// ==================================
$stmtBooking = $db->prepare("SELECT * FROM booking ORDER BY tanggal DESC");
$stmtBooking->execute();
$bookings = $stmtBooking->fetchAll();

// ==================================
// QUERY DATA KOMENTAR
// ==================================
$stmtKomentar = $db->prepare("SELECT * FROM komentar ORDER BY created_at DESC");
$stmtKomentar->execute();
$comments = $stmtKomentar->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard – ZaraEyelash</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #e91e63;
            --pink-dark: #b0134f;
            --bg: #fde7ef;
            --card: #ffffff;
            --radius: 14px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Inter", sans-serif;
            background: linear-gradient(180deg, var(--bg), #fff);
        }

        .header {
            background: var(--pink);
            color: white;
            text-align: center;
            padding: 24px;
            font-family: "Playfair Display", serif;
            font-size: 28px;
            position: relative;
        }

        .back-home {
            position: absolute;
            right: 20px;
            top: 24px;
            background: white;
            color: var(--pink);
            padding: 6px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .sub-header {
            text-align: center;
            margin-top: 10px;
            color: #555;
            font-size: 14px;
        }

        .container {
            width: 95%;
            margin: 30px auto;
            background: var(--card);
            padding: 24px;
            border-radius: var(--radius);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: var(--pink-dark);
            font-family: "Playfair Display", serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
            font-size: 14px;
        }

        th {
            background: var(--pink);
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        tr:hover td {
            background: #fde7ef;
        }

        .btn {
            padding: 6px 10px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-edit {
            background: #4caf50;
            color: white;
        }

        .btn-delete {
            background: #f44336;
            color: white;
        }

        .footer {
            margin-top: 40px;
            padding: 20px;
            background: #fdacac;
            text-align: center;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        Dashboard Admin – ZaraEyelash
        <a href="/Tubes_IPL/index.php" class="back-home">⬅ Halaman Utama</a>
    </div>

    <div class="sub-header">
        Halaman khusus admin untuk melihat & mengelola data
    </div>

    <!-- ================= BOOKING ================= -->
    <div class="container">
        <h2>📋 Data Booking Pelanggan</h2>

        <table>
            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Layanan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php if (count($bookings) > 0): ?>
                <?php foreach ($bookings as $row): ?>
                    <tr>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['no_hp']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['layanan']; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['jam']; ?></td>
                        <td><?= $row['catatan']; ?></td>
                        <td><?= $row['status'] ?? 'Pending'; ?></td>
                        <td>
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" align="center">Belum ada data booking</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <!-- ================= KOMENTAR ================= -->
    <div class="container">
        <h2>📝 Komentar Pelanggan</h2>

        <table>
            <tr>
                <th>No</th>
                <th>Isi Komentar</th>
                <th>Tanggal</th>
            </tr>

            <?php if (count($comments) > 0): ?>
                <?php $no = 1;
                foreach ($comments as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['isi_komentar']); ?></td>
                        <td><?= $row['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" align="center">Belum ada komentar</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <div class="footer">
        &copy; 2025 Zara Eyelash – Admin Panel<br>
        Sistem Informasi Booking & Komentar Pelanggan
    </div>

</body>

</html>