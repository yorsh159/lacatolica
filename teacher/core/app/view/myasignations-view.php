<?php if(isset($_GET["opt"]) && $_GET["opt"]=="all"):

?>
<div class="row">
	<div class="col-md-12">
		<h1>Cursos</h1>


<br><br>
		<?php

		$teams = AsignationData::getActiveByTeacherId($_SESSION["teacher_id"]);

		if(count($teams)>0){
			// si hay usuarios
			?>
      <div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
      <th>Sección</th>
      <th>N. Alumnos</th>
			<th>Curso</th>
<!--      <th>Profesor</th> -->
      <th>Horario</th>
			<th></th>
			</thead>
			<?php
			foreach($teams as $team){
        $asig = $team->getAsignature();
        $teacher = $team->getTeacher();
				$t = $team->getTeam();
        ?>
				<tr>
        <td style="width:30px;">
          <?php echo $t->grade." - ".$t->letter;?>
        </td>
        <td>
          <?php echo count(InscriptionData::getAllByTP($t->id,$team->period_id));?>
        </td>   
				<td><?php echo $asig->name; ?></td>				

        <td style="padding:0;">
<?php
$schedule = ScheduleData::getAllByAsignationId($team->id);
?>
<?php if(count($schedule)>0):?>
<table class="table table-bordered">
<thead>
  <th>Salon</th>
  <th>Dia</th>
  <th>Inicio</th>
  <th>Fin</th>
</thead>
  <?php foreach($schedule as $s):?>
  <tr>
  <td><?php echo $s->getRoom()->name;?></td>
  <td><?php
switch ($s->d) {
  case 'mo': echo "Lunes"; break;
  case 'tu': echo "Martes"; break;
  case 'we': echo "Miercoles"; break;
  case 'th': echo "Jueves"; break;
  case 'fr': echo "Viernes"; break;
  case 'sa': echo "Sabado"; break;
  case 'su': echo "Domingo"; break;
  
  default:
    # code...
    break;
}
  ?></td>
  <td><?php echo $s->time_start;?></td>
  <td><?php echo $s->time_end;?></td>
  </tr>
  <?php endforeach;?>
</table>


  <?php endif;?>
        </td>   
				<td style="width:260px;">
            <a href="./?view=teamalumns&id=<?php echo $team->id;?>&tid=<?php echo $team->team_id;?>&pid=<?php echo $team->period_id;?>" class="btn btn-default btn-xs"><i class="fa fa-th-list"></i> Alumnos</a>    
            <!--<a href="./?view=teamcalifications&id=<?php echo $team->id;?>&tid=<?php echo $team->team_id;?>&pid=<?php echo $team->period_id;?>" class="btn btn-default btn-xs"><i class="fa fa-th-list"></i> Calificaciones</a> -->  
               
            <!--<a href="./?view=blocks&opt=all&id=<?php echo $team->id;?>" class="btn btn-default btn-xs"><i class="fa fa-th-large"></i> Actividades</a>-->    
            <!--<a href="./?action=asignations&opt=finish&id=<?php echo $team->id;?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Finalizar</a>-->    

        </td>
				</tr>
				<?php
			}
			echo "</table></div>";
		}else{
			echo "<p class='alert alert-danger'>No hay Asignaturas</p>";
		}
		?>
	</div>
</div>
<?php endif; ?>