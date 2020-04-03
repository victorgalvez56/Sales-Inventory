
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Código
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>movimientos/codigos/store" method="POST">
                            <div class="form-group <?php echo !empty(form_error('codigo_codigo')) ? 'has-error':'';?>">
                                <label for="codigo">Código:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo_codigo" value="<?php echo set_value('codigo_codigo');?>">
                                <?php echo form_error("codigo_codigo","<span class='help-block'>","</span>");?>
                            </div>


                           <div class="form-group <?php echo !empty(form_error('precio_codigo')) ? 'has-error':'';?>">
                                <label for="precio_codigo">Precio:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="S/." name="precio_codigo" value="<?php echo set_value('precio_codigo');?>">
                                <?php echo form_error("precio_codigo","<span class='help-block'>","</span>");?>
                            </div>


                            <div class="form-group">
                                <label for="tipo">Tipo:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <?php foreach($tipos as $tipo):?>
                                        <option value="<?php echo $tipo->id_tipo?>"><?php echo $tipo->nombre_tipo;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
