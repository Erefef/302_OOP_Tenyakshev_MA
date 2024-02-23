<?php

function runTest() {
    // String representation test
    $v1 = new Vector(1, 2, 3);
    echo "Ожидается: (1; 2; 3)" . PHP_EOL;
    echo "Получено: " . $v1 . PHP_EOL;

    // Adding test
    $v2 = new Vector(1, 4, -2);
    $v3 = $v1->add($v2);
    echo "Ожидается: (2; 6; 1)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;

    // Subtraction test
    $v4 = $v1->sub($v2);
    echo "Ожидается: (0; -2; 5)" . PHP_EOL;
    echo "Получено: " . $v4 . PHP_EOL;

    // Product test
    $v5 = $v1->product(2);
    echo "Ожидается: (2; 4; 6)" . PHP_EOL;
    echo "Получено: " . $v5 . PHP_EOL;

    // Scalar product test
    $v6 = new Vector(2, -3, 1);
    $scalarProduct = $v1->scalarProduct($v6);
    echo "Ожидается: 1" . PHP_EOL;
    echo "Получено: " . $scalarProduct . PHP_EOL;

    // Vector product test
    $v7 = $v1->vectorProduct($v6);
    echo "Ожидается: (7; 5; -7)" . PHP_EOL;
    echo "Получено: " . $v7 . PHP_EOL;
}

runTest();
?>