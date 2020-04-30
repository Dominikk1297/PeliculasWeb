<?php
include_once 'app/config.php';
include_once 'app/modeloPeliDB.php'; 

ob_start();
?>
<h2> Buscar </h2>
<form name='Buscar' method="POST" action="index.php?orden=Buscar">

 Buscar po Titulo  <input type="text"  name = "nombre" > <br>
 Buscar po Director   <input type="text"  name = "director" > <br>
 Buscar por Genero   <input type="text"  name = "genero" > <br>


<input type="button" value=" Volver " size="10" onclick="javascript:window.location='index.php'" >
<input type="submit" value="Buscar">
</form>
<?php 


$contenido = ob_get_clean();
include_once "principal.php";

?>