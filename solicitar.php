<?php
require_once('includes/facebook.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$codigo = $_POST['codigo'];
$comentario = $_POST['comentario'];

/* make a URL small */
function make_bitly_url($url, $login, $appkey, $format='xml', $history=1, $version='2.0.1')
{
//create the URL
$bitly = 'http://api.bit.ly/shorten';
$param = 'version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format.'&history='.$history;
//get the url
$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $bitly . "?" . $param);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);
//parse depending on desired format
if(strtolower($format) == ÔjsonÕ) {
	$json = @json_decode($response,true);
	return $json['results'][$url]['shortUrl'];
} else {
	$xml = simplexml_load_string($response);
	return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
}
}


if((isset($_POST['nombre']) && $_POST['nombre'] != '') && (isset($_POST['email']) && $_POST['email'] != '') && (isset($_POST['comentario']) && $_POST['comentario'] != ''))
{
// NO TOCAR ENVIA Y RECIBE VAlORES DE FLASH		
	//echo  "&dato= Preparando a Enviar";
	$head = "From: ".$email."\r\n";
// NO TOCAR ENVIA Y RECIBE VAlORES DE FLASH	





//AQUI COLOCAS LA DIRECCION A DONDE TIENE QUE LLEGAR
//$dest = "f0vela@gmail.com,andygrafico@gmail.com";
//$dest = "f0vela@gmail.com";
$dest = "juan@fsrichard.com,carmen@fsrichard.com,fcruz@branding-machine.com,f0vela@gmail.com";


// AQUI ES EL ASUNTO QUE LLEVA EL MENSAJE AL LLEGAR AL BUZON
$asunto = "Contacto desde catalogo de facebook.com";


/* usage */
$short = make_bitly_url('http://branding-machine.com/accounts/catalogos/fsr/index.php?p=relojeria&prod='.$id, 'f0vela', 'R_2e07f09fc8df5ba54c03b0f5ff914471');


// Aqui es el CUERPO DEL MENSAJE, aqui es donde AGREGAS LOS OTROS NOMBRES Y LO EDITAS TAMBIEN EN EL FLASH
$msg = "-------------------------------------------------------------- \n";
$msg.= "         Datos del contacto            \n";
$msg.= "-------------------------------------------------------------- \n";
$msg.= "Nombre:   ".$nombre."\n";
$msg.= "Telefono:   ".$telefono."\n";
$msg.= "Fecha:    ".date("D, d M Y")."\n";
$msg.= "-------------------------------------------------------------- \n";
$msg.= "            Consulta             \n";
$msg.= "-------------------------------------------------------------- \n\n";
$msg.= "Codigo del catalogo: ".$codigo."\n";
$msg.= "Link del producto en catalogo: ".$short."\n\n";
$msg.= "Comentario: ".$comentario."\n\n";
$msg.= "-------------------------------------------------------------- ";
// FIN DEL CUERPO DEL MENSAJE




// NO TOCAR ESTE ES LO QUE ENVIA EL MENSAJE
	if (mail($dest, $asunto, $msg, $head)) {
		echo '<div style="border:1px solid #ffffee; background-color:#ffffcc; padding:10px; margin:5px auto">Gracias por escribirnos, nos comunicaremos contigo lo antes posible.</div><br/><br/>';
		//header('Location: '.FACEBOOK_WALL_URL);
	} else {
		echo '<div style="border:1px solid #B06464; background-color:#FF9191; padding:10px; margin:5px auto">Gracias por escribirnos, nos comunicaremos contigo lo antes posible.</div><br/><br/>';
      	//header('Location: http://dulcineagt.com/index.php?p=contacto&m=2');
	}
}
?>