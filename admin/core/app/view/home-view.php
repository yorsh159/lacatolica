<section class="content-header">
      <h1>La Católica</h1>
</section>
<section class="content">
<div class="row">
	<div class="col-md-12">

      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(PersonData::getAlumns());?></h3>
              <p>Alumnos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="./?view=alumns" class="small-box-footer">Ir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count(PersonData::getTeachers());?></h3>
              <p>Profesores</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=teachers" class="small-box-footer">Ir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!--<div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo count(TeamData::getAll());?></h3>
              <p>Grupos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="./?view=teams&opt=all" class="small-box-footer">Ir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>-->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!--<div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count(RoomData::getAll());?></h3>
              <p>Salones</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="./?view=rooms&opt=all" class="small-box-footer">Ir <i class="fa fa-arrow-circle-right"></i></a>
          </div>-->
        </div>

        <!-- ./col -->
        <!-- ./col -->
        <!--- - - - - - - - - - - - - - - - - - -->

</div>
</div>
</div>
</section>