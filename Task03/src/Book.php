<?php

namespace App;

class Book
{
    private static $idCounter = 0;

    private $id;
    private $title;
    private $authors = [];
    private $publisher;
    private $year;

    public function __construct()
    {
        self::$idCounter++;
        $this->id = self::$idCounter;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setAuthors($authors)
    {
        $this->authors = $authors;
        return $this;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function setYear($year)
    {
        $this->year = $year;
        return $this;
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

    public function __toString()
    {
        $output = "Id: " . $this->id . "\n";
        $output .= "Название: " . $this->title . "\n";
        foreach ($this->authors as $index => $author) {
            $output .= "Автор" . ($index + 1) . ": " . $author . "\n";
        }
        $output .= "Издательство: " . $this->publisher . "\n";
        $output .= "Год: " . $this->year . "\n";
        return $output;
    }
}
