<?php

// test result: 由于两种实现的复杂度是一样的,由于 linkedList 存在大量的 new 操作,因此会更加耗时
//ArrayStack: 0.56172800064087s
//LinkedListStack : 1.9302160739899s


require_once __DIR__ . '/LinkedListStack.php';
require_once __DIR__ . '/ArrayStack.php';
require_once __DIR__ . '/StackInterface.php';

$opCount = 1000000;
$arrayStack = new ArrayStack();
$linkedListStack = new LinkedListStack();
$time1 = testStack($arrayStack, $opCount);
echo 'ArrayStack: ' . $time1 . 's' . PHP_EOL;
$time2 = testStack($linkedListStack, $opCount);
echo 'LinkedListStack : ' . $time2 . 's' . PHP_EOL;
function testStack(StackInterface $stack, int $opCount)
{
    // microtime(true) 返回秒数
    $start_time = microtime(true);

    for ($i = 0; $i < $opCount; $i ++) {
        $stack->push(rand(0, 100));
    }
    for ($i = 0; $i < $opCount; $i ++) {
        $stack->pop();
    }

    $end_time = microtime(true);

    return $end_time - $start_time;
}