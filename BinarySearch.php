<?php

class BinarySearch {
    // Função para realizar pesquisa binária em um array ordenado
    public static function search(array $arr, $target) {
        $left = 0;
        $right = count($arr) - 1;

        while ($left <= $right) {
            $mid = floor(($left + $right) / 2);

            if ($arr[$mid] == $target) {
                return $mid; // Retorna o índice do elemento encontrado
            }

            if ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return -1; // Elemento não encontrado
    }
}

// Exemplo de uso
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$target = 7;

$result = BinarySearch::search($array, $target);

if ($result != -1) {
    echo "Elemento encontrado no índice: " . $result . PHP_EOL;
} else {
    echo "Elemento não encontrado." . PHP_EOL;
}

