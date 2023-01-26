<?php
    global $wpdb;

    $tabla = "{$wpdb->prefix}formularios";

    $query = "SELECT * FROM $tabla";
    $lista_formularios = $wpdb->get_results($query, ARRAY_A);
    if (empty($lista_formularios)) {
        $lista_formularios = array();
    }   
?>
<div class="wrap">
    <?php
        echo "<h1>". get_admin_page_title()."</h1>";
    ?>
    <br>

    <table class="wp-list-table widefat fixed striped pages">
        <thead>
            <th>FormularioId</th>
            <th>Nombre</th>
        </thead>
        <tbody id="the-list">
            <?php
                foreach ($lista_formularios as $key => $value) {
                    $formId = $value['FormularioId'];
                    $name = $value['Nombre'];

                    echo "
                        <tr>
                            <td>$formId</td>
                            <td>$name</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</div>
