//regustrando al usuario de lado del administrador
function registrar() {
    var nombre = document.getElementById('nombre').value;
    var apellidos = document.getElementById('apellidos').value;
    var id_area = document.getElementById('id_area').value;
    var extension = document.getElementById('extension').value;
    var correo = document.getElementById('correo').value;
    var ubicacion = document.getElementById('ubicacion').value;
    var n_empleado = document.getElementById('n_empleado').value;
    var id_cargo = document.getElementById('id_cargo').value;

    if (nombre == '' || apellidos == '' || id_area == '' || extension == '' || correo == '' || ubicacion == '' || n_empleado == '' || id_cargo == '') {

        $('#aviso_vacio').slideDown('slow');
        setTimeout(function() {
            $('#aviso_vacio').slideUp('slow');
        }, 2000);

        return;
    } else {
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var id_area = $('#id_area').val();
        var extension = $('#extension').val();
        var correo = $('#correo').val();
        var ubicacion = $('#ubicacion').val();
        var n_empleado = $('#n_empleado').val();
        var id_cargo = $('#id_cargo').val();

        $.ajax({
            url: '../../php/usuarios.php',
            type: 'POST',
            data: 'nombre=' + nombre + '&apellidos=' + apellidos + '&id_area=' + id_area + '&extension=' + extension + '&correo=' + correo + '&ubicacion=' + ubicacion + '&n_empleado=' + n_empleado + '&id_cargo=' + id_cargo + '&opcion=registrar'
        }).done(function(respuesta) {
            if (respuesta == 0) {
                $('#exito').slideDown('slow');
                setTimeout(function() {
                    $('#exito').slideUp('slow');
                }, 2000);
            } else {
                $('#danger').slideDown('slow');
                setTimeout(function() {
                    $('#danger').slideUp('slow');
                }, 2000);
            }
        });
    }
}

//creando la funcion modificar 
function modificar() {
    var frm = $("#Editar").serialize();
    //console.log(frm);
    $.ajax({
        url: "../../php/usuarios.php",
        type: 'POST',
        data: frm + "&opcion=modificar"
    }).done(function(respuesta) {
        console.log(respuesta);
        if (respuesta == 0) {
            $('#echo').slideDown('slow');
            setTimeout(function() {
                $('#echo').slideUp('slow');
            }, 2000);
        } else if (respuesta == 1) {
            $('#vacio').slideDown('slow');
            setTimeout(function() {
                $('#vacio').slideUp('slow');
            }, 2000);
        } else if (respuesta == 2) {
            $('#error').slideDown('slow');
            setTimeout(function() {
                $('#error').slideUp('slow');
            }, 2000);
        }
    });
}

//Usuario registrándose 
function registrarse() {
    var nombre = document.getElementById('nombre').value;
    var apellidos = document.getElementById('apellidos').value;
    var id_area = document.getElementById('id_area').value;
    var extension = document.getElementById('extension').value;
    var correo = document.getElementById('correo').value;
    var ubicacion = document.getElementById('ubicacion').value;
    var n_empleado = document.getElementById('n_empleado').value;
    var id_cargo = document.getElementById('id_cargo').value;
    if (nombre == '' || apellidos == '' || id_area == '' || extension == '' || correo == '' || ubicacion == '' || n_empleado == '' || id_cargo == '') {
        $('#aviso_vacio').slideDown('slow');
        setTimeout(function() {
            $('#aviso_vacio').slideUp('slow');
        }, 2000);
        return;
    } else {
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var id_area = $('#id_area').val();
        var extension = $('#extension').val();
        var correo = $('#correo').val();
        var ubicacion = $('#ubicacion').val();
        var n_empleado = $('#n_empleado').val();
        var id_cargo = $('#id_cargo').val();
        $("#usua").val(n_empleado);
        $.ajax({
            url: 'php/usuarios.php',
            type: 'POST',
            data: 'nombre=' + nombre + '&apellidos=' + apellidos + '&id_area=' + id_area + '&extension=' + extension + '&correo=' + correo + '&ubicacion=' + ubicacion + '&n_empleado=' + n_empleado + '&id_cargo=' + id_cargo + '&opcion=registrar'
        }).done(function(respuesta) {
            if (respuesta == 0) {
                $('#exito').slideDown('slow');
                setTimeout(function() {
                    $('#exito').slideUp('slow');
                    document.getElementById('btn__tecnicosesion').disabled = 'false';
                    document.getElementById("btn__tecnicosesion").style.color = "silver";
                }, 2000);
            } else {
                $('#danger').slideDown('slow');
                setTimeout(function() {
                    $('#danger').slideUp('slow');
                }, 2000);
            }
        });
    }
}

