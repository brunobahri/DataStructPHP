<?php

class TreeNode {
    public $data;
    public $left;
    public $right;

    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    private $root;

    public function __construct() {
        $this->root = null;
    }

    public function getRoot() {
        return $this->root;
    }

    public function insert($data) {
        $newNode = new TreeNode($data);
        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode);
        }
    }

    private function insertNode($node, $newNode) {
        if ($newNode->data < $node->data) {
            if ($node->left === null) {
                $node->left = $newNode;
            } else {
                $this->insertNode($node->left, $newNode);
            }
        } else {
            if ($node->right === null) {
                $node->right = $newNode;
            } else {
                $this->insertNode($node->right, $newNode);
            }
        }
    }

    public function printTree($node, $prefix = "", $isLeft = true) {
        if ($node !== null) {
            echo $prefix;

            echo $isLeft ? "├──" : "└──";

            // print the value of the node
            echo $node->data . PHP_EOL;

            // enter the next tree level - left and right branch
            $this->printTree($node->left, $prefix . ($isLeft ? "│   " : "    "), true);
            $this->printTree($node->right, $prefix . ($isLeft ? "│   " : "    "), false);
        }
    }
}

// Exemplo de uso
$tree = new BinaryTree();
$tree->insert(8);
$tree->insert(3);
$tree->insert(10);
$tree->insert(1);
$tree->insert(6);
$tree->insert(14);
$tree->insert(4);
$tree->insert(7);
$tree->insert(13);

echo "Árvore Binária:" . PHP_EOL;
$tree->printTree($tree->getRoot());

