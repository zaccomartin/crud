@extends("layouts.app")

@section("content")
<center><h1>chico bomba chicho chico bomba..</h1></center>
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5">{{ __("Listado de proyectos") }}</h1>
            <a href="{{ route("projects.create") }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                {{ __("Crear proyecto") }}
            </a>
        </div>
    </div>
@endsection