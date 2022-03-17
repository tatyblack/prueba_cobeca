<?php 

//print_r($_POST);
if(empty($_POST["enviar"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"] )
|| empty($_POST["txtIdentificacion"]) || empty($_POST["txtEdad"]) || empty($_POST["Casa"] )){
echo "Debe llenar todo el formulario";
header('Location: index.php?mensaje=falta');
exit();

}

include_once "model/conexion.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$identificacion= $_POST['txtIdentificacion'];
$edad = $_POST['txtEdad'];
$casa = $_POST['Casa'];

$consulta = $bd->prepare("INSERT INTO solicitudes(nombre,apellido,identificacion,edad,casa) VALUES(?,?,?,?,?);");
$resultado = $consulta->execute([$nombre,$apellido,$identificacion,$edad,$casa]);

if($resultado === TRUE){
    header('Location: index.php?mensaje=enviado');

} else{
    header('Location: index.php?mensaje=error');
exit();
}

?>