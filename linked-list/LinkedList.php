<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class Node
{
    public mixed $data;
    public ?Node $next = null;
    public ?Node $previous = null;

    public function __construct(mixed $data)
    {
        $this->data = $data;
    }
}

class LinkedList
{
    private ?Node $head;
    private ?Node $tail;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }

    public function push(mixed $data): void
    {
        $node = new Node($data);
        if ($this->head === null) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $this->tail->next = $node;
            $node->previous = $this->tail;
            $this->tail = $node;
        }
    }

    public function pop(): mixed
    {
        if ($this->tail === null) {
            return null;
        }
        $data = $this->tail->data;
        if ($this->tail === $this->head) {
            $this->head = null;
            $this->tail = null;
        } else {
            $this->tail = $this->tail->previous;
            $this->tail->next = null;
        }
        return $data;
    }

    public function shift(): mixed
    {
        if ($this->tail === null) {
            return null;
        }
        $data = $this->head->data;
        if ($this->tail === $this->head) {
            $this->head = null;
            $this->tail = null;
        } else {
            $this->head = $this->head->next;
            $this->head->previous = null;
        }
        return $data;
    }

    public function unshift(mixed $data): void
    {
        $node = new Node($data);
        if ($this->head === null) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $node->next = $this->head;
            $this->head->previous = $node;
            $this->head = $node;
        }
    }
}
