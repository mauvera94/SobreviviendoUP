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

$pidProfesores=$_GET["idProfesores"];
$pComentario=$_GET["Comentario"];

function addcom($idProfesores, $comentario) {

  $sql = 'INSERT INTO Comentario (idProfesores, comentario) VALUES (:idProfesores,:comentario)';
  try {
    $db = conectar();
    $stmt = $db->prepare($sql);
    $stmt->bindParam('idProfesores', $idProfesores);
    $stmt->bindParam('comentario', $comentario);
    $stmt->execute();

    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
addcom($pidProfesores,$pComentario);

?>
