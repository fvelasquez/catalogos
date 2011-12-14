<form action="producto_ax.php" method="post" name="producto" enctype="multipart/form-data">
<label>Nombre:</label>
<input name="nombre" id="nombre" value="" type="text" />
<label>Codigo:</label>
<input name="nombre" id="nombre" value="" type="text" />
<label>Categoria:</label>
<select name="categoria">
	<?php
		$cats = getSelCategorias();
		foreach($cats as $cat){
	?>
		<option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre']; ?></option>
	<?php } ?>
</select>
<label>Fama:</label>
<select name="fama">
	<option value="0">0 Estrellas</option>
	<option value="1">1 Estrella</option>
	<option value="2">2 Estrellas</option>
	<option value="3">3 Estrellas</option>
	<option value="4">4 Estrellas</option>
	<option value="5">5 Estrellas</option>
</select>
<label>Descripcion:</label>
<textarea name="descripcion" cols="40" rows="10"></textarea>
<label>Imagen 1:</label>
<sub>De esta imagen se obtendra el thumbnail</sub><br>
<input type="file" name="img_normal" id="normal1" />
<label>Imagen 2:</label>
<input type="file" name="img_normal2" id="normal2" />
<label>Imagen 3:</label>
<input type="file" name="img_normal3" id="normal3" />
<label>Imagen Header:</label>
<input type="file" name="img_header" id="header" />
<label>Imagen Header Big:</label>
<input type="file" name="img_header" id="headerbig" />
<br><br>
<input type="submit" name="Guardar" value="Guardar" />
</form>

<?php 
buildTree(0);
?>