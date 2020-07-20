<?php
$asignation = AsignationData::getById($_GET["id"]);
$period = PeriodData::getById($asignation->period_id);
$team = TeamData::getById($asignation->team_id);
$alumns = InscriptionData::getAllByTP($asignation->team_id,$asignation->period_id);
$blocks = BlockData::getParentsByAsignationId($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Registrar Calificaciones [<?php echo $asignation->getAsignature()->name; ?>] [<?php echo $team->grade." - ".$team->letter;?>] [<?php echo $period->name;?>]</h1>

<a href="./?view=myasignations&opt=all&id=<?php echo $team->id;?>&period_id=<?php echo $period->id;?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Ir a Asignaturas</a>
<a href="./?view=teamalumns&id=<?php echo $asignation->id;?>&tid=<?php echo $asignation->team_id;?>&pid=<?php echo $asignation->period_id;?>" class="btn btn-default"><i class="fa fa-arrow-up"></i> Ir a Alumnos</a>

<br><br>
	<?php if(count($alumns)>0):?>
<?php endif; ?>
		<?php

		if(count($alumns)>0){
			// si hay usuarios
			?>
<div class="box box-primary">
<div class="box-body">
      <form method="post" action="./?action=saveteamcalifications">
      <input type="hidden" name="asignation_id" value="<?php echo $asignation->id;?>">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Codigo</th>
			<th>Nombre</th>
			<?php foreach($blocks as $b):?>
			<th><?php echo $b->name;?></th>
			<?php endforeach; ?>
			<th>Promedio</th>
			</thead>
			<?php
			foreach($alumns as $alumnx){
				$alumn = $alumnx->getAlumn();
				?>
				<tr>
				<td><?php echo $alumn->code; ?></td>
				<td><?php echo $alumn->name." ".$alumn->lastname; ?></td>

			<?php
			$cnt=0;
			$sum=0;
			foreach($blocks as $b){
			$subs = BlockData::getAllByBlockId($b->id);

				?>

        <td>
        <?php
        $pp=0;
        $cc=0;
        foreach($subs as $sb):?>
        <?php
          $exist = CalificationData::getExist($alumn->id,$sb->id);
          if($exist!=null){ $cnt++; $sum+=$exist->val; $cc++;$pp+=$exist->val; } 

        ?>
		
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><?php echo $sb->name; ?></span>
        <input type="text" class="form-control" name="val-<?php echo $alumn->id; ?>-<?php echo $sb->id; ?>" value="<?php if($exist!=null){ echo $exist->val;}?>" placeholder="<?php echo $sb->name; ?>">
        </div>
    <?php endforeach; ?>
<?php if(count($subs)>0):?>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Promedio</span>
        <input type="text" class="form-control" readonly value="<?php if($pp>0&&$cc>0){ echo $pp/$cc;}?>" placeholder="Promedio">
        </div>
<?php endif; ?>
        </td>

        <?php } ?>
        <td><?php if($cnt>0&&$sum>0){ echo ($sum/$cnt);}else{ echo 0;}?></td>


				</tr>
				<?php

			}

echo "</table>";?>
<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
<?php
echo "</form></div></div>";

		}else{
			echo "<p class='alert alert-danger'>No hay Alumnos</p>";
		}


		?>


	</div>
</div>