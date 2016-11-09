<h1>Usuarios</h1>
<div id="mostrarUsuarios"></div>



<table class="table table-condensed table-responsive">
	<tr>
        <th>
        	ID
        </th> 
        <th>
            Nombre de usuario
        </th>
        <th>
            Contraseña
        </th>
        <th>
            Tipo de usuario
        </th>
        <th>
            Estado
        </th>
        <th>
            Nombres
        </th>
        <th>
            Apellidos
        </th>
        <th>
            Teléfono
        </th>
        <th>
            Correo
        </th>
        <th>
            Opciones
        </th>
    </tr>
    <?php 
	foreach ($consulta->result() as $fila) { 

?>
	<tr>
		<td><?= $fila->id; ?></td>
        <td><?= $fila->usuario; ?></td>
        <td><?= $fila->password; ?></td>
        <td><?= $fila->id_tipo_usuario; ?></td>
        <td><?= $fila->estado; ?></td>
        <td><?= $fila->nombre; ?></td>
        <td><?= $fila->apellido; ?></td>
        <td><?= $fila->telefono; ?></td>
        <td><?= $fila->correo; ?></td>
        <td>
            <ul class="list-inline">
                <li><button data-toggle="modal" data-target="#actualizar" class="btn btn-default btn-success" onclick="getSitiosID(' + json[i].id + ')"><span class="fa fa-edit"></span></button></li>
                <li><button class="btn btn-default btn-success"><span class="fa fa-trash-o"></span></button></li>
            </ul>
        </td>
    </tr>
    <?php

	}?>
        
</table>



<button type="button" class="btn btn-default btn-success" data-target="#nuevo" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span> Nuevo </button>

<!-- Modal Agregar Usuario-->
<div class="container">
	

    <?php if (isset($message)): ?>
    <h2><?= $message; ?> </h2>
    <?php endif; ?>
    <?php echo form_open(base_url(). 'index.php/usuario/agregarUsuarios');     ?>
	<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Agregar Usuarios</h4>
	            </div>
	            <div class="modal-body">
	                <div class="form-horizontal">
	                   <div class="form-group row">
					  <label class="col-md-4 control-label">Nombre de Usuario:</label>
					 <div class="col-lg-6">
					    <input class="form-control" type="text" name="nusuario"  placeholder="Nombre de Usuario..." required >
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-md-4 control-label">Contraseña:</label>
					  <div class="col-lg-6">
					    <input class="form-control" name="npassword" type="password"  placeholder="Contraseña..." required>
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-md-4 control-label">Confirme contraseña:</label>
					  <div class="col-lg-6">
					    <input class="form-control" name="npassword2" type="password"  placeholder="Confirme contraseña:..." required >
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-md-4 control-label">Tipo de Usuario:</label>
					  <div class="col-lg-6">
					    <select id ="cbo_tipo" class="form-control">
					    	<option value="">Elija una opción</option>

					    </select>
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-md-4 control-label">Estado:</label>
					  <div class="col-lg-6">
					    <input class="form-control" name="nestado" type="text"  placeholder="Estado..." required>
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-md-4 control-label">Nombres:</label>
					  <div class="col-lg-6">
					    <input class="form-control" name="nnombre" type="text"  placeholder="Nombres..." required>
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-md-4 control-label">Apellidos:</label>
					  <div class="col-lg-6">
					    <input class="form-control" name="napellido" type="text" placeholder="Apellidos..." required>
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-md-4 control-label">Telefono:</label>
					  <div class="col-lg-6">
					    <input class="form-control" name="ntelefono" type="text" placeholder="Telefono..." required>
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-md-4 control-label">Correo:</label>
					  <div class="col-lg-6">
					    <input class="form-control" name="ncorreo" type="text"  placeholder="Correo..." required>
					  </div>
					</div>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                <input type="submit" name="submit_reg" value="Grabar aquí" class="btn btn-primary" >
	            </div>
	        </div>
	    </div>
	</div>
</div>
<script type="text/javascript">
	var baseurl = "<?=base_url(); ?>";

</script>