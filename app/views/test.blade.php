@extends('layouts.master')


@section('dependencies')
    
    {{ HTML::script('js/jquery/jquery.mousewheel.js') }}
    {{ HTML::script('js/local/profiles.js') }}
    {{ HTML::script('js/local/sidepanel.js') }}
    {{ HTML::script('js/local/tests.js') }}
    {{ HTML::script('js/local/notifier.js') }}

@stop

@section('content')
    <div class="container">
        <div class="grid">

            <div class="row">
                <div class="span3 no-tablet-portrait">
                    <div id="panel" class="panel" data-role="panel" style="display:none; position:relative; top: 95px; width:200px;">
                        <div class="panel-header">
                            Indicaciones
                        </div>
                        <div class="panel-content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type 
                            specimen book.
                            <br>
                            <br>
                            <b id="progress-data">0/0</b>
                            <div id="progress-bar" class="progress-bar large"></div>
                        </div>
                    </div>
                </div>
                <div class="span9">
                    <h1><i class="icon-pencil on-left"></i>{{{ $title }}}</h1>
                    <hr>
                    @if (Session::get('testSuccessMessage'))
                        <div class="notice marker-on-top bg-green fg-white">
                            {{ Session::get('testSuccessMessage') }}
                        </div>
                    @elseif (Session::get('testErrorMessage'))
                        <div class="notice marker-on-top bg-red fg-white">
                            {{ Session::get('testErrorMessage') }}
                        </div>
                    @endif
                    @if(Auth::user()->isAdmin())
                        <h1>Hacer test a deportista</h1>
                        <p>Hola {{  Auth::user()->name  }}, si desea hacer el test de un atleta, introduzca el correo con el que este se registró en el sistema,
                            si es la primera vez que se hará el test para este atleta puedes registrarlo {{ HTML::link('signup','aquí'); }}. </p>
                        <div class="example">                
                            <legend>Datos requeridos</legend>
                            @if (Session::get('message'))
                                <div class="notice marker-on-bottom bg-amber fg-white">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            {{ Form::open(array('url' => 'test/' . $title)) }}
                                <fieldset>
                                    {{ Form::label('email','Correo') }}
                                    <div class="input-control text" data-role="input-control">
                                        <!-- '' o  Input::old('email') -->
                                        {{ Form::email('email',Input::old('email'),array('placeholder' => 'ejemplo@ejemplo.com','autofocus'=>'autofocus','required'=>'required')) }}
                                    </div>
                                </fieldset>
                                {{ Form::submit('Buscar',array('class' => 'btn-clear')) }}
                            {{ Form::close() }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="span9">
                            @if (isset($profileData))
                                @include('subviews.profile', $profileData)
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="span9">
                            @if (isset($questions))             
                                <div id="questions" style="display:none;">
                                    <p class="description bg-grayLighter padding20">Por favor lea cada pregunta y responda de manera correcta.</p>
                                    <br>
                                    <br>
                                    {{ Form::open(array('url' => 'sendTest/' . $title)) }}            
                                        @foreach ($questions as $question)
                                            <div id="{{ 'question-container-' . $question['number'] }}">
                                                <legend>{{ $question['number'] . '. ' . $question['description'] }}</legend>
                                                @foreach ($question['answers'] as $answer)
                                                <div class="input-control radio default-style margin10" data-role="input-control">
                                                    <label>
                                                        {{ $answer['description'] }}
                                                        {{ Form::radio('question-' . $question['number'], $answer['idTestAnswer'], false, 
                                                                       array
                                                                       (
                                                                           'id'       => 'question-' . $question['number'],
                                                                           'required' => ''
                                                                       )) }}
                                                        <span class="check"></span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        <br>
                                        <br>
                                        @endforeach
                                        <br>
                                        <button class="button success large"><i class="icon-checkmark on-left"></i>Enviar</button>
                                    {{ Form::close() }} 
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop