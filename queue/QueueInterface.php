<?php
interface QueueInterface
{
    public function getSize(): int;
    public function isEmpty(): bool;
    public function enqueue($e): void;
    public function dequeue();
    public function getFront();
}