<?php
require_once('includes/facebook.php');
require_once('includes/config.php');
require_once('includes/functions.php');

if((isset($_POST['nombre']) && $_POST['nombre'] != '') && (isset($_POST['email']) && $_POST['email'] != '') && (isset($_POST['comentario']) && $_POST['comentario'] != ''))
{
// NO TOCAR ENVIA Y RECIBE VAlORES DE FLASH		
	//echo  "&dato= Preparando a Enviar";
	$head = "From: ".$_POST['email']."\r\n";
// NO TOCAR ENVIA Y RECIBE VAlORES DE FLASH	





//AQUI COLOCAS LA DIRECCION A DONDE TIENE QUE LLEGAR
$dest = "f0vela@gmail.com";
//$dest = "juan@fsrichard.com,carmen@fsrichard.com,fcruz@branding-machine.com";


// AQUI ES EL ASUNTO QUE LLEVA EL MENSAJE AL LLEGAR AL BUZON
$asunto = "Contacto desde catalogo de facebook.com";






// Aqui es el CUERPO DEL MENSAJE, aqui es donde AGREGAS LOS OTROS NOMBRES Y LO EDITAS TAMBIEN EN EL FLASH
$msg = "------------------------------- \n";
$msg.= "         Datos del contacto            \n";
$msg.= "------------------------------- \n";
$msg.= "Nombre:   ".$_POST['nombre']."\n";
$msg.= "Telefono:   ".$_POST['telefono']."\n";
$msg.= "Fecha:    ".date("D, d M Y")."\n";
$msg.= "------------------------------- \n";
$msg.= "            Consulta             \n";
$msg.= "------------------------------- \n\n";
$msg.= "Codigo: ".$_POST['codigo']."\n\n";
$msg.= "Comentrio: ".$_POST['comentario']."\n\n";
$msg.= "------------------------------- ";
// FIN DEL CUERPO DEL MENSAJE




// NO TOCAR ESTE ES LO QUE ENVIA EL MENSAJE
	if (mail($dest, $asunto, $msg, $head)) {
		//echo "&dato=Gracias por escribirnos, te informamos que en dos dÍas puedes pasar a recoger tu tarjeta.";
		header('Location: '.FACEBOOK_WALL_URL);
	} else {
      	//header('Location: http://dulcineagt.com/index.php?p=contacto&m=2');
	}
}
?>
<?
/*
// ESTA ONDA es la que envÍa el AUTORESPONDER :D

// Varios destinatarios
$para = $_POST['correo'];
// $para .= 'cafeleon@gmail.com';

// subject
$titulo = 'Gracias por contactar a Cafe Le„n';

// message
$mensaje = '
<html>
<head>
  <title>Caf? Le„n</title>
</head>
<body>
<table width="500" height="916" border="0" cellspacing="0" cellpadding="0" style="margin:0px; padding:0px;">
  <tr>
    <td><img src="http://branding-machine.com/accounts/cafeleon/tarjeta/newsletter/cafeleon-mailing.jpg" width="500" height="916" alt="Caf? Le„n" longdesc="http://www.cafeleon.com" /></td>
  </tr>
</table>
</body>
</html>
';
// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
// $cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Caf? Le„n Tarjeta Cliente Consentido <cafeleon@gmail.com>' . "\r\n";
// $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
// $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($para, $titulo, $mensaje, $cabeceras);
*/
?>