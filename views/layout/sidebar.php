<!-- BARRA LATERAL -->
<aside id="lateral">

<div id="carrito" class="block-aside">
    <h3>Mi carrito</h3>
    <ul>
        <?php $stats = Utils::statsCarrito(); ?>
        <li><a href="<?=base_url?>carrito/index">Productos (<?=$stats['count'];?>)</a></li>
        <li><a href="<?=base_url?>carrito/index">Total: $<?=$stats['total'];?> </a></li>
        <li><a href="<?=base_url?>carrito/index">Ver el carrito</a></li>
    </ul>
</div>

<div id="login" class="block-aside">
 
    <?php if( !isset($_SESSION['identity']) ): ?>
    <form action="<?=base_url?>usuario/login" method="POST">
        <h3>Entrar a la Web</h3>

        <label for="email">Email:</label>
        <input type="email" name="email">

        <label for="password">Contraseña:</label>
        <input type="password" name="password">

        <input type="submit" value="Enviar">
    </form>
    
    <?php else: ?>
        <h3> <?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?> </h3>
    <?php endif; ?>
    
    <?php if(isset($_SESSION['admin'])): ?>
    <a href="<?=base_url?>categoria/index">Gestionar Categorías</a>
    <a href="<?=base_url?>producto/gestion">Gestionar Productos</a>
    <a href="<?=base_url?>pedido/">Gestionar Pedidos</a>
    <?php endif; ?>

    <?php if( isset($_SESSION['identity']) ): ?>
    <a href="<?=base_url?>pedido/">Mis pedidos</a>
    <a href="<?=base_url?>usuario/logout" class="red">Cerrar Sesión</a>
    <?php else: ?> 
    <a href="<?=base_url?>usuario/registro">Registrate</a>
    <?php endif; ?>
    
</div>
</aside>

<!-- CONTENIDO CENTRAL -->
<main id="central">