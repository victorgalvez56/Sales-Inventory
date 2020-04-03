
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
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
                        <form action="<?php echo base_url();?>mantenimiento/productos/store" method="POST">
                            <div class="form-group <?php echo !empty(form_error('nombre_prod')) ? 'has-error':'';?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre_prod" value="<?php echo set_value('nombre_prod');?>">
                                <?php echo form_error("nombre_prod","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion_prod">
                            </div>

                           <div class="form-group <?php echo !empty(form_error('precio_prod_in')) ? 'has-error':'';?>">
                                <label for="nombre">Precio de Compra:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="S/." name="precio_prod_in" value="<?php echo set_value('precio_prod_in');?>">
                                <?php echo form_error("precio_prod_in","<span class='help-block'>","</span>");?>
                            </div>

                           <div class="form-group <?php echo !empty(form_error('precio_prod_out')) ? 'has-error':'';?>">
                                <label for="nombre">Precio de Salida:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="S/." name="precio_prod_out" value="<?php echo set_value('precio_prod_out');?>">
                                <?php echo form_error("precio_prod_out","<span class='help-block'>","</span>");?>
                            </div>




                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach($categorias as $categoria):?>
                                        <option value="<?php echo $categoria->id_cat?>"><?php echo $categoria->nombre_cat;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="proveedor">Proveedor:</label>
                                <select name="proveedor" id="proveedor" class="form-control">
                                    <?php foreach($proveedores as $proveedor):?>
                                        <option value="<?php echo $proveedor->id_prov?>"><?php echo $proveedor->nombre_prov;?></option>
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
