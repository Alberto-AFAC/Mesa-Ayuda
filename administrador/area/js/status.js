$.ajax({
    url:'../php/gisis.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);
var res = obj.data;  
var total=0;
var si=0;
var rezago = 0;
var activa = 0;
var inactiva = 0;   
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id_ip;
        

            if(obj.data[i].gisis=='rezago'){
            rezago++;
            }else if(obj.data[i].gisis=='0'){
                activa++;
            }else if(obj.data[i].gisis=='1'){
                inactiva++;
            }
                   total++;
        }
                    si = rezago + activa;
            document.getElementById("total").innerHTML = ""+'<b>Total, de instalaciones portuarias: '+total+'</b>';
            document.getElementById("si").innerHTML = ""+'<b>Registradas : '+si+'</b>';
            document.getElementById("no").innerHTML = ""+'<b>Sin registro : '+inactiva+'</b>';
            document.getElementById("activa").innerHTML = ""+'<b>Activas : '+activa+'</b>';
            document.getElementById("rezago").innerHTML = ""+'<b>Rezago : '+rezago+'</b>';
    });
  

  $.ajax({
    url:'../php/opips.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);
var res = obj.data; 

var opip = 0;
var titular = 0;
var suplente = 0;
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id;

        if(obj.data[i].tipo=='Titular'){
                titular++;        
        }else if(obj.data[i].tipo=='Suplente'){
                suplente++;
        }            
         opip++;
        }
            document.getElementById("totalop").innerHTML = ""+'<b>Total: '+opip+'</b>';
            document.getElementById("titular").innerHTML = ""+'<b>Titulares : '+titular+'</b>';
            document.getElementById("suplente").innerHTML = ""+'<b>Suplentes : '+suplente+'</b>';
    });
  
  $.ajax({
    url:'../php/inactivo.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);
var res = obj.data; 

var viginac = 0;
var veninac = 0;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id;

fvigd = obj.data[i].vig_cert.substring(8,10);
fvigm = obj.data[i].vig_cert.substring(5,7);
fvigy = obj.data[i].vig_cert.substring(0,4);

fecha_vig = fvigd+'/'+fvigm+'/'+fvigy;

fecha_agregada = obj.data[i].vig_cert;

var f2 = new Date(fvigy,fvigm,fvigd);

      if(f2 > f1){
            viginac++;

      }else if(f2 < f1){
            veninac++;
      }
                
        }
            document.getElementById("vigente_inactivo").innerHTML = ""+'<b>Certificados Inactivo Vigentes : '+viginac+'</b>';
            document.getElementById("vencido_inactivo").innerHTML = ""+'<b>Certificados Inactivo Vencidos : '+veninac+'</b>';
    
  $.ajax({
    url:'../php/opipsregistrados.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);
var res = obj.data; 

var registrado = 0;
var vigact = 0;
var vigven = 0;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id;

fexpd = obj.data[i].exp_cert.substring(8,10);
fexpm = obj.data[i].exp_cert.substring(5,7);
fexpy = obj.data[i].exp_cert.substring(0,4);

fecha_exp = fexpd+'/'+fexpm+'/'+fexpy;

fvigd = obj.data[i].vig_cert.substring(8,10);
fvigm = obj.data[i].vig_cert.substring(5,7);
fvigy = obj.data[i].vig_cert.substring(0,4);

fecha_vig = fvigd+'/'+fvigm+'/'+fvigy;

fecha_agregada = obj.data[i].vig_cert;

var f2 = new Date(fvigy,fvigm,fvigd);


      if(f2 < f1){
            vigven++;
      }
      if(f2 >= f1){
        vigact++;
      }
                    
         registrado++;
        }   


                totalv = vigven - veninac;
                totala = vigact - viginac;

            document.getElementById("registrados").innerHTML = ""+'<b>Total, de opips registrados: '+registrado+'  <a style="color:#1f6e42;" href="../excel/totalopip"><i class="fa fa-file-excel-o"></i></a></b>';
            document.getElementById("vigente_activo").innerHTML = ""+'<b>Certificados Activos Vigentes : '+totala+'</b>';
            document.getElementById("vigente_vencido").innerHTML = ""+'<b>Certificados Activos Vencidos : '+totalv+'</b>';            
    });
    
});
    
  $.ajax({
        url:'../php/inst_procso.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var x = 0;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());
var dcip = 0;
var dcipvig = 0;
var dcipsina = 0;
var dcipven = 0;
var dciproce = 0;
     for(i=0; i<res.length;i++){
     x++;

año = obj.data[i].epip.substring(0,4);
result = parseInt(año) + 5;
ciclo = año+' - '+result;

if(ciclo == '0000 - 5'){

  ciclo = 'S / r'.fontcolor('red');
}


var hoy = new Date();  
var agregepip = new Date(obj.data[i].epip);
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();

var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());


dcip_vigd =obj.data[i].dcip_vig.substring(8,10);
dcip_vigm =obj.data[i].dcip_vig.substring(5,7);
dcip_vigy =obj.data[i].dcip_vig.substring(0,4);

fec_dcip_vig = dcip_vigd+'/'+dcip_vigm+'/'+dcip_vigy;


fedcipd = obj.data[i].dcip_vig.substring(8,10);
fedcipm = obj.data[i].dcip_vig.substring(5,7);
fedcipy = obj.data[i].dcip_vig.substring(0,4);

fecha_agregada = obj.data[i].dcip_vig;

var f2vig = new Date(fedcipy,fedcipm,fedcipd);


var fecha_anterios = (hoy.getFullYear()-1);

var fsina = new Date(fecha_anterios,'01','01');

fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_agregada);
diferencia = fecha2.diff(fecha1, 'days');

fepipd =obj.data[i].epip.substring(8,10);
fepipm =obj.data[i].epip.substring(5,7);
fepipy =obj.data[i].epip.substring(0,4);

var fepip = new Date(fepipy,fepipm,fepipd);

fppipd =obj.data[i].ppip.substring(8,10);
fppipm =obj.data[i].ppip.substring(5,7);
fppipy =obj.data[i].ppip.substring(0,4);

var fppip = new Date(fppipy,fppipm,fppipd);

faud_certd =obj.data[i].aud_cert.substring(8,10);
faud_certm =obj.data[i].aud_cert.substring(5,7);
faud_certy =obj.data[i].aud_cert.substring(0,4);

var faud_cert = new Date(faud_certy,faud_certm,faud_certd);
  
if(obj.data[i].dcip_exp == '0000-00-00'){

if(fepip >= fsina || fppip >= fsina || faud_cert >= fsina){
            dcipsina++;            
}else{
            dciproce++;
}

}else if(f2vig > f1){
      dcipvig++;
}else{
        dcipven++;
          }
            dcip++;
        }

//       var resproceso = dciproce - dcipsina;

document.getElementById("dcip").innerHTML = ""+'<b>Total, de DCIP: '+dcip+'  <a style="color:#1f6e42;" href="../excel/dcip"><i class="fa fa-file-excel-o"></i></a></b>';
document.getElementById("dcip_vigente").innerHTML = ""+'<b>Vigentes : '+dcipvig+'</b>';
document.getElementById("dcip_vencidos").innerHTML = ""+'<b>Vencidas : '+dcipven+'</b>';
document.getElementById("dcip_sinavnc").innerHTML = ""+'<b>Sin avances : '+dciproce+'</b>';
document.getElementById("dcip_proceso").innerHTML = ""+'<b>En proceso : '+dcipsina+'</b>';

    });         
