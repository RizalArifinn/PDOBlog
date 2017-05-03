<?php

    class Blog
    {

      public function __construct()
      {
          $host = "localhost";
          $db = "blogpdo";
          $username = "root";
          $password = "";

          try {
              $this->db = new PDO("mysql:host={$host};dbname={$db}", $username, $password);

              //atur error
              $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
              die('Koneksi Gagal : '.$e->getMessage());
          }
      }

      public function select()
      {
          $sql = "SELECT * FROM blogs";
          $query = $this->db->query($sql);
          return $query;
      }

      public function create($judul, $deskripsi)
      {
          $sql = "INSERT INTO blogs (judul, deskripsi) VALUES('$judul', '$deskripsi')";
          $query = $this->db->query($sql);
          if ($query) {
            return "Sukses Tambah Data";
          } else {
            return "Gagal Tambah Data";
          }
      }

      public function update($id)
      {
          $sql = "SELECT * FROM blogs WHERE id=$id";
          $query = $this->db->query($sql);
          return $query;
        }

      public function edit($judul, $deskripsi, $id)
      {
          $sql = "UPDATE blogs SET judul='$judul', deskripsi='$deskripsi' WHERE id=$id";
          $query = $this->db->query($sql);
          if ($query) {
            return "Sukses Edit Data";
          } else {
            return "Gagal Edit Data";
          }
      }

      public function hapus($id)
      {
          $sql = "DELETE FROM blogs WHERE id=$id";
          $query = $this->db->query($sql);
      }
    }
?>
