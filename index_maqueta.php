<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/logo.png">
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header id="header">
            <a href="index.php">
                <img src="assets/img/logo.png" alt="Camiseta Logo">
                <h1>Tienda de Camisetas</h1>
            </a>
        </header>

        <!-- MENÚ -->
        <nav id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Categoria 1</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 3</a></li>
                <li><a href="#">Categoria 4</a></li>
            </ul>
        </nav>

        <!-- BARRA LATERAL -->
        <aside id="lateral">

            <div id="login" class="block-aside">

                <form action="" method="POST">
                    <h3>Entrar a la Web</h3>

                    <label for="email">Email:</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña:</label>
                    <input type="password" name="password">

                    <input type="submit" value="Enviar">
                </form>

                <a href="#">Mis pedidos</a>
                <a href="#">Gestionar Pedidos</a>
                <a href="#">Gestionar Categorías</a>
            </div>
        </aside>

        <!-- CONTENIDO CENTRAL -->
        <main id="central">

            <h1>Productos Destacados</h1>

            <div id="list_products">

            <?php for($i= 0; $i < 8; $i++): ?>
                <div class="product">
                    <img src="assets/img/logo.png" alt="Imagen Producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$300.00 mx</p>
                    <a href="#">Comprar</a>
                </div>
            <?php endfor ?>

            </div>

        </main>

        <!-- FOOTER -->
        <footer id="footer">
            <p>Desarrollado por Em Hermaq &copy; <?= date('Y') ?> </p>
        </footer>

    </div>

</body>

</html>