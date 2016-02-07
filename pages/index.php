<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sobreviviendo UP</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../js/star-rating.js" type="text/javascript"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


        <link href="../dependencies/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-slider.css" rel="stylesheet">

    <style type='text/css'>
        /* Space out content a bit */
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        h1 small {
            font-size: 51%;
        }

        /* Everything but the jumbotron gets side spacing for mobile first views */
        .header,
        .marketing,
        .footer {
          padding-left: 15px;
          padding-right: 15px;
        }

        /* Custom page header */
        .header {
          border-bottom: 1px solid #e5e5e5;
        }
        /* Make the masthead heading the same height as the navigation */
        .header h3 {
          margin-top: 0;
          margin-bottom: 0;
          line-height: 40px;
          padding-bottom: 19px;
        }

        /* Custom page footer */
        .footer {
          padding-top: 19px;
          color: #777;
          border-top: 1px solid #e5e5e5;
        }

        /* Customize container */
        .container {
            min-width: 640px;
        }
        @media (min-width: 768px) {
          .container {
            max-width: 1000px;
          }
        }
        .container-narrow > hr {
          margin: 30px 0;
        }

        /* Main marketing message and sign up button */
        .title {
          text-align: center;
          border-bottom: 1px solid #e5e5e5;
        }

        /* Responsive: Portrait tablets and up */
        @media screen and (min-width: 768px) {
          /* Remove the padding we set earlier */
          .header,
          .footer {
            padding-left: 0;
            padding-right: 0;
          }
          /* Space out the masthead */
          .header {
            margin-bottom: 30px;
          }
          /* Remove the bottom border on the jumbotron for visual effect */
          .title {
            border-bottom: 0;
          }
        }

        .well {
            background-color: #E0E0E0;
        }

        .slider-example {
            padding: 10px 0;
            margin: 35px 0;
        }

        #destroyEx5Slider, #ex6CurrentSliderValLabel, #ex7-enabled {
            margin-left: 45px;
        }

        #ex6SliderVal {
            color: green;
        }

        #slider12a .slider-track-high, #slider12c .slider-track-high {
            background: green;
        }

        #slider12b .slider-track-low, #slider12c .slider-track-low {
            background: red;
        }

        #slider12c .slider-selection {
            background: yellow;
        }

    </style>

    <style type='text/css'>
        /* Example 1 custom styles */
        #ex1Slider .slider-selection {
            background: #BABABA;
        }

        /* Example 3 custom styles */
        #RGB {
            height: 20px;
            background: rgb(128, 128, 128);
        }
        #RC .slider-selection {
            background: #FF8282;
        }
        #RC .slider-handle {
            background: red;
        }
        #GC .slider-selection {
            background: #428041;
        }
        #GC .slider-handle {
            background: green;
        }
        #BC .slider-selection {
            background: #8283FF;
        }
        #BC .slider-handle {
            border-bottom-color: blue;
        }
        #R, #G, #B {
            width: 300px;
        }
    </style>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<script type="text/javascript">

function materias(carrera)
    {
        $.get( "postearMaterias.php?idCarreras="+carrera.getAttribute("data-id")+"&Dibujo="+carrera.getAttribute("data-dibujo"), function( data ) {
        $( "#semestre" ).html( data ) // John
        }, "html" );
        $('#titulo').html(carrera.getAttribute("data-nombre"))
    }
function prof(materia)
    {
        $.get( "postearProfesores.php?idMateria="+materia.getAttribute("data-prof"), function( data ) {
        $( "#profe" ).html( data ) // John
        }, "html" );
        $('#mattit').html(materia.getAttribute("data-nombre"))
        
    }
function detalles(profesor)
    {
        $.get( "postearResultados.php?idProfesor="+profesor.getAttribute("data-id"), function( data ) {
        $( "#detalles" ).html( data ) // John
        }, "html" );
        $.get( "postearComentario.php?idProfesores="+profesor.getAttribute("data-id"), function( data ) {
        $( "#comentarios" ).html( data ) // John
        }, "html" );
    }
