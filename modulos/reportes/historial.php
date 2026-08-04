<?php

session_start();
require_once __DIR__ . '/../../config/auth.php';
require_login();

require '../../dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

include("../../config/conexion.php");

$dompdf = new Dompdf();

$html = '

<h2 style="text-align:center;">
Reporte de Historial de Activos
</h2>

<table border="1" width="100%" cellspacing="0" cellpadding="5">

<thead>

<tr style="background:#343a40;color:white;">

<th>ID</th>
<th>Activo</th>
<th>Acción</th>
<th>Descripción</th>
<th>Fecha</th>

</tr>

</thead>

<tbody>

';

$sql = "

SELECT

h.id,
a.codigo,
h.accion,
h.descripcion,
h.fecha

FROM historial_activos h

INNER JOIN activos a
ON h.activo_id = a.id

ORDER BY h.fecha DESC

";

$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_assoc()){

    $html .= '

    <tr>

        <td>'.$fila['id'].'</td>

        <td>'.app_escape($fila['codigo']).'</td>

        <td>'.app_escape($fila['accion']).'</td>

        <td>'.app_escape($fila['descripcion']).'</td>

        <td>'.app_escape($fila['fecha']).'</td>

    </tr>

    ';
}

$html .= '

</tbody>

</table>

';

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("reporte_historial.pdf", array("Attachment" => false));

?>
