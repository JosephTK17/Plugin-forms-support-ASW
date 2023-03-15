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

                    #general_cont{
                        margin: auto;
                        position: relative;
                        border: solid 1px;
                        padding: 30px 40px;
                        width: 70%;
                    }

                    #cont_btns{
                        height: 250px;
                        padding: 8px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    .btns_nav ul{
                        text-align: center;
                        padding: 0;
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
                        min-height: 220px;
                        min-width: 220px;
                        padding: 15px 15px;
                        font-weight: 700;
                    }

                    .btns_nav ul li a:hover{
                        background-color: #233170;
                        transition: background 0.5s;
                    }

                    .btns_nav ul li a svg{
                        display: block;
                        margin: auto;
                        padding: 35px 0 15px 0;
                    }

                    .btns_nav ul li a svg:hover{
                        height: 120px;
                        width: 120px;
                        transition: height 0.5s;
                        transition: width 0.5s
                    }

                    #create {
                        margin: 0 50px 0 0;
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
            </div>
            <div id='general_cont'>
                <div id='cont_btns'>
                    <div class='btns_nav'>
                        <ul>
                            <li id='create'>
                                <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'><i class='bi bi-card-text'></i><svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='currentColor' class='bi bi-card-text' viewBox='0 0 16 16'><path d='M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z'/><path d='M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z'/></svg>Enviar Ticket</a>
                            </li>
        ";

        if (is_super_admin()) {

            $html .= "
                            <li id='admin'>
                                <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1'><i class='bi bi-files'></i><svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='currentColor' class='bi bi-files' viewBox='0 0 16 16'><path d='M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z'/></svg>Ver Tickets</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            ";
        } else {

            $html .= "
                            <li id='user'>
                                <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlIdUc=1'><i class='bi bi-files'></i><svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='currentColor' class='bi bi-files' viewBox='0 0 16 16'><path d='M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z'/></svg>Mis Tickets</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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

        // if (is_super_admin()) {
        //     //abierto
        //     $queryRtasD1 = "SELECT * FROM $tableR1 WHERE Estado != 'Cerrado'";
        //     $lista_formularios_rtasD1 = $wpdb->get_results($queryRtasD1, ARRAY_A);
        //     if (empty($lista_formularios_rtasD1)) {
        //         $lista_formularios_rtasD1 = array();
        //     }

        //     $queryRtasS1 = "SELECT * FROM $tableR2 WHERE Estado != 'Cerrado'";
        //     $lista_formularios_rtasS1 = $wpdb->get_results($queryRtasS1, ARRAY_A);
        //     if (empty($lista_formularios_rtasS1)) {
        //         $lista_formularios_rtasS1 = array();
        //     }

        //     $RegistrosD1 = count($lista_formularios_rtasD1);
        //     $RegistrosS1 = count($lista_formularios_rtasS1);

        //     $numRegistrosAb = $RegistrosD1 + $RegistrosS1;

        //     //cerrado
        //     $queryRtasD2 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado'";
        //     $lista_formularios_rtasD2 = $wpdb->get_results($queryRtasD2, ARRAY_A);
        //     if (empty($lista_formularios_rtasD2)) {
        //         $lista_formularios_rtasD2 = array();
        //     }

        //     $queryRtasS2 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado'";
        //     $lista_formularios_rtasS2 = $wpdb->get_results($queryRtasS2, ARRAY_A);
        //     if (empty($lista_formularios_rtasS2)) {
        //         $lista_formularios_rtasS2 = array();
        //     }

        //     $RegistrosD2 = count($lista_formularios_rtasD2);
        //     $RegistrosS2= count($lista_formularios_rtasS2);

        //     $numRegistrosCe = $RegistrosD2 + $RegistrosS2;

        //     //contestado
        //     $queryRtasD3 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
        //     $lista_formularios_rtasD3 = $wpdb->get_results($queryRtasD3, ARRAY_A);
        //     if (empty($lista_formularios_rtasD3)) {
        //         $lista_formularios_rtasD3 = array();
        //     }

        //     $queryRtasS3 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado'";
        //     $lista_formularios_rtasS3 = $wpdb->get_results($queryRtasS3, ARRAY_A);
        //     if (empty($lista_formularios_rtasS3)) {
        //         $lista_formularios_rtasS3 = array();
        //     }

        //     $RegistrosD3 = count($lista_formularios_rtasD3);
        //     $RegistrosS3 = count($lista_formularios_rtasS3);

        //     $numRegistrosCon = $RegistrosD3 + $RegistrosS3;

        //     //total
        //     $queryRtasD4 = "SELECT * FROM $tableR1";
        //     $lista_formularios_rtasD4 = $wpdb->get_results($queryRtasD4, ARRAY_A);
        //     if (empty($lista_formularios_rtasD4)) {
        //         $lista_formularios_rtasD4 = array();
        //     }

        //     $queryRtasS4 = "SELECT * FROM $tableR2";
        //     $lista_formularios_rtasS4 = $wpdb->get_results($queryRtasS4, ARRAY_A);
        //     if (empty($lista_formularios_rtasS4)) {
        //         $lista_formularios_rtasS4 = array();
        //     }

        //     $RegistrosD4 = count($lista_formularios_rtasD4);
        //     $RegistrosS4 = count($lista_formularios_rtasS4);

        //     $numRegistrosTot= $RegistrosD4 + $RegistrosS4;
        // } else {
        //     //user-----------------------------------------------------------------------------------------------------
        //     //abierto
        //     $queryRtasD1 = "SELECT * FROM $tableR1 WHERE Estado != 'Cerrado' AND Solicitante = '$userName'";
        //     $lista_formularios_rtasD1 = $wpdb->get_results($queryRtasD1, ARRAY_A);
        //     if (empty($lista_formularios_rtasD1)) {
        //         $lista_formularios_rtasD1 = array();
        //     }

        //     $queryRtasS1 = "SELECT * FROM $tableR2 WHERE Estado != 'Cerrado' AND Solicitante = '$userName'";
        //     $lista_formularios_rtasS1 = $wpdb->get_results($queryRtasS1, ARRAY_A);
        //     if (empty($lista_formularios_rtasS1)) {
        //         $lista_formularios_rtasS1 = array();
        //     }

        //     $RegistrosD1 = count($lista_formularios_rtasD1);
        //     $RegistrosS1 = count($lista_formularios_rtasS1);

        //     $numRegistrosAb2 = $RegistrosD1 + $RegistrosS1;

        //     //cerrado
        //     $queryRtasD2 = "SELECT * FROM $tableR1 WHERE Estado = 'Cerrado' AND Solicitante = '$userName'";
        //     $lista_formularios_rtasD2 = $wpdb->get_results($queryRtasD2, ARRAY_A);
        //     if (empty($lista_formularios_rtasD2)) {
        //         $lista_formularios_rtasD2 = array();
        //     }

        //     $queryRtasS2 = "SELECT * FROM $tableR2 WHERE Estado = 'Cerrado' AND Solicitante = '$userName'";
        //     $lista_formularios_rtasS2 = $wpdb->get_results($queryRtasS2, ARRAY_A);
        //     if (empty($lista_formularios_rtasS2)) {
        //         $lista_formularios_rtasS2 = array();
        //     }

        //     $RegistrosD2 = count($lista_formularios_rtasD2);
        //     $RegistrosS2= count($lista_formularios_rtasS2);

        //     $numRegistrosCe2 = $RegistrosD2 + $RegistrosS2;

        //     //contestado
        //     $queryRtasD3 = "SELECT * FROM $tableR1 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = '$userName'";
        //     $lista_formularios_rtasD3 = $wpdb->get_results($queryRtasD3, ARRAY_A);
        //     if (empty($lista_formularios_rtasD3)) {
        //         $lista_formularios_rtasD3 = array();
        //     }

        //     $queryRtasS3 = "SELECT * FROM $tableR2 WHERE Estado != 'Solicitado' AND Estado != 'Cerrado' AND Solicitante = '$userName'";
        //     $lista_formularios_rtasS3 = $wpdb->get_results($queryRtasS3, ARRAY_A);
        //     if (empty($lista_formularios_rtasS3)) {
        //         $lista_formularios_rtasS3 = array();
        //     }

        //     $RegistrosD3 = count($lista_formularios_rtasD3);
        //     $RegistrosS3 = count($lista_formularios_rtasS3);

        //     $numRegistrosCon2 = $RegistrosD3 + $RegistrosS3;

        //     //total
        //     $queryRtasD4 = "SELECT * FROM $tableR1 WHERE Solicitante = '$userName'";
        //     $lista_formularios_rtasD4 = $wpdb->get_results($queryRtasD4, ARRAY_A);
        //     if (empty($lista_formularios_rtasD4)) {
        //         $lista_formularios_rtasD4 = array();
        //     }

        //     $queryRtasS4 = "SELECT * FROM $tableR2 WHERE Solicitante = '$userName'";
        //     $lista_formularios_rtasS4 = $wpdb->get_results($queryRtasS4, ARRAY_A);
        //     if (empty($lista_formularios_rtasS4)) {
        //         $lista_formularios_rtasS4 = array();
        //     }

        //     $RegistrosD4 = count($lista_formularios_rtasD4);
        //     $RegistrosS4 = count($lista_formularios_rtasS4);

        //     $numRegistrosTot2 = $RegistrosD4 + $RegistrosS4;
        // }

        $html = $this->head();

        $html .= $this->buttonsNav();
        // $html .= $this->conteoTickets($numRegistrosAb, $numRegistrosCe, $numRegistrosCon, $numRegistrosTot, $numRegistrosAb2, $numRegistrosCe2, $numRegistrosCon2, $numRegistrosTot2);

        return $html;
    }
}

?>