<?php
$cat = $_GET['cat'];
if($cat == ''){ $cat = 1; }
?>
<script type="" text="" javascript="">

$(document).ready(function() {

	$("a#modal").fancybox({
		'centerOnScroll':true,
		'overlayColor': '#000000',
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
		<div style="text-align:center; padding-top:15px">
		<a href="javascript: void(0);" onclick="top.location = '<?php echo FACEBOOK_WALL_URL; ?>';"><img src="images/fsrlogo.jpg" alt="logo FSRichard" border="0"/></a>
		</div>
		<div class="clearfix"></div>
	</div>

	<div id="appslider">
		<div class="main_view">
			<div class="window">
		        <div class="image_reel">
					<a href=""><img id="slide-img-1" src="sliders/slider_01.jpg" class="slide" alt="" width="508"/></a>
					<a href=""><img id="slide-img-2" src="sliders/hd3_slide.png" class="slide" alt="" width="508"/></a>
					<a href=""><img id="slide-img-3" src="sliders/logines_slide.png" class="slide" alt="" width="508"/></a>
					<a href=""><img id="slide-img-4" src="sliders/richardmille_slide.png" class="slide" alt="" width="508"/></a>
					<a href=""><img id="slide-img-5" src="sliders/slider_02.jpg" class="slide" alt="" width="508"/></a>
				</div>
			</div>
    		<div class="paging">
        		<a href="#" rel="1">1</a>
        		<a href="#" rel="2">2</a>
        		<a href="#" rel="3">3</a>
        		<a href="#" rel="4">4</a>
        		<a href="#" rel="5">5</a>
    		</div>
		</div>
	</div>

	<?php include('appmenu.php'); ?>
	
	<div id="appcatalogo">
		<?php
		$blimit = 0;
		if(isset($_GET['page']) && $_GET['page'] != ''){
			$blimit = $_GET['page'] * 16;
		}
		if(isset($_GET['scat']) && $_GET['scat'] != '')
		{	
			$scat = $_GET['scat'];
			$tpag = getTotalPaginas($scat,1);
			
			
			$qry = "SELECT * FROM productos WHERE categoria = '".$scat."' ORDER BY fama DESC LIMIT $blimit,16";
		}else{
			$tpag = getTotalPaginas($cat,0);
			$cats = getSubCategorias($cat);
			$qry = "SELECT * FROM productos WHERE categoria in (".$cats.") ORDER BY fama DESC LIMIT $blimit,16";
		}
		
		$concate = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
		mysql_select_db(BD_NAME,$concate);
		$re = mysql_query($qry);
		
		$t = mysql_affected_rows($concate);
		if($t > 0){
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
				<a href="productoficha.php?id=<?php echo $r['id']?>" id="modal" class="m<?php echo $r['id']?>"><img src="<?php echo $r['img_thumb']?>" border="0" height="93" /></a>
				<a href="productoficha.php?id=<?php echo $r['id']?>" id="modal" class="ml<?php echo $r['id']?> vermas">ver [+]</a>
				<div style="clear:both"></div>
			</div>
		</div>
		<?php }
		}
		mysql_close($concate);
		?>
		<div class="clearfix"></div>
	</div>
	<div id="navigation">
		<ul>
			<?php
			$pactual = $_GET['page'];
			if($pactual == '' || $pactual == '0'){ $pactual = 0; }
			$pmax = 10;
			$pmin = 1;
			$paginas = ceil($tpag/16);

			if($paginas > $pmax){ 
				$paginas = $pactual + $pmax;
			}
			?>
			<li><a href="?p=relojeria&scat=<?php echo $_GET['scat']; ?>&page=0" <?php if($pactual == $i || $pactual == ''){ echo 'class="navselected"'; }?>>1</a></li>
			<?php if($pactual > 0){ 
			echo '...'; 
			?>
				<li><a href="?p=relojeria&scat=<?php echo $_GET['scat']; ?>&page=<?php echo $pactual; ?>" class="navselected"><?php echo ($i+1); ?></a></li>
			<?php
			echo '...'; 
			}?>
			<?
			for($i=($pactual+1);$i<$paginas;$i++){
			?>
			<li><a href="?p=relojeria&scat=<?php echo $_GET['scat']; ?>&page=<?php echo $i; ?>" <?php if($pactual == $i){ echo 'class="navselected"'; }?>><?php echo ($i+1); ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>