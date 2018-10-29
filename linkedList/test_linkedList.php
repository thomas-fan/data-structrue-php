<?php

require_once __DIR__ . '/LinkedList.php';

$linkedList = new LinkedList();

for ($i = 0; $i < 5; $i ++) {
    $linkedList->addFirst($i);
    echo $linkedList;
}
$linkedList->add(2, 666);
echo $linkedList;
$linkedList->set(2, 777);
echo $linkedList;
$linkedList->remove(2);
echo $linkedList;
$linkedList->removeFirst();
echo $linkedList;
$linkedList->removeLast();
echo $linkedList;