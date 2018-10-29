<?php

require_once __DIR__ . '/StackInterface.php';
require_once __DIR__ . '/../linkedList/LinkedList.php';

class LinkedListStack implements StackInterface
{
    private $list;

    public function __construct()
    {
        $this->list = new LinkedList();
    }

    public function getSize(): int
    {
        return $this->list->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->list->isEmpty();
    }

    public function push($e): void
    {
        $this->list->addFirst($e);
    }

    public function pop()
    {
        return $this->list->removeFirst();
    }

    public function peek()
    {
        return $this->list->getFirst();
    }

    public function __toString()
    {
        $res = 'Stack: top ';
        $res .= $this->list;
        return $res;
    }
}