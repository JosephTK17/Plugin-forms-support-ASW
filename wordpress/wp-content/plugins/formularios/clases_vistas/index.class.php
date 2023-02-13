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
                        width: 100%;
                        background-color: #4f6df5;
                        padding: 8px;
                        text-align: center;
                    }

                    #index a:hover{
                        background-color: #6F6F6F;
                        transition: background-color 0.5s;
                    }

                    #index a{
                        padding: 10px 37px 10px 37px;
                        background-color: gray;
                    }

                    #create{
                        margin: 0 15% 0 15%;
                    }

                    #create a{
                        padding: 10px 22px 10px 22px;
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
                        <div class='btn_num_tick' id='abiertos'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1'>Abiertos ($numRegistrosAb)</a>
                        </div>
                        <div class='btn_num_tick' id='cerrados'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/'>Cerrados ($numRegistrosCe)</a>
                        </div>
                        <div class='btn_num_tick' id='contestados'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/'>Contestado ($numRegistrosCon)</a>
                        </div>
                        <div class='btn_num_tick' id='totales'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/'>Totales ($numRegistrosTot)</a>
                        </div>
                    </div>
                </body>
            ";
        } else {
            $html .= "
                    <div class='cont_num_tickest'>
                        <div class='btn_num_tick' id='abiertos'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlIdUc=1'>Abiertos ($numRegistrosAb2)</a>
                        </div>
                        <div class='btn_num_tick' id='cerrados'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlIdUc=2'>Cerrados ($numRegistrosCe2)</a>
                        </div>
                        <div class='btn_num_tick' id='contestados'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlIdUc=3'>Contestado ($numRegistrosCon2)</a>
                        </div>
                        <div class='btn_num_tick' id='totales'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlIdUc=4'>Totales ($numRegistrosTot2)</a>
                        </div>
                    </div>
                </body>
            ";
        }
        

        return $html;
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
            $queryRtasD4 = "SELECT * FROM $tableR1 WHERE Solicitante = '$userName'";
            $lista_formularios_rtasD4 = $wpdb->get_results($queryRtasD4, ARRAY_A);
            if (empty($lista_formularios_rtasD4)) {
                $lista_formularios_rtasD4 = array();
            }

            $queryRtasS4 = "SELECT * FROM $tableR2 WHERE Solicitante = '$userName'";
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