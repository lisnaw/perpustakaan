<?php
class Book
{
    private $title;
    private $author;
    private $year;

    public function __construct($title, $author, $year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }
}
