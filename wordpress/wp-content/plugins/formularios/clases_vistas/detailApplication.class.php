<?php

class detailApplication {

    public function head()
    {
        $html = "
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <style>

                     #cont_btns_nav{
                        height: 30px;
                        background-color: #4f6df5;
                        padding: 20px;
                    }

                    .cont_single{
                        background-color: #304293;
                        border-radius: 3px;
                        width: 150px;
                        display: inline-block;
                    }

                    .btn_nav{
                        text-align: center;
                    }

                    .btn_nav a {
                        text-decoration: none;
                        color: white;
                    }

                    .cont_detail{
                        margin-top: 50px;
                    }

                    .campos label{
                        display: inline-block;
                        font-weight: 500;
                    }

                    .campos p{
                        display: inline-block;
                    }

                    #solicitud p{
                        display: block;
                    }

                    #para p{
                        display: block;
                    }

                    #criterios p{
                        display: block;
                    }

                    #descripcion p{
                        display: block;
                    }

                </style>
            </head>
        ";
        
        return $html;
    }

    public function buttonsNav()
    {
        $html = "";

        $html .= "
            <body>
                <div id='cont_btns_nav'>
                    <div class='cont_single' id='index'>
                        <div class='btn_nav'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/crear-ticket/'>Principal</a>
                        </div>
                    </div>
                    <div class='cont_single' id='create'>
                        <div class='btn_nav'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                        </div>
                    </div>
        ";

        if (is_super_admin()) {
            $html .= "
                    <div class='cont_single' id='admin'>
                        <div class='btn_nav'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/'>Ver Tickets</a>
                        </div>
                    </div>
            ";
        } else {
            $html .= "
                    <div class='cont_single' id='user'>
                        <div class='btn_nav'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/'>Mis Tickets</a>
                        </div>
                    </div>
                </div>
            ";
        }

        return $html;
    }

    public function showDetails($id, $id2, $lista_formularios, $lista_formularios2)
    {

        $html = "";

        if ($id[0]['FormularioId']  == 1) {

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
                        <div class='cont_detail'>
                            <div class='campos' id='consecutivo'>
                                <label>Consecutivo:</label>
                                <p>$consecutivo</p>
                            </div>
                            <div class='campos' id='fecha'>
                                <label>Fecha solicitud:</label>
                                <p>$date</p>
                            </div>
                            <div class='campos' id='solicitante'>
                                <label>Solicitante:</label>
                                <p>$solicitante</p>
                            </div>
                            <div class='campos' id='area'>
                                <label>Área:</label>
                                <p>$area</p>
                            </div>
                            <div class='campos' id='solicitud'>
                                <label>Solicitud:</label>
                                <p>$solicitud</p>
                            </div>
                            <div class='campos' id='para'>
                                <label>Para qué:</label>
                                <p>$paraQue</p>
                            </div>
                            <div class='campos' id='criterios'>
                                <label>Criterios de aceptacion:</label>
                                <p>$criterios</p>
                            </div>
                            <div class='campos' id='estado'>
                                <label>Estado:</label>
                                <p>$estado</p>
                    ";

                    if (is_super_admin()) {
                        $html .= "
                                <form method='POST'>
                                    <select name='select_status'>
                                        <option value=''>Selecciona un estado</option>
                                        <option>En revisión de detalles</option>
                                        <option>En proceso</option>
                                        <option>Terminado</option>
                                        <option>En pruebas</option>
                                        <option>Publicado</option>
                                    </select>
                                    <button type='submit' name='update[]'>Actualizar</button>
                                </form>
                        ";
                    }
                    
                    $html .= "
                            </div>
                        </div>
                    </body>
                    ";
            }
        } elseif ($id2[0]['FormularioId'] == 2) {

            foreach ($lista_formularios2 as $key => $value) {
                $consecutivo2 = $value['Consecutivo'];
                $date2 = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area = $value['Área'];
                $descripcion = $value['Descripción'];
                $estado2 = $value['Estado'];
                $sede = $value['Sede'];

                $html .= "
                    <div class='cont_detail'>
                        <div class='campos' id='consecutivo'>
                            <label>Consecutivo:</label>
                            <p>$consecutivo2</p>
                        </div>
                        <div class='campos' id='fecha'>
                            <label>Fecha solicitud:</label>
                            <p>$date2</p>
                        </div
                        <div class='campos' id='solicitante'>
                            <label>Solicitante:</label>
                            <p>$solicitante2</p>
                        </div>
                        <div class='campos' id='area'>
                            <label>Área:</label>
                            <p>$area</p>
                        </div>
                        <div class='campos' id='descripcion'>
                            <label>Descripción:</label>
                            <p>$descripcion</p>
                        </div>
                        <div class='campos' id='sede'>
                            <label>Sede:</label>
                            <p>$sede</p>
                        </div>
                        <div class='campos' id='estado'>
                            <label>Estado:</label>
                            <p>$estado2</p>
                ";

                if (is_super_admin()) {
                    $html .= "
                            <form method='POST'>
                                <select name='select_status' required>
                                    <option value=''>Selecciona un estado</option>
                                    <option>En revisión de detalles</option>
                                    <option>En revisión</option>
                                    <option>Respuesto/cambio solicitdo a compras</option>
                                    <option>Terminado</option>
                                </select>
                                <button type='submit' name='update[]'>Actualizar</button>
                            </form>
                    ";
                }
                
                $html .= "
                        </div>
                    </div>
                </body>
                ";
            }
        }

        return $html;
    }

    public function constructor($consecutivo)
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

        //actualizar
        if (isset($_POST['update'])) {

            $estadoUpd = $_POST['select_status'];
            
            if ($id[0]['FormularioId'] == 1) {
                $infoUpd = array(
                    'Estado' => $estadoUpd
                );
                $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

                header("Location: http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo");

            } elseif ($id2[0]['FormularioId'] == 2){
                $infoUpd = array(
                    'Estado' => $estadoUpd
                );
                $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivo));

                header("Location: http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo");
            }
        }

        $html = $this->head();

        $html .= $this->buttonsNav();
        $html .= $this->showDetails($id, $id2, $lista_formularios, $lista_formularios2);

        return $html;
    }
}

?>