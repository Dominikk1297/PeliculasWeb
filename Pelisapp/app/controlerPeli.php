<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------

include_once 'config.php';
include_once 'modeloPeliDB.php'; 

/**********
/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function  ctlPeliInicio(){
   }

/*
 *  Muestra y procesa el formulario de alta 
 */

function ctlPeliAlta (){

    
    $codigo_pelicula = "";
    $nombre = "";
    $director = "";
    $genero = "";
    $imagen = "";


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['codigo_pelicula']) && isset($_POST['nombre']) && isset($_POST['director'])  && isset($_POST['genero'])) {
            $codigo_pelicula= $_POST['codigo_pelicula'];
            $nombre = $_POST['nombre'];
            $director = $_POST['director'];
            $genero= $_POST['genero'];
            $imagen = $_POST['imagen'];
        
          
            
            $nuevo = [
                $codigo_pelicula,
                $nombre,
                $director,
                $genero,
                $imagen,
            
               
            ];

           
    
        }
        modeloUserDB::UserAdd($nuevo);
        modeloUserDB::GetAll();
        header('Location:index.php?orden=VerPelis');

    } else {
        include_once 'plantilla/fnuevo.php';
    }




}
/*
 *  Muestra y procesa el formulario de Modificación 
 */
function ctlPeliBuscar (){

    $nombre = "";
    $director="";
    $genero="";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $peliculasbuscar = ModeloUserDB::BuscarNombre($nombre);
            include_once 'plantilla/resultado.php';
            
           
        } if (isset($_POST['director'])) {
            $director = $_POST['director'];
            $peliculasbuscar = ModeloUserDB::BuscarDirector($director);
            include_once 'plantilla/resultado.php';
        }

        if (isset($_POST['genero'])) {
            $director = $_POST['genero'];
            $peliculasbuscar = ModeloUserDB::BuscarGenero($genero);
            include_once 'plantilla/resultado.php';
        }

       
} else {
    include_once 'plantilla/fbuscarpeli.php';
}


}


/*
 *  Muestra detalles de la pelicula
 */

function ctlPeliDetalles(){

        $clave=$_GET['codigo'];
        $listadetalles = ModeloUserDB::UserGet($clave);
        $nombre=$listadetalles[1];
        $director=$listadetalles[2];
        $genero=$listadetalles[3];
        $imagen=$listadetalles[4];
       
        include_once 'plantilla/detalle.php'; 
    
    
    
}
/*
 * Borrar Peliculas


function ctlPeliBorrar(){

    $pelicula_borrar = $_GET['userid'];
    modeloUserDB::UserDel($pelicula_borrar);
    modeloUserDB::GetAll();
    header('Location:index.php?orden=VerPelis');

    
}
 */
/*
 * Cierra la sesión y vuelca los datos
 */
function ctlPeliCerrar(){
    session_destroy();
    modeloUserDB::closeDB();
    header('Location:index.php');
}

/*
 * Muestro la tabla con los usuario 
 */ 
function ctlPeliVerPelis (){
    // Obtengo los datos del modelo
    $peliculas = ModeloUserDB::GetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verpeliculas.php';
   
}