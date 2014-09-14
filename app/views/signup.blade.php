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

<div class="container" >
        <h1>
            <a href="/"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
            Registrarse
        </h1>

        <div class="example">
            <fieldset>
                <div class="wizard" id="wizard">
                    <div class="steps">
                        <div class="step"><legend>Información de Acceso</legend>
                            {{ Form::label('email','Correo Electronico') }}
                            <div class="input-control text" data-role="input-control">
                                {{ Form::email('email',Input::old('email'), array('id' => 'email', 'placeholder' => 'ejemplo@ejemplo.com','autofocus'=>'autofocus','required'=>'required')) }}
                            </div>
                           {{ Form::label('password','Contraseña') }}
                            <div class="input-control password" data-role="input-control">
                                {{ Form::password('password',array('id' => 'password','autofocus'=>'autofocus','required'=>'required')) }}
                                <button class="btn-reveal" tabindex="-1" type="button"></button>
                            </div>
                            {{ Form::label('passconfirm','Contraseña') }}
                            <div class="input-control password" data-role="input-control">
                                {{ Form::password('passconfirm',array('id' => 'passconfirm','autofocus'=>'autofocus','required'=>'required')) }}
                                <button class="btn-reveal" tabindex="-1" type="button"></button>
                            </div>
                        </div>
                        <div class="step"><legend>Información Básica</legend>
                            {{ Form::label('name','Nombre')}}
                            <div class="input-control text" data-role="input-control">
                                {{ Form::text('name', '',array('id' => 'name'))}}
                            </div>
                            {{ Form::label('firstSurname','Apellido Paterno') }}
                            <div class="input-control text" data-role="input-control">
                                {{ Form::text('firstSurname', '', array('id' => 'firstSurname')) }}
                            </div>
                            {{ Form::label('secondSurname','Apellido Materno') }}
                            <div class="input-control text" data-role="input-control">
                                {{ Form::text('secondSurname', '', array('id' => 'secondSurname')) }}
                            </div>
                            {{ Form::label('birthday','Fecha de Nacimiento') }}
                            <div class="input-control text" data-role="datepicker" data-format="yyyy-mm-dd">
                                {{ Form::text('birthday', '', array('id' => 'birthday'))}}
                                <!--button class="btn-date"></button-->
                            </div>
                            {{ Form::label('gender','Genero') }}
                            <div  class="input-control select">
                                {{ Form::select('', array('1' => 'Hombre', '2' => 'Mujer'), '', 
                                    array('id' => 'gender', 'class' => 'input-control select')) }}
                            </div>
                        </div>
                        <div class="step"><legend>Información de Locación</legend>
                            {{ Form::label('stateDiv','Estado') }}
                            <div id="stateDiv" class="input-control select">
                            {{ Form::select('', $states, '', 
                                array('id' => 'state', 'class' => 'input-control select')) }}
                            </div>
                              <!-- Ciudad -->
                            {{ Form::label('cityDiv','Ciudad') }}                        
                            <div id="cityDiv" class="input-control select">
                                {{ Form::select('', $cities, '', 
                                                array('id' => 'city', 'class' => 'input-control select')) }}
                            </div>
                            <!-- Deporte -->
                            {{ Form::label('sportDiv','Deporte') }}
                            <div id="sportDiv" class="input-control select">
                                {{ Form::select('', $sports, '', 
                                                array('id' => 'sport', 'class' => 'input-control select')) }}
                            </div>
                        </div>
                        <div class="step"><legend>Información Deportiva</legend>
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
                        </div>

                    </div>
                </div>
            </fieldset>
    	</div>
</div>
@stop