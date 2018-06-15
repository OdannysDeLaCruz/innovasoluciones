
<!-- SECCION CARRITO -->
<section class="carrito_desplegable">
	<section class="carrito table table-responsive">
		<table class="table table-hover">
		  	<thead>
			    <tr class="carrito_titulo">
			      <th>Imagen</th>
			      <th>Productos</th>
			      <th>Cantidad</th>
			      <th>Precio</th>
			      <th>Eliminar</th>
			    </tr>
		  	</thead>
		  	<tbody>
			    <tr class="carrito_fila">
			      	<td scope="row">
			      		<img class="carrito_fila_img" src="img/zapatos.jpg" alt="">
			      	</td>
			      	<td class="carrito_fila_titulo"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></td>
			      	<td class="carrito_fila_cantidad">
			      		<input type="number" min="1" max="10" value="1">
			      	</td>
			      	<td class="carrito_fila_precio"><i>$ 100.000 COP</i></td>
			      	<td class="carrito_fila_borrar"><span class="fa fa-trash-o"></span></td>
			    </tr>
			    <tr class="carrito_fila">
			      	<td scope="row">
			      		<img class="carrito_fila_img" src="img/celular.jpg" alt="">
			      	</td>
			      	<td class="carrito_fila_titulo"><p>Lorem ipsum dolor sit amet.</p></td>
			      	<td class="carrito_fila_cantidad">
			      		<input type="number" min="1" max="10" value="1">
			      	</td>
			      	<td class="carrito_fila_precio"><i>$ 150.000 COP</i></td>
			      	<td class="carrito_fila_borrar"><span class="fa fa-trash-o"></span></td>
			    </tr>
		  	</tbody>
		</table>			
	</section>
	<label class="carrito_botones">
		<div class="btn_carrito_pagar botones_innova">
			<a href="/verificacion.php"><span class="fa fa-credit-card-alt"></span> Pagar</a>
		</div>
		<div class="btn_carrito_vaciar botones_innova">
			<a href=""><span class="fa fa-trash-o"></span> Vaciar carrito</a>
		</div>
	</label>
</section>
<!-- FIN SECCION CARRITO -->

