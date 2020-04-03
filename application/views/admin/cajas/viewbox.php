

                        <div class="small-box btn-primary">
                            <div class="inner">
                                <h3 align="center">Total </h3>
                                <hr>
                                <h3 align="center"><?php echo "S/".$sumatotalcaja;?></h3>
                               
                            </div>
                        </div> 

                        <div class="small-box btn-default">
                            <div class="inner">
                                <?php if($alquileres=='1'&& $veri!=null):?>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">Cuentas:</span>
                                        <input type="text" class="form-control" value="<?php echo "S/.".$cuentas->cuentas;?>" name="total" readonly="readonly">

                                        <span class="input-group-addon">Equipos:</span>
                                        <input type="text" class="form-control" value="<?php echo "S/.".$equipos->equipos;?>" name="total" readonly="readonly">
                                    </div>
                                <?php else:?>
                               <span class="input-group-addon">Aun no se realiza el registro de Alquileres</span>

                                <?php endif;?> 
                            </div>
                        </div>


            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4 align="center">Ventas</h4>
                                <h3 align="center"><?php echo "S/.".$sumventa->total_vent ?></h3>

                                
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <div align="center">
                              <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal-ventasgenerales">Ver Ventas<i class="fa fa-arrow-circle-right"></i></button>  

                            </div>
                            

                        </div>
                    </div>
                

                <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h4 align="center">Abastecimientos</h4>
                                <h3 align="center"><?php echo "S/.".$sumabas->total_abas ?></h3>

                                
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <div align="center">
                              <button type="button" class="btn btn-success " data-toggle="modal" data-target="#modal-abasgenerales">Ver Abastecimiento<i class="fa fa-arrow-circle-right"></i></button>  

                            </div>
                            

                        </div>
                </div>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h4 align="center">Códigos</h4>
                                <h3 align="center"><?php echo "S/.".$sumacod->precio_codigo ?></h3>

                                
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <div align="center">
                              <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#modal-codigosgenerales">Ver Códigos<i class="fa fa-arrow-circle-right"></i></button>  

                            </div>
                            

                        </div>
                    </div>



                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h4 align="center">Descuentos</h4>
                                <h3 align="center"><?php echo "S/.".$sumadesc->monto_desc?></h3>

                                
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <div align="center">
                              <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#modal-descuentosgenerales">Ver Descuentos<i class="fa fa-arrow-circle-right"></i></button>  

                            </div>
                            

                        </div>
                    <!-- ./col -->
                    </div>




                </div>

            </section>

<div class="modal fade" id="modal-ventasgenerales">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información de las Ventas</h4>
      </div>
      <div class="modal-body">
                        <table id="example5" class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <th>Hora</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($ventas)):?>
                                    <?php foreach($ventas as $venta):?>
                                        <tr>
                                            <td><?php echo "S/.".$venta->total_vent;?></td>
                                                
                                            <td><?php 

                                                $nuevafecha = strtotime('-0 hour', strtotime($venta->fecha_vent)); // 6 hour en horario de verano
                                                $nuevafecha = date('H:i:s', $nuevafecha);    

                                                echo $nuevafecha;                                    
                                            ?></td>                                            
                                            <td>
                                                
                                                <button type="button" class="btn btn-info btn-view-venta2" value="<?php echo $venta->id_vent;?>" data-toggle="modal" data-target="#modal-venta2"><span class="fa fa-search"></span></button>
                                            
                                            </td>                                        
                                          </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                            <!--
                                <tfoot>
                                    <tr>
                                        <th>Total</h1></th>
                                    </tr>
                                </tfoot>
                            -->
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


<div class="modal fade" id="modal-venta2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        

        <h4 class="modal-title">Información de la Venta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>






<div class="modal fade" id="modal-abasgenerales">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información del Abastecimiento</h4>
      </div>
      <div class="modal-body">
                        <table id="example5" class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <th>Hora</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($abas)):?>
                                    <?php foreach($abas as $aba):?>
                                        <tr>
                                            <td><?php echo "S/.".$aba->total_abas;?></td>
                                                
                                            <td><?php 

                                                $nuevafecha2 = strtotime('-0 hour', strtotime($aba->fecha_abas)); // 6 hour en horario de verano
                                                $nuevafecha2 = date('H:i:s', $nuevafecha2);    

                                                echo $nuevafecha2;                                    
                                            ?></td>                                            
                                            <td>
                                                
                                                <button type="button" class="btn btn-info btn-view-abas2" value="<?php echo $aba->id_abas;?>" data-toggle="modal" data-target="#modal-abaste2"><span class="fa fa-search"></span></button>
                                            
                                            </td>                                        
                                          </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                            <!--
                                <tfoot>
                                    <tr>
                                        <th>Total</h1></th>
                                    </tr>
                                </tfoot>
                            -->
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

<div class="modal fade" id="modal-abaste2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información de la Venta</h4>
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





<div class="modal fade" id="modal-codigosgenerales">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información de Códigos</h4>
      </div>
      <div class="modal-body">
                        <table id="example6" class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <th>Hora</th>
                                    <th>Código</th>
                                    <th>Resp.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($codigos)):?>
                                    <?php foreach($codigos as $codigo):?>
                                        <tr>
                                            <td><?php echo "S/.".$codigo->precio_codigo;?></td>
                                            <td><?php 

                                                $nuevafecha4 = strtotime('-1 hour', strtotime($codigo->fecha_codigo)); // 6 hour en horario de verano
                                                $nuevafecha4 = date('H:i:s', $nuevafecha4);    

                                                echo $nuevafecha4;                                    
                                            ?></td>  
                                            <td><?php echo $codigo->codigo_codigo;?></td>
                                            <td><?php echo $codigo->responsable;?></td>                                        
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



<div class="modal fade" id="modal-descuentosgenerales">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información de Descuentos</h4>
      </div>
      <div class="modal-body">
                        <table id="example7" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <th>Hora</th>
                                    <th>Motivo</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($descuentos)):?>
                                    <?php foreach($descuentos as $descuento):?>
                                        <tr>
                                            <td><?php echo "S/.".$descuento->monto_desc;?></td>
                                            <td><?php 

                                                $nuevafecha3 = strtotime('-1 hour', strtotime($descuento->fecha_desc)); // 6 hour en horario de verano
                                                $nuevafecha3 = date('H:i:s', $nuevafecha3);    

                                                echo $nuevafecha3;                                    
                                            ?></td>                                            
                                            <td><?php echo $descuento->motivo_desc;?></td>
                                               
                                                                                 
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
