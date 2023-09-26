<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="interestModal">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white">
                    <div class="sm:items-center">
                        <div class="mt-3 text-center sm:my-2 sm:text-center border-gray-500">
                            <div class="flex justify-between items-center px-2">
                                <h1 class="text-md font-semibold text-gray-900" id="modal-title">
                                    Crea una nueva publicación
                                </h1>
                                <!--Close button-->
                                <button
                                    type="button"
                                    class="box-content closeModal rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                    data-te-modal-dismiss
                                    aria-label="Close">
                                    <x-icons.close/>
                                </button>
                            </div>
                            <hr class="my-3">
                            {{-- <div class="text-center w-full">
                                <x-icons.galery/>
                            </div> --}}
                            
                            {{-- <div class="flex items-center justify-center w-full px-5">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div> --}}
                            

                            <x-div-nothing-to-show src="{{ asset('img/galery.png') }}" alt="image saved" textH1="" textP="Arrastra las fotos y los videos aquí"/>
                            {{-- <div class="text-center w-full">
                                <h1 class="text-md font-normal text-gray-900">Arrastra las fotos y los videos aquí</h1>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 sm:px-6 text-center">
                    {{-- <x-forms.input-button type="file" value="Seleccionar de la computadora"/> --}}
                    <x-forms.form route="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        <!-- the first file input -->
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="description" value="Foto de prueba">
                        <label>
                            <input type="file" name="file" accept=".jfif,.pjpeg,.jpeg,.pjp,.jpg,.png,.heic,heif" class="text-sm mb-5 text-grey-500
                            file:mr-5 file:py-2 file:px-6
                            file:rounded-full file:border-0
                            file:text-sm file:font-medium
                            file:bg-blue-50 file:text-blue-700
                            hover:file:cursor-pointer hover:file:bg-amber-50
                            hover:file:text-amber-700"/>
                        </label>
                        <div class="w-full flex flex-col items-center md:flex-row">
                            <x-forms.input-button type="submit" value="Publicar"/>
                        </div>
                    </x-forms.form>
                </div>
            </div>
        </div>
    </div>
</div>
