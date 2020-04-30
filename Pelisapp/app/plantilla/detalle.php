<?php
include_once 'app/config.php';
include_once 'app/modeloPeliDB.php'; 

ob_start();
$auto = $_SERVER['PHP_SELF'];

?>
<center>
<img src="app/img/<?=$imagen?>" height="400px" width="250px" >
<h2> Detalles </h2>
<table>
<tr><td>Nombre   </td><td>   <?= $nombre ?></td></tr>
<tr><td> director </td><td>     <?= $director ?></td></tr>
<tr><td>genero    </td><td>    <?= $genero  ?></td></tr>

</table>
<input type="button" value=" Volver " size="10" onclick="javascript:window.location='index.php'" >
</center>
<?php 


$contenido = ob_get_clean();
include_once "principal.php";

?>
