
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Dashboard
                <small>Panel Control </small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $cantCodigos->countcod;?></h3>

                                <p>Códigos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo base_url();?>movimientos/codigos" class="small-box-footer">Ver Códigos <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $cantProductos->countprod;?></h3>

                                <p>Productos</p>
                            </div>
                            <div class="icon">
                                <i class="glyphicon glyphicon-gift"></i>
                            </div>
                            <a href="<?php echo base_url();?>mantenimiento/productos" class="small-box-footer">Ver Productos <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $cantUsuarios->countusu;?></h3>

                                <p>Usuarios</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?php echo base_url();?>administrador/usuarios" class="small-box-footer">Ver Usuarios <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $cantCajas->countcaja;?></h3>

                                <p>Cajas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url();?>movimientos/cajas" class="small-box-footer">Ver Cajas <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <?php if($cantprodAbast->cant >'0'):?>
                <div class="row">
                    <div class="col-md-12">
                        <table  class="table table-bordered table-hover">
                            <thead>
                                <tr >
     
                                    <th>Nombre</th>
                                    
                                    <th>Precio de Salida</th>
                                    <th>Stock</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($productos)):?>
                                    <?php foreach($productos as $producto):?>
                                        <tr class="danger">
                                            <td><?php echo $producto->nombre_prod;?></td>
                                            
                                            <td><?php echo "S/.".$producto->precio_prod_out;?></td>
                                            <td><?php echo $producto->stock_prod;?></td>
                                            <td><span class="label label-danger">Queda poco stock.</span></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif;?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Gráfico Estadístico</h3>

                                <div class="box-tools pull-right">
                                    <select name="year" id="year" class="form-control">
                                        <?php foreach($years as $year):?>
                                            <option value="<?php echo $year->year;?>"><?php echo $year->year;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div id="grafico" style="min-width: 310px; height: 400px;margin: 0 auto"></div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
