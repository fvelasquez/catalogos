<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php');

require_once('../includes/config.php');
require_once('../includes/functions.php');



$conn = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
mysql_select_db(BD_NAME);

$re = mysql_query("SELECT * FROM categorias");
?>
<table width="700" cellpadding="3" cellspacing="0">
<tr>
	<td colspan="4" align="right">Nueva Categoria</td>
</tr>
<tr>
	<td>Nombre</td>
	<td>Descripcion</td>
	<td>Estatus</td>
	<td align="right">Opciones</td>
</tr>
<?php
while($r = mysql_fetch_assoc($re))
{
?>
<tr>
	<td><?php echo $r['nombre']; ?></td>
	<td><?php echo $r['descripcion']; ?></td>
	<td><?php echo $r['estatus']; ?></td>
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