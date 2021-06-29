  $.ajax({
        url:'../php/inst_port.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  

var x = 0;
//var hoy = new Date();
//var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
//var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="historia" class="table table-striped table-bordered dataTable table table-hover" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i> Instalación Portuaria</th><th><i></i> Estado</th><th><i></i>Epip</th><th><i></i>Ppip</th><th><i></i>Aud_Cert</th><th><i></i>DCIP Exp.</th><th><i></i>DCIP Vig.</th><th>Auditoria1</th><th>Auditoria2</th><th>Auditoria3</th><th>Auditoria4</th><th><i></i>Acción</th></tr></thead><tbody>';

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

var dias = 31; // Número de días a agregar
agregepip.setDate(agregepip.getDate() + dias);

var fecha_desepip = agregepip.getFullYear()+'-'+(agregepip.getMonth()+1)+'-'+agregepip.getDate();
var des = new Date(fecha_desepip);
var f2epip = new Date(des.getFullYear(),(des.getMonth()+1),des.getDate());
fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_desepip);
restante = fecha2.diff(fecha1, 'days');

epipd =obj.data[i].epip.substring(8,10);
epipm =obj.data[i].epip.substring(5,7);
epipy =obj.data[i].epip.substring(0,4);


if(obj.data[i].epip == '0000-00-00'){      
fec_epip = 'sin registro'.fontcolor('red');
}else{
fec_epip = epipd+'/'+epipm+'/'+epipy;
}

ppipd =obj.data[i].ppip.substring(8,10);
ppipm =obj.data[i].ppip.substring(5,7);
ppipy =obj.data[i].ppip.substring(0,4);


if(f1<f2epip && obj.data[i].ppip == '0000-00-00'){
 fec_ppip = ('A '+restante+' días').fontcolor('green');          
}else if(obj.data[i].ppip == '0000-00-00'){      
fec_ppip = 'rezago'.fontcolor('red');
}else{
fec_ppip = ppipd+'/'+ppipm+'/'+ppipy;
}

var agregppip = new Date(obj.data[i].ppip);
var dias = 31; // Número de días a agregar
agregppip.setDate(agregppip.getDate() + dias);

var fecha_desppip = agregppip.getFullYear()+'-'+(agregppip.getMonth()+1)+'-'+agregppip.getDate();
var des = new Date(fecha_desppip);
var f2ppip = new Date(des.getFullYear(),(des.getMonth()+1),des.getDate());
fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_desppip);
restante = fecha2.diff(fecha1, 'days');

aud_certd =obj.data[i].aud_cert.substring(8,10);
aud_certm =obj.data[i].aud_cert.substring(5,7);
aud_certy =obj.data[i].aud_cert.substring(0,4);

if(f1<f2ppip && obj.data[i].aud_cert == '0000-00-00'){
 fec_aud_cert = ('A '+restante+' días').fontcolor('green');          
}else if(f1<f2epip && obj.data[i].aud_cert == '0000-00-00'){      
fec_aud_cert = 'por tramitar'.fontcolor('green');
}else if(obj.data[i].aud_cert == '0000-00-00'){
fec_aud_cert = 'rezago'.fontcolor('red');  
}else{
fec_aud_cert = aud_certd+'/'+aud_certm+'/'+aud_certy;
}

re_acd =obj.data[i].re_ac.substring(8,10);
re_acm =obj.data[i].re_ac.substring(5,7);
re_acy =obj.data[i].re_ac.substring(0,4);
fec_re_ac = re_acd+'/'+re_acm+'/'+re_acy;


dcip_expd =obj.data[i].dcip_exp.substring(8,10);
dcip_expm =obj.data[i].dcip_exp.substring(5,7);
dcip_expy =obj.data[i].dcip_exp.substring(0,4);

if(obj.data[i].dcip_exp == '0000-00-00'){
fec_dcip_exp = 'sin tramitar'.fontcolor('red');
}else{
fec_dcip_exp = dcip_expd+'/'+dcip_expm+'/'+dcip_expy;
}



