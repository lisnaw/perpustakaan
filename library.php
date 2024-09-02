<?php
// Mengimpor file yang berisi definisi class Book
include_once 'Book.php';

class Library
{
    // Properti privat untuk menyimpan daftar buku di dalam perpustakaan (Array) 
    private $books = [];

    // Menambahkan buku baru ke dalam perpustakaan (Method)
    public function addBook($book)
    {
        $this->books[] = $book; //menambahkan objek buku ke array $books
    }

    // Mengambil daftar buku yang ada di dalam perpustakaan
    public function getBooks()
    {
        return $this->books; // Mengembalikan array $books yang berisi semua buku
    }

    // Mencari buku berdasarkan judul
    public function searchBooks($title)
    {
        $results = []; // Array untuk menyimpan hasil pencarian

        // Mengiterasi setiap buku di dalam perpustakaan
        foreach ($this->books as $book) {

            // Memeriksa apakah judul buku mengandung kata yang dicari
            if (stripos($book->getTitle(), $title) !== false) {
                $results[] = $book; // Menambahkan buku yang cocok ke hasil pencarian
            }
        }
        return $results; // Mengembalikan hasil pencarian
    }

    // Menampilkan daftar buku yang ada di dalam perpustakaan
    public function displayBooks()
    {
        // Jika tidak ada buku di perpustakaan
        if (empty($this->books)) {
            echo "<p class='no-books'>Tidak ada buku dalam perpustakaan.</p>";
        } else {
            echo "<ul class='book-list'>"; // Memulai daftar buku

            // Mengintegrasi setiap buku di dalam perpustakaan
            foreach ($this->books as $book) {
                echo "<li>" . $book->displayBook() . "</li>"; // Menampilkan setiap buku dalam format daftar
            }
            echo "</ul>"; // Menutup daftar buku
        }
    }
}
