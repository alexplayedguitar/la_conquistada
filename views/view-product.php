<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Productos</title>
    <link type="text/css" href="../views/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="../views/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../views/css/theme.css" rel="stylesheet">
    <link type="text/css" href="../views/images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    <?php include('include/header.php');?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php');?>
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>Productos</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
{?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Carga realizada de forma satisfactoria!</strong>
                                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                                <?php } ?>


                                <?php if(isset($_GET['del']))
{?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Error en la carga!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                </div>
                                <?php } ?>

                                <br />
                                <!-- INICIO FORMULARIO -->
                                <form class="form-horizontal row-fluid" name="insertproduct" method="post"
                                    enctype="multipart/form-data">
                                    <!-- INICIO COMBO-BOX TIPO PRODUCTO-->
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tipo producto</label>
                                        <div class="controls">
                                            <select name="tipo_producto" class="span8 tip"
                                                onChange="getSubcat(this.value);" required>
                                                <option value="">Seleccionar tipo producto</option>
                                                <!-- INICIO QUERY TRAE TIPOS DE PRODUCTOS -->
                                                <?php 
													foreach($tipos as $type)
												{?>
                                                <option value="<?php echo $type->id_tipoProducto;?>">
                                                    <?php echo $type->nombre;?></option>
                                                <?php } ?>
                                                <!-- FIN QUERY TRAE TIPOS DE PRODUCTOS -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- FIN COMBO-BOX TIPO PRODUCTO -->
                                    <!-- INICIO COMBO-BOX ARTISTA -->
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Artista</label>
                                        <div class="controls">
                                            <select name="artista" class="span8 tip" onChange="getSubcat(this.value);"
                                                required>
                                                <option value="">Seleccionar artista</option>
                                                <!-- INICIO QUERY TRAE ARTISTAS CARGADOS EN BD -->
												<?php 
													foreach($artistas as $art)
												{?>
                                                <option value="<?php echo $art->id_artista;?>">
                                                    <?php echo $art->apodo;?></option>
                                                <?php } ?>
                                                <!-- FIN QUERY TRAE ARTISTAS CARGADOS EN BD -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- FIN COMBO-BOX ARTISTA -->

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Nombre producto</label>
                                        <div class="controls">
                                            <input type="text" name="nombre" placeholder="Ingrese nombre del producto"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Sello</label>
                                        <div class="controls">
                                            <input type="text" name="sello" placeholder="Ingrese sello del producto"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Fecha lanzamiento</label>
                                        <div class="controls">
                                            <input type="date" name="fechaLanzamiento"
                                                placeholder="Ingrese fecha lanzamiento del producto" class="span8 tip"
                                                required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Precio</label>
                                        <div class="controls">
                                            <input type="text" name="precio" placeholder="Ingrese precio del producto"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Descripción Producto</label>
                                        <div class="controls">
                                            <textarea name="descripcion" placeholder="Ingrese una descripciíon del producto"
                                                rows="6" class="span8 tip">
												</textarea>
                                        </div>
                                    </div>
                                    <!-- INICIO INSERCIÓN IMAGEN -->
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Imagen</label>
                                        <div class="controls">
                                            <input type="file" name="imagen" id="imagen" value="" class="span8 tip"
                                                required>
                                        </div>
                                    </div>
                                    <!-- FIN INSERCIÓN IMAGEN -->
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Cargar producto</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- FIN FORMULARIO -->
                            </div>
                        </div>
                    </div>
                    <!-- INICIO GRILLA ADMINISTRACIÓN -->
                    <div class="module">
                        <div class="module-head">
                            <h3>Administración Productos</h3>
                        </div>
                        <div class="module-body table">
                            <?php if(isset($_GET['del']))
{?>
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong>
                                <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                            </div>
                            <?php } ?>
                            <br />
                            <table cellpadding="0" cellspacing="0" border="0"
                                class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Sello </th>
                                        <th>Fecha Lanzamiento</th>
                                        <th>Artista</th>
                                        <th>Tipo producto</th>
                                        <th>Precio</th>
										<th>Imagen</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
										<!-- INICIO QUERY QUE TRAE TODAS LOS PRODUCTOS DE LA BD PARA DESPLEGARLAS EN LA SIGUIENTE GRILLA -->
                                        <?php 
											foreach ($productos as $p){
										?>
										<!-- INICIO QUERY QUE TRAE TODAS LOS PRODUCTOS DE LA BD PARA DESPLEGARLAS EN LA SIGUIENTE GRILLA -->
                                    <tr>
                                        <td><?php echo $p->id_producto;?></td>
                                        <td><?php echo $p->nombre;?></td>
                                        <td><?php echo $p->sello;?></td>
                                        <td> <?php echo $p->fechaLanzamiento;?></td>
                                        <td><?php echo $p->artista;?></td>
                                        <td><?php echo $p->tipo_producto;?></td>
                                        <td><?php echo $p->precio;?></td>
										<td><img src="../caratulas/<?php echo $p->id_producto;?>/<?php echo $p->imagen;?>" width="50" height="50"></td>
                                        <td>
                                            <a href="controller-edit-product.php?idproducto=<?php echo $p->id_producto;?>"><i
                                                    class="icon-edit"></i></a>
                                            <a href="controller-product.php?idproducto=<?php echo $p->id_producto?>&del=delete"
                                                onClick="return confirm('Producto será eliminado. ¿Está seguro?')"><i
                                                    class="icon-remove-sign"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>

                            </table>
                        </div>
                    </div>
                    <!-- FIN GRILLA ADMINISTRACIÓN -->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

    <?php include('include/footer.php');?>

    <script src="../views/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="../views/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../views/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../views/scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="../views/scripts/datatables/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('.datatable-1').dataTable();
            $('.dataTables_paginate').addClass("btn-group datatable-pagination");
            $('.dataTables_paginate > a').wrapInner('<span />');
            $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
            $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
        });
    </script>
</body>

</html>