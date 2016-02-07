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
  $sql = 'SELECT * FROM  Materias WHERE  idCarreras='.$idCarreras.' AND semestre='.$semestres;
$text='';
  try 
  {
    $db = conectar();
    $stmt = $db->query($sql);
    $datos = $stmt->fetchAll();

    foreach($datos as $row) {
     $idCarreras = $row['idCarreras'];
     $Nombre = $row['Nombre'];
     $idMateria=$row['idMateria'];
     $semestre=$row['semestre'];

     $text=(string)$text. '
     <li>
        <a href="#" data-nombre="'.$Nombre.'" data-prof="'.$idMateria.'" onclick="prof(this);">
          <div>
            <strong>'.$Nombre.'</strong>
          </div>
        </a>
      </li>
     <li class="divider"></li>  ';
}
return $text;
     $db = null;
    }catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

function getMaterias($idCarreras,$pDibujo)
{
  $sql = 'SELECT DISTINCT  `semestre` FROM  `Materias` WHERE  `idCarreras` = '.$idCarreras;

  try 
  {
    $db = conectar();
    $stmt = $db->query($sql);
    $datos = $stmt->fetchAll();

    foreach($datos as $row) {
     $semestre=$row['semestre'];
     $mate=(string)getMate($idCarreras,$semestre);

     echo '<div class="col-lg-4 col-md-6">
     <div class="panel panel-primary">
     <div class="panel-heading">
     <div class="row">
     <div class="col-xs-3">
     <i class="'.$pDibujo.'"></i>
     </div>
     <div class="col-xs-9 text-right">
     <div class="huge">'.$semestre.'</div>
     <div>Semestre</div>
     </div>
     </div>
     </div>
     <a href="#">
     <div class="panel-footer">

     <a class="dropdown-toggle" data-toggle="dropdown" href="#" data-sem="'.$semestre.'" data-car="'.$idCarreras.'">
     <span class="pull-left">Materias</span>
     <span class="pull-right">                                    <i class="fa fa-arrow-circle-right"></i>
     </span>
     <div class="clearfix"></div>
     </a>
     <ul class="dropdown-menu dropdown-messages" id="mat'.$semestre.'" >
     '.$mate.'   
     </ul>
     </div>
     </a>
     </div>
     </div>
     </div>';
}
     $db = null;
    }catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}


$pidCarreras=$_GET["idCarreras"];
$pDibujo=$_GET["Dibujo"];
getMaterias($pidCarreras,$pDibujo);
?>