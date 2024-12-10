@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Grupos/tablahtml')
    
@endsection



{{-- Formulario para editar el grupo --}}
<form action="{{route('Grupos.update',$grupo->idGrupo)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" 
               value="{{$grupo->fecha) }}">
        @error('fecha')
            <p class="text-danger">Error: {{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="grupo">Grupo</label>
        <input type="text" class="form-control" id="grupo" name="grupo" 
               value="{{ old('grupo', $grupo->grupo) }}">
        @error('grupo')
            <p class="text-danger">Error: {{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="maxAlumnos">Máx. Alumnos</label>
        <input type="text" class="form-control" id="maxAlumnos" name="maxAlumnos" 
               value="{{ old('maxAlumnos', $grupo->maxAlumnos) }}">
        @error('maxAlumnos')
            <p class="text-danger">Error: {{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" 
               value="{{ old('descripcion', $grupo->descripcion) }}">
        @error('descripcion')
            <p class="text-danger">Error: {{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="idPeriodo">Periodo</label>
        <select id="idPeriodo" name="idPeriodo" class="form-control">
            <option value="">Seleccionar Periodo</option>
            @foreach($periodos as $periodo)
                <option value="{{ $periodo->idPeriodo }}" 
                    {{ old('idPeriodo', $grupo->idPeriodo) == $periodo->idPeriodo ? 'selected' : '' }}>
                    {{ $periodo->periodo }}
                </option>
            @endforeach
        </select>
        @error('idPeriodo')
            <p class="text-danger">Error: {{ $message }}</p>
        @enderror
    </div>
    

    <div class="form-group">
        <label for="idCarrera">Carrera</label>
        <select id="idCarrera" name="idCarrera" class="form-control">
            <option value="">Seleccionar Carrera</option>
            @foreach($carreras as $carrera)
                <option value="{{ $carrera->idCarrera }}" 
                    {{ old('idCarrera', $grupo->idCarrera) == $carrera->idCarrera ? 'selected' : '' }}>
                    {{ $carrera->nombreCarrera }}
                </option>
            @endforeach
        </select>
        @error('idCarrera')
            <p class="text-danger">Error: {{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Actualizar Grupo</button>
    <a href="{{ route('Grupos.create') }}" class="btn btn-primary">Nuevo Grupo</a>
</form>
@endsection

  

  <!-- JavaScript para mostrar campos adicionales -->
  <script>
      

      document.querySelectorAll('input[name="horarios[]"]').forEach(checkbox => {
  checkbox.addEventListener('change', function () {
      // Obtener el valor seleccionado del checkbox
      const value = checkbox.value; 
      const [dia, hora] = value.split(',');

      // Verificar si hay un lugar seleccionado
      const lugarSeleccionado = document.querySelector('input[name="idLugar"]:checked');
      const nombreCorto = lugarSeleccionado ? lugarSeleccionado.getAttribute('data-nombre-corto') : '';

      // Buscar si ya existe una descripción junto al checkbox
      let descriptionContainer = checkbox.parentElement.querySelector('.description');

      if (checkbox.checked) {
          if (!lugarSeleccionado) {
              alert("Por favor, seleccione un lugar antes de elegir un horario.");
              checkbox.checked = false; // Desmarcar el checkbox
              return;
          }

          // Crear el contenedor de la descripción si no existe
          if (!descriptionContainer) {
              descriptionContainer = document.createElement('div');
              descriptionContainer.classList.add('description');
              checkbox.parentElement.appendChild(descriptionContainer);
          }

          // Actualizar el contenido del contenedor con el lugar, día y hora
          descriptionContainer.innerText = `${nombreCorto}, ${dia}, ${hora}`;
      } else {
          // Eliminar la descripción si el checkbox es desmarcado
          if (descriptionContainer) {
              checkbox.parentElement.removeChild(descriptionContainer);
          }
      }
  });
});


      document.addEventListener("DOMContentLoaded", function() {
      // Mostrar los campos adicionales cuando se seleccionan ambos campos (idPeriodo y idCarrera)
      const idPeriodoSelect = document.getElementById("idPeriodo");
      const idCarreraSelect = document.getElementById("idCarrera");
      const additionalFields = document.getElementById("additionalFields");
  
      function checkSelections() {
          if (idPeriodoSelect.value !== "" && idCarreraSelect.value !== "") {
              additionalFields.style.display = "flex";
          } else {
              additionalFields.style.display = "none";
          }
      }
  
      idPeriodoSelect.addEventListener("change", checkSelections);
      idCarreraSelect.addEventListener("change", checkSelections);
  
      // Filtrar el personal por el departamento seleccionado
      const departamentoSelect = document.getElementById("departamento");
      const personalContainer = document.getElementById("personalContainer");
      const personals = personalContainer.getElementsByClassName("personal");
  
      departamentoSelect.addEventListener("change", function() {
          const selectedDepto = departamentoSelect.value;
  
          Array.from(personals).forEach(personal => {
              if (selectedDepto === "" || personal.getAttribute("data-depto-id") === selectedDepto) {
                  personal.style.display = "block";
              } else {
                  personal.style.display = "none";
              }
          });
      });
  
      // Filtrar lugares según el edificio seleccionado
      const edificioSelect = document.getElementById("edificio");
      const lugarContainer = document.getElementById("lugarContainer");
      const lugares = lugarContainer.getElementsByClassName("lugar");
  
      edificioSelect.addEventListener("change", function() {
          const selectedEdificio = edificioSelect.value;
  
          Array.from(lugares).forEach(lugar => {
              if (selectedEdificio === "" || lugar.getAttribute("data-edificio-id") === selectedEdificio) {
                  lugar.style.display = "block";
              } else {
                  lugar.style.display = "none";
              }
          });
      });
  
      // Mostrar materias basadas en el semestre seleccionado
      const semestreSelect = document.getElementById("semestre");
      const materiaContainer = document.getElementById("materiaContainer");
      const materiaOptions = materiaContainer.getElementsByClassName("materia-option");
  
      semestreSelect.addEventListener("change", function() {
          const selectedSemestre = semestreSelect.value;
  
          Array.from(materiaOptions).forEach(materia => {
              if (selectedSemestre === "" || materia.getAttribute("data-semestre") === selectedSemestre) {
                  materia.style.display = "block";
              } else {
                  materia.style.display = "none";
              }
          });
      });
  
      // Mostrar información de lugar, día y hora cuando se selecciona un checkbox en la tabla de horarios
      const horariosCheckboxes = document.querySelectorAll('input[name="horarios[]"]');
  
      horariosCheckboxes.forEach(checkbox => {
          checkbox.addEventListener('change', function() {
              const value = checkbox.value;
              const [dia, hora] = value.split(',');
  
              const lugarSeleccionado = document.querySelector('input[name="idLugar"]:checked');
              const nombreCorto = lugarSeleccionado ? lugarSeleccionado.getAttribute('data-nombre-corto') : '';
  
              let descriptionContainer = checkbox.parentElement.querySelector('.description');
  
              if (checkbox.checked) {
                  if (!descriptionContainer) {
                      descriptionContainer = document.createElement('div');
                      descriptionContainer.classList.add('description');
                      descriptionContainer.innerText = `${nombreCorto}, ${dia}, ${hora}`;
                      checkbox.parentElement.appendChild(descriptionContainer);
                  }
              } else {
                  if (descriptionContainer) {
                      checkbox.parentElement.removeChild(descriptionContainer);
                  }
              }
          });
      });
  
      
  });
  
  function toggleHorario() {
  const edificioYHorario = document.getElementById("edificioYHorario");
  const toggleButton = document.getElementById("toggleHorarioButton");
  const form = document.getElementById("myForm");

  if (edificioYHorario.style.display === "none") {
      // Mostrar el bloque de horarios
      edificioYHorario.style.display = "block";
      toggleButton.textContent = "Terminar Horario";
      toggleButton.type = "submit";

      // Deshabilitar los campos no relacionados con el horario
      document.getElementById("grupo").disabled = true;
      document.getElementById("descripcion").disabled = true;
      document.getElementById("maxAlumnos").disabled = true;
      document.getElementById("idPeriodo").disabled = true;
      document.getElementById("idCarrera").disabled = true;
      document.getElementById("departamento").disabled = true;
      document.getElementById("semestre").disabled = true;
      document.querySelectorAll('input[name="idMateria"]').forEach((radio) => (radio.disabled = true));
      document.querySelectorAll('input[name="idPersonal"]').forEach((radio) => (radio.disabled = true));

      // Habilitar los campos de horario y lugar
      document.getElementById("edificio").disabled = false;
      document.querySelectorAll('input[name="idLugar"]').forEach((radio) => (radio.disabled = false));
      document.querySelectorAll('input[name="horarios[]"]').forEach((checkbox) => (checkbox.disabled = false));
  } else {
      // Si el botón es "Terminar Horario", habilitar todos los campos para enviar el formulario
      if (toggleButton.textContent === "Terminar Horario") {
          // Habilitar todos los campos deshabilitados antes de enviar
          document.getElementById("grupo").disabled = false;
          document.getElementById("descripcion").disabled = false;
          document.getElementById("maxAlumnos").disabled = false;
          document.getElementById("idPeriodo").disabled = false;
          document.getElementById("idCarrera").disabled = false;
          document.getElementById("departamento").disabled = false;
          document.getElementById("semestre").disabled = false;
          document.querySelectorAll('input[name="idMateria"]').forEach((radio) => (radio.disabled = false));
          document.querySelectorAll('input[name="idPersonal"]').forEach((radio) => (radio.disabled = false));

          form.submit(); // Enviar el formulario
      } else {
          // Cambiar tipo de botón para no enviar formulario
          toggleButton.textContent = "Iniciar Horario";
          toggleButton.type = "button";

          // Ocultar los campos de horario
          edificioYHorario.style.display = "none";

          // Reactivar los campos originales de grupo
          document.getElementById("grupo").disabled = false;
          document.getElementById("descripcion").disabled = false;
          document.getElementById("maxAlumnos").disabled = false;
          document.getElementById("idPeriodo").disabled = false;
          document.getElementById("idCarrera").disabled = false;
          document.getElementById("departamento").disabled = false;
          document.getElementById("semestre").disabled = false;

          // Deshabilitar los campos de horario
          document.getElementById("edificio").disabled = true;
          document.querySelectorAll('input[name="idLugar"]').forEach((radio) => (radio.disabled = true));
          document.querySelectorAll('input[name="horarios[]"]').forEach((checkbox) => (checkbox.disabled = true));
      }
  }
}


  
  // Función para prevenir la recarga y controlar el envío del formulario
  function preventFormSubmit(event) {
      event.preventDefault(); // Prevenir el comportamiento por defecto de envío del formulario
  }
  
  // Función que maneja el cambio entre "Iniciar Horario" y "Terminar Horario"
 
  
  // Asignar preventFormSubmit a todos los formularios de la página
  document.querySelectorAll("form").forEach((form) => {
      form.addEventListener("submit", preventFormSubmit);
  });
  
  </script>
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          const nuevoButton = document.getElementById("nuevo");
          nuevoButton.style.display = "none"; // Oculta el botón al cargar la página
      });
  </script>
  
  
      @endsection
