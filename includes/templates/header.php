<?php 


if(!isset($_SESSION)){
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ' '; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="menu responsive">
                </div>

                <div class="derecha">
                <img src="/build/img/dark-mode.svg" class="dark-mode-boton">    
                <nav class="navegacion">
                    <a class="a1" href="nosotros.php">Nosotros</a>
                    <a class="a2" href="anuncios.php">Anuncios</a>
                    <a class="a3" href="blog.php">Blog</a>
                    <a class="a4" href="contacto.php">Contacto</a>
                    <?php if($auth): ?>
                        <a href="cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>    
                </nav>
                
            </div><!--Cierre de la barra-->

            
        </div>
        <?php 
            if($inicio){
                echo "<h1 class='descripcion-header'>Venta de Casas y Departamentos de Lujo</h1>";
            }
            ?>
    </header>