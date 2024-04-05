<?php

use App\Stack;

function runTest()
{
    $stack1 = new Stack(1);
    $stack2 = new Stack(1);

    echo "Ожидается: false, true" . PHP_EOL;
    echo "Получено: " . json_encode($stack1 === $stack2) . ", " .
    json_encode($stack1 == $stack2) . PHP_EOL;

    $stack1->push(2, 3);
    echo "Ожидается: [3->2->1]" . PHP_EOL;
    echo "Получено: " . $stack1 . PHP_EOL;

    echo "Ожидается: 1, [], " . PHP_EOL;
    echo "Получено: " . $stack2->pop() . ", " . $stack2 . ", " .
    $stack2->pop() . PHP_EOL;

    echo "Ожидается: 3" . PHP_EOL;
    echo "Получено: " . $stack1->top() . PHP_EOL;

    echo "Ожидается: [3->2->1]" . PHP_EOL;
    echo "Получено: " . $stack1->copy() . PHP_EOL;

    echo "Ожидается: false, true" . PHP_EOL;
    echo "Получено: " . json_encode($stack1->isEmpty()) . ", " .
    json_encode($stack2->isEmpty()) . PHP_EOL;

    echo "Ожидается: true, false, true" . PHP_EOL;
    echo "Получено: " . json_encode(compareStrings("ab#c", "ade##c")) . ", " .
    json_encode(compareStrings("ab#c", "c")) . ", " .
    json_encode(compareStrings("abc###", "a#b#")) . PHP_EOL;
}
