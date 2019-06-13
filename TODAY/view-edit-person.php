<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Personas</title>
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
                                <h3>Personas</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
{?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Carga satisfactoria!</strong>
                                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                                <?php } ?>
                                <br />
								<!-- INICIO FORMULARIO CARGA -->
                                <form class="form-horizontal row-fluid" name="Personas" method="post" enctype="multipart/form-data">
									
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Nombre</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Ingrese nombre de la persona" name="nombre"
                                                value="<?php echo $edit_person->nombre; ?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Apellido</label>
                                        <div class="controls">
                                            <input type="text" class="span8" name="apellido"
                                                rows="5" value="<?php echo $edit_person->apellido; ?>" required>
                                        </div>
                                    </div>
                                    <!-- INICIO COMBO-BOX PAIS -->
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">País</label>
                                        <div class="controls">
                                            <select name="pais" class="span8 tip" onChange="getSubcat(this.value);"
                                                required>
												<option value="<?php echo $edit_person->id_pais;?>"><?php echo $edit_person->nombre;?></option>
                                                <option value="">--------------------</option>
                                                <!-- INICIO QUERY TRAE PAISES CARGADOS EN BD -->
                                                <?php 
													foreach ($paises as $p) {
													?>
                                                <option value="<?php echo $p->id_pais;?>"><?php echo $p->nombre;?></option>
                                                <?php } ?>
                                                <!-- FIN QUERY TRAE PAISES CARGADOS EN BD -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- FIN COMBO-BOX PAIS -->
									<div class="control-group">
                                        <label class="control-label" for="basicinput">Fecha Nacimiento</label>
                                        <div class="controls">
                                            <input type="date" name="fechaNac" 
												value="<?php
															$date1=date_create($edit_person->fechaNac);
															echo date_format($date1, 'Y-m-d');
														?>" placeholder="Ingrese fecha de nacimiento del producto" class="span8 tip" required>
                                        </div>
                                    </div>
                                     <div class="control-group">
                                        <label class="control-label" for="basicinput">Foto de perfil</label>
                                        <div class="controls">
                                           <img src="data:image/jpg;base64,<?php echo base64_encode($edit_person->imagen); ?>" width="500" height="500">
                                        </div>
                                    </div>
									 <div class="control-group">
                                        <label class="control-label" for="basicinput">Cambiar Foto de Perfil</label>
                                        <div class="controls">
                                            <input type="file" name="imagen" id="imagen" value="" class="span8 tip"
                                                required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Actualizar</button>
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
