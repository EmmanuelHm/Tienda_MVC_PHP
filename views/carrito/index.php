<h1>Carrito de compras</h1>

<?php if( isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1 ): ?>

<a href="<?=base_url?>carrito/delete_all" class="button-small button-red">Vaciar Carrito</a>
<br/><br/>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Actions</th>
    </tr>

    <?php foreach($carrito as $indice => $elemento): 
        $producto = $elemento['producto'];
    ?>
        <tr>
            <td>
                <?php if($producto->imagen != null): ?>
                    <img src="<?=base_url?>/uploads/images/<?=$producto->imagen?>" alt="<?=$producto->imagen?>" class="img-carrito">
                <?php else: ?>
                    <img src="<?=base_url?>/assets/img/logo.png" alt="<?=$producto->imagen?>" class="img-carrito">
                <?php endif; ?>
            </td>
            <td>
                <a href="<?=base_url?>/producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
            </td>
            <td>$<?=$producto->precio?></td>
            <td>
                <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button-op">+</a>
                <?=$elemento['unidades']?>
                <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button-op">-</a>
            </td>
            <td>
                <a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button-small button-red">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br/><br/>
<?php $stats = Utils::statsCarrito(); ?>
<h3>Precio Total: $<?=$stats['total'];?> mx.</h3>

<br/>
<a href="<?=base_url?>pedido/hacer" class="button-small">Realizar Pedido</a>
<br/><br/><br/>

<?php else: ?>
    <p>El carrito esta vacio. Agrega algún producto</p>
<?php endif; ?>