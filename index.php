<?php include 'template/header.php'?>

<?php 

include_once "model/conexion.php";
$consulta = $bd -> query("select * from solicitudes");
$estudiante = $consulta->fetchAll(PDO::FETCH_OBJ);


?>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-7">
           
        <!--Inicio alerta -->
       <?php 
       if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
       
       ?>
       
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Faltan datos 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           
<?php 
       }
?>
       
       
       
       
       <?php 
       if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'enviado'){
       
       ?>
       
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Enviado!</strong> Solicitud enviada correctamente
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           
<?php 
       }
?>
       
       
       
       <?php 
       if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
       
       ?>
       
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Vuelva a intentarlo
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           
<?php 
       }
?>



<?php 
       if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado'){
       
       ?>
       
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Actualizado!</strong> Se han actualizados los registros
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           
<?php 
       }
?>


<?php 
       if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
       
       ?>
       
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Eliminado!</strong> Se ha eliminado el registro seleccionado
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           
<?php 
       }
?>



       
       <!--Fin alerta -->

       
       
       




         
       
         <div class="card">
                <div class="card-header">
                   <h4> Solicitudes Enviadas</h4>
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Identificacion</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Casa de Estudio</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                             <?php 
                             foreach($estudiante as $datos){
                           
                           
                           ?>
                            <tr>
                                <td scope="row"> <?php echo $datos->id; ?> </td>
                                <td> <?php echo $datos->nombre; ?> </td>
                                <td> <?php echo $datos->apellido; ?> </td>
                                <td> <?php echo $datos->identificacion; ?> </td>
                                <td> <?php echo $datos->edad; ?> </td>
                                <td> <?php echo $datos->casa; ?> </td>
                                <td><a  class="text-success" href="editar.php?id=<?php echo $datos->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                
                                <td><a class="text-danger" href="eliminar.php?id=<?php echo $datos->id; ?>"><i class="bi bi-trash-fill"></i></a></td>

                                
                            </tr>

                            <?php 
                             }
                             ?>


                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">

                    Ingresar Nueva Solicitud :
                </div>
                <form class="p-4" method="POST" action="registrar.php">

                    <div class="mb-3">
                        <label class="form-label">Nombre :</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Apellido :</label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required >
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Identificacion :</label>
                        <input type="number" class="form-control" name="txtIdentificacion" autofocus required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Edad :</label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>



                    <div class="mb-3">
                        <label class="form-label">Seleccione Casa de Estudio:</label>
                        <select class="form-control" id="sel1" name="Casa" >
                            <option>Gryffindor</option>
                            <option>Hufflepuff</option>
                            <option>Ravenclaw</option>
                            <option>Slytherin</option>
                        </select>
                    </div>




                    <div class="d-grid">

                        <input type="hidden" name="enviar" value="1">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </div>


                </form>

            </div>
        </div>

    </div>

</div>


<?php include 'template/footer.php'?>