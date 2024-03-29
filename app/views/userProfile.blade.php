@extends('layouts.master')

@section('dependencies')
	{{ HTML::script('js/jquery/jquery.mousewheel.js') }}
	{{ HTML::script('js/metro-wizard.js') }}
    {{ HTML::script('js/metro-calendar.js') }}
    {{ HTML::script('js/metro-datepicker.js') }}
	{{ HTML::script('js/local/wizard.js') }}
    {{ HTML::script('js/local/notifier.js') }}
    {{ HTML::script('js/local/profiles.js') }}
@stop

@section('content')
<div class="container">
	<div class="example">
		<div class="grid fluid">
			<h1><i class="icon-pencil on-left"></i>Editar Perfil</h1>
			<fieldset>
            <div class="row">
                <div class="span6">
                	<div class="example">
                    	<legend>Información de Acceso</legend>
						{{ Form::label('email','Correo Electronico') }}
				        <div class="input-control text" data-role="input-control">
				            {{ Form::email('email', $user->email, array('id' => 'email', 'placeholder' => 'ejemplo@ejemplo.com','autofocus'=>'autofocus','required'=>'required')) }}
				        </div>
				        </br></br></br></br>
				        <button id="changepass" class="large primary"><i class="icon-locked on-left"></i>Cambiar contraseña</button>
					   <!--{{ Form::label('password','Contraseña') }}
				        <div class="input-control password" data-role="input-control">
				            {{ Form::password('password', '',  "$user->password",array('id' => 'password', 'autofocus'=>'autofocus','required'=>'required')) }}
				            <button class="btn-reveal" tabindex="-1" type="button"></button>
				        </div>
				        {{ Form::label('passconfirm','Confirmar contraseña') }}
				        <div class="input-control password" data-role="input-control">
				            {{ Form::password('passconfirm',array('id' => 'passconfirm','autofocus'=>'autofocus','required'=>'required')) }}
				            <button class="btn-reveal" tabindex="-1" type="button"></button>
				        </div-->
				    </br></br></br></br></br></br></br></br></br></br>
			        </div>
   				</div>
   				<div class="span6">
   					<div class="example">
   						<legend>Información Básica</legend>
				        {{ Form::label('name','Nombre')}}
				        <div class="input-control text" data-role="input-control">
				            {{ Form::text('name', $user->name,array('id' => 'name'))}}
				        </div>
				    	{{ Form::label('firstSurname','Apellido Paterno') }}
				        <div class="input-control text" data-role="input-control">
				            {{ Form::text('firstSurname', $user->firstSurname, array('id' => 'firstSurname')) }}
				        </div>
				    	{{ Form::label('secondSurname','Apellido Materno') }}
				        <div class="input-control text" data-role="input-control">
				            {{ Form::text('secondSurname', $user->secondSurname, array('id' => 'secondSurname')) }}
				        </div>
				    	{{ Form::label('birthday','Fecha de Nacimiento') }}
				        <div class="input-control text" data-role="datepicker" data-format="yyyy-mm-dd">
				            {{ Form::text('birthday', $user->birthday, array('id' => 'birthday'))}}
				            <button class="btn-date"></button>
				        </div>
				    	{{ Form::label('gender','Genero') }}
				        <div  class="input-control select">
				            {{ Form::select('',array('1' => 'Hombre', '2' => 'Mujer'),  $user->idGender, 
				                array('id' => 'gender', 'class' => 'input-control select')) }}
				        </div>
   					</div>
   				</div>
   			</div>
   			@if(!Auth::user()->isAdmin())
                <div class="row">
                    <div class="span6">
                        <div class="example">
                            <legend>Información de Locación</legend>
                            {{ Form::label('stateDiv','Estado') }}
                            <div id="stateDiv" class="input-control select">
                            {{ Form::select('', $states, $profile->city->state->idState, 
                                array('id' => 'state', 'class' => 'input-control select')) }}
                            </div>
                              <!-- Municipio -->
                            {{ Form::label('cityDiv','Municipio') }}                        
                            <div id="cityDiv" class="input-control select">
                                {{ Form::select('', $cities, $profile->city->idCity, 
                                                array('id' => 'city', 'class' => 'input-control select')) }}
                            </div>
                            <!-- Deporte -->
                            {{ Form::label('sportDiv','Deporte') }}
                            <div id="sportDiv" class="input-control select">
                                {{ Form::select('', $sports, $profile->idSport, 
                                                array('id' => 'sport', 'class' => 'input-control select')) }}
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="example">
                            <legend>Información Deportiva</legend>
                            <div id="fields">
                            <!-- Campos específicos al deporte -->
                            @foreach ($fields as $field)
                                @if ($field['isTopLevel'] == true)
                                    <label>{{{ $field['name'] }}}</label>
                                @endif
                                <div class="input-control select">
                                    {{ Form::select('', $field['values'], $field['selected'], 
                                                    array('id' => $field['id'], 'class' => 'input-control select')) }}
                                </div>
                            @endforeach
                            </div>
                        </br>
                        </div>
                    </div>
                </div>
   			@endif
       		</fieldset>
       		<div class="row">
       			<button class="primary large success" id="saveChanges"><i class="icon-checkmark on-left big"></i>Guardar cambios</button>
       		</div>
       	</div>	
	</div>
