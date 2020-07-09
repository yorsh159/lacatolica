<?php

$periods = PeriodData::getAllActive();

?>
<div class="row">
	<div class="col-md-12">
	<h1>Inscribir Alumno</h1>
	<br>
  <?php if(count($periods)==0):?>
    <p class="alert alert-danger">No hay un periodo iniciado, debes <a href="./?view=periods&opt=all">ir a periodos</a> y dar click en iniciar periodo.</p>
  <?php endif;?>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?action=addinscription" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Periodo*</label>
    <div class="col-md-6">
    <select name="period_id" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
      <?php foreach($periods as $al):?>
    <option value="<?php echo $al->id;?>"><?php echo $al->name; ?></option>
      <?php endforeach;?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Alumno*</label>
    <div class="col-md-6">
    <select name="alumn_id" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
      <?php foreach(PersonData::getAlumns() as $al):?>
    <option value="<?php echo $al->id;?>"><?php echo $al->code." - ".$al->name." ".$al->lastname; ?></option>
      <?php endforeach;?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Grupo*</label>
    <div class="col-md-6">
    <select name="team_id" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
      <?php foreach(TeamData::getAll() as $al):?>
    <option value="<?php echo $al->id;?>"><?php echo $al->grade." - ".$al->letter; ?></option>
      <?php endforeach;?>
    </select>

        </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Inscribir Alumno</button>
    </div>
  </div>
</form>
	</div>
</div>
