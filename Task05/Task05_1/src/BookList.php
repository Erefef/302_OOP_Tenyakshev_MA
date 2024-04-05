<?php

namespace App;

use Iterator;

class BooksList implements Iterator
{
    private array $books = [];

    public function add(Book $book)
    {
        $this->books[] = $book;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): Book
    {
        return $this->books[$n];
    }

    public function store(string $fileName): bool
    {
        file_put_contents($fileName, serialize($this->books));

        return true;
    }

    public function load(string $fileName): bool
    {
        if (!file_exists($fileName)) {
            echo "Файл {$fileName} не существует!";
            return false;
        }

        $this->books = unserialize(file_get_contents($fileName));

        return true;
    }

    public function current(): Book | bool
    {
        return current($this->books);
    }

    public function key(): int
    {
        return current($this->books)->getId();
    }

    public function next(): void
    {
        next($this->books);
    }

    public function rewind(): void
    {
        reset($this->books);
    }

    public function valid(): bool
    {
        return key($this->books) !== null;
    }
}
