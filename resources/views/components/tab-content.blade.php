<div
    class="@isset($class){{ $class }}@endisset hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
    id="{{ $tabName }}"
    role="tabpanel"
    aria-labelledby="{{ $tabName }}-tab"
    @isset($dataActive){{ $dataActive }}@endisset>
    <div class="sm:container mx-auto sm:px-5 lg:px-32 lg:pt-12">
        <div class="-m-1 flex flex-wrap md:-m-2">
            {{ $slot }}
        </div>
    </div>
</div>
