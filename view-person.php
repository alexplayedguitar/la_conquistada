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
                                <h3>Personas</h3>
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
	                                    
	                                <div class="control-group">
                                        <label class="control-label" for="basicinput">Nombre</label>
                                        <div class="controls">
                                            <input type="text" name="nombre" placeholder="Ingrese nombre de la persona"
                                                class="span8 tip" required>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Apellido</label>
                                        <div class="controls">
                                            <input type="text" name="apellido" placeholder="Ingrese nombre de la persona"
                                                class="span8 tip" required>
                                        </div>
                                    </div>
                                    <!-- INICIO COMBO-BOX PAIS -->
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">País</label>
                                        <div class="controls">
                                            <select name="pais" class="span8 tip" onChange="getSubcat(this.value);"
                                                required>
                                                <option value="">Seleccionar país</option>
                                                <!-- INICIO QUERY TRAE PAISES CARGADOS EN BD -->
                                                <?php 
													foreach ($paises as $p) {
													?>
                                                <option value="<?php echo $p->id_pais;?>">
                                                    <?php echo $p->nombre;?></option>
                                                <?php } ?>
                                                <!-- FIN QUERY TRAE PAISES CARGADOS EN BD -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- FIN COMBO-BOX PAIS -->
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Fecha Nacicmiento</label>
                                        <div class="controls">
                                            <input type="date" name="fecha"
                                                placeholder="Ingrese fecha lanzamiento del producto" class="span8 tip"
                                                required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Cargar persona</button>
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
                                <h3>Administración de Personas</h3>
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
                                            <th>Apellido</th>
                                            <th>Fecha Nacicmiento</th>
                                            <th>País</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<!-- INICIO QUERY QUE TRAE TODAS LAS PERSONAS DE LA BD PARA DESPLEGARLAS EN LA SIGUIENTE GRILLA -->
                                        <?php 
											foreach($noticias as $pp)
											{
										?>
										<!-- FIN QUERY QUE TRAE TODAS LAS PERSONAS DE LA BD PARA DESPLEGARLAS EN LA SIGUIENTE GRILLA -->
                                        <tr>
                                            <td><?php echo $pp->id_persona;?></td>
                                            <td><?php echo $pp->nombre;?></td>
                                            <td><?php echo $pp->apellido;?></td>
                                            <td><?php echo $pp->fechaNac;?></td>
                                            <td><?php echo $pp->id_pais;?></td>
                                            <td>
											<!-- Falta un controller para editar -->
	                                            <a href="view-edit-person.php?id=<?php echo $pp->id_persona;?>"><i
	                                                    class="icon-edit">En construccion</i></a>
	                                            <a href="view-person.php?id=<?php $pp->id_persona;?>&del=delete"
	                                                onClick="return confirm('Persona será eliminada. ¿Está seguro?')"><i
	                                                    class="icon-remove-sign"></i></a>
                                        	</td>
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