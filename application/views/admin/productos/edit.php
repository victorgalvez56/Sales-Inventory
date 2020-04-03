
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Editar</small>
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
                        <form action="<?php echo base_url();?>mantenimiento/productos/update" method="POST">
                            <input type="hidden" name="idproducto" value="<?php echo $producto->id_prod;?>">
                            <div class="form-group">
                                <label for="nombre_prod">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_prod" name="nombre_prod" value="<?php echo $producto->nombre_prod?>">
                            </div>
                            <div class="form-group">
                                <label for="descripcion_prod">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion_prod" name="descripcion_prod" value="<?php echo $producto->descripcion_prod?>">
                            </div>
                            <div class="form-group">
                                <label for="precio_prod_in">Precio de Entrada:</label>
                                <input type="text" class="form-control" id="precio_prod_in" name="precio_prod_in" value="<?php echo $producto->precio_prod_in?>">
                            </div>
                            <div class="form-group">
                                <label for="precio_prod_out">Precio de Salida:</label>
                                <input type="text" class="form-control" id="precio_prod_out" name="precio_prod_out" value="<?php echo $producto->precio_prod_out?>">
                            </div>     
                            <div class="form-group">
                                <label for="stock_prod">Stock:</label>
                                <input type="text" class="form-control" id="stock_prod" name="stock_prod" value="<?php echo $producto->stock_prod?>">
                            </div>
                            <div class="form-group">
                                <label for="inventary_min">Inventario Minimo:</label>
                                <input type="text" class="form-control" id="inventary_min" name="inventary_min" value="<?php echo $producto->inventary_min?>">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach($categorias as $categoria):?>
                                        <?php if($categoria->id_cat == $producto->id_cat):?>
                                        <option value="<?php echo $categoria->id_cat?>" selected><?php echo $categoria->nombre_cat;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $categoria->id_cat?>"><?php echo $categoria->nombre_cat;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>                            
                            <div class="form-group">
                                <label for="proveedor">Proveedor:</label>
                                <select name="proveedor" id="proveedor" class="form-control">
                                    <?php foreach($proveedores as $proveedor):?>
                                        <?php if($proveedor->id_prov == $producto->id_prov):?>
                                        <option value="<?php echo $proveedor->id_prov?>" selected><?php echo $proveedor->nombre_prov;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $proveedor->id_prov?>"><?php echo $proveedor->nombre_prov;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>                      <div class="form-group">
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
