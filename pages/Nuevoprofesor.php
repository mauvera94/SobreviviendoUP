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

$pidMaterias=$_GET["idMaterias"];
$pNombre=$_GET["Nombre"];

function addprof($idMaterias, $Nombre) {

  $sql = 'INSERT INTO Nuevoprofesor (idMaterias, Nombre) VALUES (:idMaterias,:Nombre)';
  try {
    $db = conectar();
    $stmt = $db->prepare($sql);
    $stmt->bindParam('idMaterias', $idMaterias);
    $stmt->bindParam('Nombre', $Nombre);
    $stmt->execute();

    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
addprof($pidMaterias,$pNombre);

?>
