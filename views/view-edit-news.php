
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
                                <h3>Noticias</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
									{?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Actualización satisfactoria!</strong>
                                    
                                </div>
                                <?php } ?>
                                <br />
								<!-- INICIO FORMULARIO CARGA -->
                                <form class="form-horizontal row-fluid" name="Noticias" method="post">
									<!-- INICIO CONSULTA A BD DATA PARA ACTUALIZAR -->
									
									<!-- FIN CONSULTA A BD DATA PARA ACTUALIZAR -->
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Título noticia</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Ingrese una descripción para la noticia" name="titulo"
                                                value="<?php echo $news->titulo;?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Descripción</label>
                                        <div class="controls">
                                            <textarea class="span8" name="descripcion"
                                                rows="5"><?php echo $news->descripcion;?></textarea>
                                        </div>
                                    </div>
									
                                    

                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="submit" name="submit" id="submit" class="btn" label="Actualizar"></input>
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
