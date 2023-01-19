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
                        height: 30px;
                        background-color: #4f6df5;
                        padding: 20px;
                    }

                    .cont_single{
                        background-color: #304293;
                        border-radius: 3px;
                        width: 150px;
                        display: inline-block;
                    }

                    .btn_nav{
                        text-align: center;
                    }

                    #index{
                        background-color: gray;
                    }

                    .btn_nav a {
                        text-decoration: none;
                        color: white;
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
            <div id='cont_btns'>
                <div class='cont_single' id='index'>
                    <div class='btn_nav'>
                        <a href='#/'>Principal</a>
                    </div>
                </div>
                <div class='cont_single' id='create'>
                    <div class='btn_nav'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                    </div>
                </div>
        ";

        if (is_super_admin()) {

            $html .= "
            <div class='cont_single' id='admin'>
                <div class='btn_nav'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets'>Ver Tickets</a>
                </div>
            </div>
            ";
        }


        if (!is_super_admin()) {

            $html .= "
                <div class='cont_single' id='user'>
                    <div class='btn_nav'>
                        <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/ver-tickets-user/'>Mis Tickets</a>
                    </div>
                </div>
            </div>
            ";
        }

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