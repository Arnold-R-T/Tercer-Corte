<?php
class Grafo {
    public $vertices;
    public $aristas;

    public function __construct() {
        $this->vertices = array();
        $this->aristas = array();
    }

    public function agregarVertices($vertice) {
        $this->vertices[] = $vertice;
        $this->aristas[$vertice] = array();
    }

    public function agregarAristas($vertice1, $vertice2) {
        $this->aristas[$vertice1][] = $vertice2;
        $this->aristas[$vertice2][] = $vertice1;
    }

    public function imprimirGrafo() {
        foreach ($this->vertices as $vertice) {
            echo $vertice . " -> ";
            foreach ($this->aristas[$vertice] as $item) {
                echo $item . " -> ";
            }
            echo ".\n";
        }
    }
}

$miGrafo = new Grafo();
$miGrafo->agregarVertices('A');
$miGrafo->agregarVertices('B');
$miGrafo->agregarVertices('C');
$miGrafo->agregarVertices('D');

$miGrafo->agregarAristas('A', 'B');
$miGrafo->agregarAristas('B', 'C');
$miGrafo->agregarAristas('C', 'A');
$miGrafo->agregarAristas('B', 'D');

echo "El grafo creado es:\n";
$miGrafo->imprimirGrafo();
?>