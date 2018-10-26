<?php
/**
 * 测试方法
 */
require_once './MyArray.php';

$array = new MyArray(20);
for ($i = 0; $i < 10; $i ++) {
    $array->addLast($i);
}
echo $array->toString();
$array->add(1,100);
echo $array->toString();
$array->addFirst(-1);
echo $array->toString();
$array->remove(2);
echo $array->toString();
$array->removeElement(4);
echo $array->toString();
$array->removeFirst();
echo $array->toString();
$array->removeLast();
echo $array->toString();