<?php 
    session_start();
?>
<!doctype html>
<html lang="es">

    <head>
        
        <title>PETKEA</title>
        

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <link rel="shortcut icon" href="img/logo/petkeaico.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/e4d17b33cc.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/estilos.css">
        
    </head>

    <body>
        <!-- Logo
	    ============================================= -->
        <div class="header w-100 p-2">

        <a href="pantalla_inicio.php"><img id="petkea"  src="img/logo/petkea.png" alt="logo" class="logo"></a>

        </div>
        <?php 
            if (isset($_GET['error'])) {
                echo '<div class="text-center p-1 bg-warning"><i class="fas fa-exclamation-triangle">'.$_GET['error'].'</i> <i class="fas fa-exclamation-triangle"></i></div>';
            }
        ?>
        
        <!-- Barra Navegar
	============================================= -->
    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarButton" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon c-white"><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarButton">

                <ul class="navbar-nav">

                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle c-white" href="#" id="navbarPerro" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perros
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarPerro">
                            <li><a class="dropdown-item" name="ropa" href="pantalla_productos.php?cat1=perro&cat2=ropa" target="_self">Ropa</a></li>
                            <li><a class="dropdown-item" name="collar" href="pantalla_productos.php?cat1=perro&cat2=collar" target="_self">Collares</a></li>
                            <li><a class="dropdown-item" name="juguete" href="pantalla_productos.php?cat1=perro&cat2=juguete" target="_self">Juguetes</a></li>
                        </ul>
                    </li>

                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle c-white" href="#" id="navbarGato" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gatos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarGato">
                            <li><a class="dropdown-item" name="descanso" href="pantalla_productos.php?cat1=gato&cat2=descanso" target="_self">Descanso</a></li>
                            <li><a class="dropdown-item" name="juguete" href="pantalla_productos.php?cat1=gato&cat2=juguete" target="_self">Juguetes</a></li>
                            <li><a class="dropdown-item" name="higiene" href="pantalla_productos.php?cat1=gato&cat2=higiene" target="_self">Higiene</a></li>
                        </ul>
                    </li>

                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle c-white" href="#" id="navbarPajaro" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pajaros
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarPajaro">
                            <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pajaro&cat2=jaula" target="_self">Jaulas</a></li>
                            <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pajaro&cat2=accesorio" target="_self">Accesorios</a></li>
                            <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pajaro&cat2=comida" target="_self">Comida</a></li>
                        </ul>
                    </li>

                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle c-white" href="#" id="navbarRoedor" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Roedores
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarRoedor">
                            <li><a class="dropdown-item" href="pantalla_productos.php?cat1=roedor&cat2=jaula" target="_self">Jaulas</a></li>
                            <li><a class="dropdown-item" href="pantalla_productos.php?cat1=roedor&cat2=accesorio" target="_self">Accesorios</a></li>
                            <li><a class="dropdown-item" href="pantalla_productos.php?cat1=roedor&cat2=comida" target="_self">Comida</a></li>
                        </ul>
                    </li>

                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle c-white" href="#" id="navbarPez" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Peces
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarPez">
                            <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pez&cat2=comida" target="_self">Comida</a></li>
                            <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pez&cat2=decoracion" target="_self">Decoración</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
            <?php
            //Si esta dado de alta le aparece su mascota y su ficha de usuario
                if (isset($_SESSION['usuario'])) {
                    echo '<div class="d-flex mx-2">';
                    $emailUsuario = $_SESSION['usuario']['email'];

                    if (file_exists('img/mascota/'.$emailUsuario.'.png')) {

                        echo '<img src="img/mascota/'.$emailUsuario.'.png" alt="mascota" witdh="50" height="50" >';
                    
                    } else if (file_exists('img/mascota/'.$emailUsuario.'.jpg')) {

                        echo '<img src="img/mascota/'.$emailUsuario.'.jpg" alt="mascota" witdh="50" height="50" >';

                    }
                    echo '</div>';
                    echo '<i witdh="50" height="50" class="far fa-heart c-white"></i>';
                }
            ?>
            <!--Registro cliente-->
            <div class="d-flex mx-2">
            <?php 
                if (isset($_SESSION['usuario'])) {
                    echo '<a href="pantalla_cliente.php" class="boton-registro petkea-ico"  alt="cuenta">'.$_SESSION['usuario']['nombre'].'</a>';
                }else {
                    echo '<a href="pantalla_acceso.php" class="boton-registro"  alt="cuenta"><i class="fas fa-user"></i></a>';
                }
            ?>
            </div>  
            <!--Mas sobre nosotros-->
            <div class="d-flex mx-2">
                
                <a href="pantalla_petkea.php" class="boton-registro petkea-ico"  alt="cuenta">PETKEA</a>
                
            </div>  
            <!--Carro--> 
            <div class="d-flex mx-2">

                <a href="pantalla_carro.php" class="boton-registro" ><i class="fas fa-shopping-cart"></i></a>
                
            </div> 
            <?php 
                //Boton cerrar sesión
                if (isset($_SESSION['usuario'])) {
                    echo '<div class="d-flex mx-2">';

                    echo '<a href="cerrar_sesion.php" class="boton-cerrar-sesion" id="cerrar-sesion"><i class="fas fa-power-off"></i></a>';

                    echo '</div>';
                }
            ?>
        </div>

    </nav>
        <!--Contenido pagina-->
        <div class="d-flex justify-content-center w-100 h-100">
            
            <div class="align-middle">

                <div class="m-5 p-5 bg-white">

                    
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p class="text-center h1">Ficha de <?php echo $_SESSION['usuario']['nombre'] ?></p>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <?php
                                $emailUsuario = $_SESSION['usuario']['email'];

                                if (file_exists('img/mascota/'.$emailUsuario.'.png')) {
        
                                    echo '<img src="img/mascota/'.$emailUsuario.'.png" alt="mascota" witdh="500" height="500">';
                                
                                } else if (file_exists('img/mascota/'.$emailUsuario.'.jpg')) {
        
                                    echo '<img src="img/mascota/'.$emailUsuario.'.jpg" alt="mascota" witdh="500" height="500">';
        
                                }else{
                                    echo '<img src="img/mascota/default.jpg" alt="mascota" witdh="500" height="500">';
                                }

                            ?>
                            </div>
                            <div class="col">
                                <div>
                                    <p class="h4">Nombre: <?php echo $_SESSION['usuario']['nombre'] ?></p>
                                </div>
                                <div class="mt-50">
                                    <p class="h4">Email: <?php echo $_SESSION['usuario']['email'] ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <p class="h4">Apellido: <?php echo $_SESSION['usuario']['apellido'] ?></p>
                                </div>
                                <div class="mt-50">
                                    
                                    <?php
                                        if (!isset($_POST['nuev_paswd'])) {
                                            echo '<form action="#" method="post">';
                                            echo '<button type="submit" class="boton-azul sombra w-85 h-75 mt-4 mb-2" id="boton-envio">Cambiar contraseña?</button>';
                                            echo '<input type="hidden" name="nuev_paswd" value="" class="boton-azul w-100 my-4">';
                                            echo '</form>';
                                        }else {
                                            echo '<form action="cambiar_contrasena.php" method="post">';
                                            echo '<p class="text-center h6">Cambiar contraseña</p>';
                                            echo '<label for="actualpass" class="form-label">Contraseña actual</label>';
                                            echo '<input type="password" class="form-control" id="actualpass" name="actualpass" aria-describedby="basic-addon1">';
                                            echo '<label for="nuevapass" class="form-label">Nueva contraseña</label>';
                                            echo '<input type="password" class="form-control" id="nuevapass" name="nuevapass" aria-describedby="basic-addon1">';
                                            echo '<label for="reppass" class="form-label">Repetir contraseña</label>';
                                            echo '<input type="password" class="form-control" id="reppass" name="reppass" aria-describedby="basic-addon2">';
                                            echo '<button type="submit" class="boton-azul sombra w-100 my-4">Actualizar</button>';
                                            echo '</form>';
                                        }
                                    ?>

                                </div>
                            </div>
                            
                        </div>
                        
                    </div>

                </div> 

            </div>
        </div>

        </div>
        
    </body>
</html>