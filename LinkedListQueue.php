<?php

class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedListQueue {
    private $front;
    private $rear;

    public function __construct() {
        $this->front = null;
        $this->rear = null;
    }

    // Adiciona um elemento no final da fila
    public function enqueue($data) {
        $newNode = new Node($data);
        if ($this->rear === null) {
            $this->front = $this->rear = $newNode;
        } else {
            $this->rear->next = $newNode;
            $this->rear = $newNode;
        }
    }

    // Remove e retorna o elemento do início da fila
    public function dequeue() {
        if ($this->front === null) {
            echo "Fila vazia" . PHP_EOL;
            return null;
        }
        $dequeuedNode = $this->front;
        $this->front = $this->front->next;

        if ($this->front === null) {
            $this->rear = null;
        }

        return $dequeuedNode->data;
    }

    // Retorna o elemento do início da fila sem removê-lo
    public function peek() {
        if ($this->front === null) {
            echo "Fila vazia" . PHP_EOL;
            return null;
        }
        return $this->front->data;
    }

    // Verifica se a fila está vazia
    public function isEmpty() {
        return $this->front === null;
    }

    // Exibe os elementos da fila
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
$queue = new LinkedListQueue();
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);

echo "Elementos na fila: ";
$queue->display(); // Saída: 10 20 30

echo "Início da fila: " . $queue->peek() . PHP_EOL; // Saída: 10

echo "Removendo elemento: " . $queue->dequeue() . PHP_EOL; // Saída: 10
echo "Elementos na fila após dequeue: ";
$queue->display(); // Saída: 20 30

