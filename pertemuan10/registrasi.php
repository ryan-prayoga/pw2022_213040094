<?php
require 'function.php';

if (isset($_POST['submit'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('User baru berhasil ditambahkan. Silahkan login!');
            document.location.href = 'login.php';
          </script>";
  } else {
    echo 'User gagal ditambahkan!';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
</head>
<body>
  <h1>Form Registrasi</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required autofocus autocomplete="off">
      </li>
      <li>
        <label for="password1">Password:</label>
        <input type="password" name="password1" id="password1" required>
      </li>
      <li>
        <label for="password2">Konfirmasi Password:</label>
        <input type="password" name="password2" id="password2" required>
      </li>
      <li>
        <button type="submit" name="submit">Registrasi</button>
      </li>
    </ul>
  </form>
</body>

</html>