<?php
// Incluye el archivo de conexión a la base de datos
include('db.php');

// Verifica si los datos del formulario se enviaron correctamente
if (isset($_POST['nombre'], $_POST['password'], $_POST['correo'])) {
    // Obtén los datos del formulario
    $NOMBRE= mysqli_real_escape_string($conexion, $_POST['nombre']);
    $PASSWORD = mysqli_real_escape_string($conexion, $_POST['password']);
    $CORREO = mysqli_real_escape_string($conexion, $_POST['correo']);

    // Verifica si los campos están vacíos
    if (empty($NOMBRE) || empty($PASSWORD) || empty($CORREO)) {
        echo "Por favor, ingresa todos los datos.";
    } else {
        // Crea una consulta SQL para insertar los datos
        $insertar = "INSERT INTO registrarse (nombre, password, correo) VALUES (?, ?, ?)";

        // Prepara la consulta
        $stmt = mysqli_prepare($conexion, $insertar);

        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt, "sss", $NOMBRE, $PASSWORD, $CORREO);

        // Ejecuta la consulta SQL
        $resultado = mysqli_stmt_execute($stmt);

        // Verifica si la inserción fue exitosa
        if ($resultado) {
            echo "¡Se insertaron los datos correctamente!";
            header("Location: welcome.html");
        } else {
            echo "Error al insertar los datos: " . mysqli_error($conexion);
        }

        // Cierra la consulta preparada
        mysqli_stmt_close($stmt);
    }
} else {
    // Los datos del formulario no se enviaron correctamente
    include("index2.html");
    
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>




