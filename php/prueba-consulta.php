<?php

include ("../../conexion/conexion.php");
include ("../conexion/conexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';


$nombre = 'SERGIO MODESTO LOPEZ';
$idtec = 18;
$fenvio= date('Y').'/'.date('m').'/'.date('d'); 
$Hinic=date('H:i');
$nempleado = '123456789';

enviarCorreo($nombre,$idtec,$fenvio,$Hinic,$nempleado,$conexion,$conexion2);


function enviarCorreo($nombre,$idtec,$fenvio,$Hinic,$nempleado,$conexion,$conexion2){
        $queryt = "SELECT id_usu FROM tecnico 
        WHERE id_tecnico = $idtec";
        $resultd = mysqli_query($conexion,$queryt);
        $tecid = mysqli_fetch_row($resultd);    
        $tecid = $tecid[0];
        
        $query = "SELECT gstCinst FROM personal
        WHERE gstIdper = $tecid ";
        $result = mysqli_query($conexion2,$query);
        $correo = mysqli_fetch_row($result);
        $email = $correo[0];
        $envia = 'MESA DE AYUDA';
        $enlace = 'https://afac-avciv.com/';
    
    
         $mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'notificaciones@mesa-ayuda.afac-avciv.com';
$mail->Password = 'Aeronavegabilidad.2021.$';
$mail->setFrom('notificaciones@mesa-ayuda.afac-avciv.com', 'NOTIFICACIONES MESA DE AYUDA');
// $mail->addReplyTo('notificaciones@mesa-ayuda.afac-avciv.com', 'NOTIFICACIONES MESA DE AYUDA');
$mail->addAddress($email,$envia);
// $mail->addBCC('shiraky.beltran@afac.gob.mx');
$mail->Subject = 'SOLICITUD DE SOPORTE';
// $mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->isHTML(true);                                  //Set email format to HTML
$mail->CharSet = 'UTF-8';
$msg = "<html lang='en' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'><head><title></title><meta charset='utf-8' /><meta content='width=device-width, initial-scale=1.0' name='viewport' /><link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /><link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css' /><link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css' /></head>";
$msg .= "<body style='background-color: #d9dffa; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>";
$msg .= "<table border='0' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d9dffa;' width='100%'>";
$msg .= "<tbody>";
$msg .=  "<tr>";
$msg .=  "<td>";
$msg .=  "<table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cfd6f4;' width='100%'>";
$msg .= "<tbody>";
$msg .= "<tr>";
$msg .= "<td>";
$msg .= "<table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='600'>";
$msg .= "<tbody>";
$msg .= "<tr>";
$msg .= "<th class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 0px;' width='100%'>";
$msg .= "<table border='0' cellpadding='0' cellspacing='0' class='empty_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>";
$msg .= "<tr>";
$msg .= "<td>";
$msg .= "<div></div>";
$msg .= "</td>";
$msg .=  "</tr>";
$msg .= "</table>";
$msg .= "</th>";
$msg .= "</tr>";
$msg .= "</tbody>";
$msg .= "</table>";
$msg .= "</td>";
$msg .= "</tr>";
$msg .= "</tbody>";
$msg .= "</table>";
$msg .= "<table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d9dffa; background-image: url('https://i.ibb.co/mqr7dwZ/body-background-2.png' alt='body-background-2
'); background-position: top center; background-repeat: repeat;' width='100%'>";
$msg .= "<tbody>";
$msg .= "<tr>";
$msg .= "<td>";
$msg .= "<table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='600'>";
$msg .= "<tbody>";
$msg .= "<tr>";
$msg .= "<th class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 50px; padding-right: 50px; padding-top: 15px; padding-bottom: 15px;' width='100%'>";
$msg .= "<table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>";
$msg .= "<tr>";
$msg .= "<td style='width:100%;padding-right:0px;padding-left:0px;'>";
$msg .= "<div align='center' style='line-height:10px'><img alt='Card Header with Border and Shadow Animated' src='https://i.ibb.co/xCCNDJ5/AFACPDF.png' alt='AFACPDF' style='display: block; height: auto; border: 0; width: 150px; max-width: 100%;' title='Card Header with Border and Shadow Animated'
width='150' /></div>";
$msg .= "</td>";
$msg .= "</tr>";
$msg .= "</table>";
$msg .= "<table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>";
$msg .= "<tr>";
$msg .= "<td>";
$msg .= "<div style='font-family: ' Trebuchet MS ', Tahoma, sans-serif'>";
$msg .= "<div style='font-size: 14px; font-family: ' Montserrat ', 'Trebuchet MS ', 'Lucida Grande ', 'Lucida Sans Unicode ', 'Lucida Sans ', Tahoma, sans-serif; color: #506bec; line-height: 1.2;'>";
$msg .= "<p style='margin: 0; font-size: 14px;'><span style='color:#896200;'><strong><span style='font-size:38px;'>SOLICITUD DE SOPORTE</span></strong>";
$msg .= "</span>";
$msg .= "</p>";
$msg .= "</div>";
$msg .= "</div>";
$msg .= "</td>";
$msg .= "</tr>";
$msg .= "</table>";
$msg .= "<table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>";
$msg .= "<tr><td>";
$msg .= "<div style='font-family: ' Trebuchet MS ', Tahoma, sans-serif'>";
$msg .= "<div style='font-size: 14px; font-family: ' Montserrat ', 'Trebuchet MS ', 'Lucida Grande ', 'Lucida Sans Unicode ', 'Lucida Sans ', Tahoma, sans-serif; color: #40507a; line-height: 1.2;'>";
$msg .= "<p style='margin: 0; font-size: 14px;'><span style='font-size:17px;'>TIENE UN SERVICIO PENDIENTE QUE REALIZAR DE $nombre, CON FECHA $fenvio Y HORA $Hinic, PARA REALIZAR EL SERVICIO, INGRESE A LA SIGUIENTE LIGA: </span></p>";
$msg .= "</div></div></td></tr></table>";
$msg .= "<table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>";
$msg .= "<tr><td>";
$msg .= "<div style='font-family: ' Trebuchet MS ', Tahoma, sans-serif'>";
$msg .= "<div style='font-size: 14px; font-family: ' Montserrat ', 'Trebuchet MS ', 'Lucida Grande ', 'Lucida Sans Unicode ', 'Lucida Sans ', Tahoma, sans-serif; color: #40507a; line-height: 1.2;'>";
$msg .= "<p style='margin: 0; font-size: 22px;'><span style='font-size:16px;color:#896200;'><strong><a href='$enlace'>REALIZAR SOPORTE</a></strong></span></p>";
// $msg .="<a href='https://tester-gestor.afac-avciv.com/restablecer.php?data=$idusu&token=123'><strong>$idusu</strong></a>";
$msg .= "</div></div></td></tr></table>";
$msg .= "<table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>";
$msg .= "<tr><td>";
$msg .= "<div style='font-family: sans-serif'>";
$msg .= "<div style='font-size: 12px; color: #40507a; line-height: 1.2; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;'>";
$msg .= "<p style='margin: 0; font-size: 12px; mso-line-height-alt: 14.399999999999999px;'>.</p>";
$msg .= "</div></div></td></tr></table>";
$msg .= "<table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>";
$msg .= "<tr><td>";
$msg .= "<div style='font-family: sans-serif'>";
$msg .= "<div style='font-size: 14px; color: #40507a; line-height: 1.2; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;'>";
$msg .= "<p style='margin: 0; font-size: 14px;'>Este correo se genera automáticamente, no responder.</p>";
$msg .= "</div></div></td></tr></table></th></tr></tbody></table></td></tr></tbody></table>";
$msg .= "<table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>";
$msg .= "<tbody><tr><td>";
$msg .= "<table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='600'>";
$msg .= "<tbody><tr>";
$msg .= "<th class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px;' width='100%'>";
$msg .= "<table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>";
$msg .= "<tr><td style='width:100%;padding-right:0px;padding-left:0px;'>";
$msg .= "<div align='center' style='line-height:10px'><img alt='Card Bottom with Border and Shadow Image' class='big' src='https://i.ibb.co/pKs2csB/bottom-img.png' alt='bottom-img' style='display: block; height: auto; border: 0; width: 600px; max-width: 100%;' title='Card Bottom with Border and Shadow Image'
width='600' /></div>
</td>";
$msg .= "</tr></table></th></tr></tbody></table></td></tr></tbody></table>";
$msg .= "<table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>";
$msg .= "<tbody>";
$msg .= "<tr>";
$msg .= "<td>";
$msg .= "<table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='600'>";
$msg .= "<tbody>";
$msg .= "<tr>";
$msg .= "<th class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px;' width='100%'>";
$msg .= "<table border='0' cellpadding='0' cellspacing='0' class='icons_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>";
$msg .= "<tr>";
$msg .= "<td style='color:#9d9d9d;font-family:inherit;font-size:15px;padding-bottom:5px;padding-top:5px;text-align:center;'>";
$msg .= "<table cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>";
$msg .= "<tr>";
$msg .= "<td style='text-align:center;'>";
$msg .= "<table cellpadding='0' cellspacing='0' class='icons-inner' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;'>";
$msg .= "</table></td></tr></table></td></tr></table></th></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html>";
$mail->MsgHTML($msg);
if (!$mail->send()) {
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'The email message was sent.';
}
    
}


?>