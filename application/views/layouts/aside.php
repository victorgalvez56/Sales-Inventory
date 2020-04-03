        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>

                    <li><a href="<?php echo base_url();?>movimientos/cajas/add">
                            <i class="fa fa-cube"></i><span>Cajas</span>
                        </a>
                    </li>   


                       

                    <?php if($validacion=='1'&& $validacionusuario=='1'):?>
                        
                    <li><a href="<?php echo base_url();?>movimientos/ventas/add">
                            <i class="glyphicon glyphicon-usd"></i><span>Vender</span>
                        </a>
                    </li>                    
                    <li><a href="<?php echo base_url();?>movimientos/abastecimientos/add">
                            <i class="glyphicon glyphicon-briefcase"></i><span>Abastecer</span>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url();?>movimientos/codigos/sell">
                            <i class="glyphicon glyphicon-gift"></i><span>Venta Códigos</span>
                        </a>
                    </li>                     
                    <li><a href="<?php echo base_url();?>administrador/descuentos/add"><i class="glyphicon glyphicon-unchecked"></i><span>Descuento</span>
                        </a>
                    </li>                     
                    
                    <?php endif;?>  
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-inbox"></i><span>Inventario</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>movimientos/ventas"><i class="fa fa-circle-o"></i>Ventas</a></li>
                            <li><a href="<?php echo base_url();?>movimientos/abastecimientos"><i class="fa fa-circle-o"></i>Abastecimientos</a></li>
                            <li><a href="<?php echo base_url();?>movimientos/codigos">
                                    <i class="fa fa-circle-o"></i><span>Venta Códigos</span>
                                </a>
                            </li>                     
                            <li><a href="<?php echo base_url();?>administrador/descuentos"><i class="fa fa-circle-o"></i><span>Descuento</span>
                        </a>
                    </li>                            
                        </a>
                    </li>
                        </ul>
                    </li> 

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-database"></i><span>Catálogos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/categorias"><i class="fa fa-circle-o"></i>Categorias</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/proveedores"><i class="fa fa-circle-o"></i>Proveedores</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/productos">
                            <i class="fa fa-circle-o"></i><span>Productos</span>
                        </a>
                    </li>
                        </ul>
                    </li>                    
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-flash"></i><span>Códigos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            
                            <li><a href="<?php echo base_url();?>movimientos/codigos"><i class="fa fa-circle-o"></i>Listado Códigos</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/tipos"><i class="fa fa-circle-o"></i>Tipos Códigos</a></li>                  
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print"></i><span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>reportes/cajas"><i class="fa fa-circle-o">
                                
                            </i>Cajas</a></li>
                            <li><a href="<?php echo base_url();?>reportes/ventas"><i class="fa fa-circle-o">
                                
                            </i>Ventas</a></li>
                            <li><a href="<?php echo base_url();?>reportes/abastecimientos"><i class="fa fa-circle-o"></i>Abastecimientos</a></li>
                        </ul>
                      
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i><span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="fa fa-circle-o"></i>Usuarios</a></li>                            
                            <li><a href="<?php echo base_url();?>administrador/permisos"><i class="fa fa-circle-o"></i>Permisos</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
                    



                      
    

        <!-- =============================================== -->