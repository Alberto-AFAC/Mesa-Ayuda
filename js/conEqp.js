$.ajax({
        url: '../php/conEquipo.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        if (obj == 0) {
            nota1 = '¡Agregue datos necesarios de su equipo, para realizar su reporte!'
            $("#nota1").html(nota1);
            $("#div1").hide();
            $("#nota2").hide();
            $("#div2").show();
        } else {
            x = 0;
            equipo = "<div class='panel-body'><table class='table table-bordered' cellspacing='0' width='100%'><tr><th style='width:2%;'>N°</th><th style='width:20%;'>Marca</th><th style='width:20%;'>Número de serie </th><th style='width:20%;'>Versión Windows</th><th style='width:10%;'>Elija su equipo </th></tr>";
            for (i = 0; i < res.length; i++) {
                x++;
                if (obj.data[i].proceso == 'asignado') {
                    datos = obj.data[i].marca_cpu + "*" + obj.data[i].serie_cpu + "*" + obj.data[i].version_windows + '*' + obj.data[i].id_equipo;
                    equipo += "<tr'><td>" + x + "</td><td>" + obj.data[i].marca_cpu + "</td><td>" + obj.data[i].serie_cpu + "</td><td>" + obj.data[i].version_windows + "</td><td><a href='#'  onclick='eqpo(" + '"' + datos + '"' + ");'><input name='eqpo' type='radio'/></a></td></tr>";
                }
            }
            equipo += "</table></div>"
        }
        $("#equipo").html(equipo);
    })
    //muestra detalles del equipo al selecionar
function eqpo(datos) {
    var d = datos.split("*");
    $("#modelo").val(d[0]);
    $("#serie").val(d[1]);
    $("#verwind").val(d[2]);
    $("#idequipo").val(d[3]);
}
//registro de reporte
function reporte() {

    var nempleado = document.getElementById('nempleado').value;
    var servicio = document.getElementById('servicio').value;
    var intervencion = document.getElementById('intervencion').value;
    var descripcion = document.getElementById('descripcion').value;
    var modelo = document.getElementById('modelo').value;
    var serie = document.getElementById('serie').value;
    var obser = document.getElementById('obser').value;
    var verwind = document.getElementById('verwind').value;
    var idequipo = document.getElementById('idequipo').value;
    var proceso = document.getElementById('proceso').value;

    if (nempleado == '' || servicio == 'x' || intervencion == 'x' || descripcion == '0' || modelo == '' || obser == '' || verwind == '' || idequipo == '') {
        $("#vacio").toggle("toggled");
        setTimeout(function() {
            $('#vacio').toggle('toggled');
        }, 2000);
        return;
    } else {
        //bloquear boton 
  //      document.getElementById('button').disabled = 'false';
//        document.getElementById('button').style.color = "silver";
        $.ajax({
            url: '../php/rptUsu.php',
            type: 'POST',
            data: 'nempleado=' + nempleado + '&servicio=' + servicio + '&intervencion=' + intervencion + '&descripcion=' + descripcion + '&modelo=' + modelo + '&serie=' + serie + '&verwind=' + verwind + '&obser=' + obser + '&idequipo=' + idequipo + '&proceso=' + proceso + '&opcion=registrar'
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta == 0) {
                $("#button").hide();
                $("#exito").toggle("toggled");
                setTimeout(function() {
                    $("#exito").toggle("toggled");
                }, 15000);
            } else if (respuesta == 1) {
                $("#error").toggle("toggled");
                setTimeout(function() {
                    $("#error").toggle("toggled");
                }, 2000);
            }
        });
    }
}
//condición de radio button es equipo o no
$(document).ready(function() {
    $("input[type=radio]").click(function(event) {
        var valor = $(event.target).val();
        if (valor == "si") {
            $("#nota2").hide();
            $("#nota1").show();
            $("#proceso").val("asignado");
            limpiarCampo();

        } else if (valor == "no") {
            $("#nota1").hide();
            $("#nota2").show();
            $(".pro1").hide();
            $(".pro2").show();
            $("#proceso").val("designado");
            limpiarCampo();
        } else {
            // Otra cosa
        }
    });
});
//condición de radio button crear otro reporte
$(document).ready(function() {
    $("input[type=radio]").click(function(event) {
        var valor = $(event.target).val();
        if (valor == "true") {
            $("#equipo").show();
            $("#div2").hide();
            limpiarCampo();
            document.querySelectorAll('[name=eqpo]').forEach((x) => x.checked = false);
        } else if (valor == "false") {
            $("#button").show();
            $("#div2").show();
            $("#divp").hide();
            $("#equipo").hide();
            limpiarCampo();
            $("#proceso").val("designado");
        } else {
            // Otra cosa
        }
    });
});
//limpia campos 
var limpiarCampo = function() {
    $("#modelo").val("");
    $("#serie").val("");
    $("#verwind").val("");
    $("#idequipo").val("0");
}

