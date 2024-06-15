<?php

class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class CircularLinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    // Adiciona um elemento no final da lista
    public function append($data) {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $newNode;
            $newNode->next = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== $this->head) {
                $current = $current->next;
            }
            $current->next = $newNode;
            $newNode->next = $this->head;
        }
    }

    // Adiciona um elemento no início da lista
    public function prepend($data) {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $newNode;
            $newNode->next = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== $this->head) {
                $current = $current->next;
            }
            $current->next = $newNode;
            $newNode->next = $this->head;
            $this->head = $newNode;
        }
    }

    // Remove um elemento da lista
    public function remove($data) {
        if ($this->head === null) {
            return;
        }

        if ($this->head->data === $data) {
            if ($this->head->next === $this->head) {
                $this->head = null;
            } else {
                $current = $this->head;
                while ($current->next !== $this->head) {
                    $current = $current->next;
                }
                $current->next = $this->head->next;
                $this->head = $this->head->next;
            }
            return;
        }

        $current = $this->head;
        while ($current->next !== $this->head && $current->next->data !== $data) {
            $current = $current->next;
        }

        if ($current->next->data === $data) {
            $current->next = $current->next->next;
        }
    }

    // Exibe os elementos da lista
    public function display() {
        if ($this->head === null) {
            echo "Lista vazia" . PHP_EOL;
            return;
        }

        $current = $this->head;
        do {
            echo $current->data . " ";
            $current = $current->next;
        } while ($current !== $this->head);
        echo PHP_EOL;
    }
}

// Exemplo de uso
$circularList = new CircularLinkedList();
$circularList->append(10);
$circularList->append(20);
$circularList->prepend(5);
$circularList->append(30);

echo "Elementos na lista circular: ";
$circularList->display(); // Saída: 5 10 20 30

$circularList->remove(20);
echo "Elementos na lista circular após remover 20: ";
$circularList->display(); // Saída: 5 10 30

