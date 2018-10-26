<?php
/**
 * 测试方法
 */
require_once  __DIR__ .'/MyArray.php';

$array = new MyArray();
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