<?php

function factorial($n)
{
    if($n <= 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}

echo factorial(1) . "\n"; // 1
echo factorial(5) . "\n"; // 120
echo factorial(3) . "\n"; // 6
echo factorial(0) . "\n"; // 1
echo factorial(-1) . "\n";// 1