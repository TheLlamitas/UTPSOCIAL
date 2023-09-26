<div class="mt-5 w-full">
    <img class="m-auto text-center" src="{{ $src }}" alt="{{ $alt }}">
</div>
<div class="text-center w-full mt-5">
    <h1 class="text-3xl font-black font-sans text-center">{{ $textH1 }}</h1>
    <p class="m-3 text-md text-gray-800 text-center">{{ $textP }}</p>
    {{ $slot }}
</div>
