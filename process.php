<?php
/*
	Creado por DaríoBF - www.dariobf.com
	Script que gestiona el envío de un formulario por correo electrónico a la cuenta indicada.
*/

//Correo de destino; donde se enviará el correo.
$correoDestino = "aikan_@hotmail.com";

//Texto emisor; sólo lo leerá quien reciba el contenido.
$textoEmisor = "MIME-VERSION: 1.0\r\n";
$textoEmisor .= "Content-type: text/html; charset=UTF-8\r\n";
$textoEmisor .= "From: Formulario desde www.quetius.com";

/*
	Recopilo los datos vía POST
	Con strip_tags suprimo etiquetas HTML y php para evitar una posible inyección.
	Como no gestiona base de datos no es necesario limpiar de inyección SQL.
*/
$nombre = strip_tags($_POST['name']);
$asunto = strip_tags($_POST['asunto']);
$correo = strip_tags($_POST['mail']);
$comentario = strip_tags($_POST['comment']);
$fecha = time();
$fechaFormateada = date("j/n/Y", $fecha);

//Formateo el asunto del correo
$asunto = "$nombre";

//Formateo el cuerpo del correo

$cuerpo = "<b>Enviado por:</b> " . $nombre . " a las " . $fechaFormateada . "<br />";
$cuerpo .= "<b>E-mail:</b> " . $correo . "<br />";
$cuerpo .="<b>Asunto:</b>" . $asunto . "<br/>";
$cuerpo .= "<b>Comentario:</b> " . $comentario;

// Envío el mensaje
mail( $correoDestino, $asunto, $cuerpo, $textoEmisor);
header("Refresh: 5; URL= http://www.quetius.com/new/index.php");
?>
<style type="text/css">
body {
	background-color: #7e8794;
}
</style>

<div style="background:#7e8794">
<p style="text-align:center"><img src="img/logoquetius.png" alt="Quetius" /></p>


<p style="text-align:center;font-size:30px;">Formulario enviado correctamente. Proximamente nos pondremos en contacto con usted. </p>
<p style="text-align:center;font-size:30px;">Gracias por confiar en nosotros.</p>
<p style="text-align:center">En 5 sg va a ser redirigido a www.quetius.com. </p>
</div>

