<?php
    include "configuracion.php";
    // require '../librerias/PHPMailer/src/PHPMailer.php';
    // require '../librerias/PHPMailer/src/SMTP.php';
    // require '../librerias/PHPMailer/src/Exception.php';
    // require '../librerias/PHPMailer/src/OAuth.php';
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP; 

class Correo{
    // include "configuracion.php";


    public $correo_enviar;
    public $correo_cc;
    public $name_destinatario;
    
    
    public function enviar(){
       
    
        require_once('../librerias/PHPMailer/src/PHPMailer.php');
        require_once('../librerias/PHPMailer/src/SMTP.php');
        require_once('../librerias/PHPMailer/src/Exception.php');
        require_once('../librerias/PHPMailer/src/OAuth.php');
    
        $correo_cl = "snoop.alexs@gmail.com";
        $nombre_cl = "AUTOR DEL CORREO";
        // require '../../vendor/autoload.php';
        date_default_timezone_set('Etc/UTC');
        $mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        // $mail->SMTPSecure = 'ssl';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 25; //25,465
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = 'disps.secretariasalud.cdmx@gmail.com';
        //Password to use for SMTP authentication
        $mail->Password = 's@1ud2020';
        //Set who the message is to be sent from
        $mail->setFrom('disps.secretariasalud.cdmx@gmail.com', 'Aministrador WEPORT');
        //Set an alternative reply-to address
        $mail->addReplyTo('disps.secretariasalud.cdmx@gmail.com', 'Admin');
        //Set who the message is to be sent to
        $mail->addAddress($correo_cl, $nombre_cl);
        //Set the subject line
      
        $mail->Subject = 'Confirmación de Regitro en WEPORT';
        $mail->Body = "Confirmo: ". $nombre_cl. "\nCon correo; ". $correo_cl; // Mensaje a enviar
    
        //send the message, check for errors
        if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
        echo 'Message sent!';
        }

    }

    public function obtenerDatos(){

    }
}

?>