<?php
require_once __DIR__ . '/ArrayQueue.php';
require_once __DIR__ . '/LoopQueue.php';
require_once __DIR__ . '/LinkedListQueue.php';

//$queue = new ArrayQueue();        // 数组队列测试
//$queue = new LoopQueue();         // 循环队列测试
$queue = new LinkedListQueue();     // 链表队列测试
for ($i = 0; $i < 10 ; $i ++) {
    $queue->enqueue($i);
    echo $queue;
    if ($i % 3 == 2) {
        $queue->dequeue();
        echo $queue;
    }
}

