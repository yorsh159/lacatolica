<?php

//$levels =LevelData::getAll();

?>

<div class="row">
  <div class="col-md-12">
    <h1>Mensaje</h1>

  <div class="panel panel-default">
            
            <div class="panel-body">
                <form role="form" id="status" enctype="multipart/form-data" method="post" action="./?action=sendmsg">
            <div class="form-group">
                <textarea rows="2" name="content" id="statusarea" class="form-control" placeholder="Escribir mensaje..."></textarea>
                    <input type="hidden" name="receptor_type_id" value="1">
                    <input type="hidden" name="receptor_ref_id" value="2">
            </div>

<div class="buttons">
  <div class="col-md-8">
    <button type="submit" id="publish" class="btn btn-primary">Enviar</button>
  </div>

  </div>
  </div>
  
</form>
    </div>
    </div>
    </div>
  