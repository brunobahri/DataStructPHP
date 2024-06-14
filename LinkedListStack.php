<?php

class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedListStack {
    private $top;

    public function __construct() {
        $this->top = null;
    }

    // Adiciona um elemento no topo da pilha
    public function push($data) {
        $newNode = new Node($data);
        if ($this->top === null) {
            $this->top = $newNode;
        } else {
            $newNode->next = $this->top;
            $this->top = $newNode;
        }
    }

    // Remove e retorna o elemento do topo da pilha
    public function pop() {
        if ($this->top === null) {
            echo "Pilha vazia" . PHP_EOL;
            return null;
        }
        $poppedNode = $this->top;
        $this->top = $this->top->next;
        return $poppedNode->data;
    }

    // Retorna o elemento do topo da pilha sem removê-lo
    public function peek() {
        if ($this->top === null) {
            echo "Pilha vazia" . PHP_EOL;
            return null;
        }
        return $this->top->data;
    }

    // Verifica se a pilha está vazia
    public function isEmpty() {
        return $this->top === null;
    }

    // Exibe os elementos da pilha
    public function display() {
        $current = $this->top;
        while ($current !== null) {
            echo $current->data . " ";
            $current = $current->next;
        }
        echo PHP_EOL;
    }
}

// Exemplo de uso
$stack = new LinkedListStack();
$stack->push(10);
$stack->push(20);
$stack->push(30);

echo "Elementos na pilha: ";
$stack->display(); // Saída: 30 20 10

echo "Topo da pilha: " . $stack->peek() . PHP_EOL; // Saída: 30

echo "Removendo elemento: " . $stack->pop() . PHP_EOL; // Saída: 30
echo "Elementos na pilha após pop: ";
$stack->display(); // Saída: 20 10

