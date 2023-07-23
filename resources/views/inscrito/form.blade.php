<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_equipo') }}
            {{ Form::text('nombre_equipo', $inscrito->nombre_equipo, ['class' => 'form-control' . ($errors->has('nombre_equipo') ? ' is-invalid' : ''),'readonly' => 'readonly', 'id' => 'nombre_equipo', 'placeholder' => 'Nombre Equipo']) }}
            {!! $errors->first('nombre_equipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('campeonato_id') }}
            {{ Form::select('campeonato_id',$campeonatos, $inscrito->campeonato_id, ['class' => 'form-control' . ($errors->has('campeonato_id') ? ' is-invalid' : ''), 'placeholder' => 'Campeonato Id']) }}
            {!! $errors->first('campeonato_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::select('categoria_id',$categorias, $inscrito->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jugador1_id') }}
            {{ Form::select('jugador1_id',$participantes, $inscrito->jugador1_id, ['class' => 'form-control' . ($errors->has('jugador1_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('jugador1_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jugador2_id') }}
            {{ Form::select('jugador2_id', $participantes, $inscrito->jugador2_id, ['class' => 'form-control' . ($errors->has('jugador2_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('jugador2_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script>
    // Obtener los elementos select de jugador1 y jugador2
    const jugador1Select = document.getElementById('jugador1_id');
    const jugador2Select = document.getElementById('jugador2_id');

    // Obtener el elemento input de nombre_equipo
    const nombreEquipoInput = document.getElementById('nombre_equipo');

    // Función para obtener las primeras 3 letras de un nombre
    function obtenerPrimerasTresLetras(nombre) {
        return nombre.slice(0, 3).toUpperCase();
    }

    // Función para generar un número aleatorio entre 100 y 999
    function generarNumeroAleatorio() {
        return Math.floor(Math.random() * 900) + 100;
    }

    // Función para actualizar el valor de nombre_equipo
    function actualizarNombreEquipo() {
        const jugador1Option = jugador1Select.options[jugador1Select.selectedIndex];
        const jugador2Option = jugador2Select.options[jugador2Select.selectedIndex];

        const jugador1Nombre = jugador1Option.textContent;
        const jugador2Nombre = jugador2Option.textContent;

        if (jugador1Nombre && jugador2Nombre) {
            // Si ambos jugadores están seleccionados, concatenar con el formato "Equipo_J1_J2_NumAleatorio"
            const equipoNombre = `Equipo_${obtenerPrimerasTresLetras(jugador1Nombre)}_${obtenerPrimerasTresLetras(jugador2Nombre)}_${generarNumeroAleatorio()}`;
            nombreEquipoInput.value = equipoNombre;
        } else if (jugador1Nombre) {
            // Si solo se selecciona el jugador 1, mostrar el nombre completo del jugador 1
            nombreEquipoInput.value = jugador1Nombre;
        } else if (jugador2Nombre) {
            // Si solo se selecciona el jugador 2, mostrar el nombre completo del jugador 2
            nombreEquipoInput.value = jugador2Nombre;
        } else {
            // Si no hay jugadores seleccionados, dejar el campo vacío
            nombreEquipoInput.value = '';
        }
    }

    // Event listeners para los cambios en los select de jugador1 y jugador2
    jugador1Select.addEventListener('change', actualizarNombreEquipo);
    jugador2Select.addEventListener('change', actualizarNombreEquipo);

    // Llamar a la función inicialmente para mostrar el valor inicial en nombre_equipo
    actualizarNombreEquipo();

    // Función para deshabilitar el jugador seleccionado en el otro campo
    function actualizarJugadoresSeleccionados() {
        const jugador1Seleccionado = jugador1Select.value;
        const jugador2Seleccionado = jugador2Select.value;

        // Habilitar todas las opciones en ambos campos
        for (const option of jugador1Select.options) {
            option.disabled = false;
        }
        for (const option of jugador2Select.options) {
            option.disabled = false;
        }

        // Deshabilitar el jugador seleccionado en el otro campo
        if (jugador1Seleccionado) {
            jugador2Select.querySelector(`option[value="${jugador1Seleccionado}"]`).disabled = true;
        }
        if (jugador2Seleccionado) {
            jugador1Select.querySelector(`option[value="${jugador2Seleccionado}"]`).disabled = true;
        }
    }

    // Event listeners para los cambios en los campos de jugador1 y jugador2
    jugador1Select.addEventListener('change', actualizarJugadoresSeleccionados);
    jugador2Select.addEventListener('change', actualizarJugadoresSeleccionados);

    // Llamar a la función inicialmente para deshabilitar opciones seleccionadas (si las hay)
    actualizarJugadoresSeleccionados();
</script>









