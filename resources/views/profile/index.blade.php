@extends('layouts.app')

@section('contenido')
    
<div class="md:flex md:justify-center md:items-center">
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-2xl">
        <div class="flex justify-center">
            <img class="max-h-20 rounded-full" src="{{ asset('img/user.jpg') }}" alt="image profile">
        </div>
        <h2 class="mb-5 mt-5 text-gray-600 font-bold font-sans text-center">
            Editar perfil
        </h2>
        <hr class="mb-5">

        <form action="{{ route('profile.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Tu Nombre"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ auth()->user()->name }}"
                >
                @error('name')
                    <p class=" bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input
                    id="username"
                    name="username"
                    type="text"
                    placeholder="Tu Username"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{ auth()->user()->username }}"
                >
                @error('username')
                    <p class=" bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <input
                type="submit"
                value="Guardar"
                class=" bg-sky-600 hover:bg-green-600 transition-colors cursor-pointer uppercase w-full p-3 text-white rounded-lg font-bold"
            />
        </form>
    </div>
</div>
    
@endsection