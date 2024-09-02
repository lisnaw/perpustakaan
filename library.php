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
}