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

class Deque {
    private $front;
    private $rear;

    public function __construct() {
        $this->front = null;
        $this->rear = null;
    }

    // Adiciona um elemento no início do deque
    public function addFront($data) {
        $newNode = new Node($data);
        if ($this->front === null) {
            $this->front = $this->rear = $newNode;
        } else {
            $newNode->next = $this->front;
            $this->front->prev = $newNode;
            $this->front = $newNode;
        }
    }

    // Adiciona um elemento no final do deque
    public function addRear($data) {
        $newNode = new Node($data);
        if ($this->rear === null) {
            $this->front = $this->rear = $newNode;
        } else {
            $newNode->prev = $this->rear;
            $this->rear->next = $newNode;
            $this->rear = $newNode;
        }
    }

    // Remove e retorna o elemento do início do deque
    public function removeFront() {
        if ($this->front === null) {
            echo "Deque vazio" . PHP_EOL;
            return null;
        }
        $removedNode = $this->front;
        $this->front = $this->front->next;
        if ($this->front !== null) {
            $this->front->prev = null;
        } else {
            $this->rear = null;
        }
        return $removedNode->data;
    }

    // Remove e retorna o elemento do final do deque
    public function removeRear() {
        if ($this->rear === null) {
            echo "Deque vazio" . PHP_EOL;
            return null;
        }
        $removedNode = $this->rear;
        $this->rear = $this->rear->prev;
        if ($this->rear !== null) {
            $this->rear->next = null;
        } else {
            $this->front = null;
        }
        return $removedNode->data;
    }

    // Verifica se o deque está vazio
    public function isEmpty() {
        return $this->front === null;
    }

    // Exibe os elementos do deque
    public function display() {
        $current = $this->front;
        while ($current !== null) {
            echo $current->data . " ";
            $current = $current->next;
        }
        echo PHP_EOL;
    }
}

// Exemplo de uso
$deque = new Deque();
$deque->addRear(10);
$deque->addRear(20);
$deque->addFront(5);
$deque->addRear(30);

echo "Elementos no deque: ";
$deque->display(); // Saída: 5 10 20 30

echo "Removendo do início: " . $deque->removeFront() . PHP_EOL; // Saída: 5
echo "Elementos no deque após remover do início: ";
$deque->display(); // Saída: 10 20 30

echo "Removendo do final: " . $deque->removeRear() . PHP_EOL; // Saída: 30
echo "Elementos no deque após remover do final: ";
$deque->display(); // Saída: 10 20

