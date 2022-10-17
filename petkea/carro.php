<?php
    session_start();
	$json = file_get_contents('php://input');
	$producto = json_decode($json, true);
	
	include_once 'consultas_conexiones.php';

	$cliente = $_SESSION['usuario']['email'];
	$con = new Conexion();
	if (isset($producto['orden']) && $producto['orden'] == 'insertar') {
		if (nuevo_producto($con, $producto['producto'])) {
			echo json_encode("Producto añadido al carro !");
		} 
		else {
			echo json_encode("Error al añadir producto!");
		}
		mysqli_close($con);
	}elseif (isset($producto['orden']) && $producto['orden'] == 'eliminar') {
		if (eliminar($con, $producto['producto'], $cliente)) {
			echo json_encode("Producto eliminado !");
		} 
		else {
			echo json_encode("Error al eliminar producto!");
		}
		mysqli_close($con);
	}elseif (isset($_POST['cantidad']) && isset($_POST['id'])) {
		//A este apartado accede el programa al darle al boton tramitar
		//Guarda las cantidades de los productos
		$producto = $_POST['id'];
		$cantidad = $_POST['cantidad'];

		for ($i=0; $i < count($producto); $i++) {
			if (!cantidad($con, $producto[$i], $cliente, $cantidad[$i])) {
				header("Location: pantalla_inicio.php?error= No se ha podido guardar las cantidades! ");
				exit;
			}
		}
		mysqli_close($con);
		header("Location: pantalla_inicio.php");
		exit;
		
	}else{
		mysqli_close($con);
		header("Location: pantalla_inicio.php");
		exit;
	}
?>