<?php 
    session_start();
    include_once "consultas_conexiones.php";
    
    
    //Crea la sesion del usuario que accede
    if (isset($_POST['email']) && isset($_POST['paswrd']) || isset($_GET['registro'])) {
        $con = new Conexion();
        
        if ($resultado = login($con, $_POST['email'])) {
            //si es el usuario redirige a inicio con datos de sessión
            
            if ($row = mysqli_fetch_assoc($resultado)) {
                if (strtolower($row['email']) == strtolower($_POST['email']) && password_verify($_POST['paswrd'] ,$row['contrasena'])) {
                    $_SESSION['usuario'] = array ('id' => $row['c_id'], 'nombre' => $row['nombre'], 'apellido' => $row['apellido'], 'email' => $row['email']);
                    $parent = dirname($_SERVER['REQUEST_URI']);
                    header("Location: $parent/pantalla_inicio.php");
                    exit;
                }else{
                    $parent = dirname($_SERVER['REQUEST_URI']);
                    header("Location: $parent/pantalla_acceso.php?error=Usuario / Contraseña erroneos");
                    exit;
                }
            }else{
                $parent = dirname($_SERVER['REQUEST_URI']);
                header("Location: $parent/pantalla_acceso.php?error=Usuario / Contraseña erroneos");
                exit;
            }
        }else {
            $parent = dirname($_SERVER['REQUEST_URI']);
            header("Location: $parent/pantalla_acceso.php?error=No hay usuario cone stas credencizales");
            exit;
        }
    }else {
        $parent = dirname($_SERVER['REQUEST_URI']);
        header("Location: $parent/pantalla_acceso.php?error=faltan campos");
        exit;
    }
    
?>