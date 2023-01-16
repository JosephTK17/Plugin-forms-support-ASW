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

    public function btnAtras()
    {
        $html = "
            <body>
                <div>
                    <a id='btn_atras' href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/crear-ticket/'><- atras</a>
                </div>
        ";

        return $html;
    }

    public function selectTable()
    {
        $html = "
        
            <form method='POST'>
                <div>
                    <button type='submit' name='Table1[]' id='btnTable1' value='1'>Desarrollo</button>
                    <button type='submit' name='Table1[]' id='btnTable2' value='2'>Soporte</button>
                </div>
            </form>
        ";

        return $html;
    }

    public function search()
    {
        $html = "
            <form method='POST'>
                <table style='margin: 0 0 0 40%;'>
                    <tbody>
                        <tr>
                            <td>
                                <input type='text' name='consecutivo[]' placeholder='Consecutivo' style='height:25px; text-align: center;'>
                            </td>
                            <td>
                                <input type='' name='fecha[]' placeholder='Fecha' style='height:25px; text-align: center;'>
                            </td>
                            <td>
                                <input type='' name='solicitante[]' placeholder='Solicitante' style='height:25px; text-align: center;'>
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

    public function TableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2)
    {
        $html = "";

        if (empty($_POST['consecutivo'][0]) && empty($_POST['solicitante'][0])) {

            //fecha
            $html .= "
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
                        <td></td>
                    </tr>
                ";
            }

            $html .= "
                    </tbody>
                </table>
            ";

            $html .= "
            <h4 style='color: #84858d; text-align: center;'>Soporte</h4>
                <table class='table_form' border=1>
                    <thead>
                        <th>Consecutivo</th>
                        <th>Fecha</th>
                        <th>Quién reporta</th>
                        <th>Área</th>
                        <th>Descripción</th>
                        <th>Sede</th>
                        <th>Estado</th>
                    </thead>
                    <tbody>
            ";

            foreach ($lista_formularios_filter2 as $key => $value) {
                $consecutivo = $value['Consecutivo'];
                $date = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area = $value['Área'];
                $descripcion = $value['Descripción'];
                $sede = $value['Sede'];
    
                $html .= "
                    <tr>
                        <td>$consecutivo</td>
                        <td>$date</td>
                        <td>$solicitante2</td>
                        <td>$area</td>
                        <td>$descripcion</td>
                        <td>$sede</td>
                        <td></td>
                    </tr>
                ";
            }

            $html .= "
                    </tbody>
                </table>
            ";

        } elseif (empty($_POST['fecha'][0]) && empty($_POST['solicitante'][0]) && $conseId[0]['FormularioId'] == 1) {

            //consecutivo
            $html .= "
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
                    </thead>
                    <tbody>
            ";
        } elseif (empty($_POST['fecha'][0]) && empty($_POST['solicitante'][0]) && $conseId2[0]['FormularioId'] == 2) {

            //consecutivo
            $html .= "
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
                    </thead>
                    <tbody>
            ";
        } elseif (empty($_POST['consecutivo'][0]) && empty($_POST['fecha'][0])) {

            //solicitante
            $html .= "
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
                        <td></td>
                    </tr>
                ";
            }

            $html .= "
                    </tbody>
                </table>
            ";

            $html .= "
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
                    </thead>
                    <tbody>
            ";

            foreach ($lista_formularios_filter2 as $key => $value) {
                $consecutivo = $value['Consecutivo'];
                $date = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area = $value['Área'];
                $descripcion = $value['Descripción'];
                $sede = $value['Sede'];
    
                $html .= "
                    <tr>
                        <td>$consecutivo</td>
                        <td>$date</td>
                        <td>$solicitante2</td>
                        <td>$area</td>
                        <td>$descripcion</td>
                        <td>$sede</td>
                        <td></td>
                    </tr>
                ";
            }

            $html .= "
                    </tbody>
                </table>
            ";

        }

        return $html;
    }

    public function oneTableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2)
    {
        $html = "";

        //datos consecutivo
        if (empty($_POST['fecha'][0]) && empty($_POST['solicitante'][0]) && $conseId[0]['FormularioId'] == 1) {
            foreach ($lista_formularios_filter as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $date = $value['Fecha'];
                    $solicitante = $value['Solicitante'];
                    $area = $value['Área'];
                    $solicitud = $value['Solicitud'];
                    $paraQue = $value['Para qué'];
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
                        <td></td>
                    </tr>
                ";
            }
        } elseif (empty($_POST['fecha'][0]) && empty($_POST['solicitante'][0]) && $conseId2[0]['FormularioId'] == 2) {
            foreach ($lista_formularios_filter2 as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $date = $value['Fecha'];
                    $solicitante = $value['Solicitante'];
                    $area = $value['Área'];
                    $descripcion = $value['Descripción'];
                    $sede = $value['Sede'];

                $html .= "
                    <tr>
                        <td>$consecutivo</td>
                        <td>$date</td>
                        <td>$solicitante</td>
                        <td>$area</td>
                        <td>$descripcion</td>
                        <td>$sede</td>
                        <td></td>
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
        ";

        return $html;
    }

    public function tableRtas($id)
    {
        if ($id == 1) {
            $html = "
                <h4>Desarrollo</h4>
                    <table class='table_form' border=1>
                        <thead>
                            <th>Consecutivo</th>
                            <th>Fecha</th>
                            <th>Solicitante</th>
                            <th>Area</th>
                            <th>Solicitud</th>
                            <th>Para qué</th>
                            <th>Criterios</th>
                        </thead>
                        <tbody>
            ";
        } elseif ($id == 2) {
            $html = "
                <h4>Soporte</h4>
                    <table class='table_form' border=1>
                        <thead>
                            <th>Consecutivo</th>
                            <th>Fecha</th>
                            <th>Solicitante</th>
                            <th>Área</th>
                            <th>Descripción</th>
                            <th>Sede</th>
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
                    </tr>
                ";
            }
        } elseif ($id == 2) {
            foreach ($lista_formularios2 as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $date = $value['Fecha'];
                    $solicitante2 = $value['Solicitante'];
                    $area = $value['Área'];
                    $descripcion = $value['Descripción'];
                    $sede = $value['Sede'];

                $html .= "
                    <tr>
                        <td>$consecutivo</td>
                        <td>$date</td>
                        <td>$solicitante2</td>
                        <td>$area</td>
                        <td>$descripcion</td>
                        <td>$sede</td>
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
        ";

        return $html;
    }

    public function modalAlert()
    {
        $html = "
            <div class='container-modal-govco' id='modal_advertencia' style='display: none'>
                <div class='modal-container-govco' id='exampleModalAdvertencia' tabindex='-1' data-bs-backdrop='false' data-bs-keyboard='false' aria-labelledby='exampleModalAdvertencia' aria-hidden='true' aria-hidden='true' role='dialog'>
                <div class='modal-dialog modal-dialog-govco'>
                    <div class='modal-content modal-content-govco'>
                    <div class='modal-header modal-header-govco modal-header-alerts-govco'>
                        <button type='button' disabled class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body modal-body-govco center-elements-govco'>
                        <div class='modal-icon'>
                        <span class='modal-icon-govco modal-warning-icon'></span>
                        </div>
                        <h3 class='modal-title-govco warning-govco'>Título de la alerta</h3>
                        <p class='modal-text-govco modal-text-center-govco'>Información de detalle al cierre de la acción</p>
                    </div>
                    <div class='modal-footer-govco modal-footer-alerts-govco'>
                        <div class='modal-buttons-govco'>
                        <button type='button' class='btn btn-primary btn-modal-govco'>Botón</button>
                        <button type='button' class='btn btn-primary btn-modal-govco btn-contorno'>Botón</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </body> 
        ";

        return $html;
    }

    public function showFilter()
    {
        echo "
            <script language='JavaScript'>
                var filter = document.f1.type[document.f1.type.selectedIndex]. value;;
            </script>
        ";
    }

    public function constructor($FormularioId, $consecutivo, $fecha, $solicitante)
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

        //----------------------------

        if(empty($_POST['fecha'][0]) && empty($_POST['solicitante'][0])){

            $queryData = "SELECT * FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
            $queryData2 = "SELECT * FROM $tableR2 WHERE Consecutivo = '$consecutivo'"; 

            //idForm
            $queryId = "SELECT FormularioId FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
            $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Consecutivo = '$consecutivo'";

        } elseif (empty($_POST['consecutivo'][0]) && empty($_POST['solicitante'][0])) {

            $queryData = "SELECT * FROM $tableR1 WHERE Fecha = '$fecha'";
            $queryData2 = "SELECT * FROM $tableR2 WHERE Fecha = '$fecha'";

            //idForm
            $queryId = "SELECT FormularioId FROM $tableR1 WHERE Fecha = '$fecha'";
            $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Fecha = '$fecha'";
            
        } elseif (empty($_POST['consecutivo'][0]) && empty($_POST['fecha'][0])) {

            $queryData = "SELECT * FROM $tableR1 WHERE Solicitante = '$solicitante'"; 
            $queryData2 = "SELECT * FROM $tableR2 WHERE Solicitante = '$solicitante'";

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

        $html = $this->head();

        $html .= $this->btnAtras();
        $html .= $this->selectTable();

        //tabla filtro
        $html .= $this->search();
        $html .= $this->TableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2);
        $html .= $this->oneTableSearch($conseId, $conseId2, $lista_formularios_filter, $lista_formularios_filter2);
        $html .= $this->closeTableSearch();

        //tabla respuestas
        $html .= $this->tableRtas($formId);
        $html .= $this->dataTable($formId, $lista_formularios_rtas, $lista_formularios_rtas2);
        $html .= $this->endTable();

        $html .= $this->modalalert();

        var_dump($conseId[0]['FormularioId']);
        var_dump($conseId2[0]['FormularioId']);

        return $html;
    }
}

?>