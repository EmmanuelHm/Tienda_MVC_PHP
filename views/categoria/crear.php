<h1>Crear Nueva Categoría</h1>

<div class="block-aside">
    <form action="<?=base_url?>categoria/save" method="POST" >
        <label for="nombre">Nombre Categoría:</label>
        <input type="text" name="nombre" required/>
        <br>
        <input type="submit" value="Guardar">
    </form>
</div>

