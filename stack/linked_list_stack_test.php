<?php

require_once __DIR__ . '/LinkedListStack.php';

$arrayStack = new LinkedListStack();

for ($i = 0; $i < 5; $i ++) {
    $arrayStack->push($i);
    echo $arrayStack;
}

$arrayStack->pop();
echo $arrayStack;