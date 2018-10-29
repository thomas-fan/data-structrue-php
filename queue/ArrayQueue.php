<?php
require_once __DIR__ . '/../array/MyArray.php';
require_once __DIR__ . '/QueueInterface.php';

class ArrayQueue implements QueueInterface
{
    private $array;

    /**
     * 构造函数,初始化
     * ArrayQueue constructor.
     * @param int $capacity
     */
    public function __construct(int $capacity = 10)
    {
        $this->array = new MyArray($capacity);
    }

    /**
     * 获取队列大小
     * @return int
     */
    public function getSize(): int
    {
        return $this->array->getSize();
    }

    /**
     * 判断队列是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->array->isEmpty();
    }

    /**
     * 获取队列容量
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->array->getCapacity();
    }

    /**
     * 添加队列
     * @param $e
     */
    public function enqueue($e): void
    {
        $this->array->addLast($e);
    }

    /**
     * 出队
     * @return mixed
     */
    public function dequeue()
    {
        return $this->array->removeFirst();
    }

    /**
     * 获取队首
     * @return mixed
     */
    public function getFront()
    {
        return $this->array->getFirst();
    }

    /**
     * 格式化输出数组信息
     * @return string
     */
    public function toString():string
    {
        $ret = 'Queue:front [';
        for ($i = 0 ; $i < $this->getSize(); $i++) {
            $ret .= $this->array->get($i);
            if ($i != $this->getSize() -1) {
                $ret .= ', ';
            }
        }
        $ret .= '] tail' . PHP_EOL;
        return $ret;
    }
}