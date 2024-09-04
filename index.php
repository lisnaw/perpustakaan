<?php
include_once 'Library.php';
include_once 'Database.php';

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

        <?php
        // Tambahkan buku baru dari form
        if (isset($_POST['add'])) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $year = $_POST['year'];
            $library->addBook(new Book($title, $author, $year));
            echo "<p class='success'>Buku berhasil ditambahkan!</p>";
        }
        ?>

        <h2>Daftar Buku</h2>
        <?php $library->displayBooks(); ?>

        <h2>Cari Buku</h2>
        <form action="" method="get" class="form-search">
            <input type="text" name="search" placeholder="Cari Judul Buku" value="<?php echo htmlspecialchars($searchQuery); ?>">
            <input type="submit" value="Cari">
        </form>

        <?php if (!empty($searchQuery)): ?>
            <h3>Hasil Pencarian untuk "<?php echo htmlspecialchars($searchQuery); ?>"</h3>
            <?php if (empty($searchResults)): ?>
                <p class='no-results'>Tidak ada buku yang ditemukan.</p>
            <?php else: ?>
                <ul class='search-results'>
                    <?php foreach ($searchResults as $book): ?>
                        <li><?php echo $book->displayBook(); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>

