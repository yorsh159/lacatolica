<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>La Católica | Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
          <script src="../plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="../plugins/morris/raphael-min.js"></script>
<script src="../plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/morris/example.css">
          <script src="../plugins/jspdf/jspdf.min.js"></script>
          <script src="../plugins/jspdf/jspdf.plugin.autotable.js"></script>

<link href='../plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='../plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../plugins/fullcalendar/moment.min.js'></script>
<script src='../plugins/fullcalendar/fullcalendar.min.js'></script>

  </head>

  <body class="<?php if(isset($_SESSION["user_id"])):?>  skin-blue sidebar-mini <?php else:?>login-page<?php endif; ?>" >
    <div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"])):?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>L</b>C</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>LA</b>CATÓLICA</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class=""><?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name; }?> <span class="caret"></span>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="./?action=processlogout" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
<!--
<div class="user-panel">
            <div class="pull-left image">
              <img src="1.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          -->
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">ADMINISTRACION</li>
            <?php if(isset($_SESSION["user_id"])):
             ?>


                        <li><a href="./index.php?view=home"><i class='fa fa-dashboard'></i> <span>Inicio</span></a></li>
                       <!-- <li><a href="./index.php?view=news"><i class='fa fa-file'></i> <span>Avisos</span></a></li>-->
            <?php if(Core::$user->kind==1):?>

            <li class="treeview">
              <a href="#"><i class='fa fa-institution'></i> <span>Escuela</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
<?php foreach(PeriodData::getAllActive() as $p):?>
            <li><a href="./?view=teams&opt=byperiod&id=<?php echo $p->id; ?>"><i class='fa fa-angle-right'></i> <span>Año Escolar: <?php echo $p->name; ?></span></a></li>
<?php endforeach; ?>
            <li><a href="./?view=selectperiod"><i class='fa fa-angle-right'></i> <span>Seleccionar Año Escolar</span></a></li>
            <li><a href="./?view=inscription"><i class='fa fa-angle-right'></i> <span>Nueva Inscripcion</span></a></li>
            <li><a href="./?view=inscriptions"><i class='fa fa-angle-right'></i> <span>Inscripciones</span></a></li>
              </ul>
            </li>
            <?php endif; ?>




            <!--<li class="treeview">
              <a href="#"><i class='fa fa-briefcase'></i> <span>Finanzas</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
            <li><a href="./?view=sell&opt=alumn"><i class='fa fa-angle-right'></i> <span>Vender</span></a></li>
            <li><a href="./?view=concepts&opt=all"><i class='fa fa-angle-right'></i> <span>Conceptos</span></a></li>
              </ul>
            </li>-->

            <li class="treeview">
              <a href="#"><i class='fa fa-male'></i> <span>Personas</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
            <li><a href="./?view=alumns"><i class='fa fa-angle-right'></i> <span>Alumnos</span></a></li>
            <li><a href="./?view=teachers"><i class='fa fa-angle-right'></i> <span>Profesores</span></a></li>
            <li><a href="./?view=parents"><i class='fa fa-angle-right'></i> <span>Padres</span></a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class='fa fa-book'></i> <span>Gestión</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
            <li><a href="./?view=asignatures&opt=all"><i class='fa fa-angle-right'></i> <span>Cursos</span></a></li>
            <li><a href="./?view=teams&opt=all"><i class='fa fa-angle-right'></i> <span>Secciones</span></a></li>
            <li><a href="./?view=periods&opt=all"><i class='fa fa-angle-right'></i> <span>Periodos</span></a></li>
            <li><a href="./?view=rooms&opt=all"><i class='fa fa-angle-right'></i> <span>Salones</span></a></li>
              </ul>
            </li>

            <!--<li class="treeview">
              <a href="#"><i class='fa fa-file-text-o'></i> <span>CMS</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=posts&opt=all">Avisos</a></li>
                <li><a href="./?view=events&opt=all">Eventos</a></li>
              </ul>
            </li>-->



<!--            <li><a href="./?view=reports"><i class='fa fa-area-chart'></i> <span>Reportes</span></a></li> -->
            <?php if(Core::$user->kind==1):?>
            <li><a href="./?view=users"><i class='fa fa-users'></i> <span>Usuarios</span></a></li>
            <?php endif; ?>
            <!--
            <li class="treeview">
              <a href="#"><i class='fa fa-cog'></i> <span>Administracion</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=users">Usuarios</a></li>
                <li><a href="./?view=settings">Configuracion</a></li>
              </ul>
            </li>
            -->
          <?php endif;?>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif;?>

      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"])):?>
      <div class="content-wrapper">
      <div class="content">
        <?php View::load("index");?>
        </div>
      </div><!-- /.content-wrapper -->

        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
        
      </footer>
      <?php else:?>
<div class="login-box">
      <div class="login-logo">
        <a href="./">LA<b> CATÓLICA</a>
        <h3>ACCESO DEL ADMNISTRADOR</h3>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <!--<center></center>-->
        <form action="./?action=processlogin" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
              <a href="../"  class="btn btn-default btn-block btn-flat"><i class="fa fa-arrow-left"></i> Ir al Inicio</a>

            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->  
      <?php endif;?>


    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/dist/js/app.min.js" type="text/javascript"></script>

    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
</html>

