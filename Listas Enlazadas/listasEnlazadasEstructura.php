<?php
class Nodo {
    public $dato;
    public $siguiente;

    public function __construct($dato){
        $this->dato = $dato;
        $this->siguiente = null;
    }
}

class listasEnlazadas {
    public $inicio;
    public function __construct(){
        $this->inicio = null;
    }

    public function insertar($dato){
        $nuevoNodo = new Nodo($dato);
        $nuevoNodo ->siguiente=$this->inicio;
        $this->inicio= $nuevoNodo;
    }

    public function imprimirHTML(){
        $nuevoDato = $this->inicio;
        echo "<ul>";

        while($nuevoDato !== null){
            echo "\n   <li>".$nuevoDato->dato."</li>";
            $nuevoDato=$nuevoDato->siguiente;
        }

        echo "\n</ul>";
    }
}

$listaEnsalada = new listasEnlazadas();
$listaEnsalada->insertar("Dato 1");
$listaEnsalada->insertar("Dato 2");
$listaEnsalada->insertar("Dato 3");
$listaEnsalada->imprimirHTML();
?>