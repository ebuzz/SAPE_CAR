@extends('layouts.master')

@section('dependencies')
	{{ HTML::script('js/jquery/jquery.mousewheel.js') }}
	{{ HTML::script('js/metro-fluentmenu.js') }}
    {{ HTML::script('js/metro-calendar.js') }}
    {{ HTML::script('js/metro-datepicker.js') }}
    {{ HTML::script('js/local/profile.js') }}
    {{ HTML::script('js/jquery/jquery.dataTables.js') }}
@stop

@section('content')
	<div class="container">
		<h1><i class="icon-clipboard-2 on-left"></i> Resultados</h1>
		<div class="example">
			<div class="fluent-menu" data-role="fluentmenu">
                        <ul class="tabs-holder">
                            <li class="active"><a href="#tab_resultados">Filtrar Resultados</a></li>
                            <li><a href="#tab_reportes">Reportes</a></li>
                            <li><a href="#tab_estadisticas">Estadisticas</a></li>
                        </ul>

                        <div class="tabs-content">
                            <div class="tab-panel" id="tab_resultados" style="display: block;">
                                <div class="tab-panel-group">
                                    <div class="tab-group-content">
                                    	<label>Seleccionar Test:</label>
                                        <div class="input-control select">
										    {{ Form::select('',array('iprd' => 'IPRD'),  '', 
				                				array('id' => 'test')) }}
										</div>

                                    </div>
                                    <div class="tab-group-caption">Seleccionar Test</div>
                                </div>
                                <div class="tab-panel-group">
                                    <div class="tab-group-content">
                                        <div class="tab-content-segment">
		                                    <label>De:</label>
		                                    <div class="input-control text" id="dpFechaInicial">
											    <input  id="fechaInicial" type="text">
											    <button class="btn-date"></button>
											</div>
											
										</div>
										<div class="tab-content-segment">
										<label>A:</label>
											<div  class="input-control text" id="dpFechaFinal">
											    <input id="fechaFinal" type="text">
											    <button class="btn-date"></button>
											</div>
										</div>
										
                                    </div>
                                    <div class="tab-group-caption">Filtrar por Fecha</div>
                                </div>
                                <div class="tab-panel-group">
                                    <div class="tab-group-content">
                                    	<label>Seleccionar Deporte:</label>
                                        <div id="sportDiv" class="input-control select">
								            {{ Form::select('', $sports, '', 
								                            array('id' => 'sport', 'class' => 'input-control select')) }}
								        </div>
                                    </div>
                                    <div class="tab-group-caption">Filtrar por Deporte</div>
                                </div>
                                <div class="tab-panel-group">
                                    <div class="tab-group-content">
                                        {{ Form::label('gender','Genero') }}
								        <div  class="input-control select">
								            {{ Form::select('',array('1' => 'Hombre', '2' => 'Mujer'),  '', 
								                array('id' => 'gender', 'class' => 'input-control select')) }}
								        </div>
                                    </div>
                                    <div class="tab-group-caption">Filtrar por Sexo</div>
                                </div>
                                <div class="tab-panel-group">
                                    <div class="tab-group-content">
                                        <button id="search" class="fluent-big-button">
                                                <span class="icon-filter"></span>
                                                <span class="button-label">Buscar</span>
                                        </button>
                             
                                    </div>
                                    <div class="tab-group-caption">Buscar</div>
                                </div>
                            </div>

                            <div class="tab-panel" id="tab_reportes" style="display: none;">
                            </div>

                            <div class="tab-panel" id="tab_estadisticas" style="display: none;">
                            </div>
                        </div>
                    </div>
             </br>
            <div class="example">            	
            	<table id="table" class="table striped hovered dataTable bordered" cellspacing="0" width="100%">
            		<thead>
			            <tr>
			                <th>Nombre</th>
			                <th>Apellido Paterno</th>
			                <th>Apellido Materno</th>
			                <th>Genero</th>
			                <th>Fecha de Nacimiento</th>
			                <th>Autoconfianza</th>
			                <th>Afrontamiento Negativo</th>
			                <th>Atencional</th>
			                <th>Visual Imaginativo</th>
			                <th>Nivel Motivacion</th>
			                <th>Afrontamiento Positivo</th>
			                <th>Autoestima</th>
			            </tr>
			        </thead>
			 
			        <tfoot>
			            <tr>
			                <th>Nombre</th>
			                <th>Apellido Paterno</th>
			                <th>Apellido Materno</th>
			                <th>Genero</th>
			                <th>Fecha de Nacimiento</th>
			                <th>Autoconfianza</th>
			                <th>Afrontamiento Negativo</th>
			                <th>Atencional</th>
			                <th>Visual Imaginativo</th>
			                <th>Nivel Motivacion</th>
			                <th>Afrontamiento Positivo</th>
			                <th>Autoestima</th>
			            </tr>
			        </tfoot>
			    </table>
            </div>
            <button id="button"> Click</button>
		</div>
	</div>
	<script>

	$( document ).ready(function() {
		
		var today = new Date();

		$("#dpFechaInicial").datepicker({
	        date: today.toString(), // set init date
	        format: "yyyy-mm-dd", // set output format
	        effect: "fade", // none, slide, fade
	        position: "bottom", // top or bottom,
	        locale: 'es', // 'ru' or 'en', default is $.Metro.currentLocale
	    });

		$("#dpFechaFinal").datepicker({
			        date: today.toString(), // set init date
			        format: "yyyy-mm-dd", // set output format
			        effect: "fade", // none, slide, fade
			        position: "bottom", // top or bottom,
			        locale: 'es', // 'ru' or 'en', default is $.Metro.currentLocale
			    });
		

    	$("#search").click(function(event) {
    		
    		var filter = {};


    		filter.test = $("#test").val();
    		filter.fechainicial = $("#fechaInicial").val();
    		filter.fechafinal = $("#fechaFinal").val();
    		filter.deporte = $("#sport").val();
    		filter.genero = $("#gender").val();
		

			$.post('results/getResults', filter, function(data)
	            {
	            	var test = {};

	            	test.data = JSON.parse(data)

	            	if ( $.fn.dataTable.isDataTable( '#table' ) ) {
					    table = $('#example').DataTable();
					}
					else
					{
						var table = $('#table').dataTable( {
		            		"dom": 'T<"clear">lfrtip',
					        "data": test.data,
					        "scrollX": true,
					        "columns": [
					            { "data": "name" },
					            { "data": "firstSurname" },
					            { "data": "secondSurname" },
					            { "data": "genero" },
					            { "data": "birthday", "class": "center" },
					            { "data": "aconfianza", "class": "center" },
					            { "data": "anegativo", "class": "center" },
					            { "data": "atencional", "class": "center" },
					            { "data": "vimaginativo", "class": "center" },
					            { "data": "nmotivacion", "class": "center" },
					            { "data": "apositivo", "class": "center" },
					            { "data": "autestima", "class": "center"}
					        ]
					    } );
					}

				    $('#table tbody').on('click', 'tr', function () {
				        var name = $('td', this).eq(0).text();
				        //alert( 'You clicked on '+name+'\'s row' );
				    } );
	            }
	            );


	    	});
	});
		
	</script>
@stop