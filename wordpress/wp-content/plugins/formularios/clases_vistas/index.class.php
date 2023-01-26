<?php

class index{

    public function head()
    {
        $html = "
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <style>

                    #cont_btns{
                        height: 50px;
                        background-color: #4f6df5;
                        padding: 8px;
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
                    }

                    #user a{
                        padding: 10px 30px 10px 30px;
                    }

                    .btn_nav{
                        display: inline-block;
                        margin-top: 11px;
                        text-align: center;
                    }

                    #index a{
                        box-shadow: 0px 0px 10px black;
                        background-color: gray;
                    }

                    .btn_nav a {
                        background-color: #304293;
                        border-radius: 3px;
                        text-decoration: none;
                        color: white;
                    }

                    .btn_num_tick {
                        display: inline-block;
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
                <div id='cont_btns'>
                    <div class='btn_nav' id='index'>
                        <a href='#/'>Principal</a>
                    </div>
                    <div class='btn_nav' id='create'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                    </div>
        ";

        if (is_super_admin()) {

            $html .= "
                    <div class='btn_nav' id='admin'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets'>Ver Tickets</a>
                    </div>
                </div>
            ";
        } else {

            $html .= "
                    <div class='btn_nav' id='user'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/'>Mis Tickets</a>
                    </div>
                </div>
            ";
        }

        return $html;
    }

    public function conteoTickets($numRegistrosAb, $numRegistrosCe, $numRegistrosCon, $numRegistrosTot, $numRegistrosAb2, $numRegistrosCe2, $numRegistrosCon2, $numRegistrosTot2)
    {
        $html = "";

        if (is_super_admin()) {
            $html .= "
                    <div class='cont_num_tickest'>
                        <div class='btn_num_tick'>
                            <button type='button' id='abiertos'>Abiertos ($numRegistrosAb)</button>
                        </div>
                        <div class='btn_num_tick'>
                            <button type='button' id='cerrados'>Cerrados ($numRegistrosCe)</button>
                        </div>
                        <div class='btn_num_tick'>
                            <button type='button' id='contestados'>Contestado ($numRegistrosCon)</button>
                        </div>
                        <div class='btn_num_tick'>
                            <button type='button' id='totales'>Totales ($numRegistrosTot)</button>
                        </div>
                    </div>
                </body>
            ";
        } else {
            $html .= "
                    <div class='cont_num_tickest'>
                        <div class='btn_num_tick'>
                            <button type='button' id='abiertos'>Abiertos ($numRegistrosAb2)</button>
                        </div>
                        <div class='btn_num_tick'>
                            <button type='button' id='cerrados'>Cerrados ($numRegistrosCe2)</button>
                        </div>
                        <div class='btn_num_tick'>
                            <button type='button' id='contestados'>Contestado ($numRegistrosCon2)</button>
                        </div>
                        <div class='btn_num_tick'>
                            <button type='button' id='totales'>Totales ($numRegistrosTot2)</button>
                        </div>
                    </div>
                </body>
            ";
        }
        

        return $html;
    }

    public function tickets()
    {
        # code...
    }

    public function include()
    {
        global $wpdb;

        //getUser
        $user = get_current_user_id();

        if ($user != 0) {
            
            $userInfo = get_userdata($user);
            $userName = $userInfo->first_name;

            if (empty($userName)) {
                $userName = $userInfo->user_login;
            }
        }

        var_dump($userName);

        //admin----------------------------------------------------------------------------------------------
        //tabla desarrollo------------------------
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
        //tabla soporte------------------------------
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

        if (is_super_admin()) {
            //abierto
            $queryRtasD1 = "SELECT * FROM $tableR1 WHERE Estado != 'Cerrado'";
            $lista_formularios_rtasD1 = $wpdb->get_results($queryRtasD1, ARRAY_A);
            if (empty($lista_formularios_rtasD1)) {
                $lista_formularios_rtasD1 = array();
            }

            $queryRtasS1 = "SELECT * FROM $tableR2 WHERE Estado != 'Cerrado'";
            $lista_formularios_rtasS1 = $wpdb->get_results($queryRtasS1, ARRAY_A);
            if (empty($lista_formularios_rtasS1)) {
                $lista_formularios_rtasS1 = array();
            }

            $RegistrosD1 = count($lista_formularios_rtasD1);
            $RegistrosS1 = count($lista_formularios_rtasS1);

            $numRegistrosAb = $RegistrosD1 + $RegistrosS1;

            //cerrado
            $queryRtasD2 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado'";
            $lista_formularios_rtasD2 = $wpdb->get_results($queryRtasD2, ARRAY_A);
            if (empty($lista_formularios_rtasD2)) {
                $lista_formularios_rtasD2 = array();
            }

            $queryRtasS2 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado'";
            $lista_formularios_rtasS2 = $wpdb->get_results($queryRtasS2, ARRAY_A);
            if (empty($lista_formularios_rtasS2)) {
                $lista_formularios_rtasS2 = array();
            }

            $RegistrosD2 = count($lista_formularios_rtasD2);
            $RegistrosS2= count($lista_formularios_rtasS2);

            $numRegistrosCe = $RegistrosD2 + $RegistrosS2;

            //contestado
            $queryRtasD3 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
            $lista_formularios_rtasD3 = $wpdb->get_results($queryRtasD3, ARRAY_A);
            if (empty($lista_formularios_rtasD3)) {
                $lista_formularios_rtasD3 = array();
            }

            $queryRtasS3 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
            $lista_formularios_rtasS3 = $wpdb->get_results($queryRtasS3, ARRAY_A);
            if (empty($lista_formularios_rtasS3)) {
                $lista_formularios_rtasS3 = array();
            }

            $RegistrosD3 = count($lista_formularios_rtasD3);
            $RegistrosS3 = count($lista_formularios_rtasS3);

            $numRegistrosCon = $RegistrosD3 + $RegistrosS3;

            //total
            $queryRtasD4 = "SELECT * FROM $tableR1";
            $lista_formularios_rtasD4 = $wpdb->get_results($queryRtasD4, ARRAY_A);
            if (empty($lista_formularios_rtasD4)) {
                $lista_formularios_rtasD4 = array();
            }

            $queryRtasS4 = "SELECT * FROM $tableR2";
            $lista_formularios_rtasS4 = $wpdb->get_results($queryRtasS4, ARRAY_A);
            if (empty($lista_formularios_rtasS4)) {
                $lista_formularios_rtasS4 = array();
            }

            $RegistrosD4 = count($lista_formularios_rtasD4);
            $RegistrosS4 = count($lista_formularios_rtasS4);

            $numRegistrosTot= $RegistrosD4 + $RegistrosS4;
        } else {
            //user-----------------------------------------------------------------------------------------------------
            //abierto
            $queryRtasD1 = "SELECT * FROM $tableR1 WHERE Estado != 'Cerrado' AND Solicitante = '$userName'";
            $lista_formularios_rtasD1 = $wpdb->get_results($queryRtasD1, ARRAY_A);
            if (empty($lista_formularios_rtasD1)) {
                $lista_formularios_rtasD1 = array();
            }

            $queryRtasS1 = "SELECT * FROM $tableR2 WHERE Estado != 'Cerrado' AND Solicitante = '$userName'";
            $lista_formularios_rtasS1 = $wpdb->get_results($queryRtasS1, ARRAY_A);
            if (empty($lista_formularios_rtasS1)) {
                $lista_formularios_rtasS1 = array();
            }

            $RegistrosD1 = count($lista_formularios_rtasD1);
            $RegistrosS1 = count($lista_formularios_rtasS1);

            $numRegistrosAb2 = $RegistrosD1 + $RegistrosS1;

            //cerrado
            $queryRtasD2 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado' AND Solicitante = '$userName'";
            $lista_formularios_rtasD2 = $wpdb->get_results($queryRtasD2, ARRAY_A);
            if (empty($lista_formularios_rtasD2)) {
                $lista_formularios_rtasD2 = array();
            }

            $queryRtasS2 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado' AND Solicitante = '$userName'";
            $lista_formularios_rtasS2 = $wpdb->get_results($queryRtasS2, ARRAY_A);
            if (empty($lista_formularios_rtasS2)) {
                $lista_formularios_rtasS2 = array();
            }

            $RegistrosD2 = count($lista_formularios_rtasD2);
            $RegistrosS2= count($lista_formularios_rtasS2);

            $numRegistrosCe2 = $RegistrosD2 + $RegistrosS2;

            //contestado
            $queryRtasD3 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = '$userName'";
            $lista_formularios_rtasD3 = $wpdb->get_results($queryRtasD3, ARRAY_A);
            if (empty($lista_formularios_rtasD3)) {
                $lista_formularios_rtasD3 = array();
            }

            $queryRtasS3 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = '$userName'";
            $lista_formularios_rtasS3 = $wpdb->get_results($queryRtasS3, ARRAY_A);
            if (empty($lista_formularios_rtasS3)) {
                $lista_formularios_rtasS3 = array();
            }

            $RegistrosD3 = count($lista_formularios_rtasD3);
            $RegistrosS3 = count($lista_formularios_rtasS3);

            $numRegistrosCon2 = $RegistrosD3 + $RegistrosS3;

            //total
            $queryRtasD4 = "SELECT * FROM $tableR1 AND Solicitante = '$userName'";
            $lista_formularios_rtasD4 = $wpdb->get_results($queryRtasD4, ARRAY_A);
            if (empty($lista_formularios_rtasD4)) {
                $lista_formularios_rtasD4 = array();
            }

            $queryRtasS4 = "SELECT * FROM $tableR2 AND Solicitante = '$userName'";
            $lista_formularios_rtasS4 = $wpdb->get_results($queryRtasS4, ARRAY_A);
            if (empty($lista_formularios_rtasS4)) {
                $lista_formularios_rtasS4 = array();
            }

            $RegistrosD4 = count($lista_formularios_rtasD4);
            $RegistrosS4 = count($lista_formularios_rtasS4);

            $numRegistrosTot2 = $RegistrosD4 + $RegistrosS4;
        }

        $html = $this->head();

        $html .= $this->buttonsNav();
        $html .= $this->conteoTickets($numRegistrosAb, $numRegistrosCe, $numRegistrosCon, $numRegistrosTot, $numRegistrosAb2, $numRegistrosCe2, $numRegistrosCon2, $numRegistrosTot2);

        return $html;
    }
}

?>