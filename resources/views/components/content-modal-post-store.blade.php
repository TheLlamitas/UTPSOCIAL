<div id="header-modal" class="bg-white">
    <div class="sm:items-center">
        <div class="p-2 border-b-2 text-center sm:text-center border-gray-200">
            <div id="header-title" class="flex justify-center items-center px-2">
                <div id="back" class="hidden">
                    <button id="button-back">
                        <x-icons.back/>
                    </button>
                </div>
                <h1 id="title" class="text-md font-semibold text-gray-900" id="modal-title">
                    Crea una nueva publicación
                </h1>
                <div id="next" class="hidden">
                    <a id="next-a" class="text-sky-500 hover:text-sky-700 cursor-pointer font-semibold">Siguiente</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="body-modal" class="text-center h-full">
    <x-forms.form id="store-post" route="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        <!-- the first file input -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="flex w-full h-full">
            <div id="dropzone-container" class="flex items-center justify-center w-full h-full min-[576px]:max-w-[576px] min-[992px]:max-w-[704px] min-[992px]:max-h-[704px]">
                <label id="step1" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="block">
                        <x-div-nothing-to-show src="{{ asset('img/galery.png') }}" alt="image saved" textH1="" textP="Selecciona las fotos y los videos aquí"/>
                    </div>
                    <input id="dropzone-file" name="file" type="file" class="hidden" accept=".jfif,.pjpeg,.jpeg,.pjp,.jpg,.png,.heic,heif"/>
                </label>
                <div id="spinner" class="hidden items-center justify-center h-screen">
                    <div class="border-t-4 border-blue-500 border-solid rounded-full w-12 h-12 animate-spin"></div>
                </div>
                <canvas id="canvas" style="display: none;"></canvas>
            </div>
            
            <div id="description" class="hidden col-span-full w-full p-5">
                <div class="container mx-auto">
                    <div class="flex flex-row justify-left">
                        <div class="m-1 mr-2 w-8 h-8 relative flex justify-left items-center rounded-full bg-gray-500 text-xl text-white">
                            <img src="{{ asset(auth()->user()->image) }}" class="rounded-full" alt="">
                        </div>
                        <p class="text-gray-800 text-sm flex items-center font-semibold"> {{ auth()->user()->username }}
                    </div>
                </div>
                <div class="mt-2">
                    <textarea id="descriptionTextarea" name="description" rows="5" class="resize-none block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 border-none focus:outline-none focus:ring-0 border-transparent" placeholder="Escribe una descripción..."></textarea>
                    <div id="contentEmoji" class="flex justify-between border-b border-gray-200 m-1 mr-2 items-center">
                        <div class="p-2">
                            <x-icons.emoji id="openEmoji"/>
                        </div>
                        <div id="countDescription" class="text-gray-400 text-sm">
                            0/191
                        </div>
                    </div>
                    <div id="emoji" class="hidden"></div>
                </div>
            </div>
        </div>
        <div class="hidden w-full flex-col items-center md:flex-row">
            <x-forms.input-button type="submit" value="Compartir"/>
        </div>
    </x-forms.form>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>
@endpush
