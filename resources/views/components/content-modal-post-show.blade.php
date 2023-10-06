<div id="body-modal" class="text-center h-full">
    <x-forms.form id="show-post" route="#" method="POST" enctype="multipart/form-data">
        <!-- the first file input -->
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="flex w-full h-full">
            <div id="dropzone-container" class="flex items-center justify-center w-full h-full min-[576px]:max-w-[400px] min-[992px]:max-w-[704px] min-[992px]:max-h-[704px]">
                <canvas id="canvas-show" style="display: none;"></canvas>
            </div>
            
            <div id="description" class="col-span-full w-full">
                <div class="p-3 container mx-auto border-b border-gray-100">
                    <div class="flex flex-row justify-left">
                        <div class="m-1 mr-2 w-8 h-8 relative flex justify-left items-center rounded-full bg-gray-500 text-xl text-white">
                            <img src="{{ asset($user->image) }}" class="rounded-full" alt="">
                        </div>
                        <p class="text-gray-800 text-xs flex items-center font-semibold"> {{ $user->username }}
                            @if ($user->email_verified_at)
                                <x-icons.verified/>
                            @endif
                        </p>
                    </div>
                </div>

                <div id="showDescription" class="p-3 container mx-auto hidden">
                    <div class="flex flex-row justify-left">
                        <div class="m-1 mr-2 w-8 h-8 relative flex justify-left items-center rounded-full bg-gray-500 text-xl text-white">
                            <img src="{{ asset($user->image) }}" class="rounded-full" alt="">
                        </div>
                        <div class="items-center justify-normal ">
                            <div class="flex flex-row justify-left w-full">
                                <p class="text-gray-800 text-xs flex items-center font-semibold"> {{ $user->username }} </p> 
                                <p id="descriptionPost" class="text-xs pl-2"></p>
                            </div>
                            <div class="flex flex-row justify-left">
                                <p id="createdAtDiv" class="text-xs text-gray-400"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden w-full flex-col items-center md:flex-row">
            <x-forms.input-button type="submit" value="Compartir"/>
        </div>
    </x-forms.form>
</div>
