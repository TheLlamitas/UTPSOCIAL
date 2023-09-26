<x-layout titlePage="Editar perfil">
    <div class="md:flex md:justify-center md:items-center">
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-2xl">
            <div class="flex justify-center">
                <img class="max-h-20 rounded-full" src="{{ asset('img/user.jpg') }}" alt="image profile">
            </div>
            <h2 class="mb-5 mt-5 text-gray-600 font-bold font-sans text-center">
                Editar perfil
            </h2>
            <hr class="mb-5">
            <x-forms.form route="{{ route('profile.store') }}" method="POST">
                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                <x-forms.input name="name" type="text" value="{{ auth()->user()->name }}" title="Nombre" placeholder="Tu Nombre"/>
                <x-forms.input name="username" type="text" value="{{ auth()->user()->username }}" title="Username" placeholder="Tu Username"/>
                <x-forms.input-button type="submit" value="Guardar"/>
            </x-forms.form>
        </div>
    </div>
</x-layout>
