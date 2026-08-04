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
Reporte de Asignaciones
</h2>

<table border="1" width="100%" cellspacing="0" cellpadding="5">

<thead>

<tr style="background:#343a40;color:white;">

<th>Activo</th>
<th>Usuario</th>
<th>Fecha Asignación</th>
<th>Fecha Devolución</th>
<th>Estado</th>
<th>Observación</th>

</tr>

</thead>

<tbody>

';

$sql = "

SELECT

a.codigo,
u.nombre,
u.apellido,
asg.fecha_asignacion,
asg.fecha_devolucion,
asg.estado,
asg.observacion

FROM asignaciones asg

INNER JOIN activos a
ON asg.activo_id = a.id

INNER JOIN usuarios u
ON asg.usuario_id = u.id

ORDER BY asg.fecha_asignacion DESC

";

$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_assoc()){

    $html .= '

    <tr>

        <td>'.app_escape($fila['codigo']).'</td>

        <td>'.app_escape($fila['nombre']).' '.app_escape($fila['apellido']).'</td>

        <td>'.app_escape($fila['fecha_asignacion']).'</td>

        <td>'.app_escape($fila['fecha_devolucion']).'</td>

        <td>'.app_escape($fila['estado']).'</td>

        <td>'.app_escape($fila['observacion']).'</td>

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

$dompdf->stream("reporte_asignaciones.pdf", array("Attachment" => false));

?>
