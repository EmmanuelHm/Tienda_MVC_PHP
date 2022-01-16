<?php
// Iniciar Session
session_start();
// Cargar el autoload de los controladores
require_once 'autoload.php';
// Cargar la Base de Datos
require_once 'config/db.php';
// Cargar la base_url (.htaccess) (Para rutas amigables)
require_once 'config/parameters.php';
// Añadir helpers
require_once 'helpers/utils.php';

// Cargar la cabecera
require_once 'views/layout/header.php';
// Cargar la barra lateral
require_once 'views/layout/sidebar.php';


// Funcion para mandar la controlador de error en caso de no encontrar ruta.
function show_error(){
    $error = new errorController();
    $error->index();
}

if( isset($_GET['controller']) ){
    $nombre_controlador = $_GET['controller'].'Controller';
}
elseif( !isset($_GET['controller']) && !isset($_GET['action']) ){
    $nombre_controlador = controller_default;
}
else{
    // echo "La página que buscas no existe.";
    show_error();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    
    if( isset($_GET['action']) && method_exists($controlador, $_GET['action']) ){
        $action = $_GET['action'];
        $controlador->$action();
    }
    elseif( !isset($_GET['controller']) && !isset($_GET['action']) ){
        $action_default = action_default;
        $controlador->$action_default();
    }
    else{
        // echo "La página que buscas no existe.";
        show_error();
    }
}
else{
    // echo "La página que buscas no existe.";
    show_error();
}

// Cargar el footer
require_once 'views/layout/footer.php';