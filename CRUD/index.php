<?php include("bd.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-10">
      <!-- Mensajes -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- Formulario -->
      <div class="container p-4">
      <div class="card card-body">
        <form action="guardar.php" method="POST">
        <div class="form-group">
            <input type="text" pattern="[a-zA-Z'-'\s]*" name="nombre" required class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="email" name="correo" required class="form-control" placeholder="Correo" autofocus>
          </div>
          <div class="form-group">
            <input type="number" name="edad" required class="form-control" placeholder="Edad" autofocus> 
          </div>
          <div class="form-group">
            <input type="text" maxlength="18" name="curp" required pattern="[A-Z0-9]+" class="form-control" placeholder="CURP" autofocus>
          </div>
           <p>Género</p>
          <input type="radio" name="genero" value="Femenino" required>Femenino</input> &nbsp;&nbsp;&nbsp;
          <input type="radio" name="genero" value="Masculino" required>Masculino</input>
          <div class="p-2">
          <input type="submit" name="guardar" class="btn btn-primary btn-block" style="background-color:#081AA7" value="CREAR USUARIO">
        </form>
        </div>
      </div>
    </div>
    <!-- Tabla de datos -->
    <div class="form-group">
    <div class="col-md-12">
    <table class="table primary">
      <thead class="thead-primary" style="background-color:#081AA7">
          <tr class="text-white">
          <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Edad</th>
            <th>CURP</th>
            <th>Género</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM datoscrud";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['curp']; ?></td>
            <td><?php echo $row['genero']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  
</main>

<?php include('includes/footer.php'); ?>
