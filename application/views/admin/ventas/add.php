
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ventas
        <small>Nuevo</small>
        </h1>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="<?php echo base_url();?>movimientos/ventas/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Productos:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idproducto" id="idproducto">
                                        <input type="text" class="form-control" disabled="disabled" id="producto">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>



                            </div>
                            <table id="tbventas" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>                     
                                        <th>Nombre</th>
                                        <th>Precio de Salida</th>
                                        <th>Stock Max.</th>
                                        <th>Cantidad</th>
                                        <th>Importe</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>

                            <div class="form-group">     
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total:</span>
                                        <input type="text" class="form-control" placeholder="0.00" name="total" readonly="readonly">
                                    </div>
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                    <!--<button class="btn btn-danger btn-flat" action="<?php echo base_url();?>movimientos/cajas">Cancelar</button>
                                    -->    
                                </div>
                                 
                            </div>
                        </form>
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
                <h4 class="modal-title">Lista de Productos</h4>
            </div>
            <div class="modal-body">
                <table id="example5" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($productos)):?>
                            <?php foreach($productos as $producto):?>
                                <tr>
                                    <td><?php echo $producto->nombre_prod;?></td>
                                    <td><?php echo "S/.".$producto->precio_prod_out;?></td>
                                    <td><?php echo $producto->stock_prod;?></td>
                                   

                                    <?php $dataprodcmodel = $producto->id_prod."*".$producto->nombre_prod."*".$producto->precio_prod_out."*".$producto->stock_prod;?>

                                    
                                    <td>
                                        <button type="button" class="btn btn-success btn-check22" value="<?php echo $dataprodcmodel;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
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
