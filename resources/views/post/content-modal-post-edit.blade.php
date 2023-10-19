<x-header-modal title="Editar información" textNext="Listo" textCancel="Cancelar"/>
<div id="body-modal" class="text-center h-full">
    <x-forms.form id="edit-post" route="{{ route('editPost') }}" method="POST" enctype="multipart/form-data">
        <!-- the first file input -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div id="dropzone-container" class="flex items-center justify-center w-full h-full min-[576px]:max-w-[576px] min-[992px]:max-w-[704px] min-[992px]:max-h-[704px]">
            <div id="spinner" class="hidden items-center justify-center h-screen">
                <div class="border-t-4 border-blue-500 border-solid rounded-full w-12 h-12 animate-spin"></div>
            </div>
            <canvas id="canvas-edit" style="display: none;"></canvas>
        </div>
        
        <div class="hidden w-full flex-col items-center md:flex-row">
            <x-forms.input-button type="submit" value="Compartir"/>
        </div>
    </x-forms.form>
</div>
