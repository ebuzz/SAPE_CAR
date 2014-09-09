<div class="example">
    <fieldset>
        <legend>Mi perfil</legend>
        <!-- Rol-->
        <label for="roleDiv">Rol</label>
        <div id="roleDiv" class="input-control select">
            {{ Form::select('', $roles, $profile->idRole, 
                            array('id' => 'role', 'class' => 'input-control select')) }}
        </div>
        <br>
        <br>
        <br>
        <!-- Estado -->
        <label for="stateDiv">Estado</label>
        <div id="stateDiv" class="input-control select">
            {{ Form::select('', $states, $profile->city->state->idState, 
                            array('id' => 'state', 'class' => 'input-control select')) }}
        </div>
        <!-- Ciudad -->
        <label for="cityDiv">Ciudad</label>
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
    </fieldset>
</div>