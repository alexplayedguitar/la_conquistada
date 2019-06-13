<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Noticias</title>
    <link type="text/css" href="../views/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="../views/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../views/css/theme.css" rel="stylesheet">
    <link type="text/css" href="../views/images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
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
								 <div class="module-head">
                                <h3>Productos</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
{?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Actualización realizada de forma satisfactoria!</strong>
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
												<!-- ACA HAY QUE TRAER EL VALOR DEL ID -->
                                                <option value="<?php echo $edit_tipo_prod->id_tipoProducto;?>"><?php echo $edit_tipo_prod->nombre;?></option>
                                                <option value="">------------------</option>
												<?php
													foreach($tipos as $tp){
												?>		
												<option value="<?php echo $tp->id_tipoProducto;?>"><?php echo $tp->nombre;?></option>
                                                <?php 
												} 
												?>
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
                                                <!-- ACA HAY QUE TRAER EL VALOR DEL ID -->
                                                <option value="<?php echo $edit_artista->id_artista;?>"><?php echo $edit_artista->apodo;?></option>
                                                <option value="">------------------</option>
												<?php
													foreach($artistas as $ar){
												?>		
												<option value="<?php echo $ar->id_artista;?>"><?php echo $ar->apodo;?></option>
                                                <?php 
												} 
												?>
                                                <!-- FIN QUERY TRAE ARTISTAS CARGADOS EN BD -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- FIN COMBO-BOX ARTISTA -->

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Nombre producto</label>
                                        <div class="controls">
                                            <input type="text" name="nombre" value="<?php echo $edit_producto->nombre; ?>" placeholder="Ingrese nombre del producto"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Sello</label>
                                        <div class="controls">
                                            <input type="text" name="sello" value="<?php echo $edit_producto->sello; ?>" placeholder="Ingrese sello del producto"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Fecha lanzamiento</label>
                                        <div class="controls">
                                            <input type="date" name="fechaLanzamiento" 
												value="<?php
															$date1=date_create($edit_producto->fechaLanzamiento);
															echo date_format($date1, 'Y-m-d');
														?>" placeholder="Ingrese fecha lanzamiento del producto" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Precio</label>
                                        <div class="controls">
                                            <input type="text" name="precio" value="<?php echo $edit_producto->precio; ?>" placeholder="Ingrese precio del producto"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Descripción Producto</label>
                                        <div class="controls">
                                            <textarea name="descripcion" value="" placeholder="Ingrese una descripciíon del producto"
                                                rows="6" class="span8 tip"><?php echo $edit_producto->descripcion; ?>
												</textarea>
                                        </div>
                                    </div>
                                    <!-- INICIO INSERCIÓN IMAGEN -->
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Imagen</label>
                                        <div class="controls">
												<<td><img src="data:image/jpg;base64,<?php echo base64_encode($edit_producto->imagen); ?>" width="350" height="350"></td>
                                        </div>
                                    </div>
									<div class="control-group">
                                        <label class="control-label" for="basicinput">Cambiar</label>
                                        <div class="controls">
                                            <input type="file" name="imagen" id="imagen" value="" class="span8 tip"
                                                required>
                                        </div>
                                    </div>
                                    <!-- FIN INSERCIÓN IMAGEN -->
                                
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Actualizar</button>
											<button type="submit" name="delete" class="btn" onClick="return confirm('Producto será eliminado. ¿Está seguro?')">Eliminar</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- FIN FORMULARIO CARGA -->
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
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
