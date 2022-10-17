<?php 
    session_start();
    require_once "consultas_conexiones.php";
    
    $con = new Conexion();
    if (isset($_GET['cat2'])) {
        $cat1 = $_GET['cat1'];
        $cat2 = $_GET['cat2'];
        $titulo = $_GET['cat1'].' -> '.$_GET['cat2'];
        $resultado = rellenar_2cat($con, $cat1,$cat2);
    }elseif (isset($_GET['cat1'])) {
        $titulo = $_GET['cat1'];
        $resultado = rellenar_descuento($con);
    }else {
        header('Location: pantalla_inicio.php');
        die();
    }
    
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
        <script src="lib/jquery-3.5.1.min.js"></script>
        <script src="js/carro.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/estilos.css">
        
    </head>

    <body>
        <!-- Logo
	    ============================================= -->
        <div class="header w-100 p-2">

        <a href="pantalla_inicio.php"> <img id="petkea"  src="img/logo/petkea.png" alt="logo" class="logo"> </a>

        </div>
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
                                <li><a class="dropdown-item" name="ropa" href="pantalla_productos.php?cat1=perro&cat2=ropa" target="_self">Ropa</a></li>
                                <li><a class="dropdown-item" name="collar" href="pantalla_productos.php?cat1=perro&cat2=collar" target="_self">Collares</a></li>
                                <li><a class="dropdown-item" name="juguete" href="pantalla_productos.php?cat1=perro&cat2=juguete" target="_self">Juguetes</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarVideollamadas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gatos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarVideollamadas">
                                <li><a class="dropdown-item" name="descanso" href="pantalla_productos.php?cat1=gato&cat2=descanso" target="_self">Descanso</a></li>
                                <li><a class="dropdown-item" name="juguete" href="pantalla_productos.php?cat1=gato&cat2=juguete" target="_self">Juguetes</a></li>
                                <li><a class="dropdown-item" name="higiene" href="pantalla_productos.php?cat1=gato&cat2=higiene" target="_self">Higiene</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarRegistros" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pajaros
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarRegistros">
                                <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pajaro&cat2=jaula" target="_self">Jaulas</a></li>
                                <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pajaro&cat2=accesorio" target="_self">Accesorios</a></li>
                                <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pajaro&cat2=comida" target="_self">Comida</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarRegistros" role="button" data-bs-toggle="dropdown" aria-expanded="false">Roedores </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarRegistros">
                                <li><a class="dropdown-item" href="pantalla_productos.php?cat1=roedor&cat2=jaula" target="_self">Jaulas</a></li>
                                <li><a class="dropdown-item" href="pantalla_productos.php?cat1=roedor&cat2=accesorio" target="_self">Accesorios</a></li>
                                <li><a class="dropdown-item" href="pantalla_productos.php?cat1=roedor&cat2=comida" target="_self">Comida</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle c-white" href="#" id="navbarRegistros" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Peces
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarRegistros">
                                <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pez&cat2=comida" target="_self">Comida</a></li>
                                <li><a class="dropdown-item" href="pantalla_productos.php?cat1=pez&cat2=decoracion" target="_self">Decoración</a></li>
                            </ul>
                        </li>
                        <?php 
                            //Si es admin puede subir productos
                            if (isset($_SESSION['usuario']['email']) && $_SESSION['usuario']['email'] == 'admin@gmail.com') {
                                echo '<a class="nav-link c-white" href="pantalla_nuevoproducto.php" target="_self">Nuevo Producto</a>';
                            }
                        ?>
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
                
                <?php
                    //carro
                    if (isset($_SESSION['usuario'])) {
                        echo '<div class="d-flex mx-2">';
                        echo '<a id="carro" class="boton-registro" ><i class="fas fa-shopping-cart"></i></a>';
                        echo '</div> ';
                    }
                    //Boton cerrar sesión
                    if (isset($_SESSION['usuario'])) {
                        echo '<div class="d-flex mx-2">';

                        echo '<a href="cerrar_sesion.php" class="boton-cerrar-sesion" id="cerrar-sesion"><i class="fas fa-power-off"></i></a>';

                        echo '</div>';
                    }
                ?>
            </div>
                    
    </nav>
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" id="menuc">
            <div class="mx-2 mt-25">
                
                <p class="h4"><a id="cerrarmenu" class="boton-registro petkea-ico"  alt="cuenta"><i class="fas fa-times-circle"></i></a> Carrito</p>
                <hr>
            </div>
            <form action="carro.php" method="POST">
            <?php 
                //rellenamos carro
                $con = new Conexion();
                $categorias = ['perro','gato', 'pajaro', 'roedor', 'pez'];
                $resul = get_carro($con, $_SESSION['usuario']['email']);
                if($resul){
                    while($row = mysqli_fetch_assoc($resul)){
                        //Consulta para obtener cantidades
                        $res2 = get_cant($con, $row["p_id"], $_SESSION['usuario']['email']);
                        if ($row2 = mysqli_fetch_assoc($res2)) {
                            $cant = $row2['cantidad'];
                        }else {
                            $cant = '1';
                        }
                        echo '<div id="carroitem">';
                            echo '<div class="row">';
                                echo '<div class="col">';
                                    echo '<img src="img/producto/'.$row["categoria_p"].'/'.$row["categoria_s"].'/'.$row["p_id"].'.jpg" alt="mascota" witdh="50" height="80">';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="col">';
                                echo '<h5>'.$row['nombre'].'</h5>';
                        if ($row['descuento'] != 0) {
                            //Calcula precio final aplicando el descuento al inicial
                            $p_final = $row['precio']-($row['descuento']/100*$row['precio']);
                                echo '<p class="h6 text-muted"><s>Precio inicial: '.$row['precio'].'<i class="fas fa-euro-sign"></s></i></p>';
                                echo '<p class="h6"><label>Descuento: '.$row['descuento'].'<i class="fas fa-percent"></i></label></p>';
                        }else{
                            $p_final = $row['precio'];
                        }
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="col">';
                                    echo '<p class="h5"><label>PVP: '.$p_final.'<i class="fas fa-euro-sign"></i></label></p>';
                                    echo '<div class="input-group mb-2">';
                                        echo '<p class="h6">Cantidad:</p>';
                                        echo '<input id="'.$row["p_id"].'" type="numeric" value="'.$cant.'" name="cantidad[]">';
                                        echo '<input type="hidden" value="'.$row["p_id"].'" name="id[]">';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '<p class="h6">Eliminar: <i name="basura" id="'.$row["p_id"].'" class="fas fa-trash-alt"></i></p>';
                            echo '<div class="row">';
                                echo '<div class="col">';
                                    echo '';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
                mysqli_close($con);
            ?>
                <div class="mx-2 mt-25">
                    <button type="submit" class="boton-azul sombra w-100 mt-4 mb-2" id="boton-envio">Tramitar</button>
                </div>
            </form>
        </div>   

        <!--Contenido pagina-->
        <div id="principal" class="bc-white p-4 px-5 m-3">
                
                    <div class="col">
                        <!--Accesorios mas vendidos-->
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" colspan="3" class="t-c"><?php echo $titulo; ?></th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                /*
                                    Consulta para rellenar productos destacados
                                */
                                $td = 0;
                                $con = new Conexion();
                                
                                if($resultado){
                                    $i = 0; #tr
                                    $j = 0; #td
                                    echo '</tr>';
                                    while ($row2 = mysqli_fetch_assoc($resultado) ) {
                                        if ($row2['estado'] == 1) {
                                            #si td vale 3 se cierra tr, va antes que el if de abajoporque se comienza con un tr abierto
                                            if ($j == 3) {
                                                echo '</tr>';
                                            }
                                            #Si hay 3 td
                                            if ($j == 3) {
                                                #se resetean td
                                                $j = 0;
                                                #Se suma tr
                                                $i ++;
                                                echo '<tr>';
                                                    
                                            }

                                            echo '<td>';
                                                echo '<div class="card">';
                                                        echo '<img class="card-img-top product_img" src="img/producto/'.$row2["categoria_p"].'/'.$row2["categoria_s"].'/'.$row2["p_id"].'.jpg" alt="Card image cap">';
                                                        echo '<div class="card-body">';
                                                            echo '<a href="pantalla_ficha.php?id='.$row2["p_id"].'"><h5 class="card-title">'.$row2["nombre"].'</h5></a>';
                                                            echo '<p class="card-text descripcion">Precio: '.$row2["precio"].'$</p>';
                                                            //A no ser que esté registrado no aparece el icono de carro
                                                            if (isset($_SESSION['usuario'])) {
                                                                echo '<a id="'.$row2["p_id"].'" name="carro" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>';
                                                            }
                                                            
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</td>';
                                            #Se suma td
                                            $j++;
                                        }
                                    }
                                }
                                mysqli_close($con);
                            ?>
                            </tbody>
                          </table>
                    </div>
                </div>
           
        </div>
        
    </body>
</html>