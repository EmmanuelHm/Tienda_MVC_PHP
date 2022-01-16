<?php
// Cargar el modelo Categoria
require_once 'models/categoria.php';
// Cargar modelo de Productos;
require_once 'models/producto.php';

class categoriaController{
    
    public function index(){
        // Verificar si es Admin
        Utils::isAdmin();
        // Obtener categorias
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function ver(){

        if(isset($_GET['id'])){

            // Conseguir la categoria
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOne();

            // Conseguir Productos
            $producto = new Producto();
            $producto->setCategoriaId($id);
            $productos = $producto->getAllCategory();

        }
        require_once 'views/categoria/ver.php';
    }

    public function crear(){
        // Verificar si es Admin

        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        // Verificar si es Admin
        Utils::isAdmin();

        if(isset($_POST) && isset($_POST['nombre']) ){
            // Guardar la Categoria en la BD
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            $save = $categoria->save();
        }

        header('Location:'.base_url.'categoria/index');
    }
}