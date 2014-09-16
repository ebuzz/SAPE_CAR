@extends('layouts.master')


@section('dependencies')

@stop


@section('content')
    <div class="content">
            
        <!-- Encabezado -->
        <div style="background: url(./img/imagen_lp_car.jpg) top left no-repeat; background-size: cover; height: 300px;">
            <div class="container" style="padding: 50px 20px">
                <h1 class="fg-white">Sistema de evaluación psicológica de atletas</h1>
                <h2 class="fg-white">
                    <br> 
                </h2>
                @if(!Auth::check())
                    <a href="{{ URL::to('signup') }}" class="place-left button bg-darkRed bg-hover-red fg-white fg-hover-white bd-orange" style="margin-top: 10px;">
                        <h3 style="margin: 10px 40px">Regístrate <span class="icon-accessibility on-right"></span></h3>
                    </a>
                    <a href="{{ URL::to('login') }}" class="place-left button bg-darkRed bg-hover-red fg-white fg-hover-white bd-orange" style="margin-top: 10px;">
                        <h3 style="margin: 10px 40px">Iniciar sesión <span class="icon-user on-right"></span></h3>
                    </a>
                @endif
            </div>
        </div>

        <!-- Tiles de colores -->
        <div class="container">
            <h2>Esta plataforma es posible gracias a: </h2>
            <div class="grid fluid">
                <div class="row">
                    <div class="span4 bg-amber padding20 text-center">
                        <h2 class="fg-white">Instituto Tecnológico de Tijuana</h2>
                        <img src="./img/itt1.jpg" alt="Insituto Tecnologico de Tijuana">
                    </div>
                    <div class="span4 bg-darkBlue padding20 text-center">
                        <h2 class="fg-white">Centro de Alto Rendimiento</h2>
                        <img src="./img/CAR.jpg" alt="CAR"  width="220" height="220">
                    </div>
                    <div class="span4 bg-green padding20 text-center">
                        <h2 class="fg-white">Instituto Tecnológico de Tijuana</h2>
                        <img src="./img/itt1.jpg" alt="Insituto Tecnologico de Tijuana" >
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Información -->
    <div class="bg-steel no-tablet-portrait no-phone">
        <div class="container padding20 fg-white">
            <div class="carousel bg-transparent no-overflow" id="carousel2" style="width: 100%; height: 210px;">
                <div class="slide" style="display: none; left: 0px;">
                    <div class="place-right">
                        <img src="./img/tiro.jpg" alt=""  width="220" height="220">
                    </div>
                    <h2 class="fg-white ntm">Test Psicológicos y Reportes Automaticos</h2>
                    <p class="fg-white">Todos los test estandarizados ofrecen al psicologo una amplia visión del estado emocional de los deportistas.</p>
                    <p class="fg-white">Consulta resultados y elaborare estrategias que apoyen al atleta de manera progresiva tanto el desarrollo deportivo como su rendimiento.</p>
                </div>

                <div class="slide" style="left: 0px; display: block;">
                    <div class="place-right padding20 ntp nrp nbp">
                        <img src="./img/laravel.png" alt="" class="span3" width="220" height="220">
                    </div>
                    <h2 class="fg-white ntm">Desarrollado con las Últimas Tecnologias Web</h2>
                    <p class="fg-white">Con una atractiva e intuitiva interfaz se maximiza la experiencia de usuario.</p>
                    <p class="fg-white">Desarrollado con HTML5,JavaScript,MetroUI y Laravel(The PHP Framework)</p>

                </div>

                <div class="slide" style="left: 0px; display: none;">
                    <div class="place-right">
                        <img src="./img/nadador.jpg" alt="" class="span3" width="220" height="220">
                    </div>
                    <h2 class="fg-white ntm">Test Psicológicos Estandarizados</h2>
                    <p class="fg-white">Permite obtener un perfil de los diferentes aspectos mentales de los atletas.</p>
                    <p class="fg-white">Test aprobados por diferentes Universidades.</p>

                </div>
            </div>
            <script>
                $(function()
                {
                    $("#carousel2").carousel(
                    {
                        height: 210,
                        period: 5000,
                        duration: 1000,
                        effect: 'fade',
                        markers: 
                        {
                            show: false
                        }
                    });
                })
            </script>
        </div>
    </div>

    <!-- Acerca -->
    <div class="bg-dark">
        <div class="container" style="padding: 10px 0;">
            <div class="grid no-margin">
                <div class="row no-margin">
                    <div class="span3 padding10">
                        <img src="http://alechequer.files.wordpress.com/2012/02/logo-itt-20051.png" alt="" class="polaroid">
                    </div>
                    <div class="span3 padding10">
                        <h3 class="fg-white">Acerca de los desarrolladores</h3>
                        <p class="fg-white">¡Hola! Somos un grupo de jóvenes estudiantes que aman la tecnología.</p>
                    </div>
                    <div class="span3 padding10">
                        <div class="button danger " style="width: 100%; margin-bottom: 5px" href="#">Erick Aguayo Velázquez</div>
                        <div class="button purple " style="width: 100%; margin-bottom: 5px;" href="#">Alfredo Alvarez Hernández</div>
                        <div class="button success " style="width: 100%; margin-bottom: 5px" href="#">Carlos Melo Camarillo</div>
                        <div class="button info " style="width: 100%; margin-bottom: 5px" href="#">Samuel Macedo Vidrio</div>
                        
                        <div class="button warning " style="width: 100%; margin-bottom: 5px;" href="#">Pedro Saavedra Solís</div>
                    </div>
                    <div class="span3 padding10">
                        <h3 class="fg-white">Personas que contribuyeron a este proyecto</h3>
                        <p class="fg-white">Con su apoyo y conocimiento en el campo hicieron este sistema posible.</p>
                    </div>
                    <div class="span2 padding10">
                        <div class="button danger " style="width: 100%; margin-bottom: 5px">Dr. Arnulfo Alanis Garza </div>
                        <div class="button success " style="width: 100%; margin-bottom: 5px" href="#">Dr. Miguel Ángel Lopez</div>
                        <div class="button info " style="width: 100%; margin-bottom: 5px" href="#">Dr. Bogart Yail Máquez Lobato</div>
                        <div class="button warning " style="width: 100%; margin-bottom: 5px;" href="#">Dra. Valdez Chapotin</div>
                        <div class="button warning " style="width: 100%; margin-bottom: 5px;" href="#">Psic. Alejandra Ávila Flores</div>
                        <div class="button warning " style="width: 100%; margin-bottom: 5px;" href="#">Psic. Adam J. Flores Barba </div>
                        <div class="button warning " style="width: 100%; margin-bottom: 5px;" href="#">Psic. René García Aréizaga</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop