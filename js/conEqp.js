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
            equipo = "<div class='panel-body'><table class='table table-bordered' cellspacing='0' width='100%'><tr><th style='width:2%;'>N°</th><th style='width:20%;'>MARCA</th><th style='width:20%;'>NÚMERO DE SERIE </th><th style='width:20%;'>VERSIÓN WINDOWS</th><th style='width:20%;'>TIPO DE EQUIPO</th><th style='width:10%;'>ELIJA SU EQUIPO </th></tr>";
            for (i = 0; i < res.length; i++) {
                x++;
                if (obj.data[i].proceso == 'asignado') {
                    datos = obj.data[i].marca_cpu + "*" + obj.data[i].serie_cpu + "*" + obj.data[i].version_windows + '*' + obj.data[i].id_equipo;
                    equipo += "<tr'><td>" + x + "</td><td>" + obj.data[i].marca_cpu + "</td><td>" + obj.data[i].serie_cpu + "</td><td>" + obj.data[i].version_windows + "</td><td>" + obj.data[i].tipo_equipo + "</td><td><a href='#'  onclick='eqpo(" + '"' + datos + '"' + ");'><input name='eqpo' type='radio'/></a></td></tr>";
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

    var sede = document.getElementById('sede').value;
    var nempleado = document.getElementById('nempleado').value;
    var obser = document.getElementById('obser').value;
    var idequipo = document.getElementById('idequipo').value;
    var servicio = document.getElementById('servicio').value;

    if (servicio == '1CÓMPUTO' && idequipo == '0') {
        idequipo = '';
    }
    // if(servicio == '5SISTEMAS'){
    //     var sede = 'WEB';
    // }

    var intervencion = document.getElementById('intervencion').value;
    var descripcion = document.getElementById('descripcion').value;

    var solucion = document.getElementById('solucion').value;
    var ultima = document.getElementById('ultima').value;
    var final = document.getElementById('final').value;

    x = servicio + '/' + intervencion + '/' + descripcion + '/' + solucion + '/' + ultima + '/' + final;

    datos = 'nempleado=' + nempleado + '&servicio=' + servicio + '&intervencion=' + intervencion + '&descripcion=' + descripcion + '&obser=' + obser + '&solucion=' + solucion + '&ultima=' + ultima + '&final=' + final + '&idequipo=' + idequipo + '&sede=' + sede + '&opcion=registrar';
    
    
    if (sede == '0' || idequipo == '' || nempleado == '' || servicio == 'x' || intervencion == '0' || descripcion == '0' || obser == '' || solucion == '0' || ultima == '0' || final == '0') {

        $("#vacio").toggle("toggled");
        $('#exampleModalCenter').modal('hide');
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
            data: datos
        }).done(function(respuesta) {
            // console.log(respuesta);
             // alert(respuesta);
            if (respuesta != 1) {


                $("#button").hide();
                // $('#vacio').hide();
                // $("#error").hide();
                $("#exito").toggle('toggle');
                $("#exito").html('¡Su reporte se generó con éxito, <b style="color:blue;">Número de reporte asignado: '+respuesta+'</b>, se le asigno un técnico!, Para más detalles: <a href="rptCons.php" style="color:blue; cursor:pointer;">Reportes</a>');


                setTimeout(function() {
                    $("#exito").toggle("toggled");
                }, 55000);
                $("#button1").hide();
                $('#exampleModalCenter').modal('hide');

            } else if (respuesta == 1) {
                // $("#exito").hide();
                // $('#vacio').hide();
                $("#error").toggle("toggled");
                setTimeout(function() {
                    $("#error").toggle("toggled");
                }, 5000);
                $('#exampleModalCenter').modal('hide');
            }
        });
    }
}

