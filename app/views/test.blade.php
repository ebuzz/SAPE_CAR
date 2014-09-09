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
                            <b>10/30</b>
                            <div id="progress" class="progress-bar large"></div>
                        </div>
                    </div>
                </div>
                <div class="span9">
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
                            <form>
                                <fieldset>
                                    <legend>1. Siento que estoy logrando muchas cosas que valen la pena en mi deporte.</legend>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            Casi nunca
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            Pocas veces
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            Algunas veces
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            A menudo
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            Casi siempre
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <legend>2. Me siento tan cansado de mis entrenamientos que tengo problemas al encontrar energía para hacer otras cosas</legend>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            Casi nunca
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            Pocas veces
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            Algunas veces
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            A menudo
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="input-control radio default-style margin10" data-role="input-control">
                                        <label>
                                            Casi siempre
                                            <input type="radio" name="r3" checked="">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <button class="button success large"><i class="icon-checkmark on-left"></i>Enviar</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop