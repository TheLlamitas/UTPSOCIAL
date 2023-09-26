<x-layout title="Regístrate" titlePage="Register">
    <x-card-main text="Registrate para ver fotos y vídeos de tus amigos.">
        <x-forms.form route="{{ route('register') }}" method="POST">
            <x-forms.input name="name" type="text" :value="old('name') ?? old('name')" title="Nombre" placeholder="Tu Nombre"/>
            <x-forms.input name="username" type="text" :value="old('username') ?? old('username')" title="Username" placeholder="Tu Username"/>
            <x-forms.input name="email" type="email" :value="old('email') ?? old('email')" title="Email" placeholder="Tu Correo electronico"/>
            <x-forms.input name="password" type="password" title="Contraseña" placeholder="Tu Contraseña"/>
            <x-forms.input name="password_confirmation" type="password" title="Repetir Contraseña" placeholder="Repite tu Contraseña"/>
            <x-forms.input-button type="submit" value="Crear Cuenta"/>
        </x-forms.form>
    </x-card-main>
    <x-card-footer text="¿Tienes una cuenta?" route="{{ route('login') }}" textSecondary="Inicia sesión"/>
</x-layout>
