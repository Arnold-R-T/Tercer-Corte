<?php
    // Arrays: Arrays que contienen los diferentes destinos.
    $vuelosSurAmerica = array("Destino Sur 1" => "Colombia", "Destino Sur 2" => "Peru", "Destino Sur 3" => "Brasil");
    $vuelosNorteAmerica = array("Destino Norte 1" => "Estados Unidos", "Destino Norte 2" => "Mexico", "Destino Norte 3" => "Canada");
    print_r($vuelosSurAmerica);
    print_r($vuelosNorteAmerica);

    // Colas: Contienen el orden de salida de los vuelos
    $vuelosEnEspera = array();

    array_push($vuelosEnEspera, "Estados Unidos");
    array_push($vuelosEnEspera, "Peru");
    array_push($vuelosEnEspera, "Brasil");

    $siquienteVuelo = array_shift($vuelosEnEspera);

    echo "\nSiguiente vuelo en salir con destino a: ".$siquienteVuelo."\n";

    // Pilas: Contienen la lista de los pasajeros a bordo del vuelo, que despues compara con la lista 
    // de pasajeros para saber si el ultimo en ingresar al vuelo es el ultimo pasajero 
    // que abordara el vuelo
    $listaPasajeros = array("Juan", "Pedro", "Jose");
    $ultimoEnLista = end($listaPasajeros);

    $pasajerosABordo = array();

    array_push($pasajerosABordo, "Juan");
    array_push($pasajerosABordo, "Pedro");
    array_push($pasajerosABordo, "Jose");
    
    $ultimoEnIngresar = array_pop($pasajerosABordo);

    if($ultimoEnIngresar === $ultimoEnLista){
        echo "\nVuelo listo para el despegue\n";
    } else {
        echo "\nFaltan pasajeros\n";
    }

    // Listas Enlazadas: Contiene datos respecto al usuario y respectivo vuelo
    class Nodo {
        public $persona;
        public $vuelo;
        public $asiento;
        public $siguiente;

        public function __construct($persona, $vuelo, $asiento){
            $this->persona = $persona;
            $this->vuelo = $vuelo;
            $this->asiento = $asiento;
            $this->siguiente = null;
        }
    }

    class listasEnlazadas {
        public $inicio;
        public function __construct(){
            $this->inicio = null;
        }

        public function insertar($persona, $vuelo, $asiento){
            $nuevoNodo = new Nodo($persona, $vuelo, $asiento);
            $nuevoNodo ->siguiente=$this->inicio;
            $this->inicio= $nuevoNodo;
        }

        public function mostrar(){
            $nuevoDato = $this->inicio;

            while($nuevoDato !== null){
                echo "\nPersona: ".$nuevoDato->persona;
                echo "\nVuelo: ".$nuevoDato->vuelo;
                echo "\nAsiento: ".$nuevoDato->asiento."\n";
                $nuevoDato=$nuevoDato->siguiente;
            }

        }
    }

    $listaEnsalada = new listasEnlazadas();
    $listaEnsalada->insertar("Julio", 001, 01);
    $listaEnsalada->insertar("Karen", 001, 02);
    $listaEnsalada->insertar("Gabriel", 001, 03);
    $listaEnsalada->mostrar();

    // Grafo: Contiene la informacion de rutas entre los diferentes destinos
    class Grafo {
        public $paises;
        public $rutas;

        public function __construct() {
            $this->paises = array();
            $this->rutas = array();
        }

        public function agregarPaises($pais) {
            $this->paises[] = $pais;
            $this->rutas[$pais] = array();
        }

        public function agregarRutas($pais1, $pais2) {
            $this->rutas[$pais1][] = $pais2;
            $this->rutas[$pais2][] = $pais1;
        }

        public function imprimirGrafo() {
            foreach ($this->paises as $pais) {
                echo $pais . " -> ";
                foreach ($this->rutas[$pais] as $item) {
                    echo $item . " -> ";
                }
                echo ".\n";
            }
        }
    }

    $miGrafo = new Grafo();
    $miGrafo->agregarPaises("Colombia");
    $miGrafo->agregarPaises("Peru");
    $miGrafo->agregarPaises("Brasil");
    $miGrafo->agregarPaises("Estados Unidos");
    $miGrafo->agregarPaises("Mexico");
    $miGrafo->agregarPaises("Canada");

    $miGrafo->agregarRutas("Colombia", "Brasil");
    $miGrafo->agregarRutas("Peru", "Canada");
    $miGrafo->agregarRutas("Colombia", "Estados Unidos");
    $miGrafo->agregarRutas("Mexico", "Brasil");

    echo "\nRutas disponibles:\n";
    $miGrafo->imprimirGrafo();

    // Arbol: 
	class NodoArbol {
	    public $valor;
	    public $izquierdo;
	    public $derecho;
	  
	    public function __construct($valor){
	        $this->valor = $valor;
	        $this->izquierdo = null;
	        $this->derecho = null;
	    }
	}
	
	class ArbolBinario {
	    private $raiz;
	  
	    public function __construct(){
	        $this->raiz = null;
	    }
	  
	    public function insertar($valor){
	        $this->raiz = $this->insertarRec($this->raiz, $valor);
	    }
	  
	    private function insertarRec($nodo, $valor){
	        if($nodo === null){
	            return new NodoArbol($valor);
	        }
	    
	        if($valor < $nodo->valor){
	            $nodo->izquierdo = $this->insertarRec($nodo->izquierdo, $valor);
	        } else if ($valor > $nodo->valor){
	            $nodo->derecho = $this->insertarRec($nodo->derecho, $valor);
	        }
	    
	        return $nodo;
	    }
	  
	    public function inOrden(){
	        $this->inOrdenRec($this->raiz); 
	    }
	  
	    private function inOrdenRec($nodo){
	        if($nodo !== null){
	            $this->inOrdenRec($nodo->izquierdo);
	            echo $nodo->valor . " ";
	            $this->inOrdenRec($nodo->derecho);
	        }
	    }
    }  
	  
	
	$arbol = new ArbolBinario();
	$arbol->insertar("\n0 - Aeropuerto\n");
	$arbol->insertar("\n1 - Terminal A\n");
    $arbol->insertar("\n2 - Terminal B\n");
    $arbol->insertar("\n1.1 - Pista A1\n");
	$arbol->insertar("\n1.2 - Pista A2\n");
    $arbol->insertar("\n2.1 - Pista B1\n");
	$arbol->insertar("\n2.2 - Pista B2\n");
	
	echo "\nOrganizacion Aeropuerto:\n";
	$arbol->inOrden();
	
	
?>