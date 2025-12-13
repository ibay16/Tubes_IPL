<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – ZaraEyelash</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #e91e63;
            --pink-dark: #b0134f;
            --bg: #fde7ef;
            --card: #ffffff;
            --radius: 14px;
        }

        body {
            margin: 0;
            background: linear-gradient(180deg, var(--bg), #fff);
            font-family: "Inter", sans-serif;
        }

        .header {
            text-align: center;
            padding: 22px;
            background: var(--pink);
            color: white;
            font-size: 28px;
            font-family: "Playfair Display", serif;
            letter-spacing: 1px;
        }

        .container {
            width: 92%;
            margin: 30px auto;
            background: var(--card);
            padding: 22px;
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
            margin-top: 14px;
        }

        th {
            background: var(--pink);
            color: white;
            padding: 12px;
            font-size: 15px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            background: #fff;
        }

        tr:hover td {
            background: #fde7ef;
        }

        .btn-edit, .btn-delete {
            padding: 8px 14px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-edit {
            background: var(--pink);
            color: white;
        }

        .btn-edit:hover {
            background: var(--pink-dark);
        }

        .btn-delete {
            background: #ff4d4d;
            color: white;
        }

        .btn-delete:hover {
            background: #d60000;
        }

        /* ===== MODAL ===== */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
        }

        .modal-content {
            background: #fff;
            width: 420px;
            margin: 8% auto;
            padding: 22px;
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .modal-content h3 {
            margin-top: 0;
            color: var(--pink-dark);
            font-family: "Playfair Display", serif;
        }

        .modal-content label {
            display: block;
            margin-top: 12px;
            font-weight: 600;
        }

        .modal-content input,
        .modal-content select,
        .modal-content textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-family: "Inter", sans-serif;
        }

        .modal-actions {
            margin-top: 18px;
            text-align: right;
        }

        .btn-cancel {
            background: #ccc;
            color: #333;
            padding: 8px 14px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }

        .btn-save {
            background: var(--pink);
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="header">Dashboard Admin – ZaraEyelash</div>

<div class="container">
    <h2>Data Booking Pelanggan</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Layanan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Catatan</th>
            <th>Status Transaksi</th>
            <th>Aksi</th>
        </tr>

        <tr>
            <td>Fifin</td>
            <td>08123456789</td>
            <td>fifin@gmail.com</td>
            <td>Eyelash</td>
            <td>2025-01-15</td>
            <td>14:00</td>
            <td>Alergi lem</td>
            <td>Pending</td>
            <td>
                <button class="btn-edit" onclick="openModal()">Edit</button>
                <button class="btn-delete">Hapus</button>
            </td>
        </tr>

        <tr>
            <td>Dina</td>
            <td>082233445566</td>
            <td>dina@gmail.com</td>
            <td>Nail Art</td>
            <td>2025-01-20</td>
            <td>09:30</td>
            <td>-</td>
            <td>Pending</td>
            <td>
                <button class="btn-edit" onclick="openModal()">Edit</button>
                <button class="btn-delete">Hapus</button>
            </td>
        </tr>
    </table>
</div>

<!-- MODAL EDIT -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <h3>Edit Booking</h3>

        <label>Nama</label>
        <input type="text" value="Fifin">

        <label>No HP</label>
        <input type="text" value="08123456789">

        <label>Layanan</label>
        <input type="text" value="Eyelash">

        <label>Status Transaksi</label>
        <select>
            <option>Pending</option>
            <option>Lunas / Paid</option>
            <option>Dibatalkan</option>
            <option>Menunggu Konfirmasi</option>
        </select>

        <label>Catatan</label>
        <textarea rows="3">Alergi lem</textarea>

        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeModal()">Batal</button>
            <button class="btn-save">Simpan</button>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById("editModal").style.display = "block";
}

function closeModal() {
    document.getElementById("editModal").style.display = "none";
}
</script>

</body>
</html>
