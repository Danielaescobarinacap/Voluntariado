<?php
// Incluir la conexión
include 'conexion.php';

// Verificar si el usuario está logueado (esto es un ejemplo básico)

$organizacion_id = $_SESSION['id']; // Asumiendo que el ID del usuario está guardado en la sesión

// Consulta para obtener los datos del perfil

$query = "SELECT * FROM trabajos WHERE id_organizacion = ?;";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $organizacion_id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se obtuvieron datos
if ($result->num_rows > 0) {
    while ($usuario = $result->fetch_assoc()) {
        // Obtener los datos del usuario
        
        echo '<tr>';
        echo '<td>' . htmlspecialchars($usuario['titulo']) . '</td>';
        echo '<td>' . htmlspecialchars($usuario['descripcion']) . '</td>';
        echo '<td>' . htmlspecialchars($usuario['horario']) . '</td>';
        echo '<td>' . htmlspecialchars($usuario['dias']) . '</td>';
        echo '<td>' . htmlspecialchars($usuario['ubicacion']) . '</td>';
        echo '<td>' . htmlspecialchars($usuario['estado']) . '</td>';
        // Botón de Editar
        echo '<td><a href="../templates/editar_trabajo.php?id=' . $usuario['id'] . '" class="editar2-button">Editar</a></td>';
        // Botón de Eliminar
        echo '<td><a href="../php/eliminar_trabajo.php?id=' . $usuario['id'] . '" class="eliminar-button" onclick="return confirm(\'¿Estás seguro de eliminar este trabajo?\')">Eliminar</a></td>';
        echo '</tr>';
    }
} else {
    echo "No se encontraron datos.";
}
?>