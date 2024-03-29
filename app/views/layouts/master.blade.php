<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        
        <!-- CSS -->   
        {{ HTML::style('css/metro-bootstrap.css') }}
        {{ HTML::style('css/metro-bootstrap-responsive.css') }}
        {{ HTML::style('css/iconFont.css') }}
        {{ HTML::style('css/styles.css') }}  
    
        <!-- Autores -->
        {{ HTML::style('humans.txt') }} 
        
        <!-- Librerias JavaScript -->
        {{ HTML::script('js/jquery/jquery.min.js') }}
        {{ HTML::script('js/jquery/jquery.widget.min.js') }}
        
        <!-- Plugins JavaScript de Metro UI-->
        {{ HTML::script('js/metro.min.js') }}
        {{ HTML::script('js/metro-dropdown.js') }}
        
        @yield('dependencies')
        
        <title>Sistema de evaluacion psicologica de atletas - {{{ $title }}}</title>
    </head>
    <body class="metro">
        
        <!-- Barra de navegación -->
        @if(Auth::check())
        <header class="bg-dark" data-load="header.html">
            
            <nav class="navigation-bar bg-darkRed fixed-top">
                <div class="navigation-bar-content container">   
                    <a class="element" href="{{ URL::to('/') }}"><span class="icon-home"></span> INICIO</a>
                    <span class="element-divider"></span>
                    <a class="element1 pull-menu" href="#"></a>
                    <ul class="element-menu" style="display: block;">
                        <li>
                            <a class="dropdown-toggle bg-hover-red" href="#"><span class="icon-pencil"></span> Cuestionarios</a>
                            <ul class="dropdown-menu" data-role="dropdown">
<!--
                                <li class="menu-title">Ansiedad</li>
                                <li>{{ HTML::link('test/scat','SCAT'); }}</li>
                                <li>{{ HTML::link('test/scat','CSAI-12'); }}</li>
                                <li class="divider"></li>
                                <li>{{ HTML::link('test/scat', 'BURNOUT'); }}</li>
-->
                                <li class="menu-title">Evaluacion Mental</li>
                                <li>{{ HTML::link('test/IPRD','IPRD'); }}</li>
<!--                                <li>{{ HTML::link('test/scat','IPRD Combate'); }}</li>-->
                                <li class="menu-title">Ansiedad</li>
                                <li>{{ HTML::link('test/SCAT','SCAT'); }}</li>
                                <li>{{ HTML::link('test/CSAI-12','CSAI-12'); }}</li>
                                <li class="menu-title">Otros</li>
                                <li>{{ HTML::link('test/BURNOUT','BURNOUT'); }}</li>
                            </ul>
                        </li>
                        <span class="element-divider"></span>
                        @if(Auth::user()->isAdmin())
                        <a class="element" href="{{ URL::to('results/') }}"><span class="icon-copy"></span> Resultados</a>
                        @endif
                        <!--<span class="element-divider"></span>
                        <!<a class="element" href="#"><span class="icon-help"></span> Documentación</a> -->
                        <span class="element-divider"></span>
                        <div class="element place-right">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-cog"></span>
                            </a>
                            
                            <ul class="dropdown-menu place-right" data-role="dropdown">
                                <li>{{ HTML::link('userProfile','Mi perfil', ['id'=>'myLink']); }}</li>
                                @if(Auth::user()->isAdmin())
                                    <li>{{ HTML::link('users','Usuarios', ['id'=>'myLink']); }}</li>
                                @endif
                                <li>{{ HTML::link('logout','Cerrar sesion', ['id'=>'myLink']); }}</li>
                            </ul>
                        
                        </div>
                        <li class="element  place-right">
                                {{  Auth::user()->name . " " . Auth::user()->firstSurname }}
                        </li>
        @endif
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-- Contenido -->
        @yield('content')
    </body>
</html>