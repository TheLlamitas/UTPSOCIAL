<div id="body-modal" class="text-center h-full">
    <x-forms.form id="show-post" route="#" method="POST" enctype="multipart/form-data">
        <!-- the first file input -->
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="flex w-full h-full">
            <div id="dropzone-container" class="flex items-center justify-center w-full h-full min-[576px]:max-w-[400px] min-[992px]:max-w-[704px] min-[992px]:max-h-[704px]">
                <canvas id="canvas-show" style="display: none;"></canvas>
            </div>
            
            <div id="description" class="col-span-full w-full">
                <div class="p-3 container mx-auto border-b border-gray-100 flex justify-between">
                    <div class="flex flex-row justify-left">
                        <div class="m-1 mr-3 w-8 h-8 relative flex justify-left items-center rounded-full bg-gray-500 text-xl text-white">
                            <img src="{{ asset($user->image) }}" class="rounded-full" alt="">
                        </div>
                        <p class="text-gray-800 text-xs flex items-center font-semibold"> {{ $user->username }}
                            @if ($user->email_verified_at)
                                <x-icons.verified/>
                            @endif
                        </p>
                    </div>
                    <div class="flex flex-row items-center">
                            <x-icons.more-options id="more-options"/>
                    </div>
                </div>

                <div id="showDescription" class="p-3 container mx-auto hidden">
                    <div class="flex flex-row justify-left">
                        <div class=" w-1/12 m-1 mr-3 text-left items-center rounded-full text-xl text-white">
                            <img src="{{ asset($user->image) }}" class="inline-block h-8 w-8 rounded-full ring-2 ring-white" alt="">
                        </div>
                        <div class="w-10/12 items-left justify-normal ">
                            <div class="flex justify-left w-full">
                                <p class="text-xs text-left">
                                    <span class="text-gray-800 font-semibold">{{ $user->username }}</span>
                                    <span class="text-gray-700" id="descriptionPost"></span>
                                </p>
                            </div>
                            <div class="text-left">
                                <p id="createdAtDiv" class="text-xs text-gray-400"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-forms.form>
</div>
