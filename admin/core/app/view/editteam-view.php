<?php 
$team = TeamData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Grupo</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?action=updateteam" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Grado*</label>
    <div class="col-md-6">
      <input type="text" name="grade" required value="<?php echo $team->grade; ?>" class="form-control" id="grade" placeholder="Grado">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Grupo*</label>
    <div class="col-md-6">
      <input type="text" name="letter" required value="<?php echo $team->letter; ?>" class="form-control" id="letter" placeholder="Grupo">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="team_id" value="<?php echo $team->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Grupo</button>
    </div>
  </div>
</form>
	</div>
</div>