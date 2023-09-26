<div class="flex justify-center">
    <div class="md:w-8/12 lg:w-8/12 w-full flex flex-col items-center md:flex-row">
        <div class="grid sm:grid-cols-1 grid-cols-3 w-full md:w-4/12 lg:w-4/12 items-center mt-4">
            <div class="sm:mb-11 mt-4">
                @if(isset($user->image))
                    <img class="rounded-full sm:h-40 h-20 mx-4 sm:mx-auto" src="{{ asset($user->image) }}" alt="Imagen de perfil">
                @else
                    <img class="rounded-full sm:h-40 h-20 mx-4 sm:mx-auto" src="{{ asset('img/no-photo.jpg') }}" alt="Imagen de perfil">
                @endif
            </div>
            <div class="pl-2 pr-6 text-start jus sm:hidden block col-span-2">
                <p class="text-gray-800 text-xl flex items-center"> {{ $user->username }}
                    @if ($user->email_verified_at)
                        <x-icons.verified/>
                    @endif
                </p>
                @auth
                    @if ($user->id === auth()->user()->id)
                        <a href="{{ route('profile.index', $user) }}" class="text-center mt-5 block w-full text-gray-800 text-sm hover:bg-gray-300 bg-gray-200 py-2 px-4 rounded-lg font-semibold cursor-pointer">
                            Editar perfil
                        </a>
                    @else
                        <button class="mt-5 text-white text-sm hover:bg-sky-700 bg-sky-500 py-2 px-4 rounded-lg font-semibold cursor-pointer" type="submit">Seguir</button>
                    @endif
                @endauth
            </div>
        </div>
        <div class="w-full md:w-8/12 lg:w-8/12 md:flex sm:justify-start justify-center items-center">
            <div class="p-1">
                <div class="grid grid-cols-2 gap-4 items-center py-3">
                    <div class="px-2 text-left sm:text-start">
                        <p class="text-gray-700 text-xl hidden sm:flex items-center">{{ $user->username }}
                            @if ($user->email_verified_at)
                                <x-icons.verified/>
                            @endif
                        </p>
                        <p class="text-gray-700 text-sm font-semibold block sm:hidden pb-4">{{ $user->name }}</p>
                    </div>
                    <div class="px-2 text-center sm:text-start hidden sm:block">
                        @auth
                            @if ($user->id === auth()->user()->id)
                                <a href="{{ route('profile.index', $user) }}" class="text-center block w-full text-gray-800 text-sm hover:bg-gray-300 bg-gray-200 py-2 px-4 rounded-lg font-semibold cursor-pointer">
                                    Editar perfil
                                </a>
                            @else
                                <button class="text-white text-sm hover:bg-sky-700 bg-sky-500 py-2 px-4 rounded-lg font-semibold cursor-pointer" type="submit">Seguir</button>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 items-center py-3 px-4 sm:px-0 border-t-2 sm:border-t-0">
                    <x-div-count :count="$posts->count()" text="publicaciones"/>
                    <x-div-count count="1K" text="seguidores"/>
                    <x-div-count count="10" text="seguidos"/>
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
