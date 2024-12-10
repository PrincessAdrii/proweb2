<style>
    .cuadro-azul {
        border: 2px solid #86b4fa; 
        background-color: #86b4fa; 
        padding: 10px;
        border-radius: 5px; 
        margin-bottom: 15px; 
        width: 200px;
        /* width: auto; */
    }

    .cuadro-rojo {
        border: 2px solid #ee8383; /* Borde gris */
        background-color: #e88a8a; /* Fondo gris claro */
        padding: 10px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espaciado entre cuadros */
        width: 200px;
        /* width: auto; */
    }

    .contenedor-filas {
        display: block; 
        justify-content: center; /* Centrar horizontalmente */
        align-items: center;
        gap: 20px;
    }

    .fila {
        display: flex; /* Apila elementos horizontalmente */
        flex-wrap: wrap; /* Permite que los elementos pasen a la siguiente línea si no caben */
        gap: 10px; /* Espaciado entre los elementos */
        justify-content: flex-start; /* Alinea horizontalmente los elementos hacia la izquierda */
        margin-bottom: 20px;
    }
    
    .azul {
        display: block; 
        font-size: 1.2rem;
        font-weight: bold; 
        color: white;
        background-color: #3b82f6;
        padding: 10px; 
        border-radius: 8px; 
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
        margin-bottom: 10px; 
        width: 100px;
        height: 50px;
    }

    .rojo {
        display: block; /* Asegura que el label ocupe toda la línea */
        font-size: 1.2rem; /* Tamaño de fuente más grande */
        font-weight: bold; /* Texto en negritas */
        color: white;
        background-color: #f63b3b;
        padding: 10px; /* Espaciado interno */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        margin-bottom: 10px; /* Espaciado entre el label y los cuadros */
        width: 100px;
        height: 50px;
    }

    .verde {
        display: block; /* Asegura que el label ocupe toda la línea */
        font-size: 1.5rem; /* Tamaño de fuente más grande */
        font-weight: bold; /* Texto en negritas */
        color: white;
        background-color: #3bf679;
        padding: 10px; /* Espaciado interno */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        margin-bottom: 10px; /* Espaciado entre el label y los cuadros */
        /* width: 100px; */
    }

    .submit-btn {
        display: block;
        margin: 0 auto;  /* Centra el botón */
        background-color: #3b82f6;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #3370d2;
    }
</style>
@extends('inicioAlumno')

@section('title', 'Ver Grupos')

