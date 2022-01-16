<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css">
    <link rel="shortcut icon" href="<?=base_url?>assets/img/logo.png">
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header id="header">
            <a href="<?=base_url?>">
                <img src="<?=base_url?>assets/img/logo.png" alt="Camiseta Logo">
                <h1>Tienda de Camisetas</h1>
            </a>
        </header>

        <!-- MENÚ -->
        <?php $categorias = Utils::showCategorias() ?>
        <nav id="menu">
            <ul>
                <li><a href="<?=base_url?>">Inicio</a></li>
                <?php while($cat = $categorias->fetch_object()): ?>
                    <li><a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?= $cat->nombre ?></a></li>
                <?php endwhile; ?>
            </ul>
        </nav>