function datos_detalles(tbody, table) {
    $(tbody).on("click", "button.detalle", function() {
        var data = table.row($(this).parents("tr")).data();
        console.log(data);
        var id_usuario = $("#frmDetalles #id_usuario").val(data.id_usuario),
            nombre = $("#frmDetalles #nombre").val(data.nombre),
            apellidos = $("#frmDetalles #apellidos").val(data.apellidos),
            correo = $("#frmDetalles #correo").val(data.correo),
            adscripcion = $("#frmDetalles #adscripcion").val(data.adscripcion),
            extension = $("#frmDetalles #extension").val(data.extension),
            n_empleado = $("#frmDetalles #n_empleado").val(data.n_empleado);
        $("#cuadro1").hide("slow");
        $("#cuadro4").slideDown("slow");
    });
}

var datos_eliminar = function(tbody, table) {
    $(tbody).on("click", "button.eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        //console.log(data);
        var id_usuario = $("#EliminarUsuario #id_usuario").val(data.id_usuario);
        //nombre = $("#frmEliminarcorreo #nombre").val(data.nombre);				
    });
}

var eliminar_usuario = function() {
    //para realiza el evento del clic del boton
    $("#eliminar-usuario").on("click", function() {
        var id_usuario = $("#EliminarUsuario #id_usuario").val(),
            opcion = $("#EliminarUsuario #opcion").val();
        $.ajax({
            method: "POST",
            url: "../../php/usuarios.php",
            data: { "id_usuario": id_usuario, "opcion": opcion }
        }).done(function(info) {
            var json_info = JSON.parse(info);
            mostrar_mensaje(json_info);
            limpiar_datos();
            listar_usuario();
        });
    });
}

function datos_detalle(id) {

    $("#Detalles").slideDown("slow");
    $("#cuadro1").hide("slow");

    $.ajax({
        url: '../../php/listar_personal.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        //alert(res);
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].gstIdper == id) {

                idarea = obj.data[i].gstIDara;

                $.ajax({
                    url: '../../php/area_listar.php',
                    type: 'POST'
                }).done(function(resps) {
                    obj = JSON.parse(resps);
                    var res = obj.data;

                    for (ii = 0; ii < res.length; ii++) {

                        if (obj.data[ii].id_area == idarea) {

                            area = $("#area").val(obj.data[ii].adscripcion);
                        }
                    }
                })

                var id_usuario = $("#id_usuario").val(obj.data[i].gstIdper),
                    nombre = $("#nombre").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell),
                    cargo = $("#cargo").val(obj.data[i].gstGnric),
                    extension = $("#extension").val(obj.data[i].gstExTel),
                    correo = $("#correo").val(obj.data[i].gstCinst),
                    // ubicacion = $("#ubicacion").val(obj.data[i].ubicacion),
                    n_empleado = $("#n_empleado").val(obj.data[i].gstNmpld),
                    opcion = $("#frmEditar #opcion").val("modificar");
                nempleado = obj.data[i].gstNmpld;
                equpios(nempleado);
            }
        }
    })
}


function equpios(nempleado) {
    $.ajax({
        url: '../../php/asigEqpo.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        x = 0;
        html = '<table class="table table-striped table-bordered"><thead><tr><th style="width:5%"><i class="fa fa-sort-numeric-asc"></i>N°</th><th style="width:15%"><i></i>N° INVENTARIO</th><th style="width:15%"><i></i>N° SERIE</th><th style="width:15%"><i></i>MARCA</th><th style="width:15%"><i></i>TIPO DE EQUIPO </th></tr></thead><tbody>';
        for (e = 0; e < res.length; e++) {
            if (obj.data[e].n_emp == nempleado) {
                x++;
                html += "<tr><td>" + x + "</td><td>" + obj.data[e].num_invntraio + "</td><td>" + obj.data[e].serie_cpu + "</td><td>" + obj.data[e].marca_cpu + "</td><td>" + obj.data[e].tipo_equipo + "</td></tr>";
            }
        }
        html += '</tbody></table>';
        $("#eqpos").html(html);
    })
}

var RegistrarUsu = function() {
    limpiar_datos();
    $("#cuadro2").slideDown("slow");
    $("#cuadro1").hide("slow");
}


