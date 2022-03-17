<?php include 'template/header.php'?>


<?php 

include_once 'model/conexion.php';
$codigo = $_GET['id'];
$consulta =$bd->prepare("select * from solicitudes where id =?;");
$consulta->execute([$codigo]);
$estudiante = $consulta->fetch(PDO::FETCH_OBJ);
//print_r($estudiante);
?>



<div class="container mt-5">
   <div class="row justify-content-center">
       <div class="col-md-4">
           <div class="card">
                <div class="card-header">
                   <h4>Actualizar solicitud de ingreso </h4>
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                   <div class="mb-3">
                        <label class="form-label">Nombre :</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $estudiante->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido :</label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required value="<?php echo $estudiante->apellido; ?>">
                    </div>
                   <div class="mb-3">
                        <label class="form-label">Identificacion :</label>
                        <input type="number" class="form-control" name="txtIdentificacion" autofocus required value="<?php echo $estudiante->identificacion; ?>">
                    </div>
                   <div class="mb-3">
                        <label class="form-label">Edad :</label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required value="<?php echo $estudiante->edad; ?>">
                    </div>
                   <div class="mb-3">
                        <label class="form-label">Seleccione Casa de Estudio:</label>
                        <select class="form-control" id="sel1" name="Casa" value="<?php echo $estudiante->casa; ?>">
                            <option>Gryffindor</option>
                            <option>Hufflepuff</option>
                            <option>Ravenclaw</option>
                            <option>Slytherin</option>
                        </select>
                    </div>
                  <div class="d-grid">

                        <input type="hidden" name="id" value="<?php echo $estudiante->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
               </form>
           </div>
        </div>
    </div>
</div>






<?php include 'template/footer.php'?>