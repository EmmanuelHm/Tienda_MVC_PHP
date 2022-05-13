<?php
// Cargar el modelo 'pedido'
require_once 'models/pedido.php';

class pedidoController{

    public function hacer(){
        
        require('views/pedido/hacer.php');
    }

    public function add(){
        // Verificar si el usuario esta identificado
        if( isset( $_SESSION['identity']) ){

            $usuario_id = $_SESSION['identity']->id;

            // Comprobar info
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utils::statsCarrito();
            $costo = $stats['total'];

            if($provincia && $localidad && $direccion){

                // Guardar datos en la BD
                $pedido = new Pedido();
                $pedido->setUsuarioId($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCosto($costo);

                $save =$pedido->save();

                // Guardar linea pedido
                $save_linea = $pedido->save_linea();

                if($save && $save_linea){
                    $_SESSION['pedido'] = "Complete";
                    Utils::deleteSession('carrito');
                }
                else{
                    $_SESSION['pedido'] = "Failed";

                }

                header('Location:'.base_url.'pedido/confirmado');
            }
            else{
                $_SESSION['pedido'] = "Failed";
            }

        }else{
            // Redirigir al index
            header('Location:'.base_url);
        }
    }

    public function confirmado(){

        if( isset($_SESSION['identity']) ){

            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuarioId($identity->id);

            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos(){
        // Verificar si esta identificado
        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();

        // Sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        // Verificar si esta identificado
        Utils::isIdentity();

        if( isset($_GET['id']) ){

            $id = $_GET['id'];

            // Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            // Sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/pedido/detalle.php';
        }
        else{
            header('Location:'.base_url.'pedido/mis_pedidos');
        }
    }

    public function gestion(){
        // Verificar si es admin
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado(){
        // Verificar si es admin
        Utils::isAdmin();

        if( isset($_POST['pedido_id']) && isset($_POST['estado']) ){

            // Obtener id y el estado
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            // Update del pedido 
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            header('Location:'.base_url.'pedido/detalle&id='.$id);
        }
        else{
            header('Location:'.base_url);
        }
    }

}