function nuevo(materia){
        id = materia.getAttribute("data-id")
        nom = $('#profesor').val();
        var ajaxurl = 'Nuevoprofesor.php?idMaterias='+id+'&Nombre='+nom;
        $.get(ajaxurl);
        alert("Solicitud enviada con exito!")
        $('#profesor').val("");
    }
function comentar(profesor){
        id = profesor.getAttribute("data-id")
        comentario = $('#btn-input').val();
        var ajaxurl = 'comentario.php?idProfesores='+id+'&Comentario='+comentario;
        $.get(ajaxurl);
        alert("Comentario agregado con exito")
        $('#btn-input').val("");
    }
function evaluacion(profesor)
    {
        $.get( "postearEncuesta.php?idProfesor="+profesor.getAttribute("data-id"), function( data ) {
        $( "#encuesta" ).html( data ) // John
        }, "html" );
        $('#profes').html(profesor.getAttribute("data-nombre"))
    }
    function evaluar(profesor){
        v = grecaptcha.getResponse();
        if (v.length != 0)
        {
        id = profesor.getAttribute("data-id")
        nivel = $('#input-21d').val();
        interesante = $('#slInteresante').val();
        tareas = $('#slTareas').val();
        aprendizaje = $('#slAprendizaje').val();
        caracter = $('#slCaracter').val();
        voz = $('#slVoz').val();
        examen = $('#slExamen').val();
        var ajaxurl = 'Encuesta.php?idProfesores='+id+'&Nivel='+nivel+'&Interesante='+interesante+'&Tareas='+tareas+'&Aprendizaje='+aprendizaje+'&Caracter='+caracter+'&Voz='+voz+'&Examen='+examen;
        $.get(ajaxurl);
        alert("Encuesta agregada con exito")
        }
        if(v.length == 0)
        {
            alert("ERROR: Verifica tu identidad !")
        }
    }
</script>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sobreviviendo UP</a>
            </div>
            <!-- /.navbar-header -->

            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="info.html"><i class="fa fa-search fa-fw"></i> Acerca de nosotros</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-stethoscope fa-fw"></i> Ciencias de la Salud<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="2" data-dibujo="fa fa-stethoscope fa-5x" data-nombre="Enfermería" onclick="materias(this);">Enfermería</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="3" data-dibujo="fa fa-stethoscope fa-5x" data-nombre="Medico Cirujano" onclick="materias(this);">Medico Cirujano</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="4" data-dibujo="fa fa-stethoscope fa-5x" data-nombre="Psicología" onclick="materias(this);">Psicología</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-briefcase fa-fw"></i> Empresariales<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="7" data-dibujo="fa fa-briefcase fa-5x" data-nombre="Administración y Finanzas" onclick="materias(this);">Administración y Finanzas</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="8" data-dibujo="fa fa-briefcase fa-5x" data-nombre="Administración y Mercadotecnia" onclick="materias(this);">Administración y Mercadotecnia</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="9" data-dibujo="fa fa-briefcase fa-5x" data-nombre="Administración y Negocios Internacionales" onclick="materias(this);">Administración y Negocios Internacionales</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="10" data-dibujo="fa fa-briefcase fa-5x" data-nombre="Administración y Recursos Humanos" onclick="materias(this);">Administración y Recursos Humanos</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="11" data-dibujo="fa fa-briefcase fa-5x" data-nombre="Contaduría" onclick="materias(this);">Contaduría</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                     <li>
                            <a href="#"><i class="fa fa-comments-o fa-fw"></i> Comunicación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="5" data-dibujo="fa fa-comments-o fa-5x" data-nombre="Comunicación" onclick="materias(this);">Comunicación</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Ingenierías<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="15" data-dibujo="fa fa-gear fa-5x" data-nombre="Ingeniería en Animación Digital" onclick="materias(this);">Ingeniería en Animación Digital</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="16" data-dibujo="fa fa-gear fa-5x" data-nombre="Ingeniería en Innovación y Diseño" onclick="materias(this);">Ingeniería en Innovación y Diseño</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="17" data-dibujo="fa fa-gear fa-5x" data-nombre="Ingeniería en Tecnologías de Información y Sistemas Inteligentes" onclick="materias(this);">Ingeniería en Tecnologías de Información y Sistemas Inteligentes</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="18" data-dibujo="fa fa-gear fa-5x" data-nombre="Ingeniería Industrial y Gestión de la Innovación" onclick="materias(this);">Ingeniería Industrial y Gestión de la Innovación</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="19" data-dibujo="fa fa-gear fa-5x" data-nombre="Ingeniería Mecánica" onclick="materias(this);">Ingeniería Mecánica</a>
                                </li>
                                <li>
                                    <a href="#semestre" data-id="20" data-dibujo="fa fa-gear fa-5x" data-nombre="Ingeniería Mecatrónica" onclick="materias(this);">Ingeniería Mecatrónica</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Derecho<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="6" data-dibujo="fa fa-book fa-5x" data-nombre="Derecho" onclick="materias(this);">Derecho</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<li>
                            <a href="#"><i class="fa fa-home fa-fw"></i> ESDAI<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="12" data-dibujo="a fa-home fa-5x" data-nombre="ESDAI" onclick="materias(this);">ESDAI</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<li>
                            <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Pedagogía<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="21" data-dibujo="fa fa-graduation-cap fa-5x" data-nombre="Pedagogía" onclick="materias(this);">Pedagogía</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<li>
                            <a href="#"><i class="fa fa-bank fa-fw"></i> Filosofía<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="13" data-dibujo="fa fa-bank fa-5x" data-nombre="Filosofía" onclick="materias(this);">Filosofía</a>
                                </li>
