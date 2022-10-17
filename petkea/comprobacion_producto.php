<?php
  session_start();
  /** 
   * Funcion para almacenar logo en pantalla de registro
   */
  include_once 'consultas_conexiones.php';
  //Normalizacion
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $catP = $_POST['cat1'];
  $catS = $_POST['cat2'];
  $descuento = $_POST['descuento'];
  $talla = $_POST['talla'];
  $descripcion = $_POST['descripcion'];
  $con = new Conexion();
  $idP;
  
  //Funciones que crea productos dependiendo de si tiene color sera una u otra
  function n_producto_c($con, $catP, $catS, $nombre, $descripcion, $precio, $descuento, $talla, $color){
    if (nuevo_p_c($con, $catP, $catS, $nombre, $descripcion, $precio, $descuento, $talla, $color)) {
      return true;
    }else return false;
  }

  function n_producto($con, $catP, $catS, $nombre, $descripcion, $precio, $descuento, $talla){
    if (nuevo_p($con, $catP, $catS, $nombre, $descripcion, $precio, $descuento, $talla)) {
      return true;
    }else return false;
  }
  //Acabar me devuelve siempre 1 $id
  //Funcion para sacar la id del producto creado
  /*function get_id($con){
    if ($res = get_p_id($con)) {
      if ($row = mysqli_fetch_assoc($res)) {
        $idP = $row['p_id'];
        return true;
      }
    }
    $errmsg = "Error Logo -> Causante -> Error al recuperar id en BBDD";
    return false;
  }*/

  $error = false;
  $errmsg;

  //Funcion para subir la imagen al servidor
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
          $con2 = new Conexion();
          //Consulta para sacar el id del último producto insertado, es descir el creado
          if ($res = get_p_id($con2)) {
            if ($row = mysqli_fetch_assoc($res)) {
              $idproduct = strval($row['p_id']);
              //creamos el nombre y la dirección donde se guardará el archivo
              $fileNameNew = $idproduct.".".$fileActualExt;
              $fileDestination = 'img/producto/'.$GLOBALS['catP'].'/'.$GLOBALS['catS'].'/'.$fileNameNew;
              mysqli_close($con2);
              //movemos el archivo
              move_uploaded_file($fileTmpName, $fileDestination);
              
              return true;
            }else {
              $GLOBALS['errmsg'] = "Error Logo -> Causante -> Error al recuperar id";
              return false;
            }
          }else {
            $GLOBALS['errmsg'] = "Error Logo -> Causante -> Error al recuperar id";
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

  //Comprobaciones
  if (strlen($_POST['color']) > 0) {
    $color = $_POST['color'];
    
    if (!n_producto_c($con, $catP, $catS, $nombre, $descripcion, $precio, $descuento, $talla, $color)) {
      $errmsg = " Error al crear producto con color! ";
      $error = true;
    }
    $con -> close();
  }else {
    if (!n_producto($con, $catP, $catS, $nombre, $descripcion, $precio, $descuento, $talla)) {
      $errmsg = " Error al crear producto sin color! ";
      $error = true;
    }
    $con -> close();
  }

  if (isset($_FILES['adjunto'])) {
    if (!logos()) {
      echo $GLOBALS['errmsg'];
      $error = true; 
    }
    else echo 'guardado';
  } 

  if (!$error) {
    header('Location: pantalla_nuevoproducto.php?error=Producto creado correctamente! ');
    exit;
  }else {
    header('Location: pantalla_nuevoproducto.php?error='.$GLOBALS['errmsg']);
    exit;
  }
?>