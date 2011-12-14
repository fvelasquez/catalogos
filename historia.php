<div id="appbody">
	<div id="applogo">
		<a href="index.php"><img src="images/categorias/alessi-logo.jpg" alt="logo alessi" border="0"/></a>
		<?php
		if(isset($cat) && $cat == "")
		{ 
			$cat = 0;
		}
		switch($cat){
			case 1:
				$menu1 = 'cat-adealessi-rojo.jpg';
				$menu2 = 'cat-alessi-gris.jpg';
				$menu3 = 'cat-officinaalessi-gris.jpg';
				$menu4 = 'cat-watches-gris.jpg';
			break;
			case 2:
				$menu1 = 'cat-adealessi-gris.jpg';
				$menu2 = 'cat-alessi-rojo.jpg';
				$menu3 = 'cat-officinaalessi-gris.jpg';
				$menu4 = 'cat-watches-gris.jpg';
			break;
			case 3:
				$menu1 = 'cat-adealessi-gris.jpg';
				$menu2 = 'cat-alessi-gris.jpg';
				$menu3 = 'cat-officinaalessi-rojo.jpg';
				$menu4 = 'cat-watches-gris.jpg';
			break;
			case 4:
				$menu1 = 'cat-adealessi-gris.jpg';
				$menu2 = 'cat-alessi-gris.jpg';
				$menu3 = 'cat-officinaalessi-gris.jpg';
				$menu4 = 'cat-watches-rojo.jpg';
			break;
			default:
				$menu1 = 'cat-adealessi-gris.jpg';
				$menu2 = 'cat-alessi-gris.jpg';
				$menu3 = 'cat-officinaalessi-gris.jpg';
				$menu4 = 'cat-watches-gris.jpg';
			break;
		}
		?>
		<a href="?p=catalogos&cat=1"><img src="images/categorias/<?php echo $menu1; ?>" alt="cat-adealessi-rojo" width="43" height="43" /></a>
		<a href="?p=catalogos&cat=2"><img src="images/categorias/<?php echo $menu2; ?>" alt="cat-alessi-rojo" width="62" height="23" /></a>
		<a href="?p=catalogos&cat=3"><img src="images/categorias/<?php echo $menu3; ?>" alt="cat-officinaalessi-rojo" width="64" height="28" /></a>
		<a href="?p=catalogos&cat=4"><img src="images/categorias/<?php echo $menu4; ?>" alt="cat-watches-rojo"/></a>
	</div>
	<div id="pagecontent">
		<div id="pagecontent_logo"><img src="images/alessi-portadaportada.jpg" alt="alessi-portadaportada" width="100" /></div>
		<div id="pagecontent_text">
			<h3>Historia</h3>
			<div style="height:400px; overflow:auto; padding-right:10px">
			<p>Alessi es una de las empresas que encarna un fen&oacute;meno t&iacute;pico de la cultura industrial italiano, a saber, la de "f&aacute;bricas de dise&ntilde;o italiano".</p>
			<p>Desde tiempos inmemoriales, mi familia ha sido firmemente establecida en el Lago de Orta. En este valle, en los Alpes italianos, cerca de Suiza, una tradici&oacute;n de larga data en la madera y la artesan&iacute;a del metal ha sobrevivido hasta el d&iacute;a de hoy.</p>

			<p>Dentro de la empresa Alessi, el dise&ntilde;o, en el sentido actual del t&eacute;rmino comenz&oacute; a hacerse un hueco en mi padre, Carlo, que se bas&oacute; en su formaci&oacute;n como dise&ntilde;ador industrial para el desarrollo de pr&aacute;cticamente todos los productos que aparecieron en nuestros cat&aacute;logos entre 1935 y 1945 .</p>

			<p>En la d&eacute;cada de 1950, mi padre, mi abuelo sustituir&aacute; como director general corporativo, abandonando por completo su actividad como dise&ntilde;ador y dependen cada vez m&aacute;s las contribuciones de los dise&ntilde;adores independientes, de conformidad con una pr&aacute;ctica que se convertir&iacute;a en t&iacute;pica de todas las "f&aacute;bricas italianas de dise&ntilde;o" Para el d&iacute;a de hoy,</p>

			<p>productos de Alessi se considera todav&iacute;a como art&iacute;culos de artesan&iacute;a elaborados con la ayuda de las m&aacute;quinas: por esto quiero decir que, a pesar de que contamos con la tecnolog&iacute;a contempor&aacute;nea, industrial y equipos para el tratamiento, a una profundidad de nuestra pr&aacute;ctica - la que yo creo que debemos mantener, nuestra actitud inherente es a&uacute;n enraizada en la cultura artesanal.</p>

			<p>Cuando se habla de la "f&aacute;bricas de dise&ntilde;o italiano" me refiero a un grupo hist&oacute;rico de empresas para las que el dise&ntilde;o es-f se me permite utilizar un t&eacute;rmino un poco exagerado - una misi&oacute;n, una actividad que ha ido separado de su significado original como un simple formales proyecto para un objeto y se ha convertido en una especie de "filosof&iacute;a general", una "Weltanschauung", que subyace en todos los pasos de estas empresas operativas: creemos que nuestra verdadera naturaleza se acerca a un "Laboratorio de Investigaci&oacute;n en las Artes Aplicadas" que a una industria en el sentido tradicional del t&eacute;rmino.</p>

			<p>Laboratorio de Investigaci&oacute;n en las Artes Aplicadas, cuyo papel es mediar continuamente entre los m&aacute;s avanzados y estimular las expresiones creativas de la cultura internacional, por una parte, y las necesidades del p&uacute;blico y los sue&ntilde;os de los dem&aacute;s. Un laboratorio que debe ser lo m&aacute;s abierta y dedicada al mundo de la creaci&oacute;n de lo posible.</p>

			<p>El tipo de contribuci&oacute;n que un sector como Alessi puede hacer al desarrollo civilizado de la sociedad de consumo es ser un mediador art&iacute;stica, tratando de crear nuevos objetos, la introducci&oacute;n de un toque de trascendencia, nos ayuda a descifrar nuestra propia modernidad.</p>

			<p>Alberto Alessi</p>
			</div>
		</div>
	</div>
	<br />
	<hr size="4" width="450" style="color:#909090" noshade="noshade" />
	<br />
	<div id="appbotmenu">
		<a href="?p=visitanos"><img src="images/visitanos.jpg" alt="visitanos" border="0" width="124" height="28" /></a>
		<a href="?p=compania"><img src="images/compania.jpg" alt="compania" border="0" width="131" height="28" /></a>
		<a href="?p=disenadores"><img src="images/disenadores.jpg" alt="disenadores" border="0" width="144" height="28" /></a>
		<a href="?p=historia"><img src="images/historia.jpg" alt="historia" border="0" width="107" height="28" /></a>
	</div>
</div>