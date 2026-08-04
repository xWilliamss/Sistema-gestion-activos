<?php
// inicia o reanuda la sesión del usuario.
session_start();
require_once __DIR__ . '/../../config/auth.php';
require_login();

/*Verifica si el usuario esta logueado.
Si no existe la sesión, lo mandara automaticamente al login.php*/
// Con este REQUIRE cargamos la liberia Dompdf.
//USE importa el espacio de nombres necesario para usar la clase.
require '../../dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

include("../../config/conexion.php");

$dompdf = new Dompdf();

$html = '

<h1 style="text-align:center;">
Reporte de Inventario
</h1>

<table border="1" width="100%" cellspacing="0" cellpadding="5">

<thead>

<tr style="background:#343a40; color:white;">

<th>ID</th>
<th>Código</th>
<th>Serie</th>
<th>Modelo</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

';

/*Consulta a la base de datos.
le decimos que busque todos los equipos que no han sido dados de baja.*/
$sql = "SELECT * FROM activos
WHERE estado != 'baja'";

$resultado = $conexion->query($sql);

/* Recorre cada registro encrontado y añada una fila ala tabla. */
while($fila = $resultado->fetch_assoc()){

$html .= '

<tr>

<td>'.$fila['id'].'</td>

<td>'.app_escape($fila['codigo']).'</td>

<td>'.app_escape($fila['serie']).'</td>

<td>'.app_escape($fila['modelo']).'</td>

<td>'.app_escape($fila['estado']).'</td>

</tr>

';

}

$html .= '

</tbody>
</table>

';
// Generador de PDF

// $dompdf->loadHtml($html): Carga todo el texto y la tabla generada.
// $dompdf->setPaper('A4', 'landscape'): Configura la hoja en tamaño A4 y orientación horizontal.
// $dompdf->render(): Procesa el HTML y lo convierte internamente en PDF.
// $dompdf->stream(...): Envía el archivo al navegador. 
// El parámetro "Attachment" => false hace que el PDF se abra en una pestaña nueva en lugar de forzar la descarga inmediata.*/
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("inventario.pdf", array("Attachment" => false));

?>
