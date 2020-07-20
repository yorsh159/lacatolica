<?php if(isset($_GET["opt"]) && $_GET["opt"]=="byperiod"):
$period = PeriodData::getById($_GET["id"]);
?>
	<div class="row">
	<div class="col-md-12">
		<h1>Secciones [<?php echo $period->name; ?>]</h1>
<br>
		<?php
		$teams = TeamData::getAll();
		if(count($teams)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>Nombre</th>
			<th>Letra</th>
			<th>Alumnos</th>
			<th>Cursos</th>
			<th></th>
			</thead>
			<?php
			foreach($teams as $team){
				?>
				<tr>
				<td><?php echo $team->grade; ?></td>				
				<td><?php echo $team->letter; ?></td>				
				<td>
<?php echo count(InscriptionData::getAllByTP($team->id,$period->id));?>

				</td>				
				<td>
		<?php echo count(AsignationData::getAllByTP($team->id,$period->id)); ?>
				</td>				
			<td style="">
				<a href="index.php?view=teams&opt=general1&id=<?php echo $team->id;?>&period_id=<?php echo $period->id;?>" class="btn btn-default btn-xs"><i class="fa fa-th-list"></i> Alumnos </a>
	
				<a href="index.php?view=teamasignatures&opt=all&id=<?php echo $team->id;?>&period_id=<?php echo $period->id;?>" class="btn btn-default btn-xs"><i class="fa fa-th-list"></i> Editar Asignaturas </a>
	</td>
				</tr>
				<?php

			}
			echo "</table></div></div>";
		}else{
			echo "<p class='alert alert-danger'>No hay secciones registradas</p>";
		}


		?>


	</div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="general1"):
?>


<?php
$team = TeamData::getById($_GET["id"]);
$period = PeriodData::getById($_GET["period_id"]);

$alumns = InscriptionData::getAllByTP($_GET["id"],$_GET["period_id"]);
?>

<div class="row">
	<div class="col-md-12">
		<h1>Alumnos [<?php echo $team->grade." - ".$team->letter;?>] [<?php echo $period->name;?>]</h1>
		<a href="./?view=teams&opt=byperiod&id=<?php echo $period->id;?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Tomar Asistencia <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=assistance&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>
<!--<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Modificar Conducta <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=behavior&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>-->

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Reporte de Asistencia <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=assistancereport&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<!--<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Modificar Calificaciones <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=editcalifications&id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>-->

		<!--<a href="report/alumns-word.php?id=<?php echo $team->id; ?>&period_id=<?php echo $period->id; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar </a>--><br><br>
</div>
</div>
<div class="row">
	<div class="col-md-12">

		<?php
 $asignations = AsignationData::getAllByTP($team->id,$period->id); 

		if(count($alumns)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="box-body">
			<table class="table datatable table-bordered table-hover">
			<thead>
			<th>Codigo</th>
			<th>Nombre</th>
			<?php foreach($asignations as $a):?>
			<th><?php echo $a->getAsignature()->name; ?>
				<?php endforeach; ?>
			</thead>
			<?php
			foreach($alumns as $alumnx){
				$alumn = $alumnx->getAlumn();
				?>
				<tr>
				<td><?php echo $alumn->code; ?></td>
				<td><?php echo $alumn->name." ".$alumn->lastname; ?></td>
			<?php foreach($asignations as $a):?>
			<td>
<!--<?php
$total=0;
$c=0;
$blocks = BlockData::getAllByAsignationId($a->id);
foreach($blocks as $b){
	if($b->block_id!=""){
      $exist = CalificationData::getExist($alumn->id,$b->id);
         if($exist!=null){ $total+=$exist->val; $c++; }
     }
       }
    if($total>0&$c>0){
       echo number_format($total/$c,2,".",","); 
   	}else{
   		echo 0;
   	}
      
?>-->

			</td>
			<?php endforeach; ?>
				</tr>
				<?php

			}

echo "</table></div></div>";

		}else{
			echo "<p class='alert alert-danger'>No hay Alumnos</p>";
		}


		?>


	</div>
</div>










<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="assistance"):
?>
<?php
$asignation = AsignationData::getById($_GET["asignation_id"]);
$team = TeamData::getById($asignation->team_id);
$period = PeriodData::getById($asignation->period_id);

$alumns = InscriptionData::getAllByTP($asignation->team_id,$asignation->period_id);
?>

