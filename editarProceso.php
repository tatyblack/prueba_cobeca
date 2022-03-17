<?php 



if(!isset($_POST['id'])){

    header('location: index.php?mensaje=error');
}

include 'model/conexion.php';
$codigo = $_POST['id'];
$nombre= $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$identificacion = $_POST['txtIdentificacion'];
$edad = $_POST['txtEdad'];
$casa = $_POST['Casa'];

$consulta = $bd->prepare("UPDATE solicitudes SET nombre = ?,apellido = ?,identificacion = ?,edad = ?,Casa = ? where id = ?;");
$resultado = $consulta->execute([$nombre,$apellido,$identificacion,$edad,$casa,$codigo,]);

  if ($resultado === true){

    header('location: index.php?mensaje=actualizado');
  }else{
    header('location: index.php?mensaje=error');
  exit();
}

?>