@section('contenido2')
    <br>
    <div class="cuerpo">
        <div class="contenedor-filas">
            <label for="" class="verde">Grupos Matutinos</label>
            <form method="POST" action="{{ route('inserthorario.store') }}">
                @csrf
                @if($grupos2->isNotEmpty())
                    
                    <div class="fila">
                        <label for="" class="rojo">GM1</label>
                    </div>
                    <div class="fila">
                        @foreach($grupos2 as $grupo)
                            @if($grupo->grupo == 'GM1')
                                {{-- <form method="POST" action="{{ route('verhorariogrupo') }}">
                                    @csrf --}}
                                <div class="cuadro-rojo" data-grupo="GM1">
                                    <p><b>{{ $grupo->idMateria }}</b></p>
                                    <p>{{ $grupo->nombreMateria }}</p>
                                    <p>Grupo: {{ $grupo->grupo }}</p>
                                    <input type="hidden" name="idPeriodo" value="{{ $grupo->idPeriodo }}">
                                    <input type="hidden" name="idMateria" value="{{ $grupo->idMateria }}">
                                    <input type="hidden" name="nombreMateria" value="{{ $grupo->nombreMateria }}">
                                    <input type="hidden" name="grupo" value="{{ $grupo->grupo }}">
                                    <input type="hidden" name="idGrupo" value="{{ $grupo->idGrupo }}"> 
                                    <input type="checkbox" name="gruposrgm1[]" value="{{ $grupo->idGrupo }}" class="grupo-checkbox" data-idmateria="{{ $grupo->idMateria }}" data-grupo="GM1" {{-- disabled hidden --}}>
                                        {{-- <button type="submit" class="submit-btn">Ver Horario del Grupo</button> --}}
                                </div>
                                {{-- </form>            --}}
                            @endif
                        @endforeach
                    </div>           
                {{-- 2 --}}
                    <div class="fila">
                        <label for="" class="rojo">GM2</label>
                    </div>
                    <div class="fila">
                        @foreach($grupos2 as $grupo)
                            @if($grupo->grupo == 'GM2')
                                {{-- <form method="POST" action="{{ route('verhorariogrupo') }}">
                                    @csrf --}}
                                <div class="cuadro-rojo" data-grupo="GM2" data-idMateria="{{ $grupo->idMateria }}">
                                    <p><b>{{ $grupo->idMateria }}</b></p>
                                    <p>{{ $grupo->nombreMateria }}</p>
                                    <p>Grupo: {{ $grupo->grupo }}</p>
                                    <input type="hidden" name="idPeriodo" value="{{ $grupo->idPeriodo }}">
                                    <input type="hidden" name="idMateria" value="{{ $grupo->idMateria }}">
                                    <input type="hidden" name="nombreMateria" value="{{ $grupo->nombreMateria }}">
                                    <input type="hidden" name="grupo" value="{{ $grupo->grupo }}">
                                    <input type="checkbox" name="gruposrgm2[]" value="{{ $grupo->idGrupo }}" class="grupo-checkbox" data-idmateria="{{ $grupo->idMateria }}" data-grupo="GM2" {{-- disabled hidden --}}>
                                        {{-- <button type="submit" class="submit-btn">Ver Horario del Grupo</button> --}}
                                </div>
                                {{-- </form> --}}
                            @endif
                        @endforeach
                    </div>
                @endif
                {{ $grupos2->links() }}    
                @if($grupos->isNotEmpty())
                {{-- 3 --}}
                    <div class="fila">
                        <label for="" class="azul">GM1</label>
                    </div>
                    <div class="fila">
                        @foreach($grupos as $grupo)
                            @if($grupo->grupo == 'GM1')
                                {{-- <form method="POST" action="{{ route('verhorariogrupo') }}">
                                    @csrf --}}
                                <div class="cuadro-azul" data-grupo="GM1C">
                                    <p><b>{{ $grupo->idMateria }}</b></p>
                                    <p>{{ $grupo->nombreMateria }}</p>
                                    <p>Grupo: {{ $grupo->grupo }}</p>
                                    <input type="hidden" name="idPeriodo" value="{{ $grupo->idPeriodo }}">
                                    <input type="hidden" name="idMateria" value="{{ $grupo->idMateria }}">
                                    <input type="hidden" name="nombreMateria" value="{{ $grupo->nombreMateria }}">
                                    <input type="hidden" name="grupo" value="{{ $grupo->grupo }}">
                                    <input type="checkbox" name="gruposcgm1[]" value="{{ $grupo->idGrupo }}" class="grupo-checkbox" data-idmateria="{{ $grupo->idMateria }}" data-grupo="GM1C" {{-- disabled hidden --}}>
                                        {{-- <button type="submit" class="submit-btn">Ver Horario del Grupo</button> --}}
                                </div>
                                {{-- </form> --}}
                            @endif
                        @endforeach
                    </div>
                {{-- 4 --}}
                    <div class="fila">
                        <label for="" class="azul">GM2</label>
                    </div>
                    <div class="fila">
                        @foreach($grupos as $grupo)
                            @if($grupo->grupo == 'GM2')
                                {{-- <form method="POST" action="{{ route('verhorariogrupo') }}">
                                    @csrf --}}
                                <div class="cuadro-azul" data-grupo="GM2C">
                                    <p><b>{{ $grupo->idMateria }}</b></p>
                                    <p>{{ $grupo->nombreMateria }}</p>
                                    <p>Grupo: {{ $grupo->grupo }}</p>
                                    <input type="hidden" name="idPeriodo" value="{{ $grupo->idPeriodo }}">
                                    <input type="hidden" name="idMateria" value="{{ $grupo->idMateria }}">
                                    <input type="hidden" name="nombreMateria" value="{{ $grupo->nombreMateria }}">
                                    <input type="hidden" name="grupo" value="{{ $grupo->grupo }}">
                                    <input type="checkbox" name="gruposcgm2[]" value="{{ $grupo->idGrupo }}" class="grupo-checkbox" data-idmateria="{{ $grupo->idMateria }}" data-grupo="GM2C" {{-- disabled hidden --}}>
                                        {{-- <button type="submit" class="submit-btn">Ver Horario del Grupo</button> --}}
                                </div>
                                {{-- </form> --}}
                            @endif
                        @endforeach
                @endif
        </div>
        <br>
        <div class="contenedor-filas">
            <label for="" class="verde">Grupos Vespertinos</label>
            @if($grupos2->isNotEmpty())
            {{-- 5 --}}
                <div class="fila">
                    <label for="" class="rojo">GV1</label>
                </div>
                <div class="fila">
                    @foreach($grupos2 as $grupo)
                        @if($grupo->grupo == 'GV1')
                            {{-- <form method="POST" action="{{ route('verhorariogrupo') }}">
                                @csrf --}}
                            <div class="cuadro-rojo" data-grupo="GV1">
                                <p><b>{{ $grupo->idMateria }}</b></p>
                                <p>{{ $grupo->nombreMateria }}</p>
                                <p>Grupo: {{ $grupo->grupo }}</p>
                                <input type="hidden" name="idPeriodo" value="{{ $grupo->idPeriodo }}">
                                <input type="hidden" name="idMateria" value="{{ $grupo->idMateria }}">
                                <input type="hidden" name="nombreMateria" value="{{ $grupo->nombreMateria }}">
                                <input type="hidden" name="grupo" value="{{ $grupo->grupo }}">
                                <input type="checkbox" name="gruposrgv1[]" value="{{ $grupo->idGrupo }}" class="grupo-checkbox" data-idmateria="{{ $grupo->idMateria }}" data-grupo="GV1" {{-- disabled hidden --}}>
                                    {{-- <button type="submit" class="submit-btn">Ver Horario del Grupo</button> --}}
                            </div>
                            {{-- </form>            --}}
                        @endif
                    @endforeach
                </div>
            {{-- 6 --}}
                <div class="fila">
                    <label for="" class="rojo">GV2</label>
                </div>
                <div class="fila">
                    @foreach($grupos2 as $grupo)
                        @if($grupo->grupo == 'GV2')
                            {{-- <form method="POST" action="{{ route('verhorariogrupo') }}">
                                @csrf --}}
                            <div class="cuadro-rojo" data-grupo="GV2">
                                <p><b>{{ $grupo->idMateria }}</b></p>
                                <p>{{ $grupo->nombreMateria }}</p>
                                <p>Grupo: {{ $grupo->grupo }}</p>
                                <input type="hidden" name="idPeriodo" value="{{ $grupo->idPeriodo }}">
                                <input type="hidden" name="idMateria" value="{{ $grupo->idMateria }}">
                                <input type="hidden" name="nombreMateria" value="{{ $grupo->nombreMateria }}">
                                <input type="hidden" name="grupo" value="{{ $grupo->grupo }}">
                                <input type="checkbox" name="gruposrgv2[]" value="{{ $grupo->idGrupo }}" class="grupo-checkbox" data-idmateria="{{ $grupo->idMateria }}" data-grupo="GV2" {{-- disabled hidden --}}>
                                    {{-- <button type="submit" class="submit-btn">Ver Horario del Grupo</button> --}}
                            </div>
                            {{-- </form> --}}
                        @endif
                    @endforeach
                </div>
            @endif
            {{ $grupos2->links() }}    
            @if($grupos->isNotEmpty())
            {{-- 7 --}}
                <div class="fila">
                    <label for="" class="azul">GV1</label>
                </div>
                <div class="fila">
                    @foreach($grupos as $grupo)
                        @if($grupo->grupo == 'GV1')
                            {{-- <form method="POST" action="{{ route('verhorariogrupo') }}">
                                @csrf --}}
                            <div class="cuadro-azul" data-grupo="GV1C">
                                <p><b>{{ $grupo->idMateria }}</b></p>
                                <p>{{ $grupo->nombreMateria }}</p>
                                <p>Grupo: {{ $grupo->grupo }}</p>
                                <input type="hidden" name="idPeriodo" value="{{ $grupo->idPeriodo }}">
                                <input type="hidden" name="idMateria" value="{{ $grupo->idMateria }}">
                                <input type="hidden" name="nombreMateria" value="{{ $grupo->nombreMateria }}">
                                <input type="hidden" name="grupo" value="{{ $grupo->grupo }}">
                                <input type="checkbox" name="gruposcgv1[]" value="{{ $grupo->idGrupo }}" class="grupo-checkbox" data-idmateria="{{ $grupo->idMateria }}" data-grupo="GV1C" {{-- disabled hidden --}}>
                                    {{-- <button type="submit" class="submit-btn">Ver Horario del Grupo</button> --}}
                            </div>
                            {{-- </form> --}}
                        @endif
                    @endforeach
                </div>
            {{-- 8 --}}
                <div class="fila">
                    <label for="" class="azul">GV2</label>
                </div>
                <div class="fila">
                    @foreach($grupos as $grupo)
                        @if($grupo->grupo == 'GV2')
                            {{-- <form method="POST" action="{{ route('verhorariogrupo') }}">
                                @csrf --}}
                            <div class="cuadro-azul" data-grupo="GV2C">
                                <p><b>{{ $grupo->idMateria }}</b></p>
                                <p>{{ $grupo->nombreMateria }}</p>
                                <p>Grupo: {{ $grupo->grupo }}</p>
                                <input type="hidden" name="idPeriodo" value="{{ $grupo->idPeriodo }}">
                                <input type="hidden" name="idMateria" value="{{ $grupo->idMateria }}">
                                <input type="hidden" name="nombreMateria" value="{{ $grupo->nombreMateria }}">
                                <input type="hidden" name="grupo" value="{{ $grupo->grupo }}">
                                <input type="checkbox" name="gruposcgv2[]" value="{{ $grupo->idGrupo }}" class="grupo-checkbox" data-idmateria="{{ $grupo->idMateria }}" data-grupo="GV2C" {{-- disabled hidden --}}>
                                    {{-- <button type="submit" class="submit-btn">Ver Horario del Grupo</button> --}}
                            </div>
                            {{-- </form> --}}
                        @endif
                    @endforeach
                    @endif
                </div>
                <button type="submit" class="submit-btn">Seleccionar Grupos</button>
            </form>
        </div>
    </div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // const toggleCheckboxes = document.querySelectorAll(".grupo-checkbox-toggle");
        const grupoCheckboxes = document.querySelectorAll(".grupo-checkbox");
        const submitButton = document.querySelector(".submit-btn");

        grupoCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function () {
                id = this.dataset.idmateria;
                const checkboxes = document.querySelectorAll(`.grupo-checkbox[data-idmateria="${id}"]`);

                checkboxes.forEach((checkbox) => {
                    if(!checkbox.checked){
                        checkbox.checked = false;
                    }
                    else{
                        checkbox.checked = false;
                        this.checked = true;
                    }
                });
                // alert(this.dataset.idmateria);
            })
        });

        // toggleCheckboxes.forEach((toggle) => {
        //     toggle.addEventListener("change", function () {
        //         const grupo = this.dataset.grupo;
        //         const checkboxes = document.querySelectorAll(`.grupo-checkbox[data-grupo="${grupo}"]`);

        //         checkboxes.forEach((checkbox) => {
        //             checkbox.checked = this.checked; // Marca o desmarca según el estado del checkbox de grupo
        //             // checkbox.disabled = !this.checked; // Habilita o deshabilita los checkboxes del grupo
        //         });

        //         /* Aqui van los if */
        //     });
        // });

        submitButton.addEventListener("click", function (e) {
            let anyChecked = false;

            toggleCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    anyChecked = true;
                }
            });

            if (!anyChecked) {
                e.preventDefault(); // Evitar envío si no hay ninguno marcado
                alert("Favor de seleccionar sus materias");
            }
        });
    });
