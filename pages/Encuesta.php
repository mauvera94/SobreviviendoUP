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
          $pidProfesores = $_GET["idProfesores"];
          $pNivel=$_GET["Nivel"];
          $pInteresante=$_GET["Interesante"];
          $pTareas=$_GET["Tareas"];
          $pAprendizaje=$_GET["Aprendizaje"];
          $pCaracter=$_GET["Caracter"];
          $pVoz=$_GET["Voz"];
          $pExamen=$_GET["Examen"];

function addencuesta($idProfesor, $Nivel, $Interesante, $Tareas, $Aprendizaje, $Caracter, $Voz, $Examen) {

  $sql = 'INSERT INTO Encuestas (idProfesores, Nivel, Interesante, Tareas, Aprendizaje, Caracter, Voz, Examen ) VALUES (:idProfesores, :Nivel, :Interesante, :Tareas, :Aprendizaje, :Caracter, :Voz, :Examen)';
  try {
    $db = conectar();
    $stmt = $db->prepare($sql);
    $stmt->bindParam('idProfesores', $idProfesor);
    $stmt->bindParam('Nivel', $Nivel);
    $stmt->bindParam('Interesante', $Interesante);
    $stmt->bindParam('Tareas', $Tareas);
    $stmt->bindParam('Aprendizaje', $Aprendizaje);
    $stmt->bindParam('Caracter', $Caracter);
    $stmt->bindParam('Voz', $Voz);
    $stmt->bindParam('Examen', $Examen);
    $stmt->execute();

    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

addencuesta($pidProfesores, $pNivel, $pInteresante, $pTareas, $pAprendizaje, $pCaracter, $pVoz, $pExamen);

?>
