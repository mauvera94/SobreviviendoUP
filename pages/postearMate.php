<?php

function conectar() {
  $dbhost='localhost';
  $dbuser='root';
  $dbpass='MickeyM0use';
  $dbname='SobreviviendoUp';
  $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

function getMate($idCarreras, $semestres)
{
  $sql = 'SELECT * FROM  Materias WHERE  idCarreras='.$idCarreras.' AND semestre ='.$semestres;

  try 
  {
    $db = conectar();
    $stmt = $db->query($sql);
    $datos = $stmt->fetchAll();

    foreach($datos as $row) {
     $idCarreras = $row['idCarreras'];
     $Nombre = $row['Nombre'];
     $Creditos=$row['Creditos'];
     $semestre=$row['semestre'];

     echo '
     <li>
        <a href="#">
          <div>
            <strong>'.$Nombre.'</strong>
          </div>
        </a>
      </li>
     <li class="divider"></li>  ';
}
     $db = null;
    }catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
$pidCarreras=$_GET["idCarreras"];
$psemestre=$_GET["sem"];
getMate($pidCarreras,$psemestre);
?>