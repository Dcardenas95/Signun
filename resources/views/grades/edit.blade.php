@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

    <!-- Main container -->
    <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-800">
        <!-- Form container -->
        <div class="p-6 bg-white border border-gray-300 rounded-lg shadow-md w-full max-w-md dark:bg-gray-700 dark:border-gray-600">
            <form method="POST" action="{{ route('grades.update', $grade) }}">
                {{ method_field('PUT') }}
                @csrf
                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asignatura</label>
                    <input type="text" name="subject" id="subject" value="{{ $grade->subject }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" required />
                </div>
                <div>
                    <label for="nameTeacher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Docente</label>
                    <input type="text" name="nameTeacher" id="nameTeacher" value="{{ $grade->nameTeacher }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
                <div>
                    <label for="hour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hora</label>
                    <input type="time" name="hour" id="hour" value="{{ $grade->hour->format('H:i') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
                <div>
                    <label for="credit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Creditos</label>
                    <input type="number" name="credit" id="credit" value="{{ $grade->credit }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>

                <button type="submit"
                    class="w-full mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
            </form>
        </div>
    </div>

@endsection
