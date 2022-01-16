<h1>Registrarse</h1>

<?php if( isset($_SESSION['register']) && $_SESSION['register'] == "Complete" ): ?>
        <strong class="green">Registro completado correctamente.</strong><br/><br/>
<?php elseif( isset($_SESSION['register']) && $_SESSION['register'] == "Failed" ): ?>
    <strong class="red">Registro fallido. Introduzca correctamente sus datos.</strong><br/><br/>
<?php endif; ?>
<?php Utils::deleteSession('register')?>

<div class="block-aside">
    <form action="<?=base_url?>usuario/save" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required>
        
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" required>
        
        <input type="submit" value="Registrarse">
    </form>
</div>