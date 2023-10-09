<div class="flex w-1/3 flex-wrap p-0.5">
    <div id="openModalshowPost-{{ $post->id }}" class="w-full openModalshowPost">
            <img
                alt="{{ $alt }}"
                data-id="{{ $post->id }}" data-url="{{ asset('uploads').'/'.$post->photo }}" data-description="{{ $post->description }}" data-created-at="{{ $post->created_at }}" data-userId="{{ $userId }}"
                class="block h-full w-full object-cover object-center cursor-pointer"
                src="{{ asset('uploads').'/'.$post->photo }}" />
    </div>
</div>
