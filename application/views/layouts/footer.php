<footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2018-2019 <a href="https://www.facebook.com/victor.galvezc">Victor E. Gálvez</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script>
$(document).ready(function() {
    $('#example3').DataTable();
} );

    $(".btn-view-usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "administrador/usuarios/view",
            type:"POST",
            data:{idusuario:id},
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });
$('#example5').dataTable( {
    "order": [],
    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]
});

$(document).ready(function() {
    $('#example8').DataTable();
} );

$('#example6').dataTable( {
    "order": [],
    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]
});

$('#example7').dataTable( {
    "order": [],
    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]
});
$(document).ready(function () {
    var base_url= "<?php echo base_url();?>";
    var year = (new Date).getFullYear();
    datagrafico(base_url,year);
    $("#year").on("change",function(){
        yearselect = $(this).val();
        datagrafico(base_url,yearselect);
    });
    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //http://localhost/ventas_ci/mantenimiento/productos
                window.location.href = base_url + resp;
            }
        });
    });



    $(document).on("click",".btn-view-venta",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/ventas/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
                $("#modal-venta .modal-body").html(data);
            }
        });
    });



    $(document).on("click",".btn-view-venta2",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/ventas/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-viewbox").modal("hide");
                $("#modal-venta2 .modal-body").html(data);
                $("#modal-ventasgenerales").modal("hide");
                
            }
        });
    });


    $(document).on("click",".btn-view-abas2",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/abastecimientos/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-viewbox").modal("hide");
                $("#modal-abaste2 .modal-body").html(data);
                $("#modal-abasgenerales").modal("hide");

            }
        });
    });




    $(document).on("click",".btn-view-codigo",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/codigo/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-codigo .modal-body").html(data);
            }
        });
    });


    $(document).on("click",".btn-view-viewbox",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/cajas/viewbox",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });


    $(document).on("click",".btn-view-codigo",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/codigos/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
                $("#modal-codigo .modal-body").html(data);

            }
        });
    });


    $(document).on("click",".btn-view-abas",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/abastecimientos/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
                $("#modal-abaste .modal-body").html(data);

            }
        });
    });


$("#btn-agregarcodigo").on("click",function(){
        data = $(this).val();
        if (data !='') {
            infocodigo = data.split("*");
            alert("Precio: "+"S/."+infocodigo[2]+"\nCódigo: "+infocodigo[1]+"\nTipo: "+infocodigo[3]);

            $("#btn-agregar").val(null);
            $("#producto").val(null);
        }else{
            alert("Escoga un Precio");
        }
    });


    $(document).on("click",".btn-check",function(){
        codigo = $(this).val();
        infocodigo = codigo.split("*");
        $("#idcodigo").val(infocodigo[0]);
        $("#codigo").val(infocodigo[2]);
        $("#modal-default").modal("hide");
        $("#btn-agregarcodigo").val(codigo);
    });


    $(document).on("click",".btn-check22",function(){
        data = $(this).val();
        if (data !='') {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";


            html += "<td><input type='hidden' name='precios[]' value='"+infoproducto[2]+"'>"+infoproducto[2]+"</td>";

            html += "<td><input type='hidden' name='stocks[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";       
        

            html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";

            html += "<td><input type='hidden' name='importes[]' value='"+infoproducto[2]+"'><p>"+infoproducto[2]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            sumar();
            $("#btn-check22").val(null);
            $("#producto").val(null);
            $("#modal-default").modal("hide");
        }else{
            alert("seleccione un producto...");
        }
    });




    $(".btn-view-producto").on("click", function(){
        var producto = $(this).val(); 
        //alert(cliente);
        var infoproducto = producto.split("*");
        html = "<p><strong>Nombre:</strong>"+infoproducto[1]+"</p>"
        html += "<p><strong>Descripcion:</strong>"+infoproducto[2]+"</p>"
        html += "<p><strong>Precio:</strong>"+infoproducto[4]+"</p>"
        html += "<p><strong>Stock:</strong>"+infoproducto[5]+"</p>"
        html += "<p><strong>Inventario Minimo:</strong>"+infoproducto[6]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    $(".btn-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/categorias/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });



    $(".btn-view-tipos").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/tipos/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });
    $(".btn-view-usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "administrador/usuarios/view",
            type:"POST",
            data:{idusuario:id},
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });
    $("#producto2").autocomplete({
        source:function(request, response){
            $.ajax({
                url: base_url+"movimientos/abastecimientos/getproductos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
        },
        minLength:2,
        select:function(event, ui){
            data = ui.item.id_prod+ "*"+ui.item.label+ "*"+ ui.item.precio_prod_in+ "*"+ ui.item.stock_prod;
            $("#btn-agregarabas").val(data);
        },
    });

    $("#producto").autocomplete({
        source:function(request, response){
            $.ajax({
                url: base_url+"movimientos/ventas/getproductos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
        },
        minLength:2,
        select:function(event, ui){
            data = ui.item.id_prod+ "*"+ui.item.label+ "*"+ ui.item.precio_prod_out+ "*"+ ui.item.stock_prod;
            $("#btn-agregar").val(data);
        },
    });






    $(document).on("click",".btn-check21",function(){
        data = $(this).val();
        if (data !='') {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";


            html += "<td><input type='hidden' name='precios[]' value='"+infoproducto[2]+"'>"+infoproducto[2]+"</td>";

            html += "<td><input type='hidden' name='stocks[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";       
        

            html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";

            html += "<td><input type='hidden' name='importes[]' value='"+infoproducto[2]+"'><p>"+infoproducto[2]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbabas tbody").append(html);
            sumar2();
            $("#btn-agregarabas").val(null);
            $("#producto2").val(null);
            $("#modal-default").modal("hide");
        }else{
            alert("seleccione un producto...");
        }
    });

    $(document).on("click",".btn-remove-producto", function(){
        $(this).closest("tr").remove();
        sumar();
    });


    $(document).on("keyup","#tbventas input.cantidades", function(){
        cantidad = $(this).val();
        stock = $(this).closest("tr").find("td:eq(2)").text();
        precio = $(this).closest("tr").find("td:eq(1)").text();
        importe = cantidad * precio;

     

            $(this).closest("tr").find("td:eq(4)").children("p").text(importe.toFixed(2));
            $(this).closest("tr").find("td:eq(4)").children("input").val(importe.toFixed(2));              
   


        sumar();
    });

    $(document).on("keyup","#tbabas input.cantidades", function(){
        cantidad = $(this).val();
        stock = $(this).closest("tr").find("td:eq(2)").text();
        precio = $(this).closest("tr").find("td:eq(1)").text();
        importe = cantidad * precio;

     

            $(this).closest("tr").find("td:eq(4)").children("p").text(importe.toFixed(2));
            $(this).closest("tr").find("td:eq(4)").children("input").val(importe.toFixed(2));              
   


        sumar2();
    });





    $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print({
            title:"Comprobante de Venta"
        });
    });

$(document).ready(function()
{
  //Defino los totales de mis 2 columnas en 0
  var total_col1 = 0;
      //Recorro todos los tr ubicados en el tbody
  $('#tbvcajas tbody').find('tr').each(function (i, el) {
             
        //Voy incrementando las variables segun la fila ( .eq(0) representa la fila 1 )     
        total_col1 += parseFloat($(this).find('td').eq(0).text());
                
    });
    //Muestro el resultado en el th correspondiente a  la columna
    $('#tbvcajas  tfoot tr th').eq(0).text("Total " +"S/."+total_col1);
    $("input[name=totalv]").val("S/."+total_col1.toFixed(0));
});

$(document).ready(function()
{
  //Defino los totales de mis 2 columnas en 0
  var total_col1 = 0;
      //Recorro todos los tr ubicados en el tbody
  $('#tbacajas tbody').find('tr').each(function (i, el) {
             
        //Voy incrementando las variables segun la fila ( .eq(0) representa la fila 1 )     
        total_col1 += parseFloat($(this).find('td').eq(0).text());
                
    });
    //Muestro el resultado en el th correspondiente a  la columna
    $('#tbacajas  tfoot tr th').eq(0).text("Total " +"S/."+total_col1);
    $("input[name=totala]").val("S/."+total_col1.toFixed(0));
});


$(document).ready(function()
{
  //Defino los totales de mis 2 columnas en 0
  var total_col1 = 0;
      //Recorro todos los tr ubicados en el tbody
  $('#tbdcajas tbody').find('tr').each(function (i, el) {
             
        //Voy incrementando las variables segun la fila ( .eq(0) representa la fila 1 )     
        total_col1 += parseFloat($(this).find('td').eq(0).text());
                
    });
    //Muestro el resultado en el th correspondiente a  la columna
    $('#tbdcajas  tfoot tr th').eq(0).text("Total " +"S/."+total_col1);
    $("input[name=totald]").val("S/."+total_col1.toFixed(0));
});



    function sumar(){
        subtotal = 0;
        $("#tbventas tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(4)").text());       
        });
        $("input[name=subtotal]").val(subtotal.toFixed(2));
        porcentaje = $("#igv").val();
        igv = subtotal * (porcentaje/100);
        $("input[name=igv]").val(igv.toFixed(2));
        descuento = $("input[name=descuento]").val();
        total = subtotal;
        $("input[name=total]").val(total.toFixed(2));

    }
    function sumar2(){
        subtotal = 0;
        $("#tbabas tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(4)").text());       
        });
        $("input[name=subtotal]").val(subtotal.toFixed(2));
        porcentaje = $("#igv").val();
        igv = subtotal * (porcentaje/100);
        $("input[name=igv]").val(igv.toFixed(2));
        descuento = $("input[name=descuento]").val();
        total = subtotal;
        $("input[name=total]").val(total.toFixed(2));

    }

    $('#reporteVenta').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Ventas",
                exportOptions: {
                    columns: [ 0, 1]
                },
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Ventas",
                exportOptions: {
                    columns: [ 0, 1 ]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros ",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    $('#reporteAbastecimiento').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Abastecimientos",
                exportOptions: {
                    columns: [ 0, 1]
                },
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Abastecimientos",
                exportOptions: {
                    columns: [ 0, 1 ]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros ",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });    
    $('#reporteCaja').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Cajas",
                exportOptions: {
                    columns: [ 0, 1]
                },
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Cajas",
                exportOptions: {
                    columns: [ 0, 1 ]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros ",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });



	$('#example1').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
	$('.sidebar-menu').tree();
})


function graficar(meses,montos,year){
    Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monto acumulado de ganancias por meses'
    },
    subtitle: {
        text: 'Año:' + year
    },
    xAxis: {
        categories: meses,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Monto Acumulado (soles)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
            '<td style="padding:0"><b>{point.y:.2f} soles</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series:{
            dataLabels:{
                enabled:true,
                formatter:function(){
                    return Highcharts.numberFormat(this.y,2)
                }

            }
        }
    },
    series: [{
        name: 'Días',        
        data: montos

    }]
});
}
function datagrafico(base_url,year){
    namesMonth= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Nomviembre","Diciembre"];
    $.ajax({
        url: base_url + "dashboard/getData",
        type:"POST",
        data:{year: year},
        dataType:"json",
        success:function(data){
            var meses = new Array();
            var montos = new Array();
            $.each(data,function(key, value){
                meses.push(namesMonth[value.mes - 1]);
                valor = Number(value.monto);

                montos.push(valor);
            });
            graficar(meses,montos,year);
        }
    });
}


</script>
</body>
</html>
