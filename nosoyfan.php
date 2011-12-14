<link href="css/app.css" media="screen" rel="stylesheet" type="text/css" />
<div id="container">
			<div id="header">
				<a href="#" onclick="top.location = '<?php echo FACEBOOK_CANVAS_URL; ?>';"><img src="images/logocarrera.png" alt="logocarrera" border="0"/></a>
			</div>	
				
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
		  FB.init({
		    appId  : '<?php echo FACEBOOK_APP_ID; ?>',
		    status : true,
		    cookie : true,
		    xfbml  : true
		  });
		  //Altura del Canvas del Juego en FB
		  FB.Canvas.setSize({ height: 700 });
</script>
<div style="text-align:center; margin:0 auto; padding-top:20px; padding-bottom:80px">
<h1>Dale "Like" a la pagina del Pastor Cash Luna</h1>
<h2>Corre, Participa y Gana!</h2>
<br><br>
<script>  
	FB.Event.subscribe('edge.create', function(response) {
		// do something with response.session
		top.location.href = '<?php echo FACEBOOK_CANVAS_URL; ?>';
	});
</script>
<!--script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script-->
<fb:like-box href="http://www.facebook.com/pastorcashluna" width="292" show_faces="true" stream="false" header="false"></fb:like-box>
</div>
</div>