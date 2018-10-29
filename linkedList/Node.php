<?php

class Node
{
    public $e;
    public $next;

    public function __construct($e = null, Node $next = null)
    {
        $this->e = $e;
        $this->next = $next;
    }

    public function __toString()
    {
        return $this->e . '';
    }
}