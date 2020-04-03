
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Códigos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($permisos->insert==1):?>
                        <a href="<?php echo base_url();?>movimientos/codigos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Código</a>
                        <?php endif;?>
                        <a href="<?php echo base_url();?>movimientos/codigos/sell" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Vender Código</a> 

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example5" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha de Venta</th>
                                    <th>Precio del Código</th>
                                    <th>Tipo</th>
                                    <th>Responsable</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($codigos)):?>
                                    <?php foreach($codigos as $codigo):?>
                                        <tr>
                                            <td><?php echo $codigo->fecha_codigo;?></td>
                                            <td><?php echo "S/.".$codigo->precio_codigo;?></td>
                                            <td><?php echo $codigo->tipo;?></td>
                                            <td><?php echo $codigo->responsable;?></td>
                                            <td><?php echo $codigo->estado_codigo;?></td>


                                            <?php $datacodigo = $codigo->id."*".$codigo->fecha_codigo."*".$codigo->codigo_codigo."*".$codigo->precio_codigo."*".$codigo->estado_codigo."*".$codigo->tipo;?>
                                            <td>
                                                <?php if ($permisos->update==1):?>
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-view-codigo" value="<?php echo $codigo->id;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                                
                                                <a href="<?php echo base_url()?>movimientos/codigos/edit/<?php echo $codigo->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
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
        <h4 class="modal-title">Informacion del Código</h4>
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
