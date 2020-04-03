
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ventas
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
                                <?php if(!empty($ventas)):?>
                                    <?php foreach($ventas as $venta):?>
                                        <tr>
                                                
                                            <td><?php 

                                            $fechats = strtotime($venta->fecha_vent); 
                                            
                                            switch (date('w', $fechats)){ 
                                                    case 0: echo "Domingo"; break; 
                                                    case 1: echo "Lunes"; break; 
                                                    case 2: echo "Martes"; break; 
                                                    case 3: echo "Miercoles"; break; 
                                                    case 4: echo "Jueves"; break; 
                                                    case 5: echo "Viernes"; break; 
                                                    case 6: echo "Sabado"; break; 
                                                } 
                                            ?></td>
                                            <td><?php echo $venta->fecha_vent;?></td>
                                            <td><?php echo "S/.".$venta->total_vent;?></td>
                               
                                            <td>
                                                <button type="button" class="btn btn-info btn-view-venta" value="<?php echo $venta->id_vent;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                                <?php if($permisos->delete == 1):?>
                                                <a href="<?php echo base_url();?>movimientos/ventas/delete/<?php echo $venta->id_vent;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                <?php endif;?>
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
        <h4 class="modal-title">Informacion de la venta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