</script>
<script>
                // if (this.checked && this.dataset.grupo.startsWith('GM')) {
                //     toggleCheckboxes.forEach(cb => {
                //         if (cb !== this && cb.dataset.grupo.startsWith('GM')) {
                //             cb.checked = false;
                //             if(this.dataset.grupo == 'GM1') {
                //                 grupoCheckboxes.forEach(checkbox => {
                //                     if (checkbox.dataset.grupo == 'GM2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     }
                //                     if (checkbox.dataset.grupo == 'GV1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true;
                //                     }
                //                     if (checkbox.dataset.grupo == 'GV2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     toggleCheckboxes.forEach(cb => {
                //                         if (cb.dataset.grupo == 'GV1') {
                //                             cb.checked = false;
                //                         }
                //                         if (cb.dataset.grupo == 'GV2') {
                //                             cb.checked = false;
                //                         } 
                //                     });
                //                 });
                //             }
                //             if(this.dataset.grupo == 'GM2') {
                //                 grupoCheckboxes.forEach(checkbox => {
                //                     if (checkbox.dataset.grupo == 'GM1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true;
                //                     }
                //                     if (checkbox.dataset.grupo == 'GV2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     toggleCheckboxes.forEach(cb => {
                //                         if (cb.dataset.grupo == 'GV1') {
                //                             cb.checked = false;
                //                         }
                //                         if (cb.dataset.grupo == 'GV2') {
                //                             cb.checked = false;
                //                         } 
                //                     });
                //                 });
                //             }
                //             if(this.dataset.grupo == 'GM1C') {
                //                 grupoCheckboxes.forEach(checkbox => {
                //                     if (checkbox.dataset.grupo == 'GM2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true;
                //                     }
                //                     if (checkbox.dataset.grupo == 'GV2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     toggleCheckboxes.forEach(cb => {
                //                         if (cb.dataset.grupo == 'GV1C') {
                //                             cb.checked = false;
                //                         }
                //                         if (cb.dataset.grupo == 'GV2C') {
                //                             cb.checked = false;
                //                         } 
                //                     });
                //                 });
                //             }
                //             if(this.dataset.grupo == 'GM2C') {
                //                 grupoCheckboxes.forEach(checkbox => {
                //                     if (checkbox.dataset.grupo == 'GM1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     }
                //                     if (checkbox.dataset.grupo == 'GV1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true;
                //                     }
                //                     if (checkbox.dataset.grupo == 'GV2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     toggleCheckboxes.forEach(cb => {
                //                         if (cb.dataset.grupo == 'GV1C') {
                //                             cb.checked = false;
                //                         }
                //                         if (cb.dataset.grupo == 'GV2C') {
                //                             cb.checked = false;
                //                         } 
                //                     });
                //                 });
                //             }
                //         }
                //     });
                // }

                // if (this.checked && this.dataset.grupo.startsWith('GV')) {
                //     toggleCheckboxes.forEach(cb => {
                //         if (cb !== this && cb.dataset.grupo.startsWith('GV')) {
                //             cb.checked = false;
                //             if(this.dataset.grupo == 'GV1') {
                //                 grupoCheckboxes.forEach(checkbox => {
                //                     if (checkbox.dataset.grupo == 'GV2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     }
                //                     if (checkbox.dataset.grupo == 'GM1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true;
                //                     }
                //                     if (checkbox.dataset.grupo == 'GM2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     toggleCheckboxes.forEach(cb => {
                //                         if (cb.dataset.grupo == 'GM1') {
                //                             cb.checked = false;
                //                         }
                //                         if (cb.dataset.grupo == 'GM2') {
                //                             cb.checked = false;
                //                         } 
                //                     });
                //                 });
                //             }
                //             if(this.dataset.grupo == 'GV2') {
                //                 grupoCheckboxes.forEach(checkbox => {
                //                     if (checkbox.dataset.grupo == 'GV1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true;
                //                     }
                //                     if (checkbox.dataset.grupo == 'GM2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     toggleCheckboxes.forEach(cb => {
                //                         if (cb.dataset.grupo == 'GM1') {
                //                             cb.checked = false;
                //                         }
                //                         if (cb.dataset.grupo == 'GM2') {
                //                             cb.checked = false;
                //                         } 
                //                     });
                //                 });
                //             }
                //             if(this.dataset.grupo == 'GV1C') {
                //                 grupoCheckboxes.forEach(checkbox => {
                //                     if (checkbox.dataset.grupo == 'GV2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GM1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true;
                //                     }
                //                     if (checkbox.dataset.grupo == 'GM2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     toggleCheckboxes.forEach(cb => {
                //                         if (cb.dataset.grupo == 'GM1C') {
                //                             cb.checked = false;
                //                         }
                //                         if (cb.dataset.grupo == 'GM2C') {
                //                             cb.checked = false;
                //                         } 
                //                     });
                //                 });
                //             }
                //             if(this.dataset.grupo == 'GV2C') {
                //                 grupoCheckboxes.forEach(checkbox => {
                //                     if (checkbox.dataset.grupo == 'GV1') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     if (checkbox.dataset.grupo == 'GV2') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     }
                //                     if (checkbox.dataset.grupo == 'GM1C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true;
                //                     }
                //                     if (checkbox.dataset.grupo == 'GM2C') {
                //                         checkbox.checked = false;
                //                         checkbox.disabled = true; 
                //                     } 
                //                     toggleCheckboxes.forEach(cb => {
                //                         if (cb.dataset.grupo == 'GM1C') {
                //                             cb.checked = false;
                //                         }
                //                         if (cb.dataset.grupo == 'GM2C') {
                //                             cb.checked = false;
                //                         } 
                //                     });
                //                 });
                //             }
                //         }
                //     });
                // }
</script>
@endsection

