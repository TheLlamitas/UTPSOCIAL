<div id="header-modal" class="bg-white">
    <div class="sm:items-center">
        <div class="p-2 border-b-2 text-center sm:text-center border-gray-200">
            <div id="header-title" class="flex justify-center items-center px-2">
                <div id="back" class="hidden">
                    @if(!isset($textCancel))
                        <button id="button-back">
                            <x-icons.back/>
                        </button>
                    @else
                        <button id="button-back">
                            {{ $textCancel }}
                        </button>
                    @endif
                </div>
                <h1 id="title" class="text-md font-semibold text-gray-900">
                    {{ $title }}
                </h1>
                <div id="next" class="hidden">
                    <a id="next-a" class="text-sky-500 hover:text-sky-700 cursor-pointer font-semibold">{{ $textNext }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
