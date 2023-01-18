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

                    .cont_single{
                        background-color: #ca0004;
                        width: 150px;
                    }

                    .btn_nav{
                        text-align: center;
                    }

                    #create{
                        display: inline-block;
                    }

                    #user{
                        display: inline-block;
                    }

                    .btn_nav a {
                        text-decoration: none;
                        border-radius: 3px;
                        color: #b3b3b3;
                    }

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

    public function buttonsNav()
    {
        $html = "
            <body>
                <div id='cont_btns_nav'>
                    <div class='cont_single' id='create'>
                        <div class='btn_nav'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Crear Ticket</a>
                        </div>
                    </div>
                    <div class='cont_single' id='user'>
                        <div class='btn_nav'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/'>Ver Tickets User</a>
                        </div>
                    </div>
                </div>
        ";

        return $html;
    }

    public function showDetails()
    {
        $html = "
            <p>Traer datos, chat y poner estado</p>
        ";

        return $html;
    }

    public function constructor()
    {
        $html = $this->head();
        
        $html .= $this->buttonsNav();
        $html .= $this->showDetails();

        return $html;
    }
}

?>