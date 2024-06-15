<?php

class Node {
    public $data;
    public $next;
    public $prev;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

class DoublyLinkedList {
    private $head;
    private $tail;

    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    // Adiciona um elemento no final da lista
    public function append($data) {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $this->tail = $newNode;
        } else {
            $newNode->prev = $this->tail;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
    }

    // Adiciona um elemento no início da lista
    public function prepend($data) {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $this->tail = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
    }

    // Remove um elemento da lista
    public function remove($data) {
        if ($this->head === null) {
            return;
        }

        $current = $this->head;
        while ($current !== null && $current->data !== $data) {
            $current = $current->next;
        }

        if ($current === null) {
            return; // Elemento não encontrado
        }

        if ($current === $this->head) {
            $this->head = $current->next;
            if ($this->head !== null) {
                $this->head->prev = null;
            }
        } elseif ($current === $this->tail) {
            $this->tail = $current->prev;
            if ($this->tail !== null) {
                $this->tail->next = null;
            }
        } else {
            $current->prev->next = $current->next;
            $current->next->prev = $current->prev;
        }

        if ($this->head === null) {
            $this->tail = null;
        }
    }

    // Exibe os elementos da lista
    public function displayForward() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " ";
            $current = $current->next;
        }
        echo PHP_EOL;
    }

    // Exibe os elementos da lista na ordem reversa
    public function displayBackward() {
        $current = $this->tail;
        while ($current !== null) {
            echo $current->data . " ";
            $current = $current->prev;
        }
        echo PHP_EOL;
    }
}

// Exemplo de uso
$dll = new DoublyLinkedList();
$dll->append(10);
$dll->append(20);
$dll->prepend(5);
$dll->append(30);

echo "Elementos na lista (frente para trás): ";
$dll->displayForward(); // Saída: 5 10 20 30

echo "Elementos na lista (trás para frente): ";
$dll->displayBackward(); // Saída: 30 20 10 5

$dll->remove(20);
echo "Elementos na lista após remover 20 (frente para trás): ";
$dll->displayForward(); // Saída: 5 10 30