//consulta reportes
$.ajax({
    url: '../php/conReport.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;

    for (ii = 0; ii < res.length; ii++) {
        if (obj.data[ii].evaluacion == '0') {
            //para bloquerar radio boton que dice ¿El equipo que va reportar está a su cargo?
           // document.getElementById('pregunta1').disabled = 'false';
            //$('#button').hide();
        }
    }
})

//consulta de reporte pendiente
$.ajax({
    url: '../php/conReport.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    var x = 0;
    html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="reporte" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>N° reporte</th><th><i></i> Técnico asignado</th><th><i></i> Ext.</th><th><i></i> Descripción Problema</th><th><i></i> Fecha envio</th><th><i></i> Fecha termino</th><th><i></i> Estado</th></tr></thead><tbody>';
    for (i = 0; i < res.length; i++) {
        x++;

        year = obj.data[i].finicio.substring(0, 4);
        month = obj.data[i].finicio.substring(5, 7);
        day = obj.data[i].finicio.substring(8, 10);
        Finicio = day + '/' + month + '/' + year;

        year = obj.data[i].ffinal.substring(0, 4);
        month = obj.data[i].ffinal.substring(5, 7);
        day = obj.data[i].ffinal.substring(8, 10);
        Finaliza = day + '/' + month + '/' + year;

        detalles = obj.data[i].n_reporte + '*' + obj.data[i].nombre + '*' + obj.data[i].apellidos + '*' + obj.data[i].extension + '*' + obj.data[i].ubicacion + '*' + obj.data[i].servicio + '*' + obj.data[i].intervencion + '*' + obj.data[i].descripcion + '*' + obj.data[i].falla_interna + '*' + Finicio + '*' + Finaliza + '*' + obj.data[i].falla_xterna + '*' + obj.data[i].observa + '*' + obj.data[i].evaluacion + '*' + obj.data[i].estado_rpt + '*' + obj.data[i].hinicio + '*' + obj.data[i].hfinal + '*' + obj.data[i].usu_observ;

        if (obj.data[i].estado_rpt == 'Pendiente') {
            //
            html += "<tr><td>" + obj.data[i].n_reporte + "</td><td>" + obj.data[i].nombre + ' ' + obj.data[i].apellidos + "</td><td>" + obj.data[i].extension + "</td><td>" + obj.data[i].descripcion + "</td><td>" + Finicio + "</td><td>" + Finaliza + "</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-danger' onclick='detalle(" + '"' + detalles + '"' + ")' style='width:100%'>" + obj.data[i].estado_rpt + "</a></td></tr>";
        } else if (obj.data[i].estado_rpt == 'En proceso') {
            html += "<tr><td>" + obj.data[i].n_reporte + "</td><td>" + obj.data[i].nombre + ' ' + obj.data[i].apellidos + "</td><td>" + obj.data[i].extension + "</td><td>" + obj.data[i].descripcion + "</td><td>" + Finicio + "</td><td>" + Finaliza + "</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-info' onclick='detalle(" + '"' + detalles + '"' + ")' style='width:100%'>" + obj.data[i].estado_rpt + "</a></td></tr>";
            /*<a href='#' type='button' data-toggle='modal' data-target='#modalDtlls' class='detalle btn btn-success' onclick='detalle("+'"'+detalles+'"'+")' style='width:100%'>"+obj.data[i].estado_rpt+"</a>        <a href='#' type='button' data-toggle='modal' data-target='#modalEval' class='detalle btn btn-info'  onclick='evaluar("+'"'+detalles+'"'+")' style='width:100%'>Evaluar</a></td></tr>";*/
        } else if (obj.data[i].evaluacion == '0') {
            html += "<tr><td>" + obj.data[i].n_reporte + "</td><td>" + obj.data[i].nombre + ' ' + obj.data[i].apellidos + "</td><td>" + obj.data[i].extension + "</td><td>" + obj.data[i].descripcion + "</td><td>" + Finicio + "</td><td>" + Finaliza + "</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalEval' class='detalle btn btn-default' onclick='evaluar(" + '"' + detalles + '"' + ")' style='width:100%'>evaluar</a></td></tr>";
        } else {
            html += "<tr><td>" + obj.data[i].n_reporte + "</td><td>" + obj.data[i].nombre + ' ' + obj.data[i].apellidos + "</td><td>" + obj.data[i].extension + "</td><td>" + obj.data[i].descripcion + "</td><td>" + Finicio + "</td><td>" + Finaliza + "</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-success' onclick='detalle(" + '"' + detalles + '"' + ")' style='width:100%'>Detalles</a></td></tr>";
        }
    }
    html += '</tbody></table></div></div></div>';
    $("#reportes").html(html);
})

