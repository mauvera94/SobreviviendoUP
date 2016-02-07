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

function getComentarioFirst($pidProfesores){
  $sql = 'SELECT * FROM Comentario WHERE idProfesores='.$pidProfesores;
  $text='';
  try {
    $db = conectar();
    $stmt = $db->query($sql);
    $datos = $stmt->fetchAll();

    foreach($datos as $row) {
      $idProfesores = $row['idProfesores'];
      $comentario = $row['Comentario'];
      $text=(string)$text.'<li class="left clearfix">
      <div class="chat-body clearfix">
      <p>
      '.$comentario.'
      </p>
      </div>
      </li>';
    }
    return $text;
    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

function getchart($pidProfesores){
  
      $comentarios=(string)getComentarioFirst($pidProfesores);
        echo '<div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Cometarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat" >
                               '.$comentarios.'
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Escribe tu comentario aqui..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat" data-id="'.$pidProfesores.'" onclick="comentar(this)">
                                        Enviar
                                    </button>
                                </span>

                            </div>
                        </p>
                            Al dar click en el boton de enviar está aceptando nuestros 
                            <a data-toggle="modal" data-target="#myModal">términos y condiciones</a>.
                        </p>
                        </div>
                        ';
    
}

$pidProfesores=$_GET["idProfesores"];
getchart($pidProfesores);
?>