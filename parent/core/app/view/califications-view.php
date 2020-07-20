<?php
$asignation = AsignationData::getById($_GET["id"]);
//$period = PeriodData::getById($asignation->period_id);
$team = TeamData::getById($asignation->team_id);
$alumns = InscriptionData::getAllByAlumnId($_GET["alumn_id"]);
$blocks = BlockData::getParentsByAsignationId($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Reporte de Calificaciones</h1>

<br><br>
	<?php if(count($alumns)>0):?>
<?php endif; ?>
		<?php

		if(count($alumns)>0){
			// si hay usuarios
			?>
<div class="box box-primary">
<div class="box-body">
      
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
        <input type="text" readonly="readonly" class="form-control" name="val-<?php echo $alumn->id; ?>-<?php echo $sb->id; ?>" value="<?php if($exist!=null){ echo $exist->val;}?>" placeholder="<?php echo $sb->name; ?>">
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

<?php
echo "</form></div></div>";

		}else{
			echo "<p class='alert alert-danger'>No hay Alumnos</p>";
		}


		?>


	</div>
</div>