<?php
require_once 'models/producto.php';

class productoController{
    public function index(){
        $producto = new Producto();
        $productos = $producto->getRandom(8);
        // Cargar la vista de productos destacados
        require_once 'views/producto/destacados.php'; 
    }

    public function ver(){
        // Comprobar si llega el id por la URL
        if(isset($_GET['id'])){
            // Crear variable id
            $id = $_GET['id'];

            // Crear Instancia
            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();

        }
        // Cargar Vista
        require_once 'views/producto/ver.php';
    }

    public function gestion(){
        // Comprobar si es Admin
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';
    }

    public function crear(){
        // Comprobar si es Admin
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save(){
        // Comprobar si es Admin
        Utils::isAdmin();

        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $precio && $stock && $categoria){
                // Crear instancia y asignar valores
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoriaId($categoria);

                if(isset($_FILES['imagen']))
                {
                    // Guardar la Imagen
                    $file = $_FILES['imagen'];  //Nombre puesto al input 'imagen'
                    $filename = $file['name'];  // Guardar el nombre del archivo
                    $mimetype = $file['type'];  // Guardar el tipo de archivo

                    // Validar
                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                        // Validar si hay formulario para guardar imagen
                        if(!is_dir('uploads/images')){
                            // Crear directorio
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                        // Guardar nombre en instancia
                        $producto->setImagen($filename);
                    }
                }

                if(isset($_GET['id'])){
                    // Actualizar producto
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                }
                else{
                    // Guardar producto
                    $save = $producto->save();
                }
                

                if($save){
                    $_SESSION['producto'] = "Completed";
                }
                else{
                    $_SESSION['producto'] = "Failed";
                }
            }
            else{
                $_SESSION['producto'] = "Failed";
            }
        }
        else{
            $_SESSION['producto'] = "Failed";
        }
        header('Location:'.base_url.'producto/gestion');
    }

    public function editar(){
        // Comprobar si es Admin
        Utils::isAdmin();

        // Comprobar si llega el id por la URL
        if(isset($_GET['id'])){
            // Crear variable id
            $id = $_GET['id'];
            // Crear variable edit
            $edit = true;

            // Crear Instancia
            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();

            // Cargar Vista
            require_once 'views/producto/crear.php';
        }
        else{
            header('Location:'.base_url.'producto/gestion');
        }
    }

    public function eliminar(){
        // Comprobar si es Admin
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);

            $delete = $producto->delete();

            if($delete){
                $_SESSION['delete'] = "Completed";
            }
            else{
                $_SESSION['delete'] = "Failed";
            }
        }
        else{
            $_SESSION['delete'] = "Failed";
        }
        header('Location:'.base_url.'producto/gestion');
    }
}