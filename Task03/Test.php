<?php

require_once 'vendor/autoload.php';

use App\Book;
use App\BooksList;

function runTest()
{
    $book1 = (new Book())->setTitle("PHP forever")
                          ->setAuthors(["Gates B.", "Smith J."])
                          ->setPublisher("O'Reily")
                          ->setYear(2020);
    $book2 = (new Book())->setTitle("Roling Full")
                        ->setAuthors(["Evgen Grom"])
                        ->setPublisher("DimanMag")
                        ->setYear(2007);
    echo $book1;
    echo "\n" . $book2 . "\n";

    $booksList = new BooksList();
    $booksList->add($book1);
    $booksList->add($book2);
    echo "Количество книг: " . $booksList->count() . "\n";

    $fileName = "books.txt";
    $booksList->store($fileName);

    $loadedBooksList = new BooksList();
    $loadedBooksList->load($fileName);
    echo "Количество книг после загрузки: " . $loadedBooksList->count() . "\n";
}
