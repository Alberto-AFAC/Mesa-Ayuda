	function actualizar() {

	    var id_usuario = $('#id_usuario').val();
	    var usuario = $('#usuario').val();
	    var password = $('#password').val();
	    var pass = $('#pass').val();
	    var pass2 = $('#pass2').val();

	    datos = 'usuario=' + usuario + '&password=' + password + '&pass=' + pass + '&pass2=' + pass2 + '&id_usuario=' + id_usuario + '&opcion=modificar'

	    $.ajax({
	        url: '../conexion/actualizar.php',
	        type: 'POST',
	        data: datos
	    }).done(function(respuesta) {
	        console.log(respuesta);
	        if (respuesta == 7) {
	            $('#echo').toggle('toggle');
	            setTimeout(function() {
	                $('#echo').toggle('toggle');
	            }, 2000);
	        } else if (respuesta == 2) {
	            $('#invalida').toggle('toggle');
	            setTimeout(function() {
	                $('#invalida').toggle('toggle');
	            }, 2000);
	        } else if (respuesta == 3) {
	            $('#falso').toggle('toggle');
	            setTimeout(function() {
	                $('#falso').toggle('toggle');
	            }, 2000);
	        } else if (respuesta == 4) {
	            $('#vacio').toggle('toggle');
	            setTimeout(function() {
	                $('#vacio').toggle('toggle');
	            }, 2000);
	        } else if (respuesta == 1) {
	            $('#error').toggle('toggle');
	            setTimeout(function() {
	                $('#error').toggle('toggle');
	            }, 2000);
	        }
	    });
	}



	//consulta de reporte Por atender
	// $.ajax({
	// url:'../php/atdReport.php',
	// type:'POST'
	// }).done(function(resp){
	//     obj = JSON.parse(resp);
	//     var res = obj.data;  

	//     var x = 0;
	//        html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="reporte" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>N° reporte</th><th><i></i>Nombre usuario</th><th><i></i>Ubicación</th><th><i></i>Extensión</th><th><i></i>Reporte</th><th><i></i>Termino</th><th><i></i>Proceso</th></tr></thead><tbody>';
	//         for(i=0; i<res.length;i++){
	//         x++;

	//         year = obj.data[i].finicio.substring(0,4);
	//         month = obj.data[i].finicio.substring(5,7);
	//         day = obj.data[i].finicio.substring(8,10);
	//         Finicio = day+'/'+month+'/'+year;

	//         year = obj.data[i].ffinal.substring(0,4);
	//         month = obj.data[i].ffinal.substring(5,7);
	//         day = obj.data[i].ffinal.substring(8,10);
	//         Finaliza = day+'/'+month+'/'+year;

	//         detalles = obj.data[i].n_reporte+'*'+obj.data[i].nombre+'*'+obj.data[i].apellidos+'*'+obj.data[i].extension+'*'+obj.data[i].ubicacion+'*'+obj.data[i].servicio+'*'+obj.data[i].intervencion+'*'+obj.data[i].descripcion+'*'+obj.data[i].usu_observ+'*'+obj.data[i].falla_interna+'*'+Finicio+'*'+Finaliza+'*'+obj.data[i].falla_xterna+'*'+obj.data[i].observa+'*'+obj.data[i].evaluacion+'*'+obj.data[i].estado_rpt+'*'+obj.data[i].hinicio+'*'+obj.data[i].hfinal+'*'+obj.data[i].idequipo;

	// //        detalles = obj.data[i].n_reporte+'*'+obj.data[i].nombre+'*'+obj.data[i].apellidos+'*'+obj.data[i].extension+'*'+obj.data[i].ubicacion+'*'+obj.data[i].servicio+'*'+obj.data[i].intervencion+'*'+obj.data[i].descripcion+'*'+obj.data[i].finicio+'*'+obj.data[i].ffinal;

	//         if(obj.data[i].estado_rpt=='Por atender'){     
	//         html +="<tr><td>"+obj.data[i].n_reporte+"</td><td>"+obj.data[i].nombre+' '+obj.data[i].apellidos+"</td><td>"+obj.data[i].ubicacion+"</td><td>"+obj.data[i].extension+"</td><td>"+Finicio+"</td><td>"+Finaliza+"</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-danger' onclick='atender("+'"'+detalles+'"'+")' style='width:70%'>"+obj.data[i].estado_rpt+"</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender("+'"'+detalles+'"'+")' ><i class='fa fa-desktop text-warning'></i></a></td>";
	//         //<a href='javascript:openEval()' onclick='atender("+'"'+detalles+'"'+")' class='detalle btn btn-info' >"+obj.data[i].estado_rpt+"</a></td></tr>";		
	//             }else if(obj.data[i].estado_rpt=='En proceso'){
	//         html +="<tr><td>"+obj.data[i].n_reporte+"</td><td>"+obj.data[i].nombre+' '+obj.data[i].apellidos+"</td><td>"+obj.data[i].ubicacion+"</td><td>"+obj.data[i].extension+"</td><td>"+Finicio+"</td><td>"+Finaliza+"</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-info' onclick='atender("+'"'+detalles+'"'+")' style='width:70%'>"+obj.data[i].estado_rpt+"</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender("+'"'+detalles+'"'+")' ><i class='fa fa-desktop text-warning'></i></a></td>";
	//             }else if(obj.data[i].evaluacion==0 && obj.data[i].estado_rpt=='Cancelado'){
	//         html +="<tr><td>"+obj.data[i].n_reporte+"</td><td>"+obj.data[i].nombre+' '+obj.data[i].apellidos+"</td><td>"+obj.data[i].ubicacion+"</td><td>"+obj.data[i].extension+"</td><td>"+Finicio+"</td><td>"+Finaliza+"</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle("+'"'+detalles+'"'+")' style='width:70%'>Falta que confirme</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender("+'"'+detalles+'"'+")' ><i class='fa fa-desktop text-warning'></i></a></td>"; 
	//             }else if(obj.data[i].evaluacion==0){
	//         html +="<tr><td>"+obj.data[i].n_reporte+"</td><td>"+obj.data[i].nombre+' '+obj.data[i].apellidos+"</td><td>"+obj.data[i].ubicacion+"</td><td>"+obj.data[i].extension+"</td><td>"+Finicio+"</td><td>"+Finaliza+"</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle("+'"'+detalles+'"'+")' style='width:70%'>Falta su evaluación</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender("+'"'+detalles+'"'+")' ><i class='fa fa-desktop text-warning'></i></a></td>"; 
	//             }else if(obj.data[i].estado_rpt=='Finalizado'){
	//         html +="<tr><td>"+obj.data[i].n_reporte+"</td><td>"+obj.data[i].nombre+' '+obj.data[i].apellidos+"</td><td>"+obj.data[i].ubicacion+"</td><td>"+obj.data[i].extension+"</td><td>"+Finicio+"</td><td>"+Finaliza+"</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-success' onclick='detalle("+'"'+detalles+'"'+")' style='width:70%'>"+obj.data[i].estado_rpt+"</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender("+'"'+detalles+'"'+")' ><i class='fa fa-desktop text-warning'></i></a></td>";
	//             }else if(obj.data[i].evaluacion=='CANCELADO'){
	//             html +="<tr><td>"+obj.data[i].n_reporte+"</td><td>"+obj.data[i].nombre+' '+obj.data[i].apellidos+"</td><td>"+obj.data[i].ubicacion+"</td><td>"+obj.data[i].extension+"</td><td>"+Finicio+"</td><td>"+Finaliza+"</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-warning' onclick='detalle("+'"'+detalles+'"'+")' style='width:70%'>"+obj.data[i].estado_rpt+"</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender("+'"'+detalles+'"'+")' ><i class='fa fa-desktop text-warning'></i></a></td>";
	//             } 
	//         }
	//     html +='</tbody></table></div></div></div>';
	//     $("#reportes").html(html); 
	// })     

	//detalles de reporte Por atender
	function atender(detalles) {


		alert(detalles);

	    $.ajax({
	        url: '../php/atdReport.php',
	        type: 'POST'
	    }).done(function(resp) {
	        obj = JSON.parse(resp);
	        var res = obj.data;

	        for (i = 0; i < res.length; i++) {

	            if (obj.data[i].n_reporte == detalles) {


	                year = obj.data[i].finicio.substring(0, 4);
	                month = obj.data[i].finicio.substring(5, 7);
	                day = obj.data[i].finicio.substring(8, 10);
	                Finicio = day + '/' + month + '/' + year;

	                year = obj.data[i].ffinal.substring(0, 4);
	                month = obj.data[i].ffinal.substring(5, 7);
	                day = obj.data[i].ffinal.substring(8, 10);
	                Finaliza = day + '/' + month + '/' + year;

	                detalles = obj.data[i].n_reporte + '*' + obj.data[i].nombre + '*' + obj.data[i].apellidos + '*' + obj.data[i].extension + '*' + obj.data[i].ubicacion + '*' + obj.data[i].servicio + '*' + obj.data[i].intervencion + '*' + obj.data[i].descripcion + '*' + obj.data[i].usu_observ + '*' + obj.data[i].falla_interna + '*' + Finicio + '*' + Finaliza + '*' + obj.data[i].falla_xterna + '*' + obj.data[i].observa + '*' + obj.data[i].evaluacion + '*' + obj.data[i].estado_rpt + '*' + obj.data[i].hinicio + '*' + obj.data[i].hfinal + '*' + obj.data[i].idequipo + '*' + obj.data[i].solucion + '*' + obj.data[i].ultima + '*' + obj.data[i].final+'*'+obj.data[i].n_empleado;


	                var d = detalles.split("*");

	                $("#modalAtndr #n_reporte").val(d[0]);
	                // $("#modalAtndr #usuario").val(d[1] + ' ' + d[2]);
	                // $("#modalAtndr #extension").val(d[3]);
//	                $("#modalAtndr #ubicacion").val(d[4]);
	                $("#modalAtndr #servicio").val(d[5]);
	                $("#modalAtndr #intervencion").val(d[6]);
	                $("#modalAtndr #descripcion").val(d[7]);

	                if (d[19] == 'x' || d[19] == '') {
	                    document.getElementById('select3').style.backgroundColo = "#fff";
	                } else {
	                    $("#modalAtndr #solucion").val(d[19]);
	                }

	                if (d[20] == 'x' || d[20] == '') {
	                    $("#select4").hide();
	                    document.getElementById('select4').style.backgroundColo = "#fff";
	                } else {
	                    $("#modalAtndr #ultima").val(d[20]);
	                }
	                if (d[21] == 'x' || d[21] == '') {
	                    document.getElementById('select5').style.backgroundColo = "#fff";
	                } else {
	                    $("#modalAtndr #final").val(d[21]);
	                }



	                $("#modalAtndr #usu_observ").val(d[8]);
	                $("#modalAtndr #falla_interna").val(d[9]);
	                $("#modalAtndr #finicio").val(d[10] + ' a las ' + d[16] + ' hrs');
	                //  $("#modalAtndr #ffinal").val(d[11]);
	                $("#modalAtndr #estado_rpt").val(d[15]);

	                $("#modalAtndr #idequipo").val(d[18]);

	                //ID equipo para busqueda en la función
	         
	                ComprobarEqpo(d[18]);
	                personal(d[22]);

	            }
	        }
	    })

	}


