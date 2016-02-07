<?php

function conectar() {
  $dbhost='localhost';
  $dbuser='website';
  $dbpass='MickeyM0use';
  $dbname='SobreviviendoUp';
  $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

function getNombre($pidMateria){
  $sql = 'SELECT Nombre FROM  Materias WHERE  idMateria='.$pidMateria;
  $text='';
  try {
      $db = conectar();
      $stmt = $db->query($sql);
      $datos = $stmt->fetchAll();
     
      foreach($datos as $row) {
          $Nombre = $row['Nombre'];
          $text=(string)$Nombre;
        }
        return $text;
      $db = null;
  } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
  }
}

function getNivel($pidProfesor){
  $sql = "SELECT AVG(Nivel) FROM Encuestas WHERE idProfesores=".$pidProfesor;
  $text='';
  try {
      $db = conectar();
      $stmt = $db->query($sql);
      $datos = $stmt->fetchAll();
     
      foreach($datos as $row) {
          $Nivel=$row['AVG(Nivel)'];
          $text=(string)$Nivel;
        }
        return $text;
      $db = null;
  } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
  }
}



function getProfesores($pidMateria){
  $nombre=(string)getNombre($pidMateria);
  $sql = 'SELECT * FROM Profesores prof join Materias mate on (prof.idMateria=mate.idMateria)  WHERE mate.Nombre="'.$nombre.'"';
  $text='';
  try {
    $db = conectar();
    $stmt = $db->query($sql);
    $datos = $stmt->fetchAll();

    foreach($datos as $row) {
      $idProfesores = $row['idProfesores'];
      $NombreProfesores = $row['NombreProfesores'];
      $idMateria=$row['idMateria'];
      $nivel=(string)getNivel($idProfesores);

        $text=(string)$text.'<li>
        <div class="timeline-badge success"><i class="fa fa-user"></i></div>
        <div class="timeline-panel">
        <div class="timeline-heading">
        <h4 class="timeline-title">'.$NombreProfesores.'</h4>
        <p><small class="text-muted"> Calificacion:  '.$nivel.'</small></p>
        <div>
        </div>
        <hr>
        <div class="timeline-body">
        <button type="button" class="btn btn-info" id="detal" data-id="'.$idProfesores.'" onclick="detalles(this)">Detalles</button>
        <button type="button" class="btn btn-danger" id="eval" data-nombre="'.$NombreProfesores.'" data-id="'.$idProfesores.'" onclick="evaluacion(this)">Evaluar</button>
        </div>
        </div>
        </li>';
    }
    return $text;
    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
function getTimeline($materia){
  
      $profes=(string)getProfesores($materia);
        echo '
                            <ul class="timeline" >
                            '.$profes.'
                            </ul>


                            <input id="profesor"  class="form-control" placeholder="Agrega a un profesor" name="nuevoProfe" type="text" value>

                        </p>
                            <button type="button" class="btn btn-primary btn-lg btn-block" data-id="'.$materia.'" onclick="nuevo(this)"><i class="fa fa-user fa-fw"></i>Agrega a un profesor<i class="fa fa-fw fa-user"></i></button>
                        ';
    
}

$pidMateria=$_GET["idMateria"];
getTimeline($pidMateria);
?>