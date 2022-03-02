<?php if( isset($_SESSION['identity']) ): ?>

    <h1>Hacer Pedido</h1>
    <a href="<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a>

    <br/><br/>
    <h3>Dirección de envio:</h3>
    <br/>
    <div class="block-aside">
        <form action="<?=base_url.'pedido/add'?>" method="POST">
            <label for="provincia">Provincia</label>
            <input type="text" name="provincia" required/>

            <label for="localidad">Ciudad</label>
            <input type="text" name="localidad" required/>

            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" required/>

            <input type="submit" value="Confirmar pedido">
        </form>
    </div>

<?php else: ?>

    <h1>Necesitas iniciar sesión</h1>
    <p>Crea o ingresa a una cuenta para comprar.</p>

<?php endif; ?>