<?php

include('bd.php');

if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre'];
  $correo= $_POST['correo'];
  $edad= $_POST['edad'];
  $curp= $_POST['curp'];
  $genero= $_POST['genero'];
  $query = "INSERT INTO datoscrud(nombre, correo, edad, curp, genero) VALUES ('$nombre', '$correo', '$edad', '$curp', '$genero')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Información guardada con éxito");
  }

  $_SESSION['message'] = 'El usuario se ha registrado con éxito';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
