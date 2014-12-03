@extends('layouts.master')

@section('dependencies')
	{{ HTML::script('js/jquery/jquery.mousewheel.js') }}
	{{ HTML::script('js/metro-fluentmenu.js') }}
    {{ HTML::script('js/metro-calendar.js') }}
    {{ HTML::script('js/metro-datepicker.js') }}
    {{ HTML::script('js/local/notifier.js') }}
    {{ HTML::script('js/jquery/jquery.dataTables.js') }}
    {{ HTML::script('js/jquery/dataTables.tableTools.js') }}
@stop

@section('content')
	<div class="container">
		<h1><i class="icon-clipboard-2 on-left"></i> Resultados</h1>
		<div class="example">
			<div class="fluent-menu" data-role="fluentmenu" >
                        <ul class="tabs-holder">
                            <li class="active"><a href="#tab_results">Filtrar Resultados</a></li>
                            <li id="reports_tab"><a  href="#tab_reports" >Reportes y Estadisticas</a></li>
                        </ul>
                        <div class="tabs-content" >
                            <div class="tab-panel" id="tab_results" style="display: block;">
                                <div class="tab-panel-group">
                                    <div class="tab-group-content">
                                    	<label>Seleccionar Test:</label>
                                        <div class="input-control select">
										    {{ Form::select('',$tests,  '', 
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
								            {{ Form::select('', array('-1' => 'Sin especificar', '1' => 'Hombre', '2' => 'Mujer'),  '', 
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

                            <div class="tab-panel" id="tab_reports" style="display: none;">
                                <div id="charts" class="tab-panel-group">
                                    <button id="btn_chart" class="fluent-big-button">
                                                <span class="icon-bars"></span>
                                                <span class="button-label">Gráfica</span>
                                    </button>
                                    <div class="tab-group-caption">Ver</div>
                                </div>
                                <div id="reports" class="tab-panel-group">
                                    
                                </div> 
                            </div>
                        </div>
                    </div>
             </br>
            <div class="example" id="resultsTable" style="position:relative">            	
            </div>
		</div>
	</div>
	<script>
    var note = new Notifier();

    function createTableTools()
    {
        
        var customMessage = "Resultados "+$("#test option:selected").text()+" - Cuestionarios realizados del "+$("#fechaInicial").val()+" al "+$("#fechaFinal").val();
        
        //Create table tools              
        var tableTools = new $.fn.dataTable.TableTools( table, {
            "sSwfPath":"js/copy_csv_xls_pdf.swf",
            "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF",
                    "sPdfMessage": customMessage,
                    "sToolTip": "Save as PDF",
                    "sPdfOrientation": "landscape",
                    "sButtonClass": "button fluent-big-button",
                    "fnInit": function ( nButton, oConfig ) {
                        $(nButton).prepend('<span class="icon-file-pdf"></span>');
                    },
                    "fnComplete": function ( nButton, oConfig, oFlash, sFlash ) {
                        note.showSuccess('Exito!','La tabla se ha guardado en PDF.' );
                    }
                },
                {
                    "sExtends": "xls",
                    "sButtonText": "Excel",
                    "sButtonClass": "button fluent-big-button",
                    "fnInit": function ( nButton, oConfig ) {
                        $(nButton).prepend('<span class="icon-file-excel"></span>');
                    },
                    "fnComplete": function ( nButton, oConfig, oFlash, sFlash ) {
                        note.showSuccess('Exito!','La tabla se ha guardado en CVS.' );
                    }
                }]
        });
        $( '#reports' ).append(tableTools.fnContainer());
        $( '#reports' ).append('<div class="tab-group-caption">Descargar</div>');
    }

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
        
        // Opción de "Sin especificar" a Deporte
        var sportSelect = $("#sport");
        sportSelect.prepend(new Option("Sin especificar", -1));
        $(sportSelect).val(-1);
		
    	$("#search").click(function(event) 
        {
    		var filter = {};
    		filter.testName = $("#test").val();
    		filter.startDate = $("#fechaInicial").val();
    		filter.endDate = $("#fechaFinal").val();
    		filter.sport = $("#sport").val();
    		filter.gender = $("#gender").val();

            //call for data
            $.post('results/getResults', filter, function(data)
            {
                var test = {};
                var table;
                
                test = JSON.parse(data);

                if  ($.fn.dataTable.isDataTable('#table'))  
                {
                    table = $('#table').DataTable();
                    table.destroy();
                    $('#table').remove();
                }

                //create table
                var html_table = $('<table id="table" class="table striped hovered dataTable bordered" cellspacing="0" width="100%"></table>');

                //append table to div
                $('#resultsTable').append(html_table);

                //Create data table
                table = $('#table').dataTable( {
                    "data": test.data,
                    "scrollX": true,
                    "columns": test.columns
                });

                createTableTools();
                    //$( tableTools.fnContainer() ).insertAfter('#reportes');
/*
                    $('#table tbody').on('click', 'tr', function () {
                        var name = $('td', this).eq(0).text();
                        //alert( 'You clicked on '+name+'\'s row' );
                    } );*/

                $("#reports_tab").click(function(event) {
                    //Get instance
                    var ttools = TableTools.fnGetInstance( 'table' );
                    if(ttools.fnResizeRequired())
                    {
                        ttools.fnResizeButtons();   
                    }
                });
            });
	    });
        
        $("#btn_chart").click(function(event) 
        {
            var testName = $("#test").val();
    		var startDate = $("#fechaInicial").val();
    		var endDate = $("#fechaFinal").val();
    		var sport = $("#sport").val();
    		var gender = $("#gender").val();
            
            var link = "{{ url('results/chart'); }}";
            
            link += "?test=" + testName;
            link += "&startDate=" + startDate;
            link += "&endDate=" + endDate;
            link += "&sport=" + sport;
            link += "&gender=" + gender;
            
            popupCenter(link, "Gráfica", 950, 600);
        });
	});
 
    function popupCenter(pageURL, title, w, h) 
    {
        var left = (screen.width / 2) -(w / 2);
        var top = (screen.height / 2) -(h / 2);
        var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }
		
	</script>
@stop