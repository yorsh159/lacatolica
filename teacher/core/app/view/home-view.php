<?php
    $teams = AsignationData::getActiveByTeacherId($_SESSION["teacher_id"]);
    $nalumns= 0;
    foreach($teams as $tx){
      $alumns = InscriptionData::getAllByTP($tx->team_id,$tx->period_id);
      $nalumns+=count($alumns);
    }

?>
<section class="content-header">
      <h1>La Católica<small></small></h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="row"> 

        <div class="col-lg-3 col-xs-6"></div>
            <div class="col-lg-3 col-xs-6"></div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                  <div class="small-box bg-blue">
                 <div class="inner">
                  <h3><?php echo count($teams);?></h3>
                  <p>Cursos</p>
                 </div>
                  <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $nalumns;?></h3>
              <p>Alumnos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>

        <!-- ./col -->
        <!-- ./col -->
        <!--- - - - - - - - - - - - - - - - - - -->



        
  </div>
  
</section>


