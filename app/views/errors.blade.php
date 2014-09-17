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
    	<div class="content">
			<div class="container">
            <h1>Error {{ $type }} - {{{ $title }}}</h1>
            
            <div class="grid fluid">
                <div class="row">
                	<div class="row text-center">
	                    <div class="span12 bg-red padding20 text-center">
	                        <h2 class="fg-white">{{ $message }}</h2>
	                    </div>
                	</div>
                    <!-- <div class="span3 bg-darkBlue padding20 text-center">
                        <h2 class="fg-white">:(</h2>
                    </div>
                	-->
                	<div class="row text-center">
                    	<img src="{{ $image_url }}" alt="Error 404">
                	</div>

                	<div class="row text-center">
                		
	                    <div class="span12 bg-blue padding20 text-center">
	                        <h2 class="fg-white"><a style="color:white;" href="/proyecto/public">Da click aqui para volver al Menu de inicio :)</a></h2>
	                    </div>
	                    
                	</div>
                </div>
            </div>
        </div>
		</div>
	</body>
</html>