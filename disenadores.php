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
			<h3>Dise&ntilde;adores</h3>
			<p>
				<ul style="padding-left:30px">
					<li>Mario Botta</li>
					<li>Norman Foster</li>
					<li>Future Systems</li>
					<li>Frank Gehry</li>
					<li>Michael Graves</li>
					<li>Zaha Hadid</li>
					<li>Hans Hollein</li>
					<li>Toyo Ito
					<li>Charles Jencks</li>
					<li>Tom Kovac</li>
					<li>Greg Lynn</li>
					<li>Richard Meier</li>
				</ul>
			</p>
			<p>
				<ul style="padding-left:30px">
					<li>Alessandro Mendini</li>
					<li>Jasper Morrison</li>
					<li>MVRDV</li>
					<li>Jean Nouvel</li>
					<li>Karim Rashid</li>
					<li>Aldo Rossi</li>
					<li>Richard Sapper</li>
					<li>Ettore Sottsass</li>
					<li>Philippe Starck</li>
					<li>Denton Corker Marshall</li>
					<li>Marc Newson</li>
				</ul>
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