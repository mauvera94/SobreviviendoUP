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

function getEncuestas($pidProfesor){
  

      echo'
      
                            <!-- /.list-group -->

                            <div class="g-recaptcha" data-sitekey="6LcENRETAAAAAK8HgwDMCo0wnnsZpFclkuEbCR18"></div>

                            Al dar click en el boton de enviar está aceptando nuestros 
                            <a data-toggle="modal" data-target="#myModal">términos y condiciones</a>.
                        </p>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Términos y condiciones</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>

                        Todas las encuestas y/o comentarios son anónimos en su totalidad; todos los datos que contiene son meramente informativos. La presente página, comentarios y/o encuestas contenidas en ella no se encuentran relacionados de ninguna manera con la Universidad Panamericana y/o Centros Culturales de México A.C.
                    </p>
                    <p>Al usar el presente sitio web, acepta que seguirá estas reglas al momento de publicar y/o consultar una encuesta y/o comentario; entiende que todo el contenido mostrado en este sitio no es propiedad o fue generado por "Sobreviviendo UP", sino por los usuarios de esta; exime de toda responsabilidad a todas las personas que estuvieron involucradas en este proyecto directa o indirectamente. 
                    </p>

                        <ol>Reglas:
                                <li>No discutirá, publicará o enlazará nada que viole la ley de los Estados Unidos Mexicanos</li>
                                <li>No publicará o pedirá ningún tipo de información personal</li>
                                <li>La calidad de los datos y/o comentarios en esta comunidad es extremadamente importante. Todos los contribuyentes están incentivados a proporcionar información real y de calidad</li>
                                <li>No se permite mandar spam o inundación de cualquier tipo</li>
                                <li>Publicidad (de cualquier tipo) no está permitida</li>
                                <li>Suplantar a culquier persona esta estrictamente prohibido</li>
                                <li>No usar nombres de autor en los comentarios</li>
                                <li>El uso de scrapers, bots, o cualquier otra forma de posteo automático está prohibido</li>
                            </ol>
                        <p>
                            Recuerden: El uso de "Sobreviviendo UP" es un privilegio, no un derecho.
                        </p>
                        <p>
                            <em>El equipo de "Sobreviviendo UP" se reserva el derecho de revocar el acceso parcial o totalmente por cualquier razón y sin aviso previo.</em>
                        </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->





                            <a href="#" class="btn btn-primary btn-block" id="eval" data-id="'.$pidProfesor.'" onclick="evaluar(this)">Enviar</a>';
}


$pidProfesor=$_GET["idProfesor"];
getEncuestas($pidProfesor);
?>