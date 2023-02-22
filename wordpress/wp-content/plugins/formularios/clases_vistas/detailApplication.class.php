<?php

class detailApplication {

    public function head()
    {
        $html = "";

        $html .= "
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                <style>

                     #cont_btns_nav{
                        height: 50px;
                        width: 100%;
                        background-color: #4f6df5;
                        padding: 8px;
                        text-align: center;
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
                        border-radius: 3px;
                        background-color: #304293;
                        text-decoration: none;
                        color: white;
                    }

                    #create{
                        margin: 0 15% 0 0%;
                    }

                    #create a{
                        padding: 10px 22px 10px 22px;
                    }

                    #admin a{
                        padding: 10px 30px 10px 30px;
                    }

                    #user a{
                        padding: 10px 34px 10px 34px;
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
                        padding: 15px;
                        box-shadow: 0px 0px 10px gray;
                        margin-top: 50px;
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
                    }

                    #estado form{
                        text-align: center;
                    }

                    .cont_chat{
                        height: 300px;
                        width: 100%;
                        border: 1px solid #ddd;
                        background: #f1f1f1;
                        overflow-y: scroll;
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

            ";
        } else {

            $html .= "

                    #cpnt_menng_user{
                        text-align: right;
                        font-size: 15px;
                    }
                
            ";
        }

        $html .= "
                    #mensaje{
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
                    <div class='btn_nav' id='create'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                    </div>
        ";

        if (is_super_admin()) {
            $html .= "
                    <div class='btn_nav' id='admin'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/?tUrlId=4'>Ver Tickets</a>
                    </div>
                </div>
            ";
        } else {
            $html .= "
                    <div class='btn_nav' id='user'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/?tUrlIdUc=4'>Mis Tickets</a>
                    </div>
                </div>
            ";
        }

        return $html;
    }

    public function showDetails($id, $id2, $lista_formularios, $lista_formularios2, $status, $status2)
    {

        $html = "";

        if ($id[0]['FormularioId']  == 1 && $status[0]['Estado'] != "Cerrado") {

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
                    <h3 style='text-align: center;'>Estado Ticket</h3>
                        <div class='stepwizard'>
                            <div class='stepwizard-row setup-panel'>
                    ";

                    if($estado == 'Solicitado') {

                        $html .= "
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Solicitado</p>
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
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En revisión</p>
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
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En proceso</p>
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
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Terminado</p>
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
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En pruebas</p>
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
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En pruebas</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Publicado</p>
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
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Solicitado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En revisión</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En proceso</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Terminado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>En pruebas</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Publicado</p>
                                </div>
                                <div class='stepwizard-step'>
                                        <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                    <p style='text-decoration: underline;'>Cerrado</p>
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
                                    <label>Área:</label>
                                    <p>$area</p>
                                </div>
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
                    ";

                    if (is_super_admin()) {
                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST'>
                                    <label>Actualizar estado: </label>
                                    <br>
                                    <select name='select_status' required>
                                        <option value=''>Selecciona un estado</option>
                                        <option>En revisión de detalles</option>
                                        <option>En proceso</option>
                                        <option>Terminado</option>
                                        <option>En pruebas</option>
                                        <option>Publicado</option>
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
                                <form method='POST' name='btn_solucionado[]'>
                                    <button type='submit' name='cerrar[]' value='solucionado'>Solucionado</button>
                                </form>
                            </div>
                        </div>
                        ";
                    }
                 
            }
        } elseif ($id2[0]['FormularioId'] == 2 && $status2[0]['Estado'] != "Cerrado") {

            foreach ($lista_formularios2 as $key => $value) {
                $consecutivo2 = $value['Consecutivo'];
                $date2 = $value['Fecha'];
                $solicitante2 = $value['Solicitante'];
                $area = $value['Área'];
                $descripcion = $value['Descripción'];
                $estado2 = $value['Estado'];
                $sede = $value['Sede'];

                $html .= "
                    <h3 style='text-align: center;'>Estado Ticket</h3>
                        <div class='stepwizard'>
                            <div class='stepwizard-row setup-panel'>
                    ";

                if($estado2 == 'Solicitado') {

                    $html .= "
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Solicitado</p>
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
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>En revisión</p>
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
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>En revisión</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Respuesto</p>
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
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>En revisión</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Respuesto</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Terminado</p>
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
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Solicitado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>En revisión</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Respuesto</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Terminado</p>
                            </div>
                            <div class='stepwizard-step'>
                                    <i class='bi bi-check-circle-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='gray' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
                                <p style='text-decoration: underline;'>Cerrado</p>
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
                                <label>Área:</label>
                                <p>$area</p>
                            </div>
                        </div>
                        <div class='campos' id='descripcion'>
                            <label>Descripción:</label>
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
                            <form method='POST'>
                                <label>Actualizar estado: </label>
                                <br>
                                <select name='select_status' required>
                                    <option value=''>Selecciona un estado</option>
                                    <option>En revisión de detalles</option>
                                    <option>Respuesto/cambio solicitado a compras</option>
                                    <option>Terminado</option>
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
                            <form method='POST' name='btn_solucionado[]'>
                                <button type='submit' name='cerrar2[]' value='solucionado'>Solucionado</button>
                            </form>
                        </div>
                    </div>
                    ";
                }
            }
        } else if( $status[0]['Estado'] == "Cerrado" || $status2[0]['Estado'] == "Cerrado") {
            $html = "
                <h1>Cerrado</h1>
            ";
        }

        return $html;
    }

    public function comentsDetail($id, $id2, $status, $status2, $list_mensajes)
    {
        $html = "";
        if ($id[0]['FormularioId'] == 1) {

            if ($status[0]["Estado"] == "En revisión de detalles" || $status[0]["Estado"] == "En proceso" || $status[0]["Estado"] == "Terminado" || $status[0]["Estado"] == "En pruebas" || $status[0]["Estado"] == "Publicado" || $status[0]["Estado"] == "Cerraado") {

                $html .= "
                    <div class='cont_chat'>
                        <div class='cont_mensajes'>
                ";

                foreach ($list_mensajes as $key => $value) {
                    $nombreUsuario = $value['Nombre usuario'];
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
                                            <div>
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
                                            <div>
                                                $imagen
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
                    <div class='cont_btn_chat'>
                        <form method='POST'>
                            <input type='file' name='imagen[]'>
                            <textarea placeholder='Mensaje' id='mensaje' name='mensaje[]'></textarea>
                            <button type='submit' id='btn_mensaje' name='btn_mensaje[]'><i class='bi bi-send-check-fill'></i><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' class='bi bi-send-check-fill' viewBox='0 0 16 16'><path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z'/><path d='M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z'/>
                          </svg></button>
                        </form>
                    </div>
                </div>
                ";

            } else {

                $html .= "
                </div>
                ";

            }
        } elseif ($id2[0]['FormularioId'] == 2) {

            if ($status2[0]["Estado"] == "En revisión de detalles" || $status2[0]["Estado"] == "Respuesto/cambio solicitado a compras" || $status2[0]["Estado"] == "Terminado" || $status2[0]["Estado"] == "Cerraado") {

                $html .= "
                    <div>
                        <div class='cont_mensajes'>
                            <p></p>
                        </div>
                        <div>
                            <form method='POST'>
                                <input type='text' placeholder='Mensaje' id='mensaje' name='mensaje[]'>
                                <button type='submit' id='btn_mensaje' name='btn_mensaje[]'>Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
                ";

            } else {

                $html .= "
                </div>
                ";

            }
        }

        return $html;
    }

    public function notification()
    {   
        $html = "
            <div aria-live='polite' aria-atomic='true' class='position-relative'>
            <!-- Position it: -->
            <!-- - `.toast-container` for spacing between toasts -->
            <!-- - `.position-absolute`, `top-0` & `end-0` to position the toasts in the upper right corner -->
            <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
            <div class='toast-container position-absolute top-0 end-0 p-3'>
        
            <!-- Then put toasts within -->
            <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                <div class='toast-header'>
                    <img src='...' class='rounded me-2' alt='...'>
                    <strong class='me-auto'>Bootstrap</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                </div>
                <div class='toast-body'>
                    See? Just like this.
                    <a href='#'>Ver</a>
                </div>
            </div>
            </div>
        </div>
        ";

        return $html;
    }

    public function notificationJquery()
    {
        $html = "
            <script language='JavaScript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js' integrity='sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>

            <script language='JavaScript'>
                $(document).ready(function(){
                    $('.toast').toast('show');
                })
            </script>
        ";

        return $html;
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
        $queryComt = "SELECT * FROM $tableComt WHERE Consecutivo = '$consecutivo'";
        $list_mensajes = $wpdb->get_results($queryComt, ARRAY_A);
        if (empty($list_mensajes)) {
            $list_mensajes = array();
        }   

        $html = $this->head();

        $html .= $this->buttonsNav();
        $html .= $this->showDetails($id, $id2, $lista_formularios, $lista_formularios2, $status, $status2);
        $html .= $this->comentsDetail($id, $id2, $status, $status2, $list_mensajes);

        $html .= $this->notification();
        $html .= $this->notificationJquery();

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