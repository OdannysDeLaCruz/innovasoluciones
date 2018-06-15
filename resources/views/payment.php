<h1>Datos de envio: </h1>
<?php
// VALIDAR LOS DATOS, SI ESTAN BIEN PROCESARLOS, SI NO, QUE LOS DIGITE DE NUEVO
echo "Nombre del titular: " . $_POST['nombre_completo'] . '<br>';
echo "Direccion de envio: " . $_POST['direccion'] . '<br>';
echo "Pais de envio: " . $_POST['pais'] . '<br>';
echo "Ciudad de envio: " . $_POST['ciudad'] . '<br>';
echo "Barrio de envio: " . $_POST['barrio'] . '<br>';
echo "Numero de telefono: " . $_POST['telefono'] . '<br>';

 ?>