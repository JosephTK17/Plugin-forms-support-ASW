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
                        margin-right: 108px;
                    }

                    #create a{
                        padding: 10px 22px 10px 22px;
                        margin-right: 108px;
                    }

                    #admin a{
                        padding: 10px 30px 10px 30px;
                        box-shadow: 0px 0px 10px black;
                        background-color: gray;
                    }

                    #user a{
                        padding: 10px 30px 10px 30px;
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

                    #cont_table_dllo h4{
                        color: #84858d;
                        text-align: center;
                    }

                    .table_form{
                        border-collapse: collapse;
                    }

                    .table_form thead th{
                        background-color: gray; 
                        color: white;
                        border-right-color: white;
                    }

                    #cont_table_spte h4{
                        color: #84858d;
                        text-align: center;
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
            <div id='cont_btns_tables'>
                <form method='POST'>
                    <div id='cont_btn_rtas'>
                        <button type='submit' name='Table1[]' id='btnTable1' value='1'><strong>Desarrollo</strong></button>
                        <button type='submit' name='Table1[]' id='btnTable2' value='2'><strong>Soporte</strong></button>
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
                ";
            } elseif ($conseId[0]['FormularioId'] == 1) {

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
            } elseif ($conseId2[0]['FormularioId'] == 2) {

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
                ";
            }

        } elseif (!empty($_POST['consecutivo'][0]) && $conseId[0]['FormularioId'] == 1) {

            //consecutivo
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
        } elseif (!empty($_POST['consecutivo'][0]) && $conseId2[0]['FormularioId'] == 2) {

            //consecutivo
            $html .= "
                <div id='cont_table_spte'>
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
                    <div id='cont_table_spte'>
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
                ";
            } elseif ($conseId[0]['FormularioId'] == 1) {
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
            } elseif ($conseId2[0]['FormularioId'] == 2) {
                $html .= "
                    <div id='cont_table_spte'>
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
                ";
            }
            
        } elseif (!empty($_POST['consecutivo'][0]) && empty($_POST['fecha'][0]) && empty($_POST['solicitante'][0])) {

            $html .= "
                <div>
                    <h1>Lo senimos, no hemos encontrado tu ticket</h1>
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
        }

        return $html;
    }

    public function closeTableSearch()
    {
        $html = "
                </tbody>
            </table>
        </div>
        ";

        return $html;
    }

    public function tableRtas($id)
    {
        if ($id == 1) {
            $html = "
            <div id='cont_table_rtas'>
                <h4>Desarrollo</h4>
                    <table class='table_rtas' border=1>
                        <thead>
                            <th>Consecutivo</th>
                            <th>Fecha</th>
                            <th>Solicitante</th>
                            <th>Area</th>
                            <th>Solicitud</th>
                            <th>Para qué</th>
                            <th>Criterios</th>
                            <th>Estado</th>
                            <th></th>
                        </thead>
                        <tbody>
            ";
        } elseif ($id == 2) {
            $html = "
            <div id='cont_table_rtas'>
                <h4>Soporte</h4>
                    <table class='table_rtas' border=1>
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

    public function dataTable( $id, $lista_formularios, $lista_formularios2)
    {
        $html = "";
        if ($id == 1) {
            foreach ($lista_formularios as $key => $value) {
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
        } elseif ($id == 2) {
            foreach ($lista_formularios2 as $key => $value) {
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
        }
        return $html;
    }

    public function endTable()
    {
        $html= "        
                    </tbody>
                </table>
            </div>
        </body>
        ";

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

    public function constructor($FormularioId, $consecutivo, $fecha, $solicitante)
    {
        global $wpdb;

        //tabla desarrollo------------------------
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";

        $queryRtas = "SELECT * FROM $tableR1 ORDER BY FormularioId ASC";
        $lista_formularios_rtas = $wpdb->get_results($queryRtas, ARRAY_A);
        if (empty($lista_formularios_rtas)) {
            $lista_formularios_rtas = array();
        }
        

        //tabla soporte------------------------------
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

        $queryRtas2 = "SELECT * FROM $tableR2 ORDER BY FormularioId ASC";
        $lista_formularios_rtas2 = $wpdb->get_results($queryRtas2, ARRAY_A);
        if (empty($lista_formularios_rtas2)) {
            $lista_formularios_rtas2 = array();
        }

        //----------------------------

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

        $form = $this->getForms($FormularioId);
        $formId = $form['FormularioId'];

        if (is_super_admin()) {

            $html = $this->head();

            $html .= $this->buttonsNav();

            //tabla filtro
            $html .= $this->search();
            $html .= $this->TableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2);
            $html .= $this->oneTableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2);
            $html .= $this->closeTableSearch();

            //tabla respuestas
            $html .= $this->tableRtas($formId);
            $html .= $this->dataTable($formId, $lista_formularios_rtas, $lista_formularios_rtas2);
            $html .= $this->endTable();

            $html .= $this->moreFilters();
        } else {
            $html = "
                <h1>No tienes suficientes permisos para ver</h1>
            ";
        }

        return $html;
    }
}

?>