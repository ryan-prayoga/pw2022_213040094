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

function getMahasiswa()
{
  $conn = koneksi();
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
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
