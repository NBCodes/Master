<?php
  session_start();
  /** 
   * Funcion para almacenar logo en pantalla de registro
   */
  include_once 'consultas_conexiones.php';
  $error = false;
  $errmsg;
  function logos() {

    //Datos del archivo
    $fileName = $_FILES['adjunto']['name'];
    $fileTmpName = $_FILES['adjunto']['tmp_name'];
    $fileSize = $_FILES['adjunto']['size'];
    $fileError = $_FILES['adjunto']['error'];

    //obtenemos la extensión del archivo
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    //archivos permitidos
    $allowed = array('jpg', 'jpeg', 'png');

    //comprobamos que el archivo tiene una extensión permitida
    if (in_array($fileActualExt, $allowed)) {

      //comprobamos que no hay ningun error con el archivo
      if ($fileError === 0) {

        //comprobamos que el archivo no supere un tamaño de 500mb
        if ($fileSize < 500000) {
          if (isset($_POST['email'])) {
            //creamos el nombre y la dirección donde se guardará el archivo
            $fileNameNew = $_POST['email'].".".$fileActualExt;
            $fileDestination = 'img/mascota/'.$fileNameNew;

            //movemos el archivo
            move_uploaded_file($fileTmpName, $fileDestination);
            return true;
          }else {
            $GLOBALS['errmsg'] = "Error Logo -> Causante -> faltan datos del formulario";
            return false;
          }
        } else {
          $GLOBALS['errmsg'] = "Error Logo -> Causante -> demasiado tamaño";
          return false;
        }

      } else {
        $GLOBALS['errmsg'] = "Error Logo -> Causante -> archivo";
        return false;
      }

    } else {
      $GLOBALS['errmsg'] = "Error Logo -> Causante -> extension";
      return false;
    }
  }
  
  function email(){
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) return true;
    
    $GLOBALS['errmsg'] = " Error: email inexistente o formato incorrecto ";
    return false;
  }
  //No pueden haber dos perfiles con el mismo email
  function usuario(){
    if (isset($_POST['email']) && isset($_POST['paswrd'])) {

      $con = new Conexion();
      if ($resultado = login($con, $_POST['email'], $_POST['paswrd'])) {
        if (!$row = mysqli_fetch_assoc($resultado)) {
          return true;
        }else {
          $GLOBALS['errmsg'] = " Este usuario ya existe ";
          return false;
        }
      }else {
        $GLOBALS['errmsg'] = " Ocurrió un problema con la consulta ";
        return false;
      }

    }else {
      $GLOBALS['errmsg'] = " Faltan datos necesarios ";
      return false;
    }
  }

  if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['paswrd']) && isset($_POST['paswrdrep'])) {

    //valida que las contraseñas coincidan
    if ($_POST["paswrd"] != $_POST['paswrdrep']) {
      $error = true;
      $GLOBALS['errmsg'] = " Las contraseñas no coinciden ";
    }

    //validar que no hay ningun error
    if (!usuario()) $error = true;

    if (isset($_FILES['adjunto'])) if (!logos()) $error = true;
    
    if (!email()) $error = true;
    
    //Final
    if (!$error) {
      //encripta la contraseña
      $pass = password_hash($_POST["paswrd"] , PASSWORD_DEFAULT);
      //Crear session directamente
      $con = new Conexion();
      
      if (new_cliente($con, $_POST['nombre'], $_POST['apellido'], $_POST['email'], $pass)) {
        $_SESSION['usuario'] = array ('nombre' => $_POST['nombre'], 'apellido' => $_POST['apellido'], 'email' => $_POST['email']);
        $parent = dirname($_SERVER['REQUEST_URI']);
        header("Location: $parent/pantalla_inicio.php");
        $GLOBALS['con'] -> close();
        exit;
      }else{
        $GLOBALS['errmsg'] = " Error al dar de alta un usuario ";
        $parent = dirname($_SERVER['REQUEST_URI']);
        header("Location: $parent/pantalla_registro_cliente.php?error=".$errmsg);
        $GLOBALS['con'] -> close();
        exit;
      }
      
    }else {
      $parent = dirname($_SERVER['REQUEST_URI']);
      header("Location: $parent/pantalla_registro_cliente.php?error=".$errmsg);
      $GLOBALS['con'] -> close();
      exit;
    }
  }else{
    $errmsg = 'Error al validar formulario.';
    $parent = dirname($_SERVER['REQUEST_URI']);
    header("Location: $parent/pantalla_registro_cliente.php?error=".$errmsg);
    $GLOBALS['con'] -> close();
    exit;
    }
?>