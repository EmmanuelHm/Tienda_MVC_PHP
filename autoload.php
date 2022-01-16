<?php

function controllers_autoload($classname){
    include 'controllers/'.$classname.'.php';
}

spl_autoload_register('controllers_autoload');

// Este código lo unico que hace es entrar a la carpeta controllers y cargar todos archivos de la carpeta 