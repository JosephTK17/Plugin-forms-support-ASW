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

                    .cont_btn_create{
                        width: 130px;
                        background-color: #ca0004;
                        border-radius: 3px;
                    }

                    .cont_btn_create a {
                        text-align: right;
                        text-decoration: none;
                        color: #b3b3b3;
                        margin: 0 0 0 20px;
                    }

                    .cont_btn_admin{
                        width: 180px;
                        background-color: #ca0004;
                        border-radius: 3px;
                    }

                    .cont_btn_admin a {
                        text-decoration: none;
                        color: #b3b3b3;
                        margin: 0 0 0 25px;
                    }

                    .cont_btn_user{
                        width: 180px;
                        background-color: #ca0004;
                        border-radius: 3px;
                    }

                    .cont_btn_user a {
                        text-decoration: none;
                        color: #b3b3b3;
                        margin: 0 0 0 25px;
                    }
                    
                </style>
            </head>
        ";
        
        return $html;
    }

    public function buttonsNav()
    {
        $html = "
            <div id='cont_btns'>
                <div class='cont_btn_create'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Crear Ticket</a>
                </div>
                <br>

                <div class='cont_btn_admin'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets'>Ver Tickets Admin</a>
                </div>
                <br>

                <div class='cont_btn_user'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/'>Ver Tickets User</a>
                </div>
            </div>
        ";

        return $html;
    }

    public function include()
    {
        $html = $this->head();

        $html .= $this->buttonsNav();

        return $html;
    }
}

?>