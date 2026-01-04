<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow-sm" style="width: 380px;">
    <div class="card-body p-4">

      <h4 class="text-center mb-4 fw-bold">Login Admin</h4>

      <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger text-center py-2">
          <?= $_SESSION['error'];
          unset($_SESSION['error']); ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="index.php?page=admin&action=login">

        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Login
        </button>
      </form>

      <div class="text-center mt-3">
        <a href="index.php" class="text-decoration-none small">
          ← Kembali ke Home
        </a>
      </div>

    </div>
  </div>

</body>

</html>