//consulta datos para evaluar reporte
function evaluar(fila) {

    $.ajax({
        url: '../php/conReport.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        for (i = 0; i < res.length; i++) {

            if (obj.data[i].n_reporte == fila) {

                year = obj.data[i].finicio.substring(0, 4);
                month = obj.data[i].finicio.substring(5, 7);
                day = obj.data[i].finicio.substring(8, 10);
                Finicio = day + '/' + month + '/' + year;

                year = obj.data[i].ffinal.substring(0, 4);
                month = obj.data[i].ffinal.substring(5, 7);
                day = obj.data[i].ffinal.substring(8, 10);
                Finaliza = day + '/' + month + '/' + year;

                detalles = obj.data[i].n_reporte + '*' + obj.data[i].nombre + '*' + obj.data[i].apellidos + '*' + obj.data[i].extension + '*' + obj.data[i].ubicacion + '*' + obj.data[i].servicio + '*' + obj.data[i].intervencion + '*' + obj.data[i].descripcion + '*' + obj.data[i].falla_interna + '*' + Finicio + '*' + Finaliza + '*' + obj.data[i].falla_xterna + '*' + obj.data[i].observa + '*' + obj.data[i].evaluacion + '*' + obj.data[i].estado_rpt + '*' + obj.data[i].hinicio + '*' + obj.data[i].hfinal + '*' + obj.data[i].usu_observ;


                var d = detalles.split("*");
                $("#modalEval #nreporte").val(d[0]);
                $("#modalEval #usuario").val(d[1] + ' ' + d[2]);
                $("#modalEval #extension").val(d[3]);
                $("#modalEval #ubicacion").val(d[4]);
                $("#modalEval #servicio").val(d[5]);
                $("#modalEval #intervencion").val(d[6]);
                $("#modalEval #descripcion").val(d[7]);
                $("#modalEval #falla_interna").val(d[8]);
                $("#modalEval #finicio").val(d[9]);
                $("#modalEval #ffinal").val(d[10]);
                if (d[11] == 0) {
                    $("#externo").hide();
                } else {
                    $("#modalEval #falla_xterna").val(d[11]);
                }
                $("#modalEval #estado_rpt").val(d[14]);
                $("#modalEval #usu_observ").val(d[17]);

                if (d[14] == 'Cancelado') {
                    $("#div1").hide();
                    $("#div2").show();
                } else {
                    $("#div1").show();
                    $("#div2").hide();
                }

            }
        }
    })
}

