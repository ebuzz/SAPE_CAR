@extends('layouts.master')


@section('dependencies')
	{{ HTML::script('js/metro-listview.js') }}
	{{ HTML::script('js/select2.js') }}
	{{ HTML::script('js/local/notifier.js') }}
	{{ HTML::style('css/select2.css') }}
	{{ HTML::style('css/select2-bootstrap.css') }}
@stop


@section('content')
	<div class="container">
		<h1>Usuarios</h1>
		<div class="example">
			<div class="grid fluid">
				<div class="row">
					<div class="span7">
						<div class="example">

							<legend><h2>Buscar usuario</h2></legend>
							<div class="input-control text" data-role="input-control">
                                    <input type="text" id="e6" style="width:500px" value="0"/>
                            </div>
						</div>
					</div>
					<div class="span5">
						<div class="example" >
							<legend><h2>Datos del usuario</h2></legend>
							<div id="userdata">

							</div>
							<!--label id="email">Correo: <label>
							<label id="name">Nombre: </label>
							<label id="firstSurname">Apellido Paterno: </label>
							<label id="secondSurname">Apellido Materno: </label-->

						</br></br>
							<button onclick="reset()"class="primary large success"><i class="icon-spin on-left"></i>Reestablecer Contraseña</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>

		function reset()
		{
			$("#newpass").remove();
			var user = {};
			var note = new Notifier();
			user.no = $("#e6").val();
			$.post("resetPassword", user,function(data) {
				if(data.type == "error")
				{
					note.showError(data.caption, data.content);
				}
				else
				{
					note.showSuccess(data.caption, data.content);

					var lbl_pass = $("<h3 id='newpass'>Nueva Contraseña: <span style='color: #ff0000'>"+data.data+"</span> </h3>");

					$("#userdata").prepend(lbl_pass);
				}
			});
		}
		$(document).ready(function() {

			
			function fillData(user)
			{
				var lbl_email  = $("<label>Correo Electrónico: "+user.email+"<label>");
				var lbl_name  = $("<label>Nombre: "+user.name+"<label>");
				var lbl_firstSurname  = $("<label>Apellido Paterno: "+user.firstSurname+"<label>");
				var lbl_secondSurname  = $("<label>Apellido Materno: "+user.secondSurname+"<label>");

				$("#userdata").html('');
				$("#userdata").append(lbl_email);
				$("#userdata").append(lbl_name);
				$("#userdata").append(lbl_firstSurname);
				$("#userdata").append(lbl_secondSurname);
			}

			$("#e6").select2({
		        minimumInputLength: 2,
		        ajax: {
		            url: "getUsers",
		            type: "POST",
		            dataType: 'json',
		            quietMillis: 100,
		            data: function(term, page) {
		                return {
		                    term: term
		                };
		            },
		            results: function(data, page ) {
		            	
		                return { results: data }
		            }
		        },
		        //Funcion que muestra los resultados (da formato a los resultados)
		        formatResult: function(users) {
		         	
		         	listview = $("<div class='listview-outlook' data-role='listview'></div>");
		         	listitem = $("<a class='list'></a>");
		         	listcontent = $("<div class='list-content'></div>");

		         	listmail = $("<span class='list-title'>"+users.results.email+"<span>");
		         	listname = $("<span class='list-subtitle'>"+users.results.name + " "+users.results.firstSurname+"</span>");
		         	
		         	$(listcontent).append(listmail);
		         	$(listcontent).append(listname);
		         	$(listitem).append(listcontent);
		         	$(listview).append(listitem);

		            return listview; //"<div class='select2-user-result'>" + users.term + "</div>";
		        },
		        //Funcion que muestra el texto en el input
		        formatSelection: function(users) {
		        	fillData(users.results);
		        	return users.results.name + " " + users.results.firstSurname;
		            
		        }/*,
		        //Funcion que se lanza al iniciar el componente para que pueda ser visible.
		        initSelection : function (element, callback) {
		            callback({"term":"", "results":{"name": "", "firstSurname":""}});
		        }*/
		    });
		});
	</script>
@stop