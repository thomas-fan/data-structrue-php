<?php
/**
 * 测试方法
 */
require_once  __DIR__ .'/MyArray.php';

$array = new MyArray();
for ($i = 0; $i < 10; $i ++) {
    $array->addLast($i);
}
echo $array;
$array->add(1,100);
echo $array;
$array->addFirst(-1);
echo $array;
$array->remove(2);
echo $array;
$array->removeElement(4);
echo $array;
$array->removeFirst();
echo $array;
$array->removeLast();
echo $array;