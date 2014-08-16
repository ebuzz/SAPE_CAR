<div class="example">
    {{ Form::open(array('action' => 'HomeController@showHome', 'method' => 'post')) }}
        <fieldset>
            <legend>Mi perfil</legend>
            <!-- Rol-->
            <label for="roleDiv">Rol</label>
            <div id="roleDiv" class="input-control select">
                {{ Form::select('role', $roles, $profile->idRole, array('class' => 'input-control select')) }}
            </div>
            <br>
            <br>
            <br>
            <!-- Estado -->
            <label for="stateDiv">Estado</label>
            <div id="stateDiv" class="input-control select">
                {{ Form::select('state', $states, $profile->city->state->idState, 
                                array('id' => 'state', 'class' => 'input-control select')) }}
            </div>
            <!-- Ciudad -->
            <label for="cityDiv">Ciudad</label>
            <div id="cityDiv" class="input-control select">
                {{ Form::select('city', $cities, $profile->city->idCity, 
                                array('id' => 'city', 'class' => 'input-control select')) }}
            </div>
            <!-- Deporte -->
            <label for="sportDiv">Deporte</label>
            <div id="sportDiv" class="input-control select">
                {{ Form::select('sport', $sports, $profile->idSport, 
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
                    @if ($field['skipSubmit'] == true)
                        <div class="input-control select">
                            {{ Form::select('', $field['values'], $field['selected'], 
                                            array('class' => 'input-control select')) }}
                        </div>
                    @else
                        <div class="input-control select">
                            {{ Form::select($field['name'], $field['values'], $field['selected'], 
                                            array('class' => 'input-control select')) }}
                        </div>
                    @endif
                @endforeach
            </div>
        </fieldset>
    {{ Form::close() }}
</div>