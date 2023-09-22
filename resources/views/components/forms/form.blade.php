<form action="{{ $route }}" method="{{ $method }}">
    @csrf
    <x-forms.alert-session status="success" class="bg-green-500"/>
    <x-forms.alert-session status="warning" class="bg-orange-500"/>
    <x-forms.alert-session status="error" class="bg-red-500"/>
    {{ $slot }}
</form>
