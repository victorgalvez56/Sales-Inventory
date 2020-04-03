
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Venta
        <small>Código</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="<?php echo base_url();?>movimientos/codigos/store2" method="POST" class="form-horizontal">

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Precio:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idcodigo" id="idcodigo">
                                        <input type="text" class="form-control" disabled="disabled" id="codigo">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="col-md-2">
                                    <label for="">&nbsp;</label>
                                    <button id="btn-agregarcodigo" type="submit" class="btn btn-success btn-flat btn-block">Vender</button>
                                </div>


                            </div>
<!--
                            <table id="tbcodigo" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Precio</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
-->

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
                <h4 class="modal-title">Lista de Códigos</h4>
            </div>
            <div class="modal-body">
                <table id="example5" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Precio</th>
                            <th>Tipo</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($codigos)):?>
                            <?php foreach($codigos as $codigo):?>
                                <tr>
                                    <td><?php echo "S/.".$codigo->precio_codigo;?></td>
                                    <td><?php echo $codigo->tipo;?></td>
                                    <?php $datacodigo = $codigo->id."*".$codigo->codigo_codigo."*".$codigo->precio_codigo."*".$codigo->tipo;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-check" value="<?php echo $datacodigo;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">¿Desea realizar la Compra?</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <form action="<?php echo base_url();?>movimientos/codigos/buy" method="POST" class="form-horizontal">
                    <button type="button" type="submit" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button id="btn-agregarcodigo2"  class="btn btn-danger pull-left" data-dismiss="modal">Aceptar</button>   
                </form>         
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>