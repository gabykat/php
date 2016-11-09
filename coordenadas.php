<h1>Coordenadas</h1>
<div id="mostrarCoordenadas"></div>


<table class="table table-condensed table-responsive">
    <tr>
        <th>
            ID
        </th> 
        <th>
            Categoria
        </th>
        <th>
            Posisión X
        </th>
        <th>
            Posisión Y
        </th>
        <th>
            Posisión Z
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
            <td><?= $fila->sitio_id; ?></td>
            <td><?= $fila->posx; ?></td>
            <td><?= $fila->posy; ?></td>
            <td><?= $fila->posz; ?></td>
            <td>
                <ul class="list-inline">
                    <li><button data-toggle="modal" data-target="#actualizar" class="btn btn-default btn-success" onclick="getSitiosID(' + json[i].id + ')"><span class="fa fa-edit"></span></button></li>
                    <li><button class="btn btn-default btn-success"><span class="fa fa-trash-o"></span></button></li>
                </ul>
            </td>
        </tr>

    <?php
        }
     ?>
        
</table>


<button type="button" class="btn btn-default btn-success" data-target="#nuevo" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span> Nuevo </button>

<!-- Modal Agregar coordenada-->
<div class="container">
    <?php if (isset($message)): ?>
    <h2><?= $message; ?> </h2>
    <?php endif; ?>
    <?php echo form_open(base_url(). 'index.php/coordenadas/AgregarCoordenadas');     ?>
    <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Coordenadas</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                         <div class="form-group">
                            <label class="col-md-3 control-label">Sitio Id</label>
                            <div class="col-lg-6">
                                <input type="text" name="nsitio" class="form-control" placeholder="Sitio id..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Posisión X</label>
                            <div class="col-lg-6">
                                <input type="text" name="nposx" class="form-control" placeholder="Posisión X..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Posisión X</label>
                            <div class="col-md-6">
                                <input  type="text" name="nposy" class="form-control" placeholder="Posisión Y..." required>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-md-3 control-label">Posisión X</label>
                            <div class="col-lg-6">
                                <input type="text" name="nposz" class="form-control" placeholder="Posisión Z..." required>
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
