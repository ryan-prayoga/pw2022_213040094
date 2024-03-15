<?php

require 'function.php';

session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST['submit'])) {
  $login = login($_POST);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
</head>
<body>
  <h2>Form Login</h2>
  <form action="" method="post">
    <?php if (isset($login['error'])) : ?>
      <p style="color: red; font-style: italic;"><?= $login['pesan']; ?></p>
    <?php endif; ?>
    <ul>
      <li>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required autofocus autocomplete="off">
      </li>
      <li>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>  
      </li>
      <li>
        <Button type="submit" name="submit">Login</Button>
      </li>
      <li>
        <a href="registrasi.php">Tambah User Baru</a>
      </li>
    </ul>
  </form>
</body>
</html>