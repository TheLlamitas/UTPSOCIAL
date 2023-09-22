<div class="md:flex md:justify-center md:items-center">
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-2xl">
        <div class="md:flex md:justify-center hidden sm:block">
            <img class="max-h-20" src="{{ asset('img/utp.png') }}" alt="UTP Social">
        </div>
        <h2 class="mb-5 text-gray-600 font-bold font-sans text-center">
            {{ $text }}
        </h2>
        <hr class="mb-5">
        {{ $slot }}
    </div>
</div>
