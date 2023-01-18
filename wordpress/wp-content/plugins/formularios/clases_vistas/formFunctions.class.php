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
                    
                    .cont_single{
                        background-color: #ca0004;
                        width: 150px;
                    }

                    .btn_nav{
                        text-align: center;
                    }

                    #admin{
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

                    .cont_forms{
                        border: 1px solid black;
                    }

                    .form-group div label{
                        padding:  0 0 0 150px;
                    }

                    .cont_inpt_form{
                        text-align: center;
                    }

                    .inpt_form{
                        border: 2px solid #e0e0ec!important;
                        border-radius: 0;
                        margin-top: 15px;
                        padding: 0.75rem!important;
                        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05)!important;
                        width: 350px;
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
                    <div class='cont_single' id='admin'>
                        <div class='btn_nav'>
                            <a href='http://localhost/formulario_soporte_desarrollo/wordpress/index.php/pagina-tickets'>Ver Tickets Admin</a>
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

    public function openForm()
    {
        $html = "
            <div class='wrap'>
                <form name='f1' method='POST'>
                    <div id='form_select' style='text-align: center;'>
                        <select name='type[]' id='type' class='form-control type_list' onchange='change_form()' required style='height: 30px; width: 50%; text-align: center; font-size: 15px;'>
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
                <h4 style='color: #84858d; text-align: center;'>Desarrollo</h4>
                <form id='desarrollo' name='f2' method='POST'>
                    <div class='form-group'>
                        <div>
                            <label>Correo*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <input class='inpt_form' name='solicitante[]' id='solicitante' value='$userName'>
                            </div>
                        </div>
                        <br>

                        <div>
                            <label>Área*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <select class='inpt_form' name='area[]' id='area' class='col-sm-8' required>
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
                        <br>

                        <div>
                            <label>Solicitud*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <textarea class='inpt_form' name='solicitud[]' id='solicitud' required></textarea>
                            </div>
                        </div>
                        <br>

                        <div>
                            <label>Para Que*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <textarea class='inpt_form' name='paraQue[]' id='paraQue' required></textarea>
                            </div>
                        </div>
                        <br>

                        <div>
                            <label>Criterios de aceptación*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <textarea class='inpt_form' name='criterios[]' id='criterios' required></textarea>
                            </div>
                        </div>
                        <br>

                        <button type='submit' id='btnguardar1' name='btnguardar1[]' value='1'>Enviar</button>
                    </div>
                </form>
            </div>
        </body>
        ";
        
        return $html;
    }

    public function soporteForm($userName)
    {
        $html = "
            <div class='cont_forms' id='cont_spte' style='display: none'>
                <h4 style='color: #84858d; text-align: center;'>Soporte</h4>
                <form id='soporte' name='f3' method='POST'>
                    <div class='form-group'>
                        <div>
                            <label>Correo*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <input class='inpt_form' name='solicitante2[]' id='solicitante2' value='$userName'>
                            </div>
                        </div>
                        <br>

                        <div>
                            <label>Área*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <select class='inpt_form' name='area2[]' id='area' class='col-sm-8' required>
                                    <option value=''>Área</option>
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
                        <br>

                        <div>
                            <label>Área*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <textarea class='inpt_form' name='descripcion[]' id='descripcion' placeholder='Descripción' required></textarea>
                            </div>
                        </div>
                        <br>

                        <div>
                            <label>Ciudad*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <select class='inpt_form' name='ciudades[]' id='ciudades' onchange='cambiar_sedes()' required>
                                    <option value=''>Ciudad</option>
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
                        <br>

                        <div>
                            <label>Sede*</label>
                            <br>
                            <div class='cont_inpt_form'>
                                <select class='inpt_form' name='sedes[]' id='sedes' required>
                                    <option value=''>Sede</option>
                                    
                                </select>
                            </div>
                        </div>
                        <br>

                        <button type='submit' id='btnguardar2' name='btnguardar2[]' value='2'>Enviar</button>
                    </div>
                </form>
            </div>
        </body>
        ";

        return $html;
    }

    // public function typeForm($id)
    // {  
    //     $html = "";

    //     if($id == '1'){
    //         $html = "
    //             <form id='desarrollo' name='f2' method='POST'>
    //                 <div class='form-group'>
    //                     <label>Área</label>
    //                         <div>
    //                             <select name='area[]' id='area' class='col-sm-8' required>
    //                                 <option value=''>Seleccionar</option>
    //                                 <option value='Academico'>Académico</option>
    //                                 <option value='Admisiones'>Admisiones</option>
    //                                 <option value='Administrativa'>Administrativa</option>
    //                                 <option value='Atención al Cliente'>Atención al Cliente</option>
    //                                 <option value='Contact Center'>Contact Center</option>
    //                                 <option value='Compras'>Compras</option>
    //                                 <option value='Calidad'>Calidad</option>
    //                                 <option value='Apoyo Financiero y SST'>Apoyo Financiero y SST</option>
    //                                 <option value='Talento Humano'>Talento Humano</option>
    //                                 <option value='Mercadeo'>Mercadeo</option>
    //                                 <option value='TICS'>TICS</option>
    //                                 <option value='Juridico'>Jurídico</option>
    //                                 <option value='Contabilidad'>Contabilidad</option>
    //                                 <option value='Infraestructura'>Infraestructura</option>
    //                                 <option value='PEI'>PEI</option>
    //                             </select>
    //                         </div>
    //                     <label>Solicitud</label>
    //                         <div>
    //                             <textarea name='solicitud[]' id='solicitud' required></textarea>
    //                         </div>
    //                     <br>

    //                     <label>Para qué</label>
    //                         <div>
    //                             <textarea name='paraQue[]' id='paraQue' required></textarea>
    //                         </div>
    //                     <br>

    //                     <label>Criterios de aceptación</label>
    //                         <div>
    //                             <textarea name='criterios[]' id='criterios' required></textarea>
    //                         </div>
    //                     <br>

    //                     <input type='submit' id='btnguardar1' name='btnguardar1' class='page-title-action' value='enviar'>
    //         ";
    //     } elseif($id == '2'){
    //         $html = "
    //             <form id='soporte' name='f2' method='POST'>
    //                 <div class='form-group'>
    //                     <label>Área</label>
    //                     <div>
    //                         <select name='area2[]' id='area' class='col-sm-8' required>
    //                             <option value=''>Seleccionar</option>
    //                             <option value='Academico'>Académico</option>
    //                             <option value='Admisiones'>Admisiones</option>
    //                             <option value='Administrativa'>Administrativa</option>
    //                             <option value='Atención al Cliente'>Atención al Cliente</option>
    //                             <option value='Contact Center'>Contact Center</option>
    //                             <option value='Compras'>Compras</option>
    //                             <option value='Calidad'>Calidad</option>
    //                             <option value='Apoyo Financiero y SST'>Apoyo Financiero y SST</option>
    //                             <option value='Talento Humano'>Talento Humano</option>
    //                             <option value='Mercadeo'>Mercadeo</option>
    //                             <option value='TICS'>TICS</option>
    //                             <option value='Juridico'>Jurídico</option>
    //                             <option value='Contabilidad'>Contabilidad</option>
    //                             <option value='Infraestructura'>Infraestructura</option>
    //                             <option value='PEI'>PEI</option>
    //                         </select>
    //                     </div>
    //                     <br>

    //                     <label>Descripción</label>
    //                         <div>
    //                             <textarea name='descripcion[]' id='descripcion' required></textarea>
    //                         </div>
    //                     <br>

    //                     <label>Ciudad</label>

    //                         <div>
    //                             <select name='ciudades[]' id='ciudades' onchange='cambiar_sedes()' required>
    //                                 <option value=''>Ciudad</option>
    //                                 <option>Bogotá</option>
    //                                 <option>Soacha</option>
    //                                 <option>Mosquera</option>
    //                                 <option>Cali</option>
    //                                 <option>Manizales</option>
    //                                 <option>Medellín</option>
    //                                 <option>Villavicencio</option>
    //                             </select>
    //                         </div>
    //                         <br>

    //                     <label>Sede</label>

    //                         <div>
    //                             <select name='sedes[]' id='sedes' required>
    //                                 <option value=''>Sede</option>
                                    
    //                             </select>
    //                         </div>
    //                         <br>

    //                     <input type='submit' id='btnguardar2' name='btnguardar2' class='page-title-action' value='enviar'>
    //         ";
    //     }
    //     return $html;
    // }

    // public function closeForm()
    // {
    //     $html = "
    //             </div>
    //         </form>
    //     </body>
    //     ";

    //     return $html;
    // }

    public function getUser()
    {
        $user = get_current_user_id();

        if ($user != 0) {
            
            $userInfo = get_userdata($user);
            $userName = $userInfo->first_name;

            if (empty($userName)) {
                $userName = $userInfo->user_login;
            }
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
            
                var sedes_Bogotá = new Array ('Sede', 'Sede Álamos', 'Sede Chapinero calle 45', 'Sede Corferias', 'Sede La Felicidad - Fontibón', 'Sede Norte', 'Sede Paseo Villa del Rio', 'Sede Plaza de las Américas', 'Sede Bosa', 'Sede Restrepo', 'Sede Suba', 'Sede Titán Plaza', 'Sede Tunal')
                var sedes_Soacha = new Array ('Sede', 'Sede Soacha')
                var sedes_Mosquera = new Array ('Sede', 'Sede Mosquera')
                var sedes_Cali = new Array ('Sede', 'Sede Cali Av. Estación')
                var sedes_Manizales = new Array ('Sede', 'Sede Manizales Sect. Triángulo')
                var sedes_Medellín = new Array ('Sede', 'Sede Medellín Florida', 'Sede Medellín Premium', 'Sede Itagüí')
                var sedes_Villavicencio = new Array ('Sede', 'Sede Villavicencio Llano Centro')

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

    public function showApplication($consecutivo, $consecutivo2)
    {
        if (isset($_POST['btnguardar1'][0]) == 1) {
            echo "<script language='JavaScript'>
                    alert('Ticket creado, podras consultarlo con el siguiente consecutivo: $consecutivo');
                    window.location.href = 'http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/';
                </script>";
        } elseif (isset($_POST['btnguardar2'][0]) == 2) {
            echo "<script language='JavaScript'>
                    alert('Ticket creado, podras consultarlo con el siguiente consecutivo: $consecutivo2');
                    window.location.href = 'http://localhost/formulario_soporte_desarrollo/wordpress/index.php/detalles/';
                </script>";
        }
    }

    public function constructor($FormularioId, $consecutivo, $consecutivo2)
    {
        $form = $this->getForms($FormularioId);
        $userName = $this->getUser();
        $id = $form['FormularioId'];
        $name = $form['Nombre'];

        $html = $this->getUser();
        $html = $this->showApplication($consecutivo, $consecutivo2);
        $html .= $this->head();

        $html .= $this->buttonsNav();
        $html .= $this->openForm();
        // $html .= $this->typeForm($id);
        // $html .= $this->closeForm();
        $html .= $this->desarrolloForm($userName);
        $html .= $this->soporteForm($userName);
        $html .= $this->selectForm();
        $html .= $this->selectSede();
        
        return $html;
    }
}
?>