dcip_vigd =obj.data[i].dcip_vig.substring(8,10);
dcip_vigm =obj.data[i].dcip_vig.substring(5,7);
dcip_vigy =obj.data[i].dcip_vig.substring(0,4);

fec_dcip_vig = dcip_vigd+'/'+dcip_vigm+'/'+dcip_vigy;

var agregaud_cert = new Date(obj.data[i].aud_cert);
var dias = 366; // Número de días a agregar
agregaud_cert.setDate(agregaud_cert.getDate() + dias);

var fecha_aud_cert = agregaud_cert.getFullYear()+'-'+(agregaud_cert.getMonth()+1)+'-'+agregaud_cert.getDate();
var des  = new Date(fecha_aud_cert);
var f2_cert = new Date(des.getFullYear(),(des.getMonth()+1),des.getDate());
fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_aud_cert);
restante = fecha2.diff(fecha1, 'days');

auditoria1d =obj.data[i].auditoria1.substring(8,10);
auditoria1m =obj.data[i].auditoria1.substring(5,7);
auditoria1y =obj.data[i].auditoria1.substring(0,4);

if(f1<f2_cert && obj.data[i].auditoria1 == '0000-00-00'){
fec_auditoria1 = ('A '+restante+' días').fontcolor('green');          
}else if(f1<f2epip && obj.data[i].auditoria1 == '0000-00-00' || f1<f2ppip && obj.data[i].auditoria1 == '0000-00-00'){      
fec_auditoria1 = 'por tramitar'.fontcolor('green');
}else if(obj.data[i].auditoria1 == '0000-00-00'){
fec_auditoria1 = 'rezago'.fontcolor('red');  
}else{
fec_auditoria1 = auditoria1d+'/'+auditoria1m+'/'+auditoria1y;
}

resellado1d =obj.data[i].resellado1.substring(8,10);
resellado1m =obj.data[i].resellado1.substring(5,7);
resellado1y =obj.data[i].resellado1.substring(0,4);
fec_resellado1 = resellado1d+'/'+resellado1m+'/'+resellado1y;

var agreauditor1 = new Date(obj.data[i].auditoria1);
var dias = 366; // Número de días a agregar
agreauditor1.setDate(agreauditor1.getDate() + dias);

var fecha_auditor1 = agreauditor1.getFullYear()+'-'+(agreauditor1.getMonth()+1)+'-'+agreauditor1.getDate();

var des  = new Date(fecha_auditor1);
var f2aud1 = new Date(des.getFullYear(),(des.getMonth()+1),des.getDate());
fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_auditor1);
restante = fecha2.diff(fecha1, 'days');

auditoria2d =obj.data[i].auditoria2.substring(8,10);
auditoria2m =obj.data[i].auditoria2.substring(5,7);
auditoria2y =obj.data[i].auditoria2.substring(0,4);

if(f1<f2aud1 && obj.data[i].auditoria2 == '0000-00-00'){
fec_auditoria2 = ('A '+restante+' días').fontcolor('green');          
}else if(f1<f2_cert && obj.data[i].auditoria2 == '0000-00-00' || f1<f2ppip && obj.data[i].auditoria2 == '0000-00-00' || f1<f2epip && obj.data[i].auditoria2 == '0000-00-00'){      
fec_auditoria2 = 'por tramitar'.fontcolor('green');
}else if(obj.data[i].auditoria2 == '0000-00-00'){
fec_auditoria2 = 'rezago'.fontcolor('red');  
}else{
fec_auditoria2 = auditoria2d+'/'+auditoria2m+'/'+auditoria2y;
}

resellado2d =obj.data[i].resellado2.substring(8,10);
resellado2m =obj.data[i].resellado2.substring(5,7);
resellado2y =obj.data[i].resellado2.substring(0,4);

fec_resellado2 = resellado2d+'/'+resellado2m+'/'+resellado2y;

var agreauditor2 = new Date(obj.data[i].auditoria2);
var dias = 366; // Número de días a agregar
agreauditor2.setDate(agreauditor2.getDate() + dias);

var fecha_auditor2 = agreauditor2.getFullYear()+'-'+(agreauditor2.getMonth()+1)+'-'+agreauditor2.getDate();

var des  = new Date(fecha_auditor2);
var f2aud2 = new Date(des.getFullYear(),(des.getMonth()+1),des.getDate());
fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_auditor2);
restante = fecha2.diff(fecha1, 'days');

auditoria3d =obj.data[i].auditoria3.substring(8,10);
auditoria3m =obj.data[i].auditoria3.substring(5,7);
auditoria3y =obj.data[i].auditoria3.substring(0,4);


if(f1<f2aud2 && obj.data[i].auditoria3 == '0000-00-00'){
fec_auditoria3 = ('A '+restante+' días').fontcolor('green');          
}else if(f1<f2aud1 && obj.data[i].auditoria3 == '0000-00-00' || f1<f2_cert && obj.data[i].auditoria3 == '0000-00-00' || f1<f2ppip && obj.data[i].auditoria3 == '0000-00-00' || f1<f2epip && obj.data[i].auditoria3 == '0000-00-00'){      
fec_auditoria3 = 'por tramitar'.fontcolor('green');
}else if(obj.data[i].auditoria3 == '0000-00-00'){
fec_auditoria3 = 'rezago'.fontcolor('red');  
}else{
fec_auditoria3 = auditoria3d+'/'+auditoria3m+'/'+auditoria3y;
}

resellado3d =obj.data[i].resellado3.substring(8,10);
resellado3m =obj.data[i].resellado3.substring(5,7);
resellado3y =obj.data[i].resellado3.substring(0,4);

fec_resellado3 = resellado3d+'/'+resellado3m+'/'+resellado3y;

var agreauditor3 = new Date(obj.data[i].auditoria3);
var dias = 366; // Número de días a agregar
agreauditor3.setDate(agreauditor3.getDate() + dias);

var fecha_auditor3 = agreauditor3.getFullYear()+'-'+(agreauditor3.getMonth()+1)+'-'+agreauditor3.getDate();

var des  = new Date(fecha_auditor3);
var f2aud3 = new Date(des.getFullYear(),(des.getMonth()+1),des.getDate());
fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_auditor3);
restante = fecha2.diff(fecha1, 'days');

auditoria4d =obj.data[i].auditoria4.substring(8,10);
auditoria4m =obj.data[i].auditoria4.substring(5,7);
auditoria4y =obj.data[i].auditoria4.substring(0,4);


if(f1<f2aud3 && obj.data[i].auditoria4 == '0000-00-00'){
fec_auditoria4 = ('A '+restante+' días').fontcolor('green');          
}else if(f1<f2aud2 && obj.data[i].auditoria4 == '0000-00-00' || f1<f2aud1 && obj.data[i].auditoria4 == '0000-00-00' || f1<f2_cert && obj.data[i].auditoria4 == '0000-00-00' || f1<f2ppip && obj.data[i].auditoria4 == '0000-00-00' || f1<f2epip && obj.data[i].auditoria4 == '0000-00-00'){      
fec_auditoria4 = 'por tramitar'.fontcolor('green');
}else if(obj.data[i].auditoria4 == '0000-00-00'){
fec_auditoria4 = 'rezago'.fontcolor('red');  
}else{
fec_auditoria4 = auditoria4d+'/'+auditoria4m+'/'+auditoria4y;

}

resellado4d =obj.data[i].resellado4.substring(8,10);
resellado4m =obj.data[i].resellado4.substring(5,7);
resellado4y =obj.data[i].resellado4.substring(0,4);

fec_resellado4 = resellado4d+'/'+resellado4m+'/'+resellado4y;

fedcipd = obj.data[i].dcip_vig.substring(8,10);
fedcipm = obj.data[i].dcip_vig.substring(5,7);
fedcipy = obj.data[i].dcip_vig.substring(0,4);

fecha_agregada = obj.data[i].dcip_vig;

var f2vig = new Date(fedcipy,fedcipm,fedcipd);

fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_agregada);
diferencia = fecha2.diff(fecha1, 'days');

  
if(fecha_agregada == '0000-00-00'){
     html +="<tr class='danger'><td><input type='hidden' id='idsip' value="+obj.data[i].numero+">"+obj.data[i].numero+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+'. '+obj.data[i].estado+"</td><td>"+fec_epip+"</td><td>"+fec_ppip+"</td><td>"+fec_aud_cert+"</td><td>"+fec_dcip_exp+"</td><td>"+'sin tramitar'.fontcolor('red')+"</td><td>"+fec_auditoria1+"</td><td>"+fec_auditoria2+"</td><td>"+fec_auditoria3+"</td><td>"+fec_auditoria4+"</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalDetalles' onclick='Detalle("+'"'+obj.data[i].id_ip+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";
}else if(f2vig < f1){
     html +="<tr class='danger'><td><input type='hidden' id='idsip' value="+obj.data[i].numero+">"+obj.data[i].numero+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+'. '+obj.data[i].estado+"</td><td>"+fec_epip+"</td><td>"+fec_ppip+"</td><td>"+fec_aud_cert+"</td><td>"+fec_dcip_exp+"</td><td>"+fec_dcip_vig+' vencida'.fontcolor('red')+"</td><td>"+fec_auditoria1+"</td><td>"+fec_auditoria2+"</td><td>"+fec_auditoria3+"</td><td>"+fec_auditoria4+"</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalDetalles' onclick='Detalle("+'"'+obj.data[i].id_ip+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";  
}else{

if(obj.data[i].numero == "" || obj.data[i].instalacion_portuaria == "" || obj.data[i].estado == "" || obj.data[i].puerto == "" || obj.data[i].epip == "" || obj.data[i].ppip == "" || obj.data[i].aud_cert == "" || obj.data[i].re_ac == "" || obj.data[i].dcip_exp == "" || obj.data[i].dcip_vig == "" || obj.data[i].holograma == "" || obj.data[i].auditoria1 == "" || obj.data[i].resellado1 == "" || obj.data[i].auditoria2 == "" || obj.data[i].resellado2 == "" || obj.data[i].auditoria3 == "" || obj.data[i].resellado3 == "" || obj.data[i].auditoria4 == "" || obj.data[i].resellado4 == "" || obj.data[i].actividad_realizar == "" || obj.data[i].actividad_vigencia == "" || obj.data[i].status == "" || obj.data[i].activo_historico == "" || obj.data[i].tipo == "" || obj.data[i].obser == ""){
   html +="<tr class='warning'><td><input type='hidden' id='idsip' value="+obj.data[i].numero+">"+obj.data[i].numero+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+'. '+obj.data[i].estado+"</td><td>"+fec_epip+"</td><td>"+fec_ppip+"</td><td>"+fec_aud_cert+"</td><td>"+fec_dcip_exp+"</td><td>"+fec_dcip_vig+ " fal. "+diferencia+" días</td><td>"+fec_auditoria1+"</td><td>"+fec_auditoria2+"</td><td>"+fec_auditoria3+"</td><td>"+fec_auditoria4+"</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalDetalles' onclick='Detalle("+'"'+obj.data[i].id_ip+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";  
}else{
   html +="<tr><td><input type='hidden' id='idsip' value="+obj.data[i].numero+">"+obj.data[i].numero+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+'. '+obj.data[i].estado+"</td><td>"+fec_epip+"</td><td>"+fec_ppip+"</td><td>"+fec_aud_cert+"</td><td>"+fec_dcip_exp+"</td><td>"+fec_dcip_vig+ " fal. "+diferencia+" días</td><td>"+fec_auditoria1+"</td><td>"+fec_auditoria2+"</td><td>"+fec_auditoria3+"</td><td>"+fec_auditoria4+"</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalDetalles' onclick='Detalle("+'"'+obj.data[i].id_ip+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";    
      }
          }


        }
  html +='</tbody></table></div></div></div>';

 $("#demoiph").html(html);  

    });   		




