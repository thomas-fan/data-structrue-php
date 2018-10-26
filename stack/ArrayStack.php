<?php
/**
 * @author zhangfan
 * 基于动态数组的Stack
 */
require_once __DIR__ . '/StackInterface.php';
require_once __DIR__ . '/../array/MyArray.php';

class ArrayStack implements StackInterface
{
    private $array;

    /**
     * 生成指定大小的动态数组栈
     * ArrayStack constructor.
     * @param int $capacity
     */
    public function __construct(int $capacity = 10)
    {
        $this->array = new MyArray($capacity);
    }

    /**
     * 获取栈大小
     * @return int
     */
    public function getSize():int
    {
        return $this->array->getSize();
    }

    /**
     * 判断栈是否为空
     * @return bool
     */
    public function isEmpty():bool
    {
        return $this->array->isEmpty();
    }

    /**
     * 获取栈容量
     * @return int
     */
    public function getCapacity():int
    {
        return $this->array->getCapacity();
    }

    /**
     * 推栈
     * @param $e
     */
    public function push($e):void
    {
        $this->array->addLast($e);
    }

    /**
     * 弹栈
     * @return mixed
     */
    public function pop()
    {
        return $this->array->removeLast();
    }

    /**
     * 获取栈顶元素
     * @return mixed
     */
    public function peek()
    {
        return $this->array->getLast();
    }

    /**
     * 格式化输出栈信息
     * @return string
     */
    public function toString():string
    {
        $res = "Stack: [";
        for ($i = 0; $i < $this->array->getSize(); $i ++) {
            $res .= $this->array->get($i);

            if ($i != $this->array->getSize() -1) {
                $res .= ', ';
            }
        }

        $res .= "] top" . PHP_EOL;
        return $res;
    }

}

