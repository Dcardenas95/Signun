@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

    <!-- Incluir el partial del modal -->
    @include('modals.grade')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                <tr>
                    <th scope="col" class="px-6 py-3">
                        Asignatura
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Docente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Creditos
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $grade->subject }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $grade->hour->format('H:i') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $grade->nameTeacher }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $grade->credit }}
                    </td>
                    <td class="p-3 px-5 flex gap-2 text-blue-500">
                        <a href="{{ route('grades.edit', $grade) }}" class="btn btn-xs btn-info">
                            <i class="far fa-edit text-blue-800" style="margin-top: 15px">Editar</i>
                        </a>
                        <form method="POST" action="{{ route('grades.destroy', $grade) }}"
                            style="display: inline">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button class="btn btn-xs btn-danger text-red-500"
                                onclick="return confirm('¿ESTÁ SEGURO DE ELIMINAR LA MATERIA?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $grades->links() }}
    </div>



@endsection
@section('scripts')
<script>
    
    $(document).ready(function() {
        $("#btnGuardar").click(function(e) {
            guardarFormulario(e);
        });
    });

    function guardarFormulario(e) {
        e.preventDefault();

         // Validar campos requeridos
         var valid = true;
        $('#form input[required]').each(function() {
            if ($(this).val() === '') {
                valid = false;
                $(this).addClass('border-red-500');
            } else {
                $(this).removeClass('border-red-500');
            }
        });

        if (!valid) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete todos los campos requeridos.',
            });
            return;
        }

        var form = document.getElementById("form");
        let datosFormulario = new FormData($('#form')[0]);

        $.ajax({
            type: 'POST',
            url: 'grades',
            dataType: 'json',
            data: datosFormulario,
            cache: false,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            success: function(respuesta) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: respuesta.message,
                    showConfirmButton: false,
                    timer: 2000
                });

                setTimeout(function() {
                    location.reload();
                }, 1500);
            },
            error: function(request, status, error) {
                alert('Dato inválido');
            }
        });
    }

   
</script>

@endsection
