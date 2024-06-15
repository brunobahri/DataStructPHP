<?php

class HashTable {
    private $table;
    private $size;

    public function __construct($size = 100) {
        $this->table = array_fill(0, $size, null);
        $this->size = $size;
    }

    // Função de hash simples
    private function hash($key) {
        return crc32($key) % $this->size;
    }

    // Insere um valor na tabela hash
    public function insert($key, $value) {
        $index = $this->hash($key);
        if ($this->table[$index] === null) {
            $this->table[$index] = [];
        }
        // Verificar se a chave já existe e atualizar o valor
        foreach ($this->table[$index] as &$pair) {
            if ($pair[0] === $key) {
                $pair[1] = $value;
                return;
            }
        }
        // Adicionar um novo par chave-valor
        $this->table[$index][] = [$key, $value];
    }

    // Busca um valor na tabela hash
    public function search($key) {
        $index = $this->hash($key);
        if ($this->table[$index] !== null) {
            foreach ($this->table[$index] as $pair) {
                if ($pair[0] === $key) {
                    return $pair[1];
                }
            }
        }
        return null; // Chave não encontrada
    }

    // Remove um valor da tabela hash
    public function delete($key) {
        $index = $this->hash($key);
        if ($this->table[$index] !== null) {
            foreach ($this->table[$index] as $i => $pair) {
                if ($pair[0] === $key) {
                    unset($this->table[$index][$i]);
                    $this->table[$index] = array_values($this->table[$index]);
                    return true;
                }
            }
        }
        return false; // Chave não encontrada
    }

    // Exibe a tabela hash
    public function display() {
        foreach ($this->table as $index => $pairs) {
            if ($pairs !== null) {
                echo "Index $index: ";
                foreach ($pairs as $pair) {
                    echo "[" . $pair[0] . " => " . $pair[1] . "] ";
                }
                echo PHP_EOL;
            }
        }
    }
}

// Exemplo de uso
$hashTable = new HashTable();

$hashTable->insert("nome", "Alice");
$hashTable->insert("idade", 25);
$hashTable->insert("cidade", "São Paulo");

echo "Tabela Hash:" . PHP_EOL;
$hashTable->display();

echo "Buscar 'nome': " . $hashTable->search("nome") . PHP_EOL; // Saída: Alice

$hashTable->delete("idade");
echo "Tabela Hash após remover 'idade':" . PHP_EOL;
$hashTable->display();

