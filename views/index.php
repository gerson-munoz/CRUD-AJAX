<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD con AJAX</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="margin: 10px;">
            <div class="col-md-12">
                <h3 class="text-center">
                    Modulo De Usuarios
                </h3>
            </div>
        </div>
        <div class="row"style="margin: 10px 20px">
            <div class="col-md-4">
                <div id="mensaje">
                    
                </div>
                <form method="post" id="formulario">
                    <h3>
                        Formulario De Registro
                    </h3>
                    <div class="form-group">
                        <label for="cedula">
                            Cedula
                        </label>
                        <input type="text" class="form-control" id="cedula" name="cedula"/>
                    </div> 
                    <div class="form-group">
                        <label for="nombre">
                            Nombre
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" />
                    </div> 
                    <div class="form-group">
                        <label for="apellidos">
                            Apellidos
                        </label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" />
                    </div> 
                    <div class="form-group">
                        <label for="correo">
                            Correo
                        </label>
                        <input type="email" class="form-control" id="correo" name="correo" />
                    </div> 
                    <div class="form-group">
                        <label for="telefono">
                            Telefono
                        </label>
                        <input type="text" class="form-control" id="telefono" name="telefono" />
                    </div> 
                    <button type="submit" class="btn btn-primary" id="registrar" name="registrar">
                        Aceptar
                    </button>
                    <button type="reset" class="btn btn-danger" name="cancelar" id="cancelar">
                        Cancelar
                    </button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        <form class="d-flex">
                            <input type="search" id="search" name="search" placeholder="Buscar" class="form-control me-2">
                            <button type="submit" class="btn btn-success">Buscar</button>
                        </form>
                    </div>
                </div>
                <div class="card my-4" id="resultado">
                    <div class="card-body">
                        <ul id="container"></ul>
                    </div>
                </div><br>
                <table class="table table-hover table-bordered" id="tablaUsuarios" name="tablaUsuarios">
                    <thead class="text-center">
                        <tr class="table-primary">
                            <th>
                                CEDULA
                            </th>
                            <th>
                                NOMBRE
                            </th>
                            <th>
                                APELLIDOS
                            </th>
                            <th>
                                CORREO
                            </th>
                            <th>
                                TELEFONO
                            </th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="usuarios" class="text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="bg-primary bg-gradient p-2 mt-5 text-light position-fixed bottom-0 w-100 text-center">
        Creado por Gerson Muñoz
    </footer>
    <script src="../js/jquery.js"></script>
    <script src="../js/ajax.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</body>
</html>