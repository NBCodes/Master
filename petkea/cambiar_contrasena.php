<?php

    session_start();
    include_once 'consultas_conexiones.php';
    //conexión a la base de datos para obtener la contraseña del usuario
    $con = new Conexion();

    $resultado = recu_contrsena($con,$_SESSION['usuario']['email']);
    
    $row = mysqli_fetch_assoc($resultado);

    //si devuelve un resultado con la contraseña, la guarda en una variable, si no, avisa de un error y acaba el script 
    if (!is_null($row['contrasena'])) {
        
        $actualpass = $row['contrasena'];

    } else {

        header('Location: pantalla_cliente.php?error=No se ha podido encontrar la contraseña en la base de datos'); //error
        exit;

    }

    //verifica si la contraseña introducida por el usuario es la misma a la obtenida de la base de datos
    if (password_verify($_POST['actualpass'], $actualpass)) {

        //si la nueva contraseña introducida por el usuario coincide con la del campo 'repetir contraseña', actualiza la base de datos con la nueva
        if ($_POST['nuevapass'] === $_POST['reppass']) {

            $sql = 'UPDATE cliente SET contrasena="'.password_hash($_POST['nuevapass'] , PASSWORD_DEFAULT).'" WHERE email="'.$_SESSION['usuario']['email'].'";';

            if (mysqli_query($con,$sql)) {
        
                header('Location: pantalla_cliente.php?error=Se ha actualizado la contraseña correctamente'); //exito
                                                        
            } else {
        
                header('Location: pantalla_cliente.php?error=No se ha podido actualizar la contraseña'); //error
                
            }

        }

    } else {

        header('Location: pantalla_cliente.php?error=Las contraseñas no coinciden'); //error
        exit;

    }

?>