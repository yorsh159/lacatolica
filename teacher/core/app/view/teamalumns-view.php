<?php
$asignation = AsignationData::getById($_GET["id"]);
$team = TeamData::getById($asignation->team_id);
$alumns = InscriptionData::getAllByTP($asignation->team_id,$asignation->period_id);
$blocks = BlockData::getAllByAsignationId($_GET["id"]);
$block_parents = BlockData::getParentsByAsignationId($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Alumnos [ <?php echo $team->grade." - ".$team->letter;?>]</h1>



 <!--<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Calificaciones <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <li>		<a href="./?view=teamcalifications&id=<?php echo $asignation->id; ?>">Modificar calificaciones</a>
	</li>
  <li><a href="../report/califications-word.php?id=<?php echo $asignation->id; ?>">Descargar Todo</a></li>
  <?php foreach($block_parents as $bp):?>
    <li><a href="../report/calificationsbyblock-word.php?id=<?php echo $asignation->id; ?>&bid=<?php echo $bp->id; ?>" > Descargar <?php echo $bp->name; ?></a></li>
	<?php endforeach; ?>
  </ul>
 </div>-->
		<a href="./?view=teams&opt=assistance&asignation_id=<?php echo $asignation->id; ?>" class="btn btn-default">Tomar Asistencia</a>

		<!--<a href="./?view=teams&opt=behavior&asignation_id=<?php echo $asignation->id; ?>" class="btn btn-default">Modificar Conducta</a>-->

		<a href="./?view=teams&opt=assistancereport&asignation_id=<?php echo $asignation->id; ?>" class="btn btn-default">Reporte de Asistencia</a>


	<!--<a class="btn btn-default" href="./?action=report-cal&id=<?php echo $_GET["id"];?>">Descargar</a>-->
		<br><br>
	<?php if(count($alumns)>0):?>
<?php endif; ?>
		<?php

		if(count($alumns)>0){
			// si hay usuarios
			?>
<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Promedio</th>
			<th>Estado</th>
			<th></th>
			</thead>
			<?php
			foreach($alumns as $alumnx){
				$alumn = $alumnx->getAlumn();
				$cnt=0;$sum=0;
				?>
				<tr>
				<td><?php echo $alumn->code; ?></td>
				<td><?php echo $alumn->name." ".$alumn->lastname; ?></td>
<td>
	<?php
$total=0;
$c=0;
$blocks = BlockData::getAllByAsignationId($asignation->id);
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
      
?>
</td>
			<td>
				<?php if($c>0&&$total>0){ 
					if(($total/$c)>10.5){ echo "<span class='label label-success'>Aprobado</span>"; }
					else{
						echo "<span class='label label-danger'>Reprobado</span>";
					}

				}else{ echo "<span class='label label-danger'>Reprobado</span>";}?>
			</td>
				<td style="width:160px;">
				
				<!--<a href="index.php?view=califications&alumn_id=<?php echo $alumn->id;?>&asignation_id=<?php echo $_GET["id"];?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Modificar Calificaciones</a>-->
				</tr>
				<?php

			}

echo "</table></div>";

		}else{
			echo "<p class='alert alert-danger'>No hay Alumnos</p>";
		}


		?>


	</div>
</div>