<x-layout :titlePage="$user->name">
    @push('vite')
        @vite('resources/js/modalShowPost.js')
        @vite('resources/js/modalEditPost.js')
    @endpush
    <x-div-profile :user="$user" :posts="$posts"/>
    <x-forms.alert/>
    {{-- @error('file')
        <p class=" bg-orange-500 text-white my-2 rounded-lg p-2 text-center">{{ $message }}</p>
        <x-forms.alert/>
    @enderror --}}
    <x-div-ul>
        <x-forms.li tagName="tabs-publications" text="Publicaciones" selected="true" dataActive="data-te-nav-active">
            @mobile
                <x-icons.posts-mobile/>
            @elsemobile
                <x-icons.posts/>
            @endmobile
        </x-forms.li>
        @auth
            @if ($user->id === auth()->user()->id)
                <x-forms.li tagName="tabs-saved" text="Guardado" selected="false">
                    @mobile
                        <x-icons.saved-mobile/>
                    @elsemobile
                        <x-icons.saved/>
                    @endmobile
                </x-forms.li>
            @endif
        @endauth
        <x-forms.li tagName="tabs-tagged" text="Etiquetadas" selected="false">
            @mobile
                <x-icons.tagged-mobile/>
            @elsemobile
                <x-icons.tagged/>
            @endmobile
        </x-forms.li>
    </x-div-ul>
    <!--Tabs content-->
    <div class="mb-6">
        <x-tab-content tabName="tabs-publications" dataActive="data-te-tab-active" class="opacity-100 container-posts">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-div-post alt="gallery" :post="$post" userId="{{ auth()->user()->id }}"/>
                @endforeach
            @else
                @if ($user->id == auth()->user()->id)
                    <x-div-nothing-to-show src="{{ asset('img/publication.png') }}" alt="image saved" textH1="Comparte fotos" textP="Cuando compartas fotos, aparecerán en tu perfil.">
                        <a class="openModalStorePost text-sm text-sky-600 hover:text-sky-950 font-semibold cursor-pointer" type="button">
                            Comparte tu primera foto
                        </a>
                    </x-div-nothing-to-show>
                @else
                    <x-div-nothing-to-show src="{{ asset('img/publication.png') }}" alt="image saved" textH1="Aún no hay publicaciones" textP=""/>
                @endif
            @endif
            
        </x-tab-content>
        <x-tab-content tabName="tabs-saved" class="opacity-0">
            <x-div-nothing-to-show src="{{ asset('img/saved.png') }}" alt="image saved" textH1="Guardar" textP="Guarda fotos y videos que quieras volver a ver. Nadie recibirá una notificación y solo tú podrás ver lo que guardaste."/>
        </x-tab-content>
        <x-tab-content tabName="tabs-tagged" class="opacity-0">
            <x-div-nothing-to-show src="{{ asset('img/target.png') }}" alt="image saved" textH1="Fotos en las que apareces" textP="Cuando las personas te etiqueten en fotos, aparecerán aquí."/>
        </x-tab-content>
    </div>
    @if (Auth::check())
        <x-div-modal id="showPost" classButton="closeModalshowPost"/>

        <x-div-modal id="options-post" idBackdropModal="backdrop-modal">
            @include('post.content-modal-more-options')
        </x-div-modal>

        <x-div-modal id="editPost" classButton="closeModalEditPost">
            @include('post.content-modal-post-edit')
        </x-div-modal>
    @endif
</x-layout>