function datos_editar(id) {
    $("#Editar").slideDown("slow");
    $("#cuadro1").hide("slow");
    $.ajax({
        url: '../../php/listar_usuarios.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_usuario == id) {
                var id_usuario = $("#frmEditar #id_usuario").val(obj.data[i].id_usuario),
                    nombre = $("#frmEditar #nombre").val(obj.data[i].nombre),
                    apellidos = $("#frmEditar #apellidos").val(obj.data[i].apellidos),
                    idcargo = $("#frmEditar #idcargo").val(obj.data[i].idcargo),
                    id_area = $("#frmEditar #idarea").val(obj.data[i].id_area),
                    extension = $("#frmEditar #extension").val(obj.data[i].extension),
                    correo = $("#frmEditar #correo").val(obj.data[i].correo),
                    ubicacion = $("#frmEditar #ubicacion").val(obj.data[i].ubicacion),
                    orden = $("#frmEditar #orden").val(obj.data[i].orden),
                    n_empleado = $("#frmEditar #n_empleado").val(obj.data[i].n_empleado),
                    opcion = $("#frmEditar #opcion").val("modificar");
            }
        }
    })
}



function datos_prioridad(id) {

    $("#Dtllsprio").slideDown("slow");
    $("#cuadro1").hide("slow");

    $.ajax({
        url: '../../php/listar_personal.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;


        for (i = 0; i < res.length; i++) {
            if (obj.data[i].gstIdper == id) {

                idarea = obj.data[i].gstIDara;
                // alert(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                var id_usuario = $("#idusup").val(obj.data[i].gstIdper),
                    n_empleado = $("#nempleo").val(obj.data[i].gstNmpld),
                    nombre = $("#usuario").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                    nemp = obj.data[i].gstNmpld;
                $.ajax({
                    url: '../../php/prioridad.php',
                    type: 'POST'
                }).done(function(resps) {
                    obj = JSON.parse(resps);
                    var res = obj.data;

                    for (ii = 0; ii < res.length; ii++) {

                        if (obj.data[ii].gstNmpld == nemp) {

                            prioridad = $("#prioridad").val(obj.data[ii].prio);

                            if(obj.data[ii].prio=='0'){
                            $("#opcions").val('agregar');                                   
                            }else{
                            $("#opcions").val('editar');                                     
                            }

                        }
                    }
                })

            }
        }
    })
}

function asignar() {
    var nempleo = document.getElementById('nempleo').value;
    var prioridad = document.getElementById('prioridad').value;
    var opcions = document.getElementById('opcions').value;
        
       // alert(nempleo+' * '+prioridad+' * '+opcions);

    if (prioridad=='0') {
        $('#vaciop').slideDown('slow');
        setTimeout(function() {
            $('#vaciop').slideUp('slow');
        }, 2000);
        return;
    } else {

        $.ajax({
            url: '../../php/usuarios.php',
            type: 'POST',
            data: 'nempleo=' + nempleo + '&prioridad=' + prioridad + '&opcion='+opcions
        }).done(function(respuesta) {

            if (respuesta == 0) {
                $('#exitop').slideDown('slow');
                setTimeout(function() {
                    $('#exitop').slideUp('slow');
                }, 2000);
            } else {
                // $('#danger').slideDown('slow');
                // setTimeout(function() {
                //     $('#danger').slideUp('slow');
                // }, 2000);
            }
        });
    }
}

var mostrar_mensaje = function(informacion) {
        var texto = "",
            color = "";
        if (informacion.respuesta == "BIEN") {
            texto = "Se han guardado los cambios correctamente.";
            color = "#379911";
        } else if (informacion.respuesta == "ERROR") {
            texto = "<strong>Error</strong>, no se ejecutó la consulta.";
            color = "#C9302C";
        } else if (informacion.respuesta == "EXISTE") {
            texto = "<strong>Información!</strong> el correo ya existe.";
            color = "#5b94c5";
        } else if (informacion.respuesta == "VACIO") {
            texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
            color = "#ddb11d";
        } else if (informacion.respuesta == "OPCION_VACIA") {
            texto = "<strong>Advertencia!</strong>la opción no existe o esta vacia, recarge la pagina.";
            color = "#ddb11d";
        }


        $(".mensaje").html(texto).css({ "color": color });
        $('.mensaje').fadeIn('slow');
        setTimeout(function() {
            $(this).html("");
            $('.mensaje').fadeOut('slow');
        }, 2000);

    }
    //limpiar los input text
var limpiar_datos = function() {
    $("#opcion").val("registrar");
    $("#id_usuario").val("");
    $("#nombre").val("").focus();
    $("#apellidos").val("");
    $("#idarea").val("");
    $("#extension").val("");
    $("#correo").val("");
    $("#ubicacion").val("");
    $("#n_empleado").val("");
}