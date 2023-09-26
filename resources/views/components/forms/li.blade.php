<li class="mr-2" role="presentation">
    <a
        href="#{{ $tagName }}"
        class="flex gap-2 items-center my-0 border-x-0 border-b-0 border-t-2 border-transparent px-7 sm:pb-3.5 sm:pt-4 pb-2 pt-2 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:sm:border-gray-800 data-[te-nav-active]:sm:text-gray-800 data-[te-nav-active]:border-sky-600 data-[te-nav-active]:text-sky-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
        data-te-toggle="pill"
        data-te-target="#{{ $tagName }}"
        @isset($dataActive){{ $dataActive }}@endisset
        role="tab"
        aria-controls="{{ $tagName }}"
        aria-selected="@isset($seleted) {{ $seleted }}@endisset"
        >
        {{ $slot }}
        <p class="hidden sm:block">{{ $text }}</p>
    </a>
</li>





