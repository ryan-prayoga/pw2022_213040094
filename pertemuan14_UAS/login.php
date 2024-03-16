<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
  <div class="card bg-white w-72 p-8 shadow-md text-center">
    <h2 class="mb-4">Login</h2>
    <form action="process_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required class="w-full p-2 mb-2 border border-gray-300 rounded">
      <input type="password" name="password" placeholder="Password" required class="w-full p-2 mb-2 border border-gray-300 rounded">
      <button type="submit" class="w-full p-2 bg-green-500 text-white rounded">Login</button>
    </form>
    <span>
      Belum punya akun? <a href="register.php" class="text-blue-500">Buat Akun</a>
    </span>
  </div>
</body>
</html>