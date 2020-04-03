    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Historial 
        <small>Cajas</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example5" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>                                    
                                    <th>Resp.</th>                                    
                                    <th class="btn-success">Alquiler</th>
                                    <th class="btn-primary">Operac.</th>  
                                    <th class="btn-danger">Desc.</th>                                                                     
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($cajas)):?>
                                    <?php foreach($cajas as $caja):?>
                                        <tr>
                                            <td align="center"><?php echo "#".$caja->id_caja;?></td>
                                            <td align="center"><?php
                                            $aux =$caja->fecha_abertura;                                          
                                            $nuevafecha = strtotime('+0 hour', strtotime($aux)); // 6 hour en horario de verano
                                            $nuevafecha3 = date('d', $nuevafecha);
                                            $nuevafecha4 = date('h:i:s', $nuevafecha);
                                            $dias = array("Dom","Lun","Mar","Miér","Juev","Vier","Sáb");
                                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");                                            
                                            echo $dias[$nuevafecha = date('w', $nuevafecha)]." ".$nuevafecha3;
                                            ?></td>
                                            <td align="center"><?php
                                            $aux =$caja->fecha_abertura;                                          
                                            $nuevafecha = strtotime('+0 hour', strtotime($aux)); // 6 hour en horario de verano
                                            $nuevafecha3 = date('d', $nuevafecha);
                                            $nuevafecha4 = date('h:i:s', $nuevafecha);
                                            $dias = array("Dom","Lun","Mar","Miér","Juev","Vier","Sáb");
                                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");                                            
                                            echo $nuevafecha4;
                                            ?></td>                                            
                                            <td align="center"><?php
                                            $aux =$caja->fecha_cierre;                                          
                                            $nuevafecha = strtotime('+0 hour', strtotime($aux)); // 6 hour en horario de verano
                                            $nuevafecha3 = date('d', $nuevafecha);
                                            $nuevafecha4 = date('h:i:s', $nuevafecha);
                                            $dias = array("Dom","Lun","Mar","Miér","Juev","Vier","Sáb");
                                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");                                            
                                            echo $nuevafecha4;
                                            ?></td>
                                            <td align="center" ><?php echo $caja->responsable;?></td>
                                            <td align="center" class="btn-success"><?php echo "S/.".$caja->total1_caja;?></td>                                            
                                            <td align="center" class="btn-primary"><?php echo "S/.".$caja->total2_caja;?></td>
                                            <td align="center" class="btn-danger"><?php echo "S/.".$caja->total3_caja;?></td>
                                            
                                            <td>
                                                <div class="btn-group">

                                                    <a href="<?php echo base_url()?>movimientos/cajas/view/<?php echo $caja->id_caja;?>" class="btn btn-info btn-xs"><span class="fa fa-search"></span></a>
                                                    <?php if($permisos->update == 1):?>
                                                    <a href="<?php echo base_url()?>movimientos/cajas/edit/<?php echo $caja->id_caja;?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span></a>
                                                    <?php endif;?>
                                                    <?php if($permisos->delete == 1):?>
                                                    <a href="<?php echo base_url();?>movimientos/cajas/delete/<?php echo $caja->id_caja;?>" class="btn btn-danger btn-xs btn-remove"><span class="fa fa-remove"></span></a>
                                                    <?php endif;?>
                                                </div>
                                            </td>                                        
                                          </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Caja</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
