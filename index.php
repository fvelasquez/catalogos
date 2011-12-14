<?php
//37204
//error_reporting(E_ALL);
//ini_set('display_errors','on');
if(!isset($_COOKIE['ref'])){
	setcookie("ref", "", time()-3600);
	setcookie('ref',$_SERVER['HTTP_REFERER']);
}elseif($_COOKIE['ref'] != '' && $_COOKIE['ref'] != $_SERVER['HTTP_REFERER']){
	setcookie("ref", "", time()-3600);
	setcookie('ref',$_SERVER['HTTP_REFERER']);
}
header('P3P: CP="CAO PSA OUR"');

include_once($_SERVER['DOCUMENT_ROOT'] . '/accounts/catalogos/fsr/includes/init.php');

require_once('includes/facebook.php');
require_once('includes/config.php');
require_once('includes/functions.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>FSRichard :: Catalogo</title>
		<?php
		//echo $_COOKIE['ref'];
		//http://apps.facebook.com/alessinewcatalogo/
		if($_COOKIE['ref'] == 'http://apps.facebook.com/alessinewcatalogo/'){
		?>
		<link href="css/app.css" media="screen" rel="stylesheet" type="text/css" />
		<?php }else{ ?>
		<link href="css/tab.css?v=0.0.0.04" media="screen" rel="stylesheet" type="text/css" />
		<?php } ?>
		<link href="js/jquery.fancybox-1.3.4.css" media="screen" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
		<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.kwicks-1.5.1.pack.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script src="http://connect.facebook.net/en_US/all.js"></script>
		<script>
		  FB.init({
		    appId  : '<?php echo FACEBOOK_APP_ID; ?>',
		    status : true,
		    cookie : true,
		    xfbml  : true,
		    channelUrl  : 'http://carrerapasaporte.branding-machine.com/channel.html'  // custom channel
		  });
		  
		  (function() {
				var e = document.createElement('script');
				e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
				e.async = true;
				document.getElementById('fb-root').appendChild(e);
			}());
  
		  //Altura del Canvas del Juego en FB
		  FB.Canvas.setSize({ height: 900 });
		  
		  function cShare(vnombre,vpic,vlink){
				FB.ui({ 
					method: 'feed',
					name: ''+vnombre, 
					picture: '<?php echo FACEBOOK_SITE_URL; ?>'+vpic,
					link: ''+vlink,
					description: 'Este es un producto que puedes encontrar en Alessi'
            	});
			}
		</script>
		<div id="container">
			<div id="body">
				<?php
				if(isset($_GET['msg']) && $_GET['msg'] != ''){
					$msg = $_GET['msg'];
					if($msg == "1"){ $mmsg = "Tu mensaje ha sido enviado correctamente!"; }
					if($msg == "2"){ $mmsg = "Tu post ha sido enviado a tu muro."; }
				?>
				<script>
					$(function(){
						$('#messages').fadeOut(5000);
					});
				</script>
				<div id="messages"><?php echo $mmsg; ?></div>
				<?php 
				}
				?>
			<?php
    			// user HAS Liked the page/whatever
    			$pagina =(isset($_GET['p']))?$_GET['p']:'';
				
				switch($pagina){
					case "joyeria":
						include_once('cat_joyas.php');
					break;
					case "relojeria":
						include_once('cat_relojes.php');
					break;
					case "visitanos":
						include_once('visitanos.php');
					break;
					case "compania":
						include_once('compania.php');
					break;
					case "disenadores":
						include_once('disenadores.php');
					break;
					case "historia":
						include_once('historia.php');
					break;
					default:
						include_once('home.php');
					break;
				}
			?>
			</div>
			<div id="footer"></div>
			<!--div id="comments">
				<fb:comments href="<?php echo FACEBOOK_CANVAS_URL; ?>" num_posts="3" width="600"></fb:comments>
			</div-->
		</div>
	</body>
</html>