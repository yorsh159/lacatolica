<div class="row">
	<div class="col-md-12">
  <h1>Materiales</h1>
<div class="box box-primary">
     <table class="table table-bordered table-hover">
			<thead>           
            <th>Nombre</th>
            <th>Descargar</th>
           
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
      
    </tr>

    
 <?php 
}echo "</table></div>";


?> 


</div>
</div>