//detalles del reporte
function detalle(fila) {
    $.ajax({
        url: '../php/conReport.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        for (i = 0; i < res.length; i++) {

            if (obj.data[i].n_reporte == fila) {

                year = obj.data[i].finicio.substring(0, 4);
                month = obj.data[i].finicio.substring(5, 7);
                day = obj.data[i].finicio.substring(8, 10);
                Finicio = day + '/' + month + '/' + year;

                year = obj.data[i].ffinal.substring(0, 4);
                month = obj.data[i].ffinal.substring(5, 7);
                day = obj.data[i].ffinal.substring(8, 10);
                Finaliza = day + '/' + month + '/' + year;

                detalles = obj.data[i].n_reporte + '*' + obj.data[i].nombre + '*' + obj.data[i].apellidos + '*' + obj.data[i].extension + '*' + obj.data[i].ubicacion + '*' + obj.data[i].servicio + '*' + obj.data[i].intervencion + '*' + obj.data[i].descripcion + '*' + obj.data[i].falla_interna + '*' + Finicio + '*' + Finaliza + '*' + obj.data[i].falla_xterna + '*' + obj.data[i].observa + '*' + obj.data[i].evaluacion + '*' + obj.data[i].estado_rpt + '*' + obj.data[i].hinicio + '*' + obj.data[i].hfinal + '*' + obj.data[i].usu_observ;

                var d = detalles.split("*");

                $("#modalDtll #nreporte").val(d[0]);
                $("#modalDtll #usuario").val(d[1] + ' ' + d[2]);
                $("#modalDtll #extension").val(d[3]);
                $("#modalDtll #ubicacion").val(d[4]);
                $("#modalDtll #servicio").val(d[5]);
                $("#modalDtll #intervencion").val(d[6]);
                $("#modalDtll #descripcion").val(d[7]);

                $("#modalDtll #falla_interna").val(d[8]);
                $("#modalDtll #finicio").val(d[9] + ' a las ' + d[15] + ' hrs');

                if (d[11] == 0 || d[11] == '') {
                    $("#falla").hide();
                } else {
                    $("#falla").show();
                    $("#modalDtll #falla_xterna").val(d[11]);
                }
                $("#modalDtll #observa").val(d[12]);
                $("#modalDtll #evaluacion").val(d[13]);
                if (d[13] == '0' && d[14] == 'Pendiente') {
                    $("#obsrvcns").show();
                    $("#modalDtll #usu_observ").val(d[17]);
                    $("#rspsta").hide();
                    $("#pndint1").hide();
                    $("#pndint2").hide();
                    $("#modalDtll #ffinal").val('Pendiente');
                } else if (d[13] == '0' && d[14] == 'En proceso') {
                    $("#modalDtll #usu_observ").val(d[17]);
                    $("#pndint1").hide();
                    $("#pndint2").hide();
                    $("#modalDtll #ffinal").val('En proceso');
                } else {
                    $("#modalDtll #usu_observ").val(d[17]);
                    $("#obsrvcns").show();
                    $("#rspsta").show();
                    $("#pndint1").show();
                    $("#pndint2").show();
                    $("#modalDtll #ffinal").val(d[10] + ' a las ' + d[16] + ' hrs');
                }
            }
        }
    })
}

//registrar evaluacion por parte del usuario
function evlRpt() {

    var nreporte = document.getElementById('nreporte').value;
    var evaluacion = $('input[name=evaluacion]:checked').val();
    var observa = document.getElementById('observa').value;

    if (!document.querySelector('input[name=evaluacion]:checked') || nreporte == '' || observa == '') {

        //      alert('Error, rellena el campo horario');

        $("#vacio").toggle("toggled");
        setTimeout(function() {
            $('#vacio').toggle('toggled');
        }, 3000);
        return;
    } else {
        //bloquear boton 

        $.ajax({
            url: '../php/rptUsu.php',
            type: 'POST',
            data: 'nreporte=' + nreporte + '&evaluacion=' + evaluacion + '&observa=' + observa + '&opcion=evaluar'
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta == 0) {
                $("#exito").toggle("toggled");
                setTimeout(function() {
                    $("#exito").toggle("toggled");
                }, 3000);
            } else if (respuesta == 1) {
                $("#error").toggle("toggled");
                setTimeout(function() {
                    $("#error").toggle("toggled");
                }, 3000);
            }
        });
    }

}

var limpiarCampos = function() {
    $("#modalDtll #nreporte").val("");
    $("#modalDtll #usuario").val("");
    $("#modalDtll #extension").val("");
    $("#modalDtll #ubicacion").val("");
    $("#modalDtll #servicio").val("");
    $("#modalDtll #intervencion").val("");
    $("#modalDtll #descripcion").val("");
    $("#modalDtll #falla_interna").val("");
    $("#modalDtll #finicio").val("");
    $("#modalDtll #ffinal").val("");
    $("#modalDtll #falla_xterna").val("");
    $("#modalDtll #observa").val("");
    $("#modalDtll #evaluacion").val("");

}