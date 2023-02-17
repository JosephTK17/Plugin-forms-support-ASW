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
        `Fecha` DATETIME NULL,
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
        `Fecha` DATETIME NULL,
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

    $sql4 = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}comentarios_registrados_detalles(
        `ComentarioId` INT NOT NULL AUTO_INCREMENT,
        `Consecutivo` VARCHAR(7) NOT NULL,
        `Nombre usuario` VARCHAR(60) NULL,
        `Tipo` VARCHAR(60) NULL,
        `Fecha` DATETIME NULL,
        `Comentario` VARCHAR(200) NULL,
        PRIMARY KEY (`ComentarioId`)
    );";
    $wpdb->query($sql4);

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

    $cnsId = "SELECT MAX(RespuestaId) + 1 FROM $tablaR1";
    $resultCnsId = $wpdb->get_results($cnsId, ARRAY_A);

    $numConP1 = $resultCnsId[0]["MAX(RespuestaId) + 1"];
    $numConP2 = str_pad($numConP1, 6, "0", STR_PAD_LEFT);

    $cnsId2 = "SELECT MAX(RespuestaId) + 1 FROM $tablaR2";
    $resultCnsId2 = $wpdb->get_results($cnsId2, ARRAY_A);

    $numCon2P1 = $resultCnsId2[0]["MAX(RespuestaId) + 1"];
    $numCon2P2 = str_pad($numCon2P1, 6, "0", STR_PAD_LEFT);

    if(isset($_POST['btnguardar1'])){
        $prefix1 = "D";
        $consecutivo = $prefix1.$numConP2;
        $hora = new DateTime("now", new DateTimeZone('America/Bogota'));
        $actualDate = $hora->format('20y-m-d h:i:s');
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

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);


        if (!empty($consecutivo) || !empty($actualDate) || !empty($solicitante) || !empty($area) || !empty($solicitud) || !empty($paraQue) || !empty($criterios)) {

            $wpdb->insert($tablaR1,$datos);

            // //Server settings
            // $mail->SMTPDebug = 0;                      //Enable verbose debug output
            // $mail->isSMTP();                                            //Send using SMTP
            // $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
            // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            // $mail->Username   = 'josephstevenbarretocabrera@gmail.com';                     //SMTP username
            // $mail->Password   = 'Ozh45NIsqKg0CbjY';                               //SMTP password
            // $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            // $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            // //Recipients
            // $mail->setFrom('josephstevenbarretocabrera@gmail.com', 'American School Way');
            // $mail->addAddress($userEmail);     //Add a recipient
        
            // //Content
            // $mail->isHTML(true);                                  //Set email format to HTML
            // $mail->Subject = 'Test mandar correo';
            // $html = "
            //     <div>
            //         <h1>Numero Consecutivo</h1>
            //         <p>Este es tu consecutivo <strong>'.$consecutivo.'</strong> cuando lo desees visita el apartado Mis Tickets para hacer la consulta del estado de tu solicitud</p>
            //     </div>
            // ";
            // $mail->Body    = $html;
        
            // $mail->send();

            echo "<script language='JavaScript'>
                alert('Ticket creado, podras consultarlo con el siguiente consecutivo: $consecutivo');
                window.location.href = 'http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo';
            </script>";

        } else {
            echo "<script language='JavaScript'>
                    alert('Ups... Ocurrio un error al enviar tu ticket, intentalo de nuevo')
                    window.location.href = 'http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/';
                </script>";
        }      

    } elseif (isset($_POST['btnguardar2'])){
        
        $prefix2 = "S";
        $consecutivo2 = $prefix2.$numCon2P2;
        $hora2 = new DateTime("now", new DateTimeZone('America/Bogota'));
        $actualDate2 = $hora2->format('y-m-d h:i:s');
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

        if (!empty($consecutivo2) || !empty($actualDate2) || !empty($solicitante2) || !empty($area2) || !empty($descripcion) || !empty($sede)) {

            $wpdb->insert($tablaR2,$datos);

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            // //Server settings
            // $mail->SMTPDebug = 0;                      //Enable verbose debug output
            // $mail->isSMTP();                                            //Send using SMTP
            // $mail->Host       = '';                     //Set the SMTP server to send through
            // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            // $mail->Username   = '';                     //SMTP username
            // $mail->Password   = '';                               //SMTP password
            // $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            // $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            // //Recipients
            // $mail->setFrom('Poner correo de envio', 'American School Way');
            // $mail->addAddress($userEmail);     //Add a recipient
        
            // //Content
            // $mail->isHTML(true);                                  //Set email format to HTML
            // $mail->Subject = 'Test mandar correo';
            // $html = "
            //     <div>
            //         <h1>Numero Consecutivo</h1>
            //         <p>Este es tu consecutivo <strong>'.$consecutivo2.'</strong> cuando lo desees visita el apartado Mis Tickets para hacer la consulta del estado de tu solicitud</p>
            //     </div>
            // ";
            // $mail->Body    = $html;
        
            // $mail->send();

            echo "<script language='JavaScript'>
                    alert('Ticket creado, podras consultarlo con el siguiente consecutivo: $consecutivo2');
                    window.location.href = 'http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo2';
                </script>";
        } else {
            echo "<script language='JavaScript'>
                    alert('Ups... Ocurrio un error al enviar tu ticket, intentalo de nuevo')
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
    $tUrlId = $_GET['tUrlId'];

    $html = $_short->constructor($tUrlId);

    return $html;
}

function shortCode4()
{
    $_short = new searchApplication;
    $tUrlIdUc = $_GET['tUrlIdUc'];
    $consecutivo = $_POST['consecutivo'][0];
    $fecha = $_POST['fecha'][0];

    $html = $_short->constructor($tUrlIdUc, $consecutivo, $fecha);

    return $html;
}

function shortCode5()
{

    global $wpdb;

    $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
    $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";
    $tableComt = "{$wpdb->prefix}comentarios_registrados_detalles";

    $consecutivo = $_GET['id'];

    $user = get_current_user_id();

    if ($user != 0) {
            
        $userInfo = get_userdata($user);
        $userName = $userInfo->first_name;

        if (empty($userName)) {
            $userName = $userInfo->user_login;
        }
    }

    $tipo = "";

    if (is_super_admin()) {
        $tipo = "Admin";
    } else {
        $tipo = "Solicitante";
    }

    //idD
    $queryId = "SELECT FormularioId FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
    $id = $wpdb->get_results($queryId, ARRAY_A);

    //idS
    $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
    $id2 = $wpdb->get_results($queryId2, ARRAY_A);

    $hora3 = new DateTime("now", new DateTimeZone('America/Bogota'));
    $actualDate3 = $hora3->format('y-m-d h:i:s');

    if (isset($_POST['btn_mensaje'])) {

        $mensaje = $_POST['mensaje'][0];

        $datos = [
            'ComentarioId' => NULL ,
            'Consecutivo' => $consecutivo,
            'Nombre usuario' => $userName,
            'Tipo' => $tipo,
            'Fecha' => $actualDate3,
            'Comentario' => $mensaje,
        ];

        if (!empty($mensaje)) {

            $wpdb->insert($tableComt,$datos);

            unset($_POST['mensaje'][0]);

            header('Location: http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id='.$consecutivo);

        }

    }

    $_short = new detailApplication;

    $html = $_short->constructor($id, $id2, $consecutivo);

    return $html;
}

add_action('admin_menu', 'createMenu');
add_shortcode("Index", "shortCode1");
add_shortcode("Form", "shortCode2");
add_shortcode("Table", "shortCode3");
add_shortcode("Search", "shortCode4");
add_shortcode("Details", "shortCode5");
