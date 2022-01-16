<h1>Algunos de nuestros productos</h1>

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