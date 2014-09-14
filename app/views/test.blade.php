@extends('layouts.master')


@section('dependencies')
    
    {{ HTML::script('js/jquery/jquery.mousewheel.js') }}
    {{ HTML::script('js/local/profiles.js') }}
    {{ HTML::script('js/local/tests.js') }}
    {{ HTML::script('js/local/sidepanel.js') }}

@stop

@section('content')
    <div class="container">
        <div class="grid">

            <div class="row">
                <div class="span3 no-tablet-portrait">
                    <div id="panel" class="panel" data-role="panel" style="position:relative; top: 95px; width:200px;">
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
                    @if(Auth::user()->isAdmin())
                    <h1>Hacer test a deportista</h1>
                    <p>Hola {{  Auth::user()->name  }} si desea hacer el test de un atleta, introduzca el correo que el este se  registro en el sistema,
                        si es la primera vez que se hara el test para este atleta puedes registrarlo {{ HTML::link('/register','aqui'); }}. </p>
                        <div class="example">
                            
                            <legend>Datos requeridos</legend>
                            @if (Session::get('message'))
                                <div class="notice marker-on-bottom bg-amber fg-white">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            {{ Form::open(array('url' => 'searchAthlete/' . $title)) }}
                            
                                <fieldset>
                                    {{ Form::label('email','Correo') }}
                                        <div class="input-control text" data-role="input-control">
                                        <!-- '' o  Input::old('email') -->
                                        {{ Form::email('email',Input::old('email'),array('placeholder' => 'juanitobanana@gmail.com','autofocus'=>'autofocus','required'=>'required')) }}

                                </fieldset>
                                {{ Form::submit('Buscar',array('class' => 'btn-clear')) }}
                            {{ Form::close() }}
                        </div>
                    @endif
                    <h1><i class="icon-pencil on-left"></i>{{{ $title }}}</h1>
                    <div class="row">

                        <div class="span9">
                            @include('subviews.profile', array
                            (
                                'roles'   => $roles, 
                                'states'  => $states,
                                'cities'  => $cities,
                                'sports'  => $sports,
                                'fields'  => $fields,
                                'profile' => $profile
                            ))
                        </div>
                    </div>
                    <div class="row">
                        <div class="span9">
                            <p class="description bg-grayLighter padding20">Por favor lea cada pregunta y responda de manera correcta.</p>
                            <br>
                            <br>
                            {{ Form::open(array('url' => 'sendTest')) }}            
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
                                {{ Form::hidden('_email', $email) }}
                            {{ Form::close() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop