<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
</head>

<body>

  <h2>Login Admin</h2>

  <?php if (isset($_SESSION['error'])) : ?>
    <p style="color:red;">
      <?= $_SESSION['error'];
      unset($_SESSION['error']); ?>
    </p>
  <?php endif; ?>

  <form method="POST" action="index.php?page=admin&action=login">
    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
  </form>

</body>

</html>