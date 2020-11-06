<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] != "OK") {
    header('location: index.php');
}

require_once('librerias/conexionBD.php');
$sql = "select * from usuarios";
$result =  $conn->query($sql);
$usuarios = array();
while ($fila =  $result->fetch_array()) {
    $usuarios[] = $fila;
}
$sql = "select * from roles";
$result =  $conn->query($sql);
$roles = array();
while ($fila =  $result->fetch_array()) {
    $roles[] = $fila;
}
require_once('librerias/cabe.php');
?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Asignar Permisos</h1>        
                <form action="perm-procesa.php" method="post">
                <div class="col-6">
                <div class="form-group">
                    <label for="">Usuario</label>
                    <select name="id_usuario" class="form-control">
                      <option value="">-- Seleccione --</option>
                      <?php foreach ($usuarios as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['usuario'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="">Rol</label>
                    <select name="id_rol" class="form-control">
                      <option value="">-- Seleccione --</option>
                      <?php foreach ($roles as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['descripcion'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </form>                
            </div>
        </div>
      </div>
<?php 
require_once('librerias/pie.php');
 ?>