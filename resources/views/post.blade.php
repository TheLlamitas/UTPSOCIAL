@extends('layouts.app')

@section('contenido')
    <div class="flex justify-center">
        <div class="md:w-8/12 lg:w-8/12 w-full flex flex-col items-center md:flex-row">
            <div class="grid sm:grid-cols-1 grid-cols-3 w-full md:w-4/12 lg:w-4/12 items-center">
                <div class="p-3">
                    @if ($user->id === auth()->user()->id)
                        <img class="rounded-full sm:h-40 h-20 m-auto" src="{{ asset('img/user.jpg') }}" alt="Imagen de perfil">
                    @else
                        <img class="rounded-full sm:h-40 h-20 m-auto" src="{{ asset('img/user2.png') }}" alt="Imagen de perfil">
                    @endif
                </div>
                <div class="pl-2 pr-6 text-start jus sm:hidden block col-span-2">
                    <p class="text-gray-800 text-xl flex items-center"> {{ $user->username }}
                        <svg aria-label="Verificado" class="ml-2" color="rgb(0, 149, 246)" fill="rgb(0, 149, 246)" height="18" role="img" viewBox="0 0 40 40" width="18">
                            <title>Verificado</title>
                            <path d="M19.998 3.094 14.638 0l-2.972 5.15H5.432v6.354L0 14.64 3.094 20 0 25.359l5.432 3.137v5.905h5.975L14.638 40l5.36-3.094L25.358 40l3.232-5.6h6.162v-6.01L40 25.359 36.905 20 40 14.641l-5.248-3.03v-6.46h-6.419L25.358 0l-5.36 3.094Zm7.415 11.225 2.254 2.287-11.43 11.5-6.835-6.93 2.244-2.258 4.587 4.581 9.18-9.18Z" fill-rule="evenodd"></path>
                        </svg>
                    </p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <button class="mt-5 block w-full text-gray-800 text-sm hover:bg-gray-300 bg-gray-200 py-2 px-4 rounded-lg font-semibold cursor-pointer" type="submit">Editar perfil</button>
                        @else
                            <button class="mt-5 text-white text-sm hover:bg-sky-700 bg-sky-500 py-2 px-4 rounded-lg font-semibold cursor-pointer" type="submit">Seguir</button>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="w-full md:w-8/12 lg:w-8/12 md:flex sm:justify-start justify-center items-center">
                <div class="p-1">
                    <div class="grid grid-cols-2 gap-4 items-center py-3">
                        <div class="px-2 text-center sm:text-start">
                            <p class="text-gray-700 text-xl hidden sm:flex items-center">{{ $user->username }}
                                <svg aria-label="Verificado" class="ml-2" color="rgb(0, 149, 246)" fill="rgb(0, 149, 246)" height="18" role="img" viewBox="0 0 40 40" width="18">
                                    <title>Verificado</title>
                                    <path d="M19.998 3.094 14.638 0l-2.972 5.15H5.432v6.354L0 14.64 3.094 20 0 25.359l5.432 3.137v5.905h5.975L14.638 40l5.36-3.094L25.358 40l3.232-5.6h6.162v-6.01L40 25.359 36.905 20 40 14.641l-5.248-3.03v-6.46h-6.419L25.358 0l-5.36 3.094Zm7.415 11.225 2.254 2.287-11.43 11.5-6.835-6.93 2.244-2.258 4.587 4.581 9.18-9.18Z" fill-rule="evenodd"></path>
                                </svg>
                            </p>
                            <p class="text-gray-700 text-md font-semibold block sm:hidden">{{ $user->name }}</p>
                        </div>
                        <div class="px-2 text-center sm:text-start hidden sm:block">
                            @auth
                                @if ($user->id === auth()->user()->id)
                                    <button class=" text-gray-800 text-sm hover:bg-gray-300 bg-gray-200 py-2 px-4 rounded-lg font-semibold cursor-pointer" type="submit">Editar perfil</button>
                                @else
                                    <button class="text-white text-sm hover:bg-sky-700 bg-sky-500 py-2 px-4 rounded-lg font-semibold cursor-pointer" type="submit">Seguir</button>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 items-center py-3 px-4 sm:px-0 border-t-2 sm:border-t-0">
                        <div class="px-2">
                            <span class="text-gray-700 text-sm">
                                <span class="flex sm:inline font-bold items-center justify-center">0</span>
                                <span class="flex sm:inline font-normal items-center justify-center">publicaciones</span>
                            </span>
                        </div>
                        <div class="px-2">
                            <span class="text-gray-700 text-sm">
                                <span class="flex sm:inline font-bold items-center justify-center">0</span>
                                <span class="flex sm:inline font-normal items-center justify-center">seguidores</span>
                            </span>
                        </div>
                        <div class="px-2">
                            <span class="text-gray-700 text-sm">
                                <span class="flex sm:inline font-bold items-center justify-center">0</span>
                                <span class="flex sm:inline font-normal items-center justify-center">seguidos</span>
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 items-center sm:py-3">
                        <div class="px-2 text-center sm:text-start">
                            <p class="text-gray-800 text-base font-semibold hidden sm:block"> {{ $user->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-sm font-medium text-center text-gray-500 border-b-0 border-t border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px items-center justify-center sm:gap-2 gap-12" role="tablist" data-te-nav-ref>
            <li class="mr-2" role="presentation">
                <a
                    href="#tabs-publications"
                    class="flex gap-2 items-center my-0 border-x-0 border-b-0 border-t-2 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-gray-800 data-[te-nav-active]:text-gray-800 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                    data-te-toggle="pill"
                    data-te-target="#tabs-publications"
                    data-te-nav-active
                    role="tab"
                    aria-controls="tabs-publications"
                    aria-selected="true">
                    <svg color="border-gray-800" fill="border-gray-800" height="12" role="img" viewBox="0 0 24 24" width="12">
                        <rect fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="18" x="3" y="3"></rect>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="9.015" x2="9.015" y1="3" y2="21"></line>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="14.985" x2="14.985" y1="3" y2="21"></line>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="9.015" y2="9.015"></line>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="14.985" y2="14.985"></line>
                    </svg>
                    <p class="hidden sm:block">Publicaciones</p>
                </a>
            </li>
            @auth
                @if ($user->id === auth()->user()->id)
                    <li class="mr-2" role="presentation">
                        <a
                            href="#tabs-saved"
                            class="flex gap-2 items-center my-0 border-x-0 border-b-0 border-t-2 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-gray-800 data-[te-nav-active]:text-gray-800 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                            data-te-toggle="pill"
                            data-te-target="#tabs-saved"
                            role="tab"
                            aria-controls="tabs-saved"
                            aria-selected="false"
                        >
                        <svg color="border-gray-800" fill="border-gray-800" height="12" role="img" viewBox="0 0 24 24" width="12">
                            <polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon>
                        </svg>
                            <p class="hidden sm:block">Guardado</p>
                        </a>
                    </li>
                @endif
            @endauth
            <li class="mr-2" role="presentation">
                <a
                    href="#tabs-tagged"
                    class="flex gap-2 items-center my-0 border-x-0 border-b-0 border-t-2 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-gray-800 data-[te-nav-active]:text-gray-800 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                    data-te-toggle="pill"
                    data-te-target="#tabs-tagged"
                    role="tab"
                    aria-controls="tabs-tagged"
                    aria-selected="false"
                    >
                    <svg color="border-gray-800" fill="border-gray-800" height="12" role="img" viewBox="0 0 24 24" width="12">
                        <path d="M10.201 3.797 12 1.997l1.799 1.8a1.59 1.59 0 0 0 1.124.465h5.259A1.818 1.818 0 0 1 22 6.08v14.104a1.818 1.818 0 0 1-1.818 1.818H3.818A1.818 1.818 0 0 1 2 20.184V6.08a1.818 1.818 0 0 1 1.818-1.818h5.26a1.59 1.59 0 0 0 1.123-.465Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        <path d="M18.598 22.002V21.4a3.949 3.949 0 0 0-3.948-3.949H9.495A3.949 3.949 0 0 0 5.546 21.4v.603" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        <circle cx="12.072" cy="11.075" fill="none" r="3.556" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                    </svg>
                    <p class="hidden sm:block">Etiquetadas</p>
                </a>
            </li>
        </ul>
    </div>
    
    <!--Tabs content-->
    <div class="mb-6">
        <div
            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-publications"
            role="tabpanel"
            aria-labelledby="tabs-publications-tab"
            data-te-tab-active>
                <div class="sm:container mx-auto sm:px-5 px-2 py-2 lg:px-32 lg:pt-12">
                    <div class="-m-1 flex flex-wrap md:-m-2">
                        <div class="flex w-1/3 flex-wrap">
                            <div class="w-full p-0.5">
                                <img
                                    alt="gallery"
                                    class="block h-full w-full object-cover object-center"
                                    src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" />
                            </div>
                        </div>
                        <div class="flex w-1/3 flex-wrap">
                            <div class="w-full p-0.5">
                                <img
                                    alt="gallery"
                                    class="block h-full w-full object-cover object-center"
                                    src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp" />
                            </div>
                        </div>
                        <div class="flex w-1/3 flex-wrap">
                            <div class="w-full p-0.5">
                                <img
                                    alt="gallery"
                                    class="block h-full w-full object-cover object-center"
                                    src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp" />
                            </div>
                        </div>
                        <div class="flex w-1/3 flex-wrap">
                            <div class="w-full p-0.5">
                                <img
                                    alt="gallery"
                                    class="block h-full w-full object-cover object-center"
                                    src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp" />
                            </div>
                        </div>
                        <div class="flex w-1/3 flex-wrap">
                            <div class="w-full p-0.5">
                                <img
                                    alt="gallery"
                                    class="block h-full w-full object-cover object-center"
                                    src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(76).webp" />
                            </div>
                        </div>
                        <div class="flex w-1/3 flex-wrap">
                            <div class="w-full p-0.5">
                                <img
                                    alt="gallery"
                                    class="block h-full w-full object-cover object-center"
                                    src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp" />
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div
            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-saved"
            role="tabpanel"
            aria-labelledby="tabs-saved-tab">
                <div class=" sm:justify-between sm:flex">
                    <p class=" text-center text-xs font-semibold text-gray-500 mt-5">Solo tú puedes ver lo que guardaste</p>
                    <a href="#" class="text-sky-700 cursor-pointer hidden sm:block">+ Nueva colección</a>
                </div>
                <div class="mt-20">
                    <img class="m-auto justify-center items-center text-center" src="{{ asset('img/saved.png') }}" alt="image saved">
                </div>
                <div class="text-center">
                    <h1 class="text-4xl font-black font-sans">Guardar</h1>
                    <p class="m-3 text-sm text-gray-800">Guarda fotos y videos que quieras volver a ver. Nadie recibirá una notificación y solo tú podrás ver lo que guardaste.</p>
                </div>
        </div>
        <div
            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-tagged"
            role="tabpanel"
            aria-labelledby="tabs-tagged">
            <div class="mt-20">
                <img class="m-auto text-center" src="{{ asset('img/target.png') }}" alt="image saved">
            </div>
            <div class="mt-5">
                <h1 class="text-2xl font-black font-sans text-center">Fotos en las que apareces</h1>
                <p class="m-3 text-sm text-gray-800 text-center">Cuando las personas te etiqueten en fotos, aparecerán aquí.</p>
            </div>
        </div>
    </div>
@endsection