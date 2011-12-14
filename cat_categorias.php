<?php
$cat = $_GET['cat'];
if($cat == ''){ $cat = 1; }
?>
<script type="" text="" javascript="">

$(document).ready(function() {

	$("a#modal").fancybox({
		'centerOnScroll':true,
		'overlayColor': '#441111',
		'showCloseButton':true,
		'enableEscapeButton':true,
		'hideOnOverlayClick':false,
		'hideOnContentClick':false,
		'margin':5,
		'padding': 5
	});

	//Set Default State of each portfolio piece
	$(".paging").show();
	$(".paging a:first").addClass("active");
		
	//Get size of images, how many there are, then determin the size of the image reel.
	var imageWidth = $(".window").width();
	var imageSum = $(".image_reel img").size();
	var imageReelWidth = imageWidth * imageSum;
	
	//Adjust the image reel to its new size
	$(".image_reel").css({'width' : imageReelWidth});
	
	//Paging + Slider Function
	rotate = function(){	
		var triggerID = $active.attr("rel") - 1; //Get number of times to slide
		var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

		$(".paging a").removeClass('active'); //Remove all active class
		$active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)
		
		//Slider Animation
		$(".image_reel").animate({ 
			left: -image_reelPosition
		}, 500 );
		
	}; 
	
	//Rotation + Timing Event
	rotateSwitch = function(){		
		play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
			$active = $('.paging a.active').next();
			if ( $active.length === 0) { //If paging reaches the end...
				$active = $('.paging a:first'); //go back to first
			}
			rotate(); //Trigger the paging and slider function
		}, 7000); //Timer speed in milliseconds (3 seconds)
	};
	
	rotateSwitch(); //Run function on launch
	
	//On Hover
	$(".image_reel a").hover(function() {
		clearInterval(play); //Stop the rotation
	}, function() {
		rotateSwitch(); //Resume rotation
	});	
	
	//On Click
	$(".paging a").click(function() {	
		$active = $(this); //Activate the clicked paging
		//Reset Timer
		clearInterval(play); //Stop the rotation
		rotate(); //Trigger rotation immediately
		rotateSwitch(); // Resume rotation
		return false; //Prevent browser jump to link anchor
	});	


	<?php if(isset($_GET['prod']) && $_GET['prod'] != ''){ ?>
	$('.m<?php echo $_GET['prod']; ?>').trigger('click');
	<?php } ?>
	
});
</script>

<div id="appbody">
	<div id="applogo">
		<div style="float:left;">
		<a href="javascript: void(0);" onclick="top.location = '<?php echo FACEBOOK_CANVAS_URL; ?>';"><img src="images/categorias/alessi-logo.jpg" alt="logo alessi" border="0"/></a>
		</div>
		<?php
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
				$menu1 = 'cat-adealessi-rojo.jpg';
				$menu2 = 'cat-alessi-rojo.jpg';
				$menu3 = 'cat-officinaalessi-rojo.jpg';
				$menu4 = 'cat-watches-rojo.jpg';
			break;
		}
		?>
		<div style="float:right;">
		<a href="?p=catalogos&cat=1"><img src="images/categorias/<?php echo $menu1; ?>" alt="cat-adealessi-rojo" width="43" height="43" /></a>
		<a href="?p=catalogos&cat=2"><img src="images/categorias/<?php echo $menu2; ?>" alt="cat-alessi-rojo" width="62" height="23" /></a>
		<a href="?p=catalogos&cat=3"><img src="images/categorias/<?php echo $menu3; ?>" alt="cat-officinaalessi-rojo" width="64" height="28" /></a>
		<a href="?p=catalogos&cat=4"><img src="images/categorias/<?php echo $menu4; ?>" alt="cat-watches-rojo"/></a>
		</div>
		<div class="clearfix"></div>
	</div>

	<div id="appslider">
		<div class="main_view">
			<div class="window">
		        <div class="image_reel">
					<a href=""><img id="slide-img-1" src="sliders/slider_01.jpg" class="slide" alt="" width="490" height="193" /></a>
					<a href=""><img id="slide-img-2" src="sliders/slider_02.jpg" class="slide" alt="" width="490" height="193" /></a>
					<a href=""><img id="slide-img-3" src="sliders/slider_03.jpg" class="slide" alt="" width="490" height="193" /></a>
					<a href=""><img id="slide-img-4" src="sliders/slider_04.jpg" class="slide" alt="" width="490" height="193" /></a>
				</div>
			</div>
    		<div class="paging">
        		<a href="#" rel="1">1</a>
        		<a href="#" rel="2">2</a>
        		<a href="#" rel="3">3</a>
        		<a href="#" rel="4">4</a>
    		</div>
		</div>
	</div>

	<?php include('appmenu.php'); ?>
	
	<div id="appcatalogo">
		<?php
		if(isset($_GET['scat']))
		{	
			$scat = $_GET['scat'];
			$qry = "SELECT * FROM productos WHERE categoria = '".$scat."' order by fama DESC";
			$tpag = getTotalPaginas($scat,1);
		}else{
			$tpag = getTotalPaginas($cat,0);
			$cats = getSubCategorias($cat);
			$qry = "SELECT * FROM productos WHERE categoria in (".$cats.") order by fama DESC";
		}
		
		$concate = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
		mysql_select_db(BD_NAME,$concate);
		$re = mysql_query($qry);
		
		while($r = mysql_fetch_assoc($re)){
		?>
		<div id="appcat">
			<div id="appcat_header">
				<span id="appcat_headerlft">&nbsp;</span>
				<p id="appcat_headertxt"><?php echo $r['nombre']?></p>
				<span id="appcat_headerder">&nbsp;</span>
			</div>
			<div id="appcat_top">&nbsp;</div>
			<div id="appcat_body">
				<a href="productoficha.php?id=<?php echo $r['id']?>" id="modal" class="m<?php echo $r['id']?>"><img src="<?php echo $r['img_thumb']?>" border="0" /></a>
			</div>
			<div id="appcat_footer">
				<a href="productoficha.php?id=<?php echo $r['id']?>" id="modal" class="ml<?php echo $r['id']?>">ver [+]</a>
			</div>
		</div>
		<?php } 
		mysql_close($concate);
		?>
		<div class="clearfix"></div>
	</div>
	<div style="background-color:#FF0000; margin-top:-5px; height:5px; width:490px;"></div>
	<div id="navigation">
		<ul>
			<?php 
			$paginas = round($tpag/12);
			
			for($i=0;$i<$paginas;$i++){
			?>
			<li><a href="?p=catalogos&cat=<?php echo $_GET['cat']; ?>&page=<?php echo $i; ?>" class="navselected">1</a></li>
			<?php } ?>
		</ul>
	</div>
</div>