///REPORTE DE 10 MIN
function reporte10min() {

    var idTec = document.getElementById('tecnico').value;
    var sede = document.getElementById('sedeTec').value;
    var nempleado = document.getElementById('nempleado').value;
    var obser = document.getElementById('obser').value;
    var idequipo = document.getElementById('idequipo').value;
    var servicio = document.getElementById('servicio').value;



    if (servicio == '1CÓMPUTO' && idequipo == '0') {
        idequipo = '';
    } 

    if(servicio == '5SISTEMAS'){
        opcion = 'registrar';
    }else{
        opcion = 'registrarRport';
    }

    var intervencion = document.getElementById('intervencion').value;
    var descripcion = document.getElementById('descripcion').value;

    var solucion = document.getElementById('solucion').value;
    var ultima = document.getElementById('ultima').value;
    var final = document.getElementById('final').value;

    x = servicio + '/' + intervencion + '/' + descripcion + '/' + solucion + '/' + ultima + '/' + final;

    datos = 'nempleado=' + nempleado + '&servicio=' + servicio + '&intervencion=' + intervencion + '&descripcion=' + descripcion + '&obser=' + obser + '&solucion=' + solucion + '&ultima=' + ultima + '&final=' + final + '&idequipo=' + idequipo + '&sede=' + sede + '&idTec=' + idTec + '&opcion='+opcion;

    if (sede == '0' || idequipo == '' || nempleado == '' || servicio == 'x' || intervencion == '0' || descripcion == '0' || obser == '' || solucion == '0' || ultima == '0' || final == '0') {

        // if(sede == '0'){
        //    document.getElementById('sede').style.color = "red"; 
        // }else{
        //     document.getElementById('sede').style.color = "black";
        // }

        $("#vacio").toggle("toggled");
        $('#exampleModalCenter').modal('hide');
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
            data: datos
        }).done(function(respuesta) {
             console.log(respuesta);
             // alert(respuesta);
            if (respuesta != 1) {


                $("#button").hide();
                $("#exito").toggle('toggle');
                $("#exito").html('¡Su reporte se generó con éxito, <b style="color:blue;">Número de reporte asignado: '+respuesta+'</b>, se le asigno un técnico!, Para más detalles: <a href="rptCons.php" style="color:blue; cursor:pointer;">Reportes</a>');

                setTimeout(function() {
                    $("#exito").toggle("toggled");
                }, 15000);
                $("#button1").hide();
                $('#exampleModalCenter').modal('hide');

            } else if (respuesta == 1) {
                // $("#exito").hide();
                // $('#vacio').hide();
                $("#error").toggle("toggled");
                setTimeout(function() {
                    $("#error").toggle("toggled");
                }, 5000);
                $('#exampleModalCenter').modal('hide');
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

//consulta de reporte Por atender
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

        if (obj.data[i].estado_rpt == 'Por atender') {
            //
            html += "<tr><td>" + obj.data[i].n_reporte + "</td><td>" + obj.data[i].nombre + ' ' + obj.data[i].apellidos + "</td><td>" + obj.data[i].extension + "</td><td>" + obj.data[i].descripcion + "</td><td>" + Finicio + "</td><td>" + Finaliza + "</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-danger' onclick='detalle(" + '"' + detalles + '"' + ")' style='width:100%'>" + obj.data[i].estado_rpt + "</a></td></tr>";
        } else if (obj.data[i].estado_rpt == 'Pendiente') {
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

    $("#modalDtll #ultima").show();
    $("#modalDtll #final").show();

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

                $("#modalEval #nreporte").val(obj.data[i].n_reporte);
                $("#modalEval #servicio").val(obj.data[i].servicio);
                $("#modalEval #intervencion").val(obj.data[i].intervencion);
                $("#modalEval #descripcion").val(obj.data[i].descripcion);
                $("#modalEval #solucion").val(obj.data[i].solucion);
                if (obj.data[i].ultima == 'x' || obj.data[i].ultima == '') {
                    $("#modalEval #ultima").hide();
                } else {
                    $("#modalEval #ultima").val(obj.data[i].ultima);
                }
                if (obj.data[i].final == 'x') {

                    $("#modalEval #final").hide();
                } else {
                    $("#modalEval #final").val(obj.data[i].final);
                }
                $("#modalEval #falla_interna").val(obj.data[i].falla_interna);
                $("#modalEval #finicio").val(Finicio);
                $("#modalEval #ffinal").val(Finaliza);
                if (obj.data[i].falla_xterna == 0) {
                    $("#externo").hide();
                } else {
                    $("#externo").show();
                    $("#modalEval #falla_xterna").val(obj.data[i].falla_xterna);
                }
                $("#modalEval #estado_rpt").val(obj.data[i].estado_rpt);
                $("#modalEval #usu_observ").val(obj.data[i].usu_observ);

                if (obj.data[i].estado_rpt == 'Cancelado') {
                    $("#div1").hide();
                    $("#div2").show();
                } else {
                    $("#div1").show();
                    $("#div2").hide();
                }
        
                $("#modalEvalConfirmar #observaconf").val(obj.data[i].observa)
                 if(obj.data[i].evaluacion==2){
                $("#modalEvalConfirmar #button").hide();
                $("#modalEvalConfirmar #false").attr('checked', true);
                $("#modalEvalConfirmar #true").attr('disabled','disabled');
                 }else{
                $("#modalEvalConfirmar #button").show();                                        
                 }   

                persona(obj.data[i].id_usu);

            }
        }
    })
}


