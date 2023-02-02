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

                    .btn_nav a:hover{
                        background-color: #233170;
                        transition: background-color 0.5s;
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

                    #user a:hover{
                        background-color: #6F6F6F;
                        transition: background-color 0.5s;
                    }

                    #user a{
                        padding: 10px 30px 10px 30px;
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

                    .cont_num_tickest{
                        border: solid 1px gray;
                    }

                    .btn_num_tick{
                        text-align: center;
                        display: inline-block;
                        border: solid 1px gray;
                        width: 120px;
                    }

                    .btn_num_tick a{
                        text-decoration: none;
                    }

                    #abiertos{
                        margin: 15px 39px 15px 15px;
                    }

                    #abiertos:hover{
                        box-shadow: 0px 0px 3px black;
                        border-color: #1BDC00;
                        transition: border-color 0.5s;
                        transition: box-shadow 0.4s;
                    }

                    #abiertos a{
                        color: #1BDC00;
                        padding: 0 10px 0 10px;
                    }

                    #cerrados{
                        margin: 0 39px 0 0;
                    }

                    #cerrados:hover{
                        box-shadow: 0px 0px 3px black;
                        border-color: #FF0000;
                        transition: border-color 0.5s;
                        transition: box-shadow 0.4s;
                    }

                    #cerrados a{
                        color: #FF0000;
                        padding: 0 12px 0 12px;
                    }

                    #contestados{
                        margin: 0 39px 0 0;
                    }

                    #contestados:hover{
                        box-shadow: 0px 0px 3px black;
                        border-color: #CACD00;
                        transition: border-color 0.5s;
                        transition: box-shadow 0.4s;
                    }

                    #contestados a{
                        color: #CACD00;
                        padding: 0 2px 0 2px;
                    }

                    #totales:hover{
                        box-shadow: 0px 0px 3px black;
                        border-color: #00CDCA;
                        transition: border-color 0.5s;
                        transition: box-shadow 0.4s;
                    }

                    #totales a{
                        color: #00CDCA;
                        padding: 0 15px 0 15px;
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

    public function conteoTickets($numRegistrosAb2, $numRegistrosCe2, $numRegistrosCon2, $numRegistrosTot2)
    {

        $html = "
            <div class='cont_num_tickest'>
                <div class='btn_num_tick'  id='abiertos'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlId=1' name='table[]'>Abiertos ($numRegistrosAb2)</a>
                </div>
                <div class='btn_num_tick' id='cerrados'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlId=2' name='table[]'>Cerrados ($numRegistrosCe2)</a>
                </div>
                <div class='btn_num_tick' id='contestados'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlId=3' name='table[]'>Contestado ($numRegistrosCon2)</a>
                </div>
                <div class='btn_num_tick' id='totales'>  
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlId=4' name='table[]'>Totales ($numRegistrosTot2)</a>
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

    public function structureTickets($start_numberD1, $start_numberS1, $start_numberD2, $start_numberS2, $start_numberD3, $start_numberS3, $start_numberD4, $start_numberS4, $countPagD1, $countPagS1, $countPagD2, $countPagS2, $countPagD3, $countPagS3, $countPagD4, $countPagS4, $tUrlId, $lista_formularios_rtasD1, $lista_formularios_rtasD2, $lista_formularios_rtasD3, $lista_formularios_rtasD4, $lista_formularios_rtasS1, $lista_formularios_rtasS2, $lista_formularios_rtasS3, $lista_formularios_rtasS4)
    {
        $html = "";
        if ($tUrlId == 1) {
            $html .= "
                <div id='cont_table_dllo'>
                    <h4>Desarrollo</h4>
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

            foreach ($lista_formularios_rtasD1 as $key => $value) {
                $consecutivo = $value['Consecutivo'];
                $date = $value['Fecha'];
                $solicitante = $value['Solicitante'];
                $area = $value['Área'];
                $solicitud = $value['Solicitud'];
                $paraQue = $value['Para qué'];
                $estado = $value['Estado'];
                $criterios = $value['Criterios de aceptación'];

                $html .= "
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

            $html .= "
                    </tbody>
                </table>
            </div>
            ";

            if ( $countPagD1 > 10 ){
                $nav_countD1 = 0;
                $page_countD1 = 1;
                $current_pageD1 = $start_numberD1/10 + 1;
        
                while ( $nav_countD1 < $countPagD1 ) {
                    if ( $page_countD1 === $current_pageD1 ){
                        $html .= "<span>{$page_countD1}</span> ";
                    } else {
                        $html .= "<a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1 && startD1={$nav_countD1}'>{$page_countD1}</a>
                        ";
                    }
                    $nav_countD1 += 10;
                    $page_countD1++;
                }
            }

            $html .= "
                <div id='cont_table_spte'>
                    <h4>Soporte</h4>
                    <table class='table_form' border=1>
                        <thead>
                            <th>Consecutivo</th>
                            <th>Fecha</th>
                            <th>Quién reporta</th>
                            <th>Área</th>
                            <th>Descripción</th>
                            <th>Sede</th>
                            <th>Estado</th>
                            <th></th>
                        </thead>
                        <tbody>
            ";

            foreach ($lista_formularios_rtasS1 as $key => $value) {
                $consecutivo2 = $value['Consecutivo'];
                $date2 = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area2 = $value['Área'];
                $descripcion = $value['Descripción'];
                $estado2 = $value['Estado'];
                $sede = $value['Sede'];
    
                $html .= "
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

            $html .= "
                    </tbody>
                </table>
            </div>
            ";

            if ( $countPagS1 > 10 ){
                $nav_countS1 = 0;
                $page_countS1 = 1;
                $current_pageS1 = $start_numberS1/10 + 1;
        
                while ( $nav_countS1 < $countPagS1 ) {
                    if ( $page_countS1 === $current_pageS1 ){
                        $html .= "<span>{$page_countS1}</span> ";
                    } else {
                        $html .= "<a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1 && startS1={$nav_countS1}'>{$page_countS1}</a> ";
                    }
                    $nav_countS1 += 10;
                    $page_countS1++;
                }
            }

        } elseif ($tUrlId == 2){
            $html .= "
                <div id='cont_table_dllo'>
                    <h4>Desarrollo</h4>
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

            foreach ($lista_formularios_rtasD2 as $key => $value) {
                $consecutivo = $value['Consecutivo'];
                $date = $value['Fecha'];
                $solicitante = $value['Solicitante'];
                $area = $value['Área'];
                $solicitud = $value['Solicitud'];
                $paraQue = $value['Para qué'];
                $estado = $value['Estado'];
                $criterios = $value['Criterios de aceptación'];

                $html .= "
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

            $html .= "
                    </tbody>
                </table>
            </div>
            ";

            if ( $countPagD2 > 10 ){
                $nav_countD2 = 0;
                $page_countD2 = 1;
                $current_pageD2 = $start_numberD2/10 + 1;
        
                while ( $nav_countD2 < $countPagD2 ) {
                    if ( $page_countD2 === $current_pageD2 ){
                        $html .= "<span>{$page_countD2}</span> ";
                    } else {
                        $html .= "<a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=2 && startD2={$nav_countD2}'>{$page_countD2}</a>
                        ";
                    }
                    $nav_countD2 += 10;
                    $page_countD2++;
                }
            }

            $html .= "
                <div id='cont_table_spte'>
                    <h4>Soporte</h4>
                    <table class='table_form' border=1>
                        <thead>
                            <th>Consecutivo</th>
                            <th>Fecha</th>
                            <th>Quién reporta</th>
                            <th>Área</th>
                            <th>Descripción</th>
                            <th>Sede</th>
                            <th>Estado</th>
                            <th></th>
                        </thead>
                        <tbody>
            ";

            foreach ($lista_formularios_rtasS2 as $key => $value) {
                $consecutivo2 = $value['Consecutivo'];
                $date2 = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area2 = $value['Área'];
                $descripcion = $value['Descripción'];
                $estado2 = $value['Estado'];
                $sede = $value['Sede'];
    
                $html .= "
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

            $html .= "
                    </tbody>
                </table>
            </div>
            ";

            if ( $countPagS2 > 10 ){
                $nav_countS2 = 0;
                $page_countS2 = 1;
                $current_pageS2 = $start_numberS2/10 + 1;
        
                while ( $nav_countS2 < $countPagS2 ) {
                    if ( $page_countS2 === $current_pageS2 ){
                        $html .= "<span>{$page_countS2}</span> ";
                    } else {
                        $html .= "<a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=2 && startS2={$nav_countS2}'>{$page_countS2}</a>
                        ";
                    }
                    $nav_countS2 += 10;
                    $page_countS2++;
                }
            }

        } elseif ($tUrlId == 3) {
            $html .= "
                <div id='cont_table_dllo'>
                    <h4>Desarrollo</h4>
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

            foreach ($lista_formularios_rtasD3 as $key => $value) {
                $consecutivo = $value['Consecutivo'];
                $date = $value['Fecha'];
                $solicitante = $value['Solicitante'];
                $area = $value['Área'];
                $solicitud = $value['Solicitud'];
                $paraQue = $value['Para qué'];
                $estado = $value['Estado'];
                $criterios = $value['Criterios de aceptación'];

                $html .= "
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

            $html .= "
                    </tbody>
                </table>
            </div>
            ";

            if ( $countPagD3 > 10 ){
                $nav_countD3 = 0;
                $page_countD3 = 1;
                $current_pageD3 = $start_numberD3/10 + 1;
        
                while ( $nav_countD3 < $countPagD3 ) {
                    if ( $page_countD3 === $current_pageD3 ){
                        $html .= "<span>{$page_countD3}</span> ";
                    } else {
                        $html .= "<a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=3 && startD3={$nav_countD3}'>{$page_countD3}</a>
                        ";
                    }
                    $nav_countD3 += 10;
                    $page_countD3++;
                }
            }

            $html .= "
                <div id='cont_table_spte'>
                    <h4>Soporte</h4>
                    <table class='table_form' border=1>
                        <thead>
                            <th>Consecutivo</th>
                            <th>Fecha</th>
                            <th>Quién reporta</th>
                            <th>Área</th>
                            <th>Descripción</th>
                            <th>Sede</th>
                            <th>Estado</th>
                            <th></th>
                        </thead>
                        <tbody>
            ";

            foreach ($lista_formularios_rtasS3 as $key => $value) {
                $consecutivo2 = $value['Consecutivo'];
                $date2 = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area2 = $value['Área'];
                $descripcion = $value['Descripción'];
                $estado2 = $value['Estado'];
                $sede = $value['Sede'];
    
                $html .= "
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

            $html .= "
                    </tbody>
                </table>
            </div>
            ";

            if ( $countPagS3 > 10 ){
                $nav_countS3 = 0;
                $page_countS3 = 1;
                $current_pageS3 = $start_numberS3/10 + 1;
        
                while ( $nav_countS3 < $countPagS3 ) {
                    if ( $page_countS3 === $current_pageS3 ){
                        $html .= "<span>{$page_countS3}</span> ";
                    } else {
                        $html .= "<a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=3 && startS3={$nav_countS3}'>{$page_countS3}</a>
                        ";
                    }
                    $nav_countS3 += 10;
                    $page_countS3++;
                }
            }

        } elseif ($tUrlId == 4) {
            $html .= "
                <div id='cont_table_dllo'>
                    <h4>Desarrollo</h4>
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

            foreach ($lista_formularios_rtasD4 as $key => $value) {
                $consecutivo = $value['Consecutivo'];
                $date = $value['Fecha'];
                $solicitante = $value['Solicitante'];
                $area = $value['Área'];
                $solicitud = $value['Solicitud'];
                $paraQue = $value['Para qué'];
                $estado = $value['Estado'];
                $criterios = $value['Criterios de aceptación'];

                $html .= "
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

            $html .= "
                    </tbody>
                </table>
            </div>
            ";

            if ( $countPagD4 > 10 ){
                $nav_countD4 = 0;
                $page_countD4 = 1;
                $current_pageD4 = $start_numberD4/10 + 1;
        
                while ( $nav_countD4 < $countPagD4 ) {
                    if ( $page_countD4 === $current_pageD4 ){
                        $html .= "<span>{$page_countD4}</span> ";
                    } else {
                        $html .= "<a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=4 && startD4={$nav_countD4}'>{$page_countD4}</a>
                        ";
                    }
                    $nav_countD4 += 10;
                    $page_countD4++;
                }
            }

            $html .= "
                <div id='cont_table_spte'>
                    <h4>Soporte</h4>
                    <table class='table_form' border=1>
                        <thead>
                            <th>Consecutivo</th>
                            <th>Fecha</th>
                            <th>Quién reporta</th>
                            <th>Área</th>
                            <th>Descripción</th>
                            <th>Sede</th>
                            <th>Estado</th>
                            <th></th>
                        </thead>
                        <tbody>
            ";

            foreach ($lista_formularios_rtasS4 as $key => $value) {
                $consecutivo2 = $value['Consecutivo'];
                $date2 = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area2 = $value['Área'];
                $descripcion = $value['Descripción'];
                $estado2 = $value['Estado'];
                $sede = $value['Sede'];
    
                $html .= "
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

            $html .= "
                    </tbody>
                </table>
            </div>
            ";

            if ( $countPagS4 > 10 ){
                $nav_countS4 = 0;
                $page_countS4 = 1;
                $current_pageS4 = $start_numberS4/10 + 1;
        
                while ( $nav_countS4 < $countPagS4 ) {
                    if ( $page_countS4 === $current_pageS4 ){
                        $html .= "<span>{$page_countS4}</span> ";
                    } else {
                        $html .= "<a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=4 && startS4={$nav_countS4}'>{$page_countS4}</a> ";
                    }
                    $nav_countS4 += 10;  
                    $page_countS4++;
                }
            }
        }

        return $html;
    }

    public function constructor($tUrlId, $consecutivo)
    {
        global $wpdb;

        //tabla desarrollo
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";

        $queryData = "SELECT * FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
        $lista_formularios = $wpdb->get_results($queryData, ARRAY_A);
        if (empty($lista_formularios)) {
            $lista_formularios = array();
        }

        $queryId = "SELECT FormularioId FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
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

        //getUser
        $user = get_current_user_id();

        if ($user != 0) {
            
            $userInfo = get_userdata($user);
            $userName = $userInfo->first_name;

            if (empty($userName)) {
                $userName = $userInfo->user_login;
            }
        }

        //pagination T1-------------------------------------------------------------------------------------

        $start_numberD1 = $_REQUEST['startD1']??0;
        if ( $start_numberD1 < 0 || ! is_numeric( $start_numberD1 ) ) $start_numberD1 = 0;

        // Count items
        $sqlD1 = "SELECT COUNT(*) FROM `$tableR1` WHERE Estado != 'Cerrado' AND Solicitante = $userName";
        $countPagD1 = $wpdb->get_var($sqlD1);

        $start_numberS1 = $_REQUEST['startS1']??0;
        if ( $start_numberS1 < 0 || ! is_numeric( $start_numberS1 ) ) $start_numberS1 = 0;

        // Count items
        $sqlS1 = "SELECT COUNT(*) FROM `$tableR2` WHERE Estado != 'Cerrado' AND Solicitante = $userName";
        $countPagS1 = $wpdb->get_var($sqlS1);

        //T2--------------------------------------------------------------------
        $start_numberD2 = $_REQUEST['startD2']??0;
        if ( $start_numberD2 < 0 || ! is_numeric( $start_numberD2 ) ) $start_numberD2 = 0;

        // Count items
        $sqlD2 = "SELECT COUNT(*) FROM `$tableR1` WHERE Estado = 'Cerrado' AND Solicitante = $userName";
        $countPagD2 = $wpdb->get_var($sqlD2);

        $start_numberS2 = $_REQUEST['startS2']??0;
        if ( $start_numberS2 < 0 || ! is_numeric( $start_numberS2 ) ) $start_numberS2 = 0;

        // Count items
        $sqlS2 = "SELECT COUNT(*) FROM `$tableR2` WHERE Estado = 'Cerrado' AND Solicitante = $userName";
        $countPagS2 = $wpdb->get_var($sqlS2);

        //T3--------------------------------------------------------------------
        $start_numberD3 = $_REQUEST['startD3']??0;
        if ( $start_numberD3 < 0 || ! is_numeric( $start_numberD3 ) ) $start_numberD3 = 0;

        // Count items
        $sqlD3 = "SELECT COUNT(*) FROM `$tableR1` WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = $userName";
        $countPagD3 = $wpdb->get_var($sqlD3);

        $start_numberS3 = $_REQUEST['startS3']??0;
        if ( $start_numberS3 < 0 || ! is_numeric( $start_numberS3 ) ) $start_numberS3 = 0;

        // Count items
        $sqlS3 = "SELECT COUNT(*) FROM `$tableR2` WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = $userName";
        $countPagS3 = $wpdb->get_var($sqlS3);

        //T4--------------------------------------------------------------------
        $start_numberD4 = $_REQUEST['startD4']??0;
        if ( $start_numberD4 < 0 || ! is_numeric( $start_numberD4 ) ) $start_numberD4 = 0;

        // Count items
        $sqlD4 = "SELECT COUNT(*) FROM `$tableR1` AND Solicitante = $userName";
        $countPagD4 = $wpdb->get_var($sqlD4);

        $start_numberS4 = $_REQUEST['startS4']??0;
        if ( $start_numberS4 < 0 || ! is_numeric( $start_numberS4 ) ) $start_numberS4 = 0;

        // Count items
        $sqlS4 = "SELECT COUNT(*) FROM `$tableR2` AND Solicitante = $userName";
        $countPagS4 = $wpdb->get_var($sqlS4);

        //user----------------------------------------------------------------------------------------------
        //tabla desarrollo------------------------
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
        //tabla soporte------------------------------
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

        //abierto
        //mostrar-------------------------
        $queryRtasD1 = "SELECT * FROM $tableR1 WHERE Estado != 'Cerrado' AND Solicitante = $userName LIMIT $start_numberD1, 10";
        $lista_formularios_rtasD1 = $wpdb->get_results($queryRtasD1, ARRAY_A);
        if (empty($lista_formularios_rtasD1)) {
            $lista_formularios_rtasD1 = array();
        }

        $queryRtasS1 = "SELECT * FROM $tableR2 WHERE Estado != 'Cerrado' AND Solicitante = $userName LIMIT $start_numberS1, 10";
        $lista_formularios_rtasS1 = $wpdb->get_results($queryRtasS1, ARRAY_A);
        if (empty($lista_formularios_rtasS1)) {
            $lista_formularios_rtasS1 = array();
        }

        //count------------------
        $queryCntD1 = "SELECT * FROM $tableR1 WHERE Estado != 'Cerrado' AND Solicitante = $userName";
        $itemsCntD1 = $wpdb->get_results($queryCntD1, ARRAY_A);
        if (empty($itemsCntD1)) {
            $itemsCntD1 = array();
        }

        $queryCntS1 = "SELECT * FROM $tableR2 WHERE Estado != 'Cerrado' AND Solicitante = $userName";
        $itemsCntS1 = $wpdb->get_results($queryCntS1, ARRAY_A);
        if (empty($itemsCntS1)) {
            $itemsCntS1 = array();
        }

        $RegistrosD1 = count($itemsCntD1);
        $RegistrosS1 = count($itemsCntS1);

        $numRegistrosAb2 = $RegistrosD1 + $RegistrosS1;

        //cerrado
        $queryRtasD2 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado' AND Solicitante = $userName LIMIT $start_numberD2, 10";
        $lista_formularios_rtasD2 = $wpdb->get_results($queryRtasD2, ARRAY_A);
        if (empty($lista_formularios_rtasD2)) {
            $lista_formularios_rtasD2 = array();
        }

        $queryRtasS2 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado' AND Solicitante = $userName LIMIT $start_numberS2, 10";
        $lista_formularios_rtasS2 = $wpdb->get_results($queryRtasS2, ARRAY_A);
        if (empty($lista_formularios_rtasS2)) {
            $lista_formularios_rtasS2 = array();
        }

        //count------------------
        $queryCntD2 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado' AND Solicitante = $userName";
        $itemsCntD2 = $wpdb->get_results($queryCntD2, ARRAY_A);
        if (empty($itemsCntD2)) {
            $itemsCntD2 = array();
        }

        $queryCntS2 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado' AND Solicitante = $userName";
        $itemsCntS2 = $wpdb->get_results($queryCntS2, ARRAY_A);
        if (empty($itemsCntS2)) {
            $itemsCntS2 = array();
        }

        $RegistrosD2 = count($itemsCntD2);
        $RegistrosS2= count($itemsCntS2);

        $numRegistrosCe2 = $RegistrosD2 + $RegistrosS2;

        //contestado
        $queryRtasD3 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = $userName LIMIT $start_numberD2, 10";
        $lista_formularios_rtasD3 = $wpdb->get_results($queryRtasD3, ARRAY_A);
        if (empty($lista_formularios_rtasD3)) {
            $lista_formularios_rtasD3 = array();
        }

        $queryRtasS3 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = $userName LIMIT $start_numberD2, 10";
        $lista_formularios_rtasS3 = $wpdb->get_results($queryRtasS3, ARRAY_A);
        if (empty($lista_formularios_rtasS3)) {
            $lista_formularios_rtasS3 = array();
        }

        //count------------------
        $queryCntD3 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = $userName";
        $itemsCntD3 = $wpdb->get_results($queryCntD3, ARRAY_A);
        if (empty($itemsCntD3)) {
            $itemsCntD3 = array();
        }

        $queryCntS3 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = $userName";
        $itemsCntS3 = $wpdb->get_results($queryCntS3, ARRAY_A);
        if (empty($itemsCntS3)) {
            $itemsCntS3 = array();
        }

        $RegistrosD3 = count($itemsCntD3);
        $RegistrosS3 = count($itemsCntS3);

        $numRegistrosCon2 = $RegistrosD3 + $RegistrosS3;

        //total
        $queryRtasD4 = "SELECT * FROM $tableR1 AND Solicitante = $userName LIMIT $start_numberD4, 10" ;
        $lista_formularios_rtasD4 = $wpdb->get_results($queryRtasD4, ARRAY_A);
        if (empty($lista_formularios_rtasD4)) {
            $lista_formularios_rtasD4 = array();
        }

        $queryRtasS4 = "SELECT * FROM $tableR2 AND Solicitante = $userName LIMIT $start_numberS4, 10";
        $lista_formularios_rtasS4 = $wpdb->get_results($queryRtasS4, ARRAY_A);
        if (empty($lista_formularios_rtasS4)) {
            $lista_formularios_rtasS4 = array();
        }

        //count------------------
        $queryCntD4 = "SELECT * FROM $tableR1 AND Solicitante = $userName";
        $itemsCntD4 = $wpdb->get_results($queryCntD4, ARRAY_A);
        if (empty($itemsCntD4)) {
            $itemsCntD4 = array();
        }

        $queryCntS4 = "SELECT * FROM $tableR2 AND Solicitante = $userName";
        $itemsCntS4 = $wpdb->get_results($queryCntS4, ARRAY_A);
        if (empty($itemsCntS4)) {
            $itemsCntS4 = array();
        }

        $RegistrosD4 = count($itemsCntD4);
        $RegistrosS4 = count($itemsCntS4);

        $numRegistrosTot2 = $RegistrosD4 + $RegistrosS4;

        //html---------------------------------------------------------------------------------------------------
        $html = $this->getApplication($consecutivo);
        $html = $this->head();
        
        $html .= $this->buttonsNav();
        $html .= $this->conteoTickets($numRegistrosAb2, $numRegistrosCe2, $numRegistrosCon2, $numRegistrosTot2);
        $html .= $this->search();
        $html .= $this->openTableApplication($id, $id2);
        $html .= $this->dataTableApplication($id, $id2, $consecutivo, $lista_formularios, $lista_formularios2);
        $html .= $this->closeTableApplication();

        $html .= $this->structureTickets($start_numberD1, $start_numberS1, $start_numberD2, $start_numberS2, $start_numberD3, $start_numberS3, $start_numberD4, $start_numberS4, $countPagD1, $countPagS1, $countPagD2, $countPagS2, $countPagD3, $countPagS3, $countPagD4, $countPagS4, $tUrlId, $lista_formularios_rtasD1, $lista_formularios_rtasD2, $lista_formularios_rtasD3, $lista_formularios_rtasD4, $lista_formularios_rtasS1, $lista_formularios_rtasS2, $lista_formularios_rtasS3, $lista_formularios_rtasS4);

        return $html;
    }

}

?>