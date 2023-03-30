<?php

class formFuntions{

    public function getForms($FormularioId)
    {
        global $wpdb;
        $table = "{$wpdb->prefix}formularios";
        $query = "SELECT * FROM $table WHERE FormularioId = '$FormularioId'";
        $data = $wpdb->get_results($query, ARRAY_A);

        if (empty($data)) {
            $data = array();
        }

        return $data[0];
    }

    public function head()
    {
        $html = "
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
                        margin: auto;
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
                        min-width: 100px;
                        padding: 15px 15px;
                        font-weight: 700;
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

                    #create a {
                        background-color: #808080;
                    }

                    #create a:hover{
                        background-color: #6F6F6F;
                        transition: background-color 0.5s;
                    }

                    #admin a{
                        min-width: 100px !important;
                    }

                    #type{
                        border: 2px solid #e0e0ec!important;
                        height: 30px; width: 100%;
                        text-align: center;
                        font-size: 20px;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                        font-weight: bold !important;
                        color: gray;
                        margin: 15px 0 30px 0;
                    }

                    .wrap{
                        text-align: center;
                    }

                    .form-group{
                        margin: auto;
                    }

                    .form-group div{
                        margin-bottom: 15px;
                        display: inline-block;
                    }

                    .form-group div label{
                        font-weight: 200;
                        margin:  0 0 0 15px;
                    }

                    .cont_inpt_form{
                        margin:  0 0 0 15px;
                    }

                    .inpt_form{
                        border: 2px solid #e0e0ec!important;
                        border-radius: 0;
                        margin-top: 15px;
                        padding: 0.75rem!important;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                        width: 300px;
                    }

                    #solicitud{
                        width: 620px;
                    }

                    .cont_btn_dllo{
                        text-align: center;
                        width: 100%;
                        display: block !important;
                    }

                    #btnguardar1{
                        cursor: pointer;
                        font-weight: 500;
                        font-size: 20px;
                        height: 50px;
                        width: 150px;
                        border: none;
                        border-radius: 5px;
                        color: white;
                        background-color: #304293;
                    }

                    #btnguardar1:hover{
                        background-color: #233170;
                        transition: background-color 0.5s;
                    }

                    #descripcion{
                        width: 620px;
                    }

                    .conr_btn_spte{
                        text-align: center;
                        width: 100%;
                        display: block !important;
                    }

                    #btnguardar2{
                        cursor: pointer;
                        font-weight: 500;
                        font-size: 20px;
                        height: 50px;
                        width: 150px;
                        border: none;
                        border-radius: 3px;
                        color: white;
                        background-color: #304293;
                    }

                    #btnguardar2:hover{
                        background-color: #233170;
                        transition: background-color 0.5s;
                    }
                    
                </style>
            </head>
        ";
        
        return $html;
    }

    public function buttonsNav()
    {
        $html= "";

        $html .= "
            <body>
            </div>
            <div id='general_cont'>
                <div id='cont_btns'>
                    <div class='btns_nav'>
                        <ul>
                            <li id='create'>
                                <a href='#'>Enviar Ticket</a>
                            </li>
        ";

        //obtener rol
        $current_user = wp_get_current_user();

        $user_info = get_userdata($current_user->ID);
        $user_role = $user_info->roles[0];

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

    public function openForm()
    {
        $html = "
            <div class='wrap'>
                <form name='f1' method='POST'>
                    <div id='form_select' style='text-align: center;'>
                        <select name='type[]' id='type' class='form-control type_list' onchange='change_form()' required style=''>
                            <option value=''>selecionar area</option>
                            <option value='1'>Desarrollo</option>
                            <option value='2'>Soporte</option>
                        </select>
                    </div>
                </form>
        ";
        return $html;
    }

    public function desarrolloForm($userName)
    {
        $html = "
            <div class='cont_forms' id='cont_dllo' style='display:none'>
                <form id='desarrollo' name='f2' method='POST'>
                    <div class='form-group'>
                        <div>
                            <label>Nombre</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <input class='inpt_form' name='solicitante[]' id='solicitante' value='$userName'>
                            </div>
                        </div>

                        <div>
                            <label>Área a la que perteneces</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <select class='inpt_form' name='area[]' id='area' class='col-sm-8' required>
                                    <option value=''>selecciona el área</option>
                                    <option value='Academico'>Académico</option>
                                    <option value='Admisiones'>Admisiones</option>
                                    <option value='Administrativa'>Administrativa</option>
                                    <option value='Atención al Cliente'>Atención al Cliente</option>
                                    <option value='Contact Center'>Contact Center</option>
                                    <option value='Compras'>Compras</option>
                                    <option value='Calidad'>Calidad</option>
                                    <option value='Apoyo Financiero y SST'>Apoyo Financiero y SST</option>
                                    <option value='Talento Humano'>Talento Humano</option>
                                    <option value='Mercadeo'>Mercadeo</option>
                                    <option value='TICS'>TICS</option>
                                    <option value='Juridico'>Jurídico</option>
                                    <option value='Contabilidad'>Contabilidad</option>
                                    <option value='Infraestructura'>Infraestructura</option>
                                    <option value='PEI'>PEI</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label>Solicitud</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <textarea class='inpt_form' name='solicitud[]' id='solicitud' minlength='20' maxlength='200' required></textarea>
                            </div>
                        </div>
                        <br>

                        <div>
                            <label>Para Que</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <textarea class='inpt_form' name='paraQue[]' id='paraQue' minlength='20' maxlength='200' required></textarea>
                            </div>
                        </div>

                        <div>
                            <label>Criterios de aceptación</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <textarea class='inpt_form' name='criterios[]' id='criterios' minlength='20' maxlength='200' required></textarea>
                            </div>
                        </div>

                        <div class='cont_btn_dllo'>
                            <button type='submit' id='btnguardar1' name='btnguardar1[]' value='1'>Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        ";
        
        return $html;
    }

    public function soporteForm($userName)
    {
        $html = "
            <div class='cont_forms' id='cont_spte' style='display: none'>
                <form id='soporte' name='f3' method='POST'>
                    <div class='form-group'>
                        <div>
                            <label>Nombre</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <input class='inpt_form' name='solicitante2[]' id='solicitante2' value='$userName'>
                            </div>
                        </div>

                        <div>
                            <label>Área a la que perteneces</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <select class='inpt_form' name='area2[]' id='area' class='col-sm-8' required>
                                    <option value=''>selecciona el área</option>
                                    <option value='Academico'>Académico</option>
                                    <option value='Admisiones'>Admisiones</option>
                                    <option value='Administrativa'>Administrativa</option>
                                    <option value='Atención al Cliente'>Atención al Cliente</option>
                                    <option value='Contact Center'>Contact Center</option>
                                    <option value='Compras'>Compras</option>
                                    <option value='Calidad'>Calidad</option>
                                    <option value='Apoyo Financiero y SST'>Apoyo Financiero y SST</option>
                                    <option value='Talento Humano'>Talento Humano</option>
                                    <option value='Mercadeo'>Mercadeo</option>
                                    <option value='TICS'>TICS</option>
                                    <option value='Juridico'>Jurídico</option>
                                    <option value='Contabilidad'>Contabilidad</option>
                                    <option value='Infraestructura'>Infraestructura</option>
                                    <option value='PEI'>PEI</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label>Descripción</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <textarea class='inpt_form' name='descripcion[]' id='descripcion' minlength='20' maxlength='200' required></textarea>
                            </div>
                        </div>

                        <div>
                            <label>Ciudad</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <select class='inpt_form' name='ciudades[]' id='ciudades' onchange='cambiar_sedes()' required>
                                    <option value=''>selecciona la ciudad</option>
                                    <option>Bogotá</option>
                                    <option>Soacha</option>
                                    <option>Mosquera</option>
                                    <option>Cali</option>
                                    <option>Manizales</option>
                                    <option>Medellín</option>
                                    <option>Villavicencio</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label>Sede</label>
                            <span style='color: red;'>*</span>
                            <br>
                            <div class='cont_inpt_form'>
                                <select class='inpt_form' name='sedes[]' id='sedes' required>
                                    <option value=''>selecciona la sede</option>
                                </select>
                            </div>
                        </div>

                        <div class='conr_btn_spte'>
                            <button type='submit' id='btnguardar2' name='btnguardar2[]' value='2'>Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        ";

        return $html;
    }

    public function getUser()
    {
        $user = get_current_user_id();

        if ($user != 0) {
            
            $userInfo = get_userdata($user);
            $userName = $userInfo->user_login;

            // if (empty($userName)) {
            //     $userName = $userInfo->user_login;
            // }
        }

        return $userName;

    }

    public function selectForm()
    {
        echo "<script language='JavaScript'>
                function change_form(){
                    var form = document.f1.type[document.f1.type.selectedIndex]. value;

                    if (form == 1) {
                        document.getElementById('cont_dllo').style.display = 'block'
                        document.getElementById('cont_spte').style.display = 'none'
                    } else if (form == 2) {
                        document.getElementById('cont_dllo').style.display = 'none'
                        document.getElementById('cont_spte').style.display = 'block'
                    } else {
                        document.getElementById('cont_dllo').style.display = 'none'
                        document.getElementById('cont_spte').style.display = 'none'
                    }
                }
            </script>";
    }

    public function selectSede()
    {
        echo "<script language='JavaScript'>
            
                var sedes_Bogotá = new Array ('Sede', 'Álamos', 'Chapinero calle 45', 'Corferias', 'La Felicidad - Fontibón', 'Norte', 'Paseo Villa del Rio', 'Plaza de las Américas', 'Bosa', 'Restrepo', 'Suba', 'Titán Plaza', 'Tunal')
                var sedes_Soacha = new Array ('Sede', 'Soacha')
                var sedes_Mosquera = new Array ('Sede', 'Mosquera')
                var sedes_Cali = new Array ('Sede', 'Cali Av. Estación')
                var sedes_Manizales = new Array ('Sede', 'Manizales Sect. Triangulo')
                var sedes_Medellín = new Array ('Sede', 'Medellin Florida', 'Medellin Premium', 'Itagüi')
                var sedes_Villavicencio = new Array ('Sede', 'Villavicencio Llano Centro')

                //filtro de sedes según la ciudad
                function cambiar_sedes(){
                    var ciudad = document.f3.ciudades[document.f3.ciudades.selectedIndex]. value;
                    
                    if(ciudad != ''){
                        
                        asw_sedes = eval('sedes_' + ciudad)
                        
                        num_sedes = asw_sedes.length
                        
                        document.f3.sedes.length = num_sedes
                        
                        for(i=0; i<num_sedes; i++){ 
                            document.f3.sedes.options[i].value = asw_sedes[i];

                            document.f3.sedes.options[i].text = asw_sedes[i];
                        }
                    }else{
                        document.f3.sedes.length = 1;
                        
                        document.f3.sedes.options[0].value = '';
                        document.f3.sedes.options[0].text = 'Sede'
                    }
                    
                    document.f3.sedes.options[0].selected = true;
                }
            </script>";
    }

    public function sendEmailAdmin($adminEmail)
    {
        $email = $adminEmail;

        var_dump($email);
    }

    public function constructor($FormularioId)
    {
        $form = $this->getForms($FormularioId);
        $userName = $this->getUser();
        $id = $form['FormularioId'];
        $name = $form['Nombre'];

        $html = $this->getUser();
        $html = $this->head();

        $html .= $this->buttonsNav();
        $html .= $this->openForm();
        $html .= $this->desarrolloForm($userName);
        $html .= $this->soporteForm($userName);
        $html .= $this->selectForm();
        $html .= $this->selectSede();
        
        return $html;
    }
}
?>