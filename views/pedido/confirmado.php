<?php if( isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'Complete' ): ?>

    <h1>Tu pedido se ha confirmado</h1>

    <?php if(isset($pedido)): ?>

        <h3>Datos del pedido</h3> <br/>
        
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

<?php elseif( isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'Complete' ): ?>

    <h1>No se hizo el pedido</h1>
    <p>No se ha podido procesar su pedido</p>

<?php endif; ?>