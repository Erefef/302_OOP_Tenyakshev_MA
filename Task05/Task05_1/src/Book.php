<?php

namespace App;

class Book
{
    private static int $lastId = 1;

    private int $id;
    private string $title;
    private array $authors;
    private string $publisher;
    private int $year;

    public function __construct()
    {
        $this->id = self::$lastId++;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function setAuthors(array $authors)
    {
        $this->authors = $authors;

        return $this;
    }

    public function setPublisher(string $publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function setYear(int $year)
    {
        $this->year = $year;

        return $this;
    }

    public function __toString()
    {
        $output = "Id: {$this->id}" . PHP_EOL . "Название: {$this->title}" . PHP_EOL;

        for ($i = 0; $i < count($this->authors); $i++) {
            $index = $i + 1;
            $output .= "Автор{$index}: {$this->authors[$i]}" . PHP_EOL;
        }

        $output .= "Издательство: {$this->publisher}" . PHP_EOL . "Год: {$this->year}" . PHP_EOL;

        return $output;
    }
}
