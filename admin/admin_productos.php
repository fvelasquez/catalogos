<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/accounts/catalogos/includes/init.php');

require_once('../includes/config.php');
require_once('../includes/functions.php');



$conn = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
mysql_select_db(BD_NAME);

$re = mysql_query("SELECT * FROM productos");
?>
<table width="100%" cellpadding="3" cellspacing="0">
<tr>
	<td colspan="4" align="right">
		<a href="?p=productoscrea">Nuevo producto</a>
	</td>
</tr>
<tr>
	<td>Imagenes</td>
	<td>Nombre</td>
	<td>Descripcion</td>
	<td align="right">Opciones</td>
</tr>
<?php
while($r = mysql_fetch_assoc($re))
{
?>
<tr>
	<td><img src="../<?php echo $r['img_thumb']; ?>" /></td>
	<td><?php echo $r['nombre']; ?></td>
	<td><?php echo truncate($r['descripcion'],190); ?>...</td>
	<td align="right">
		<a href="?p=categorias_edit&id=<?php echo $r['id'];?>">Editar</a> | 
		<a href="?p=categorias_delete&id=<?php echo $r['id'];?>">Eliminar</a>
	</td>
</tr>
<?
}
?>
</table>
<?php
mysql_close($conn);
?>