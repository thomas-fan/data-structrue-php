<?php
interface StackInterface
{
   public function getSize():int;
   public function isEmpty():bool;
   public function push($e);
   public function pop();
   public function peek();
}