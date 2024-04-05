<?php

use App\Stack;

function compareStrings($str1, $str2)
{
    $stack1 = new Stack();
    $stack2 = new Stack();

    for ($i = 0; $i < strlen($str1); $i++) {
        if ($str1[$i] != '#') {
            $stack1->push($str1[$i]);
        } else {
            $stack1->pop();
        }
    }

    for ($i = 0; $i < strlen($str2); $i++) {
        if ($str2[$i] != '#') {
            $stack2->push($str2[$i]);
        } else {
            $stack2->pop();
        }
    }

    return $stack1 == $stack2;
}
