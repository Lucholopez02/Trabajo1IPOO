<?php
include 'Viajes.php';

/** 
 * Función que inicializa una estructura de datos con ejemplos de viajes y retorna la colección
 * @return array
 */
function datosPasajeros(){
    $pasajerosArray = [];
    $pasajero1 = ["nombre" => "Joaquin",
                "apellido" => "Beckam",
                "documento" => 38211234];
    
    $pasajero2 = ["nombre" => "Julieta",
                "apellido" => "Rodriguez",
                "documento" => 22198244];
    
    $pasajero3 = ["nombre" => "Albert",
                "apellido" => "Ozil",
                "documento" => 25985441];
    
    $pasajero4 = ["nombre" => "Mariano",
                "apellido" => "Closs",
                "documento" => 38711344];
    
        $pasajerosArray[0] = $pasajero1;
        $pasajerosArray[1] = $pasajero2;
        $pasajerosArray[2] = $pasajero3;
        $pasajerosArray[3] = $pasajero4;
        $pasajerosArray = [];
    return $pasajerosArray;
}

/**
 * Solicita al usuario un número en el rango [$min,$max]
 * @param int $min
 * @param int $max
 * @return int 
 */
function solicitarNumeroEntre($min, $max)
{
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/**
 * Función que muestra las opciones del menú en la pantalla
 * @return int
 */

function seleccionarOpcion() {
    $minimo = 1;
    $maximo = 3;
        echo"1) Crear nuevo viaje \n";
        echo"2) Modificar datos de un viaje \n";
        echo"3) Ver datos de viajes realizados \n";
        $opcion = solicitarNumeroEntre($minimo, $maximo);
        // Function solicitarNumeroEntre($min, $max), reusada el archivo tateti.php
    return $opcion;
}
//Inicialización de variables
$viajesRealizados=[];
$j= 1;
//Proceso
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
                echo "Ingrese numero de codigo del viaje: ";
                $unCodigo=strtoupper(trim(fgets(STDIN)));
                echo "Ingrese el destino: ";
                $unDestino=strtoupper(trim(fgets(STDIN)));
                echo "Ingrese cantidad de pasajeros: ";
                $pasajeros=trim(fgets(STDIN));
                $viaje= new Viajes($unCodigo, $unDestino, $pasajeros);
                $nuevaPosicion=count($viajesRealizados);
                $viajesRealizados[$nuevaPosicion]=$viaje;
                while($j<=$viajesRealizados){
                    
                    $j++;
                }
                //if($pasajeros > $auxColeccion){}
        break;
        case 2:    
            //se muestra en pantalla los datos de una partida guardada en el arreglo
            $maximo = count($datosViajes);
            echo "Ingrese el numero del viaje que desea ver: ";
            $numeroValido = solicitarNumeroEntre($minimo, $maximo);
            mostrarJuego($numeroValido, $arregloJuego);
        break;
        case 3: 
            echo "****************************** \n";
            for ($i=0; $i < count($viajesRealizados); $i++){
                echo $viajesRealizados[$i] . "\n";
            }
            echo "****************************** \n";
            
            
        break;
    }
} while (($opcion <= 3) && ($opcion >= 1));



