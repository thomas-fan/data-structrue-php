<?php
/**
 * 基于 php 的数组类
 * Created by PhpStorm.
 * User: zhangfan
 * Date: 2018/10/26
 * Time: 2:08 PM
 */


class MyArray
{
    private $data;
    private $size;

    /**
     * MyArray constructor.
     * @param int $capacity 开辟的数组容量
     */
    public function __construct(int $capacity = 10)
    {
        if ($capacity < 0) {
            throw new InvalidArgumentException('capacity must not be negative!');
        }
        // 通过 array_fill 来生成指定长度的数组,默认为 null
        $data = array_fill(0, $capacity, null);
        $this->size = 0;
        $this->data = $data;
    }

    /**
     * 获取数组大小
     * @return int
     */
    public function getSize():int
    {
        return $this->size;
    }

    /**
     * 获取数组容量
     * @return int
     */
    public function getCapacity():int {
        return count($this->data);
    }

    /**
     * 判断数组是否为空
     * @return bool
     */
    public function isEmpty()
    {
        return $this->size == 0;
    }

    /**
     * 在数组末尾添加元素
     * @param $e
     */
    public function addLast($e)
    {
        $this->add($this->size, $e);
    }

    /**
     * 在数组首位添加元素
     * @param $e
     */
    public function addFirst($e)
    {
        $this->add(0, $e);
    }

    /**
     * 在第 index 个位置插入一个新元素 e
     * @param int $index
     * @param $e
     */
    public function add(int $index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \InvalidArgumentException('Add failed. $index is inlegal');
        }

        if ($this->size == count($this->data)) {
            $this->resize(2 * count($this->data));
        }

        for ($i = $this->size -1; $i >= $index; $i --) {
            $this->data[$i +1] = $this->data[$i];
        }

        $this->data[$index] = $e;
        $this->size ++;
    }

    /**
     * 获取数组中元素
     * @param int $index
     * @return mixed
     */
    public function get(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \InvalidArgumentException('Add failed. $index is inlegal');
        }

        return $this->data[$index];
    }

    /**
     * 设置数组中元素
     * @param int $index
     * @param $e
     */
    public function set(int $index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \InvalidArgumentException('Add failed. $index is inlegal');
        }
        $this->data[$index] = $e;
    }

    /**
     * 判断数组中是否包含某个元素 e
     * @param $e
     * @return bool
     */
    public function contains($e):bool
    {
        for($i = 0; $i < $this->size; $i ++) {
            if ($this->data[$i] == $e) {
                return true;
            }
        }

        return false;
    }

    /**
     * 查找指定元素,有返回索引,没有返回-1
     * @param $e
     * @return int
     */
    public function find($e):int
    {
        for($i = 0; $i < $this->size; $i ++) {
            if ($this->data[$i] == $e) {
                return $i;
            }
        }

        return -1;
    }

    /**
     * 删除指定元素
     * @param int $index
     * @return mixed
     */
    public function remove(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \InvalidArgumentException('Add failed. $index is inlegal');
        }

        $ret = $this->data[$index];

        for ($i = $index +1; $i < $this->size -1; $i ++) {
            $this->data[$i - 1] = $this->data[$i];
        }
        $this->size -- ;
        if ($this->size == count($this->data) / 2) {
            $this->resize(count($this->data) / 2);
        }

        return $ret;
    }

    /**
     * 删除第一个元素
     * @return mixed
     */
    public function removeFirst()
    {
        return $this->remove(0);
    }

    /**
     * 删除最有一个元素
     * @return mixed
     */
    public function removeLast()
    {
        return $this->remove($this->size -1);
    }

    /**
     * 删除一个置顶元素
     * @param $e
     */
    public function removeElement($e)
    {
        $index = $this->find($e);
        if ($index != -1) {
            $this->remove($index);
        }
    }

    /**
     * 格式化输出数组信息
     * @return string
     */
    public function toString()
    {
        $msg = "Array: size = {$this->size}, capacity = {$this->getCapacity()}" . PHP_EOL;
        $msg .= '[';
        for ($i = 0 ; $i < $this->size; $i++) {
            $msg .= $this->data[$i];
            if ($i != $this->size -1) {
                $msg .= ', ';
            }
        }
        $msg .= ']';
        return $msg;
    }

    /**
     * 动态扩容
     * @param int $newCapacity
     */
    private function resize(int $newCapacity)
    {
        $newData = array_fill(0, $newCapacity, null);

        for($i = 0 ;$i < $this->size; $i ++) {
            $newData[$i] = $this->data[$i];
        }

        $this->data = $newData;
    }
}


