<?php
/*
Plugin Name: Tickets Soporte Plugin
Plugin URI: src/wordpress
Description: Formulario de soporte y desarrollo para la creación de tickets
Version: 0.0.1
*/

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require_once dirname(__FILE__). './../../../wp-includes/PHPMailer/Exception.php';
require_once dirname(__FILE__). './../../../wp-includes/PHPMailer/PHPMailer.php';
require_once dirname(__FILE__). './../../../wp-includes/PHPMailer/SMTP.php';

require_once dirname(__FILE__). '/clases_vistas/index.class.php';
require_once dirname(__FILE__). '/clases_vistas/formFunctions.class.php';
require_once dirname(__FILE__). '/clases_vistas/tableSuperAdmin.class.php';
require_once dirname(__FILE__). '/clases_vistas/searchApplication.class.php';
require_once dirname(__FILE__). '/clases_vistas/detailApplication.class.php';
require_once dirname(__FILE__). '/clases_vistas/menuDelayedTickets.class.php';

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
        `Correo` VARCHAR(100) NULL,
        `Area` VARCHAR(50) NULL, 
        `Solicitud` VARCHAR(200) NULL,
        `Para que` VARCHAR(200) NULL,
        `Criterios de aceptacion` VARCHAR(200) NULL,
        `Estado` VARCHAR(50) NULL,
        `Asignado` VARCHAR(50) NULL,
        `FormularioId` INT NOT NULL,
        PRIMARY KEY (`RespuestaId`),
        FOREIGN KEY (FormularioId) REFERENCES fsd_formularios(FormularioId)
    );";
    $wpdb->query($sql2);

    $sql3 = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}formularios_respuestas_soporte(
        `RespuestaId` INT NOT NULL AUTO_INCREMENT,
        `Consecutivo` VARCHAR(7) NOT NULL,
        `Fecha` DATE NULL,
        `Hora` TIME NULL,
        `Solicitante` VARCHAR(60) NULL,
        `Correo` VARCHAR(100) NULL,
        `Area` VARCHAR(50) NULL, 
        `Descripcion` VARCHAR(200) NULL,
        `Sede` VARCHAR(50) NULL,
        `Estado` VARCHAR(50) NULL,
        `Asignado` VARCHAR(50) NULL,
        `FormularioId` INT NOT NULL,
        PRIMARY KEY (`RespuestaId`),
        FOREIGN KEY (FormularioId) REFERENCES fsd_formularios(FormularioId)
    );";
    $wpdb->query($sql3);

    $sql4 = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}comentarios_registrados_detalles(
        `ComentarioId` INT NOT NULL AUTO_INCREMENT,
        `Consecutivo` VARCHAR(7) NOT NULL,
        `Nombre_usuario` VARCHAR(60) NULL,
        `Tipo` VARCHAR(60) NULL,
        `Fecha` DATE NULL,
        `Hora` TIME NULL,
        `Comentario` VARCHAR(200) NULL,
        `Imagen` VARCHAR(250) NULL,
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

    //email User
    $user = get_current_user_id();

    if ($user != 0) {
        
        $userInfo = get_userdata($user);
        $userEmail = $userInfo->user_email;

    }

    //email admis
    $administradores = get_users('role=Administrator');
    $editores = get_users('role=Editor');

    $correosAdmin = array();
    foreach ($administradores as $administrador) {
        array_push($correosAdmin, $administrador->user_email);
    }

    foreach ($editores as $editor) {
        array_push($correosAdmin, $editor->user_email);
    }

    if(isset($_POST['btnguardar1'])){
        $prefix1 = "D";
        $consecutivo = $prefix1.$numConP2;
        $fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
        $actualDate = $fecha->format('20y-m-d ');
        $actualHora = $fecha->format('h:i:s');
        $solicitante = $_POST['solicitante'][0];
        $area = $_POST['area'][0];
        $solicitud = $_POST['solicitud'][0];
        $paraQue = $_POST['paraQue'][0];
        $criterios = $_POST['criterios'][0];

        $datos = [
            'RespuestaId' => null,
            'Consecutivo' => $consecutivo,
            'Fecha' => $actualDate,
            'Hora' => $actualHora,
            'Solicitante' => $solicitante,
            'Correo' => $userEmail,
            'Area' => $area,
            'Solicitud' => $solicitud,
            'Para que' => $paraQue,
            'Criterios de aceptacion' => $criterios,
            'Estado' => 'Solicitado',
            'FormularioId' => 1,
        ];     

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        if (!empty($consecutivo) || !empty($actualDate) || !empty($solicitante) || !empty($area) || !empty($solicitud) || !empty($paraQue) || !empty($criterios)) {

            $wpdb->insert($tablaR1,$datos);

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
            $mail->setFrom('', 'American School Way');

            $mail->addAddress($userEmail);  //Add a recipient
            for($i = 0; $i < count($correosAdmin); $i++) {
                $mail->AddAddress($correosAdmin[$i]);
            }

            //obtener rol
            $current_user = wp_get_current_user();

            $user_info = get_userdata($current_user->ID);
            $user_role = $user_info->roles[0];
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Ticket Desarrollo';

            if (!empty($userEmail)) {
                $html = "
                    <div>
                        <label style='font-weight: 700;'>Fecha: </label><span>$actualDate</span>
                        <br>
                        <label style='font-weight: 700;'>Hora: </label><span>$actualHora</span>
                        <br>
                        <label style='font-weight: 700;'>Area: </label><span>$area</span>
                        <p>Se creo un nuevo ticket dirigido a <strong>Desarrollo</strong>, para hacer su consulta visita el apartado <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo'>Detalle</a>, su consecutivo es:</p>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center> 
                        <br>
                        <div>
                            <img alt='Banner' width='514' src='http://intranet.americanschoolway.edu.co/wp-content/uploads/2021/08/firma-asw_2.gif' style='margin:0px; vertical-align:middle; box-sizing:border-box; width:514px; height:auto'>
                        </div>
                    </div>
                ";
            }
            $mail->Body = $html;
        
            $mail->send();

            echo "<script language='JavaScript'>
                alert('Ticket creado, podras consultarlo con el siguiente consecutivo: $consecutivo');
                window.location.href = 'src/detalles/?id=$consecutivo';
            </script>";


        } else {
            echo "<script language='JavaScript'>
                    alert('Ups... Ocurrio un error al enviar tu ticket, intentalo de nuevo')
                    window.location.href = 'src/formularios/';
                </script>";
        }

    } elseif (isset($_POST['btnguardar2'])){
        
        $prefix2 = "S";
        $consecutivo2 = $prefix2.$numCon2P2;
        $fecha2 = new DateTime("now", new DateTimeZone('America/Bogota'));
        $actualDate2 = $fecha2->format('20y-m-d');
        $actualHora2 = $fecha2->format('h:i:s');
        $solicitante2 = $_POST['solicitante2'][0];
        $area2 = $_POST['area2'][0];
        $descripcion = $_POST['descripcion'][0];
        $sede = $_POST['sedes'][0];

        $datos = [
            'RespuestaId' => null,
            'Consecutivo' => $consecutivo2,
            'Fecha' => $actualDate2,
            'Hora' => $actualHora2,
            'Solicitante' => $solicitante2,
            'Correo' => $userEmail,
            'Area' => $area2,
            'Descripcion' => $descripcion,
            'Sede' => $sede,
            'Estado' => 'Solicitado',
            'FormularioId' => 2,
        ];    

        if (!empty($consecutivo2) || !empty($actualDate2) || !empty($solicitante2) || !empty($area2) || !empty($descripcion) || !empty($sede)) {
            
            $wpdb->insert($tablaR2,$datos);

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

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
            $mail->setFrom('', 'American School Way');

            $mail->addAddress($userEmail);  //Add a recipient
            for($i = 0; $i < count($correosAdmin); $i++) {
                $mail->AddAddress($correosAdmin[$i]);
            }
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Ticket Soporte';

            if (!empty($userEmail)) {
    
                $html = "
                    <div>
                        <label style='font-weight: 700;'>Fecha: </label><span>$actualDate2</span>
                        <br>
                        <label style='font-weight: 700;'>Hora: </label><span>$actualHora2</span>
                        <br>
                        <label style='font-weight: 700;'>Area: </label><span>$area2</span>
                        <br>
                        <label style='font-weight: 700;'>Sede: </label><span>$sede</span>
                        <p>Se creo un nuevo ticket dirigido a <strong>Soporte</strong>, para hacer su consulta visita el apartado <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo2'>Detalle</a>, su consecutivo es:</p>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo2</h1></center>
                        <br>
                        <div>
                            <img alt='Banner' width='514' src='http://intranet.americanschoolway.edu.co/wp-content/uploads/2021/08/firma-asw_2.gif' style='margin:0px; vertical-align:middle; box-sizing:border-box; width:514px; height:auto'>
                        </div>
                    </div>
                ";
            }
            $mail->Body = $html;
        
            $mail->send();

            echo "<script language='JavaScript'>
                    alert('Ticket creado, podras consultarlo con el siguiente consecutivo: $consecutivo2');
                    window.location.href = 'src/detalles/?id=$consecutivo2';
                </script>";
        } else {
            echo "<script language='JavaScript'>
                    alert('Ups... Ocurrio un error al enviar tu ticket, intentalo de nuevo')
                    window.location.href = 'src/formularios/';
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

    $_short = new tableSuperAdmin;
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
        // $first_name = get_user_meta($user, 'first_name', true);
        // $last_name = get_user_meta($user, 'last_name', true);
        $userName = $userInfo->user_login;

        // if (empty($userName)) {
        //     $userName = $userInfo->user_login;
        // }
    }

    //obtener rol
    $current_user = wp_get_current_user();

    $user_info = get_userdata($current_user->ID);
    $user_role = $user_info->roles[0];

    $tipo = "";

    if ($user_role == 'administrator' || $user_role == 'editor') {
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

    if (isset($_POST['btn_mensaje']) || isset($_POST['btnImage'])) {

        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $upload = wp_upload_bits($_FILES['imagen']['name'], null, file_get_contents($_FILES['imagen']['tmp_name']));
            if(isset($upload['error']) && $upload['error'] != '') {
               echo 'Error al cargar la imagen: ' . $upload['error'];
            } else {
               $imagen_url = $upload['url'];
            }
        }

        $mensaje = $_POST['mensaje'][0];

        $datos = [
            'ComentarioId' => NULL ,
            'Consecutivo' => $consecutivo,
            'Nombre_usuario' => $userName,
            'Tipo' => $tipo,
            'Fecha' => $actualDate3,
            'Comentario' => $mensaje,
            'Imagen' => $imagen_url
        ];
        
        if (!empty($mensaje) || !empty($imagen_url)) {

            $wpdb->insert($tableComt,$datos);

            unset($_POST['mensaje'][0]);

            header('Location: src/detalles/?id='.$consecutivo);

        }

    }

    $_short = new detailApplication;

    $html = $_short->constructor($id, $id2, $consecutivo);

    return $html;
}

function shortCode6()
{
    $_short = new menuDelayedTickets;

    $html = $_short->constructor();

    return $html;
}

add_action('admin_menu', 'createMenu');
add_shortcode("Index", "shortCode1");
add_shortcode("Form", "shortCode2");
add_shortcode("SupAdminTable", "shortCode3");
add_shortcode("ComunUserTable", "shortCode4");
add_shortcode("Details", "shortCode5");
add_shortcode("Delayed", "shortCode6");