</ul>
                            <!-- /.nav-second-level -->
                        </li>
                                <li>
                            <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Gobierno y Políticas Públicas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="14" data-dibujo="fa fa-graduation-cap fa-5x" data-nombre="Economía" onclick="materias(this);">Economía</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<li>
                            <a href="#"><i class="fa fa-bullhorn fa-fw"></i> Administración y Dirección<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#semestre" data-id="1" data-dibujo="fa fa-bullhorn fa-5x" data-nombre="Administración y Dirección" onclick="materias(this);">Administración y Dirección</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            
        </nav>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" id="titulo"><i class="fa fa-life-ring fa-fw" ></i> Sobreviviendo UP</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!--Banner de Semestre-->
            <!-- /.row -->
            <div class="row"id="semestre">
                <div ></div>
            </div>
            <!-- /.row -->

            <!--/ Banner de Semestre-->

            <!-- Panel de profesores -->
            <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-university fa-fw" ></i> Materia
                        </div>
                        <h1 class="page-header" id="mattit"></h1>
                        <div class="panel-body" id="profe">

                        </div>
                        <!-- /.panel-body -->


            </div>
                        <!-- / Panel de profesores -->

            <div name="infoProfe" class="row">
                <!-- Panel de muestreo de info -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class= "panel panel-heading">
                           <i class="fa fa-bar-chart-o fa-fw"></i> Profesor
                        </div>
                        <div class="panel-body" id="detalles">
                            <!--/ resultados -->
                        </div>
                    </div>
                </div>
            </div>

                <!--/ Panel de muestreo de info -->

                 <div name="comentarios" class="row">
                <!-- Panel de muestreo de comentarios -->
                    <div class="chat-panel panel panel-default" id="comentarios">
                        
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->

                <!--/ Panel de muestreo de comentarios -->
                 </div>


                <div name="encuesta" class="row">
                <!--/ Panel de Encuesta -->

                <div class="col-lg-6">

                        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Profesor
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" >
                            <div class="list-group" id="modulos">
                                <h1 class="page-header" id="profes"></h1>
                                <a class="list-group-item">

                                    Nivel
                                    <span class="pull-center">
                                            <input id="input-21d" value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
                                        </span>
                                </a>
                                
                                <a class="list-group-item">

                                    Interesante
                                </p>
                                    <span class="pull-center">
                                        <i class="fa fa-thumbs-o-down fa-fw"></i>
                                        <input id="slInteresante" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                                        <i class="fa fa-thumbs-o-up fa-fw"></i>
                                    </span>

                                </a>

                                <a class="list-group-item">

                                    Tareas
                                    <span class="pull-center">
                                    </p>
                                        <i class="fa fa-minus fa-fw"></i>
                                        <input id="slTareas" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                                        <i class="fa fa-plus fa-fw"></i>
                                    </span>

                                </a>

                                <a class="list-group-item">

                                    Aprendizaje
                                    <span class="pull-center">
                                    </p>
                                        <i class="fa fa-ban fa-fw"></i>
                                        <input id="slAprendizaje" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                                        <i class="fa fa-check-circle fa-fw"></i>
                                    </span>

                                </a>


                                <a class="list-group-item">

                                    Caracter
                                    <span class="pull-center">
                                    </p>
                                        <i class="fa fa-frown-o fa-fw"></i>
                                        <input id="slCaracter" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                                        <i class="fa fa-smile-o fa-fw"></i>
                                    </span>

                                </a>

                                <a class="list-group-item">

                                    Voz
                                    <span class="pull-center">
                                    </p>
                                        <i class="fa fa-volume-off fa-fw"></i>
                                        <input id="slVoz" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                                        <i class="fa fa-volume-up fa-fw"></i>
                                    </span>

                                </a>

                                <a class="list-group-item">

                                    Examen
                                    <span class="pull-center">
                                    </p>
                                        <i class="fa fa-question fa-fw"></i>
                                        <input id="slExamen" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                                        <i class="fa fa-graduation-cap fa-fw"></i>
                                    </span>

                                </a>

                                
                                <div class="g-recaptcha" id="rcaptcha" style="margin-left: 90px;" data-sitekey="6LcENRETAAAAAK8HgwDMCo0wnnsZpFclkuEbCR18"></div>
                            </div>
                            <div id="encuesta"></div>

                        </div>
                        <!-- /.panel-body -->


                    </div>
                    <!-- /.panel -->


                <!--/ Panel de Encuesta -->

            </div>








            </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->


    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

            <script type='text/javascript' src="../dependencies/js/sljquery.min.js"></script>
        <!--Falta el script del slider -->
        <script type='text/javascript' src="../js/bootstrap-slider.js"></script>


    <script type='text/javascript'>
        $(document).ready(function() {


            /* Example 1 */
            $('#slInteresante').slider({
                formatter: function(value) {
                    return value;
                }
            });

            $('#slTareas').slider({
                formatter: function(value) {
                    return value;
                }
            });

            $('#slAprendizaje').slider({
                formatter: function(value) {
                    return value;
                }
            });

            $('#slCaracter').slider({
                formatter: function(value) {
                    return value;
                }
            });

            $('#slVoz').slider({
                formatter: function(value) {
                    return value;
                }
            });

            $('#slExamen').slider({
                formatter: function(value) {
                    return value;
                }
            });
            
        });
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <!-- Rating -->
    <script>
    jQuery(document).ready(function () {

       
        $("#modulos").prop('disabled',true);
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg',
              showClear: false
           });
           
        $('#btn-rating-input').on('click', function() {
            $('#rating-input').rating('refresh', {
                showClear:true, 
                disabled:true
            });
        });
        $('.btn-danger').on('click', function() {
            $("#kartik").rating('destroy');
        });
        $('.btn-success').on('click', function() {
            $("#kartik").rating('create');
        });
        $('#rating-input').on('rating.change', function() {
            alert($('#rating-input').val());
        });
        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
</script>

                
        



</body>

</html>
