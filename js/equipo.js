function listar_equipo(){

	var table = $("#equipo").DataTable({
		"destroy":true,
		"ajax":{
			"method":"POST",
			"url":"../../php/equipo_listar.php"
		},
		"columns":[
			{"data":"num_exp"},
			{"data":"marca_cpu"},
			{"data":"serie_cpu"},
			{"data":"version_windows"},
			{"data":"direccion_ip"},
			{"data":"ubicacion"},
			{"defaultContent":""}
		],
	});
	
}