<div class="row">
	<div class="col-md-12">
		<h1>Lista de Asistencia [<?php echo $team->grade." - ".$team->letter;?>] [<?php echo $period->name;?>]</h1>
		<a href="./?view=teams&opt=general1&id=<?php echo $team->id;?>&period_id=<?php echo $period->id;?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Tomar Asistencia <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=assistance&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Reporte de Asistencia <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=assistancereport&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<!--		<a href="../report/alumns-word.php?id=<?php echo $team->id; ?>&period_id=<?php echo $period->id; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar </a><br><br> -->
</div>
</div>
<div class="row">
	<div class="col-md-12">
<!--	<a href="index.php?view=list&team_id=<?php echo $_GET["team_id"]; ?>" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a> -->
<form class="form-horizontal" id="loadlist" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar Fecha:</label>
    <div class="col-lg-7">
      <input type="date" name="date_at" value="<?php echo date ("Y-m-d");?>" required class="form-control" >
    </div>
    <div class="col-lg-offset-3">
    <input type="hidden" name="team_id" value="<?php echo $team->id;?>">
    <input type="hidden" name="period_id" value="<?php echo $period->id;?>">
    <input type="hidden" name="asignation_id" value="<?php echo $asignation->id;?>">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>

  </div>
</form>

<div id="data">
	<p class="alert alert-warning">No hay datos, por favor selecciona una fecha.</p>
</div>

	</div>
</div>

<script>
	$("#loadlist").submit(function(e){
		e.preventDefault();
		var d = $("#loadlist").serialize();
		$.get("./?action=loadassistance",d,function(data){
			console.log(data);
			$("#data").html(data);

		});
	});
</script>


<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="assistancereport"):
?>
<?php
$asignation = AsignationData::getById($_GET["asignation_id"]);
$team = TeamData::getById($asignation->team_id);
$period = PeriodData::getById($asignation->period_id);

$alumns = InscriptionData::getAllByTP($asignation->team_id,$asignation->period_id);
?>

<div class="row">
	<div class="col-md-12">
		<h1>Reporte de Asistencia [<?php echo $team->grade." - ".$team->letter;?>] [<?php echo $period->name;?>]</h1>
		<a href="./?view=teams&opt=general1&id=<?php echo $team->id;?>&period_id=<?php echo $period->id;?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Tomar Asistencia <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=assistance&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Reporte de Asistencia <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=assistancereport&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<!--		<a href="../report/alumns-word.php?id=<?php echo $team->id; ?>&period_id=<?php echo $period->id; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar </a><br><br> -->
</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
<!--	<a href="index.php?view=list&team_id=<?php echo $_GET["team_id"]; ?>" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a> -->
<form class="form-horizontal" id="loadlist" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Inicio:</label>
    <div class="col-lg-3">
      <input type="date" name="start_at" value="<?php echo date("Y-m-d");?>" required class="form-control" >
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Fin:</label>
    <div class="col-lg-3">
      <input type="date" name="finish_at" value="<?php echo date("Y-m-d");?>" required class="form-control" >
    </div>
    <div class="col-lg-offset-3">
    <input type="hidden" name="team_id" value="<?php echo $team->id;?>">
    <input type="hidden" name="period_id" value="<?php echo $period->id;?>">
    <input type="hidden" name="asignation_id" value="<?php echo $asignation->id;?>">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>

  </div>
</form>

<div id="data">
	<p class="alert alert-warning">No hay datos, por favor selecciona una fecha.</p>
</div>

	</div>
</div>

<script>
	$("#loadlist").submit(function(e){
		e.preventDefault();
		var d = $("#loadlist").serialize();
		$.get("./?action=loadlist",d,function(data){
			console.log(data);
			$("#data").html(data);

		});
	});
</script>



<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="behaviorreport"):
?>
<?php
$asignation = AsignationData::getById($_GET["asignation_id"]);
$team = TeamData::getById($asignation->team_id);
$period = PeriodData::getById($asignation->period_id);

$alumns = InscriptionData::getAllByTP($asignation->team_id,$asignation->period_id);
?>

<div class="row">
	<div class="col-md-12">
		<h1>Reporte de Conducta [<?php echo $team->grade." - ".$team->letter;?>] [<?php echo $period->name;?>]</h1>
		<a href="./?view=teams&opt=general1&id=<?php echo $team->id;?>&period_id=<?php echo $period->id;?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Modificar Conducta <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=assistance&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Reporte de Conducta <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=behaviorreport&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<!--		<a href="../report/alumns-word.php?id=<?php echo $team->id; ?>&period_id=<?php echo $period->id; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar </a><br><br> -->
