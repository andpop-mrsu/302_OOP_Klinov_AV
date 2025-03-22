<?php

use App\Stack;

function checkIfBalanced(string $expression): bool
{
    $stack = new Stack();
    $pairs = [
        '>' => '<',
        '}' => '{',
        ')' => '(',
        ']' => '['
    ];

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];
        if (in_array($char, $pairs)) {
            $stack->push($char);
        } elseif (array_key_exists($char, $pairs)) {
            if ($stack->isEmpty() || $stack->pop() != $pairs[$char]) {
                return false;
            }
        }
    }
    return $stack->isEmpty();
}
