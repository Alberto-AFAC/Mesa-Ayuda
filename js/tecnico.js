//regustrando al usuario de lado del administrador
function tecnico() {


    var idusu = document.getElementById('idusu').value;
    var privilg = document.getElementById('privilg').value;
    var usuario = document.getElementById('usuario').value;
    var password = document.getElementById('password').value;
    var entrada = document.getElementById('entrada').value;
    var salida = document.getElementById('salida').value;


    datos = 'idusu=' + idusu + '&privilg=' + privilg + '&usuario=' + usuario + '&password=' + password + '&entrada=' + entrada + '&salida=' + salida + '&opcion=registrar';

   //alert(datos);

    if (idusu == '' || privilg == '' || usuario == '' || password == '' || entrada == '' || salida == '') {

        $('#vacio').slideDown('slow');
        setTimeout(function() {
            $('#vacio').slideUp('slow');
        }, 2000);

        return;
    } else {

        $.ajax({
            url: '../../php/tecnico.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
            console.log(respuesta);
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
    alert(frm);
    $.ajax({
        url: "../../php/tecnico.php",
        type: 'POST',
        data: frm + "&opcion=modificar"
    }).done(function(respuesta) {
        console.log(respuesta);
        if (respuesta == 0) {
            $('#exitos').slideDown('slow');
            setTimeout(function() {
                $('#exitos').slideUp('slow');
            }, 2000);
        } else if (respuesta == 1) {
            $('#vacios').slideDown('slow');
            setTimeout(function() {
                $('#vacios').slideUp('slow');
            }, 2000);
        } else if (respuesta == 2) {
            $('#error').slideDown('slow');
            setTimeout(function() {
                $('#error').slideUp('slow');
            }, 2000);
        }
    });
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
        url: '../../php/listar_usuarios.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_usuario == id) {
                var id_usuario = $("#id_usuario").val(obj.data[i].id_usuario),
                    nombre = $("#nombre").val(obj.data[i].nombre + ' ' + obj.data[i].apellidos),
                    cargo = $("#cargo").val(obj.data[i].cargo),
                    area = $("#area").val(obj.data[i].adscripcion),
                    extension = $("#extension").val(obj.data[i].extension),
                    correo = $("#correo").val(obj.data[i].correo),
                    ubicacion = $("#ubicacion").val(obj.data[i].ubicacion),
                    n_empleado = $("#n_empleado").val(obj.data[i].n_empleado),
                    opcion = $("#frmEditar #opcion").val("modificar");
                nempleado = obj.data[i].n_empleado;
                equpios(nempleado);
            }
        }
    })
}



var regisTec = function() {
    limpiar_datos();
    $("#cuadro2").slideDown("slow");
    $("#cuadro1").hide("slow");
}


function datos_editar(id) {
    $("#Editar").slideDown("slow");
    $("#cuadro1").hide("slow");
    $.ajax({
        url: '../../php/listar_tecnicos.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_usuario == id) {
                var 
                    idtec = $("#frmEditar #idtec").val(obj.data[i].id_tecnico),
                    id_usuario = $("#frmEditar #aidusu").val(obj.data[i].id_usuario),
                    privilg = $("#frmEditar #aprivilg").val(obj.data[i].privilegios),

                    usuario = $("#frmEditar #ausuario").val(obj.data[i].usuario),
                    
                    password = $("#frmEditar #apassword").val(obj.data[i].password),


                    entrada = $("#frmEditar #aentrada").val(obj.data[i].entrada),

                    salida = $("#frmEditar #asalida").val(obj.data[i].salida),

                    activo = $("#frmEditar #activo").val(obj.data[i].activo),
                    
                    observ = $("#frmEditar #observ").val(obj.data[i].observ),

                    opcion = $("#frmEditar #opcion").val("modificar");
            }
        }
    })
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