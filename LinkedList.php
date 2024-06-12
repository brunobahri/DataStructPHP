<?php

class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    // Inserir um novo nó no final da lista
    public function insert($data) {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    // Exibir os dados da lista
    public function display() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " ";
            $current = $current->next;
        }
        echo PHP_EOL;
    }

    // Remover um nó da lista
    public function remove($data) {
        if ($this->head === null) {
            return;
        }

        if ($this->head->data === $data) {
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        while ($current->next !== null && $current->next->data !== $data) {
            $current = $current->next;
        }

        if ($current->next !== null) {
            $current->next = $current->next->next;
        }
    }
}

// Exemplo de uso
$linkedList = new LinkedList();
$linkedList->insert(10);
$linkedList->insert(20);
$linkedList->insert(30);
$linkedList->display(); // Saída: 10 20 30

$linkedList->remove(20);
$linkedList->display(); // Saída: 10 30

$linkedList->insert(40);
$linkedList->display(); // Saída: 10 30 40

