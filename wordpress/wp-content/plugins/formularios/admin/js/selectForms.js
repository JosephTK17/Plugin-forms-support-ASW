// jQuery(document).ready(function($) {
// });

var sedes_Bogotá = new Array("Sede", "Sede Álamos", "Sede Chapinero calle 45", "Sede Corferias", "Sede La Felicidad - Fontibón", "Sede Norte", "Sede Paseo Villa del Rio", "Sede Plaza de las Américas", "Sede Bosa", "Sede Restrepo", "Sede Suba", "Sede Titán Plaza", "Sede Tunal")
var sedes_Soacha = new Array("Sede", "Sede Soacha")
var sedes_Mosquera = new Array("Sede", "Sede Mosquera")
var sedes_Cali = new Array("Sede", "Sede Cali Av. Estación")
var sedes_Manizales = new Array("Sede", "Sede Manizales Sect. Triángulo")
var sedes_Medellín = new Array("Sede", "Sede Medellín Florida", "Sede Medellín Premium", "Sede Itagüí")
var sedes_Villavicencio = new Array("Sede", "Sede Villavicencio Llano Centro")

//filtro de sedes según la ciudad
function cambiar_sedes() {
    var ciudad;
    ciudad = document.f1.ciudades[document.f1.ciudades.selectedIndex].value;

    if (ciudad != "") {

        asw_sedes = eval("sedes_" + ciudad)

        num_sedes = asw_sedes.length

        document.f1.sedes.length = num_sedes

        for (i = 0; i < num_sedes; i++) {
            document.f1.sedes.options[i].value = asw_sedes[i];

            document.f1.sedes.options[i].text = asw_sedes[i];
        }
    } else {
        document.f1.sedes.length = 1;

        document.f1.sedes.options[0].value = "";
        document.f1.sedes.options[0].text = "Sede"
    }

    document.f1.sedes.options[0].selected = true;
}

console.log('hola');