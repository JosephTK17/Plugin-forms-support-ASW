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

                    #index a{
                        padding: 10px 37px 10px 37px;
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
                        margin: 0 240px 0 0;
                        display: inline-block;
                    }

                    #fecha{
                        display: inline-block;
                    }

                    #solicitante{
                        margin: 0 154px 0 0;
                        display: inline-block;
                    }

                    #area{
                        display: inline-block;
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
                    <div class='btn_nav' id='index'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/crear-ticket/'>Principal</a>
                    </div>
                    <div class='btn_nav' id='create'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                    </div>
        ";

        if (is_super_admin()) {
            $html .= "
                    <div class='btn_nav' id='admin'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets/'>Ver Tickets</a>
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
                        ";
                    } else {
                        $html .= "
                            <div class='campos' id='estado'>
                                <form method='POST' name='btn_solucionado[]'>
                                    <button type='submit' name='cerrar[]' value='solucionado'>Solucionado</button>
                                </form>
                            </div>
                        ";
                    }

                    $html .= "
                    </body>
                    ";                  
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
                            <label>Fecha solicitud:</label>
                            <p>$date2</p>
                        </div>
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
                    ";
                }
                
                if (!is_super_admin()) {
                    $html .= "
                        <div class='campos' id='estado'>
                            <form method='POST' name='btn_solucionado[]'>
                                <button type='submit' name='cerrar2[]' value='solucionado'>Solucionado</button>
                            </form>
                        </div>
                    ";
                }

                $html .= "
                    </body>
                ";
            }
        } else if( $status[0]['Estado'] == "Cerrado" || $status2[0]['Estado'] == "Cerrado") {
            $html = "
                <h1>Cerrado</h1>
            ";
        }

        return $html;
    }

    public function constructor($consecutivo)
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

        //idD
        $queryId = "SELECT FormularioId FROM $tableR1 WHERE Consecutivo = '$consecutivo'";
        $id = $wpdb->get_results($queryId, ARRAY_A);

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

        //idS
        $queryId2 = "SELECT FormularioId FROM $tableR2 WHERE Consecutivo = '$consecutivo'";
        $id2 = $wpdb->get_results($queryId2, ARRAY_A);

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

        $html = $this->head();

        $html .= $this->buttonsNav();
        $html .= $this->showDetails($id, $id2, $lista_formularios, $lista_formularios2, $status, $status2);

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