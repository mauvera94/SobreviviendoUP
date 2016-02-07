<?php

function conectar() {
    $dbhost='localhost';
    $dbuser='leoncio';
    $dbpass='sslj08120110';
    $dbname='comentario';
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
 function getinfoFirst(){
  $sql = "SELECT * FROM comentario";
  try {
      $db = conectar();
      $stmt = $db->query($sql);
      $datos = $stmt->fetchAll();
     
      foreach($datos as $row) {
          $id = $row['id'];
          $nombre = $row['nombre'];
          $comentario=$row['comentario'];
          $foto=$row['foto'];
           echo '<li>
           <input type="hidden" value="'.$id.'" id="idComent">
            <div class="commenterImage">
            <img src="'.$foto.'">
            </div>
            <div class="commentText">
            <p class="">'.$comentario.'</p> 
            <span class="date sub-text">'.$nombre.'</span>

          </div>
        </li>';

        }

      
      $db = null;
  } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
  }
}
getinfoFirst();
?>