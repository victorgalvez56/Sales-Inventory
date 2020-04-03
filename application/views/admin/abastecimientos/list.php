
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Abastecimientos
        <small>Listado</small>
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
                                    <th>Día</th>
                                    <th>Fecha</th>
                                    <th>Total de Venta</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($abastecimientos)):?>
                                    <?php foreach($abastecimientos as $abas):?>
                                        <tr>
                                            <td><?php 

                                            $fechats = strtotime($abas->fecha_abas); 
                                            
                                            switch (date('w', $fechats)){ 
                                                    case 0: echo "Dom"; break; 
                                                    case 1: echo "Lun"; break; 
                                                    case 2: echo "Mar"; break; 
                                                    case 3: echo "Miér"; break; 
                                                    case 4: echo "Jue"; break; 
                                                    case 5: echo "Vie"; break; 
                                                    case 6: echo "Sáb"; break; 
                                                } 
                                            ?></td>
                                            <td><?php echo $abas->fecha_abas;?></td>
                                            <td><?php echo "S/.".$abas->total_abas;?></td>
                               
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-abas" value="<?php echo $abas->id_abas;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                                    <?php if($permisos->delete == 1):?>
                                                    <a href="<?php echo base_url();?>movimientos/abastecimientos/delete/<?php echo $abas->id_abas;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion del Abastecimiento</h4>
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
