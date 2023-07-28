<div class="box box-info padding-1">
    <div class="box-body row">
        
        <div class="form-group col-md-12">
            {{ Form::label('nombrePartido') }}
            {{ Form::text('nombrePartido', null, ['class' => 'form-control', 'readonly' => 'readonly', 'id' => 'nombrePartido']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('campeonato_id') }}
            {{ Form::select('campeonato_id', $campeonatos, $partido->campeonato_id, ['class' => 'form-control', 'id' => 'campeonato_id', 'placeholder' => 'Seleccione un campeonato']) }}
            {!! $errors->first('campeonato_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('categoria_id') }}
            {{ Form::select('categoria_id', $categorias, $partido->categoria_id, ['class' => 'form-control', 'id' => 'categoria_id', 'placeholder' => 'Seleccione una categoría']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-5">
            {{ Form::label('jugador1_id') }}
            {{ Form::select('jugador1_id', $inscritos, $partido->jugador1_id, ['class' => 'form-control'. ($errors->has('jugador1_id') ? ' is-invalid' : ''), 'id' => 'jugador1_id', 'placeholder' => 'Seleccione un jugador']) }}
            {!! $errors->first('jugador1_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-2">
        {{ Form::label('contra') }}
            {{ Form::text('', null, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'VS']) }}
        </div>
        <div class="form-group col-md-5">
            {{ Form::label('jugador2_id') }}
            {{ Form::select('jugador2_id', $inscritos, $partido->jugador2_id, ['class' => 'form-control'. ($errors->has('jugador2_id') ? ' is-invalid' : ''), 'id' => 'jugador2_id', 'placeholder' => 'Seleccione un jugador']) }}
            {!! $errors->first('jugador2_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('fecha_partido') }}
            {{ Form::date('fecha_partido', $partido->fecha_partido, ['class' => 'form-control' . ($errors->has('fecha_partido') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Partido']) }}
            {!! $errors->first('fecha_partido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('hora_partido') }}
            {{ Form::time('hora_partido', $partido->hora_partido, ['class' => 'form-control' . ($errors->has('hora_partido') ? ' is-invalid' : ''), 'placeholder' => 'Hora Partido']) }}
            {!! $errors->first('hora_partido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('cancha') }}
            {{ Form::number('cancha', $partido->cancha, ['class' => 'form-control' . ($errors->has('cancha') ? ' is-invalid' : ''), 'placeholder' => 'Cancha']) }}
            {!! $errors->first('cancha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script>
    const nombrePartidoInput = document.getElementById('nombrePartido');
    const jugador1Select = document.getElementById('jugador1_id');
    const jugador2Select = document.getElementById('jugador2_id');
    const fechaPartidoInput = document.getElementById('fecha_partido');
    const horaPartidoInput = document.getElementById('hora_partido');
    const canchaInput = document.getElementById('cancha');

    const campeonatoSelect = document.getElementById('campeonato_id');
        const categoriaSelect = document.getElementById('categoria_id');

        // Función para cargar los jugadores inscritos mediante AJAX
        function loadPlayers() {
            const campeonatoId = campeonatoSelect.value;
            const categoriaId = categoriaSelect.value;

            if (campeonatoId && categoriaId) {
                fetch(`/get-players?campeonato_id=${campeonatoId}&categoria_id=${categoriaId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Limpiar los select de jugadores
                        jugador1Select.innerHTML = '';
                        jugador2Select.innerHTML = '';

                        // Llenar los select con las opciones de jugadores
                        for (const [id, nombreEquipo] of Object.entries(data)) {
                            const option = document.createElement('option');
                            option.value = id;
                            option.textContent = nombreEquipo;
                            jugador1Select.appendChild(option);
                            jugador2Select.appendChild(option.cloneNode(true));
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener los jugadores:', error);
                    });
            }
        }

        campeonatoSelect.addEventListener('change', loadPlayers);
        categoriaSelect.addEventListener('change', loadPlayers);

        // Llamar a la función para cargar los jugadores inicialmente
        loadPlayers();

        function generarNombrePartido() {
            const jugador1Nombre = jugador1Select.options[jugador1Select.selectedIndex].text;
            const jugador2Nombre = jugador2Select.options[jugador2Select.selectedIndex].text;
            const fechaPartido = fechaPartidoInput.value;
            const horaPartido = horaPartidoInput.value;
            const cancha = canchaInput.value;

            if (jugador1Nombre && jugador2Nombre && fechaPartido && horaPartido && cancha) {
                if (jugador1Select.value === jugador2Select.value) {
                    // Jugador 1 y Jugador 2 son el mismo, mostrar mensaje de error
                    alert('El Jugador 1 y el Jugador 2 no pueden ser el mismo.');
                    return; // No generamos el nombre del partido si los jugadores son iguales
                }

                const nombrePartido = `${jugador1Nombre}_vs_${jugador2Nombre}_F${fechaPartido}_H${horaPartido}_C${cancha}`;
                nombrePartidoInput.value = nombrePartido;
            }
        }

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

    jugador1Select.addEventListener('change', generarNombrePartido);
    jugador2Select.addEventListener('change', generarNombrePartido);
    fechaPartidoInput.addEventListener('change', generarNombrePartido);
    horaPartidoInput.addEventListener('change', generarNombrePartido);
    canchaInput.addEventListener('change', generarNombrePartido);

    jugador1Select.addEventListener('change', actualizarJugadoresSeleccionados);
    jugador2Select.addEventListener('change', actualizarJugadoresSeleccionados);

    generarNombrePartido(); // Llamar a la función inicialmente para generar el nombre del partido si ya hay datos
    actualizarJugadoresSeleccionados(); // Llamar a la función inicialmente para deshabilitar opciones seleccionadas (si las hay)

    
</script>