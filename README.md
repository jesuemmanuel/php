//registros de calficaciones


(CONEXION.PHP)
<?php
$servername = "id22199860_dianap";
$username = "id22199860_diana";
$password = "Hector123@";
$dbname = "school";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

(INDEX.PHP)
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Calificaciones</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestión de Calificaciones</h1>
    <form action="insertar_calificacion.php" method="post">
        <label for="name">Nombre del Alumno:</label>
        <input type="text" id="name" name="name" required>
        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" required>
        <label for="subject">Asignatura:</label>
        <input type="text" id="subject" name="subject" required>
        <label for="grade">Calificación:</label>
        <input type="number" step="0.01" id="grade" name="grade" required>
        <input type="submit" value="Insertar">
    </form>
</body>
</html>

(INSERTAR_CALIFICACION)
<?php
require 'conexion.php';

$name = $_POST['name'];
$age = $_POST['age'];
$subject = $_POST['subject'];
$grade = $_POST['grade'];

// Insertar datos del alumno
$sql = "INSERT INTO students (name, age) VALUES ('$name', $age)";
if ($conn->query($sql) === TRUE) {
    $student_id = $conn->insert_id;

    // Insertar calificación
    $sql = "INSERT INTO grades (student_id, subject, grade) VALUES ($student_id, '$subject', $grade)";
    if ($conn->query($sql) === TRUE) {
        echo "Nueva calificación insertada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
