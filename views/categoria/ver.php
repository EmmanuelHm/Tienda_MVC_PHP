<?php if(isset($categoria)):?>
    <h1><?=$cat->nombre?></h1>
<?php else: ?>
    <h1>La categoria no existe.</h1>
<?php endif; ?>

<?php if($productos->num_rows == 0): ?>
    <p>No hay Productos para mostrar</p>
<?php else: ?>

    <div id="list_products">

        <?php while ($product = $productos->fetch_object()) : ?>
            <div class="product">
                <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
                    <?php if($product->imagen != null):?>
                        <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="<?=$product->nombre?>">
                    <?php else:?>
                        <img src="<?=base_url?>assets/img/logo.png" alt="Imagen Producto">
                    <?php endif; ?>
                    <h2><?=$product->nombre?></h2>
                </a>
                <p>$<?=$product->precio?> mx</p>
                <a href="<?=base_url?>carrito/add&id=<?=$product->id?>">Comprar</a>
            </div>
        <?php endwhile ?>
    </div>
<?php endif; ?>