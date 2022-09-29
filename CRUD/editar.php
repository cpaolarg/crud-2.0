<?php
include("bd.php");
$nombre = '';
$correo = '';
$edad = '';
$curp = '';
$genero = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM datoscrud WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $correo = $row['correo'];
    $edad = $row['edad'];
    $curp = $row['curp'];
    $genero = $row['genero'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $correo = $_POST['correo'];
  $edad = $_POST['edad'];
  $curp = $_POST['curp'];
  $genero = $_POST['genero'];

  $query = "UPDATE datoscrud set nombre = '$nombre', correo = '$correo', edad = '$edad', curp = '$curp', genero = '$genero' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Información de usuario actualizada con éxito.';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" pattern="[a-zA-Z'-'\s]*" class="form-control" required value="<?php echo $nombre; ?>" placeholder="">
        </div>
        <div class="form-group">
          <input name="correo" type="email" class="form-control" required value="<?php echo $correo; ?>" placeholder="">
        </div>
        <div class="form-group">
          <input name="edad" type="number" class="form-control" required value="<?php echo $edad; ?>" placeholder="">
        </div>
        <div class="form-group">
          <input name="curp" type="text" maxlength="18" class="form-control" required pattern="[A-Z0-9]+" value="<?php echo $curp; ?>" placeholder="">
        </div>
        <p>Género</p>
          <input type="radio" name="genero" value="Femenino"<?php echo $genero; ?> required>Femenino</input>
          <input type="radio" name="genero" value="Masculino"<?php echo $genero; ?> required>Masculino</input>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>