
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