//detalles del reporte
function detalle(fila) {

    $("#modalDtll #ultima").show();
    $("#modalDtll #final").show();

    $.ajax({
        url: '../php/conReport.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        for (i = 0; i < res.length; i++) {

            if (obj.data[i].n_reporte == fila) {

                persona(obj.data[i].id_usu)

                year = obj.data[i].finicio.substring(0, 4);
                month = obj.data[i].finicio.substring(5, 7);
                day = obj.data[i].finicio.substring(8, 10);
                Finicio = day + '/' + month + '/' + year;

                year = obj.data[i].ffinal.substring(0, 4);
                month = obj.data[i].ffinal.substring(5, 7);
                day = obj.data[i].ffinal.substring(8, 10);
                Finaliza = day + '/' + month + '/' + year;

                $("#modalDtll #nreporte").val(obj.data[i].n_reporte);

                $("#modalDtll #servicio").val(obj.data[i].servicio);
                $("#modalDtll #intervencion").val(obj.data[i].intervencion);
                $("#modalDtll #descripcion").val(obj.data[i].descripcion);

                $("#modalDtll #solucion").val(obj.data[i].solucion);

                if (obj.data[i].ultima == 'x' || obj.data[i].ultima == '') {
                    $("#modalDtll #ultima").hide();
                } else {
                    $("#modalDtll #ultima").val(obj.data[i].ultima);
                }
                if (obj.data[i].final == 'x') {

                    $("#modalDtll #final").hide();
                } else {
                    $("#modalDtll #final").val(obj.data[i].final);
                }


                $("#modalDtll #falla_interna").val(obj.data[i].falla_interna);
                $("#modalDtll #finicio").val(Finicio + ' a las ' + obj.data[i].hinicio + ' hrs');

                if (obj.data[i].falla_xterna == 0 || obj.data[i].falla_xterna == '') {
                    $("#falla").hide();
                } else {
                    $("#falla").show();
                    $("#modalDtll #falla_xterna").val(obj.data[i].falla_xterna);
                }
                $("#modalDtll #observa").val(obj.data[i].observa);
                $("#modalDtll #evaluacion").val(obj.data[i].evaluacion);
                if (obj.data[i].evaluacion == '0' && obj.data[i].estado_rpt == 'Por atender') {
                    $("#obsrvcns").show();
                    $("#modalDtll #usu_observ").val(obj.data[i].usu_observ);
                    $("#rspsta").hide();
                    $("#pndint1").hide();
                    $("#pndint2").hide();
                    $("#modalDtll #ffinal").val('POR ATENDER');
                } else if (obj.data[i].evaluacion == '0' && obj.data[i].estado_rpt == 'Pendiente') {
                    $("#modalDtll #usu_observ").val(obj.data[i].usu_observ);
                    $("#pndint1").hide();
                    $("#pndint2").hide();
                    $("#modalDtll #ffinal").val('PENDIENTE');
                } else {
                    $("#modalDtll #usu_observ").val(obj.data[i].usu_observ);
                    $("#obsrvcns").show();
                    $("#rspsta").show();
                    $("#pndint1").show();
                    $("#pndint2").show();
                    $("#modalDtll #ffinal").val(Finaliza + ' a las ' + obj.data[i].hfinal + ' hrs');
                }
            }
        }
    })
}

function persona(id_usu) {

    $.ajax({
        url: '../php/personal_listar.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        for (i = 0; i < res.length; i++) {

            if (obj.data[i].gstIdper == id_usu) {

                $("#modalDtll #usuario").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                $("#modalDtll #extension").val(obj.data[i].gstExTel);
                $("#modalDtll #correo").val(obj.data[i].gstCinst);

                $("#modalEval #usuario").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                $("#modalEval #extension").val(obj.data[i].gstExTel);
                $("#modalEval #correo").val(obj.data[i].gstCinst);


            }
        }
    })
}




