<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-8">
                {{ Form::label('partido_id') }}
                <select name="partido_id" class="form-control{{ $errors->has('partido_id') ? ' is-invalid' : '' }}" placeholder="Partido Id" onchange="mostrarJugadores(this)">
                    <option value="">Seleccione un partido</option>
                    @foreach ($partidos as $partido)
                        <option value="{{ $partido['id'] }}" data-jugador1="{{ $partido['jugador1_id'] }}" data-jugador2="{{ $partido['jugador2_id'] }}" {{ $partido['id'] == $resultado->partido_id ? 'selected' : '' }}>
                            {{ $partido['nombrePartido'] }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('partido_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('sets_jugados', 'Sets jugados') }}
                {{ Form::select('sets_jugados', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], null, ['class' => 'form-control', 'id' => 'sets_jugados', 'placeholder' => 'Seleccione sets jugados']) }}
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('ganador_id') }}
                {{ Form::select('ganador_id', $inscritos, $resultado->ganador_id, ['class' => 'form-control' . ($errors->has('ganador_id') ? ' is-invalid' : ''), 'placeholder' => 'Ganador Id', 'readonly']) }}
                {!! $errors->first('ganador_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('perdedor_id') }}
                {{ Form::select('perdedor_id', $inscritos, $resultado->perdedor_id, ['class' => 'form-control' . ($errors->has('perdedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Perdedor Id', 'readonly']) }}
                {!! $errors->first('perdedor_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>

        <div id="resultadoSetsContainer">
            <!-- Aquí se generarán dinámicamente la tabla de resultados de los sets -->
        </div>

        <h2>Resultado del Partido</h2>
        <div id="resultadoPartidoContainer">
            <!-- Aquí se mostrará la tabla con el resultado del partido -->
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script>
    const setsJugadosSelect = document.getElementById('sets_jugados');
    const resultadoSetsContainer = document.getElementById('resultadoSetsContainer');
    const resultadoPartidoContainer = document.getElementById('resultadoPartidoContainer');
    const ganadorInput = document.getElementById('ganador_id');
    const perdedorInput = document.getElementById('perdedor_id');
    const partidoSelect = document.getElementsByName('partido_id')[0]; // Elemento del select de partido

    function mostrarJugadores(selectElement) {
        const selectedPartido = selectElement.options[selectElement.selectedIndex];
        const jugador1Id = selectedPartido.getAttribute('data-jugador1');
        const jugador2Id = selectedPartido.getAttribute('data-jugador2');

        ganadorInput.value = jugador1Id;
        perdedorInput.value = jugador2Id;
    }

    function generarTablaResultadoSets(setsJugados) {
        const jugador1Id = ganadorInput.value;
        const jugador1Nombre = ganadorInput.options[ganadorInput.selectedIndex].text;
        const jugador2Id = perdedorInput.value;
        const jugador2Nombre = perdedorInput.options[perdedorInput.selectedIndex].text;

        const table = document.createElement('table');
        table.className = 'table table-bordered';

        const headerRow = table.insertRow();
        const headers = ['Sets jugados', 'Nombre Jugador 1', 'Resultado Jugador 1', 'Nombre Jugador 2', 'Resultado Jugador 2'];
        headers.forEach(headerText => {
            const headerCell = document.createElement('th');
            headerCell.textContent = headerText;
            headerRow.appendChild(headerCell);
        });

        for (let i = 1; i <= setsJugados; i++) {
            const row = table.insertRow();
            row.insertCell().textContent = `Set ${i}`;
            row.insertCell().textContent = jugador1Nombre;
            const jugador1Input = document.createElement('input');
            jugador1Input.type = 'number';
            jugador1Input.name = `set_${i}_jugador1_puntos`;
            jugador1Input.className = 'form-control';
            row.insertCell().appendChild(jugador1Input);

            row.insertCell().textContent = jugador2Nombre;
            const jugador2Input = document.createElement('input');
            jugador2Input.type = 'number';
            jugador2Input.name = `set_${i}_jugador2_puntos`;
            jugador2Input.className = 'form-control';
            row.insertCell().appendChild(jugador2Input);
        }

        resultadoSetsContainer.innerHTML = '';
        resultadoSetsContainer.appendChild(table);
    }

    function calcularResultadoPartido(setsJugados) {
        const jugador1Id = ganadorInput.value;
        const jugador1Nombre = ganadorInput.options[ganadorInput.selectedIndex].text;
        const jugador2Id = perdedorInput.value;
        const jugador2Nombre = perdedorInput.options[perdedorInput.selectedIndex].text;

        let juegosGanadosJugador1 = 0;
        let juegosGanadosJugador2 = 0;

        for (let i = 1; i <= setsJugados; i++) {
            const jugador1Puntos = parseInt(document.querySelector(`input[name="set_${i}_jugador1_puntos"]`).value);
            const jugador2Puntos = parseInt(document.querySelector(`input[name="set_${i}_jugador2_puntos"]`).value);

            if (!isNaN(jugador1Puntos) && !isNaN(jugador2Puntos)) {
                if (jugador1Puntos > jugador2Puntos) {
                    juegosGanadosJugador1++;
                } else if (jugador2Puntos > jugador1Puntos) {
                    juegosGanadosJugador2++;
                }
            }
        }

        let ganadorId, ganadorNombre, perdedorId, perdedorNombre;

        if (juegosGanadosJugador1 > juegosGanadosJugador2) {
            ganadorId = jugador1Id;
            ganadorNombre = jugador1Nombre;
            perdedorId = jugador2Id;
            perdedorNombre = jugador2Nombre;
        } else if (juegosGanadosJugador2 > juegosGanadosJugador1) {
            ganadorId = jugador2Id;
            ganadorNombre = jugador2Nombre;
            perdedorId = jugador1Id;
            perdedorNombre = jugador1Nombre;
        } else {
            // En caso de empate en juegos ganados, se considera ganador al jugador con el ID más bajo
            ganadorId = Math.min(jugador1Id, jugador2Id);
            ganadorNombre = (ganadorId === jugador1Id) ? jugador1Nombre : jugador2Nombre;
            perdedorId = Math.max(jugador1Id, jugador2Id);
            perdedorNombre = (perdedorId === jugador1Id) ? jugador1Nombre : jugador2Nombre;
        }

        const jugadores = [
            {
                id: ganadorId,
                nombre: ganadorNombre,
                juegosGanados: juegosGanadosJugador1,
                estado: (juegosGanadosJugador1 > juegosGanadosJugador2) ? 'ganador' : 'perdedor'
            },
            {
                id: perdedorId,
                nombre: perdedorNombre,
                juegosGanados: juegosGanadosJugador2,
                estado: (juegosGanadosJugador2 > juegosGanadosJugador1) ? 'ganador' : 'perdedor'
            }
        ];

        return jugadores;
    }

    function generarTablaResultadoPartido(setsJugados) {
        const {
            ganadorId,
            ganadorNombre,
            perdedorId,
            perdedorNombre,
            juegosGanadosJugador1,
            juegosGanadosJugador2
        } = calcularResultadoPartido(setsJugados);

        const table = document.createElement('table');
        table.className = 'table table-bordered';

        const headerRow = table.insertRow();
        const headers = ['ID Jugador', 'Nombre Jugador', 'Juegos Ganados', 'Estado'];
        headers.forEach(headerText => {
            const headerCell = document.createElement('th');
            headerCell.textContent = headerText;
            headerRow.appendChild(headerCell);
        });

        const row1 = table.insertRow();
        row1.insertCell().textContent = ganadorId;
        row1.insertCell().textContent = ganadorNombre;
        row1.insertCell().textContent = juegosGanadosJugador1;
        row1.insertCell().textContent = 'Ganador';

        const row2 = table.insertRow();
        row2.insertCell().textContent = perdedorId;
        row2.insertCell().textContent = perdedorNombre;
        row2.insertCell().textContent = juegosGanadosJugador2;
        row2.insertCell().textContent = 'Perdedor';

        resultadoPartidoContainer.innerHTML = '';
        resultadoPartidoContainer.appendChild(table);
    }

    function actualizarResultadoPartido(setsJugados) {
        const jugadores = calcularResultadoPartido(setsJugados);

        const table = document.createElement('table');
        table.className = 'table table-bordered';

        const headerRow = table.insertRow();
        const headers = ['ID Jugador', 'Nombre Jugador', 'Juegos Ganados', 'Estado'];
        headers.forEach(headerText => {
            const headerCell = document.createElement('th');
            headerCell.textContent = headerText;
            headerRow.appendChild(headerCell);
        });

        jugadores.forEach(jugador => {
            const row = table.insertRow();
            row.insertCell().textContent = jugador.id;
            row.insertCell().textContent = jugador.nombre;
            row.insertCell().textContent = jugador.juegosGanados;
            row.insertCell().textContent = jugador.estado === 'ganador' ? 'Ganador' : 'Perdedor';
        });

        resultadoPartidoContainer.innerHTML = '';
        resultadoPartidoContainer.appendChild(table);
    }

    function actualizarCamposResultadoSets() {
        const setsJugados = parseInt(setsJugadosSelect.value);
        generarTablaResultadoSets(setsJugados);
        actualizarResultadoPartido(setsJugados);

        // Agregar eventos de escucha a los inputs de los resultados de los sets
        const inputsSets = document.querySelectorAll('input[name^="set_"]');
        inputsSets.forEach(input => {
            input.addEventListener('input', () => {
                actualizarResultadoPartido(setsJugados);
            });
        });
    }

    setsJugadosSelect.addEventListener('change', actualizarCamposResultadoSets);

    // Agregar evento para mostrar los jugadores al seleccionar un partido
    partidoSelect.addEventListener('change', function () {
        mostrarJugadores(partidoSelect);
        actualizarCamposResultadoSets();
    });

    // Llamar a la función inicialmente para generar los campos según el valor del select si ya hay datos
    actualizarCamposResultadoSets();
</script>






