<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/accounts/catalogos/fsr/includes/init.php');

require_once('includes/facebook.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$pid = $_GET['id'];
$concate = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
mysql_select_db(BD_NAME,$concate);

$re = mysql_query("SELECT * FROM productos where id = '$pid'");
?>
<link href="js/jquery.fancybox-1.3.4.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="js/jquery.kwicks-1.5.1.pack.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
<script>
$(document).ready(function() {

	//Set Default State of each portfolio piece
	$(".prodpaging").show();
	$(".prodpaging a:first").addClass("prodactive");
		
	//Get size of images, how many there are, then determin the size of the image reel.
	var proimageWidth = $(".prodwindow").width();
	var proimageSum = $(".prodimage_reel img").size();
	var proimageReelWidth = proimageWidth * proimageSum;
	
	//Adjust the image reel to its new size
	$(".prodimage_reel").css({'width' : proimageReelWidth});
	
	//Paging + Slider Function
	prorotate = function(){	
		var protriggerID = $proactive.attr("rel") - 1; //Get number of times to slide
		var proimage_reelPosition = protriggerID * proimageWidth; //Determines the distance the image reel needs to slide

		$(".prodpaging a").removeClass('prodactive'); //Remove all active class
		$proactive.addClass('prodactive'); //Add active class (the $active is declared in the rotateSwitch function)
		
		//Slider Animation
		$(".prodimage_reel").animate({ 
			left: -proimage_reelPosition
		}, 500 );
		
	}; 
	
	//Rotation + Timing Event
	prorotateSwitch = function(){		
		proplay = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
			$proactive = $('.prodpaging a.prodactive').next();
			if ( $proactive.length === 0) { //If paging reaches the end...
				$proactive = $('.prodpaging a:first'); //go back to first
			}
			prorotate(); //Trigger the paging and slider function
		}, 7000); //Timer speed in milliseconds (3 seconds)
	};
	
	prorotateSwitch(); //Run function on launch
	
	//On Hover
	$(".prodimage_reel a").hover(function() {
		clearInterval(proplay); //Stop the rotation
	}, function() {
		prorotateSwitch(); //Resume rotation
	});	
	
	//On Click
	$(".prodpaging a").click(function() {	
		$proactive = $(this); //Activate the clicked paging
		//Reset Timer
		clearInterval(proplay); //Stop the rotation
		prorotate(); //Trigger rotation immediately
		prorotateSwitch(); // Resume rotation
		return false; //Prevent browser jump to link anchor
	});	



	$("#submitform").bind("submit", function(){

		if ($("#nombre").val().length < 1 || $("#email").val().length < 1) {
		    $("#formerror").show();
		    return false;
		}
		
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(!emailReg.test($("#email").val())) {
            $("#formerror").after('<span class="error">Enter a valid email address.</span>');
            $("#formerror").show();
            return false;
        }

		$.ajax({
			type	: "POST",
			cache	: false,
			url		: "solicitar.php",
			data	: $(this).serializeArray(),
			success : function(data) {
				$('#proddet_form').html(data);
			}
		});


	return false;
	});


});
</script>
<?php		
while($r = mysql_fetch_assoc($re)){
?>
<div id="proddet_title"><?php echo $r['nombre']; ?></div>
<div id="proddet_body">
	<table>
		<tr>
			<td valign="top">
				<div class="prodmain_view">
					<div class="prodwindow">
				        <div class="prodimage_reel">
							<a href=""><img id="slide-img-1" src="<?php echo $r['img_normal']?>" class="prodslide" alt="" width="242" height="242" /></a>
							<?php if($r['img_normal2'] != ''){ ?>
							<a href=""><img id="slide-img-2" src="<?php echo $r['img_normal2']?>" class="prodslide" alt="" width="242" height="242" /></a>
							<?php } 
							if($r['img_normal3'] != ''){
							?>
							<a href=""><img id="slide-img-3" src="<?php echo $r['img_normal3']?>" class="prodslide" alt="" width="242" height="242" /></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</td>
			<td valign="top">
				<div class="proddescription">
				<?php echo $r['descripcion']; ?>
				</div>
				<br />
				<div class="prodpaging">
        			<a href="#" rel="1"><img src="<?php echo $r['img_normal']?>" width="32" height="32" /></a>
        			<?php if($r['img_normal2'] != ''){ ?>
       		 		<a href="#" rel="2"><img src="<?php echo $r['img_normal2']?>" width="32" height="32" /></a>
       		 		<?php }
       		 		if($r['img_normal3'] != ''){ ?>
		        	<a href="#" rel="3"><img src="<?php echo $r['img_normal3']?>" width="32" height="32" /></a>
		        	<?php } ?>
		    	</div>
		    	<br /><br />
		    	<br /><br />
		    	<a href="#" onclick="cShare('<?php echo $r['nombre']?>','<?php echo $r['img_normal']?>','http://apps.facebook.com/fsrnuevocatalogo/?p=<?php echo $_GET['p']; ?>&cat=<?php echo $r['categoria']; ?>&prod=<?php echo $r['id']; ?>');" class="socialshare">Comp&aacute;rtelo en tu muro</a>
		    	<div style="clear:both">&nbsp;</div>
			</td>
		</tr>
	</table>
</div>
<div style="clear:both">&nbsp;</div>
<div id="proddet_subtitle">Est&aacute;s interesado?</div>
<div id="proddet_form">
	<div id="formerror" style="display:none">Error al ingresar datos</div>
	<form action="sendmail.php" method="post" id="submitform">
		<table width="450" border="0" cellpadding="3" cellspacing="0">
			<tr>
				<td align="right"><strong>Nombre:</strong></td>
				<td colspan="3">
				<input name="nombre" id="nombre" type="text" value="" style="width:373px" />
				<input type="hidden" id="id" name="id" value="<?php echo $r['id']; ?>" />
				</td>
			</tr>
			<tr>
				<td align="right"><strong>Tel&eacute;fono:</strong></td>
				<td><input name="telefono" id="telefono" value="" type="text" style="width:150px" /></td>
				<td align="right"><strong>E-mail:</strong></td>
				<td><input name="email" id="email" value="" type="text" style="width:169px;"/></td>
			</tr>
			<tr>
				<td align="right"><strong>C&oacute;digo:</strong></td>
				<td colspan="3"><input name="codigo" id="codigo" type="text" value="<?php echo $r['codigo'];?>" style="width:150px;"/></td>
			</tr>
			<tr>
				<td align="right" valign="top"><strong>Comentario:</strong></td>
				<td colspan="3">
					<textarea name="comentario" id="comentario" rows="5" style="width:373px"></textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="3"><input type="submit" value="Enviar" id="submit" name="submit"></td>
			</tr>
		</table>
	</form>
	<br /><br />
</div>
<?php } ?>