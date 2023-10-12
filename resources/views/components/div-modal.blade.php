<div id="{{ $id }}" class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex justify-end">
        @isset($classButton)
            <x-forms.button-close-modal class="{{ $classButton }}"/>
        @endisset
    </div>
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="@isset($idBackdropModal){{ $idBackdropModal }}@endisset" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div id="modal-all" class="min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[400px] min-[992px]:max-w-[704px] min-[992px]:max-h-[746px] inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:h-full">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