function reportesPDFIP(){

  var idip = $('#idsip').val();

  console.log(idip);

  window.open('../pdf/instport.php?numero='+idip+'');
}




function Detalle(id_ip){

    var id_ip;

$.ajax({
    url:'../php/inst_port.php',
    type:'POST',    
}).done(function(resp){

    var res = obj.data;

    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id_ip;
        if(id_ip===idt){        


        var idip = $("#modalDetalles #idip").val(obj.data[i].id_ip);    
        var numero = $("#modalDetalles #numero").val(obj.data[i].numero);
        var estado = $("#modalDetalles #estado").val(obj.data[i].estado);
        var puerto = $("#modalDetalles #puerto").val(obj.data[i].puerto);
        var instalacion_portuaria = $("#modalDetalles #instalacion_portuaria").val(obj.data[i].instalacion_portuaria);


/*año = obj.data[i].epip.substring(0,4);
result = parseInt(año) + 5;
ciclo = año+' - '+result;

if(ciclo == '0000 - 5'){

  ciclo = 'S / r'.fontcolor('red');
}


var hoy = new Date();  
var agregepip = new Date(obj.data[i].epip);
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();

var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

var dias = 31; // Número de días a agregar
agregepip.setDate(agregepip.getDate() + dias);

var fecha_desepip = agregepip.getFullYear()+'-'+(agregepip.getMonth()+1)+'-'+agregepip.getDate();
var des = new Date(fecha_desepip);
var f2epip = new Date(des.getFullYear(),(des.getMonth()+1),des.getDate());
fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_desepip);
restante = fecha2.diff(fecha1, 'days');

epipd =obj.data[i].epip.substring(8,10);
epipm =obj.data[i].epip.substring(5,7);
epipy =obj.data[i].epip.substring(0,4);


if(obj.data[i].epip == '0000-00-00'){      
        fec_epip = 'sin registro'.fontcolor('red');
        var epip = $("#modalDetalles #epip").val(fec_epip);          
}else{*/
        var epip = $("#modalDetalles #epip").val(obj.data[i].epip);        
/*}*/   var ppip = $("#modalDetalles #ppip").val(obj.data[i].ppip);                
        var aud_cert = $("#modalDetalles #aud_cert").val(obj.data[i].aud_cert);        
        var dcip_exp = $("#modalDetalles #dcip_exp").val(obj.data[i].dcip_exp);        
        var dcip_vig = $("#modalDetalles #dcip_vig").val(obj.data[i].dcip_vig);        
        var holograma = $("#modalDetalles #holograma").val(obj.data[i].holograma);        
        var auditoria1 = $("#modalDetalles #auditoria1").val(obj.data[i].auditoria1);        
        var resellado1 = $("#modalDetalles #resellado1").val(obj.data[i].resellado1);        
        var auditoria2 = $("#modalDetalles #auditoria2").val(obj.data[i].auditoria2);        
        var resellado2 = $("#modalDetalles #resellado2").val(obj.data[i].resellado2);        
        var auditoria3 = $("#modalDetalles #auditoria3").val(obj.data[i].auditoria3);        
        var resellado3 = $("#modalDetalles #resellado3").val(obj.data[i].resellado3);        
        var auditoria4 = $("#modalDetalles #auditoria4").val(obj.data[i].auditoria4);        
        var resellado4 = $("#modalDetalles #resellado4").val(obj.data[i].resellado4);        
        var activo_historico = $("#modalDetalles #activo_historico").val(obj.data[i].activo_historico);        
        var tipo = $("#modalDetalles #tipo").val(obj.data[i].tipo);
        var observ = $("#modalDetalles #observ").val(obj.data[i].observ);
           }

   
        }
    });
}
