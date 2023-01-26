<?php
/*
Plugin Name: Test Formulario Plugin
Plugin URI: http://localhost/formulario_soporte_desarrollo/wordpress
Description: Formulario de soporte y desarrollo
Version: 0.0.1
*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once dirname(__FILE__). './../../../wp-includes/PHPMailer/Exception.php';
require_once dirname(__FILE__). './../../../wp-includes/PHPMailer/PHPMailer.php';
require_once dirname(__FILE__). './../../../wp-includes/PHPMailer/SMTP.php';

require_once dirname(__FILE__). '/clases_vistas/index.class.php';
require_once dirname(__FILE__). '/clases_vistas/formFunctions.class.php';
require_once dirname(__FILE__). '/clases_vistas/tableRespForms.class.php';
require_once dirname(__FILE__). '/clases_vistas/searchApplication.class.php';
require_once dirname(__FILE__). '/clases_vistas/detailApplication.class.php';

function activar(){
    global $wpdb;

    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}formularios(
        `FormularioId` INT NOT NULL AUTO_INCREMENT,
        `Nombre` VARCHAR(60) NULL,
        PRIMARY KEY (`FormularioId`)
    );";
    $wpdb->query($sql);

    $sql2 = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}formularios_respuestas_desarrollo(
        `RespuestaId` INT NOT NULL AUTO_INCREMENT,
        `Consecutivo` VARCHAR(7) NOT NULL, 
        `Fecha` VARCHAR(20) NULL,
        `Solicitante` VARCHAR(60) NULL,
        `Área` VARCHAR(50) NULL, 
        `Solicitud` VARCHAR(140) NULL,
        `Para qué` VARCHAR(140) NULL,
        `Criterios de aceptación` VARCHAR(140) NULL,
        `Estado` VARCHAR(50) NULL,
        `FormularioId` INT NOT NULL,
        PRIMARY KEY (`RespuestaId`),
        FOREIGN KEY (FormularioId) REFERENCES fsd_formularios(FormularioId)
    );";
    $wpdb->query($sql2);

    $sql3 = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}formularios_respuestas_soporte(
        `RespuestaId` INT NOT NULL AUTO_INCREMENT,
        `Consecutivo` VARCHAR(7) NOT NULL,
        `Fecha` VARCHAR(20) NULL,
        `Solicitante` VARCHAR(60) NULL,
        `Área` VARCHAR(50) NULL, 
        `Descripción` VARCHAR(140) NULL,
        `Sede` VARCHAR(50) NULL,
        `Estado` VARCHAR(50) NULL,
        `FormularioId` INT NOT NULL,
        PRIMARY KEY (`RespuestaId`),
        FOREIGN KEY (FormularioId) REFERENCES fsd_formularios(FormularioId)
    );";
    $wpdb->query($sql3);

}

function desactivar(){
    flush_rewrite_rules();
}

//conectar las funciones y "activar los botones" 
register_activation_hook(__FILE__, 'activar');

register_deactivation_hook(__FILE__, 'desactivar');

function createMenu(){
    add_menu_page(
        'Formularios',//titulo pagina
        'Formularios Menu', //titulo menu
        'manage_options', //permisos
        plugin_dir_path(__FILE__).'admin/pagForms.php', //slug
        null, //funcion del contenido
        null,// plugin_dir_url(__FILE__).'admin/img/iconEdit.png',
        '1'
    );
}

//shortcode

function shortCode1()
{
    $_short = new index;

    $html = $_short->include();

    return $html;
}

function shortCode2(){

    global $wpdb;

    $tablaR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
    $tablaR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

    //dataUser
    $user = get_current_user_id();

    if ($user != 0) {
        
        $userInfo = get_userdata($user);
        $userEmail = $userInfo->user_login;

    }

    if(isset($_POST['btnguardar1'])){

        $prefix1 = "D";
        $consecutivo = $prefix1.rand(100000, 999999);
        $actualDate = date('d-m-Y');
        $solicitante = $_POST['solicitante'][0];
        $area = $_POST['area'][0];
        $solicitud = $_POST['solicitud'][0];
        $paraQue = $_POST['paraQue'][0];
        $criterios = $_POST['criterios'][0];

        $datos = [
            'RespuestaId' => null,
            'Consecutivo' => $consecutivo,
            'Fecha' => $actualDate,
            'Solicitante' => $solicitante,
            'Área' => $area,
            'Solicitud' => $solicitud,
            'Para qué' => $paraQue,
            'Criterios de aceptación' => $criterios,
            'Estado' => 'Solicitado',
            'FormularioId' => 1,
        ];    

        $wpdb->insert($tablaR1,$datos);        

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = '';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('Poner correo de envio', 'American School Way');
            $mail->addAddress($userEmail);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Test mandar correo';
            $mail->Body    = 'Este es tu consecutivo '.$consecutivo.'cuando lo desees visita el apartado Mis Tickets para hacer la consulta del estado de tu solicitud';
        
            $mail->send();

        } catch (Exception $e) {    
            echo "<script language='JavaScript'>
                    alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')
                    window.location.href = 'http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/';
                </script>";
        }

    } elseif (isset($_POST['btnguardar2'])){
        
        $prefix2 = "S";
        $consecutivo2 = $prefix2.rand(100000, 999999);
        $actualDate2= date('d-m-Y');
        $solicitante2 = $_POST['solicitante2'][0];
        $area2 = $_POST['area2'][0];
        $descripcion = $_POST['descripcion'][0];
        $sede = $_POST['sedes'][0];

        $datos = [
            'RespuestaId' => null,
            'Consecutivo' => $consecutivo2,
            'Fecha' => $actualDate2,
            'Solicitante' => $solicitante2,
            'Área' => $area2,
            'Descripción' => $descripcion,
            'Sede' => $sede,
            'Estado' => 'Solicitado',
            'FormularioId' => 2,
        ];    
        
        $wpdb->insert($tablaR2,$datos);

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = '';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('Poner correo de envio', 'American School Way');
            $mail->addAddress($userEmail);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Test mandar correo';
            $mail->Body    = 'Este es tu consecutivo '.$consecutivo2.'cuando lo desees visita el apartado Mis Tickets para hacer la consulta del estado de tu solicitud';
        
            $mail->send();

        } catch (Exception $e) {    
            echo "<script language='JavaScript'>
                    alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')
                    window.location.href = 'http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/';
                </script>";
        }
    }

    $_short = new formFuntions;
    $id = $_POST['type'][0];

    $html = $_short->constructor($id, $consecutivo, $consecutivo2);

    return $html;

}

function shortCode3()
{
    $_short = new tableForms;
    $id = $_POST['Table1'][0];
    $consecutivo = $_POST['consecutivo'][0];
    $fecha = $_POST['fecha'][0];
    $solicitante = $_POST['solicitante'][0];

    $html = $_short->constructor($id, $consecutivo, $fecha, $solicitante);

    return $html;
}

function shortCode4()
{
    $_short = new searchApplication;
    $consecutivo = $_POST['consecutivo'][0];

    $html = $_short->constructor($consecutivo);

    return $html;
}

function shortCode5()
{

    $_short = new detailApplication;

    $Consecutivo = $_GET['id'];

    $html = $_short->constructor($Consecutivo);

    return $html;
}

add_action('admin_menu', 'createMenu');
add_shortcode("Index", "shortCode1");
add_shortcode("Form", "shortCode2");
add_shortcode("Table", "shortCode3");
add_shortcode("Search", "shortCode4");
add_shortcode("Details", "shortCode5");
