<?php

class searchApplication {

    public function getApplication($Consecutivo)
    {
        global $wpdb;

        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
        $query = "SELECT * FROM $tableR1 WHERE Consecutivo = '$Consecutivo'";
        $data = $wpdb->get_results($query, ARRAY_A);

        if (empty($data)) {
            $data = array();
        }

        $tableR2 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
        $query2 = "SELECT * FROM $tableR2 WHERE Consecutivo = '$Consecutivo'";
        $data2 = $wpdb->get_results($query2, ARRAY_A);

        if (empty($data2)) {
            $data2 = array();
        }

        return $data[0];
        return $data2[0];

    }

    public function head()
    {
        $html = "
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <style>

                    #cont_btns_nav{
                        height: 50px;
                        background-color: #4f6df5;
                        padding: 8px;
                    }

                    .btn_nav{
                        margin-top: 11px;
                        text-align: center;
                        display: inline-block;
                    }

                    .btn_nav a {
                        background-color: #304293;
                        border-radius: 3px;
                        text-decoration: none;
                        color: white;
                    }

                    #index a{
                        padding: 10px 37px 10px 37px;
                        margin-right: 110px;
                    }

                    #create a{
                        padding: 10px 22px 10px 22px;
                        margin-right: 110px;
                    }

                    #user a{
                        padding: 10px 30px 10px 30px;
                        box-shadow: 0px 0px 10px black;
                        background-color: gray;
                    }                    

                    .table_form{
                        border-collapse: collapse;
                    }

                    .table_form thead th{
                        background-color: gray; 
                        color: white;
                        border-right-color: white;
                    }
                </style>
            </head>
        ";
        
        return $html;
    }

    public function buttonsNav()
    {
        $html = "
            <body>
                <div id='cont_btns_nav'>
                    <div class='btn_nav' id='index'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/crear-ticket/'>Principal</a>
                    </div>
                    <div class='btn_nav' id='create'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                    </div>
                    <div class='btn_nav' id='user'>
                        <a href='#'>Mis Ticket</a>
                    </div>
                </div>
        ";

        return $html;
    }

    public function search()
    {
        $html = "
            <form method='POST'>
                <table style='margin: 0 0 0 100%;'>
                    <tbody>
                        <tr>
                            <td>
                                <input type='text' name='consecutivo[]' placeholder='consecutivo' required style='height:25px; text-align: center;'>
                            </td>
                            <td>
                                <button type='submit' name='buscar' style='cursor: pointer; height:25px; width:150%; border: transparent; background-color: #ca0004; color: #b3b3b3; border-radius: 5px;'><strong>Buscar</strong></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        ";

        return $html;
    }

    public function openTableApplication($id, $id2)
    {
        if ($id[0]['FormularioId'] == 1) {
            $html = "
                <h4 style='color: #84858d; text-align: center;'>Desarrollo</h4>
                <table class='table_form' border=1>
                    <thead>
                        <th>Consecutivo</th>
                        <th>Fecha</th>
                        <th>Solicitante</th>
                        <th>Área</th>
                        <th>Solicitud</th>
                        <th>Para qué</th>
                        <th>Criterios</th>
                        <th>Estado</th>
                        <th></th>
                    </thead>
                    <tbody>
            ";
        } elseif ($id2[0]['FormularioId'] == 2) {
            $html = "
            <h4 style='color: #84858d; text-align: center;'>Soporte</h4>
                <table class='table_form' border=1>
                    <thead>
                        <th>Consecutivo</th>
                        <th>Fecha</th>
                        <th>Solicitante</th>
                        <th>Área</th>
                        <th>Descripción</th>
                        <th>Sede</th>
                        <th>Estado</th>
                        <th></th>
                    </thead>
                    <tbody>
            ";
        }

        return $html;
    }

    public function dataTableApplication($id, $id2, $consecutivo, $lista_formularios, $lista_formularios2)
    {
        if ($id[0]['FormularioId'] == 1) {
            foreach ($lista_formularios as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $date = $value['Fecha'];
                    $solicitante = $value['Solicitante'];
                    $area = $value['Área'];
                    $solicitud = $value['Solicitud'];
                    $paraQue = $value['Para qué'];
                    $criterios = $value['Criterios de aceptación'];
                    $estado = $value['Estado'];

                $html = "
                    <tr>
                        <td>$consecutivo</td>
                        <td>$date</td>
                        <td>$solicitante</td>
                        <td>$area</td>
                        <td>$solicitud</td>
                        <td>$paraQue</td>
                        <td>$criterios</td>
                        <td>$estado</td>
                        <td>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo'>Detalle</a>
                        </td>
                    </tr>
                ";
            }
        } elseif ($id2[0]['FormularioId'] == 2) {
            foreach ($lista_formularios2 as $key => $value) {
                    $consecutivo2 = $value['Consecutivo'];
                    $date2 = $value['Fecha'];
                    $solicitante2 = $value['Solicitante'];
                    $area2 = $value['Área'];
                    $descripcion = $value['Descripción'];
                    $sede = $value['Sede'];
                    $estado2 = $value['Estado'];

                $html = "
                    <tr>
                        <td>$consecutivo2</td>
                        <td>$date2</td>
                        <td>$solicitante2</td>
                        <td>$area2</td>
                        <td>$descripcion</td>
                        <td>$sede</td>
                        <td>$estado2</td>
                        <td>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo2'>Detalle</a>
                        </td>
                    </tr>
                ";
            }
        }

        return $html;
    }

    public function closeTableApplication()
    {
        $html = "
                </tbody>
            </table>
        ";

        return $html;
    }

    public function constructor($consecutivo)
    {
        global $wpdb;

        //tabla desarrollo
        $tablaR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";

        $queryData = "SELECT * FROM $tablaR1 WHERE Consecutivo = '$consecutivo'";
        $lista_formularios = $wpdb->get_results($queryData, ARRAY_A);
        if (empty($lista_formularios)) {
            $lista_formularios = array();
        }

        $queryId = "SELECT FormularioId FROM $tablaR1 WHERE Consecutivo = '$consecutivo'";
        $id = $wpdb->get_results($queryId, ARRAY_A);

        //tabla soporte
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

        $queryData2 = "SELECT * FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $lista_formularios2 = $wpdb->get_results($queryData2, ARRAY_A);
        if (empty($lista_formularios2)) {
            $lista_formularios2 = array();
        }

        $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $id2 = $wpdb->get_results($queryId2, ARRAY_A);

        $html = $this->getApplication($consecutivo);
        $html = $this->head();
        
        $html .= $this->buttonsNav();
        $html .= $this->search();
        $html .= $this->openTableApplication($id, $id2);
        $html .= $this->dataTableApplication($id, $id2, $consecutivo, $lista_formularios, $lista_formularios2);
        $html .= $this->closeTableApplication();

        return $html;
    }

}

?>