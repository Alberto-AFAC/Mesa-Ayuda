    <form id="frmEditar" class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modalEditar" class="col-sm-12 col-md-12 col-lg-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="col-md-8 col-md-offset-3">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="btnlistar" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel"><b>ACTUALIZAR CONTRASEÑA</b></h4>
                                    <div class="alert alert-success text-center" style="display:none;color: #FFF;" id="echo">
                                    <p>CONTRASEÑA ACTUALIZADA</p>
                                    </div>

                                    <div class="alert alert-info text-center" style="display:none;color: #FFF;" id="invalida">
                                    <p>LAS CONTRASEÑAS NO COINCIDEN</p>
                                    </div>

                                    <div class="alert alert-danger text-center" style="display:none;color: #FFF;" id="falso">
                                    <p>CONTRASEÑA INCORRECTA</p>
                                    </div>

                                    <div class="alert alert-warning text-center" style="display:none;color: #FFF;" id="vacios">
                                    <p>LLENE CAMPOS VACÍOS  </p>
                                    </div>

                                    <div class="alert alert-danger text-center" style="display:none;color: #FFF;" id="error">
                                    <p>DATOS NO ACTUALIZADOS</p>
                                    </div>
                </div>

            <div class="modal-body">
                <input type="hidden" id="idper" name="idper" value="<?php echo $idu ?>">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="usuario">USUARIO</label>
                    <input id="usu" name="usu" type="text" class="form-control" value="<?php echo $_SESSION['usuario']['usuario'];?>" disabled>
                    </div>
                    </div> 
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="password">CONTRASEÑA</label>
                    <input id="password" name="password" type="text" class="form-control">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="pass">NUEVA CONTRASEÑA</label>
                    <input id="pass" name="pass" type="text" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="pass2">CONFIRMA CONTRASEÑA</label>
                    <input id="pass2" name="pass2" type="text" class="form-control" >
                    </div>
                    </div>                     
            </div>            
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="actContrMeay();">ACTUALIZAR</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>  

<script type="text/javascript" src="../../js/cursos.js"></script>