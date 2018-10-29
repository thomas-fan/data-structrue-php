<?php

require_once __DIR__ . '/Node.php';

class LinkedList
{
    private $dummyHead; // 虚拟头结点
    private $size;

    public function __construct()
    {
        $this->dummyHead = new Node();
        $this->size = 0;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->size == 0 ;
    }


    // 在链表的 index(0-based) 位置添加新的元素$ e (不常用)
    public function add(int $index, $e): void
    {
        if ($index < 0 || $index > $this->size) {
            throw new InvalidArgumentException('add failed. illegal index');
        }

        $prev = $this->dummyHead;
        for ($i = 0; $i < $index; $i ++) {
            $prev = $prev->next;
        }

        $prev->next = new Node($e, $prev->next);
        $this->size ++;

    }

    public function addFirst($e): void
    {
      $this->add(0, $e);
    }

    public function addLast($e): void
    {
        $this->add($this->size, $e);
    }

    /**
     * 取得某个节点的值(不常用)
     * @param int $index
     * @return mixed $cur
     */
    public function get(int $index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new InvalidArgumentException('get failed. illegal index');
        }

        $cur = $this->dummyHead->next;

        for ($i = 0; $i < $index; $i ++) {
            $cur = $cur->next;
        }
        return $cur->e;

    }

    public function getFirst()
    {
        return $this->get(0);
    }

    public function getLast()
    {
        return $this->get($this->size - 1);
    }

    public function set(int $index, $e): void
    {
        if ($index < 0 || $index >= $this->size) {
            throw new InvalidArgumentException('set failed. illegal index');
        }

        $cur = $this->dummyHead->next;

        for($i = 0; $i < $index; $i ++) {
            $cur = $cur->next;
        }
        $cur->e = $e;

    }

    public function remove($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new InvalidArgumentException('remove failed. illegal index');
        }

        $prev = $this->dummyHead;
        for ($i = 0; $i < $index; $i ++) {
            $prev = $prev->next;
        }

        $retNode = $prev->next;
        $prev->next = $retNode->next;
        $retNode->next = null;
        $this->size --;

        return $retNode->e;

    }

    public function removeFirst()
    {
        return $this->remove(0);
    }

    public function removeLast()
    {
        return $this->remove($this->size - 1);
    }

    public function contains($e): bool
    {
        $cur = $this->dummyHead->next;
        while ($cur != null) {
            if ($cur->e == $e) {
                return true;
            }
            $cur = $cur->next;
        }

        return false;
    }

    public function __toString()
    {
        $res = '';

        $cur = $this->dummyHead->next;

        while ($cur != null) {
            $res .= $cur->e . '->';
            $cur = $cur->next;
        }
        $res .= 'NULL' . PHP_EOL;
        return $res;
    }

}
