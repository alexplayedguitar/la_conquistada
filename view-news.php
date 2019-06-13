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
                                <h3>Noticias</h3>
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


                                <?php if(isset($_GET['del']))
{?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Error en carga!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                </div>
                                <?php } ?>

                                <br />
								<!-- INICIO FORMULARIO CARGA -->
                                <form class="form-horizontal row-fluid" name="Noticias" method="POST">
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Título</label>
                                        <div class="controls">
                                            <input type="text" name="titulo" placeholder="Ingrese un título para la noticia"
                                                class="span8 tip" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Descripción</label>
                                        <div class="controls">
                                            <textarea class="span8" name="descripcion" placeholder="Ingrese una descripción para la noticia" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Cargar noticia</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- FIN FORMULARIO CARGA -->
                            </div>
                        </div>
						<!-- INICIO GRILLA ADMINISTRACIÓN -->
                        <div class="module">
                            <div class="module-head">
                                <h3>Administración Noticias</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0"
                                    class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Título</th>
                                            <th>Descripción</th>
                                            <th>Fecha creación</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<!-- INICIO CONSULTA A BD DATA PARA MOSTRAR DATA -->
										<?php 
										foreach ($noticias as $n)
										{
										?>
										<!-- FIN CONSULTA A BD DATA PARA MOSTRAR DATA -->
                                        <tr>
                                            <td><?php echo $n->id_noticia; ?></td>
                                            <td><?php echo $n->titulo;?></td>
                                            <td><?php echo $n->descripcion; ?></td>
                                            <td><?php echo $n->fecha;?></td>
                                            <td>
                                                <a href="controller-edit-news.php?id_noticia=<?php echo $n->id_noticia?>"> <i
	                                                    class="icon-edit"> Edit</i> </a>
                                                <a href="controller-edit-news.php?id_noticia=<?php echo $n->id_noticia?>&del=delete"
                                                    onClick="return confirm('Noticia será eliminada. ¿Está Seguro?')">
													<i class="icon-remove-sign"> Delete</i></a></td>
                                        </tr>
                                        <?php } ?>

                                </table>
                            </div>
                        </div>
					<!-- FIN GRILLA ADMINISTRACIÓN -->
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