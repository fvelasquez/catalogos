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
			<h3>Nuestra Ubicaci&oacute;n</h3>
			<p>
				Ubicados en el mejor sector de la ciudad de Guatemala, puede visitarnos en los siguientes horarios:

				<ul style="padding-left:30px; font-weight:bold;">
					<li>Lunes A Jueves: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De 10:00 am a 8:00 pm</li>
					<li>Viernes y Sabado:&nbsp;&nbsp;&nbsp;De 10:00 am a 9:00 pm</li>
					<li>Domingo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De 10:00 am a 7:00 pm</li>
				</ul>
				<br><br>
				<br><br>
				<br><br>
				<img src="images/MapaAlessi.png" alt="MapaAlessi" width="456" height="201" />
			</p>
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