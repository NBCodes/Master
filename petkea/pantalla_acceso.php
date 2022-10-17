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
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarMantenimiento" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Perros
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarMantenimiento">
                                <li><a class="dropdown-item" href="pantalla_ropa_perro.php" target="_self">Ropa</a></li>
                                <li><a class="dropdown-item" href="pantalla_collar_perro.php" target="_self">Collares, Correas y Arneses</a></li>
                                <li><a class="dropdown-item" href="pantalla_juguete_perro.php" target="_self">Juguetes</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarVideollamadas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gatos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarVideollamadas">
                                <li><a class="dropdown-item" href="pantalla_descanso_gato.php" target="_self">Descanso</a></li>
                                <li><a class="dropdown-item" href="pantalla_juguete_gato.php" target="_self">Juguetes</a></li>
                                <li><a class="dropdown-item" href="pantalla_higiene_gato.php" target="_self">Higiene</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarRegistros" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pajaros
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarRegistros">
                                <li><a class="dropdown-item" href="pantalla_jaula_roedor.php" target="_self">Jaulas</a></li>
                                <li><a class="dropdown-item" href="pantalla_accesorio_roedor.php" target="_self">Accesorios</a></li>
                                <li><a class="dropdown-item" href="pantalla_comida_roedor.php" target="_self">Comida</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarRegistros" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Roedores
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarRegistros">
                                <li><a class="dropdown-item" href="pantalla_jaula_roedor.php" target="_self">Jaulas</a></li>
                                <li><a class="dropdown-item" href="pantalla_accesorio_roedor.php" target="_self">Accesorios</a></li>
                                <li><a class="dropdown-item" href="pantalla_comida_roedor.php" target="_self">Comida</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarRegistros" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Peces
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarRegistros">
                                <li><a class="dropdown-item" href="pantalla_comida_pez.php" target="_self">Comida</a></li>
                                <li><a class="dropdown-item" href="pantalla_decoracion_pez.php" target="_self">Decoración</a></li>
                            </ul>
                        </li>

                    </ul>

                </div>
                <!--Mas sobre nosotros-->
                <div class="d-flex mx-2">

                    <a href="pantalla_petkea.php" class="boton-registro petkea-ico" id="registro" alt="cuenta">PETKEA</a>
                    
                </div> 
                <!--Registro cliente-->
                <div class="d-flex mx-2">

                    <a href="pantalla_registro_cliente.php" class="boton-registro" id="registro" alt="cuenta"><i class="fas fa-user"></i></a>
                    
                </div>   
                <!--Carro--> 
                <div class="d-flex mx-2">

                    <a href="pantalla_carro.php" class="boton-registro" id="registro"><i class="fas fa-shopping-cart"></i></a>
                    
                </div> 
            </div>

        </nav>
        <!--Contenido pagina-->
        <div class="d-flex justify-content-center w-100 h-100">
            
            <div class="align-middle">

                <div class="m-5 p-5 bg-white">

                    <h1 class="text-center">Acceso</h1>
                        
                    <form action="comprobacion_acceso.php" method="post">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text icon" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" aria-describedby="basic-addon1" required>
                        </div>

                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text icon" id="basic-addon2"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="paswrd" name="paswrd" aria-describedby="basic-addon2" required>
                        </div>
                        
                        <input type="submit" value="Acceder" class="boton-azul sombra w-100 my-4">
                        
                        <!--<a href="cambiar_contrasena.php" class="forgot-pass">Olvid&eacute; la contraseña</a><br>-->
                        
                        <a href="pantalla_registro_cliente.php" class="forgot-pass">No est&aacute; registrado?</a>
                    </form>

                </div> 

            </div>
        </div>

        </div>
        
    </body>
</html>