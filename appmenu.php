<div id="appmenu">
	<?php
	$op = array(
			'inicio' => true,
			'iniciolink' => 'index.php?p='.$_GET['p'],
			'iniciotext' => 'Inicio',
			'cat' => $_GET['cat']
			);
	$menu = tree_set($cat,$op);
	print_r($menu);
	?>
</div>