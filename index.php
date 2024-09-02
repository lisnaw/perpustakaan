<?php
include_once 'Library.php';

// Inisialisasi perpustakaan
$library = new Library();

// Tambahkan buku (untuk contoh)
$library->addBook(new Book("Laut Bercerita", "Leila S. Chudori", 2020));
$library->addBook(new Book("Angin Pertama", "Kim Al Ghozali AM", 2020));

// Cek apakah ada permintaan pencarian
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $searchResults = $library->searchBooks($searchQuery);
} else {
    $searchQuery = '';
    $searchResults = [];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Libra Tech</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Libra Tech</h1>

        <h2>Tambah Buku Baru</h2>
        <form action="" method="post" class="form-add-book">
            <input type="text" name="title" placeholder="Judul Buku" required>
            <input type="text" name="author" placeholder="Pengarang" required>
            <input type="number" name="year" placeholder="Tahun" required>
            <input type="submit" name="add" value="Tambah Buku">
        </form>
    