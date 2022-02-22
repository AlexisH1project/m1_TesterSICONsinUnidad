<?php
    // include "configuracion.php";
     
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP; 
	include "./Generar_excel.php";


class Correo{
    // include "configuracion.php";

    public $unidad;
    public $correo_enviar;
    public $correo_cc;
    public $name_destinatario;
    public $array_info;
    public $message;
    
    public function __construct(){
        $unidad =  $this->unidad;
    }
    
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
        // $mail->Host = 'smtp.gmail.com';
        $mail->Host = 'owa.salud.gob.mx';
        
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 25; //25,465
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        // $mail->Username = 'disps.secretariasalud.cdmx@gmail.com';
        $mail->Username = 'alexis.hernandez@salud.gob.mx';
        //Password to use for SMTP authentication
        $mail->Password = 'hega.930625';
        // $mail->Password = 's@1ud2020';
        //Set who the message is to be sent from
        $mail->setFrom('alexis.hernandez@salud.gob.mx', 'Aministrador SICON');
        //Set an alternative reply-to address
        $mail->addReplyTo('alexis.hernandez@salud.gob.mx', 'Admin');
        //Set who the message is to be sent to
        $mail->addAddress($correo_cl, $nombre_cl);
        //Set the subject line
        $path = '../generarReporteCorreo/ENGLISH.pdf';
        $mail->AddAttachment($path); 
        // move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
        $mail->Subject = 'Reporte quincenal DGRHyO - DISPS';
        $mail->Body = $this->message;// Mensaje a enviar
    
        //send the message, check for errors
        if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
        echo 'Message sent!';
        }

    }

    public function destino_ur($saber_unidad){
        include "configuracion.php";
        $array_info = $saber_unidad;
        $unidad = $array_info[0][71];
        
        $sql_destino = "SELECT * FROM ct_agenda_ur WHERE sub_ur = '$unidad'";
        if($res = mysqli_query($conexion,$sql_destino)){
            $row_correo = mysqli_fetch_assoc($res);
            if(!empty($row_correo['correo_principal'])){
                $this->correo_enviar = $row_correo['correo_principal'];
                $this->correo_cc = $row_correo['correo_cc'];
                $this->name_destinatario = $row_correo['nombre_resp'];
                return $row_correo['correo_principal'];
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    public function enviar_prueba($array_imprimir, $array_status, $remitente){
// ******* dtos de envio del usuario ******
        if ($this->destino_ur($array_imprimir) == "0") {
            echo "NO SE PUEDE ENVIAR correo <br>";
            
        }else{
 //******************** a continuaciom enviamos correo  */
            // **** OBTENEMOS LO NECESARIO PARA EL CORREO
            // print_r($array_status);
            $rango =  count($array_imprimir);
            echo $this->correo_enviar."<br>";
            // echo $this->correo_cc ."<br>";
            // echo $this->name_destinatario ."<br>";
            $this->message = "HOLA ES LA TABLA";
            
            // for ($i=0; $i < $rango; $i++){
            // }
            // echo $this->message;

        }

    }
}

?>