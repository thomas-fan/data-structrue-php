<?php
require_once __DIR__ . '/QueueInterface.php';

class LoopQueue implements QueueInterface
{
    private $data;
    private $front; //队首索引值
    private $tail;  //队尾索引值
    private $size;

    public function __construct(int $capacity = 10)
    {
        $this->data = array_fill(0, $capacity + 1, null);
        $this->front = 0;
        $this->tail = 0;
        $this->size = 0;
    }

    public function getCapacity(): int
    {
        return count($this->data) - 1;
    }

    public function isEmpty(): bool
    {
        return $this->front === $this->tail;
    }

    public function getSize(): int
    {
        return $this->size;
    }


    public function enqueue($e): void
    {
        // 循环队列通过判断队尾索引值 + 1 是否等于队首索引值来判断队列是否已满
        if (($this->tail + 1) % count($this->data) == $this->front) {
            $this->resize($this->getCapacity() * 2);
        }

        $this->data[$this->tail] = $e;
        $this->tail = ($this->tail + 1) % count($this->data);
        $this->size ++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new InvalidArgumentException('Cannot dequeue from an empty queue!');
        }

        $ret = $this->data[$this->front];

        $this->data[$this->front] = null;
        $this->front = ($this->front + 1) % count($this->data);
        $this->size --;
        if ($this->size == $this->getCapacity() / 4 && $this->getCapacity() / 2 != 0) {
            $this->resize($this->getCapacity() / 2);
        }

        return $ret;
    }

    public function getFront()
    {
        if ($this->isEmpty()) {
            throw new InvalidArgumentException('queue is empty');
        }
        return $this->data[$this->front];
    }

    /**
     * 格式化输出数组信息
     * @return string
     */
    public function toString():string
    {
        $ret = "Queue: size = {$this->size}, capacity = {$this->getCapacity()}" . PHP_EOL;
        $ret .= 'front [';
        // 遍历循环数组时, 起始项为front, 截止元素为 tail, $i 每次增加1,然后与数组元素个数取余
        for ($i = $this->front ; $i != $this->tail; $i = ($i +1) % count($this->data)) {
            $ret .= $this->data[$i];
            if (($i + 1) % count($this->data) != $this->tail) {
                $ret .= ', ';
            }
        }
        $ret .= '] tail' . PHP_EOL;
        return $ret;
    }

    private function resize(int $newCapacity)
    {
        $newData = array_fill(0, $newCapacity + 1, null);

        for ($i = 0; $i < $this->size; $i ++) {
            // 循环数组扩容时, 将以前的队首放到新队列的 0 位置.因此会有元素组初始位置 front 的偏移
            $newData[$i] = $this->data[($i + $this->front) % count($this->data)];
        }

        $this->data = $newData;
        $this->front = 0;
        $this->tail = $this->size;
    }
}