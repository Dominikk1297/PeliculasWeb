<?php
include_once 'app/config.php';
include_once 'app/modeloPeliDB.php'; 

ob_start();
$auto = $_SERVER['PHP_SELF'];

?>
<h2> Detalles </h2>
<table>
<tr><td>codigo_pelicula   </td><td> <?= $clave ?></td></tr>
<tr><td>Nombre   </td><td>   <?= $nombre ?></td></tr>
<tr><td> director </td><td>     <?= $director ?></td></tr>
<tr><td>genero    </td><td>    <?= $genero  ?></td></tr>
<tr><td>img  </td><td> <img src="app/img/<?=$imagen?>" height="50px" width="50px" >  </td></tr>
<iframe width="400" height="400" src="http://templatemonster.com/" frameborder="0"> </iframe>
</table>
<input type="button" value=" Volver " size="10" onclick="javascript:window.location='index.php'" >
<?php 


$contenido = ob_get_clean();
include_once "principal.php";

?>