<?php

namespace App;

class BooksList
{
    private $books = [];

    public function add(Book $book)
    {
        $this->books[] = $book;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): ?Book
    {
        return $this->books[$n] ?? null;
    }

    public function store(string $fileName)
    {
        file_put_contents($fileName, serialize($this->books));
    }

    public function load(string $fileName)
    {
        $this->books = unserialize(file_get_contents($fileName));
    }
}
