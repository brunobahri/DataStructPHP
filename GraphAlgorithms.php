<?php

class Graph {
    private $adjacencyList;

    public function __construct() {
        $this->adjacencyList = [];
    }

    // Adiciona uma aresta ao grafo
    public function addEdge($vertex, $edge) {
        if (!isset($this->adjacencyList[$vertex])) {
            $this->adjacencyList[$vertex] = [];
        }
        if (!isset($this->adjacencyList[$edge])) {
            $this->adjacencyList[$edge] = [];
        }
        $this->adjacencyList[$vertex][] = $edge;
        $this->adjacencyList[$edge][] = $vertex;
    }

    // Busca em Profundidade (Depth-First Search)
    public function DFS($start) {
        $visited = [];
        $this->DFSUtil($start, $visited);
    }

    private function DFSUtil($vertex, &$visited) {
        $visited[$vertex] = true;
        echo $vertex . " ";

        foreach ($this->adjacencyList[$vertex] as $neighbor) {
            if (!isset($visited[$neighbor])) {
                $this->DFSUtil($neighbor, $visited);
            }
        }
    }

    // Busca em Largura (Breadth-First Search)
    public function BFS($start) {
        $visited = [];
        $queue = [];

        $visited[$start] = true;
        array_push($queue, $start);

        while (!empty($queue)) {
            $vertex = array_shift($queue);
            echo $vertex . " ";

            foreach ($this->adjacencyList[$vertex] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    $visited[$neighbor] = true;
                    array_push($queue, $neighbor);
                }
            }
        }
    }
}

// Exemplo de uso
$graph = new Graph();
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(1, 2);
$graph->addEdge(2, 3);
$graph->addEdge(3, 3);

echo "Busca em Profundidade (DFS) a partir do vértice 2:" . PHP_EOL;
$graph->DFS(2);

echo PHP_EOL . "Busca em Largura (BFS) a partir do vértice 2:" . PHP_EOL;
$graph->BFS(2);

