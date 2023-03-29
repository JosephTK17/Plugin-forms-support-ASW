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

                    .cont_menu{
                        position: fixed;
                        top: 50;
                        right: 30;
                        width: 500px;
                        height: 300px;
                        padding: 5px;
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
                        heigth: 300;
                        overflow-y: scroll;
                        scrollbar-width: none; 
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

                    #cont_tables{
                        display: flex;
                        justify-content: center;
                        margin: 10px 0 0 0;
                    }

                    #cont_pendientes_dllo{
                        margin-right: 50px;
                    }

                </style>
            </head>
        ";

        return $html;
    }

    public function delayedTickets($resultSql1, $resultSql2)
    {
        $html = "";

        $html .= "
            <div id='cont_btn_open'>
                <button type='button' onclick='openMenu()'>"; if (empty($resultSql1) && empty($resultSql2)) {$html.= "<svg width='45' height='45' fill='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M19.875 3.75H4.125A2.628 2.628 0 0 0 1.5 6.375v11.25a2.628 2.628 0 0 0 2.625 2.625h15.75a2.627 2.627 0 0 0 2.625-2.625V6.375a2.627 2.627 0 0 0-2.625-2.625Zm-.665 4.342-6.75 5.25a.75.75 0 0 1-.92 0l-6.75-5.25a.75.75 0 1 1 .92-1.184L12 11.8l6.29-4.892a.75.75 0 0 1 .92 1.184Z'></path></svg>";} elseif (!empty($resultSql1) || !empty($resultSql2)) {$html .= "<svg width='45' height='45' fill='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path style='color: red;' d='M23.25 6.004a3 3 0 0 0-4.987-2.252 3.026 3.026 0 0 0-.596.717v.003c-.025.042-.05.085-.073.128l-.01.023a2.59 2.59 0 0 0-.057.113l-.016.035-.044.104-.017.044a3.679 3.679 0 0 0-.037.099l-.017.05a3.115 3.115 0 0 0-.045.15l-.024.094c-.005.02-.01.038-.013.058l-.019.093-.01.06c-.006.032-.01.066-.014.099l-.008.058-.009.109c0 .017-.002.033-.003.05a3.07 3.07 0 0 0-.001.3v.03c.002.043.006.088.01.132l.002.022a2.36 2.36 0 0 0 .042.27c0 .01.004.02.006.03.008.04.018.08.028.12v.01c.01.041.022.082.035.123l.01.032.04.117.01.026a3.466 3.466 0 0 0 .1.238l.015.032.05.098a3.03 3.03 0 0 0 1.396 1.31l.018.009c.083.037.168.07.254.1l.045.016.07.022.064.018.09.024.081.018.054.011.086.016.044.007a3.8 3.8 0 0 0 .127.016l.036.003.104.008.04.002c.047 0 .091.004.137.004.055 0 .108 0 .162-.005l.05-.004.109-.008.058-.008c.033-.004.066-.008.1-.014l.058-.01c.032-.006.065-.012.094-.019l.058-.013c.032-.008.064-.015.094-.024l.054-.016c.032-.009.065-.019.096-.03l.05-.016.1-.037.043-.017.104-.044.035-.016a2.47 2.47 0 0 0 .112-.056l.023-.011c.044-.024.087-.047.129-.073h.003c.27-.16.514-.36.723-.593a2.993 2.993 0 0 0 .75-1.985Z'></path><path d='m17.408 9.494-4.948 3.848a.75.75 0 0 1-.92 0l-6.75-5.25a.75.75 0 1 1 .92-1.184L12 11.8l4.417-3.435a4.494 4.494 0 0 1-.067-4.615H4.126A2.628 2.628 0 0 0 1.5 6.375v11.25a2.628 2.628 0 0 0 2.625 2.625h15.75a2.627 2.627 0 0 0 2.625-2.625V9.9a4.492 4.492 0 0 1-5.092-.406Z'></path>
                  </svg>'";}$html.= "</button>
            </div>
            <div class='cont_menu' id='cont_menu' style='display: none;'>
                <div id='cont_btn_close'>
                    <button type='button' onclick='closeMenu()'><svg width='40' height='40' fill='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='m13.59 12.002 4.454-4.453a1.126 1.126 0 0 0-1.59-1.594L12 10.408 7.547 5.955A1.127 1.127 0 1 0 5.953 7.55l4.453 4.453-4.453 4.453a1.127 1.127 0 1 0 1.594 1.594L12 13.596l4.453 4.453a1.127 1.127 0 1 0 1.594-1.594l-4.456-4.453Z'></path></svg></button>
                </div>
                <div id='cont_tables'>
                    <div id='cont_pendientes_dllo'>
                        <table border=1 style='border-collapse: collapse;'>
                            <thead>
                                <tr>
                                    <th>Desarrollo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                ";

        foreach ($resultSql1 as $key => $value) {
            $consecutivo = $value['Consecutivo'];

            $html .= "
                                <tr>
                                    <td>$consecutivo</td>
                                    <td class='clm_btn_spte'>
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
        $html .= "
                    <div id='cont_pendientes_spte'>
                        <table border=1 style='border-collapse: collapse;'>
                            <thead>
                                <tr>
                                    <th>Soporte</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                ";

        foreach ($resultSql2 as $key => $value) {
            $consecutivo2 = $value['Consecutivo'];

            $html .= "
                                <tr>
                                    <td>$consecutivo2</td>
                                    <td class='clm_btn_spte'>
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

        //fecha actual
        $fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
        $actualYear = $fecha->format('20y');
        $actualMounth = $fecha->format('m');
        $actualDay = $fecha->format('d') - 3;

        $actualDate = $actualYear .'-'. $actualMounth .'-'. $actualDay;

        $sql1 = "SELECT * FROM $tableR1 WHERE Fecha <= '$actualDate' AND Estado = 'Solicitado'";
        $resultSql1 = $wpdb->get_results($sql1, ARRAY_A);

        $sql2 = "SELECT * FROM $tableR2 WHERE Fecha <= '$actualDate' AND Estado = 'Solicitado'";
        $resultSql2 = $wpdb->get_results($sql2, ARRAY_A);

        if ($user_role == 'administrator' || $user_role == 'editor') {
            
            $html = $this->head();

            $html .= $this->delayedTickets($resultSql1, $resultSql2);

            return $html;
        }
    }
}