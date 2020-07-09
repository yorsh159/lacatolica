<?php
$asignation = AsignationData::getById($_GET["id"]);
$period = PeriodData::getById($asignation->period_id);
$team = TeamData::getById($asignation->team_id);
$alumns = InscriptionData::getAllByTP($team->id,$period->id);
$blocks = BlockData::getParentsByAsignationId($_GET["id"]);
?>
<div class="row">
  <div class="col-md-12">
    <h1><?php echo $asignation->getAsignature()->name; ?> <small>Calificaciones</small></h1>
    <h4>Grupo: <?php echo $team->grade." - ".$team->letter;?></h4>
    <h4>Periodo: <?php echo $period->name;?></h4>
        <a href="./?view=teamasignatures&opt=all&id=<?php echo $team->id;?>&period_id=<?php echo $period->id;?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
   <a href="../report/califications-word.php?id=<?php echo $asignation->id; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar Todo</a>
<?php foreach($blocks as $b):?>
<a href="../report/calificationsbyblock-word.php?id=<?php echo $asignation->id; ?>&bid=<?php echo $b->id; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar <?php echo $b->name; ?></a>
<?php endforeach;?>
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
      <?php if(count($blocks)>0):?>
      <?php foreach($blocks as $b):?>
      <th><?php echo $b->name;?></th>
      <?php endforeach; ?>
      <th>Promedio</th>
    <?php endif;?>
      </thead>
      <?php
      foreach($alumns as $alumnx){
        $alumn = $alumnx->getAlumn();
        ?>
        <tr>
        <td><?php echo $alumn->code; ?></td>
        <td><?php echo $alumn->name." ".$alumn->lastname; ?></td>
      <?php if(count($blocks)>0):?>
      <?php 
      $total=0;
      $promedio = 0;
      $c=0;
      foreach($blocks as $b):
      $subs = BlockData::getAllByBlockId($b->id);

      ?>
      <td>
        <?php 
        $sm=0;
        foreach($subs as $s){
        $exist = CalificationData::getExist($alumn->id,$s->id);
        if($exist!=null){ $exist->val; $sm+=$exist->val; $total+=$exist->val; $c++; }
        }
        echo $sm/count($subs);
        ?>
      </td>
      <?php endforeach; ?>
      <td><?php if($c>0){ echo $total/$c;}?></td>
    <?php endif;?>
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