<?php

function  koneksi()
{
  return mysqli_connect("localhost", "root", "", "pw_213040094");
}

function getData($params = null)
{
  $conn = koneksi();
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa as m JOIN nilai as n ON n.mahasiswa_id = m.id 
                    WHERE m.nama LIKE '%$params%' OR
                          m.nrp LIKE '%$params%' OR 
                          n.matkul LIKE '%$params%' OR 
                          n.nilai LIKE '%$params%'");
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function getDetailNilai($id)
{
  $conn = koneksi();
  $result = mysqli_query($conn, "SELECT * FROM nilai WHERE id = $id");
  return mysqli_fetch_assoc($result);
}

function getMahasiswa($params = null)
{
  $conn = koneksi();
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nama LIKE '%$params%' OR jurusan LIKE '%$params%'");
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function getDetailMahasiswa($id)
{
  $conn = koneksi();
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");
  return mysqli_fetch_assoc($result);
}

function tambah($data)
{
  $conn = koneksi();
  $matkul = htmlspecialchars($data['matkul']);
  $nilai = htmlspecialchars($data['nilai']);
  $mahasiswa_id = htmlspecialchars($data['mahasiswa_id']);
  $query = "INSERT INTO nilai VALUES(null, '$matkul', '$nilai', '$mahasiswa_id')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();
  $id = htmlspecialchars($data['id']);
  $matkul = htmlspecialchars($data['matkul']);
  $nilai = htmlspecialchars($data['nilai']);
  $mahasiswa_id = htmlspecialchars($data['mahasiswa_id']);
  $query = "UPDATE nilai SET
              matkul = '$matkul',
              nilai = '$nilai',
              mahasiswa_id = '$mahasiswa_id'
              WHERE id = $id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM nilai WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function tambah_mahasiswa($data)
{
  $conn = koneksi();
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  // $gambar = htmlspecialchars($data['gambar']);

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    return 'default.jpg';
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
            alert('Yang Anda upload bukan gambar!');
          </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
            alert('Ukuran gambar terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}

function hapus_mahasiswa($id)
{
  $conn = koneksi();
  // menghapus gambar di folder img
  $mhs = getDetailMahasiswa($id);
  if ($mhs['gambar'] != 'default.jpg') {
    unlink('img/' . $mhs['gambar']);
  }

  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

  // cek apakah ada data nilai jika ada hapus
  $nilai = mysqli_query($conn, "SELECT * FROM nilai WHERE mahasiswa_id = $id");
  if (mysqli_num_rows($nilai) > 0) {
    mysqli_query($conn, "DELETE FROM nilai WHERE mahasiswa_id = $id");
  }
  return mysqli_affected_rows($conn);
}

function ubah_mahasiswa($data)
{
  $conn = koneksi();
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambarLama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'default.jpg') {
    $gambar = $gambarLama;
  }

  $query = "UPDATE mahasiswa SET
              nama = '$nama',
              nrp = '$nrp',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
              WHERE id = $id
              ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
