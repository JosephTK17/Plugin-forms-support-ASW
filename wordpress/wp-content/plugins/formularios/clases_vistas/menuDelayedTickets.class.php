<?php

class menuDelayedTickets {

    public function head()
    {
        $html = "
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
                <style>

                    #cont_btn_open{
                        position: fixed;
                        top: 50;
                        right: 30;
                        display: flex;
                        justify-content: right;
                    }

                    #cont_btn_open button{
                        cursor: pointer;
                        border: none;
                        background-color: transparent;
                    }

                    #cont_btn_open button:hover{
                        filter: drop-shadow( 0px 0 4px black);
                        transition: filter 0.5s;
                    }

                    .cont_menu{
                        position: fixed;
                        top: 50;
                        right: 30;
                        height: 300px;
                        padding: 10px 0 10px 10px;
                        box-shadow: 0px 0px 3px black;
                        background-color: white;
                    }

                    #cont_btn_close{
                        display: flex;
                        justify-content: right;
                    }

                    #cont_btn_close button{
                        position: fixed;
                        cursor: pointer;
                        border: none;
                        background-color: transparent;
                    }

                    .cont_menu{
                        overflow-y: scroll;
                        scrollbar-width: none;
                        border-radius: 5px;
                    }

                    #cont_menu::-webkit-scrollbar {
                        -webkit-appearance: none;
                    }
                    
                    #cont_menu::-webkit-scrollbar:vertical {
                        width:10px;
                    }
                    
                    #cont_menu::-webkit-scrollbar-button:increment,.cont_comt::-webkit-scrollbar-button {
                        display: none;
                    } 
                    
                    #cont_menu::-webkit-scrollbar:horizontal {
                        height: 10px;
                    }
                    
                    #cont_menu::-webkit-scrollbar-thumb {
                        background-color: #797979;
                        border-radius: 20px;
                        border: 2px solid #f1f2f3;
                    }

                    #cont_not_pendientes{
                        text-align: center;
                        margin-top: 80px;
                    }

                    #cont_tables{
                        display: flex;
                        justify-content: center;
                    }

                    #cont_pendientes_dllo{
                        margin-right: 10px;
                    }

                    .clm_btn a{
                        background-color: #304293;
                        color: white;
                        text-decoration: none;
                        border-radius: 3px;
                        padding: 2px 5px 2px 5px;
                        font-size: 14px;
                    }

                    .clm_btn a:hover{
                        background-color: #233170;
                        box-shadow: 0px 0px 5px black;
                        transition: background-color 0.5s;
                        transition: box-shadow 0.4s;
                    }

                </style>
            </head>
        ";

        return $html;
    }

    public function delayedTickets($resultSql1, $resultSql2, $user_role)
    {
        $html = "";

        $html .= "
            <div id='cont_btn_open'>
                <button type='button' onclick='openMenu()' id='btn_open'>"; if (empty($resultSql1) && empty($resultSql2)) {$html.= "<svg width='45' height='45' fill='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M19.875 3.75H4.125A2.628 2.628 0 0 0 1.5 6.375v11.25a2.628 2.628 0 0 0 2.625 2.625h15.75a2.627 2.627 0 0 0 2.625-2.625V6.375a2.627 2.627 0 0 0-2.625-2.625Zm-.665 4.342-6.75 5.25a.75.75 0 0 1-.92 0l-6.75-5.25a.75.75 0 1 1 .92-1.184L12 11.8l6.29-4.892a.75.75 0 0 1 .92 1.184Z'></path></svg>";} elseif (!empty($resultSql1) || !empty($resultSql2)) {$html .= "<svg width='45' height='45' fill='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path style='color: red;' d='M23.25 6.004a3 3 0 0 0-4.987-2.252 3.026 3.026 0 0 0-.596.717v.003c-.025.042-.05.085-.073.128l-.01.023a2.59 2.59 0 0 0-.057.113l-.016.035-.044.104-.017.044a3.679 3.679 0 0 0-.037.099l-.017.05a3.115 3.115 0 0 0-.045.15l-.024.094c-.005.02-.01.038-.013.058l-.019.093-.01.06c-.006.032-.01.066-.014.099l-.008.058-.009.109c0 .017-.002.033-.003.05a3.07 3.07 0 0 0-.001.3v.03c.002.043.006.088.01.132l.002.022a2.36 2.36 0 0 0 .042.27c0 .01.004.02.006.03.008.04.018.08.028.12v.01c.01.041.022.082.035.123l.01.032.04.117.01.026a3.466 3.466 0 0 0 .1.238l.015.032.05.098a3.03 3.03 0 0 0 1.396 1.31l.018.009c.083.037.168.07.254.1l.045.016.07.022.064.018.09.024.081.018.054.011.086.016.044.007a3.8 3.8 0 0 0 .127.016l.036.003.104.008.04.002c.047 0 .091.004.137.004.055 0 .108 0 .162-.005l.05-.004.109-.008.058-.008c.033-.004.066-.008.1-.014l.058-.01c.032-.006.065-.012.094-.019l.058-.013c.032-.008.064-.015.094-.024l.054-.016c.032-.009.065-.019.096-.03l.05-.016.1-.037.043-.017.104-.044.035-.016a2.47 2.47 0 0 0 .112-.056l.023-.011c.044-.024.087-.047.129-.073h.003c.27-.16.514-.36.723-.593a2.993 2.993 0 0 0 .75-1.985Z'></path><path d='m17.408 9.494-4.948 3.848a.75.75 0 0 1-.92 0l-6.75-5.25a.75.75 0 1 1 .92-1.184L12 11.8l4.417-3.435a4.494 4.494 0 0 1-.067-4.615H4.126A2.628 2.628 0 0 0 1.5 6.375v11.25a2.628 2.628 0 0 0 2.625 2.625h15.75a2.627 2.627 0 0 0 2.625-2.625V9.9a4.492 4.492 0 0 1-5.092-.406Z'></path>
                  </svg>'";}$html.= "</button>
            </div>
            <div class='cont_menu' id='cont_menu' style='display: none;'>
                <div id='cont_btn_close'>
                    <button type='button' onclick='closeMenu()'><svg width='40' height='40' fill='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='m13.59 12.002 4.454-4.453a1.126 1.126 0 0 0-1.59-1.594L12 10.408 7.547 5.955A1.127 1.127 0 1 0 5.953 7.55l4.453 4.453-4.453 4.453a1.127 1.127 0 1 0 1.594 1.594L12 13.596l4.453 4.453a1.127 1.127 0 1 0 1.594-1.594l-4.456-4.453Z'></path></svg></button>
                </div>
                ";

        if (empty($resultSql1) && empty($resultSql2)) {
            $html .= "
                <div id='cont_not_pendientes'>
                ";

            if ($user_role == 'administrator') {
                $html .= "
                    <h3>No hay tickets atrasados</h3>
                ";
            } elseif($user_role == 'editor') {
                $html .= "
                    <h3>No tienes tickets atrasados</h3>
                ";
            }

            $html .= "
                    <div>
                        <i class='bi bi-emoji-laughing'></i><svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='currentColor' class='bi bi-emoji-laughing' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z'/></svg>
                        <i class='bi bi-hand-thumbs-up-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'><path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/></svg>
                    </div>
                </div>
            ";
        } else {
            
            $html .= "
                <div style='text-align: center;'>
                    <h4 style='margin: 0 0 15px 0;'>Solicitudes pendientes</h4>
                </div>
                <div id='cont_tables'>
                ";
            
            if (!empty($resultSql1)) {
        
                $html .= "
                        <div id='cont_pendientes_dllo'>
                            <table border=1 style='border-collapse: collapse;'>
                            <caption style='font-size: 25px; text-decoration: underline; text-decoration-color: gray; margin-bottom: 15px;'>Desarrollo</caption>
                                <thead>
                                    <tr>
                                        <th>Consecutivo</th>
                        ";

                if ($user_role == 'administrator') {
                    $html .= "
                                        <th>Asignado</th>
                    ";
                }

                $html .= "
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                        ";

                foreach ($resultSql1 as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $asignado = $value['Asignado'];

                    $html .= "
                                    <tr>
                                        <td>$consecutivo</td>
                                        ";

                    if ($user_role == 'administrator') {
                        $html .= "
                                        <td>$asignado</td>
                        ";
                    }

                    $html .= "
                                        <td class='clm_btn'>
                                            <a href='src/detalles/?id=$consecutivo'>Detalle</a>
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

            if (!empty($resultSql2)) {
            
                $html .= "
                        <div id='cont_pendientes_spte'>
                            <table border=1 style='border-collapse: collapse;'>
                            <caption style='font-size: 25px; text-decoration: underline; text-decoration-color: gray; margin-bottom: 15px;'>Soporte</caption>
                                <thead>
                                    <tr>
                                        <th>Consecutivo</th>
                                        ";

                if ($user_role == 'administrator') {
                    $html .= "
                                        <th>Asignado</th>
                    ";
                }

                $html .= "
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                        ";

                foreach ($resultSql2 as $key => $value) {
                    $consecutivo2 = $value['Consecutivo'];
                    $asignado2 = $value['Asignado'];

                    $html .= "
                                    <tr>
                                        <td>$consecutivo2</td>
                                        ";

                    if ($user_role == 'administrator') {
                        $html .= "
                                        <td>$asignado2</td>
                        ";
                    }

                    $html .= "          
                                        <td class='clm_btn'>
                                            <a href='src/detalles/?id=$consecutivo2'>Detalle</a>
                                        </td>
                                    </tr>
                    ";
                }

                $html .= "
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                ";
            }
        }

        echo "
            <script lang='javascript'>

                function openMenu(){
                    document.getElementById('cont_menu').style.display = 'block';
                }

                function closeMenu(){
                    document.getElementById('cont_menu').style.display = 'none';
                }

            </script>
        ";

        return $html;

    }

    public function constructor()
    {
        global $wpdb;

        //tabla desarrollo------------------------
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
        
        //tabla soporte------------------------------
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

        //obtener rol
        $current_user = wp_get_current_user();

        $user_info = get_userdata($current_user->ID);
        $user_role = $user_info->roles[0];

        //getUser
        $user = get_current_user_id();

        if ($user != 0) {
            
            $userInfo = get_userdata($user);
            $userLogin = $userInfo->user_login;

        }

        //fecha actual
        $fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
        $actualYear = $fecha->format('20y');
        $actualMounth = $fecha->format('m');
        $actualDay = $fecha->format('d') - 3;

        $actualDate = $actualYear .'-'. $actualMounth .'-'. $actualDay;

        if ($user_role == 'administrator') {
            $sql1 = "SELECT * FROM $tableR1 WHERE Fecha <= '$actualDate' AND Estado = 'Solicitado'";
            $resultSql1 = $wpdb->get_results($sql1, ARRAY_A);

            $sql2 = "SELECT * FROM $tableR2 WHERE Fecha <= '$actualDate' AND Estado = 'Solicitado'";
            $resultSql2 = $wpdb->get_results($sql2, ARRAY_A);
        } elseif($user_role == 'editor') {
            $sql1 = "SELECT * FROM $tableR1 WHERE Fecha <= '$actualDate' AND Estado = 'Solicitado' AND Asignado = '$userLogin'";
            $resultSql1 = $wpdb->get_results($sql1, ARRAY_A);

            $sql2 = "SELECT * FROM $tableR2 WHERE Fecha <= '$actualDate' AND Estado = 'Solicitado' AND Asignado = '$userLogin'";
            $resultSql2 = $wpdb->get_results($sql2, ARRAY_A);
        }
        

        if ($user_role == 'administrator' || $user_role == 'editor') {
            
            $html = $this->head();

            $html .= $this->delayedTickets($resultSql1, $resultSql2, $user_role);

            return $html;
        }
    }
}