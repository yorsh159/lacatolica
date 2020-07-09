<?php
$inscription = InscriptionData::getById($_GET["id"]);
//print_r($inscription);
$alumn = PersonData::getById($inscription->alumn_id);
$asignations = AsignationData::getAllByTP($inscription->team_id,$inscription->period_id);

?>
<div class="row">
	<div class="col-md-12">
		<h1><?php echo $alumn->name." ".$alumn->lastname; ?></h1>
		<h3>Informacion</h3>
<a href="./?view=alumnhistory&id=<?php echo $alumn->id; ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>

<br><br>
		<?php

		if(count($asignations)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>Asignatura</th>
			<th>Promedio</th>
			<th></th>
			</thead>
			<?php
			foreach($asignations as $asig){
				?>
				<tr>
				<td><?php echo $asig->getAsignature()->name; ?></td>
<td>
	<?php
$total=0;
$c=0;
$blocks = BlockData::getAllByAsignationId($asig->id);
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
				<td style="width:30px;"></td>
				</tr>
				<?php
			}
echo "</table></div></div>";

		}else{
			echo "<p class='alert alert-danger'>No hay Inscripciones</p>";
		}
		?>


	</div>
</div>