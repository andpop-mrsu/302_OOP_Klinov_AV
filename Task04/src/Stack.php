<?php

namespace App;

class Stack implements StackInterface
{
    private $stack;

    public function __construct(...$elems)
    {
        $this->push(...$elems);
    }

    public function push(...$elems)
    {
        foreach ($elems as $elem) {
            $this->stack[] = $elem;
        }
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return null;
        }
        return array_pop($this->stack);
    }

    public function top()
    {
        if ($this->isEmpty()) {
            return null;
        }
        return end($this->stack);
    }

    public function isEmpty()
    {
        if ($this->stack) {
            return false;
        } else {
            return true;
        }
    }

    public function copy(): Stack
    {
        return new Stack(...$this->stack);
    }
    public function __toString(): string
    {
        return implode('->', array_reverse($this->stack));
    }
}