</div>
<script >
	var note = new Notifier();

	$("#saveChanges").click(function(event) {
		/* Act on the event */
		var data = {};
        var savedFields = [];
        var field;

        data.email = $("#email").val();
        data.password = $("#password").val();
        data.passconfirm = $("#passconfirm").val();
        
        data.name = $("#name").val();
        data.firstSurname = $("#firstSurname").val();
        data.secondSurname = $("#secondSurname").val();
        data.birthday = $("#birthday").val();
        data.gender = $("#gender").val();

        data.city = $('#city').val();
        data.sport = $('#sport').val();

        data.values = [];

        $("select[id^='valueOf-']").each(function (index, select)
        {
            field = getPrefix(select);
            
            if (savedFields.indexOf(field) == -1)
            {
                savedFields.push(field);
                data.values.push($(getLowerLevelSelect(field)).val());
            }
        });



        $.post('saveUserProfile', data, function(data)
                {
                	if(data == 23000)
                	{
                		note.showAlert("Atención", "Ese correo electrónico no está disponible, por favor selecciona otro")
                	}
                	else
                	{
                		if(data.type == "error")
	                	{
	                		note.showError(data.caption, data.content);
	                	}
	                	else if (data.type == "alert")
	                	{
	                		note.showAlert(data.caption, data.content);
	                	}
	                	else if(data.type == "validation")
	                	{
	                		$.each(data.content, function(index, val) {
	                			 /* iterate through array or object */
	                			 note.showError(data.caption, val);
	                		});
	                	}
	                	else
	                	{
	                		note.showSuccess(data.caption, data.content, function()
                            {
                                window.location = "{{ URL::to('userProfile') }}";
                            });
	                	}
                	}

                });
		
	});
	$("#changepass").click(function(event) {
		/* Act on the event */
		$.Dialog({
        overlay: true,
        shadow: true,
        flat: true,
        icon: '',
        title: '<label style="width:100%; padding:0; font-size:14pt;"><i class="icon-locked on-left big"></i>Cambiar contraseña</label>',
        content: '',
        padding: 10,
        width: 600,
        onShow: function(_dialog){
        	//build form
        	var layout_div = $('<div class="example" style="height:auto;"></div>');
        	var btn_change = $('<button class="primary large success"><i class="icon-checkmark on-left big"></i>Cambiar</button>');
        	/*--------------------------------------------------------------*/
        	var lbl_currPass = document.createElement('label');
        	$(lbl_currPass).html("Introduce tu contraseña actual");

        	var inputDiv_currPass = $('<div class="input-control text"></div>');
        	var input_currPass = $('<input type="password" name="currPassword" class="input-control"/>');
        	$(inputDiv_currPass).append(input_currPass);

        	/*--------------------------------------------------------------*/
        	var lbl_newPass = document.createElement('label');
        	$(lbl_newPass).html("Introduce la nueva contraseña");

        	var inputDiv_newPass = $('<div class="input-control text"></div>');
        	var input_newPass = $('<input type="password" name="newPassword" class="input-control"/>');
        	$(inputDiv_newPass).append(input_newPass);

        	/*--------------------------------------------------------------*/

        	var lbl_newPassConfirm = document.createElement('label');
        	$(lbl_newPassConfirm).html("Confirma la nueva contraseña");

        	var inputDiv_newPassConfirm = $('<div class="input-control text"></div>');
        	var input_newPassConfirm = $('<input type="password" name="newPasswordConfirm" class="input-control"/>');
        	$(inputDiv_newPassConfirm).append(input_newPassConfirm);

        	/*--------------------------------------------------------------*/
        	$(layout_div).append(lbl_currPass).append(inputDiv_currPass);
        	$(layout_div).append(lbl_newPass).append(inputDiv_newPass);
        	$(layout_div).append(lbl_newPassConfirm).append(inputDiv_newPassConfirm);
        	$(layout_div).append(btn_change);
            
            $.Dialog.content(layout_div);

            $(btn_change).click(function(event) {
            	/* Act on the event */
            	//$.Dialog.close();

            	var data = {};

            	data.currPass = $(input_currPass).val();
            	data.newPass = $(input_newPass).val();

            	if($(input_newPass).val() == $(input_newPassConfirm).val())
            	{
            		$.post('changePassword', data, function(data)
	            	{
	            		
	            		if(data.type == 'alert')
	            		{
	            			note.showAlert(data.caption, data.content);
	            		}
	            		else if(data.type == "validation")
	                	{
	                		$.each(data.content, function(index, val) {
	                			 /* iterate through array or object */
	                			 note.showError(data.caption, val);
	                		});
	                	}
	            		else if(data.type == 'error')
	            		{
	            			note.showError(data.caption, data.content);
	            		}
	            		else
	            		{
	            			$.Dialog.close();
	            			note.showSuccess(data.caption, data.content, function()
	            				{
//	            					window.location="{{URL::to('logout')}}";
	            				});
	            		}
	            		
	            	});
            	}
            	else
            	{
            		note.showAlert('Error!', 'La confirmación de la nueva contraseña no coincide');
            	}
            });
            //$.Metro.initInputs();
        }
		});
	});
</script>
@stop