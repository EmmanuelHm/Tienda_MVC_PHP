<h1>Detalle del Pedido</h1>

<?php if(isset($pedido)): ?>

    <?php if( isset($_SESSION['admin']) ): ?>
        <h3>Cambiar estado del pedido</h3>

        <div class="block-aside">

        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>

            <select name="estado">
                <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '' ?> >
                    Pendiente
                </option>
                <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '' ?> >
                    En preparación
                </option>
                <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '' ?> >
                    Peparado para el envio
                </option>
                <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '' ?> >
                    Enviado
                </option>
            </select>

            <input type="submit" value="Cambiar estado"/>
        </form>

        </div>
    <?php endif; ?>

    <h3>Dirección de envio</h3> <br/>

    Provincia: <?= $pedido->provincia?> <br/>
    Ciudad: <?= $pedido->localidad?> <br/>
    Direccion: <?= $pedido->direccion?> <br/><br/>

    <h3>Datos del pedido</h3> <br/>
    
    Estado: <strong> <?= Utils::showStatus($pedido->estado) ?> </strong> <br/>
    Número de pedido: <?= $pedido->id?> <br/>
    Total a pagar: $<?= $pedido->costo?> <br/><br/>
    <strong>Productos:</strong>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
    <?php while($producto = $productos->fetch_object()): ?>
        
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
            <td><?=$producto->unidades?></td>
        </tr>
            
    <?php endwhile; ?>
    </table>

<?php endif; ?>