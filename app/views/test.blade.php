@extends('layouts.master')


@section('dependencies')

@stop


@section('content')
    <div class="container">
        <h1>{{{ $title }}}</h1>
        <div class="grid">
            <div class="row">
                <div class="span3 no-tablet-portrait">
                    <nav>
                        <ul class="side-menu" style="position: fixed; top: 125px; z-index: 1000;">
                            <li><a href="#_checkbox">Checkboxes</a></li>
                            <li><a href="#_radio">Radio buttons</a></li>
                            <li><a href="#_switch">Switch control</a></li>
                            <li><a href="#_input">Input controls</a></li>
                            <li><a href="#_validation">Validation states</a></li>
                            <li><a href="#_search">Search form</a></li>
                            <li><a href="#_plugin">Input control plugin</a></li>
                            <li><a href="#_transform">Input Transform</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="span9">

                    <p class="description bg-grayLighter padding20">Por favor lea cada pregunta y responda de manera correcta.</p>
                    <form>
                        <br>
                        <br>
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
                            <br/>
                            <br/>
                            <br/>
                            <button class="button large primary">Guardar</button>
                            <button class="button large danger">Cancelar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop