<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Booking - Zara Eyelash</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .status-pending {
      background-color: #ffc107;
      color: #000;
    }

    .status-konfirmasi {
      background-color: #0dcaf0;
      color: #fff;
    }

    .status-lunas {
      background-color: #198754;
      color: #fff;
    }

    .btn-home {
      display: block;
      margin-top: 12px;
      text-align: center;
      padding: 11px;
      border-radius: 9px;
      background: #ddd;
      color: #333;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3 class="text-center mb-4">Cek Riwayat Booking</h3>

        <form action="index.php" method="GET" class="mb-5">
          <input type="hidden" name="page" value="riwayat">
          <div class="input-group">
            <input type="text" name="search" class="form-control"
              placeholder="Masukkan Nomor HP Anda (Contoh: 08123...)"
              value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" required>
            <button class="btn btn-primary" type="submit">Cari Riwayat</button>
          </div>
          <a href="index.php?page=home" class="btn-home">
            Kembali ke Halaman Utama
          </a>
        </form>

        <?php if (isset($_GET['search'])): ?>
          <?php if (!empty($bookings)): ?>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead class="table-dark">
                  <tr>
                    <th>Tanggal & Jam</th>
                    <th>Layanan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($bookings as $b): ?>
                    <tr>
                      <td>
                        <?= date('d-m-Y', strtotime($b['tanggal'])) ?><br>
                        <small class="text-muted"><?= $b['jam'] ?></small>
                      </td>
                      <td><?= $b['layanan'] ?></td>
                      <td>
                        <span class="badge bg-<?= ($b['status'] == 'Pending') ? 'warning' : 'success' ?>">
                          <?= $b['status'] ?>
                        </span>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <div class="alert alert-danger text-center">
              Data tidak ditemukan untuk nomor HP tersebut.
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

</body>

</html>