</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
<!--	<a href="index.php?view=list&team_id=<?php echo $_GET["team_id"]; ?>" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a> -->
<form class="form-horizontal" id="loadlist" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Inicio:</label>
    <div class="col-lg-3">
      <input type="date" name="start_at" value="<?php echo date("Y-m-d");?>" required class="form-control" >
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Fin:</label>
    <div class="col-lg-3">
      <input type="date" name="finish_at" value="<?php echo date("Y-m-d");?>" required class="form-control" >
    </div>
    <div class="col-lg-offset-3">
    <input type="hidden" name="team_id" value="<?php echo $team->id;?>">
    <input type="hidden" name="period_id" value="<?php echo $period->id;?>">
    <input type="hidden" name="asignation_id" value="<?php echo $asignation->id;?>">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>

  </div>
</form>

<div id="data">
	<p class="alert alert-warning">No hay datos, por favor selecciona una fecha.</p>
</div>

	</div>
</div>

<script>
	$("#loadlist").submit(function(e){
		e.preventDefault();
		var d = $("#loadlist").serialize();
		$.get("./?action=loadlistbehavior",d,function(data){
			console.log(data);
			$("#data").html(data);

		});
	});
</script>

<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="behavior"):
?>
<?php
$asignation = AsignationData::getById($_GET["asignation_id"]);
$team = TeamData::getById($asignation->team_id);
$period = PeriodData::getById($asignation->period_id);

$alumns = InscriptionData::getAllByTP($asignation->team_id,$asignation->period_id);
?>

<div class="row">
	<div class="col-md-12">
		<h1>Lista de Conducta [<?php echo $team->grade." - ".$team->letter;?>] [<?php echo $period->name;?>]</h1>
		<a href="./?view=teams&opt=general1&id=<?php echo $team->id;?>&period_id=<?php echo $period->id;?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Modificar Conducta <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=hehavior&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Reporte de Conducta <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach(AsignationData::getAllByTP($team->id,$period->id) as $asi):?>
    <li><a href="./?view=teams&opt=behaviorreport&asignation_id=<?php echo $asi->id;?>"><?php echo $asi->getAsignature()->name; ?></a></li>
<?php endforeach; ?>
  </ul>
</div>

<!--		<a href="../report/alumns-word.php?id=<?php echo $team->id; ?>&period_id=<?php echo $period->id; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar </a><br><br> -->
</div>
</div>
<div class="row">
	<div class="col-md-12">
<!--	<a href="index.php?view=list&team_id=<?php echo $_GET["team_id"]; ?>" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a> -->
<form class="form-horizontal" id="loadlist" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar Fecha:</label>
    <div class="col-lg-7">
      <input type="date" name="date_at" value="<?php echo date("Y-m-d");?>" required class="form-control" >
    </div>
    <div class="col-lg-offset-3">
    <input type="hidden" name="team_id" value="<?php echo $team->id;?>">
    <input type="hidden" name="period_id" value="<?php echo $period->id;?>">
    <input type="hidden" name="asignation_id" value="<?php echo $asignation->id;?>">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>

  </div>
</form>

<div id="data">
	<p class="alert alert-warning">No hay datos, por favor selecciona una fecha.</p>
</div>

	</div>
</div>

<script>
	$("#loadlist").submit(function(e){
		e.preventDefault();
		var d = $("#loadlist").serialize();
		$.get("./?action=loadbehavior",d,function(data){
			console.log(data);
			$("#data").html(data);

		});
	});
</script>

<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="all"):
?>

	<div class="row">
	<div class="col-md-12">
		<h1>Secciones</h1>
	<a href="index.php?view=newteam" class="btn btn-default"><i class='fa fa-th-list'></i> Nueva Sección</a>
<br>
<br>
		<?php
		$teams = TeamData::getAll();
		if(count($teams)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>Grado</th>
			<th>Grupo</th>
			<th></th>
			</thead>
			<?php
			foreach($teams as $team){
				?>
				<tr>
				<td><?php echo $team->grade; ?></td>				
				<td><?php echo $team->letter; ?></td>				
			<td style="width:130px;"><a href="index.php?view=editteam&id=<?php echo $team->id;?>" class="btn btn-warning btn-xs">Editar</a> <a href="index.php?action=delteam&id=<?php echo $team->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}
			echo "</table></div></div>";
		}else{
			echo "<p class='alert alert-danger'>No hay secciones</p>";
		}


		?>


	</div>
</div>
<?php endif; ?>