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

    public function head($tUrlId)
    {
        $html = "";

        $html .= "
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' type='text/css' href='//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css'>
                <style>

                    #general_cont{
                        margin: auto;
                        position: relative;
                        border: solid 1px;
                        padding: 30px 40px;
                        width: 70%;
                    }

                    #cont_btns{
                        height: 70px;
                        padding: 8px;
                        border-radius: 5px;
                        background-color: #4f6df5;
                        margin: 0 0 15px 0;
                    }

                    .btns_nav ul{
                        text-align: center;
                        padding: 6px 0 0 0;
                        margin: 0;
                    }

                    .btns_nav ul li{
                        display: inline-block;
                        text-align: center;
                    }

                    .btns_nav ul li a{
                        text-decoration: none;
                        color: white;
                        background-color: #304293;
                        border-radius: 5px;
                        display: block;
                        min-height: 20px;
                        min-width: 90px;
                        padding: 15px 15px;
                        font-weight: 700;
                        font-size: 18px;
                    }

                    .btns_nav ul li a:hover{
                        box-shadow: 0px 0px 5px black;
                        transition: box-shadow 0.5s;
                    }

                    #create {
                        margin: 0 15% 0 0%;
                    }

                    #create a:hover{
                        background-color: #233170;
                        transition: background-color 0.5s;
                    }
                    
                    #admin a{
                        min-width: 110px !important;
                        background-color: gray;
                    }

                    #admin a:hover{
                        background-color: #6F6F6F;
                        transition: background-color 0.5s;
                    }

                    #cont_table_dllo{
                        margin: 30px 0 0 0;
                    }

                    #cont_table_dllo h4{
                        margin: 0px 0 20px 0;
                        text-decoration: underline;
                        text-decoration-color: gray;
                    }

                    #cont_table_spte h4{
                        margin: 0px 0 20px 0;
                        text-decoration: underline;
                        text-decoration-color: gray;
                    }

                    .dataTables_length{
                        font-size: 15px;
                    }

                    .dataTables_length select{
                        height: 30px;
                        border: 2px solid #e0e0ec!important;
                        border-radius: 0px !important;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                    }

                    .dataTables_filter{
                        font-size: 15px;
                        margin: 0 0 15px 0;
                    }

                    .dataTables_filter input{
                        height: 30px;
                        border: 2px solid #e0e0ec!important;
                        border-radius: 0px !important;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                    }

                    .table_form{
                        margin: 0 0 15px 0 !important;
                        font-size: 14px;
                        width: 100% !important;
                        border-top: none;
                        border-right: none;
                        border-left: none;
                        border-collapse: collapse !important;
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
                        width: 90px;
                        text-align: center;
                    }

                    .clm_btn_dlle a{
                        background-color: #304293;
                        color: white;
                        text-decoration: none;
                        border-radius: 3px;
                        padding: 5px 10px 5px 10px;
                    }

                    .clm_btn_dlle a:hover{
                        background-color: #233170;
                        box-shadow: 0px 0px 5px black;
                        transition: background-color 0.5s;
                        transition: box-shadow 0.4s;
                    }

                    .clm_btn_spte{
                        background-color: white !important;
                        width: 90px;
                        text-align: center;
                    }

                    .clm_btn_spte a{
                        background-color: #304293;
                        color: white;
                        text-decoration: none;
                        border-radius: 3px;
                        padding: 5px 10px 5px 10px;
                    }

                    .clm_btn_spte a:hover{
                        background-color: #233170;
                        box-shadow: 0px 0px 5px black;
                        transition: background-color 0.5s;
                        transition: box-shadow 0.4s;
                    }

                    .dataTables_wrapper .dataTables_paginate .paginate_button{
                        padding: 0;
                        border-radius: 0px !important;
                        margin-left: 0px;
                    }

                    #myTable_info{
                        font-size: 15px;
                        padding: 0px;
                    }

                    #myTable_previous{
                        width: 60px !important;
                    }

                    #myTable_paginate a{
                        width: 40px;
                        font-size: 14px;
                        box-shadow: 0px 0px 5px gray;
                    }

                    #myTable_paginate a:hover{
                        box-shadow: 0px 0px 0px;
                        transition: 0.5s;
                    }

                    #myTable_paginate span{
                        margin: 0 4px 0 5px;
                    }

                    #myTable_paginate span a{
                        box-shadow: none;
                    }

                    #myTable_next{
                        width: 60px !important;
                        border-left-color: white !important;
                    }

                    #myTable2_info{
                        font-size: 15px;
                        padding: 0px;
                    }

                    #myTable2_previous{
                        width: 60px !important;
                    }

                    #myTable2_paginate a{
                        width: 40px;
                        font-size: 14px;
                        box-shadow: 0px 0px 5px gray;
                    }

                    #myTable2_paginate a:hover{
                        box-shadow: 0px 0px 0px;
                        transition: 0.5s;
                    }

                    #myTable2_paginate span{
                        margin: 0 4px 0 5px;
                    }

                    #myTable2_paginate span a{
                        box-shadow: none;
                    }

                    #myTable2_next{
                        width: 60px !important;
                        border-left-color: white !important;
                    }

                    .dataTables_wrapper .dataTables_paginate {
                        padding: 0;
                    }

                    .cont_num_tickest{
                        text-align: center;
                        border: solid 1px gray;
                        padding: 10px;
                        margin: auto;
                        width: 70%;
                    }

                    .btn_num_tick{
                        display: inline-block;
                        border: solid 1px gray;

                    }

                    .btn_num_tick a{
                        text-decoration: none;
                    }
        ";

        if ($tUrlId == 1) {
            $html .= "
                    #totales{
                        margin: 0px 39px 0px 0px;
                        border-color: #1BDC00;
                        box-shadow: 0px 0px 3px #1BDC00;
                    }
            ";
        } else {
            $html .= "
                    #totales{
                        margin: 0px 39px 0px 0px;
                    }

                    #totales:hover{
                        box-shadow: 0px 0px 3px black;
                        border-color: #1BDC00;
                        transition: border-color 0.5s;
                        transition: box-shadow 0.4s;
                    }
            ";
        }

        if ($tUrlId == 2) {
            $html .= "
                    #contestados{
                        margin: 0px 39px 0px 0px;
                        border-color: #CACD00;
                        box-shadow: 0px 0px 3px #CACD00;
                    }
            ";
        } else {
            $html .= "
                    #contestados{
                        margin: 0px 39px 0px 0px;
                    }

                    #contestados:hover{
                        box-shadow: 0px 0px 3px black;
                        border-color: #CACD00;
                        transition: border-color 0.5s;
                        transition: box-shadow 0.4s;
                    }
            ";
        }

        if ($tUrlId == 3) {
            $html .= "
                    #cerrados{
                        margin: 0px 0px 0px 0px;
                        border-color:#FF0000;
                        box-shadow: 0px 0px 3px #FF0000;
                    }
            ";
        } else {
            $html .= "
                    #cerrados{
                        margin: 0px 0px 0px 0px;
                    }

                    #cerrados:hover{
                        box-shadow: 0px 0px 3px black;
                        border-color: #FF0000;
                        transition: border-color 0.5s;
                        transition: box-shadow 0.4s;
                    }
            ";
        }

        $html .= "

                    #totales a{
                        color: #1BDC00;
                        padding: 0 15px 0 15px;
                    }

                    #cerrados a{
                        color: #FF0000;
                        padding: 0 12px 0 12px;
                    }

                    #contestados a{
                        color: #CACD00;
                        padding: 0 2px 0 2px;
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

                    .toast-container {
                        margin: 30px 0 0 0;
                        position: fixed !important;
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
        </div>
            <div id='general_cont'>
                <div id='cont_btns'>
                    <div class='btns_nav'>
                        <ul>
                            <li id='create'>
                                <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                            </li>
                            <li id='admin'>
                                <a href='#'>Ver Tickets</a>
                            </li>
                        </ul>
                    </div>
                </div>
        ";

        return $html;
    }

    public function conteoTickets($numRegistrosTot, $numRegistrosCe, $numRegistrosCon)
    {
        $html = "
            <div class='cont_num_tickest'>
                <div class='btn_num_tick' id='totales'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1' name='table[]'>Totales ($numRegistrosTot)</a>
                </div>

                <div class='btn_num_tick' id='contestados'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=2' name='table[]'>Contestado ($numRegistrosCon)</a>
                </div>

                <div class='btn_num_tick' id='cerrados'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=3' name='table[]'>Cerrados ($numRegistrosCe)</a>
                </div>
                
            </div>
        ";

        return $html;
    }

    public function structureTickets($tUrlId, $lista_formularios_rtasD1, $lista_formularios_rtasD2, $lista_formularios_rtasD3, $lista_formularios_rtasS1, $lista_formularios_rtasS2, $lista_formularios_rtasS3)
    {
        $html = "";

        $fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
        $actualDate = $fecha->format('20y-m-d');

        if ($tUrlId == 1) {
            if (!empty($lista_formularios_rtasD1)) {
                $html .= "
                <div id='tables_tickets'>
                    <div id='cont_table_dllo'>
                        <h4>Desarrollo</h4>
                        <table class='table_form' id='myTable' border=1>
                            <thead>
                                <tr>
                                    <th style='border: none; cursor: auto;'></th>
                                    <th>Consecutivo</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Solicitante</th>
                                    <th>Area</th>
                                    <th>Estado</th>
                                    <th class='clm_btn_dlle'></th>
                                </tr>
                            </thead>
                            <tbody>
                ";

                foreach ($lista_formularios_rtasD1 as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $date = $value['Fecha'];
                    $hora = $value['Hora'];
                    $solicitante = $value['Solicitante'];
                    $area = $value['Area'];
                    $estado = $value['Estado'];

                    $html .= "
                        <tr>
                    ";

                    if ($estado == 'Solicitado') {
                        $html .= "
                            <td><i class='bi bi-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='#1BDC00' class='bi bi-circle-fill' viewBox='0 0 16 16'><circle cx='8' cy='8' r='8'/></svg></td>
                        ";
                    } elseif ($estado == 'Cerrado') {
                        $html .= "
                            <td><i class='bi bi-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='#FF0000' class='bi bi-circle-fill' viewBox='0 0 16 16'><circle cx='8' cy='8' r='8'/></svg></td>
                        ";
                    } elseif ($estado != 'Solicitado' || $estado != 'Cerrado') {
                        $html .= "
                            <td><i class='bi bi-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='yellow' class='bi bi-circle-fill' viewBox='0 0 16 16'><circle cx='8' cy='8' r='8'/></svg></td>
                        ";
                    }

                    $html .= "
                            <td>$consecutivo</td>
                            <td>$date</td>
                            <td>$hora</td>
                            <td>$solicitante</td>
                            <td>$area</td>
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
            } else {
                $html .= "
                <div id='tables_tickets'>
                    <div class='cont_modal_not'>
                        <p>No hay registros en la tabla 'Desarrollo'</p>
                    </div>
                ";
            }

            if (!empty($lista_formularios_rtasS1)) {
                $html .= "
                <br>
                <br>
                    <div id='cont_table_spte'>
                        <h4>Soporte</h4>
                        <table class='table_form' id='myTable2' border=1>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Consecutivo</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Solicitante</th>
                                    <th>Area</th>
                                    <th>Sede</th>
                                    <th>Estado</th>
                                    <th class='clm_btn_spte'></th>
                                </tr>
                            </thead>
                            <tbody>
                ";

                foreach ($lista_formularios_rtasS1 as $key => $value) {
                    $consecutivo2 = $value['Consecutivo'];
                    $date2 = $value['Fecha'];
                    $hora2 = $value['Hora'];
                    $solicitante2 = $value['Solicitante'];
                    $area2 = $value['Area'];
                    $sede = $value['Sede'];
                    $estado2 = $value['Estado'];

                    $html .= "
                        <tr>
                    ";

                    if ($estado2 == 'Solicitado') {
                        $html .= "
                            <td><i class='bi bi-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='#1BDC00' class='bi bi-circle-fill' viewBox='0 0 16 16'><circle cx='8' cy='8' r='8'/></svg></td>
                        ";
                    } elseif ($estado2 == 'Cerrado') {
                        $html .= "
                            <td><i class='bi bi-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='#FF0000' class='bi bi-circle-fill' viewBox='0 0 16 16'><circle cx='8' cy='8' r='8'/></svg></td>
                        ";
                    } elseif ($estado2 != 'Solicitado' || $estado2 != 'Cerrado') {
                        $html .= "
                            <td><i class='bi bi-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='yellow' class='bi bi-circle-fill' viewBox='0 0 16 16'><circle cx='8' cy='8' r='8'/></svg></td>
                        ";
                    }
        
                    $html .= "
                            <td>$consecutivo2</td>
                            <td>$date2</td>
                            <td>$hora2</td>
                            <td>$solicitante2</td>
                            <td>$area2</td>
                            <td>$sede</td>
                            <td>$estado2</td>
                            <td class='clm_btn_spte'>
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

            } else {
                $html .= "
                    <div class='cont_modal_not'>
                        <p>No hay registros en la tabla 'Soporte'</p>
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
                        <table class='table_form' id='myTable' border=1>
                            <thead>
                                <th>Consecutivo</th>
                                <th>Fecha</th>
                                <th>Solicitante</th>
                                <th>Area</th>
                                <th>Estado</th>
                                <th class='clm_btn_dlle'></th>
                            </thead>
                            <tbody>
                ";

                foreach ($lista_formularios_rtasD2 as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $date = $value['Fecha'];
                    $solicitante = $value['Solicitante'];
                    $area = $value['Area'];
                    $estado = $value['Estado'];

                    $html .= "
                        <tr>
                            <td>$consecutivo</td>
                            <td>$date</td>
                            <td>$solicitante</td>
                            <td>$area</td>
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

            if (!empty($lista_formularios_rtasS2)) {
                $html .= "
                <br>
                <br>
                    <div id='cont_table_spte'>
                        <h4>Soporte</h4>
                        <table class='table_form' id='myTable2' border=1>
                            <thead>
                                <th>Consecutivo</th>
                                <th>Fecha</th>
                                <th>Solicitante</th>
                                <th>Area</th>
                                <th>Sede</th>
                                <th>Estado</th>
                                <th class='clm_btn_spte'></th>
                            </thead>
                            <tbody>
                ";

                foreach ($lista_formularios_rtasS2 as $key => $value) {
                    $consecutivo2 = $value['Consecutivo'];
                    $date2 = $value['Fecha'];
                    $solicitante2 = $value['Solicitante'];
                    $area2 = $value['Area'];
                    $estado2 = $value['Estado'];
                    $sede = $value['Sede'];
        
                    $html .= "
                        <tr>
                            <td>$consecutivo2</td>
                            <td>$date2</td>
                            <td>$solicitante2</td>
                            <td>$area2</td>
                            <td>$sede</td>
                            <td>$estado2</td>
                            <td class='clm_btn_spte'>
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

            } else {
                $html .= "
                    <div class='cont_modal_not'>
                        <p>No hay registros contestados en la tabla 'Soporte'</p>
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
                        <table class='table_form' id='myTable' border=1>
                            <thead>
                                <th>Consecutivo</th>
                                <th>Fecha</th>
                                <th>Solicitante</th>
                                <th>Area</th>
                                <th>Estado</th>
                                <th class='clm_btn_dlle'></th>
                            </thead>
                            <tbody>
                ";

                foreach ($lista_formularios_rtasD3 as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $date = $value['Fecha'];
                    $solicitante = $value['Solicitante'];
                    $area = $value['Area'];
                    $estado = $value['Estado'];

                    $html .= "
                        <tr>
                            <td>$consecutivo</td>
                            <td>$date</td>
                            <td>$solicitante</td>
                            <td>$area</td>
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

            if (!empty($lista_formularios_rtasS3)) {
                $html .= "
                <br>
                <br>
                    <div id='cont_table_spte'>
                        <h4>Soporte</h4>
                        <table class='table_form' id='myTable2' border=1>
                            <thead>
                                <th>Consecutivo</th>
                                <th>Fecha</th>
                                <th>Solicitante</th>
                                <th>Area</th>
                                <th>Sede</th>
                                <th>Estado</th>
                                <th class='clm_btn_spte'></th>
                            </thead>
                            <tbody>
                ";

                foreach ($lista_formularios_rtasS3 as $key => $value) {
                    $consecutivo2 = $value['Consecutivo'];
                    $date2 = $value['Fecha'];
                    $solicitante2 = $value['Solicitante'];
                    $area2 = $value['Area'];
                    $sede = $value['Sede'];
                    $estado2 = $value['Estado'];           
        
                    $html .= "
                        <tr>
                            <td>$consecutivo2</td>
                            <td>$date2</td>
                            <td>$solicitante2</td>
                            <td>$area2</td>
                            <td>$sede</td>
                            <td>$estado2</td>
                            <td class='clm_btn_spte'>
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

            } else {
                $html .= "
                    <div class='cont_modal_not'>
                        <p>No hay registros cerrados en la tabla 'Soporte'</p>
                    </div>
                </div>
                ";
            }

        }

        //verifica si hay datos en las tablas
        if ($tUrlId == 1 && empty($lista_formularios_rtasD1) && empty($lista_formularios_rtasS1)) {
            $html = "
                <div class='cont_modal_not'>
                    <p>No hay registros</p>
                </div>
            ";
        } elseif ($tUrlId == 2 && empty($lista_formularios_rtasD2) && empty($lista_formularios_rtasS2)) {
            $html = "
                <div class='cont_modal_not'>
                    <p>No hay registros</p>
                </div>
            ";
        } elseif ($tUrlId == 3 && empty($lista_formularios_rtasD3) && empty($lista_formularios_rtasS3)) {
            $html = "
                <div class='cont_modal_not'>
                    <p>No hay registros</p>
                </div>
            ";
        }

        return $html;
    }

    public function dataTableJquery()
    {
        echo "
            <script language='JavaScript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js' integrity='sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>

            <script language='JavaScript' src='//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js'></script>

            <script language='JavaScript'>

                $(document).ready( function () {
                    $('#myTable').DataTable({
                        'language': {
                            'lengthMenu': 'Mostrar _MENU_ registros por página',
                            'search': 'Buscar: ',
                            'zeroRecords': 'Nada encontrado',
                            'info': 'Mostrando página _PAGE_ de _PAGES_',
                            'infoEmpty': 'No records available',
                            'infoFiltered': '(filtrado de _MAX_ registros totales)',
                            'paginate': {
                                'next': 'Siguiente',
                                'previous': 'Anterior'
                            }
                        }
                    });
                } );

                $(document).ready( function () {
                    $('#myTable2').DataTable({
                        'language': {
                            'lengthMenu': 'Mostrar _MENU_ registros por página',
                            'search': 'Buscar: ',
                            'zeroRecords': 'Nada encontrado',
                            'info': 'Mostrando página _PAGE_ de _PAGES_',
                            'infoEmpty': 'No records available',
                            'infoFiltered': '(filtrado de _MAX_ registros totales)',
                            'paginate': {
                                'next': 'Siguiente',
                                'previous': 'Anterior'
                            }
                        }
                    });
                } );

            </script>

        ";
    }

    public function constructor($tUrlId)
    {
        global $wpdb;

        //tabla desarrollo------------------------
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
        
        //tabla soporte------------------------------
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

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

            //admin----------------------------------------------------------------------------------------------
            //totales
            //mostrar-------------------------
            $queryRtasD1 = "SELECT * FROM $tableR1 ORDER BY RespuestaId DESC" ;
            $lista_formularios_rtasD1 = $wpdb->get_results($queryRtasD1, ARRAY_A);
            if (empty($lista_formularios_rtasD1)) {
                $lista_formularios_rtasD1 = array();
            }

            $queryRtasS1 = "SELECT * FROM $tableR2 ORDER BY RespuestaId DESC";
            $lista_formularios_rtasS1 = $wpdb->get_results($queryRtasS1, ARRAY_A);
            if (empty($lista_formularios_rtasS1)) {
                $lista_formularios_rtasS1 = array();
            }

            //count------------------
            $queryCntD1 = "SELECT * FROM $tableR1";
            $itemsCntD1 = $wpdb->get_results($queryCntD1, ARRAY_A);
            if (empty($itemsCntD1)) {
                $itemsCntD1 = array();
            }

            $queryCntS1 = "SELECT * FROM $tableR2";
            $itemsCntS1 = $wpdb->get_results($queryCntS1, ARRAY_A);
            if (empty($itemsCntS1)) {
                $itemsCntS1 = array();
            }

            $RegistrosD1 = count($itemsCntD1);
            $RegistrosS1 = count($itemsCntS1);

            $numRegistrosTot= $RegistrosD1 + $RegistrosS1;

            //contestado
            $queryRtasD2 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' ORDER BY RespuestaId DESC";
            $lista_formularios_rtasD2 = $wpdb->get_results($queryRtasD2, ARRAY_A);
            if (empty($lista_formularios_rtasD2)) {
                $lista_formularios_rtasD2 = array();
            }

            $queryRtasS2 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' ORDER BY RespuestaId DESC";
            $lista_formularios_rtasS2 = $wpdb->get_results($queryRtasS2, ARRAY_A);
            if (empty($lista_formularios_rtasS2)) {
                $lista_formularios_rtasS2 = array();
            }

            //count------------------
            $queryCntD2 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
            $itemsCntD2 = $wpdb->get_results($queryCntD2, ARRAY_A);
            if (empty($itemsCntD2)) {
                $itemsCntD2 = array();
            }

            $queryCntS2 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
            $itemsCntS2 = $wpdb->get_results($queryCntS2, ARRAY_A);
            if (empty($itemsCntS2)) {
                $itemsCntS2 = array();
            }

            $RegistrosD2 = count($itemsCntD2);
            $RegistrosS2 = count($itemsCntS2);

            $numRegistrosCon = $RegistrosD2 + $RegistrosS2;

            //cerrado
            $queryRtasD3 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado' ORDER BY RespuestaId DESC";
            $lista_formularios_rtasD3 = $wpdb->get_results($queryRtasD3, ARRAY_A);
            if (empty($lista_formularios_rtasD3)) {
                $lista_formularios_rtasD3 = array();
            }

            $queryRtasS3 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado' ORDER BY RespuestaId DESC";
            $lista_formularios_rtasS3 = $wpdb->get_results($queryRtasS3, ARRAY_A);
            if (empty($lista_formularios_rtasS3)) {
                $lista_formularios_rtasS3 = array();
            }

            //count------------------
            $queryCntD3 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado'";
            $itemsCntD3 = $wpdb->get_results($queryCntD3, ARRAY_A);
            if (empty($itemsCntD3)) {
                $itemsCntD3 = array();
            }

            $queryCntS3 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado'";
            $itemsCntS3 = $wpdb->get_results($queryCntS3, ARRAY_A);
            if (empty($itemsCntS3)) {
                $itemsCntS3 = array();
            }

            $RegistrosD3 = count($itemsCntD3);
            $RegistrosS3= count($itemsCntS3);

            $numRegistrosCe = $RegistrosD3 + $RegistrosS3;

            //html------------------------------------------------------------------------------------------
            $html = $this->head($tUrlId);

            $html .= $this->buttonsNav();

            //tabla filtro
            $html .= $this->conteoTickets($numRegistrosTot, $numRegistrosCe, $numRegistrosCon);

            //tabla respuestas
            $html .= $this->structureTickets($tUrlId, $lista_formularios_rtasD1, $lista_formularios_rtasD2, $lista_formularios_rtasD3, $lista_formularios_rtasS1, $lista_formularios_rtasS2, $lista_formularios_rtasS3);

            $html .= $this->dataTableJquery();

        } else {
            $html = "
            <div class='cont_modal_not'>
                <p>No tienes suficientes permisos para ver</p>
            </div>
            ";
        }

        return $html;
    }
}

?>