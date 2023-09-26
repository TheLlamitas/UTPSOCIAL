<div class="flex w-1/3 flex-wrap p-0.5">
    <div class="w-full">
        @if (strpos($src, '.mp4'))
            <video width="1000" height="1000" controls>
                <source src="{{ $src }}" type="video/mp4">
                    <track label="Español" kind="captions" srclang="es" src="{{ $src }}">
                Your browser does not support the video tag.
            </video>
        @else
            <img
                alt="{{ $alt }}"
                class="block h-full w-full object-cover object-center"
                src="{{ $src }}" />
        @endif
    </div>
</div>