//registrar evaluacion por parte del usuario

function evlRpt() {


    var nreporte = document.getElementById('nreporte').value;
    var conocimientos = $('input[name=conocimientos]:checked').val();
    var actitud = $('input[name=actitud]:checked').val();
    var habilidades = $('input[name=habilidades]:checked').val();
    var respuesta = $('input[name=respuesta]:checked').val();
    var solucion = $('input[name=solucion]:checked').val();
    var calidad = $('input[name=calidad]:checked').val();
    var observa = document.getElementById('observa').value;

    //alert(nreporte + respuesta + observa);
    if (!document.querySelector('input[name=conocimientos]:checked') || !document.querySelector('input[name=actitud]:checked') || !document.querySelector('input[name=habilidades]:checked') || !document.querySelector('input[name=respuesta]:checked') || !document.querySelector('input[name=solucion]:checked') || !document.querySelector('input[name=calidad]:checked') || nreporte == '' || observa == '') {

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
            data: 'nreporte=' + nreporte + '&conocimientos=' + conocimientos + '&actitud=' + actitud + '&habilidades=' + habilidades + '&respuesta=' + respuesta + '&solucion=' + solucion + '&calidad=' + calidad + '&observa=' + observa + '&opcion=evaluar'
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta == 0) {
                $("#exito").toggle("toggled");
                setTimeout("location.href = 'rptCons';", 4000);
            } else if (respuesta == 1) {
                $("#error").toggle("toggled");
                setTimeout(function() {
                    $("#error").toggle("toggled");
                }, 3000);
            }
        });
    }

}
//REPORTE CANCELADO
function evlRptCancela() {
    var nreporte = document.getElementById('nreporte').value;
    var conocimientos = 'cancelado';  
    var actitud = 'cancelado';  
    var habilidades = 'cancelado';  
    var respuesta = 'cancelado';  
    var solucion = 'cancelado';  
    var calidad = 'cancelado';  
    var observa = document.getElementById('observac').value;
    //alert(nreporte + respuesta + observa);
    datos = 'nreporte=' + nreporte + '&conocimientos=' + conocimientos + '&actitud=' + actitud + '&habilidades=' + habilidades + '&respuesta=' + respuesta + '&solucion=' + solucion + '&calidad=' + calidad + '&observa=' + observa + '&opcion=evaluar';

     if (nreporte == '' || observa == '') {
        $("#vacioc").toggle("toggled");
        setTimeout(function() {
            $('#vacioc').toggle('toggled');
        }, 3000);
        return;
    } else {
        //bloquear boton 
        $.ajax({
            url: '../php/rptUsu.php',
            type: 'POST',
            data: datos 
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta == 0) {
                $("#exitoc").toggle("toggled");
                setTimeout("location.href = 'rptCons';", 4000);
            } else if (respuesta == 1) {
                $("#errorc").toggle("toggled");
                setTimeout(function() {
                    $("#errorc").toggle("toggled");
                }, 3000);
            }
        });
    }

}

//REPORTE CONFIRMADO QUE SE REALIZO CON EXITO
function evlRptConfirmar() {
    var nreporte = document.getElementById('nreporte').value;
    var observa = document.getElementById('observaconf').value;
    var confirmar = $('input[name=confirmar]:checked').val();
    //alert(nreporte + respuesta + observa);
    datos = 'nreporte=' + nreporte + '&observa=' + observa + '&confirmar=' + confirmar + '&opcion=cnfrmrRprt';

     if (!document.querySelector('input[name=confirmar]:checked') || nreporte == '' || observa == '') {
        $("#vaciof").toggle("toggled");
        setTimeout(function() {
            $('#vaciof').toggle('toggled');
        }, 3000);
        return;
    } else {
        //bloquear boton 
        $.ajax({
            url: '../php/rptUsu.php',
            type: 'POST',
            data: datos 
        }).done(function(respuesta) {
            console.log(respuesta);
            // alert(respuesta);
            if (respuesta == 0) {
                $("#exitof").toggle("toggled");
                setTimeout("location.href = 'rptCons';", 4000);
            } else if (respuesta == 1) {
                $("#errorf").toggle("toggled");
                setTimeout(function() {
                    $("#errorf").toggle("toggled");
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