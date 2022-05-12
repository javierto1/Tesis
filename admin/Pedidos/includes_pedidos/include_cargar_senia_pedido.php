<!-- Modal -->
<div class="modal fade" id="myModalCargarSenia" role="dialog">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content" >
        
		
			<!-- INICIO MODAL BODY -->	
		
         <div class="panel-body"> 
    
		<form action="senia_pedidos/cargar_senia_pedidos.php" name="customForm" id="customForm" method="post" onsubmit="enviar()" enctype="multipart/form-data">
								<div class="form-group col-lg-12">
									<h3>Pedido N°24</h3><hr>
									<label>Monto a señar</label>
									<input id="id_pedido" name="id_pedido" type="hidden" value="14">
									<input id="senia" class="form-control" name="senia" type="number" value="" placeholder="Monto a señar" required>
									<label>Medio de Pago</label>
									<select class="form-control " name="medio_pago" type="text" required="">
																	<option>EFECTIVO</option>
																	<option>TARJETA DE CREDITO</option>
																	<option>TARJETA DE DEBITO</option>
																	<option>DEPOSITO BANCARIO</option>
																	<option>CHEQUE</option>
																	
									</select>
									<label>Fecha de Pago</label>
										<input id="fecha_pago" class="form-control" name="fecha_pago" type="date" value="" required>
									<hr>
									<button type="submit" class="btn btn-default">Guardar</button>
									<button type="reset" class="btn btn-default">Limpiar</button>
								</div> 
							</form>
            
	</div> 
			
        </div>
						
					<!-- FINAL MODAL BODY -->	
						
    </div>
       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->	
</div>

  
