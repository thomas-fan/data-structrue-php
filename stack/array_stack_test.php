<?php
require_once __DIR__ . '/ArrayStack.php';

$arrayStack = new ArrayStack();

for ($i = 0; $i < 5; $i ++) {
    $arrayStack->push($i);
    echo $arrayStack->toString();
}

$arrayStack->pop();
echo $arrayStack->toString();