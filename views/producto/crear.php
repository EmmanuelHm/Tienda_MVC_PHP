<?php if(isset($edit) && isset($pro) && is_object($pro)):?>
    <h1>Editar Productos <?=$pro->nombre?></h1>
    <?php $url_action = base_url."producto/save&id=".$pro->id; ?>
<?php else: ?>
    <h1>Crear Nuevo Producto</h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>

<div class="block-aside">

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre Producto:</label>
        <input type="text" name="nombre" value="<?=isset($pro) &&  is_object($pro) ? $pro->nombre : ''; ?>" required/>

        <label for="descripcion">Descripció:</label>
        <textarea name="descripcion">
            <?=isset($pro) &&  is_object($pro) ? trim($pro->descripcion) : '' ?>    
        </textarea>

        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?=isset($pro) &&  is_object($pro) ? $pro->precio : ''; ?>" required/>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?=isset($pro) &&  is_object($pro) ? $pro->stock : ''; ?>" required/>

        <label for="categoria">Categoría:</label>
        <?php $categorias = Utils::showCategorias() ?>
        <select name="categoria">

            <?php while($cat = $categorias->fetch_object()):?>
                <option value="<?= $cat->id ?>" <?=isset($pro) &&  is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>

        </select>

        <label for="imagen">Imágen:</label>
        <?php if(isset($pro) &&  is_object($pro) && !empty($pro->imagen)): ?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="<?=$pro->nombre?>" class="thumb">
        <?php endif; ?>

        <input type="file" name="imagen"/>
        
        <input type="submit" value="Guardar">
    </form>
</div>
