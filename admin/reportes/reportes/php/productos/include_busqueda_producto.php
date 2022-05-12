<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Filtrar listado por fecha:</h4>
        </div>
        <div class="modal-body">
		
			<section>
											<table border="0" align="center">
												<tr>
													
													<td>
														&nbsp;&nbsp;&nbsp;&nbsp;Desde:&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													<td>
														<input class="form-control" type="date" id="bd-desde"/>
													</td>
													<td>
														&nbsp;&nbsp;&nbsp;&nbsp;Hasta:&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													<td>
														<input class="form-control" type="date" id="bd-hasta"/>
													</td>
													<td>
														&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													
													<td width="200">
														<a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Búsqueda a PDF</a>
													</td>
													<td >
														<a href="javascript:location.reload()"><small>Borrar Filtro</small></a>
													</td>
												</tr>
											</table>
										
			</section>
			<hr>
		
			<div class="panel panel-default">
				<div class="panel-body" id="agrega-registros"> </div>
			</div>
        </div>
        
      </div>
    </div>
  </div>
<!-- FIN DEL MODAL! -->	