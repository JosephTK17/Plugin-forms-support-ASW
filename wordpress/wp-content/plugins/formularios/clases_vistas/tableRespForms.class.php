<?php

class tableForms {
    public function getForms($FormularioId)
    {
        global $wpdb;
        $table = "{$wpdb->prefix}formularios";
        $query = "SELECT * FROM $table WHERE FormularioId = '$FormularioId'";
        $data = $wpdb->get_results($query, ARRAY_A);

        if (empty($data)) {
            $data = array();
        }

        return $data[0];
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
                        width: 100%;
                        background-color: #4f6df5;
                        padding: 8px;
                        text-align: center;
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
                    }

                    #create{
                        margin: 0 15% 0 15%;
                    }

                    #create a{
                        padding: 10px 22px 10px 22px;
                    }

                    #admin a:hover{
                        background-color: #6F6F6F;
                        transition: background-color 0.5s;
                    }

                    #admin a{
                        padding: 10px 30px 10px 30px;
                        background-color: gray;
                    }

                    #cont_btns_tables{
                        margin: 50px 0 0 0;
                        text-align: center;
                    }
                
                    #cont_btn_rtas button{
                        cursor: pointer;
                        height:25px;
                        width:100px;
                        border: transparent;
                        background-color: #ca0004;
                        color: #b3b3b3;
                        border-radius: 5px;
                    }

                    .table_form{
                        width: 100%;
                        border-top: none;
                        border-right: none;
                        border-left: none;
                        border-collapse: collapse;
                    }

                    .table_form thead th{ 
                        color: gray;
                        border-top: none;
                        border-right: none;
                        border-left: none;
                        border-right-color: white;
                    }

                    .table_form tbody tr td{
                        border-top: none;
                        border-right: none;
                        border-left: none;
                    }

                    .clm_btn_dlle{
                        background-color: white !important;
                        // border-color: white;
                    }

                    .clm_btn_dlle a{
                        // width: 50px;
                        background-color: blue;
                        color: white;
                        text-decoration: none;
                        border-radius: 3px;
                    }

                    .cont_num_pag{
                        margin: 15px 0 0 0;
                    }

                    #table_pag{
                        border: none;
                        border-collapse: collapse;
                        margin: 0 0 0 0;
                        display: flex;
                        justify-content: center;
                    }

                    #table_pag tbody {
                        border-radius: 3px;
                    }

                    #table_pag tbody tr td{
                        border-color: black;
                    }

                    #table_pag tbody tr td a{
                        // margin: 0 -4.3px 0 0;
                        padding: 0 9px 0 9px;
                        text-decoration: none;
                    }

                    #table_pag tbody tr td span{
                        margin: 0 0 0 0;
                        padding: 0 9px 0 9px;
                        text-decoration: none;
                    }

                    #cont_table_rtas h4{
                        color: #84858d;
                        text-align: center;
                    }

                    .table_rtas{
                        margin: 0 25% 0 25%;
                        border-collapse: collapse;   
                    }

                    .table_rtas thead th{
                        background-color: gray; 
                        color: white;
                        border-right-color: white;
                    }

                    .inpt_filter{
                        margin: 0 10px 20px 0;
                        float: left;
                    }

                    #btn_buscar{
                        width: 100px;
                    }

                    #consecutivo{
                        border: 2px solid #e0e0ec!important;
                        border-radius: 0;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                        width: 200px;
                    }

                    #fecha{
                        border: 2px solid #e0e0ec!important;
                        border-radius: 0;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                        width: 200px;
                    }

                    #Solicitante{
                        border: 2px solid #e0e0ec!important;
                        border-radius: 0;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                        width: 200px;
                    }

                    .cont_num_tickest{
                        text-align: center;
                        border: solid 1px gray;
                        padding: 10px;
                    }

                    .btn_num_tick{
                        display: inline-block;
                        border: solid 1px gray;
                        width: 120px;
                    }

                    .btn_num_tick a{
                        text-decoration: none;
                    }

                    #abiertos{
                        margin: 0px 39px 0px 0px;
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

                    .cont_modal_not{
                        display: flex;
                        justify-content: center;
                    }

                    .cont_modal_not p{
                        width: 50%;
                        border: solid 1px;
                        text-align: center;
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
                    <div class='btn_nav' id='admin'>
                        <a href='#'>Ver Tickets</a>
                    </div>
                </div>
        ";

        return $html;
    }

    public function conteoTickets($numRegistrosAb, $numRegistrosCe, $numRegistrosCon, $numRegistrosTot)
    {
        $html = "
            <div class='cont_num_tickest'>
                <div class='btn_num_tick' id='abiertos'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1' name='table[]'>Abiertos ($numRegistrosAb)</a>
                </div>
                <div class='btn_num_tick' id='cerrados'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=2' name='table[]'>Cerrados ($numRegistrosCe)</a>
                </div>
                <div class='btn_num_tick' id='contestados'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=3' name='table[]'>Contestado ($numRegistrosCon)</a>
                </div>
                <div class='btn_num_tick' id='totales'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=4' name='table[]'>Totales ($numRegistrosTot)</a>
                </div>
            </div>
        ";

        return $html;
    }

    public function search()
    {
        $html = "
            <div id='cont_form_filter'>
                <form method='POST' id='filter_application'>
                    <div>
                        <div id='cont_inpt'>
                            <div class='inpt_filter' id='inpt_consecutivo'>
                                <input type='text' name='consecutivo[]' id='consecutivo' placeholder='Consecutivo' style='height:25px; text-align: center;'>
                            </div>
                            <div class='inpt_filter' id='inpt_fecha' style='display: none;'>
                                <input type='text' name='fecha[]' id='fecha' placeholder='Fecha ej: 20-05-2023' style='display: none; height:25px; text-align: center;'>
                            </div>
                            <div class='inpt_filter' id='inpt_solicitante' style='display: none;'>
                                <input type='text' name='solicitante[]' id='solicitante'placeholder='Solicitante' style='display: none; height:25px; text-align: center;'>
                            </div> 
                            <div class='inpt_filter' id='btn_buscar'>
                                <button type='submit' name='buscar' style='cursor: pointer; height:25px; width:100%; border: transparent; background-color: #ca0004; color: #b3b3b3; border-radius: 5px;'><strong>Buscar</strong></button>
                            </div>
                        </div>
                        <div id='cont_btn'>
                            <div class='btn_filter' id='btn_mostrar'>
                                <button type='button' name='mostrar' onclick='showMoreFilter()' style='cursor: pointer; height:25px; width: 100px; border: transparent; background-color: #ca0004; color: #b3b3b3; border-radius: 5px;'><strong>Mas</strong></button>
                            </div>
                            <div class='btn_filter' id='btn_ocultar' style ='display: none;'>
                                <button type='button' name='ocultar' onclick='hideFilter()' style='cursor: pointer; height:25px; width: 100px; border: transparent; background-color: #ca0004; color: #b3b3b3; border-radius: 5px;'><strong>Menos</strong></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        ";
        
        return $html;
    }

    public function TableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2)
    {
        $html = "";

        if (!empty($_POST['fecha'][0])) {

            //fecha
            if ($conseId[0]['FormularioId'] == 1 && $conseId2[0]['FormularioId'] == 2) {

                $html .= "
                <div id='table_search'>
                    <div id='cont_table_dllo_flt'>
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

                foreach ($lista_formularios_filter as $key => $value) {
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

                $html .= "
                    <div id='cont_table_spte_flt'>
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

                foreach ($lista_formularios_filter2 as $key => $value) {
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
                </div>
                ";
            } elseif ($conseId[0]['FormularioId'] == 1) {

                $html .= "
                <div id='table_search'>
                    <div id='cont_table_dllo_flt'>
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

                foreach ($lista_formularios_filter as $key => $value) {
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
                </div>
                ";

            } elseif ($conseId2[0]['FormularioId'] == 2) {

                $html .= "
                <div id='table_search'>
                    <div id='cont_table_spte_flt'>
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

                foreach ($lista_formularios_filter2 as $key => $value) {
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
                </div>
                ";

            }

        } elseif (!empty($_POST['consecutivo'][0]) && $conseId[0]['FormularioId'] == 1) {

            //consecutivo
            $html .= "
            <div id='table_search'>
                <div id='cont_table_dllo_flt'>
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
        } elseif (!empty($_POST['consecutivo'][0]) && $conseId2[0]['FormularioId'] == 2) {

            //consecutivo
            $html .= "
            <div id='table_search'>
                <div id='cont_table_spte_flt'>
                    <h4>Soporte</h4>
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
        } elseif (!empty($_POST['solicitante'][0]) && empty($_POST['fecha'][0])) {

            //solicitante
            if ($conseId[0]['FormularioId'] == 1 && $conseId2[0]['FormularioId'] == 2) {
                $html .= "
                <div id='table_search'>
                    <div id='cont_table_dllo_flt'>
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

                foreach ($lista_formularios_filter as $key => $value) {
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

                $html .= "
                    <div id='cont_table_spte_flt'>
                        <h4>Soporte</h4>
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

                foreach ($lista_formularios_filter2 as $key => $value) {
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
                </div>
                ";
            } elseif ($conseId[0]['FormularioId'] == 1) {
                $html .= "
                <div id='table_search'>
                    <div id='cont_table_dllo_flt'>
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

                foreach ($lista_formularios_filter as $key => $value) {
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
                </div>
                ";
            } elseif ($conseId2[0]['FormularioId'] == 2) {
                $html .= "
                <div id='table_search'>
                    <div id='cont_table_spte_flt'>
                        <h4>Soporte</h4>
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

                foreach ($lista_formularios_filter2 as $key => $value) {
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
                </div>
                ";
            }
            
        } elseif (!empty($_POST['consecutivo'][0]) && empty($_POST['fecha'][0]) && empty($_POST['solicitante'][0])) {

            $html .= "
            <div id='table_search'>
                <div>
                    <h1>Lo senimos, no hemos encontrado tu ticket</h1>
                </div>
            </div>
            "; 

        }

        return $html;
    }

    public function oneTableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2)
    {
        $html = "";

        //datos consecutivo
        if (!empty($_POST['consecutivo'][0]) && $conseId[0]['FormularioId'] == 1) {
            foreach ($lista_formularios_filter as $key => $value) {
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
            </div>
            ";

        } elseif (!empty($_POST['consecutivo'][0]) && $conseId2[0]['FormularioId'] == 2) {
            foreach ($lista_formularios_filter2 as $key => $value) {
                    $consecutivo2 = $value['Consecutivo'];
                    $date2 = $value['Fecha'];
                    $solicitante = $value['Solicitante'];
                    $area2 = $value['Área'];
                    $descripcion = $value['Descripción'];
                    $estado2 = $value['Estado'];
                    $sede = $value['Sede'];

                $html .= "
                    <tr>
                        <td>$consecutivo2</td>
                        <td>$date2</td>
                        <td>$solicitante</td>
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
            </div>
            ";
        }

        return $html;
    }

    public function structureTickets($start_numberD1, $start_numberS1, $start_numberD2, $start_numberS2, $start_numberD3, $start_numberS3, $start_numberD4, $start_numberS4, $countPagD1, $countPagS1, $countPagD2, $countPagS2, $countPagD3, $countPagS3, $countPagD4, $countPagS4, $tUrlId, $lista_formularios_rtasD1, $lista_formularios_rtasD2, $lista_formularios_rtasD3, $lista_formularios_rtasD4, $lista_formularios_rtasS1, $lista_formularios_rtasS2, $lista_formularios_rtasS3, $lista_formularios_rtasS4)
    {
        $html = "";

        if ($tUrlId == 1) {
            if (!empty($lista_formularios_rtasD1)) {
                $html .= "
                <div id='tables_tickets'>
                    <div id='cont_table_dllo'>
                    <scroll-container>
                        <scroll-page id='tDllo'></scroll-page>
                    </scroll-container>
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
                                <th class='clm_btn_dlle'></th>
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
                            <td class='clm_btn_dlle'>
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

                $nav_countD1 = 0;
                $page_countD1 = 1;
                $current_pageD1 = $start_numberD1/10 + 1;
                $numReg = $_GET['startD1'];
                $prev = $numReg - 10;
                $next = $numReg + 10;

                $html .= "
                <div class='cont_num_pag'>
                    <table id='table_pag' border=1>
                        <tr>
                ";

                if ($numReg == 0) {
                    $html .= "";
                } else {
                    $html .= "
                                <td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1 && startD1={$prev} '><</a></td>
                    ";
                }
            
                if ( $countPagD1 > 10 ){
            
                    while ( $nav_countD1 < $countPagD1 ) {
                        if ( $page_countD1 === $current_pageD1 ){
                            $html .= "
                                <td style='background-color: gray;'><span>{$page_countD1}</span></td>
                            ";
                        } else {
                            $html .= "
                                <td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1 && startD1={$nav_countD1}'>{$page_countD1}</a></td>
                            ";
                        }
                        $nav_countD1 += 10;
                        $page_countD1++;
                    }
                }

                $restReg = $nav_countD1 - $numReg ;
                $sumReg = $numReg + $restReg;

                if ($nav_countD1 == $sumReg && $restReg == 10) {
                    $html .= "";
                } else {
                    $html .= "
                        <td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1 && startD1={$next}'>></a></td>
                    ";
                }

                $html .= "
                            
                        </tr>
                    </table>
                </div>
                ";
            } else {
                $html .= "
                <div id='tables_tickets'>
                    <div class='cont_modal_not'>
                        <p>No hay registros abiertos en la tabla 'Desarrollo'</p>
                    </div>
                ";
            }

            if (!empty($lista_formularios_rtasS1)) {
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
                                <th class='clm_btn_dlle'></th>
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
                            <td class='clm_btn_dlle'>
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

                $html .= "
                    <div class='cont_num_pag'>
                        <table id='table_pag' border=1>
                            <tr>
                ";

                if ( $countPagS1 > 10 ){
                    $nav_countS1 = 0;
                    $page_countS1 = 1;
                    $current_pageS1 = $start_numberS1/10 + 1;
            
                    while ( $nav_countS1 < $countPagS1 ) {
                        if ( $page_countS1 === $current_pageS1 ){
                            $html .= "<td style='background-color: gray;'><span>{$page_countS1}</span></td>";
                        } else {
                            $html .= "<td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1 && startS1={$nav_countS1}'>{$page_countS1}</a></td> ";
                        }
                        $nav_countS1 += 10;
                        $page_countS1++;
                    }
                }

                $html .= "
                            </tr>
                        </table>
                    </div>
                </div>
                ";

            } else {
                $html .= "
                    <div class='cont_modal_not'>
                        <p>No hay registros abiertos en la tabla 'Soporte'</p>
                    </div>
                </div>
                ";
            }

        } elseif ($tUrlId == 2){
            if (!empty($lista_formularios_rtasD2)) {
                $html .= "
                <div id='tables_tickets'>
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
                                <th class='clm_btn_dlle'></th>
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
                            <td class='clm_btn_dlle'>
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

                $html .= "
                    <div class='cont_num_pag'>
                        <table id='table_pag' border=1>
                            <tr>
                ";

                if ( $countPagD2 > 10 ){
                    $nav_countD2 = 0;
                    $page_countD2 = 1;
                    $current_pageD2 = $start_numberD2/10 + 1;
            
                    while ( $nav_countD2 < $countPagD2 ) {
                        if ( $page_countD2 === $current_pageD2 ){
                            $html .= "<td style='background-color:;'><span>{$page_countD2}</span></td>";
                        } else {
                            $html .= "<td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=2 && startD2={$nav_countD2}'>{$page_countD2}</a></td>
                            ";
                        }
                        $nav_countD2 += 10;
                        $page_countD2++;
                    }
                }

                $html .= "
                            </tr>
                        </table>
                    </div>
                ";

            } else {
                $html .= "
                <div id='tables_tickets'>
                    <div class='cont_modal_not'>
                        <p>No hay registros cerrados en la tabla 'Desarrollo'</p>
                    </div>
                ";
            }

            if (!empty($lista_formularios_rtasS2)) {
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
                                <th class='clm_btn_dlle'></th>
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
                            <td class='clm_btn_dlle'>
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

                $html .= "
                    <div class='cont_num_pag'>
                        <table id='table_pag' border=1>
                            <tr>
                ";

                if ( $countPagS2 > 10 ){
                    $nav_countS2 = 0;
                    $page_countS2 = 1;
                    $current_pageS2 = $start_numberS2/10 + 1;
            
                    while ( $nav_countS2 < $countPagS2 ) {
                        if ( $page_countS2 === $current_pageS2 ){
                            $html .= "<td style='background-color: gray;'><span>{$page_countS2}</span></td> ";
                        } else {
                            $html .= "<td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=2 && startS2={$nav_countS2}'>{$page_countS2}</a></td>
                            ";
                        }
                        $nav_countS2 += 10;
                        $page_countS2++;
                    }
                }

                $html .= "
                            </tr>
                        </table>
                    </div>
                </div>
                ";

            } else {
                $html .= "
                    <div class='cont_modal_not'>
                        <p>No hay registros cerrados en la tabla 'Soporte'</p>
                    </div>
                </div>
                ";
            }

        } elseif ($tUrlId == 3) {
            if (!empty($lista_formularios_rtasD3)) {
                $html .= "
                <div id='tables_tickets'>
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
                                <th class='clm_btn_dlle'></th>
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
                            <td class='clm_btn_dlle'>
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

                $html .= "
                    <div class='cont_num_pag'>
                        <table id='table_pag' border=1>
                            <tr>
                ";

                if ( $countPagD3 > 10 ){
                    $nav_countD3 = 0;
                    $page_countD3 = 1;
                    $current_pageD3 = $start_numberD3/10 + 1;
            
                    while ( $nav_countD3 < $countPagD3 ) {
                        if ( $page_countD3 === $current_pageD3 ){
                            $html .= "<td style='background-color: gray;'><span>{$page_countD3}</span></td> ";
                        } else {
                            $html .= "<td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=3 && startD3={$nav_countD3}'>{$page_countD3}</a></td>
                            ";
                        }
                        $nav_countD3 += 10;
                        $page_countD3++;
                    }
                }

                $html .= "
                            </tr>
                        </table>
                    </div>
                ";

            } else {
                $html .= "
                <div id='tables_tickets'>
                    <div class='cont_modal_not'>
                        <p>No hay registros contestados en la tabla 'Desarrollo'</p>
                    </div>
                ";
            }

            if (!empty($lista_formularios_rtasS3)) {
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
                                <th class='clm_btn_dlle'></th>
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
                            <td class='clm_btn_dlle'>
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

                $html .= "
                    <div class='cont_num_pag'>
                        <table id='table_pag' border=1>
                            <tr>
                ";

                if ( $countPagS3 > 10 ){
                    $nav_countS3 = 0;
                    $page_countS3 = 1;
                    $current_pageS3 = $start_numberS3/10 + 1;
            
                    while ( $nav_countS3 < $countPagS3 ) {
                        if ( $page_countS3 === $current_pageS3 ){
                            $html .= "<td style='background-color: gray;'><span>{$page_countS3}</span></td> ";
                        } else {
                            $html .= "<td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=3 && startS3={$nav_countS3}'>{$page_countS3}</a></td>
                            ";
                        }
                        $nav_countS3 += 10;
                        $page_countS3++;
                    }
                }

                $html .= "
                            </tr>
                        </table>
                    </div>
                </div>
                ";

            } else {
                $html .= "
                    <div class='cont_modal_not'>
                        <p>No hay registros contestados en la tabla 'Soporte'</p>
                    </div>
                </div>
                ";
            }

        } elseif ($tUrlId == 4) {

            if (!empty($lista_formularios_rtasD4)) {
                $html .= "
                <div id='tables_tickets'>
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
                                <th class='clm_btn_dlle'></th>
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
                            <td class='clm_btn_dlle'>
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

                $html .= "
                    <div class='cont_num_pag'>
                        <table id='table_pag' border=1>
                            <tr>
                ";

                if ( $countPagD4 > 10 ){
                    $nav_countD4 = 0;
                    $page_countD4 = 1;
                    $current_pageD4 = $start_numberD4/10 + 1;
            
                    while ( $nav_countD4 < $countPagD4 ) {
                        if ( $page_countD4 === $current_pageD4 ){
                            $html .= "<td style='background-color: gray;'><span>{$page_countD4}</span></td> ";
                        } else {
                            $html .= "<td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=4 && startD4={$nav_countD4}'>{$page_countD4}</a></td>
                            ";
                        }
                        $nav_countD4 += 10;
                        $page_countD4++;
                    }
                }

                $html .= "
                            </tr>
                        </table>
                    </div>
                ";

            } else {
                $html .= "
                <div id='tables_tickets'>
                    <div class='cont_modal_not'>
                        <p>No hay registros en la tabla 'Desarrollo'</p>
                    </div>
                ";
            }

            if (!empty($lista_formularios_rtasS4)) {
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
                                <th class='clm_btn_dlle'></th>
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
                            <td class='clm_btn_dlle'>
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

                $html .= "
                    <div class='cont_num_pag'>
                        <table id='table_pag' border=1>
                            <tr>
                ";

                if ( $countPagS4 > 10 ){
                    $nav_countS4 = 0;
                    $page_countS4 = 1;
                    $current_pageS4 = $start_numberS4/10 + 1;
            
                    while ( $nav_countS4 < $countPagS4 ) {
                        if ( $page_countS4 === $current_pageS4 ){
                            $html .= "<td style='background-color: gray;'><span>{$page_countS4}</span></td>";
                        } else {
                            $html .= "<td><a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=4 && startS4={$nav_countS4}'>{$page_countS4}</a></td> ";
                        }
                        $nav_countS4 += 10;  
                        $page_countS4++;
                    }
                }

                $html .= "
                            </tr>
                        </table>
                    </div>
                </div>
                ";

            } else {
                $html .= "
                    <div class='cont_modal_not'>
                        <p>No hay registros en la tabla 'Soporte'</p>
                    </div>
                </div>
                ";  
            }
        }    
        //verifica si hay datos en las tablas
        if ($tUrlId == 1 && empty($lista_formularios_rtasD1) && empty($lista_formularios_rtasS1)) {
            $html = "<h1>No hay registros</h1>";
        } elseif ($tUrlId == 2 && empty($lista_formularios_rtasD2) && empty($lista_formularios_rtasS2)) {
            $html = "<h1>No hay registros</h1>";
        } elseif ($tUrlId == 3 && empty($lista_formularios_rtasD3) && empty($lista_formularios_rtasS3)) {
            $html = "<h1>No hay registros</h1>";
        } elseif ($tUrlId == 4 && empty($lista_formularios_rtasD4) && empty($lista_formularios_rtasS4)) {
            $html = "<h1>No hay registros</h1>";
        }

        return $html;
    }

    public function moreFilters()
    {
        echo "
            <script language='JavaScript'>
                function showMoreFilter(){
                    document.getElementById('btn_mostrar').style.display = 'none'
                    document.getElementById('btn_ocultar').style.display = 'block'

                    document.getElementById('inpt_fecha').style.display = 'block'
                    document.getElementById('fecha').style.display = 'block'
                    
                    document.getElementById('inpt_solicitante').style.display = 'block'
                    document.getElementById('solicitante').style.display = 'block'

                }

                function hideFilter(){
                    document.getElementById('btn_mostrar').style.display = 'block'
                    document.getElementById('btn_ocultar').style.display = 'none'

                    document.getElementById('inpt_fecha').style.display = 'none'
                    document.getElementById('fecha').style.display = 'none'
                    
                    document.getElementById('inpt_solicitante').style.display = 'none'
                    document.getElementById('solicitante').style.display = 'none'
                }
            </script>
        ";
    }

    public function constructor($tUrlId, $consecutivo, $fecha, $solicitante)
    {
        global $wpdb;

        //tabla desarrollo------------------------
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";

        $queryRtas = "SELECT * FROM $tableR1";
        $lista_formularios_rtas = $wpdb->get_results($queryRtas, ARRAY_A);
        if (empty($lista_formularios_rtas)) {
            $lista_formularios_rtas = array();
        }
        

        //tabla soporte------------------------------
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

        $queryRtas2 = "SELECT * FROM $tableR2";
        $lista_formularios_rtas2 = $wpdb->get_results($queryRtas2, ARRAY_A);
        if (empty($lista_formularios_rtas2)) {
            $lista_formularios_rtas2 = array();
        }

        //filtro----------------------------

        if (!empty($_POST['fecha'][0]) && !empty($_POST['solicitante'][0])) {

            $queryData = "SELECT * FROM $tableR1 WHERE Fecha = '$fecha' AND Solicitante = '$solicitante' ORDER BY FormularioId DESC"; 
            $queryData2 = "SELECT * FROM $tableR2 WHERE Fecha = '$fecha' AND Solicitante = '$solicitante' ORDER BY FormularioId DESC";

            //idForm
            $queryId = "SELECT FormularioId FROM $tableR1 WHERE Fecha = '$fecha' AND Solicitante = '$solicitante'";
            $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Fecha = '$fecha' AND Solicitante = '$solicitante'";

        } elseif(!empty($_POST['consecutivo'][0])){

            $queryData = "SELECT * FROM $tableR1 WHERE Consecutivo = '$consecutivo' ORDER BY FormularioId DESC";
            $queryData2 = "SELECT * FROM $tableR2 WHERE Consecutivo = '$consecutivo' ORDER BY FormularioId DESC"; 

            //idForm
            $queryId = "SELECT FormularioId FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
            $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Consecutivo = '$consecutivo'";

        } elseif (!empty($_POST['fecha'][0])) {

            $queryData = "SELECT * FROM $tableR1 WHERE Fecha = '$fecha' ORDER BY FormularioId DESC";
            $queryData2 = "SELECT * FROM $tableR2 WHERE Fecha = '$fecha' ORDER BY FormularioId DESC";

            //idForm
            $queryId = "SELECT FormularioId FROM $tableR1 WHERE Fecha = '$fecha'";
            $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Fecha = '$fecha'";
            
        } elseif (!empty($_POST['solicitante'][0])) {

            $queryData = "SELECT * FROM $tableR1 WHERE Solicitante = '$solicitante' ORDER BY FormularioId DESC"; 
            $queryData2 = "SELECT * FROM $tableR2 WHERE Solicitante = '$solicitante' ORDER BY FormularioId DESC";

            //idForm
            $queryId = "SELECT FormularioId FROM $tableR1 WHERE Solicitante = '$solicitante'";
            $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Solicitante = '$solicitante'";

        }

        $lista_formularios_filter = $wpdb->get_results($queryData, ARRAY_A);
        if (empty($lista_formularios_filter)) {
            $lista_formularios_filter = array();
        }

        $conseId = $wpdb->get_results($queryId, ARRAY_A);

        $lista_formularios_filter2 = $wpdb->get_results($queryData2, ARRAY_A);
        if (empty($lista_formularios_filter2)) {
            $lista_formularios_filter2 = array();
        }

        $conseId2 = $wpdb->get_results($queryId2, ARRAY_A);

        if (is_super_admin()) {

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
            $sqlD1 = "SELECT COUNT(*) FROM `$tableR1` WHERE Estado != 'Cerrado'";
            $countPagD1 = $wpdb->get_var($sqlD1);

            $start_numberS1 = $_REQUEST['startS1']??0;
            if ( $start_numberS1 < 0 || ! is_numeric( $start_numberS1 ) ) $start_numberS1 = 0;

            // Count items
            $sqlS1 = "SELECT COUNT(*) FROM `$tableR2` WHERE Estado != 'Cerrado'";
            $countPagS1 = $wpdb->get_var($sqlS1);

            //T2--------------------------------------------------------------------
            $start_numberD2 = $_REQUEST['startD2']??0;
            if ( $start_numberD2 < 0 || ! is_numeric( $start_numberD2 ) ) $start_numberD2 = 0;

            // Count items
            $sqlD2 = "SELECT COUNT(*) FROM `$tableR1` WHERE Estado = 'Cerrado'";
            $countPagD2 = $wpdb->get_var($sqlD2);

            $start_numberS2 = $_REQUEST['startS2']??0;
            if ( $start_numberS2 < 0 || ! is_numeric( $start_numberS2 ) ) $start_numberS2 = 0;

            // Count items
            $sqlS2 = "SELECT COUNT(*) FROM `$tableR2` WHERE Estado = 'Cerrado'";
            $countPagS2 = $wpdb->get_var($sqlS2);

            //T3--------------------------------------------------------------------
            $start_numberD3 = $_REQUEST['startD3']??0;
            if ( $start_numberD3 < 0 || ! is_numeric( $start_numberD3 ) ) $start_numberD3 = 0;

            // Count items
            $sqlD3 = "SELECT COUNT(*) FROM `$tableR1` WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
            $countPagD3 = $wpdb->get_var($sqlD3);

            $start_numberS3 = $_REQUEST['startS3']??0;
            if ( $start_numberS3 < 0 || ! is_numeric( $start_numberS3 ) ) $start_numberS3 = 0;

            // Count items
            $sqlS3 = "SELECT COUNT(*) FROM `$tableR2` WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
            $countPagS3 = $wpdb->get_var($sqlS3);

            //T4--------------------------------------------------------------------
            $start_numberD4 = $_REQUEST['startD4']??0;
            if ( $start_numberD4 < 0 || ! is_numeric( $start_numberD4 ) ) $start_numberD4 = 0;

            // Count items
            $sqlD4 = "SELECT COUNT(*) FROM `$tableR1`";
            $countPagD4 = $wpdb->get_var($sqlD4);

            $start_numberS4 = $_REQUEST['startS4']??0;
            if ( $start_numberS4 < 0 || ! is_numeric( $start_numberS4 ) ) $start_numberS4 = 0;

            // Count items
            $sqlS4 = "SELECT COUNT(*) FROM `$tableR2`";
            $countPagS4 = $wpdb->get_var($sqlS4);

            //admin----------------------------------------------------------------------------------------------
            //tabla desarrollo------------------------
            $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
            //tabla soporte------------------------------
            $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

            //abierto
            //mostrar-------------------------
            $queryRtasD1 = "SELECT * FROM $tableR1 WHERE Estado != 'Cerrado' LIMIT $start_numberD1, 10";
            $lista_formularios_rtasD1 = $wpdb->get_results($queryRtasD1, ARRAY_A);
            if (empty($lista_formularios_rtasD1)) {
                $lista_formularios_rtasD1 = array();
            }

            $queryRtasS1 = "SELECT * FROM $tableR2 WHERE Estado != 'Cerrado' LIMIT $start_numberS1, 10";
            $lista_formularios_rtasS1 = $wpdb->get_results($queryRtasS1, ARRAY_A);
            if (empty($lista_formularios_rtasS1)) {
                $lista_formularios_rtasS1 = array();
            }

            //count------------------
            $queryCntD1 = "SELECT * FROM $tableR1 WHERE Estado != 'Cerrado'";
            $itemsCntD1 = $wpdb->get_results($queryCntD1, ARRAY_A);
            if (empty($itemsCntD1)) {
                $itemsCntD1 = array();
            }

            $queryCntS1 = "SELECT * FROM $tableR2 WHERE Estado != 'Cerrado'";
            $itemsCntS1 = $wpdb->get_results($queryCntS1, ARRAY_A);
            if (empty($itemsCntS1)) {
                $itemsCntS1 = array();
            }

            $RegistrosD1 = count($itemsCntD1);
            $RegistrosS1 = count($itemsCntS1);

            $numRegistrosAb = $RegistrosD1 + $RegistrosS1;

            //cerrado
            $queryRtasD2 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado' LIMIT $start_numberD2, 10";
            $lista_formularios_rtasD2 = $wpdb->get_results($queryRtasD2, ARRAY_A);
            if (empty($lista_formularios_rtasD2)) {
                $lista_formularios_rtasD2 = array();
            }

            $queryRtasS2 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado' LIMIT $start_numberS2, 10";
            $lista_formularios_rtasS2 = $wpdb->get_results($queryRtasS2, ARRAY_A);
            if (empty($lista_formularios_rtasS2)) {
                $lista_formularios_rtasS2 = array();
            }

            //count------------------
            $queryCntD2 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado'";
            $itemsCntD2 = $wpdb->get_results($queryCntD2, ARRAY_A);
            if (empty($itemsCntD2)) {
                $itemsCntD2 = array();
            }

            $queryCntS2 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado'";
            $itemsCntS2 = $wpdb->get_results($queryCntS2, ARRAY_A);
            if (empty($itemsCntS2)) {
                $itemsCntS2 = array();
            }

            $RegistrosD2 = count($itemsCntD2);
            $RegistrosS2= count($itemsCntS2);

            $numRegistrosCe = $RegistrosD2 + $RegistrosS2;

            //contestado
            $queryRtasD3 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' LIMIT $start_numberD2, 10";
            $lista_formularios_rtasD3 = $wpdb->get_results($queryRtasD3, ARRAY_A);
            if (empty($lista_formularios_rtasD3)) {
                $lista_formularios_rtasD3 = array();
            }

            $queryRtasS3 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' LIMIT $start_numberD2, 10";
            $lista_formularios_rtasS3 = $wpdb->get_results($queryRtasS3, ARRAY_A);
            if (empty($lista_formularios_rtasS3)) {
                $lista_formularios_rtasS3 = array();
            }

            //count------------------
            $queryCntD3 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
            $itemsCntD3 = $wpdb->get_results($queryCntD3, ARRAY_A);
            if (empty($itemsCntD3)) {
                $itemsCntD3 = array();
            }

            $queryCntS3 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
            $itemsCntS3 = $wpdb->get_results($queryCntS3, ARRAY_A);
            if (empty($itemsCntS3)) {
                $itemsCntS3 = array();
            }

            $RegistrosD3 = count($itemsCntD3);
            $RegistrosS3 = count($itemsCntS3);

            $numRegistrosCon = $RegistrosD3 + $RegistrosS3;

            //total
            $queryRtasD4 = "SELECT * FROM $tableR1 LIMIT $start_numberD4, 10" ;
            $lista_formularios_rtasD4 = $wpdb->get_results($queryRtasD4, ARRAY_A);
            if (empty($lista_formularios_rtasD4)) {
                $lista_formularios_rtasD4 = array();
            }

            $queryRtasS4 = "SELECT * FROM $tableR2 LIMIT $start_numberS4, 10";
            $lista_formularios_rtasS4 = $wpdb->get_results($queryRtasS4, ARRAY_A);
            if (empty($lista_formularios_rtasS4)) {
                $lista_formularios_rtasS4 = array();
            }

            //count------------------
            $queryCntD4 = "SELECT * FROM $tableR1";
            $itemsCntD4 = $wpdb->get_results($queryCntD4, ARRAY_A);
            if (empty($itemsCntD4)) {
                $itemsCntD4 = array();
            }

            $queryCntS4 = "SELECT * FROM $tableR2";
            $itemsCntS4 = $wpdb->get_results($queryCntS4, ARRAY_A);
            if (empty($itemsCntS4)) {
                $itemsCntS4 = array();
            }

            $RegistrosD4 = count($itemsCntD4);
            $RegistrosS4 = count($itemsCntS4);

            $numRegistrosTot= $RegistrosD4 + $RegistrosS4;

            //html------------------------------------------------------------------------------------------
            $html = $this->head();

            $html .= $this->buttonsNav();

            //tabla filtro
            $html .= $this->conteoTickets($numRegistrosAb, $numRegistrosCe, $numRegistrosCon, $numRegistrosTot);
            $html .= $this->search();

            if (!empty($conseId) || !empty($conseId2) || !empty($lista_formularios_filter) || !empty($lista_formularios_filter2)) {

                $html .= $this->TableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2);
                $html .= $this->oneTableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2);

            } elseif (!empty($tUrlId)) {

                //tabla respuestas
                $html .= $this->structureTickets($start_numberD1, $start_numberS1, $start_numberD2, $start_numberS2, $start_numberD3, $start_numberS3, $start_numberD4, $start_numberS4, $countPagD1, $countPagS1, $countPagD2, $countPagS2, $countPagD3, $countPagS3, $countPagD4, $countPagS4, $tUrlId, $lista_formularios_rtasD1, $lista_formularios_rtasD2, $lista_formularios_rtasD3, $lista_formularios_rtasD4, $lista_formularios_rtasS1, $lista_formularios_rtasS2, $lista_formularios_rtasS3, $lista_formularios_rtasS4);

            }

            $html .= $this->moreFilters();
            // $html .= $this->changeTable($tUrlId);

        } else {
            $html = "
                <h1>No tienes suficientes permisos para ver</h1>
            ";
        }

        return $html;
    }
}

?>