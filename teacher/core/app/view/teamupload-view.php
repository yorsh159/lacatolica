<div class="row">
	<div class="col-md-12">
		<h1>Cargar Archivo</h1>


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
            <th>Curso</th>
            <th>Opción</th>
			</thead>
			<?php
			    foreach($teams as $team){
                $asig = $team->getAsignature();
                $teacher = $team->getTeacher();
				$t = $team->getTeam();
            ?>
				<tr>
             <td style="width:150px;">
                <?php echo $t->grade." - ".$t->letter;?>
            </td>
         
			<td><?php echo $asig->name; ?></td>				

           	<td style="width:260px;">
               
            <a href="./?view=upload" class="btn btn-default btn-xs"><i class="fa fa-th-large"></i> Cargar Archivo</a>  
            
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
