<?php if (isset($pro)) : ?>
    <h1><?= $pro->nombre ?></h1>
<?php else : ?>
    <h1>El Producto no existe.</h1>
<?php endif; ?>

<div id="product-detail">
    <?php if ($pro->imagen != null) : ?>
        <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="<?= $pro->nombre ?>">
    <?php else : ?>
        <img src="<?= base_url ?>assets/img/logo.png" alt="Imagen Producto">
    <?php endif; ?>
    <div class ="info">
        <p><?= $pro->descripcion ?></p>
        <p>$<?= $pro->precio ?> mx</p>
        <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button-small">Comprar</a>
    </div>
    
</div>