<?php if( isset($gestion) ): ?>
    <h1>Gestionar Pedidos</h1>
<?php else :?>
    <h1>Mis Pedidos</h1>
<?php endif; ?>

<table>
    <tr>
        <th>N° pedido</th>
        <th>Costo</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>

    <?php while( $ped = $pedidos->fetch_object() ):
    ?>
        <tr>
            <td>
                <a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>"> 
                    <?=$ped->id?> 
                </a>
            </td>
            <td>
                $<?= $ped->costo ?>
            </td>
            <td>
                <?= $ped->fecha ?>
            </td>
            <td>
                <?= Utils::showStatus($ped->estado) ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>