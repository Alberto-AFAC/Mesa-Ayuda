<?php 
	session_start();
	require_once "../../conexion/conexion.php";	
 ?>
<body>    
	<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT idproyecto,nombre,DATE_FORMAT(fecha_inicio, '%d/%m/%Y'),DATE_FORMAT(fecha_termino, '%d/%m/%Y') from proyecto where idproyecto='$idp'";						
                            $result=mysqli_query($conexion,$sql);
					}else{

					}
				
                if(isset($result) && !empty($result)){
			
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
                           $ver[2]."||".
						   $ver[3];
						   			 ?>
                                  

<form  class="form-horizontal" action="" method="POST" id="formUsuario" name="formulario" onsubmit="return agregar_actividad(this)" >
 <div id="agract" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="AgregarActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        
        <button type="button" id="btn_listar" class="close" data-dismiss="modal" aria-label="Close"><a href="ingresar_actividades.php"><span aria-hidden="true">&times;</span></a></button>


        <div class="cerrar"><a ><span class="icon-cross"></span></a></div>

<h4 class="modal-title" id="exampleModalLabel">Agregar Actividad</h4>
<div class="alert alert-success text-center" style="display:none;" id="exito">
<p>Actividad registrada</p>
</div>
<div class="alert alert-danger text-center" style="display:none;" id="danger">
<p>La actividad ya esta registrada</p>
</div>

<div class="alert alert-warning text-center" style="display:none;" id="vacios">
<p>Debes escribir contenido en el campo vacio</p>
</div>
    </div>

    <div class="modal-body">

<input type="hidden" id="id_activ" name="id_activ" value="0">
<input type="hidden" id="opcion" name="opcion" value="registrar">
    
	<div style="display: none;" class="form-group">   
	<div class="col-sm-offset-1 col-sm-10">
	<label for="nombre">Proyecto</label>
	<input id="idproyecto" name="idproyecto" class="form-control" value="<?php echo $ver[0] ?>" autofocus>
	</div>
	</div>

    <div class="form-group">   
    <div class="col-sm-offset-1 col-sm-10">
    <label for="nombre">Proyecto</label>
    <input class="form-control" value="<?php echo utf8_decode($ver[1])?>" disabled>
    </div>
    </div>

    <div class="form-group">   
    <div class="col-sm-offset-1 col-sm-10">
    <label for="nombre">Actividad</label>
    <input id="nombre" name="nombre" type="text" class="form-control" autofocus>
    </div>
    </div>

    <div class="form-group">   
    <div class="col-sm-offset-1 col-sm-5">
    <label for="finicio">Inicia actividad</label>
    <input id="finicio" name="finicio" type="text" class="form-control" value="<?php echo $ver[2]?>" disabled>
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="ftermino">Finaliza actividad</label>
    <input style="display: none;" id="ftermino" name="ftermino" type="text" value="<?php echo $ver[3]?>" class="form-control" autofocus>
    <div class="form-control">
    
    <?php  

        $di = substr($ver[2], 0,2);
        $mi = substr($ver[2], 3,2);        
        $Yi = substr($ver[2], -4);

        $dt = substr($ver[3], 0,2);
        $mt = substr($ver[3], 3,2);
        $Yt = substr($ver[3], -4);
        ?>
        <input style="display: none;" type="text" name="dt" id="di" value="<?php echo $di?>">
        <input style="display: none;" type="text" name="mt" id="mi" value="<?php echo $mi?>">
        <input style="display: none;" type="text" name="Yt" id="Yi" value="<?php echo $Yi?>">

        <input style="display: none;" type="text" name="dt" id="dt" value="<?php echo $dt?>">
        <input style="display: none;" type="text" name="mt" id="mt" value="<?php echo $mt?>">
        <input style="display: none;" type="text" name="Yt" id="Yt" value="<?php echo $Yt?>">
        <?php

?><select style="border: transparent;" class="selectpicker" name="dia" id="dia" type="text" data-live-search="true">

    <option value="<?php echo $dt; ?>"><?php echo $dt;?></option>
<?php for($dt=1; $dt<=9; $dt++){ ?>
          <option value="<?php echo '0'.$dt; ?>"><?php echo '0'.$dt;?></option>                     
                        <?php } 
      for($dt=10; $dt<=30; $dt++){ ?>
        <option value="<?php echo $dt; ?>"><?php echo $dt;?></option>  
                        <?php } ?>
</select>
<?php echo "/";?>
<select style="border: transparent;" class="selectpicker" name="mes" id="mes" type="text" data-live-search="true">
    <option value="<?php echo $mt; ?>"><?php echo $mt;?></option> 
<?php for($mt=1; $mt<=9; $mt++){ ?>
        <option value="<?php echo '0'.$mt; ?>"><?php echo '0'.$mt;?></option>                     
                    <?php } 

     for($mt=10; $mt<=12; $mt++){ ?>
        <option value="<?php echo $mt;?>"><?php echo $mt;?></option>  
                   <?php } ?>
</select>
<?php echo "/";?>
 <select style="border: transparent;" class="selectpicker" name="any" id="any" type="text" data-live-search="true">
    <option value="<?php echo $Yt; ?>"><?php echo $Yt;?></option>  
<?php for($y=$Yi; $y<=$Yt; $y++){ ?>
        <option value="<?php echo $y; ?>"><?php echo $y;?></option>  
                <?php } ?>
</select><?php ?>

    </div><p class="col-sm-10" style="color: red; display: none;padding: 0; position: absolute; " id="fecha">Verifique fecha</p>
    </div>
    </div>
      

    <div class="form-group">    
    <div class="col-sm-offset-1 col-sm-10">
    <label for="descripción">Descripción actividad</label>
    <textarea rows="3" id="descripcion" name="descripcion" type="text" class="form-control" ></textarea></div>
    </div>

    <div class="form-group"><br>
    <div class="col-sm-offset-1 col-sm-10">
    <button type="button" class="btn btn-primary" onclick="agregar_actividad();">Guardar</button>
    <button type="reset" class="btn btn-primary" id="boton">Vaciar</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
<?php 
	}
		}
            }
		 ?>
</body>





