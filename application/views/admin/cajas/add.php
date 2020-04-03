<?php
$var = $caja->id_caja;
$var2 = $caja_abierta; 
$var3 = $conteoCajas;
$var4 = $validacion2;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php if($var2=='0'):?>
          <div class="alert alert-danger" role="alert"><h1><i class='fa fa-archive'></i>No hay ninguna caja abierta!</h1></div>               
      <?php endif;?>  

      <?php if($var2=='1'):?>
          <div class="alert btn-success btn-flat" role="alert"><h1><i class='fa fa-archive'></i>Caja #<?php echo $var ?> Iniciada por <?php echo $caja->responsable ?></h1></div>
      <?php endif;?>     
    </section>




    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo base_url();?>movimientos/cajas/store" method="POST" class="form-horizontal">
                        <?php if($var2=='0'&& $var3>'0' && $var4=='1'):?>
                                <button type="submit"class="btn btn-primary btn-flat btn-view-crearcaja"><span class="fa fa-plus"></span>Iniciar Caja <?php echo $var+1 ?></button>
                        <?php else:?>
                               <button type="submit"class="btn btn-primary btn-flat" disabled><span class="fa fa-plus">Iniciar Caja </span></button>

                        <?php endif;?>  

                          <?php if($var4!='1' && $ga=='1'):?>
                          <button type="button" class="btn btn-primary btn-flat btn-view-viewbox"  data-toggle="modal" data-target="#modal-ciber" value="<?php echo $caja->id_caja;?>"><span class="fa fa-plus">Alquiler Caja </span></button>

                          <?php else:?>
                          <button type="submit" class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#modal-ciber" disabled=""><span class="fa fa-plus">Alquiler Caja </span></button>  
                          <?php endif;?> 


                          <?php if($var2=='1' && $var3>='1' && $var4=='1'):?>
                          <button type="button" class="btn btn-primary btn-flat btn-view-viewbox"  data-toggle="modal" data-target="#modal-default" value="<?php echo $caja->id_caja;?>"><span class="fa fa-plus">Ventas Caja </span></button>
                          <?php else:?>   
                             <button type="submit" class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#modal-default" disabled=""><span class="fa fa-plus">Ventas Caja </span></button>
                          <?php endif;?>                                          
                          <a href="<?php echo base_url();?>movimientos/Cajas" class="btn btn-primary btn-flat"><span class="glyphicon glyphicon-time"></span> Historial</a>   


                        </form>
                    </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


 <div class="modal fade" id="modal-default" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Corte de Caja</h4>
        </div>
        <div class="modal-body">
  
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            <?php if($var3>'0'):?>
              <form action="<?php echo base_url();?>movimientos/cajas/closebox" method="POST" class="form-horizontal">
              
                  <button type="submit" class="btn btn-success btn-flat">Guardar</button> 
                  <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>              
              </form>                                
            <?php endif;?>           
  


      </div>
      </div>
    </div>
  </div>



<div class="modal fade" id="modal-ciber">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registro de Alquileres</h4>
      </div>
      <div class="modal-body">
              <form action="<?php echo base_url();?>movimientos/cajas/storeAlquileres" method="POST" class="form-horizontal">

                      <div class="input-group">
                          <span>Cuentas:</span>
                          <input type="text"placeholder="S/." class="form-control" name="cuentas"id="cuentas">

                      </div>
                      <div class="input-group">
                          <span>Equipos:</span>
                          <input type="text"placeholder="S/." class="form-control" name="equipos"id="equipos">

                      </div>                      
      </div>
      <div class="modal-footer">

                  <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success btn-flat">Guardar</button> 
                  <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>              
              </form>

        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

