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
        <script src="lib/jquery-3.5.1.min.js"></script>
        <script src="js/cat_producto.js"></script>
        <link rel="stylesheet" href="css/estilos.css">
        
    </head>

    <body>
        <!-- Logo
	    ============================================= -->
        <div class="header w-100 p-2">

        <a href="pantalla_inicio.php"> <img id="petkea"  src="img/logo/petkea.png" alt="logo" class="logo"> </a>
        
        </div>
        <?php
            if (isset($_GET['error'])) {
                echo '<div class="text-center p-1 bg-warning"><i class="fas fa-exclamation-triangle"> '.$_GET['error'].' </i> <i class="fas fa-exclamation-triangle"></i></div>';
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
                    <!--Salir del registro--> 
                    <a href="pantalla_inicio.php" class="boton-registro" id="registro"><i class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>

        </nav>
        <!--Contenido pagina-->
        <div id="principal" class="bc-white p-4 px-5 m-3">
            <form action="comprobacion_producto.php" id="producto-form" method="POST" class="p-4" enctype="multipart/form-data">

                <h3 class="t-c datos">Complete correctamente los campos para registrar un producto</h3>
                <div class="row">
                    <div class="col">
                        <label class="form-label" id="nombre">Nombre</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text icon" id="basic-addon1"><i class="fas fa-signature"></i></span>
                            <input type="text" class="form-control" name="nombre" aria-describedby="basic-addon1" required >
                        </div>
                    </div>
                    <div class="col-auto w-50">

                        <label id="adjunto" for="adjunto" class="form-label">Imagen del producto</label>
                        <div class="input-group mb-2">
                            <input type="file" name="adjunto" accept=".jpg,.png" class="form-control" id="producto">
                        </div>

                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col">
                        <label for="principal" class="form-label" id="cat1">Cat. Principal</label>
                        <select name="cat1" class="form-select" aria-label="Default select example">
                            <option value="perro">Perro</option>
                            <option value="gato">Gato</option>
                            <option value="pajaro">Pajaro</option>
                            <option value="roedor">Roedor</option>
                            <option value="pez">Pez</option>
                        </select>
                    </div>
                    
                    <div class="col">
                        <label for="secundaria" class="form-label" id="cat2">Cat. Secundaria</label>
                        <select name="cat2" class="form-select" aria-label="Default select example">
                            <option value="ropa">Ropa</option>
                            <option value="collar">Collar</option>
                            <option value="juguete">Juguete</option>
                        </select>
                    </div>

                    
                </div>
                <div class="row">
                    
                    <div class="col">
                        <label for="contrasenya" class="form-label" id="precio">Precio</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text icon" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" class="form-control"  name="precio" aria-describedby="basic-addon1" step=0.01 required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="contrasenya" class="form-label" id="descuento">Descuento</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text icon" id="basic-addon1"><i class="fas fa-percent"></i></span>
                            <input name="descuento" type="number" class="form-control" aria-describedby="basic-addon1" step=0.01 required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="contrasenya" class="form-label" id="talla">Talla</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text icon" id="basic-addon1"><i class="fab fa-laravel"></i></span>
                            <input type="text" class="form-control" name="talla" aria-describedby="basic-addon1" >
                        </div>
                    </div>
                    <div class="col">
                        <label for="contrasenya" class="form-label" id="color">Color</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text icon" id="basic-addon1"><i class="fas fa-tint"></i></span>
                            <input type="text" class="form-control" name="color" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <label for="empresa" class="form-label" id="descripcion">Descripcion</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="descripcion" id="floatingTextarea2"></textarea>
                            <label for="floatingTextarea2">Este producto....</label>
                        </div>
                    </div>
                </div>
                <button type="button" class="boton-azul sombra w-100 mt-4 mb-2" id="registrar">Registrar</button>
            </form>
            <footer class="footer mt-auto py-3 bc-white">
                <div class="container">
                    <span class="text-muted">Para completar el registro complete los capos con el formato adecuado y pulse el boton. Si todo va correcto el producto será creado en breves.</span>
                </div>
              </footer>
        </div>
        
    </body>
</html>