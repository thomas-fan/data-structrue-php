<?php
require_once __DIR__ . '/ArrayQueue.php';

$queue = new ArrayQueue();
for ($i = 0; $i < 10 ; $i ++) {
    $queue->enqueue($i);
    echo $queue->toString();
    if ($i % 3 == 2) {
        $queue->dequeue();
        echo $queue->toString();
    }
}

