<?php


if(!isset($_GET['id'])){
    header('location: index.php?mensaje=error');
exit();
}

include 'model/conexion.php';
$codigo = $_GET['id'];

$consulta = $bd->prepare("DELETE FROM solicitudes where id = ?;");
$resultado = $consulta->execute([$codigo]);


if ($resultado === true){

    header('location: index.php?mensaje=eliminado');
  }else{
    header('location: index.php?mensaje=error');
  exit();
}


?>
