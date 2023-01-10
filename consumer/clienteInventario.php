<?php
//Crear la vista para mostrar en pantalla todos los registros de la tabla categoria

//consumir el API_Restful

$endpoint="http://localhost/api_restful/controllers/inventario.php?op=selectall";

//Convertir el JSON en un objeto de tipo array assoc
$datos=json_decode(file_get_contents($endpoint),true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventario</title>
</head>
<body>
<br>
<center>
<td><a href='productos/nuevoProducto.php'>Insertar Producto</a></td>
<h1>Registros de Inventario</h1>
<hr>

<table border=1>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Pu</th>
<th>Cantidad</th>
<th>Cat_ID</th>
<th>Acciones</th>
</tr>


<?php
for ($i=0; $i<count($datos); $i++)
{

    ?>

<tr>
<td><?php echo $datos[$i]["id"] ?></td>
<td><?php echo $datos[$i]["nombre"] ?></td>
<td><?php echo $datos[$i]["pu"] ?></td>
<td><?php echo $datos[$i]["cantidad"] ?></td>
<td><?php echo $datos[$i]["cat_id"] ?></td>
<td><a href="productos/modiProducto.php?id=<?php echo $datos[$i]['id'] ?>&nombre=<?php echo $datos[$i]['nombre'] ?>&pu=<?php echo $datos[$i]['pu'] ?>&cantidad=<?php echo $datos[$i]['cantidad'] ?>&cat_id=<?php echo $datos[$i]['cat_id'] ?>">Actualizar</a><a href="productos/eliminar.php?id=<?php echo $datos[$i]['id'] ?>">Eliminar</a></td>
</tr>

<?php
}
?>


</table>
<hr>
</center>
<br>
<td><a href='../index.php'>Regresar</a></td>


</body>
</html>


