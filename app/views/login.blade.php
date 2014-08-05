@extends('layouts.master')

@section('dependencies')

@stop

@section('content')
<div class="content">
            
        <!-- Tiles de colores -->
        <div class="container">
            <h1 id="_default"><i class="icon-accessibility on-left"></i>Inicia sesion</h1>
            <div class="grid fluid">
                <div class="row">
                    <div class="span7">
                        <div class="example">
                        	<legend>Introduce tus datos</legend>
                            {{ Form::open(array('url' => 'login')) }}
                            <!-- Validacion si no hay javascript -->
                            <p>
                                {{ $errors->first('email') }}
                                {{ $errors->first('password') }}

                                @if (Session::get('message'))
                                <div class="notice marker-on-bottom bg-amber fg-white">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                            </p>
                            	<fieldset>
                                	{{ Form::label('email','Correo') }}
                                	<div class="input-control text" data-role="input-control">
                                    <!-- '' o  Input::old('email') -->
                                	{{ Form::email('email',Input::old('email'),array('placeholder' => 'juanitobanana@gmail.com','autofocus'=>'autofocus','required'=>'required')) }}
                                    
                                    <button class="btn-clear" tabindex="-1" type="button"></button>
                                	</div>

                                	{{ Form::label('password','Contraseña') }}
                                	<div class="input-control password">
                                	{{ Form::password('password',array('autofocus'=>'autofocus','required'=>'required')) }}
                                    <button class="btn-reveal" tabindex="-1" type="button"></button>
                                	</div>
                            	    <div class="input-control checkbox" data-role="input-control">
                                        <label>
                                        {{ Form::checkbox('remember', 'value') }}
                                        <span class="check"></span>
                                        Recuerdame(gansito)
                                        </label>
                                    </div>
                                </br>
                                	{{ Form::submit('Enviar',array('class' => 'btn-clear')) }}
                                    
                                    </fieldset>
                            {{ Form::close() }}
                    	</div>
                    </div>

                    <div class="span4">
                        <div class="panel">
                            <div class="panel-header">
                                Acceso
                            </div>
                            <div class="panel-content">
                                <ul>
                                <li>El acceso solo es a usuarios registrados, si aun no tienes tu cuenta da click <a href="register">aqui</a>.</li>
                                <li>Si tienes problemas para accesar u olvidaste tu contraseña da click <a href="#">aqui</a>.</li>
                            </ul>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

@stop