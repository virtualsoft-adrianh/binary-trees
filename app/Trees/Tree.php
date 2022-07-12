<?php

namespace App\Trees;


class Tree
{
    public Node $root;

    public function __construct(array $values)
    {
        //loop through the array of integers and insert them in the given order
        foreach ($values as $value) {
            $node = new Node($value);
            if (!isset($this->root)) {
                $this->root = $node;
            } else {
                $current = $this->root;
                while (true) {
                    $parent = $current;
                    if ($value < $current->value) {
                        $current = $current->left;
                        if ($current == null) {
                            $parent->left = $node;
                            break;
                        }
                    } else {
                        $current = $current->right;
                        if ($current == null) {
                            $parent->right = $node;
                            break;
                        }
                    }
                }
            }
        }
    }


    public function ordered($node, array &$return)
    {
        if ($node != null) {
            $this->ordered($node->left, $return);
            array_push($return, $node->value);
            $this->ordered($node->right, $return);
        }
    }

    public function height($node)
    {
        if ($node == null) {
            return 0;
        } else {
            return 1 + max($this->height($node->left), $this->height($node->right));
        }
    }
}


class Node
{
    public int $value;
    public $left;
    public $right;

    function __construct(int $value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}
