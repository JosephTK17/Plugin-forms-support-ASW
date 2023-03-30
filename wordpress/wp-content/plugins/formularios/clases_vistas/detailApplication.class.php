<?php

use PHPMailer\PHPMailer\PHPMailer;

class detailApplication {

    public function head($status, $status2, $user_role)
    {
        $html = "";

        $html .= "
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <style>

                    .wp-block-post-title{
                        display: none;
                    }

                    #general_cont{
                        margin: auto;
                        position: relative;
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
                        width: 130px;
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

        if ( $status[0]["Estado"] == "Cerrado") {
    
            $html .= "

                    .btn_chatAd_desabled{
                        pointer-events: none;
                        opacity: 0.5;
                    }

                ";
        }

        if ( $status[0]["Estado"] != "Terminado" && $status[0]["Estado"] != "En pruebas") {
            
            $html .= "

                    .btn_admin_desabled{
                        pointer-events: none;
                        opacity: 0.5;
                    }

                ";
        }

        if ( $status2[0]["Estado"] == "Cerrado") {
    
            $html .= "

                    .btn_chatUs_desabled{
                        pointer-events: none;
                        opacity: 0.5;
                    }

                ";
        }

        if ( $status2[0]["Estado"] != "Terminado") {
            
            $html .= "

                    .btn_user_desabled{
                        pointer-events: none;
                        opacity: 0.5;
                    }

                ";
        }
        
        $html .= "

                    .cont_chat{
                        margin: auto;
                        width: 75%;
                        border: 1px solid #4F4F4F;
                        border-radius: 5px;
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

        if ($user_role == 'administrator' || $user_role == 'editor') {

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

    public function buttonsNav($user_role)
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
                                <a href='src/formularios/'>Enviar Ticket</a>
                            </li>
        ";

        if ($user_role == 'administrator' || $user_role == 'editor') {
            $html .= "
                            <li id='admin'>
                                <a href='src/pagina-tickets/?tUrlId=1'>Ver Tickets</a>
                            </li>
                        </ul>
                    </div>
                </div>
            ";
        } else {
            $html .= "
                            <li id='user'>
                                <a href='src/ver-tickets-user/?tUrlIdUc=1'>Mis Tickets</a>
                            </li>
                        </ul>
                    </div>
                </div>
            ";
        }

        return $html;
    }

    public function showDetails($id, $id2, $lista_formularios, $lista_formularios2, $status, $status2, $user_role, $asigAdmin, $asigAdmin2)
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
                                    <p>En pruebas</p>
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
                                    <p>En pruebas</p>
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
                                    <p>En pruebas</p>
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
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En pruebas</p>
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
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En pruebas</p>
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

                    }  else if($estado == 'Cerrado') {

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
                                    <p style='text-decoration: underline; text-decoration-color: gray; font-weight: 500;'>En pruebas</p>
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
                        <div class='cont_detail' id='details_scroll'>
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

                    if ($user_role == 'administrator') {
                        if (empty($asigAdmin)) {
                            
                            //names admis
                            $administradores = get_users('role=Administrator');
                            $editores = get_users('role=Editor');
                            $namesAdmin = array();
                            foreach ($administradores as $administrador) {
                                array_push($namesAdmin, $administrador->user_login);
                            }

                            foreach ($editores as $editor) {
                                array_push($namesAdmin, $editor->user_login);
                            }

                            $html .= "
                                <div class='campos' id='estado'>
                                    <form method='POST' action='#details_scroll'>
                                        <input type='hidden' name='consecutivoAsig' value='$consecutivo'>
                                        <label>Asignar Ticket: </label>
                                        <br>
                                        <select id='asignar_admin' name='asignar_admin' required>
                                            <option value=''>Selecciona</option>
                                    ";

                                    foreach ($namesAdmin as $key => $value) {
                                        $nameAdmin = $value;
                                        $html .= "
                                            <option value='$nameAdmin'>$nameAdmin</option>
                                        ";
                                    }

                            $html .= "
                                        </select>
                                        <br>
                                        <button id='asignado' type='submit' name='asignado'>Asignar</button>
                                    </form>
                                </div>
                            </div>
                            ";

                            if (isset($_POST['asignado'])) {
                                global $wpdb;
    
                                //tabla desarrollo------------------------
                                $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";
    
                                $asignar = $_POST['asignar_admin'];
                                $consecutivoAsig = $_POST['consecutivoAsig'];
                                $infoUpd = array(
                                    'Asignado' => $asignar
                                );
                                $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivoAsig));
    
                                header("Location: src/detalles/?id=$consecutivoAsig"); 
                            }
                        } else {
                            $html .= "
                                <div class='campos' id='estado'>
                                    <form method='POST' action='#title_status' name='form_select_status'>
                                        <label>Actualizar estado: </label>
                                        <br>
                                        <select name='select_status' required>
                                            <option value='' "; if ($estado == "") {$html .= "selected";} $html .= ">
                                                Selecciona un estado
                                            </option>
                                            <option value='En revisión de detalles' "; if ($estado == 'En revisión de detalles') {$html .= "selected";} $html .= ">
                                                En revisión de detalles
                                            </option>
                                            <option value='En proceso' "; if ($estado == "En proceso") {$html .= "selected";} $html .= ">
                                                En proceso
                                            </option>
                                            <option value='En pruebas' "; if ($estado == "En pruebas") {$html .= "selected";} $html .= ">
                                                En pruebas
                                            </option>
                                            <option value='Terminado' "; if ($estado == "Terminado") {$html .= "selected";} $html .= ">
                                                Terminado
                                            </option>
                                        </select>
                                        <br>
                                        <button type='submit' name='update[]' id='actualizar' onclick='dobleClick()'>Actualizar</button>
                                    </form>
                                </div>
                            </div>
                            ";
                        }
                    } elseif ($user_role == 'editor') {
                        if (empty($asigAdmin)) {
                            //getUser
                            $user = get_current_user_id();

                            if ($user != 0) {
                                
                                $userInfo = get_userdata($user);
                                $userLogin = $userInfo->user_login;

                            }

                            $html .= "
                                <div class='campos' id='estado'>
                                    <form method='POST' action='#details_scroll'>
                                        <input type='hidden' value='$consecutivo' name='consecutivoAgarr'>
                                        <input type='hidden' value='$userLogin' name='agarrar_ticket'>
                                        <button type='submit' name='btn_agarrar'>Guardar</button>
                                    </form>
                                </div>
                            </div>
                            ";

                            if (isset($_POST['btn_agarrar'])) {
                                global $wpdb;

                                //tabla desarrollo------------------------
                                $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";

                                $agarrar = $_POST['agarrar_ticket'];
                                $consecutivoAgarr = $_POST['consecutivoAgarr'];

                                $infoUpd = array(
                                    'Asignado' => $agarrar
                                );
                                $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivoAgarr));

                                header("Location: src/detalles/?id=$consecutivo"); 
                            }
                    
                        } else {
                            $html .= "
                                <div class='campos' id='estado'>
                                    <form method='POST' action='#title_status' name='form_select_status'>
                                        <label>Actualizar estado: </label>
                                        <br>
                                        <select name='select_status' required>
                                            <option value='' "; if ($estado == "") {$html .= "selected";} $html .= ">
                                                Selecciona un estado
                                            </option>
                                            <option value='En revisión de detalles' "; if ($estado == 'En revisión de detalles') {$html .= "selected";} $html .= ">
                                                En revisión de detalles
                                            </option>
                                            <option value='En proceso' "; if ($estado == "En proceso") {$html .= "selected";} $html .= ">
                                                En proceso
                                            </option>
                                            <option value='En pruebas' "; if ($estado == "En pruebas") {$html .= "selected";} $html .= ">
                                                En pruebas
                                            </option>
                                            <option value='Terminado' "; if ($estado == "Terminado") {$html .= "selected";} $html .= ">
                                                Terminado
                                            </option>
                                        </select>
                                        <br>
                                        <button type='submit' name='update[]' onclick='dobleClick()'>Actualizar</button>
                                    </form>
                                </div>
                            </div>
                            ";
                        }
                    } else {
                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST' name='btn_solucionado[]' action='#title_status'>
                                    <button id='btn_cerrado' class='btn_admin_desabled' type='submit' name='cerrar[]' onclick='confirmCerrado()' value=''>Solucionado</button>
                                    <button id='btn_nocerrado' class='btn_admin_desabled' type='submit' name='btn_nocerrado' onclick='confirmNoCerrado()' value='En revisión de detalles'>No Solucionado</button>
                                </form>
                            </div>
                        </div>
                        ";

                        if (isset($_POST['btn_nocerrado'])) {
                            global $wpdb;

                            //tabla desarrollo------------------------
                            $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";

                            $noCerrado = $_POST['btn_nocerrado'];

                            $infoUpd = array(
                                'Estado' => $noCerrado
                            );
                            $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

                            header("Location: src/detalles/?id=$consecutivo");
                        }
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
                    <h3 id='title_status2' style='text-align: center; font-weight: 700; color: gray;'>Estado Ticket</h3>
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
                                <p>Terminado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-circle'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                </svg>
                                <p>Cerrado</p>
                            </div>
                    ";

                } else if($estado2 == 'Repuesto/cambio solicitado a compras') {

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
                    <div class='cont_detail' id='details_scroll'>
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

                if ($user_role == 'administrator') {
                    if (empty($asigAdmin2)) {
                        
                        //names admis
                        $administradores = get_users('role=Administrator');
                        $editores = get_users('role=Editor');
                        $namesAdmin = array();
                        foreach ($administradores as $administrador) {
                            array_push($namesAdmin, $administrador->user_login);
                        }

                        foreach ($editores as $editor) {
                            array_push($namesAdmin, $editor->user_login);
                        }

                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST' action='#details_scroll'>
                                    <input type='hidden' name='consecutivoAsig2' value='$consecutivo2'>
                                    <select id='asignar_admin2' name='asignar_admin2' required>
                                        <option value=''>Selecciona</option>
                                ";

                                foreach ($namesAdmin as $key => $value) {
                                    $nameAdmin = $value;
                                    $html .= "
                                        <option value='$nameAdmin'>$nameAdmin</option>
                                    ";
                                }

                        $html .= "
                                    </select>
                                    <br>
                                    <button id='asignado2' type='submit' name='asignado2'>Asignar</button>
                                </form>
                            </div>
                        </div>
                        ";

                        if (isset($_POST['asignado2'])) {
                            global $wpdb;

                            //tabla soporte------------------------------
                            $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

                            $asignar2 = $_POST['asignar_admin2'];
                            $consecutivoAsig2 = $_POST['consecutivoAsig2'];
                            $infoUpd = array(
                                'Asignado' => $asignar2
                            );
                            $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivoAsig2));

                            header("Location: src/detalles/?id=$consecutivoAsig2"); 
                        }
                    } else {
                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST' action='#title_status2'>
                                    <label>Actualizar estado: </label>
                                    <br>
                                    <select name='select_status2' required>
                                        <option value='' "; if ($estado2 == "") {$html .= "selected";} $html .= ">
                                            Selecciona un estado
                                        </option>
                                        <option value='En revisión de detalles' "; if ($estado2 == "En revisión de detalles") {$html .= "selected";} $html .= ">
                                            En revisión de detalles
                                        </option>
                                        <option value='Repuesto/cambio solicitado a compras' "; if ($estado2 == "Repuesto/cambio solicitado a compras") {$html .= "selected";} $html .= ">
                                            Repuesto/cambio solicitado a compras
                                        </option>
                                        <option value='Terminado' "; if ($estado2 == "Terminado") {$html .= "selected";} $html .= ">
                                            Terminado
                                        </option>
                                    </select>
                                    <br>
                                    <button type='submit' name='update2[]' id='btn_update'>Actualizar</button>
                                </form>
                            </div>
                        </div>
                        ";
                    }
                } elseif ($user_role == 'editor') {
                    if (empty($asigAdmin2)) {

                        //getUser
                        $user = get_current_user_id();

                        if ($user != 0) {
                            
                            $userInfo = get_userdata($user);
                            $userLogin = $userInfo->user_login;

                        }

                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST' action='#details_scroll'>
                                    <input type='hidden' value='$consecutivo2' name='consecutivoAgarr2'>
                                    <input type='hidden' value='$userLogin' name='agarrar_ticket2'>
                                    <button type='submit' name='btn_agarrar2'>Seleccionar</button>
                                </form>
                            </div>
                        </div>
                        ";

                        if (isset($_POST['btn_agarrar2'])) {
                            global $wpdb;

                            //tabla soporte------------------------------
                            $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

                            $agarrar2 = $_POST['agarrar_ticket2'];
                            $consecutivoAgarr2 = $_POST['consecutivoAgarr2'];

                            $infoUpd = array(
                                'Asignado' => $agarrar2
                            );
                            $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivoAgarr2));

                            header("Location: src/detalles/?id=$consecutivo2"); 
                        }
                    } else {
                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST' action='#title_status2'>
                                    <label>Actualizar estado: </label>
                                    <br>
                                    <select name='select_status2' required>
                                        <option value='' "; if ($estado2 == "") {$html .= "selected";} $html .= ">
                                            Selecciona un estado
                                        </option>
                                        <option value='En revisión de detalles' "; if ($estado2 == "En revisión de detalles") {$html .= "selected";} $html .= ">
                                            En revisión de detalles
                                        </option>
                                        <option value='Repuesto/cambio solicitado a compras' "; if ($estado2 == "Repuesto/cambio solicitado a compras") {$html .= "selected";} $html .= ">
                                            Repuesto/cambio solicitado a compras
                                        </option>
                                        <option value='Terminado' "; if ($estado2 == "Terminado") {$html .= "selected";} $html .= ">
                                            Terminado
                                        </option>
                                    </select>
                                    <br>
                                    <button type='submit' name='update2[]' id='btn_update'>Actualizar</button>
                                </form>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    $html .= "
                        <div class='campos' id='estado'>
                            <form method='POST' name='btn_solucionado[]' action='#title_status2'>
                                <button type='submit' id='btn_cerrado' class='btn_user_desabled' name='cerrar2[]' onclick='confirmCerrado()'  value=''>Solucionado</button>
                                <button id='btn_nocerrado2' class='btn_user_desabled' type='submit' name='btn_nocerrado2' onclick='confirmNoCerrado()' value='En revisión de detalles'>No Solucionado</button>
                            </form>
                        </div>
                    </div>
                    ";

                    if (isset($_POST['btn_nocerrado2'])) {
                        global $wpdb;

                        //tabla soporte
                        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

                        $noCerrado2 = $_POST['btn_nocerrado2'];

                        $infoUpd = array(
                            'Estado' => $noCerrado2
                        );
                        $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivo2));

                        header("Location: src/detalles/?id=$consecutivo2");
                    }
                }
            }
        }

        return $html;
    }

    public function comentsDetail($id, $id2, $status, $status2, $list_mensajes, $nomAdmin)
    {   

        $html = "";
        
        if ($id[0]['FormularioId'] == 1) {

            if ($status[0]["Estado"] == "En revisión de detalles" || $status[0]["Estado"] == "En proceso" || $status[0]["Estado"] == "Terminado" || $status[0]["Estado"] == "En pruebas" || $status[0]["Estado"] == "Publicado" || $status[0]["Estado"] == "Cerrado") {

                $html .= "
                <br id='espace_chat'>
                    <div class='cont_btn_chat'>
                        <div id='cont_form_comt'>
                            <form method='POST' action='#espace_chat'>
                                <button type='button' id='btn_change_img' class='btn_chatAd_desabled' onclick='changeImg()'><i class='bi bi-image'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-image' viewBox='0 0 16 16'><path d='M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/><path d='M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z'/></svg></button>
                                <textarea placeholder='Descripción' id='mensaje' name='mensaje[]' maxlength='200' required></textarea>
                                <button type='submit' id='btn_mensaje' class='btn_chatAd_desabled' name='btn_mensaje[]'><i class='bi bi-send-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-send-fill' viewBox='0 0 16 16'>
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

            if ($status2[0]["Estado"] == "En revisión de detalles" || $status2[0]["Estado"] == "Repuesto/cambio solicitado a compras" || $status2[0]["Estado"] == "Terminado" || $status2[0]["Estado"] == "Cerrado") {

                $html .= "
                <br id='espace_chat'>
                    <div class='cont_btn_chat'>
                        <div id='cont_form_comt'>
                            <form method='POST' action='#espace_chat'>
                                <button type='button' id='btn_change_img' class='btn_chatUs_desabled' onclick='changeImg()'><i class='bi bi-image'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-image' viewBox='0 0 16 16'><path d='M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/><path d='M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z'/></svg></button>
                                <textarea placeholder='Descripción' id='mensaje' name='mensaje[]' maxlength='200' required></textarea>
                                <button type='submit' id='btn_mensaje' class='btn_chatUs_desabled' name='btn_mensaje[]'><i class='bi bi-send-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentcolor' class='bi bi-send-fill' viewBox='0 0 16 16'>
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
                ";

                if (!empty($nomAdmin)) {
                    $html .= "
                    <br>
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

    // public function validationStatusMess()
    // {
    //     echo "
    //         <script lang='javascript'>

    //             function dobleClick(){
    //                 document.getElementById('btn_mensaje').click();
    //             }
                
    //         </script>
    //     ";
    // }

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
                        document.getElementById('btn_cerrado').value = 'solucionado';
                    } 
                }

                function confirmNoCerrado(){
                    alert('Dinos porqué no fue solucionada tu solicitud por medio de un comentario')
                }
            </script>
        ";
    }

    public function constructor($id, $id2, $consecutivo)
    {

        global $wpdb;

        //obtener rol
        $current_user = wp_get_current_user();

        $user_info = get_userdata($current_user->ID);
        $user_role = $user_info->roles[0];

        //tabla desarrollo
        $tableR1 = "{$wpdb->prefix}formularios_respuestas_desarrollo";

        //tabla soporte
        $tableR2 = "{$wpdb->prefix}formularios_respuestas_soporte";

        //dataTableD
        $queryData = "SELECT * FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
        $lista_formularios = $wpdb->get_results($queryData, ARRAY_A);
        if (empty($lista_formularios)) {
            $lista_formularios = array();
        }

        //dataTableS
        $queryData2 = "SELECT * FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $lista_formularios2 = $wpdb->get_results($queryData2, ARRAY_A);
        if (empty($lista_formularios2)) {
            $lista_formularios2 = array();
        }

        //tabla mnsajes
        $tableComt = "{$wpdb->prefix}comentarios_registrados_detalles";

        //mensaje
        $sqlMenss = "SELECT Comentario FROM $tableComt WHERE Consecutivo = '$consecutivo' ORDER BY ComentarioId DESC LIMIT 1";
        $resulMenss = $wpdb->get_results($sqlMenss, ARRAY_A);
        if (empty($resulMenss)) {
            $resulMenss = array();
        }

        $comtMenss = $resulMenss[0]['Comentario'];

        //imagen
        $sqlImg = "SELECT Imagen FROM $tableComt WHERE Consecutivo = '$consecutivo' ORDER BY ComentarioId DESC LIMIT 1";
        $resulImg = $wpdb->get_results($sqlImg, ARRAY_A);
        if (empty($resulImg)) {
            $resulImg = array();
        }

        $comtImg = $resulMenss[0]['Imagen'];

        //statusD
        $queryStatus = "SELECT Estado FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
        $status = $wpdb->get_results($queryStatus, ARRAY_A);

        //statusS
        $queryStatus2 = "SELECT Estado FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $status2 = $wpdb->get_results($queryStatus2, ARRAY_A);

        //actualizar
        $estadoUpd = $_POST['select_status'];

        //asignado
        $sqlAsignado = "SELECT Asignado FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
        $resultAsig = $wpdb->get_results($sqlAsignado, ARRAY_A);

        $asigAdmin = $resultAsig[0]['Asignado'];

        //actualizacion y verificacion de estado
        if (isset($_POST['update'])) { 
            //verificacion estado form_detalle
            if ($status[0]['Estado'] == 'Solicitado') {
                if (!empty($asigAdmin) && $estadoUpd == 'En proceso' || $estadoUpd == 'En pruebas' || $estadoUpd == 'Terminado' || $estadoUpd == 'Cerrado') {
                    echo "
                        <script language='JavaScript'>
                            alert('Debes pasar por el estado En revisión para continuar');
                        </script>
                    ";
                } elseif (empty($asigAdmin) && $estadoUpd == 'En revisión de detalles' || $estadoUpd == 'En proceso' || $estadoUpd == 'En pruebas' ||  $estadoUpd == 'Terminado' || $estadoUpd == 'Cerrado') {
                    echo "
                        <script lang='javascript'>
                            alert('Debes asignarte o que te asignen este ticket para continuar');
                        </script>
                    ";
                } else {
                    if ($id[0]['FormularioId'] == 1) {
                        $infoUpd = array(
                            'Estado' => $estadoUpd
                        );
                        $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

                        header("Location: src/detalles/?id=$consecutivo");

                    }
                }
                
            } elseif($status[0]['Estado'] == 'En revisión de detalles') {
                if ($estadoUpd == 'En pruebas' || $estadoUpd == 'Terminado' || $estadoUpd == 'Cerrado') {
                    echo "
                        <script language='JavaScript'>
                            alert('Debes pasar por el estado En proceso para continuar');
                        </script>
                    ";
                } else {
                    if (empty($comtMenss)) {
                        echo "
                            <script language='JavaScript'>
                                alert('Para cambiar el estado de la solicitud a En proceso debes responderlo.');
                            </script>
                        ";
                    } else {
                        if ($id[0]['FormularioId'] == 1) {
                            $infoUpd = array(
                                'Estado' => $estadoUpd
                            );
                            $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

                            header("Location: src/detalles/?id=$consecutivo");

                        }
                    }
                }
            } elseif ($status[0]['Estado'] == 'En proceso'){
                if ($estadoUpd == 'Terminado' || $estadoUpd == 'Cerrado') {
                    echo "
                        <script language='JavaScript'>
                            alert('Debes pasar por el estado En pruebas para continuar');
                        </script>
                    ";
                }else {
                    if ($id[0]['FormularioId'] == 1) {
                        $infoUpd = array(
                            'Estado' => $estadoUpd
                        );
                        $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

                        header("Location: src/detalles/?id=$consecutivo");

                    }
                }
            } elseif ($status[0]['Estado'] == 'En pruebas'){
                if ($estadoUpd == 'Cerrado') {
                    echo "
                        <script language='JavaScript'>
                            alert('Debes pasar por el estado Terminado para continuar');
                        </script>
                    ";
                } else {
                    if ($id[0]['FormularioId'] == 1) {
                        $infoUpd = array(
                            'Estado' => $estadoUpd
                        );
                        $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

                        header("Location: src/detalles/?id=$consecutivo");

                    }
                }
            } else {
                if ($id[0]['FormularioId'] == 1) {
                    $infoUpd = array(
                        'Estado' => $estadoUpd
                    );
                    $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

                    header("Location: src/detalles/?id=$consecutivo");

                }
            }
        }

        $sqlAsignado2 = "SELECT Asignado FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $resultAsig2 = $wpdb->get_results($sqlAsignado2, ARRAY_A);

        $asigAdmin2 = $resultAsig2[0]['Asignado'];

        //actualizacion
        $estadoUpd2 = $_POST['select_status2'];

        //actualizacion estado form_soporte
        if (isset($_POST['update2'])) {
            if ($status2[0]['Estado'] == 'Solicitado') {
                if (!empty($asigAdmin2) && $estadoUpd2 == 'Repuesto/cambio solicitado a compras' || $estadoUpd2 == 'Terminado' || $estadoUpd2 == 'Cerrado') {
                    echo "
                        <script language='JavaScript'>
                            alert('Debes pasar por el estado En revisión para continuar');
                        </script>
                    ";
                } elseif (empty($asigAdmin2) && $estadoUpd2 == 'En revisión de detalles' || $estadoUpd2 == 'Repuesto/cambio solicitado a compras' || $estadoUpd2 == 'Terminado' || $estadoUpd2 == 'Cerrado') {
                    echo "
                        <script lang='javascript'>
                            alert('Debes asignarte o que te asignen este ticket para continuar');
                        </script>
                    ";
                } else {
                    if ($id2[0]['FormularioId'] == 2) {
                        $infoUpd = array(
                            'Estado' => $estadoUpd2
                        );
                        $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivo));

                        header("Location: src/detalles/?id=$consecutivo");

                    }
                }
            } elseif($status2[0]['Estado'] == 'En revisión de detalles') {
                if ($estadoUpd2 == 'Cerrado') {
                    echo "
                        <script language='JavaScript'>
                            alert('Debes pasar por el estado Repuesto/cambio solicitado a compras o Terminado para continuar');
                        </script>
                    ";
                } elseif($estadoUpd2 == 'Repuesto/cambio solicitado a compras' || $estadoUpd2 == 'Terminado'){
                    if (empty($comtMenss)) {
                        echo "
                            <script language='JavaScript'>
                                alert('Para cambiar el estado de la solicitud a $estadoUpd2 debes responderlo.');
                            </script>
                        ";
                    } else {
                        if ($id2[0]['FormularioId'] == 2) {
                            $infoUpd = array(
                                'Estado' => $estadoUpd2
                            );
                            $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivo));

                            header("Location: src/detalles/?id=$consecutivo");

                        }
                    }
                }
            } elseif ($status2[0]['Estado'] == 'Repuesto/cambio solicitado a compras'){
                if ($estadoUpd2 == 'Cerrado') {
                    echo "
                        <script language='JavaScript'>
                            alert('Debes pasar por el estado Terminado para continuar');
                        </script>
                    ";
                } else {
                    if ($id2[0]['FormularioId'] == 2) {
                        $infoUpd = array(
                            'Estado' => $estadoUpd2
                        );
                        $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivo));

                        header("Location: src/detalles/?id=$consecutivo");

                    }
                }
            } else {
                if ($id2[0]['FormularioId'] == 2) {
                    $infoUpd = array(
                        'Estado' => $estadoUpd2
                    );
                    $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivo));

                    header("Location: src/detalles/?id=$consecutivo");

                }
            }
        }

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

        //credenciales
        $serverSmtp = '';
        $userNameSmtp = '';
        $passwordSmtp = '';
        $setFromSmtp = '';

        //notificar mensaje
        $mail = new PHPMailer(true);

        if ($user_role == 'administrator' || $user_role == 'editor') {
            if (isset($_POST['btn_mensaje']) && $comtImg == null) {
            
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $serverSmtp;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $userNameSmtp;                     //SMTP username
                $mail->Password   = $passwordSmtp;                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom($setFromSmtp, 'American School Way');
    
                if (!empty($userEmailD) && empty($userEmailS)) {
                    $mail->AddAddress($userEmailD);
                } elseif (!empty($userEmailS) && empty($userEmailD)) {
                    $mail->AddAddress($userEmailS);
                }
                
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Aviso de actividad';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <p>Se ha echo un comentario en respuesta a tu solicitud...</p>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomAdmin</span>
                        <br>
                        <label style='font-weight: 700;'>Comentario:</label>
                        <p style='margin: 0 0 0 20px;'>$comtMenss</p>
                        <br>
                        <div>
                            <center>
                                <a href='src/detalles/?id=$consecutivo' style='text-decoration: none; background-color: #005199; color: white; padding: 5px 10px 5px 10px; border-radius: 5px; font-size: 20px;'>Ver</a>
                            </center>
                        </div>
                        <br>
                        <div>
                            <img alt='Banner' width='514' src='http://intranet.americanschoolway.edu.co/wp-content/uploads/2021/08/firma-asw_2.gif' style='margin:0px; vertical-align:middle; box-sizing:border-box; width:514px; height:auto'>
                        </div>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();

            } elseif (isset($_POST['btnImage']) && !empty($comtImg)) {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $serverSmtp;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $userNameSmtp;                     //SMTP username
                $mail->Password   = $passwordSmtp;                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom($setFromSmtp, 'American School Way');
    
                if (!empty($userEmailD) && empty($userEmailS)) {
                    $mail->AddAddress($userEmailD);
                } elseif (!empty($userEmailS) && empty($userEmailD)) {
                    $mail->AddAddress($userEmailS);
                }
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Aviso de actividad';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomAdmin</span>
                        <br>
                        <label style='font-weight: 700;'>Comentario:</label>
                        <div>
                            <img src='$comtImg' style='margin: 0 0 0 20px;'>
                        </div>
                        <br>
                        <div>   
                            <center>
                                <a href='src/detalles/?id=$consecutivo' style='text-decoration: none; background-color: #005199; color: white; padding: 5px 10px 5px 10px; border-radius: 5px; font-size: 20px;'>Ver</a>
                            </center>
                        </div>
                        <br>
                        <div>
                            <img alt='Banner' width='514' src='http://intranet.americanschoolway.edu.co/wp-content/uploads/2021/08/firma-asw_2.gif' style='margin:0px; vertical-align:middle; box-sizing:border-box; width:514px; height:auto'>
                        </div>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();
            }

            if ($status[0]['Estado'] != 'En pruebas') {
                //nada
            } else {

                if (isset($_POST['update']) && $estadoUpd == 'Terminado') {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = $serverSmtp;                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = $userNameSmtp;                     //SMTP username
                    $mail->Password   = $passwordSmtp;                               //SMTP password
                    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom($setFromSmtp, 'American School Way');
        
                    if (!empty($userEmailD) && empty($userEmailS)) {
                        $mail->AddAddress($userEmailD);
                    } elseif (!empty($userEmailS) && empty($userEmailD)) {
                        $mail->AddAddress($userEmailS);
                    }
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Ticket Desarrollo';
                        
                    $html = "
                        <div>
                            <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                            <br>
                            <p>Su ticket a pasado a estado <strong>Terminado</strong></p>
                            <p style='text-align: center;'>Su solicitud fue solucionada?</p>
                            <form method='POST'>
                                <div style='text-align: center;'>
                                    <button type='submit' style='background-color: #304293; color: white; font-size: 20px; border: none; border-radius: 5px; width: 70px;'>SI</button>
                                    <button type='submit' style='background-color: #304293; color: white; font-size: 20px; border: none; border-radius: 5px; width: 70px;'>NO</button>
                                </div>
                            </form>
                            <br>
                            <div>
                                <img alt='Banner' width='514' src='http://intranet.americanschoolway.edu.co/wp-content/uploads/2021/08/firma-asw_2.gif' style='margin:0px; vertical-align:middle; box-sizing:border-box; width:514px; height:auto'>
                            </div>
                        </div>
                    ";

                    $mail->Body = $html;
                
                    $mail->send();

                } elseif (isset($_POST['update2']) && $estadoUpd2 == 'Terminado') {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = $serverSmtp;                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = $userNameSmtp;                     //SMTP username
                    $mail->Password   = $passwordSmtp;                               //SMTP password
                    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom($setFromSmtp, 'American School Way');
        
                    if (!empty($userEmailD) && empty($userEmailS)) {
                        $mail->AddAddress($userEmailD);
                    } elseif (!empty($userEmailS) && empty($userEmailD)) {
                        $mail->AddAddress($userEmailS);
                    }
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Ticket Soporte';
                        
                    $html = "
                        <div>
                            <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                            <br>
                            <p>Su ticket a pasado a estado <strong>Terminado</strong></p>
                            <p style='text-align: center;'>Su solicitud fue solucionada?</p>
                            <form method='POST'>
                                <button type='submit'>SI</button>
                                <button type='submit'>NO</button>
                            </form>
                            <br>
                            <div>
                                <img alt='Banner' width='514' src='http://intranet.americanschoolway.edu.co/wp-content/uploads/2021/08/firma-asw_2.gif' style='margin:0px; vertical-align:middle; box-sizing:border-box; width:514px; height:auto'>
                            </div>
                        </div>
                    ";

                    $mail->Body = $html;
                
                    $mail->send();
                }
            }
        } else {
            if (isset($_POST['btn_mensaje']) && $resulImg[0]['Imagen'] == null) {

                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $serverSmtp;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $userNameSmtp;                     //SMTP username
                $mail->Password   = $passwordSmtp;                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom($setFromSmtp, 'American School Way');

                $mail->AddAddress($adminEmail);
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Aviso de actividad';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomUser</span>
                        <br>
                        <label style='font-weight: 700;'>Comentario:</label>
                        <p style='margin: 0 0 0 20px;'>$comtMenss</p>
                        <br>
                        <div>
                            <center>
                                <a href='src/detalles/?id=$consecutivo' style='text-decoration: none; background-color: #005199; color: white; padding: 5px 10px 5px 10px; border-radius: 5px; font-size: 20px;'>Ver</a>
                            </center>
                        </div>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();

            } elseif (isset($_POST['btnImage']) && !empty($comtImg)) {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $serverSmtp;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $userNameSmtp;                     //SMTP username
                $mail->Password   = $passwordSmtp;                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom($setFromSmtp, 'American School Way');
    
                $mail->AddAddress($adminEmail);
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Aviso de actividad';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomUser</span>
                        <br>
                        <label style='font-weight: 700;'>Comentario:</label>
                        <div>
                            <img src='$comtImg' style='margin: 0 0 0 20px;'>
                        </div>
                        <br>
                        <div>   
                            <center>
                                <a href='src/detalles/?id=$consecutivo' style='text-decoration: none; background-color: #005199; color: white; padding: 5px 10px 5px 10px; border-radius: 5px; font-size: 20px;'>Ver</a>
                            </center>
                        </div>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();
            }

            if (isset($_POST['btn_nocerrado'])) {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $serverSmtp;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $userNameSmtp;                     //SMTP username
                $mail->Password   = $passwordSmtp;                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom($setFromSmtp, 'American School Way');
    
                $mail->AddAddress($adminEmail);
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Aviso de actividad';
                    
                $html = "
                    <div>
                        <center><h1 style='color:white; background-color: #005199; margin: auto; width: 60%;'>$consecutivo</h1></center>
                        <br>
                        <label style='font-weight: 700;'>Usuario: </label><span>$nomUser</span>
                        <br>
                        <div>
                            <p style='margin: 0 0 0 20px;'>El ticket se ha marcado como <strong>No solucionado</strong>, por favor revisa la razon por la cual no se soluciono la solucitud del usuario.</p>
                        </div>
                        <br>
                        <div>   
                            <center>
                                <a href='src/detalles/?id=$consecutivo' style='text-decoration: none; background-color: #005199; color: white; padding: 5px 10px 5px 10px; border-radius: 5px; font-size: 20px;'>Ver</a>
                            </center>
                        </div>
                    </div>
                ";

                $mail->Body = $html;
            
                $mail->send();
            }
        }

        $html = $this->head($status, $status2, $user_role);

        $html .= $this->buttonsNav($user_role);
        $html .= $this->showDetails($id, $id2, $lista_formularios, $lista_formularios2, $status, $status2, $user_role, $asigAdmin, $asigAdmin2);
        $html .= $this->comentsDetail($id, $id2, $status, $status2, $list_mensajes, $nomAdmin);

        // $html .= $this->validationStatusMess();
        $html .= $this->changeInputChat();
        $html .= $this->confirmCerrado();

        if ($_POST['cerrar'][0] == "solucionado") {
            $infoUpd = array(
                'Estado' => 'Cerrado'
            );
            $wpdb->update($tableR1,$infoUpd, array('Consecutivo'=>$consecutivo));

            header("Location: src/detalles/?id=$consecutivo");

        } elseif($_POST['cerrar2'][0] == "solucionado"){
            $infoUpd = array(
                'Estado' => 'Cerrado'
            );
            $wpdb->update($tableR2,$infoUpd, array('Consecutivo'=>$consecutivo));

            header("Location: src/detalles/?id=$consecutivo");
        }

        return $html;
    }
}

?>