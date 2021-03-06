<?php

// test result:
// ArrayQueue: 188.28725194931s
// LoopQueue: 0.06634783744812s
// LinkedListQueue: 0.049625873565674s

require_once __DIR__ . '/ArrayQueue.php';
require_once __DIR__ . '/LoopQueue.php';
require_once __DIR__ . '/QueueInterface.php';
require_once __DIR__ . '/LinkedListQueue.php';

$opCount = 100000;
$array_queue = new ArrayQueue();
$loop_queue = new LoopQueue();
$linked_list_queue = new LinkedListQueue();

$time1 = testQueue($array_queue, $opCount);
echo 'ArrayQueue: ' . $time1 . 's' . PHP_EOL;
$time2 = testQueue($loop_queue, $opCount);
echo 'LoopQueue: ' . $time2 . 's' . PHP_EOL;
$time3 = testQueue($linked_list_queue, $opCount);
echo 'LinkedListQueue: ' . $time3 . 's' . PHP_EOL;
function testQueue(QueueInterface $queue, int $opCount)
{
    // microtime(true) 返回秒数
    $start_time = microtime(true);
    for ($i = 0; $i < $opCount; $i ++) {
        $queue->enqueue(rand(0, 100));
    }
    for ($i = 0; $i < $opCount; $i ++) {
        $queue->dequeue();
    }

    $end_time = microtime(true);
    return $end_time - $start_time;
}