function personal(n_empleado){

	    $.ajax({
	        url: '../php/listar_personal.php',
	        type: 'POST'
	    }).done(function(resp) {
	        obj = JSON.parse(resp);
	        var res = obj.data;

	        for (i = 0; i < res.length; i++) {

	            if (obj.data[i].gstNmpld == n_empleado) {

					$("#modalAtndr #usuario").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
					$("#modalAtndr #extension").val(obj.data[i].gstExTel);

					$("#modalDtll #usuario").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
					$("#modalDtll #extension").val(obj.data[i].gstExTel);

	            }
	        }
	    })





}

	//detalles del reporte atendido 
	function detalle(detalles) {


	    $.ajax({
	        url: '../php/atdReport.php',
	        type: 'POST'
	    }).done(function(resp) {
	        obj = JSON.parse(resp);
	        var res = obj.data;

	        for (i = 0; i < res.length; i++) {

	            if (obj.data[i].n_reporte == detalles) {

	                year = obj.data[i].finicio.substring(0, 4);
	                month = obj.data[i].finicio.substring(5, 7);
	                day = obj.data[i].finicio.substring(8, 10);
	                Finicio = day + '/' + month + '/' + year;

	                year = obj.data[i].ffinal.substring(0, 4);
	                month = obj.data[i].ffinal.substring(5, 7);
	                day = obj.data[i].ffinal.substring(8, 10);
	                Finaliza = day + '/' + month + '/' + year;

	                detalles = obj.data[i].n_reporte + '*' + obj.data[i].nombre + '*' + obj.data[i].apellidos + '*' + obj.data[i].extension + '*' + obj.data[i].ubicacion + '*' + obj.data[i].servicio + '*' + obj.data[i].intervencion + '*' + obj.data[i].descripcion + '*' + obj.data[i].usu_observ + '*' + obj.data[i].falla_interna + '*' + Finicio + '*' + Finaliza + '*' + obj.data[i].falla_xterna + '*' + obj.data[i].observa + '*' + obj.data[i].evaluacion + '*' + obj.data[i].estado_rpt + '*' + obj.data[i].hinicio + '*' + obj.data[i].hfinal + '*' + obj.data[i].idequipo+'*'+obj.data[i].n_empleado;


	                var d = detalles.split("*");
	                $("#modalDtll #n_reporte").val(d[0]);
	                // $("#modalDtll #usuario").val(d[1] + ' ' + d[2]);
	                // $("#modalDtll #extension").val(d[3]);
	                // $("#modalDtll #ubicacion").val(d[4]);
	                $("#modalDtll #servicio").val(d[5]);
	                $("#modalDtll #intervencion").val(d[6]);
	                $("#modalDtll #descripcion").val(d[7]);
	                $("#modalDtll #usu_observ").val(d[8]);
	                $("#modalDtll #falla_interna").val(d[9]);
	                $("#modalDtll #finicio").val(d[10] + ' a las ' + d[16] + ' hrs');
	                $("#modalDtll #ffinal").val(d[11] + ' a las ' + d[17] + ' hrs');
	                if (d[12] == 0 || d[12] == '') {
	                    $("#falla").hide();
	                } else {
	                    $("#falla").show();
	                    $("#modalDtll #falla_xterna").val(d[12]);
	                }
	                $("#modalDtll #observa").val(d[13]);
	                $("#modalDtll #evaluacion").val(d[14]);

	                $("#modalDtll #estado_rpt").val(d[15]);

					personal(d[19]);

	            }
	        }
	    })
	}



	var limpiarCampo = function() {}

	//Es correcta la descripción del problema que selecciono el usuario?
	$(document).ready(function() {
	    $("input[type=radio]").click(function(event) {
	        var valor = $(event.target).val();
	        if (valor == "true") {
	            $("#dsprob1").hide();
	            $("#dsprob2").show();
	            $("#modalAtndr #rspst").val('SI');
	        } else if (valor == "false") {
	            $("#dsprob1").show();
	            $("#dsprob2").hide();
	            $("#modalAtndr #rspst").val('NO');
	        }
	    });
	});

	//condición ¿El soporte es externo?
	$(document).ready(function() {
	    $("input[type=radio]").click(function(event) {
	        var valor = $(event.target).val();
	        if (valor == "si") {
	            $("#externo").show();
	            limpiarCampo();
	        } else if (valor == "no") {
	            $("#externo").hide();
	        }
	    });
	});

	function atdRpt() {

	    var nreporte = document.getElementById('n_reporte').value;
	    var servicio = document.getElementById('servicio').value;
	    var intervencion = document.getElementById('intervencion').value;
	    var descripcion = document.getElementById('descripcion').value;
	    var falla_interna = document.getElementById('falla_interna').value;
	    var falla_xterna = document.getElementById('falla_xterna').value;
	    var estado_rpt = document.getElementById('estado_rpt').value;
	    var rspst = document.getElementById('rspst').value;
	    var solucion = document.getElementById('solucion').value;
	    var ultima = document.getElementById('ultima').value;
	    var final = document.getElementById('final').value;

	    datos = servicio + '*' + intervencion + '*' + descripcion + '*' + falla_interna + '*' + falla_xterna + '*' + estado_rpt + '*' + rspst + '*' + solucion + '*' + ultima + '*' + final;
	    //alert(datos);
	    if (nreporte == '' || servicio == '0' || intervencion == '0' || descripcion == '0' || solucion == '' || ultima == '' || final == '' || falla_interna == '' || estado_rpt == '') {
	        $("#vacios").toggle("toggled");
	        setTimeout(function() {
	            $('#vacios').toggle('toggled');
	        }, 4000);
	        return;
	    } else {
	        $.ajax({
	            url: '../php/atdRptFnl.php',
	            type: 'POST',
	            data: 'nreporte=' + nreporte + '&servicio=' + servicio + '&intervencion=' + intervencion + '&descripcion=' + descripcion + '&solucion=' + solucion + '&ultima=' + ultima + '&final=' + final + '&falla_interna=' + falla_interna + '&falla_xterna=' + falla_xterna + '&estado_rpt=' + estado_rpt + '&rspst=' + rspst + '&opcion=atender'
	        }).done(function(respuesta) {
	            console.log(respuesta);

	            if (respuesta == 'Por atender') {
	                $("#pndnt").toggle("toggled");
	                setTimeout(function() {
	                    $("#pndnt").toggle("toggled");
	                }, 4000);
	            }
	            if (respuesta == 'Finalizado') {
	                $("#exitos").toggle("toggled");
	                setTimeout(function() {
	                    $("#exitos").toggle("toggled");
	                }, 4000);
	            } else if (respuesta == 'Pendiente') {
	                $("#procso").toggle("toggled");
	                setTimeout(function() {
	                    $("#procso").toggle("toggled");
	                }, 4000);
	            } else if (respuesta == 'Cancelado') {
	                $("#canclado").toggle("toggled");
	                setTimeout(function() {
	                    $("#canclado").toggle("toggled");
	                }, 4000);
	            } else if (respuesta == 1) {
	                $("#errors").toggle("toggled");
	                setTimeout(function() {
	                    $("#errors").toggle("toggled");
	                }, 4000);
	            }
	        });
	    }

	}

	function ComprobarEqpo(ideqpp) {

	    $.ajax({
	        url: '../php/asigEqpo.php',
	        type: 'POST'
	    }).done(function(resp) {
	        obj = JSON.parse(resp);
	        var res = obj.data;

	        for (i = 0; i < res.length; i++) {

	            if (obj.data[i].id_equipo == ideqpp) {

	                $("#modalVal #n_empleado").val(obj.data[i].n_emp);
	                $("#modalVal #asignado").val(obj.data[i].proceso);
	                $("#modalVal #id_equipo").val(obj.data[i].id_equipo);
	                // $("#modalVal #num_sigtic").val(obj.data[i].num_sigtic);
	                $("#modalVal #num_invntraio").val(obj.data[i].num_invntraio);
	                $("#modalVal #marca_cpu").val(obj.data[i].marca_cpu);
	                $("#modalVal #serie_cpu").val(obj.data[i].serie_cpu);
	                $("#modalVal #memoria_ram").val(obj.data[i].memoria_ram);
	                $("#modalVal #procesador").val(obj.data[i].procesador);
	                $("#modalVal #velocidad_proc").val(obj.data[i].velocidad_proc);
	                $("#modalVal #uni_disc_flax").val(obj.data[i].uni_disc_flax);
	                $("#modalVal #disco_duro").val(obj.data[i].disco_duro);
	                $("#modalVal #serie_teclado").val(obj.data[i].serie_teclado);
	                $("#modalVal #serie_monitor").val(obj.data[i].serie_monitor);
	                $("#modalVal #version_windows").val(obj.data[i].version_windows);
	                $("#modalVal #version_office").val(obj.data[i].version_office);
	                $("#modalVal #serie_mouse").val(obj.data[i].serie_mouse);
	                $("#modalVal #direccion_ip").val(obj.data[i].direccion_ip);
	                $("#modalVal #nombre_equipo").val(obj.data[i].nombre_equipo);
	                $("#modalVal #servicio_internet").val(obj.data[i].servicio_internet);
	                $("#modalVal #tipo_equipo").val(obj.data[i].tipo_equipo);
	                $("#modalVal #ubicaeqpo").val(obj.data[i].ubicacion);

	            }
	        }
	    })

	}

	function agrEqpo() {

	    // var n_empleado = document.getElementById('n_empleado').value;
	    // var asignado = document.getElementById('asignado').value;
	    var id_equipo = document.getElementById('id_equipo').value;
	    // var num_sigtic = document.getElementById('num_sigtic').value;
	    var num_invntraio = document.getElementById('num_invntraio').value;
	    var marca_cpu = document.getElementById('marca_cpu').value;
	    var serie_cpu = document.getElementById('serie_cpu').value;
	    var memoria_ram = document.getElementById('memoria_ram').value;
	    var procesador = document.getElementById('procesador').value;
	    var velocidad_proc = document.getElementById('velocidad_proc').value;
	    var uni_disc_flax = document.getElementById('uni_disc_flax').value;
	    var disco_duro = document.getElementById('disco_duro').value;
	    var serie_teclado = document.getElementById('serie_teclado').value;
	    var serie_monitor = document.getElementById('serie_monitor').value;
	    var version_windows = document.getElementById('version_windows').value;
	    var version_office = document.getElementById('version_office').value;
	    var serie_mouse = document.getElementById('serie_mouse').value;
	    var direccion_ip = document.getElementById('direccion_ip').value;
	    var nombre_equipo = document.getElementById('nombre_equipo').value;
	    var servicio_internet = document.getElementById('servicio_internet').value;
	    var tipo_equipo = document.getElementById('tipo_equipo').value;
	    var ubicacion = document.getElementById('ubicaeqpo').value;
	    var cambio = 0;

	    datos = id_equipo + '*' + num_invntraio + '*' + marca_cpu + '*' + serie_cpu + '*' + memoria_ram + '*' + procesador + '*' + velocidad_proc + '*' + uni_disc_flax + '*' + disco_duro + '*' + serie_teclado + '*' + serie_monitor + '*' + version_windows + '*' + version_office + '*' + serie_mouse + '*' + direccion_ip + '*' + nombre_equipo + '*' + servicio_internet + '*' + tipo_equipo + '*' + ubicacion;

	    if (id_equipo == '0' || num_invntraio == '0' || marca_cpu == '0' || serie_cpu == '0' || memoria_ram == '0' || procesador == '0' || velocidad_proc == '0' || uni_disc_flax == '0' || disco_duro == '0' || serie_teclado == '0' || serie_monitor == '0' || version_windows == '0' || version_office == '0' || serie_mouse == '0' || direccion_ip == '0' || nombre_equipo == '0' || servicio_internet == '0' || tipo_equipo == '0' || ubicacion == '0') {
	        $("#empty").toggle("toggled");
	        setTimeout(function() {
	            $('#empty').toggle('toggled');
	        }, 4000);
	        return;
	    } else {
	        $.ajax({
	            url: '../php/agrEqpo.php',
	            type: 'POST',
	            data: 'id_equipo=' + id_equipo + '&cambio=' + cambio + '&num_invntraio=' + num_invntraio + '&marca_cpu=' + marca_cpu + '&serie_cpu=' + serie_cpu + '&memoria_ram=' + memoria_ram + '&procesador=' + procesador + '&velocidad_proc=' + velocidad_proc + '&uni_disc_flax=' + uni_disc_flax + '&disco_duro=' + disco_duro + '&serie_teclado=' + serie_teclado + '&serie_monitor=' + serie_monitor + '&version_windows=' + version_windows + '&version_office=' + version_office + '&serie_mouse=' + serie_mouse + '&direccion_ip=' + direccion_ip + '&nombre_equipo=' + nombre_equipo + '&servicio_internet=' + servicio_internet + '&tipo_equipo=' + tipo_equipo + '&ubicacion=' + ubicacion + '&opcion=actualizar'
	        }).done(function(respuesta) {
	            console.log(respuesta);
	            if (respuesta == 0) {
	                $("#success").toggle("toggled");
	                setTimeout(function() {
	                    $("#success").toggle("toggled");
	                }, 4000);
	            } else if (respuesta == 1) {
	                $("#danger").toggle("toggled");
	                setTimeout(function() {
	                    $("#danger").toggle("toggled");
	                }, 4000);
	            }
	        });
	    }

	}

	//consulta equipo finalizado 


	$.ajax({
	    url: '../php/atdReport.php',
	    type: 'POST'
	}).done(function(resp) {
	    obj = JSON.parse(resp);
	    var res = obj.data;

	    var x = 0;
	    html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="rportfinal" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>N° reporte</th><th><i></i>Nombre usuario</th><th><i></i>Ubicación</th><th><i></i>Extensión</th><th><i></i>Reporte</th><th><i></i>Termino</th><th><i></i>Estado</th></tr></thead><tbody>';
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

	        detalles = obj.data[i].n_reporte + '*' + obj.data[i].nombre + '*' + obj.data[i].apellidos + '*' + obj.data[i].extension + '*' + obj.data[i].ubicacion + '*' + obj.data[i].servicio + '*' + obj.data[i].intervencion + '*' + obj.data[i].descripcion + '*' + obj.data[i].usu_observ + '*' + obj.data[i].falla_interna + '*' + Finicio + '*' + Finaliza + '*' + obj.data[i].falla_xterna + '*' + obj.data[i].observa + '*' + obj.data[i].evaluacion + '*' + obj.data[i].estado_rpt + '*' + obj.data[i].hinicio + '*' + obj.data[i].hfinal + '*' + obj.data[i].idequipo;

	        //        detalles = obj.data[i].n_reporte+'*'+obj.data[i].nombre+'*'+obj.data[i].apellidos+'*'+obj.data[i].extension+'*'+obj.data[i].ubicacion+'*'+obj.data[i].servicio+'*'+obj.data[i].intervencion+'*'+obj.data[i].descripcion+'*'+obj.data[i].finicio+'*'+obj.data[i].ffinal;

	        if (obj.data[i].evaluacion == 0 && obj.data[i].estado_rpt == 'Finalizado') {
	            html += "<tr><td>" + obj.data[i].n_reporte + "</td><td>" + obj.data[i].nombre + ' ' + obj.data[i].apellidos + "</td><td>" + obj.data[i].ubicacion + "</td><td>" + obj.data[i].extension + "</td><td>" + Finicio + "</td><td>" + Finaliza + "</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle(" + '"' + detalles + '"' + ")' style='width:100%'>Falta su evaluación</a></td>";
	        } else if (obj.data[i].evaluacion != 0) {
	            html += "<tr><td>" + obj.data[i].n_reporte + "</td><td>" + obj.data[i].nombre + ' ' + obj.data[i].apellidos + "</td><td>" + obj.data[i].ubicacion + "</td><td>" + obj.data[i].extension + "</td><td>" + Finicio + "</td><td>" + Finaliza + "</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle(" + '"' + detalles + '"' + ")' style='width:100%'><b>" + obj.data[i].evaluacion + "</b></a></td>";
	        } else if (obj.data[i].evaluacion == 0 && obj.data[i].estado_rpt == 'Cancelado') {
	            html += "<tr><td>" + obj.data[i].n_reporte + "</td><td>" + obj.data[i].nombre + ' ' + obj.data[i].apellidos + "</td><td>" + obj.data[i].ubicacion + "</td><td>" + obj.data[i].extension + "</td><td>" + Finicio + "</td><td>" + Finaliza + "</td><td><a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle(" + '"' + detalles + '"' + ")' style='width:100%'>Falta que confirme</a></td>";
	        }
	    }
	    html += '</tbody></table></div></div></div>';
	    $("#rprtsfianls").html(html);
	})