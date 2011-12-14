<?php
include_once('../includes/init.php');
include_once('../includes/config.php');
include_once('../includes/functions.php');
?>
<style>
	#admin{ 
		font-family: Arial;
		font-size: 11px;
	}
	label { display: block; font-weight: bold}
</style>
<div id="admin">
<ul>
	<li><a href="?p=categorias">Admin Categorias</a></li>
	<li><a href="?p=productos">Admin Productos</a></li>
	<li><a href="?p=usuarios">Admin Usuarios</a></li>
</ul>
<?php
    // user HAS Liked the page/whatever
	$pagina = $_GET['p'];

	switch($pagina){
		case "categorias":
			include_once('admin_categorias.php');
		break;
		case "productos":
			include_once('admin_productos.php');
		break;
		case "productoscrea":
			include_once('producto_create.php');
		break;
		case "visitanos":
			include_once('admin_usuarios.php');
		break;
		default:
			include_once('home.php');
		break;
	}
?>
</div>