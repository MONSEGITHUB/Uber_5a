<?php
require_once '../Controladores/ControladorDeUsuario.php';

$controller = new PersonaController();

try {
    $personas = $controller->obtenerTodasLasPersonas();
} catch (Exception $e) {
    echo "Error al cargar personas: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro De Datos</title>
    <link rel="stylesheet" href="../css/Style.css?v=1.0">
</head>
<body>
    <div class="contenedor">
        <h1>Historial de datos de usuarios registrado</h1>

        <a class="btn-crear" href="AñadirDatos.php">Registrar Nueva Persona</a>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Estado Civil</th>
                    <th>Sexo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($personas as $fila) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($fila['direccion']); ?></td>
                    <td><?php echo htmlspecialchars($fila['estado_civil']); ?></td>
                    <td><?php echo htmlspecialchars($fila['sexo']); ?></td>
                    <td><?php echo htmlspecialchars($fila['telefono']); ?></td>
                    <td class="acciones">
                        <a class="btn-editar" href="ModificarDatos.php?id=<?php echo $fila['id_persona']; ?>">Editar</a>
                        <a class="btn-eliminar" href="DeleteDatos.php?id=<?php echo $fila['id_persona']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta persona?');">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
