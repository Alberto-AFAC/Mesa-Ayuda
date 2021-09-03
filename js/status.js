
//destroy:true,
$.ajax({
    url: '../php/conPersonal.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    // var personas = 0;
    var designado = 0;
    var asignado = 0;
    var nuevo = 0;
    var baja = 0;

    for (i = 0; i < res.length; i++) {

        if (obj.data[i].proceso== 'nuevo') {
            nuevo++;
        } 
        if(obj.data[i].estado== '1' && obj.data[i].proceso=='asignado'){
            baja++;
        }
        if(obj.data[i].proceso=='designado'){
            designado++;
        }
        if(obj.data[i].proceso=='asignado'){
            asignado++;
        }

    }

    if(nuevo>=1){$("#nuevo").html(nuevo);}else{$("#onuevo").hide();}

    if(baja>=1){$("#baja").html(baja);}else{$("#obaja").hide();}

    if(designado>=1){$("#designado").html(designado);}else{$("#odesignado").hide();}    

    if(asignado>=1){$("#asignado").html(asignado);}else{$("#oasignado").hide();}    

});



//destroy:true,
$.ajax({
    url: '../php/personal_listar.php',
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    var total = 0;

    for (i = 0; i < res.length; i++) {


            total++;
    }
    
   
    if(total>=1){$("#total").html(total);}else{$("#ototal").hide();}    

});




//destroy:true,
$.ajax({
    url: '../php/equipo_listar.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    // var personas = 0;
     var compu = 0;


    for (i = 0; i < res.length; i++) {

        if(obj.data[i].n_emp==0){
        compu++;
        }

    }


    $("#compu").html(compu);

});



// //destroy:true,
// $.ajax({
//     url: '../../php/conPersonal.php',
//     type: 'POST'
// }).done(function(resp) {
//     obj = JSON.parse(resp);
//     var res = obj.data;
//     // var personas = 0;
//     var designado = 0;
//     var asignado = 0;
//     var nuevo = 0;
//     var baja = 0;

//     for (i = 0; i < res.length; i++) {

//         if (obj.data[i].proceso== 'nuevo') {
//             nuevo++;
//         } 
//         if(obj.data[i].proceso== 'baja'){
//             baja++;
//         }
//         if(obj.data[i].proceso=='designado'){
//             designado++;
//         }
//         if(obj.data[i].proceso=='asignado'){
//             asignado++;
//         }


//     }
    
//     alert(baja);  

//     total = nuevo+designado+asignado;

//     if(total>=1){$("#total").html(total);}else{$("#ototal").hide();}    

//     if(designado>=1){$("#designado").html(designado);}else{$("#odesignado").hide();}    

//     if(asignado>=1){$("#asignado").html(asignado);}else{$("#oasignado").hide();}    

//     if(nuevo>=1){$("#nuevo").html(nuevo);}else{$("#onuevo").hide();}

//     if(baja>=1){$("#baja").html(baja);}else{$("#obaja").hide();}

// });



//destroy:true,
$.ajax({
    url: '../../php/conPersonal.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    // var personas = 0;
    var designado = 0;
    var asignado = 0;
    var nuevo = 0;
    var baja = 0;

    for (i = 0; i < res.length; i++) {

        if (obj.data[i].proceso== 'nuevo') {
            nuevo++;
        } 
        if(obj.data[i].estado== '1' && obj.data[i].proceso=='asignado'){
            baja++;
        }
        if(obj.data[i].proceso=='designado'){
            designado++;
        }
        if(obj.data[i].proceso=='asignado'){
            asignado++;
        }

    }

    if(nuevo>=1){$("#nuevo").html(nuevo);}else{$("#onuevo").hide();}

    if(baja>=1){$("#baja").html(baja);}else{$("#obaja").hide();}

    if(designado>=1){$("#designado").html(designado);}else{$("#odesignado").hide();}    

    if(asignado>=1){$("#asignado").html(asignado);}else{$("#oasignado").hide();}    

});



//destroy:true,
$.ajax({
    url: '../../php/personal_listar.php',
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    var total = 0;

    for (i = 0; i < res.length; i++) {


            total++;
    }
    
   
    if(total>=1){$("#total").html(total);}else{$("#ototal").hide();}    

});




//destroy:true,
$.ajax({
    url: '../../php/equipo_listar.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    // var personas = 0;
     var compu = 0;


    for (i = 0; i < res.length; i++) {

        if(obj.data[i].n_emp==0){
        compu++;
        }

    }


    $("#compu").html(compu);

});
