<?php

use PHPMailer\PHPMailer\PHPMailer;

class detailApplication {

    public function head($status, $status2)
    {
        $html = "";

        $html .= "
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
                        background-color: #233170;
                        transition: background 0.5s;
                    }

                    #create {
                        margin: 0 15% 0 0%;
                    }

                    #admin a{
                        min-width: 110px !important;
                    }

                    #user a{
                        min-width: 110px !important;
                    }

                    .stepwizard-step p {
                        font-size: 15px;
                        margin-top: 7px;
                    }
                    
                    .stepwizard-row {
                        display: table-row;
                    }
                    
                    .stepwizard {
                        display: table;
                        width: 100%;
                        position: relative;
                        margin-bottom: 50px;
                    }
                    
                    .stepwizard-step button[disabled] {
                        opacity: 1 !important;
                        filter: alpha(opacity=100) !important;
                    }
                    
                    .stepwizard-row:before {
                        top: 14px;
                        bottom: 0;
                        position: absolute;
                        content: ' ';
                        width: 100%;
                        height: 1px;
                        background-color: #ccc;
                        z-order: 0;
                    
                    }
                    
                    .stepwizard-step {
                        display: table-cell;
                        text-align: center;
                        position: relative;
                    }
                    
                    .btn-circle {
                      width: 30px;
                      height: 30px;
                      text-align: center;
                      padding: 6px 0;
                      font-size: 12px;
                      line-height: 1.428571429;
                      border-radius: 15px;
                    }

                    .cont_detail{
                        width: 80%;
                        padding: 15px;
                        box-shadow: 0px 0px 10px gray;
                        margin: auto;
                    }

                    #consecutivo{
                        float: left;
                    }

                    #fecha{
                        text-align: left;
                    }

                    #fecha div{
                        padding: 0 0 0 50%;
                    }

                    #solicitante{
                        float: left;
                    }

                    #area{
                        text-align: left;
                    }

                    #area div{
                        padding: 0 0 0 50%;
                    }

                    #solicitud{
                        margin: 15px 0 0 0;
                    }

                    .campos label{
                        font-weight: 500
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

                    #estado{
                        display: flex;
                        justify-content: center;
                        margin: 15px 0 0 0;
                    }

                    #estado form{
                        text-align: center;
                    }

                    #estado select{
                        text-align: center;
                        border: 2px solid #e0e0ec!important;
                        border-radius: 0;
                        padding: 0.25rem!important;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                        width: 200px;
                        margin: 10px 0 10px 0;
                    }

                    #estado button{
                        cursor: pointer;
                        font-weight: 700;
                        font-size: 15px;
                        height: 35px;
                        width: 120px;
                        border: none;
                        border-radius: 5px;
                        color: white;
                        background-color: #304293;
                    }

                    #estado button:hover{
                        background-color: #233170;
                        transition: background-color 0.5s;
                    }

                ";

        if ($status[0]["Estado"] == 'Cerrado' || $status2[0]["Estado"] == 'Cerrado') {
            
        $html .= "

                    .btn_detail_desabled{
                        pointer-events: none;
                        opacity: 0.5;
                    }

                ";
        }
        
        $html .= "

                    .cont_chat{
                        margin: auto;
                        width: 75%;
                        border: 1px solid #ddd;
                        background: #f1f1f1;
                    }

                    #cont_comt{
                        height: 450px; 
                        overflow-y: scroll;
                        scrollbar-width: none; 
                    }

                    #cont_comt::-webkit-scrollbar {
                        -webkit-appearance: none;
                    }
                    
                    #cont_comt::-webkit-scrollbar:vertical {
                        width:10px;
                    }
                    
                    #cont_comt::-webkit-scrollbar-button:increment,.cont_comt::-webkit-scrollbar-button {
                        display: none;
                    } 
                    
                    #cont_comt::-webkit-scrollbar:horizontal {
                        height: 10px;
                    }
                    
                    #cont_comt::-webkit-scrollbar-thumb {
                        background-color: #797979;
                        border-radius: 20px;
                        border: 2px solid #f1f2f3;
                    }

                    #myDiv::-webkit-scrollbar {
                        display: none
                      }

                    .cont_btn_chat{
                        margin: auto;
                        width: 70%;
                    }

                    .cont_mensajes{
                        height: auto;
                    }

                    .texto{
                        padding:4px;
                        background:#fff;
                    }

        ";

        if (is_super_admin()) {

            $html .= "

                    #cont_menng_admin{
                        text-align: right;
                        font-size: 15px;
                        padding-right: 15px;
                    }

                    #cont_menng_admin label{
                        font-size: 12px;
                    }

                    .cont_comt_admin{
                        display: flex;
                        justify-content: right;
                        text-align: left;
                        padding-left: 20%;
                    }

                    .cont_comt_admin p{
                        padding: 5px 10px 5px 10px;
                        background-color: #D6D6D6;
                        border-radius: 3px;
                    }

                    #cont_menng_user{
                        font-size: 15px;
                        padding-left: 15px;
                    }

                    #cont_menng_user label{
                        font-size: 12px;
                    }

                    .menng_user{
                        margin-right: 0 30% 0 0%;
                    }

                    .cont_comt_user{
                        display: flex;
                    }

                    .cont_comt_user p{
                        padding: 5px 10px 5px 10px;
                        background-color: #D6D6D6;
                        border-radius: 3px;
                    }

                    .cont_img{
                        padding:  5px 5px 0 5px;
                        background-color: #D6D6D6;
                        border-radius: 3px;
                    }

                    .cont_img img{
                        width: 500px;
                    }

            ";
        } else {

            $html .= "

                    #cont_menng_user{
                        text-align: right;
                        font-size: 15px;
                        padding-right: 15px;
                    }

                    #cont_menng_user label{
                        font-size: 12px;
                    }

                    .cont_comt_user{
                        display: flex;
                        justify-content: right;
                    }

                    .cont_comt_user p{
                        padding: 5px 10px 5px 10px;
                        background-color: #D6D6D6;
                        border-radius: 3px;
                    }

                    #cont_menng_admin{
                        font-size: 15px;
                        padding-left: 15px;
                    }

                    #cont_menng_admin label{
                        font-size: 12px;
                    }

                    .menng_admin{
                        margin-right: 0 30% 0 0%;
                    }

                    .cont_comt_admin{
                        display: flex;
                        text-align: left;
                    }

                    .cont_comt_admin p{
                        padding: 5px 10px 5px 10px;
                        background-color: #D6D6D6;
                        border-radius: 3px;
                    }

                    .cont_img{
                        padding:  5px 5px 0 5px;
                        background-color: #D6D6D6;
                        border-radius: 3px;
                    }

                    .cont_img img{
                        width: 500px;
                    }
                
            ";
        }

        $html .= "

                    #cont_form_comt{
                        margin: 0 0 15px 0;
                    }

                    #btn_change_img{
                        cursor: pointer;
                        border: none;
                        background-color: transparent;
                        color: #304293;
                    }

                    #btn_change_img:hover{
                        color: #808080;
                        transition: color 0.5s;
                    }

                    #mensaje{
                        border-radius: 5px;
                        width: 80%;
                    }

                    #cont_btn_mnj{
                        width: 30%;
                    }

                    #btn_mensaje{
                        cursor: pointer;
                        border: none;
                        background-color: transparent;
                        color: #304293;
                    }

                    #btn_mensaje:hover{
                        color: #808080;
                        transition: color 0.5s;
                    }

                    #btn_change_mens{
                        cursor: pointer;
                        border: none;
                        background-color: transparent;
                        color: #304293;
                    }

                    #btn_change_mens:hover{
                        color: #808080;
                        transition: color 0.5s;
                    }

                    #btnImage{
                        cursor: pointer;
                        border: none;
                        background-color: transparent;
                        color: #304293;
                    }

                    #btnImage:hover{
                        color: #808080;
                        transition: color 0.5s;
                    }

                    #modal-confirmacion {
                        display: none;
                        position: fixed;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        padding: 20px;
                        border: 1px solid black;
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
                                <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                            </li>
        ";

        if (is_super_admin()) {
            $html .= "
                            <li id='admin'>
                                <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=1'>Ver Tickets</a>
                            </li>
                        </ul>
                    </div>
                </div>
            ";
        } else {
            $html .= "
                            <li id='user'>
                                <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlIdUc=1'>Mis Tickets</a>
                            </li>
                        </ul>
                    </div>
                </div>
            ";
        }

        return $html;
    }

    public function showDetails($id, $id2, $lista_formularios, $lista_formularios2, $status, $status2)
    {

        $html = "";

        if ($id[0]['FormularioId']  == 1) {

            foreach ($lista_formularios as $key => $value) {
                    $consecutivo = $value['Consecutivo'];
                    $date = $value['Fecha'];
                    $solicitante = $value['Solicitante'];
                    $area = $value['Area'];
                    $solicitud = $value['Solicitud'];
                    $paraQue = $value['Para que'];
                    $estado = $value['Estado'];
                    $criterios = $value['Criterios de aceptacion'];

                    $html .= "
                    <h3 id='title_status' style='text-align: center; font-weight: 700; color: gray;'>Estado Ticket</h3>
                        <div class='stepwizard'>
                            <div class='stepwizard-row setup-panel'>
                    ";

                    if($estado == 'Solicitado') {

                        $html .= "
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>En pruebas</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Publicado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Cerrado</p>
                                </div>
                        ";

                    } else if($estado == 'En revisión de detalles') {

                        $html .= "
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                            <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                        </svg>
                                        <p>En proceso</p>
                                    </div>
                                    <div class='stepwizard-step'>
                                            <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                        </svg>
                                        <p>Terminado</p>
                                    </div>
                                    <div class='stepwizard-step'>
                                            <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                        </svg>
                                        <p>En pruebas</p>
                                    </div>
                                    <div class='stepwizard-step'>
                                            <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                        </svg>
                                        <p>Publicado</p>
                                    </div>
                                    <div class='stepwizard-step'>
                                            <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                        </svg>
                                        <p>Cerrado</p>
                                    </div>
                        ";

                    } else if($estado == 'En proceso') {

                        $html .= "
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>En pruebas</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Publicado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Cerrado</p>
                                </div>
                        ";

                    } else if($estado == 'Terminado') {

                        $html .= "
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>En pruebas</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Publicado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Cerrado</p>
                                </div>
                        ";

                    } else if($estado == 'En pruebas') {

                        $html .= "
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En pruebas</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Publicado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Cerrado</p>
                                </div>
                        ";

                    } else if($estado == 'Publicado') {

                        $html .= "
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En pruebas</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Publicado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    </svg>
                                    <p>Cerrado</p>
                                </div>
                        ";

                    } else if($estado == 'Cerrado') {

                        $html .= "
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En pruebas</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Publicado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Cerrado</p>
                                </div>
                        ";

                    }

                    $html .= "
                            </div>
                        </div>
                        <div class='cont_detail'>
                            <div class='campos' id='consecutivo'>
                                <label>Consecutivo:</label>
                                <p>$consecutivo</p>
                            </div>
                            <div class='campos' id='fecha'>
                                <div>
                                    <label>Fecha solicitud:</label>
                                    <p>$date</p>
                                </div>
                            </div>
                            <div class='campos' id='solicitante'>
                                <label>Solicitante:</label>
                                <p>$solicitante</p>
                            </div>
                            <div class='campos' id='area'>
                                <div>
                                    <label>Area:</label>
                                    <p>$area</p>
                                </div>
                            </div>
                            <div class='campos' id='solicitud'>
                                <label>Solicitud:</label>
                                <p>$solicitud</p>
                            </div>
                            <div class='campos' id='para'>
                                <label>Para que:</label>
                                <p>$paraQue</p>
                            </div>
                            <div class='campos' id='criterios'>
                                <label>Criterios de aceptacion:</label>
                                <p>$criterios</p>
                            </div>
                    ";

                    if (is_super_admin()) {
                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST' action='#title_status'>
                                    <label>Actualizar estado: </label>
                                    <br>
                                    <select name='select_status' required>
                                        <option value=''>Selecciona un estado</option>
                                        <option>En revisión de detalles</option>
                                        <option>En proceso</option>
                                        <option>Terminado</option>
                                        <option>En pruebas</option>
                                        <option>Publicado</option>
                                        <option>Cerrado</option>
                                    </select>
                                    <br>
                                    <button type='submit' name='update[]'>Actualizar</button>
                                </form>
                            </div>
                        </div>
                        ";
                    } else {
                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST' name='btn_solucionado[]' action='#title_status'>
                                    <button id='btn_spt_cerrado' class='btn_detail_desabled' type='submit' name='cerrar[]' onclick='confirmCerrado()'value=''>Solucionado</button>
                                </form>
                            </div>
                        </div>
                        ";
                    }
                 
            }
        } elseif ($id2[0]['FormularioId'] == 2) {

            foreach ($lista_formularios2 as $key => $value) {
                $consecutivo2 = $value['Consecutivo'];
                $date2 = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area = $value['Area'];
                $descripcion = $value['Descripcion'];
                $estado2 = $value['Estado'];
                $sede = $value['Sede'];

                $html .= "
                    <h3 id='#title_status' style='text-align: center;'>Estado Ticket</h3>
                        <div class='stepwizard'>
                            <div class='stepwizard-row setup-panel'>
                    ";

                if($estado2 == 'Solicitado') {

                    $html .= "
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>En revisión</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Respuesto</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Terminado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Cerrado</p>
                            </div>
                    ";

                } else if($estado2 == 'En revisión de detalles') {

                    $html .= "
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Respuesto</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Terminado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Cerrado</p>
                            </div>
                    ";

                } else if($estado2 == 'Respuesto/cambio solicitado a compras') {

                    $html .= "
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Respuesto</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Terminado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Cerrado</p>
                            </div>
                    ";

                } else if($estado2 == 'Terminado') {

                    $html .= "
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Respuesto</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Terminado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Cerrado</p>
                            </div>
                    ";

                }else if($estado2 == 'Cerrado') {

                    $html .= "
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En revisión</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Respuesto</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Terminado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='#304293' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>Cerrado</p>
                            </div>
                    ";

                }


                $html .= "
                        </div>
                    </div>
                    <div class='cont_detail'>
                        <div class='campos' id='consecutivo'>
                            <label>Consecutivo:</label>
                            <p>$consecutivo2</p>
                        </div>
                        <div class='campos' id='fecha'>
                            <div>
                                <label>Fecha solicitud:</label>
                                <p>$date2</p>
                            </div>
                        </div>
                        <div class='campos' id='solicitante'>
                            <label>Solicitante:</label>
                            <p>$solicitante2</p>
                        </div>
                        <div class='campos' id='area'>
                            <div>
                                <label>Area:</label>
                                <p>$area</p>
                            </div>
                        </div>
                        <div class='campos' id='descripcion'>
                            <label>Descripcion:</label>
                            <p>$descripcion</p>
                        </div>
                        <div class='campos' id='sede'>
                            <label>Sede:</label>
                            <p>$sede</p>
                        </div>
                ";

                if (is_super_admin()) {
                    $html .= "
                        <div class='campos' id='estado'>
                            <form method='POST' action='#title_status2'>
                                <label>Actualizar estado: </label>
                                <br>
                                <select name='select_status' required>
                                    <option value=''>Selecciona un estado</option>
                                    <option>En revisión de detalles</option>
                                    <option>Respuesto/cambio solicitado a compras</option>
                                    <option>Terminado</option>
                                    <option>Cerrado</option>
                                </select>
                                <br>
                                <button type='submit' name='update[]'>Actualizar</button>
                            </form>
                        </div>
                    </div>
                    ";
                }
                
                if (!is_super_admin()) {
                    $html .= "
                        <div class='campos' id='estado'>
                            <form method='POST' name='btn_solucionado[]' action='#title_status2'>
                                <button type='submit' id='btn_spt_cerrado' class='btn_detail_desabled' name='cerrar2[]' onclick='confirmCerrado()'  value=''>Solucionado</button>
                            </form>
                        </div>
                    </div>
                    ";
                }
            }
        }

        return $html;
    }

    public function comentsDetail($id, $id2, $status, $status2, $list_mensajes, $nomAdmin)
    {   

        $html = "";

        $html .= "
            <br id='espace_chat'>
        ";
        
        if ($id[0]['FormularioId'] == 1) {

            if ($status[0]["Estado"] == "En revisión de detalles" || $status[0]["Estado"] == "En proceso" || $status[0]["Estado"] == "Terminado" || $status[0]["Estado"] == "En pruebas" || $status[0]["Estado"] == "Publicado" || $status[0]["Estado"] == "Cerrado") {

                $html .= "
                    <div class='cont_chat' id='cont_comt'>
                        <div class='cont_mensajes'>
                ";

                foreach ($list_mensajes as $key => $value) {
                    $nombreUsuario = $value['Nombre_usuario'];
                    $tipo = $value['Tipo'];
                    $fecha = $value['Fecha'];
                    $comentario = $value['Comentario'];
                    $imagen = $value['Imagen'];

                    if (!empty($comentario)) {

                        if ($tipo == "Admin") {
                            $html .= "
                                <div class='texto' id='cont_menng_admin'>
                                    <div class='menng_admin'>
                                        <label>$nombreUsuario($tipo)</label>
                                        <br>
                                        <label>$fecha</label>
                                        <br>
                                        <div class='cont_comt_admin'>
                                            <p>$comentario</p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        } elseif($tipo == "Solicitante") {
                            $html .= "
                                <div class='texto' id='cont_menng_user'>
                                    <div class='menng_user'>
                                        <label>$nombreUsuario($tipo)</label>
                                        <br>
                                        <label>$fecha</label>
                                        <br>
                                        <div class='cont_comt_user'>
                                            <p>$comentario</p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    } elseif(!empty($imagen)) {

                        if ($tipo == "Admin") {
                            $html .= "
                                <div class='texto' id='cont_menng_admin'>
                                    <div class='menng_admin'>
                                        <label>$nombreUsuario($tipo)</label>
                                        <br>
                                        <label>$fecha</label>
                                        <br>
                                        <div class='cont_comt_admin'>
                                            <div class='cont_img'>
                                                <img src='$imagen'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        } elseif($tipo == "Solicitante") {
                            $html .= "
                                <div class='texto' id='cont_menng_user'>
                                    <div class='menng_user'>
                                        <label>$nombreUsuario($tipo)</label>
                                        <br>
                                        <label>$fecha</label>
                                        <br>
                                        <div class='cont_comt_user'>
                                            <div class='cont_img'>
                                                <img src='$imagen'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    
                }

                $html .= "
                        </div>
                    </div>
                    <br>
                    <div class='cont_btn_chat'>
                        <div id='cont_form_comt'>
                            <form method='POST' action='#espace_chat'>
                                <button type='button' id='btn_change_img' class='btn_detail_desabled' onclick='changeImg()'><i class='bi bi-image'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-image' viewBox='0 0 16 16'><path d='M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/><path d='M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z'/></svg></button>
                                <textarea placeholder='Mensaje' id='mensaje' name='mensaje[]' maxlength='200' required></textarea>
                                <button type='submit' id='btn_mensaje' class='btn_detail_desabled' name='btn_mensaje[]'><i class='bi bi-send-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-send-fill' viewBox='0 0 16 16'>
                                <path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z'/>
                              </svg></button>
                            </form>
                        </div>
                        <div id='cont_form_image' style='display: none;'>
                            <form method='post' enctype='multipart/form-data' action='#espace_chat'>
                                <button type='button' id='btn_change_mens' onclick='changeMens()'><i class='bi bi-keyboard'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-keyboard' viewBox='0 0 16 16'><path d='M14 5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h12zM2 4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H2z'/><path d='M13 10.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm0-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-5 0A.25.25 0 0 1 8.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 8 8.75v-.5zm2 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5a.25.25 0 0 1-.25-.25v-.5zm1 2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-5-2A.25.25 0 0 1 6.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 6 8.75v-.5zm-2 0A.25.25 0 0 1 4.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 4 8.75v-.5zm-2 0A.25.25 0 0 1 2.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 8.75v-.5zm11-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-2 0a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-2 0A.25.25 0 0 1 9.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 9 6.75v-.5zm-2 0A.25.25 0 0 1 7.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 7 6.75v-.5zm-2 0A.25.25 0 0 1 5.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 5 6.75v-.5zm-3 0A.25.25 0 0 1 2.25 6h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5A.25.25 0 0 1 2 6.75v-.5zm0 4a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm2 0a.25.25 0 0 1 .25-.25h5.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-5.5a.25.25 0 0 1-.25-.25v-.5z'/></svg></button>
                                <input type='file' name='imagen' required>
                                <button type='submit' id='btnImage' name='btnImage'><i class='bi bi-send-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-send-fill' viewBox='0 0 16 16'>
                                <path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z'/>
                              </svg></button>
                            </form>
                        </div>
                    </div>
                ";

                if (!empty($nomAdmin)) {
                    $html .= "
                        <div>
                            <label style='font-weight: 500;'>Respondido por:</label>
                            <span>$nomAdmin</span>
                        </div>
                    </div>
                ";
                }
                
            } else {

                $html .= "
                </div>
                ";

            }
        } elseif ($id2[0]['FormularioId'] == 2) {

            if ($status2[0]["Estado"] == "En revisión de detalles" || $status2[0]["Estado"] == "Respuesto/cambio solicitado a compras" || $status2[0]["Estado"] == "Terminado" || $status2[0]["Estado"] == "Cerrado") {

                $html .= "
                    <div class='cont_chat' id='cont_comt'>
                        <div class='cont_mensajes'>
                ";

                foreach ($list_mensajes as $key => $value) {
                    $nombreUsuario = $value['Nombre_usuario'];
                    $tipo = $value['Tipo'];
                    $fecha = $value['Fecha'];
                    $comentario = $value['Comentario'];
                    $imagen = $value['Imagen'];

                    if (!empty($comentario)) {

                        if ($tipo == "Admin") {
                            $html .= "
                                <div class='texto' id='cont_menng_admin'>
                                    <div class='menng_admin'>
                                        <label>$nombreUsuario($tipo)</label>
                                        <br>
                                        <label>$fecha</label>
                                        <br>
                                        <div class='cont_comt_admin'>
                                            <p>$comentario</p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        } elseif($tipo == "Solicitante") {
                            $html .= "
                                <div class='texto' id='cont_menng_user'>
                                    <div class='menng_user'>
                                        <label>$nombreUsuario($tipo)</label>
                                        <br>
                                        <label>$fecha</label>
                                        <br>
                                        <div class='cont_comt_user'>
                                            <p>$comentario</p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    } elseif(!empty($imagen)) {

                        if ($tipo == "Admin") {
                            $html .= "
                                <div class='texto' id='cont_menng_admin'>
                                    <div class='menng_admin'>
                                        <label>$nombreUsuario($tipo)</label>
                                        <br>
                                        <label>$fecha</label>
                                        <br>
                                        <div class='cont_comt_admin'>
                                            <div class='cont_img'>
                                                <img src='$imagen'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        } elseif($tipo == "Solicitante") {
                            $html .= "
                                <div class='texto' id='cont_menng_user'>
                                    <div class='menng_user'>
                                        <label>$nombreUsuario($tipo)</label>
                                        <br>
                                        <label>$fecha</label>
                                        <br>
                                        <div class='cont_comt_user'>
                                            <div class='cont_img'>
                                                <img src='$imagen'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }   
                }

                $html .= "
                        </div>
                    </div>
                    <br>
                    <div class='cont_btn_chat'>
                        <div id='cont_form_comt'>
                            <form method='POST' action='#espace_chat'>
                                <button type='button' id='btn_change_img' class='btn_detail_desabled' onclick='changeImg()'><i class='bi bi-image'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-image' viewBox='0 0 16 16'><path d='M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/><path d='M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z'/></svg></button>
                                <textarea placeholder='Mensaje' id='mensaje' name='mensaje[]' maxlength='200' required></textarea>
                                <button type='submit' id='btn_mensaje' class='btn_detail_desabled' name='btn_mensaje[]'><i class='bi bi-send-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentcolor' class='bi bi-send-fill' viewBox='0 0 16 16'>
                                <path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z'/>
                              </svg></button>
                            </form>
                        </div>
                        <div id='cont_form_image' style='display: none;' action='#espace_chat'>
                            <form method='post' enctype='multipart/form-data'>
                                <button type='button' id='btn_change_mens' onclick='changeMens()'><i class='bi bi-keyboard'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-keyboard' viewBox='0 0 16 16'><path d='M14 5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h12zM2 4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H2z'/><path d='M13 10.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm0-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-5 0A.25.25 0 0 1 8.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 8 8.75v-.5zm2 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5a.25.25 0 0 1-.25-.25v-.5zm1 2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-5-2A.25.25 0 0 1 6.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 6 8.75v-.5zm-2 0A.25.25 0 0 1 4.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 4 8.75v-.5zm-2 0A.25.25 0 0 1 2.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 8.75v-.5zm11-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-2 0a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-2 0A.25.25 0 0 1 9.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 9 6.75v-.5zm-2 0A.25.25 0 0 1 7.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 7 6.75v-.5zm-2 0A.25.25 0 0 1 5.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 5 6.75v-.5zm-3 0A.25.25 0 0 1 2.25 6h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5A.25.25 0 0 1 2 6.75v-.5zm0 4a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm2 0a.25.25 0 0 1 .25-.25h5.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-5.5a.25.25 0 0 1-.25-.25v-.5z'/></svg></button>
                                <input type='file' name='imagen' required>
                                <button type='submit' id='btnImage' name='btnImage'><i class='bi bi-send-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentcolor' class='bi bi-send-fill' viewBox='0 0 16 16'>
                                <path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z'/>
                              </svg></button>
                            </form>
                        </div>
                    </div>
                ";

                if (!empty($nomAdmin)) {
                    $html .= "
                        <div>
                            <label style='font-weight: 500;'>Respondido por:</label>
                            <span>$nomAdmin</span>
                        </div>
                    </div>
                ";
                }

            } else {

                $html .= "
                </div>
                ";

            }
        }

        return $html;
    }

    public function changeInputChat()
    {
        echo "
            <script language='JavaScript'>
                function changeImg(){
                    document.getElementById('cont_form_comt').style.display = 'none';
                    document.getElementById('cont_form_image').style.display = 'block';
                }

                function changeMens(){
                    document.getElementById('cont_form_comt').style.display = 'block';
                    document.getElementById('cont_form_image').style.display = 'none';
                }
            </script>
        ";
    }

    public function confirmCerrado()
    {
        echo "
            <script language='JavaScript'>
                function confirmCerrado(){
                    if(confirm('Al continuar se cerrará el ticket y no podras hacer ningun proceso')){
                        document.getElementById('btn_spt_cerrado').value = 'solucionado';
                    } 
                }
            </script>
        ";
    }

    public function constructor($id, $id2, $consecutivo)
    {

        global $wpdb;

        //tabla desarrollo
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";

        //dataTableD
        $queryData = "SELECT * FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
        $lista_formularios = $wpdb->get_results($queryData, ARRAY_A);
        if (empty($lista_formularios)) {
            $lista_formularios = array();
        }

        //statusD
        $queryStatus = "SELECT Estado FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
        $status = $wpdb->get_results($queryStatus, ARRAY_A);

        //tabla soporte
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

        //dataTableS
        $queryData2 = "SELECT * FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $lista_formularios2 = $wpdb->get_results($queryData2, ARRAY_A);
        if (empty($lista_formularios2)) {
            $lista_formularios2 = array();
        }

        //statusS
        $queryStatus2 = "SELECT Estado FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $status2 = $wpdb->get_results($queryStatus2, ARRAY_A);

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

        //tabla mnsajes
        $tableComt = "{$wpdb->prefix}comentarios_registrados_detalles";

        //comentarios
        $queryComt = "SELECT * FROM $tableComt WHERE Consecutivo = '$consecutivo' ORDER BY ComentarioId DESC";
        $list_mensajes = $wpdb->get_results($queryComt, ARRAY_A);
        if (empty($list_mensajes)) {
            $list_mensajes = array();
        }   

        $sqlNomAdmin = "SELECT Nombre_usuario FROM $tableComt WHERE Consecutivo = '$consecutivo' AND Tipo = 'Admin'";
        $resultNomAdmin = $wpdb->get_results($sqlNomAdmin, ARRAY_A);
        if (empty($resultNomAdmin)) {
            $resultNomAdmin = array();
        }

        $nomAdmin = $resultNomAdmin[0]['Nombre_usuario'];

        $sqlNomUser = "SELECT Nombre_usuario FROM $tableComt WHERE Consecutivo = '$consecutivo' AND Tipo = 'Solicitante'";
        $resultNomUser = $wpdb->get_results($sqlNomUser, ARRAY_A);
        if (empty($resultNomUser)) {
            $resultNomUser = array();
        }

        $nomUser = $resultNomUser[0]['Nombre_usuario'];

        //email admis
        $administradores = get_users('role=Administrator');
        $loginName = array();
        foreach ($administradores as $administrador) {
            array_push($loginName, $administrador->user_login);
        }

        $admin = get_user_by( 'login', $nomAdmin);

        $adminEmail = $admin->user_email;

        //email user D
        $sqlEmUserD = "SELECT Correo FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
        $resultEmUserD = $wpdb->get_results($sqlEmUserD, ARRAY_A);
        if (empty($resultEmUserD)) {
            $resultEmUserD = array();
        }

        $userEmailD = $resultEmUserD[0]['Correo'];

        //email user D
        $sqlEmUserS = "SELECT Correo FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $resultEmUserS = $wpdb->get_results($sqlEmUserS, ARRAY_A);
        if (empty($resultEmUserS)) {
            $resultEmUserS = array();
        }

        $userEmailS = $resultEmUserS[0]['Correo'];

        //mensaje
        $sqlMenss = "SELECT Comentario FROM $tableComt WHERE Consecutivo = '$consecutivo' ORDER BY ComentarioId DESC LIMIT 1";
        $resulMenss = $wpdb->get_results($sqlMenss, ARRAY_A);
        if (empty($resulMenss)) {
            $resulMenss = array();
        }

        $comtMenss = $resulMenss[0]['Comentario'];

        //mensaje img
        $sqlImg = "SELECT Imagen FROM $tableComt WHERE Consecutivo = '$consecutivo' ORDER BY ComentarioId DESC LIMIT 1";
        $resulImg = $wpdb->get_results($sqlImg, ARRAY_A);
        if (empty($resulImg)) {
            $resulImg = array();
        }

        $comtImg = $resulImg[0]['Imagen'];

        //notificar mensaje
        $mail = new PHPMailer(true);

        if (is_super_admin()) {
            if (isset($_POST['btn_mensaje']) && $comtImg == null) {
            
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = '';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '';                     //SMTP username
                $mail->Password   = '';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('', 'American School Way');
    
                if (!empty($userEmailD) && empty($userEmailS)) {
                    $mail->AddAddress($userEmailD);
                } elseif (!empty($userEmailS) && empty($userEmailD)) {
                    $mail->AddAddress($userEmailS);
                }
                
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Nuevo Mensaje';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomAdmin</span>
                        <br>
                        <p>$comtMenss</p>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo' style='display: flex; justify-content: center;'>Ver</a>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();

            } elseif (isset($_POST['btnImage']) && !empty($comtImg)) {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = '';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '';                     //SMTP username
                $mail->Password   = '';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('', 'American School Way');
    
                if (!empty($userEmailD) && empty($userEmailS)) {
                    $mail->AddAddress($userEmailD);
                } elseif (!empty($userEmailS) && empty($userEmailD)) {
                    $mail->AddAddress($userEmailS);
                }
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Nuevo Mensaje';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomAdmin</span>
                        <br>
                        <span>Foto</span>
                        <br>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo' style='display: flex; justify-content: center;'>Ver</a>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();
            }
        } else {
            if (isset($_POST['btn_mensaje']) && $resulImg[0]['Imagen'] == null) {

                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = '';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '';                     //SMTP username
                $mail->Password   = '';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('', 'American School Way');

                $mail->AddAddress($adminEmail);
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Nuevo Mensaje';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomUser</span>
                        <br>
                        <p>$comtMenss</p>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo' style='display: flex; justify-content: center;'>Ver</a>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();

            } elseif (isset($_POST['btnImage']) && !empty($comtImg)) {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = '';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '';                     //SMTP username
                $mail->Password   = '';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('', 'American School Way');
    
                $mail->AddAddress($adminEmail);
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Nuevo Mensaje';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomUser</span>
                        <br>
                        <span>Foto</span>
                        <br>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo' style='display: flex; justify-content: center;'>Ver</a>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();
            }
        }

        $html = $this->head($status, $status2);

        $html .= $this->buttonsNav();
        $html .= $this->showDetails($id, $id2, $lista_formularios, $lista_formularios2, $status, $status2);
        $html .= $this->comentsDetail($id, $id2, $status, $status2, $list_mensajes, $nomAdmin);

        $html .= $this->changeInputChat();
        $html .= $this->confirmCerrado();

        if ($_POST['cerrar'][0] == "solucionado") {
            $infoUpd = array(
                'Estado' => 'Cerrado'
            );
            $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

            header("Location: http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo");

        } elseif($_POST['cerrar2'][0] == "solucionado"){
            $infoUpd = array(
                'Estado' => 'Cerrado'
            );
            $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivo));

            header("Location: http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/?id=$consecutivo");
        }

        return $html;
    }
}

?>