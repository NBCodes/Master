<?php 
class Conexion extends mysqli{

	private $DB_HOST = 'localhost';
	private $DB_USER = 'root';
	private $DB_PASS = '';
	private $DB_NAME = 'petkea';

	public function __construct(){
		parent:: __construct($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

		$this->set_charset('utf-8');
	}
}

/*
=======================
= Funciones productos =
=======================
*/

function rellenar_cat($con,$cat1){
	$sql = 'SELECT * FROM producto WHERE categoria_p="'.$cat1.'" LIMIT 9;';
	return mysqli_query($con,$sql);
}

function rellenar_2cat($con,$cat1, $cat2){
	$sql = 'SELECT * FROM producto WHERE categoria_p="'.$cat1.'" AND categoria_s="'.$cat2.'";';
	return mysqli_query($con,$sql);
}

function rellenar_descuento($con){
	$sql = 'SELECT * FROM producto WHERE descuento IS NOT null;';
	return mysqli_query($con,$sql);
}

//Devuelve los datos de un producto a partir de la id
function ficha($con, $id){
	$sql = 'SELECT * FROM producto WHERE p_id="'.$id.'";';
	return mysqli_query($con,$sql);
}

//Crean producto
function nuevo_p_c($con, $catP, $catS, $nombre, $descripcion, $precio, $descuento, $talla, $color){
	$sql = 'INSERT INTO producto (categoria_p, categoria_s, nombre, descripcion, precio, descuento, talla, color, estado) VALUES ("'.$catP.'", "'.$catS.'", "'.$nombre.'", "'.$descripcion.'", "'.$precio.'", "'.$descuento.'", "'.$talla.'", "'.$color.'", 1);';
	return mysqli_query($con,$sql);
}

function nuevo_p($con, $catP, $catS, $nombre, $descripcion, $precio, $descuento, $talla){
	$sql = 'INSERT INTO producto (categoria_p, categoria_s, nombre, descripcion, precio, descuento, talla, estado) VALUES ("'.$catP.'", "'.$catS.'", "'.$nombre.'", "'.$descripcion.'", "'.$precio.'", "'.$descuento.'", "'.$talla.'", 1);';
	return mysqli_query($con,$sql);
}

//devuelve la id del último producto insertado en la bbdd
function get_p_id($con){
	$sql = 'SELECT * FROM producto ORDER by p_id DESC LIMIT 1;';
	return mysqli_query($con,$sql);
}

/*
==============================
= Funciones registro cliente =
==============================
*/

function login($con, $mail){
	$sql = 'SELECT * FROM cliente WHERE email="'.$mail.'" LIMIT 1;';
	return mysqli_query($con,$sql);
}

function new_cliente($con, $nom, $apellido, $email, $paswrd){
	$sql = 'INSERT INTO cliente (nombre, apellido, email, contrasena, estado) VALUES ("'.$nom.'", "'.$apellido.'", "'.$email.'", "'.$paswrd.'", 1);';
	
	return mysqli_query($con, $sql);
}

function recu_contrsena($con, $mail){
	$sql = 'SELECT contrasena FROM cliente WHERE email="'.$mail.'";';
	return mysqli_query($con,$sql);
}


/*
===================
= Funciones carro =
===================
*/
//Nuevo producto al carro
function nuevo_producto($con, $producto){
	$sql = 'INSERT INTO carro (producto, cliente) VALUES ("'.$producto.'", "'.$_SESSION['usuario']['email'].'");';
	return mysqli_query($con,$sql);
}

//Al cerrar la sesión se quita el carro
function vaciar_carro($con, $cliente){
	$sql = 'DELETE FROM carro WHERE cliente="'.$cliente.'";';
	return mysqli_query($con,$sql);
}

//Recupera productos de un cliente en un carro
function get_carro($con){
	$sql = 'SELECT * FROM producto WHERE p_id IN (SELECT producto FROM carro WHERE cliente="'.$_SESSION['usuario']['email'].'");';
	return mysqli_query($con,$sql);
}

//Recupera cantidad de un producto del carro
function get_cant($con, $producto, $cliente){
	$sql = 'SELECT cantidad FROM carro WHERE cliente="'.$cliente.'" AND producto="'.$producto.'";';
	return mysqli_query($con,$sql);
}

//Elimina un producto del carro
function eliminar($con, $producto, $cliente){
	$sql = 'DELETE FROM carro WHERE cliente="'.$cliente.'" AND producto="'.$producto.'";';
	return mysqli_query($con,$sql);
}

//Cambia cantidad de un prod del carro
function cantidad($con, $producto, $cliente, $cant){
	$sql = 'UPDATE carro SET cantidad="'.$cant.'" WHERE cliente="'.$cliente.'" AND producto="'.$producto.'" AND cantidad!="'.$cant.'";';
	if (mysqli_query($con,$sql)) {
		return get_cant($con, $producto, $cliente);
	}
}
?>