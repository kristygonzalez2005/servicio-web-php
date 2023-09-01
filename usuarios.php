<?php
//se pone la base de datos 
include('db.php');
//en la linea 5 y 6 se han colocado las variables 
$USUARIO=$_POST['usuario'];
$PASSWORD=$_POST['password'];

//cramos una variable la cual contiene el nombre de laidentidad y sus atributos
$consulta = "SELECT*FROM Personal WHERE Usuario ='$USUARIO' and password='$PASSWORD'";
$resultado=mysqli_query($conexion,$consulta );
//filas puede ser el id
$filas=mysqli_num_rows($resultado);
//resultado de la conecxion
if($filas){
    header("location:home.html");
}else{
  include("index.html");
  ?>
  <h1>Error de autenticicacón</h1>
  <?php

}


//se cierra la conexion base de datos
mysqli_free_result($resultado);
mysqli_close($conexion);
?>