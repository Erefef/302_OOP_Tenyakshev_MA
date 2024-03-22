<?php

namespace App;

class Stack implements StackInterface
{
    private $stack;

    public function __construct(mixed ...$elems)
    {
        $this->push(...$elems);
    }

    public function push(mixed ...$elems)
    {
        foreach ($elems as $index => $elem) {
            $this->stack[] = $elem;
        }
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return null;
        } else {
            $elem = $this->stack[count($this->stack) - 1];
            $this->stack = array_slice($this->stack, 0, -1);
            return $elem;
        }
    }

    public function top()
    {
        if ($this->isEmpty()) {
            return null;
        } else {
            return $this->stack[count($this->stack) - 1];
        }
    }

    public function isEmpty()
    {
        return count($this->stack) == 0;
    }

    public function copy()
    {
        $temp_stack = new Stack();
        foreach ($this->stack as $index => $elem) {
            $temp_stack->push($elem);
        }
        return $temp_stack;
    }

    public function __toString()
    {
        if ($this->isEmpty()) {
            return "[]";
        } else {
            $temp = "";
            foreach ($this->stack as $index => $elem) {
                $temp = $elem . "->" . $temp;
            }
            return "[" . substr($temp, 0, -2) . "]";
        }
    }
}
