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
        
        <title>{{{ $title }}}</title>
    </head>
    <body class="metro">
        
        <!-- Barra de navegación -->
        <header class="bg-dark" data-load="header.html">
            <nav class="navigation-bar bg-darkRed fixed-top">
                <div class="navigation-bar-content container">   
                    <a class="element" href="#"><span class="icon-home"></span> INICIO</a>
                    <span class="element-divider"></span>
                    <a class="element1 pull-menu" href="#"></a>
                    <ul class="element-menu" style="display: block;">
                        <li>
                            <a class="dropdown-toggle bg-hover-red" href="#"><span class="icon-pencil"></span> Cuestionarios</a>
                            <ul class="dropdown-menu" data-role="dropdown">
                                <li class="menu-title">Ansiedad</li>
                                <li><a  href="#">SCAT</a></li>
                                <li><a  href="#">CSAI-12</a></li>
                                <li class="divider"></li>
                                <li><a href="#">BURNOUT</a></li>
                                <li class="menu-title">Evaluacion Mental</li>
                                <li><a href="#">IPRD</a></li>
                                <li><a href="#">IPRD Combate</a></li>
                            </ul>
                        </li>
                        <span class="element-divider"></span>
                        <a class="element" href="#"><span class="icon-copy"></span> Resultados</a>
                        <span class="element-divider"></span>
                        <a class="element" href="#"><span class="icon-help"></span> Documentación</a>
                        <span class="element-divider"></span>
                        <a class="element" href="#"><span class="icon-yelp"></span> Créditos</a>
                        <div class="element place-right">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-cog"></span>
                            </a>
                            <ul class="dropdown-menu place-right" data-role="dropdown">
                                <li><a href="#">Mi Perfil</a></li>
                                <li><a href="#">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                        <button class="element image-button image-left place-right">
                            Alfredo Alvarez
                            <img src="img/profile_pic.jpg"/>
                        </button>
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-- Contenido -->
        @yield('content')
    </body>
</html>