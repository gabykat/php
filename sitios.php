<h1>Sitios</h1>
<div id="mostrarSitios"></div>


<script>
    $.ajax({
        url: 'http://localhost/Administrador/index.php/wssitios/sitios?',
//        data: datos,
        method: 'GET',//                    
        dataType: "json",
        success: function(msg) {
//            alert(msg);
            visualizarSitios(msg);
        },
        error: function(jqXmlHttpRequest, textStatus, errorThrown) {
            alert("Error leyendo datos.");
        }
    });

    function visualizarSitios(json) {
        document.getElementById('mostrarSitios').innerHTML = '';
        var salida = '';
        salida += '<table class="table table-condensed table-responsive">';
        salida += ' <tr>';
        salida += '     <th>';
        salida += '         ID';
        salida += '     </th> ';
        salida += '     <th>';
        salida += '         Nombre';
        salida += '     </th> ';
        salida += '     <th>';
        salida += '         Descripción';
        salida += '     </th>';
        salida += '     <th>';
        salida += '         Categoria';
        salida += '     </th>';
        salida += '     <th>';
        salida += '         Horario';
        salida += '     </th>';
        salida += '     <th>';
        salida += '      opciones';
        salida += '     </th>';
        salida += ' </tr>';
        for (i in json) {
            salida += ' <tr>';
            salida += '     <td>' + json[i].id + '</td>';
            salida += '     <td>' + json[i].nombre + '</td>';
            salida += '     <td>' + json[i].descripcion + '</td>';
            salida += '     <td>' + json[i].categoria_id + '</td>';
            salida += '     <td>' + json[i].horario + '</td>';
            salida += '     <td>';
            salida += '         <ul class="list-inline">';
            salida += '             <li><button data-toggle="modal" data-target="#actualizar" class="btn btn-default" onclick="getSitiosID(' + json[i].id + ')"><span class="fa fa-edit"></span></button></li>';
            salida += '             <li><button class="btn btn-default"><span class="fa fa-trash-o"></span></button></li>';
            //salida += '             <li><a href=<?php echo base_url();?>index.php/coordenadas></li><span class="fa fa-edit"></span>';
            salida += '         </ul>';
            salida += '     </td>';
            salida += ' </tr>';
        }
        salida += '</table>';
        document.getElementById('mostrarSitios').innerHTML = salida;
    }
  
    function getSitiosID(id) {
        $.ajax({
            url: 'http://localhost/Administrador/index.php/wssitios/sitiosId?id=' + id,
//        data: datos,
            method: 'GET',//                   
            dataType: "json",
            success: function(msg) {
                 $('#actId').val(msg[0].id);
                $('#actCategoria').val(msg[0].categoria_id);
                $('#actDescripcion').val(msg[0].descripcion);
                $('#actNombre').val(msg[0].nombre);
                $('#actHorario').val(msg[0].horario);
            },
            error: function(jqXmlHttpRequest, textStatus, errorThrown) {
                alert("Error leyendo datos.");
            }
        });
    }

    function updateSitiosID(id) {
        var id = $('#actId').val();
        var tipo = $('#actCategoria').val();
        var descripcion = $('#actDescripcion').val();
        var nombre = $('#actNombre').val();
        var horario = $('#actHorario').val();
        alert(id);
//        $.ajax({
//            url: 'http://localhost/Administrador/index.php/wssitios/sitiosUpdate?id=' + id + '&nombre=' + nombre + '&descripcion=' + descripcion + '&tipo=' + tipo,
////        data: datos,
//            method: 'GET',
////                    type: "get",
////                                async: false,
////                                contentType: "text/json; charset=utf-8",
//            dataType: "json",
//            success: function(msg) {
//                $('#actTipo').val(msg[0].id);
//                $('#actTipo').val(msg[0].tipo);
//                $('#actDescripcion').val(msg[0].descripcion);
//                $('#actNombre').val(msg[0].nombre);
//            },
//            error: function(jqXmlHttpRequest, textStatus, errorThrown) {
//                alert("Error leyendo datos.");
//            }
//        });
//        alert(nombre + "\n" + tipo + "\n" + descripcion);
    }
</script>


<button type="button" class="btn btn-default btn-success" data-target="#nuevo" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span> Nuevo </button>

<!-- Modal Actualizar-->
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Sitio</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nombre</label>
                        <div class="col-lg-4">
                            <input id="actId" type="hidden">
                            <input id="actNombre" type="text" name="nombre" class="form-control" 
                                   placeholder="Nombre...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Description</label>
                        <div class="col-md-6">
                            <textarea id="actDescripcion" name="descripcion" class="form-control" 
                                      placeholder="Description..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tipo</label>
                        <div class="col-md-4">
                            <input id="actTipo" type="text" name="tipo" class="form-control" 
                                   placeholder="Tipo...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateSitiosID()">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Agregar Sitio-->
<div class="container">
    <?php if (isset($message)): ?>
    <h2><?= $message; ?> </h2>
    <?php endif; ?>
    <?php echo form_open(base_url(). 'index.php/Admin/AgregarSitios');     ?>
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Sitio</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-lg-6">
                            <input id="actNombre" type="text" name="nnombre" class="form-control" placeholder="Nombre..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-6">
                            <textarea id="actDescripcion" name="ndescripcion" class="form-control" placeholder="Description..." required></textarea>
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-md-3 control-label">Categoria</label>
                        <div class="col-lg-6">
                            <input id="actTipo" type="text" name="ncategoria_id" class="form-control" placeholder="Categoria..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Horario</label>
                        <div class="col-lg-6">
                            <input id="actHorario" type="text" name="nhorario" class="form-control" placeholder="Horario..." required>
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
