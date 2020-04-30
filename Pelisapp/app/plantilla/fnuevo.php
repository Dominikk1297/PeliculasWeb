<?php

// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
?>
<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>
<form name='ALTA' method="POST" action="index.php?orden=Alta">
codigo_pelicula : <input type="text" name="codigo_pelicula" value="<?= $codigo_pelicula ?>" > <br>
Nombre     : <input type="text" name="nombre" value="<?= $nombre ?>"><br>
director : <input type="text" id="director" name="director" value="<?= $director ?>"><br>
genero : <input type="text"    name="genero" value = "<?= $genero ?>" ><br>
imagen : <input type="text"    name="imagen" value = "<?= $imagen ?>" ><br>

<br>
	<input type="submit" value="Almacenar">
	<input type="button" value="Cancelar" size="10" onclick="javascript:window.location='index.php'" >
</form>
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido
$contenido = ob_get_clean();
include_once "principal.php";

?>