
<div class="row">
	<div class="col-md-12">
      <h1>Subir Archivo</h1>
      <br>
      
      <div class="box box-primary">
        <div class="box-body">      
        <form action='index.php?action=upload' method="POST" enctype="multipart/form-data">

        <input type= "file" name="archivo" />
        <br>
        <button type="submit" value="Enviar" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
      </form>
      </div>
        </div>



<!-- Visualización del nombre de los  archivos !-->

     <div class="box box-primary">
     <table class="table table-bordered table-hover">
			<thead>           
            <th>Nombre</th>
            <th>Descargar</th>
            <th>Eliminar</th>
			</thead>

<?php
  $archivos = scandir("files");
  $num = 0;
  for ($i=2; $i<count($archivos); $i++)
  {$num++;
?>

    <tr>      
      <td><?php echo $archivos[$i]; ?></td>
      <td><a title="Descargar Archivo" href="files/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt"></span> </a></td>
      <td><a title="Eliminar Archivo" href="index.php?action=delete&name=files/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td>
    </tr>

    
 <?php 
}echo "</table></div>";


?> 


</div>
</div>
        
 

  