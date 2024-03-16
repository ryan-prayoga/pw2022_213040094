<?php
require 'function.php';
if (isset($_POST['submit'])) {
  if (isset($_POST['id'])) {
    $type = $_POST['type'];
    if ($type == 'mahasiswa') {
      if (ubah_mahasiswa($_POST) > 0) {
        redirect('index.php');
      } else {
        redirect('index.php');
      }
    } else {
      if (ubah($_POST) > 0) {
        redirect('index.php');
      } else {
        redirect('index.php');
      }
    }
  } else {
    $type = $_POST['type'];
    if ($type == 'mahasiswa') {
      if (tambah_mahasiswa($_POST) > 0) {
        redirect('index.php');
      } else {
        redirect('index.php');
      }
    } else {
      if (tambah($_POST) > 0) {
        redirect('index.php');
      } else {
        redirect('index.php');
      }
    }
  }
}

function redirect($url) {
  echo "<html>
          <script>
            document.location.href = '$url';
          </script>
        </html>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UAS</title>
  <script src="https://cdn.tailwindcss.com"> </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS</title>
    <script src="https://cdn.tailwindcss.com"></script>

  </head>

<body class="bg-gray-200 p-10">
  <h1 class="text-4xl text-center mt-10">UAS Pemrograman Web</h1>

  <div class="mx-auto mt-10">
    <h3 class="text-2xl mt-10">
      Soal
    </h3>
    <div>
    Buat sebuah aplikasi dengan memanfaatkan materi-materi yang telah dibagikan. Submit laporan dan source code.
    </div>
    <h3 class="text-2xl mt-10">
      Jawaban
    </h3>
    <ul>
      <li>
        Nama : Ryan Prayoga
      </li>
      <li>
        NRP : 213040094
      </li>
    </ul>
    <div class="items-center flex gap-4 mt-4">
      <div class="border border-gray-400 rounded-lg h-[520px] w-full p-4 basis-1/4 overflow-y-auto" id="cardSatu_mahasiswa">
        <?php include 'tambah_mahasiswa.php'; ?>
      </div>
      <div class="border border-gray-400 rounded-lg h-[520px] w-full p-4 basis-1/2 overflow-hidden" id="cardDua_mahasiswa">
        <?php include 'daftar_mahasiswa.php'; ?>
      </div>
      <div class="border border-gray-400 rounded-lg h-[520px] w-full p-4 basis-1/4 overflow-y-auto" id="cardTiga_mahasiswa">
        <div class="flex flex-col items-center justify-center h-full">
          <div class="text-2xl">
            Pilih salah satu mahasiswa untuk melihat detail
          </div>
        </div>
      </div>
    </div>
    <div class="items-center flex gap-4 mt-4">
      <div class="border border-gray-400 rounded-lg h-[350px] w-full p-4 basis-1/4" id="cardSatu">
        <?php include 'tambah.php'; ?>
      </div>
      <div class="border border-gray-400 rounded-lg h-[350px] w-full p-4 basis-1/2 overflow-hidden" id="cardDua">
        <?php include 'daftar.php'; ?>
      </div>
      <div class="border border-gray-400 rounded-lg h-[350px] w-full p-4 basis-1/4" id="cardTiga">
        <div class="flex flex-col items-center justify-center h-full">
          <div class="text-2xl">
            Klik tombol "Ubah" pada daftar nilai untuk mengubah data
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>