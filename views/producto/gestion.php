<h1>Gestión de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button-small">Crear Producto</a>

<?php if(isset($_SESSION["producto"]) && $_SESSION['producto'] == "Completed"): ?>
    <br/><br/><strong class="green">El producto se ha creado con éxito.</strong>
<?php elseif(isset($_SESSION["producto"]) && $_SESSION['producto'] != "Completed"): ?>
    <br/><br/><strong class="red">El producto no se ha creado.</strong>
<?php endif; ?> 

<?php Utils::deleteSession('producto');?>

<?php if(isset($_SESSION["delete"]) && $_SESSION['delete'] == "Completed"): ?>
    <br/><br/><strong class="green">El producto se ha eliminado exitosamente.</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION['delete'] != "Completed"): ?>
    <br/><br/><strong class="red">El producto no se ha eliminado.</strong>
<?php endif; ?> 

<?php Utils::deleteSession('delete');?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($prod = $productos->fetch_object()): ?>
        <tr>
            <td><?= $prod->id; ?></td>
            <td><?= $prod->nombre; ?></td>
            <td>$ <?= $prod->precio; ?></td>
            <td><?= $prod->stock; ?></td>
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$prod->id?>" class="blue">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$prod->id?>" class="red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>