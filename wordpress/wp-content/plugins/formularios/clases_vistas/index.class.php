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
                        height: 50px;
                        background-color: #4f6df5;
                        padding: 8px;
                    }

                    #index a{
                        padding: 10px 37px 10px 37px;
                        margin-right: 108px;
                    }

                    #create a{
                        padding: 10px 22px 10px 22px;
                        margin-right: 108px;
                    }

                    #admin a{
                        padding: 10px 30px 10px 30px;
                    }

                    #user a{
                        padding: 10px 30px 10px 30px;
                    }

                    .btn_nav{
                        display: inline-block;
                        margin-top: 11px;
                        text-align: center;
                    }

                    #index a{
                        box-shadow: 0px 0px 10px black;
                        background-color: gray;
                    }

                    .btn_nav a {
                        background-color: #304293;
                        border-radius: 3px;
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
                <div class='btn_nav' id='index'>
                    <a href='#/'>Principal</a>
                </div>
                <div class='btn_nav' id='create'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/formularios/'>Enviar Ticket</a>
                </div>
        ";

        if (is_super_admin()) {

            $html .= "
                <div class='btn_nav' id='admin'>
                    <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets'>Ver Tickets</a>
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

    public function include()
    {
        $html = $this->head();

        $html .= $this->buttonsNav();

        return $html;
    }
}

?>