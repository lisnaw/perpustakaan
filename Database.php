<?php
// Database.php

// Membuat kelas Database untuk mengelola koneksi ke database
class Database {
    // Properti untuk menyimpan informasi koneksi ke database
    private $host = "localhost"; // Alamat server database
    private $db_name = "library"; // Nama database
    private $username = "root"; // Username untuk mengakses database
    private $password = ""; // Password untuk mengakses database
    public $conn; // Properti untuk menyimpan koneksi database

    // Fungsi untuk membuat koneksi ke database
    public function getConnection() {
        // Inisialisasi koneksi sebagai null
        $this->conn = null;

        try {
            // Mencoba menghubungkan ke database menggunakan PDO (PHP Data Objects)
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Mengatur karakter encoding menjadi UTF-8 agar mendukung berbagai karakter
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            // Menampilkan pesan kesalahan jika koneksi gagal
            echo "Connection error: " . $exception->getMessage();
        }

        // Mengembalikan koneksi yang telah dibuat
        return $this->conn;
    }
}

?>