<?php
require_once __DIR__ . '/QueueInterface.php';
require_once __DIR__ . '/../linkedList/Node.php';

class LinkedListQueue implements QueueInterface
{
    private $head;
    private $tail;
    private $size;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    public function enqueue($e): void
    {
        if ($this->tail == null) {
            $this->tail = new Node($e);
            $this->head = $this->tail;
        } else {
            $this->tail->next = new Node($e);
            $this->tail = $this->tail->next;
        }
        $this->size ++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new InvalidArgumentException('Cannot dequeue from an empty queue.');
        }
        $retNode = $this->head;
        $this->head = $this->head->next;
        $retNode->next = null;

        if ($this->head == null) {
            $this->tail = null;
        }
        $this->size --;
        return $retNode->e;
    }

    public function getFront()
    {
        if ($this->isEmpty()) {
            throw new InvalidArgumentException('Cannot get front from an empty queue.');
        }
        return $this->head->e;
    }

    public function __toString(): string
    {
        $res = 'Queue: front ';

        $cur = $this->head;
        while($cur != null) {
            $res .= $cur->e . '->';
            $cur = $cur->next;
        }
        $res .= 'NULL tail' . PHP_EOL;
        return $res;
    }

}