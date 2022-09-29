<?php

function factorial($n)
{
    if (!is_int($n) || $n < 0) {
        return 'Введите натуральное число';
    }

    if($n === 0 || $n === 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}

echo factorial(1) . "\n";
echo factorial(5) . "\n";
echo factorial(0) . "\n";
echo factorial(-1) . "\n";
echo factorial(2.3) . "\n";
echo factorial('str');
$num = 3;
echo factorial($num);