<?php if(isset($_GET["opt"]) && $_GET["opt"]=="all"):
$asignation = AsignationData::getById($_GET["id"]);
$blocks = BlockData::getAllbyAsignationId($asignation->id);

?>
<div class="row">
	<div class="col-md-12">
		<h1>Actividad</h1>
		<h4>Grupo: <?php echo $asignation->getTeam()->grade." - ".$asignation->getTeam()->letter;?></h4>



<!-- Button trigger modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
 <i class='fa fa-plus'></i> Actividad
</button>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">
 <i class='fa fa-plus'></i> Sub actividad
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-plus'></i> Agregar Actividad</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?action=blocks&opt=add" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-12">
    <input type="text" name="name" class="form-control" placeholder="Nombre">
    </div>
  </div>



<input type="hidden" name="asignation_id" value="<?php echo $asignation->id;?>">

  <div class="form-group">
    <div class="col-lg-10">
      <button type="submit" class="btn btn-primary"> <i class='fa fa-plus'></i> Agregar Actividad</button>
    </div>
  </div>
</form>

      </div>

    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-plus'></i> Agregar Sub Actividad</h4>
      </div>
      <div class="modal-body">
    <form class="form-horizontal" method="post" id="addcategory" action="index.php?action=blocks&opt=addsub" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Actividad*</label>
    <div class="col-md-12">
    <select name="block_id" class="form-control" required>
      <option value="">-- SELECCIONE --</option>
      <?php foreach($blocks as $b):
if($b->block_id==null):
      ?>
      <option value="<?php echo $b->id; ?>"> <?php echo $b->name; ?></option>
      <?php endif; endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-12">
    <input type="text" name="name" class="form-control" placeholder="Nombre">
    </div>
  </div>

<input type="hidden" name="asignation_id" value="<?php echo $asignation->id;?>">

  <div class="form-group">
    <div class="col-lg-10">
      <button type="submit" class="btn btn-primary"> <i class='fa fa-plus'></i> Agregar Sub Actividad</button>
    </div>
  </div>
</form>

      </div>

    </div>
  </div>
</div>


<br><br>
		<?php

		if(count($blocks)>0){
			// si hay usuarios
			?>
      <div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
      <th></th>
			<th>Nombre</th>
      <th>Padre</th>
			<th></th>
			</thead>
			<?php
			foreach($blocks as $team){
				?>
				<tr>
        <td style="width:30px;">

<!-- Button trigger modal -->
        </td>
				<td><?php echo $team->name; ?></td>				
        <td><?php
        if($team->block_id!=null){ 
        $bp  = BlockData::getById($team->block_id);
        echo $bp->name; 
      }
        ?></td> 
				<td style="width:130px;">


<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#addschedule<?php echo $team->id;?>">
 <i class='fa fa-pencil'></i>
</button>

<!-- Modal -->
<div class="modal fade" id="addschedule<?php echo $team->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-plus'></i> Actualizar Actividad</h4>
      </div>
      <div class="modal-body">
    <form class="form-horizontal" method="post" id="addcategory" action="index.php?action=blocks&opt=upd" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-12">
    <input type="text" name="name" class="form-control" value="<?php echo $team->name;?>" placeholder="Nombre">
    </div>
  </div>

<input type="hidden" name="asignation_id" value="<?php echo $asignation->id;?>">
<input type="hidden" name="block_id" value="<?php echo $team->id;?>">

  <div class="form-group">
    <div class="col-lg-10 col-md-offset-2">
      <button type="submit" class="btn btn-primary"> <i class='fa fa-plus'></i> Actualizar Actividad</button>
    </div>
  </div>
</form>

      </div>

    </div>
  </div>
</div>


        <a href="index.php?action=blocks&opt=del&id=<?php echo $team->id;?>&asignation_id=<?php echo $asignation->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php
			}?>
			</table></div>
      <?php
		}else{
			echo "<p class='alert alert-danger'>No hay actividades resgistradas</p>";
		}
		?>
	</div>
</div>

<?php endif; ?>