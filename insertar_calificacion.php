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
