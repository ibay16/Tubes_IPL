<?php
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?page=admin");
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/../../config/database.php";
$db = Database::connect();

// ==================================
// LOGIKA UPDATE BOOKING
// ==================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_booking'])) {
    $id = $_POST['id_booking'];
    $status = $_POST['status'];
    $layanan = $_POST['layanan'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    $query = "UPDATE booking SET status = :status, layanan = :layanan, tanggal = :tanggal, jam = :jam WHERE id_booking = :id";
    $stmt = $db->prepare($query);
    $stmt->execute([
        'status' => $status,
        'layanan' => $layanan,
        'tanggal' => $tanggal,
        'jam' => $jam,
        'id' => $id
    ]);

    header("Location: index.php?page=admin");
    exit;
}

// QUERY DATA BOOKING
$stmtBooking = $db->prepare("SELECT * FROM booking ORDER BY tanggal DESC");
$stmtBooking->execute();
$bookings = $stmtBooking->fetchAll();

// QUERY DATA KOMENTAR
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
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .btn {
            padding: 6px 10px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
            display: inline-block;
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

        /* MODAL CSS */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: var(--radius);
            width: 400px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="header">
        Dashboard Admin – ZaraEyelash
        <a href="/Tubes_IPL/index.php" class="back-home">⬅ Halaman Utama</a>
    </div>

    <div class="container">
        <h2>📋 Data Booking Pelanggan</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Layanan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($bookings as $row): ?>
                <tr>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['no_hp']; ?></td>
                    <td><?= $row['layanan']; ?></td>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['jam']; ?></td>
                    <td><strong><?= $row['status'] ?? 'Pending'; ?></strong></td>
                    <td>
                        <button class="btn btn-edit" onclick="openEditModal(<?= htmlspecialchars(json_encode($row)); ?>)">Edit Status</button>
                        <a href="index.php?page=admin&action=delete&id=<?= $row['id_booking']; ?>" class="btn btn-delete" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

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

    <div id="editModal" class="modal">
        <div class="modal-content">
            <h3 style="color:var(--pink)">Edit Booking</h3>
            <form action="" method="POST">
                <input type="hidden" name="id_booking" id="edit_id">
                <div class="form-group">
                    <label>Layanan</label>
                    <input type="text" name="layanan" id="edit_layanan" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" id="edit_tanggal" required>
                </div>
                <div class="form-group">
                    <label>Jam</label>
                    <input type="time" name="jam" id="edit_jam" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="edit_status">
                        <option value="Pending">Pending</option>
                        <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                        <option value="Lunas / Paid">Lunas / Paid</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                    </select>
                </div>
                <button type="submit" name="update_booking" class="btn" style="background:var(--pink); color:white; width:100%">Simpan</button>
                <button type="button" onclick="closeModal()" class="btn" style="background:#eee; width:100%; margin-top:10px;">Batal</button>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(data) {
            document.getElementById("edit_id").value = data.id_booking;
            document.getElementById("edit_layanan").value = data.layanan;
            document.getElementById("edit_tanggal").value = data.tanggal;
            document.getElementById("edit_jam").value = data.jam;
            document.getElementById("edit_status").value = data.status || "Pending";
            document.getElementById("editModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }
    </script>

    <div class="footer">
        &copy; 2025 Zara Eyelash – Admin Panel
    </div>
</body>

</html>