<?php
require_once __DIR__ . '/ArrayStack.php';

$arrayStack = new ArrayStack();

for ($i = 0; $i < 5; $i ++) {
    $arrayStack->push($i);
    echo $arrayStack;
}

$arrayStack->pop();
echo $arrayStack;