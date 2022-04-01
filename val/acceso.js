function acceso(datas){

	alert(datas);

		$.ajax({
		url: '../php/acceso.php',
		type: 'POST',
		data: 'datas='+datas
		}).done(function(resp) {
        // obj = JSON.parse(resp);
        // var res = obj.data;
        // var x = 0;	 
        alert(resp);
		});
}
