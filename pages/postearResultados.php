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
    function getNombre($pidProfesor){
  $sql = 'SELECT NombreProfesores FROM  Profesores WHERE  idProfesores='.$pidProfesor;
  $text='';
  try {
      $db = conectar();
      $stmt = $db->query($sql);
      $datos = $stmt->fetchAll();
     
      foreach($datos as $row) {
          $Nombre = $row['NombreProfesores'];
          $text=(string)$Nombre;
        }
        return $text;
      $db = null;
  } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
  }
  
}

function getEncuestas($pidProfesor){
  $sql = "SELECT AVG(Nivel) , AVG(Interesante), AVG(Tareas), AVG(Aprendizaje), AVG(Caracter), AVG(Voz), AVG(Examen) FROM Encuestas WHERE idProfesores =".$pidProfesor;
  $nombre= (string)getNombre($pidProfesor);
  try {
    $db = conectar();
    $stmt = $db->query($sql);
    $datos = $stmt->fetchAll();

    foreach($datos as $row) {
      $Nivel=10*$row['AVG(Nivel)'];
      $Interesante=10*$row['AVG(Interesante)'];
      $Tareas=10*$row['AVG(Tareas)'];
      $Aprendizaje=10*$row['AVG(Aprendizaje)'];
      $Caracter=10*$row['AVG(Caracter)'];
      $Voz=10*$row['AVG(Voz)'];
      $Examen=10*$row['AVG(Examen)'];

      echo '

      <p>
      <strong>Profesor: '.$nombre.'</strong>
      </p>


      <p>
      <strong>Nivel: '.$Nivel.'</strong>
      </p>

      <p>
      <strong>Interesante</strong>
      </p>
      <span class="pull-left">
      <i class="fa fa-thumbs-o-up fa-fw"></i>
      </span>
      <span class="pull-right">
      <i class="fa fa-fw fa-thumbs-o-down"></i>
      </span>
      <div class="progress progress-striped active">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$Interesante.'%">
      <span class="sr-only">40% Complete (success)</span>
      </div>
      </div>



      <div>
      <p>
      <strong>Tareas</strong>
      </p>
      <span class="pull-left">
      <i class="fa fa-minus fa-fw"></i>
      </span>
      <span class="pull-right">
      <i class="fa fa-fw fa-plus"></i>
      </span>
      <div class="progress progress-striped active">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$Tareas.'%">
      <span class="sr-only">20% Complete</span>
      </div>
      </div>
      </div>


      <div>
      <p>
      <strong>Aprendizaje</strong>
      </p>
      <span class="pull-left">
      <i class="fa fa-ban fa-fw"></i>
      </span>
      <span class="pull-right">
      <i class="fa fa-fw fa-check-circle"></i>
      </span>
      <div class="progress progress-striped active">
      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$Aprendizaje.'%">
      <span class="sr-only">60% Complete (warning)</span>
      </div>
      </div>
      </div>

      <div>
      <p>
      <strong>Caracter</strong>
      </p>
      <span class="pull-left">
      <i class="fa fa-frown-o fa-fw"></i>
      </span>
      <span class="pull-right">
      <i class="fa fa-fw fa-smile-o"></i>
      </span>
      <div class="progress progress-striped active">
      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: '.$Caracter.'%">
      <span class="sr-only">80% Complete (danger)</span>
      </div>
      </div>
      </div>

      <div>
      <p>
      <strong>Voz</strong>
      </p>
      <span class="pull-left">
      <i class="fa fa-volume-off fa-fw"></i>
      </span>
      <span class="pull-right">
      <i class="fa fa-fw fa-volume-up"></i>
      </span>
      <div class="progress progress-striped active">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$Voz.'%">
      <span class="sr-only">40% Complete (success)</span>
      </div>
      </div>

      </div>


      <div>
      <p>
      <strong>Examen</strong>
      </p>
      <span class="pull-left">
      <i class="fa fa-question fa-fw"></i>
      </span>
      <span class="pull-right">
      <i class="fa fa-fw fa-graduation-cap"></i>
      </span>
      <div class="progress progress-striped active">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$Examen.'%">
      <span class="sr-only">20% Complete</span>
      </div>
      </div>
      </div>';
    }
    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}


$pidProfesor=$_GET["idProfesor"];
getEncuestas($pidProfesor);
?>