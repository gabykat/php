<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>UideAR::Administración</title>
        <script src="http://localhost/Administrador/js/jquery-1.12.3.min.js"></script>
        <script src="http://localhost/Administrador/Ninestars/js/bootstrap.js"></script>
        <link href="http://localhost/Administrador/Ninestars/css/bootstrap.css" rel="stylesheet"/>
        <link href="http://localhost/Administrador/Ninestars/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>


        Bootstrap Core CSS 
        <link href="http://localhost/Administrador/Ninestars/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        Fonts 
        <link href="http://localhost/Administrador/Ninestars/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://localhost/Administrador/Ninestars/css/nivo-lightbox.css" rel="stylesheet" />
        <link href="http://localhost/Administrador/Ninestars/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/Administrador/Ninestars/css/animate.css" rel="stylesheet" />
        Squad theme CSS 
        <link href="http://localhost/Administrador/Ninestars/css/style.css" rel="stylesheet">
        <link href="http://localhost/Administrador/Ninestars/color/default.css" rel="stylesheet">


    </head>
    <li><a href="http://localhost/Administrador/">UideAR App Móvil</a></li>
    <body>

        <div class="container">
            <ul id="gn-menu" class="gn-menu-main">

                <li><a href="http://localhost/Administrador/">Regresar a la página principal</a></li>
                <li><ul class="company-social">


                    </ul>	
                </li>
            </ul>
        </div>




        <div class="row">
            <div class="col-md-12">
                <div align="center"  class="page-header">
                    <h1><span class="fa fa-user"></span> Ingreso de Usuario</h1>
                    <h4>Uso privado, solo para administradores</h4>
                </div>
            </div>
        </div>
        <div  class="row">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-4 control-label">Usuario</label>
                    <div  class="col-md-4">
                        <input  name="usuario" type="text" class="form-control" placeholder="Usuario">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Contraseña</label>
                    <div class="col-md-4">
                        <input name="clave" type="text" class="form-control" placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-4 col-lg-10">
                        <button id="btnEntrar" type="button" class="btn btn-default btn-success"><span class="fa fa-sign-in"></span> Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#btnEntrar').click(function(evt) {
            var u = $('input[name=usuario]').val();
            var c = $('input[name=clave]').val();
            var datos = {
                'usuario': u,
                'clave': c
            }
            $.ajax({
                url: 'http://localhost/Administrador/index.php/Api/validar?',
                data: datos,
                method: 'POST',
                //                    type: "get",
                //                                async: false,
                //                                contentType: "text/json; charset=utf-8",
                dataType: "json",
                success: function(msg) {
                    if (msg !== false) {
                        location.href = 'http://localhost/Administrador/index.php/usuario/administracion';
                    } else {
                        location.href = 'http://localhost/Administrador/';
                    }
                },
                error: function(jqXmlHttpRequest, textStatus, errorThrown) {
                    alert("Error leyendo datos.");
                }
            });
        });

        function ingresar(e) {
            if (e.which == 13) {
                var u = $('input[name=usuario]').val();
                var c = $('input[name=clave]').val();
                var datos = {
                    'usuario': u,
                    'clave': c
                }
                $.ajax({
                    url: 'http://localhost/Administrador/index.php/Api/validar?',
                    data: datos,
                    method: 'POST',
                    //                    type: "get",
                    //                                async: false,
                    //                                contentType: "text/json; charset=utf-8",
                    dataType: "json",
                    success: function(msg) {
                        if (msg !== false) {
                            location.href = 'http://localhost/Administrador/index.php/usuario/administracion';
                        } else {
                            location.href = 'http://localhost/Administrador/';
                        }
                    },
                    error: function(jqXmlHttpRequest, textStatus, errorThrown) {
                        alert("Error leyendo datos.");
                    }
                });
            }
        }
    </script>
    <!-- Core JavaScript Files -->
    <script src="http://localhost/Administrador/Ninestars/js/jquery.min.js"></script>
    <script src="http://localhost/Administrador/Ninestars/js/bootstrap.min.js"></script>
    <script src="http://localhost/Administrador/Ninestars/js/jquery.easing.min.js"></script>	
    <script src="http://localhost/Administrador/Ninestars/js/classie.js"></script>
    <script src="http://localhost/Administrador/Ninestars/js/gnmenu.js"></script>
    <script src="http://localhost/Administrador/Ninestars/js/jquery.scrollTo.js"></script>
    <script src="http://localhost/Administrador/Ninestars/js/nivo-lightbox.min.js"></script>
    <script src="http://localhost/Administrador/Ninestars/js/stellar.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/Administrador/Ninestars/js/custom.js"></script>

</body>
</html>
