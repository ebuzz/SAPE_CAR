<div id="profile" class="example">
    <fieldset>
        @if (Auth::user() == $user)
            <legend>Mi perfil</legend>
        @else
            <legend>Perfil de {{ $user->name . ' ' . $user->firstSurname }}</legend>
        @endif
        <p class="description bg-grayLighter padding20">
            Por favor antes de comenzar a contestar el cuestionario 
            verifique que los datos de su perfil se encuentren actualizados y,
            en caso de requerir algún cambio, hacerlo.
        </p>
        <!-- Estado -->
        <label for="stateDiv">Estado</label>
        <div id="stateDiv" class="input-control select">
            {{ Form::select('', $states, $profile->city->state->idState, 
                            array('id' => 'state', 'class' => 'input-control select')) }}
        </div>
        <!-- Municipio -->
        <label for="cityDiv">Municipio</label>
        <div id="cityDiv" class="input-control select">
            {{ Form::select('', $cities, $profile->city->idCity, 
                            array('id' => 'city', 'class' => 'input-control select')) }}
        </div>
        <!-- Deporte -->
        <label for="sportDiv">Deporte</label>
        <div id="sportDiv" class="input-control select">
            {{ Form::select('', $sports, $profile->idSport, 
                            array('id' => 'sport', 'class' => 'input-control select')) }}
        </div>
        <br>
        <br>
        <br>
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
        <br>
        <button id="continue" class="button info large"><i class="icon-pencil on-left"></i>No hacer cambios y continuar</button>
        <button id="save" class="button success large"><i class="icon-checkmark on-left"></i>Guardar cambios</button>
        <button id="cancel" class="button danger large"><i class="icon-cancel-2 on-left"></i>Descartar cambios</button>
    </fieldset>
</div>