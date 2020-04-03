
<div class="row">
	<div class="col-xs-12 text-center">
		<b>Turbo Gaming Center</b><br>
		Dirección <br>
		Tel. - <br>
		Email:correo@gmail.com
	</div>
</div> <br>

<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Precio de Compra</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->nombre_prod;?></td>
					<td><?php echo "S/".$detalle->precio;?></td>
					<td><?php echo $detalle->cantidad;?></td>
					<td><?php echo "S/".$detalle->importe;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="text-right"><strong>Total</strong></td>
					<td><?php echo "S/".$abastecimiento->total_abas;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>