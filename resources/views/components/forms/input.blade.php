<div class="mb-5">
    <label for="{{ $name }}" class="mb-2 block uppercase text-gray-500 font-bold">
        {{ $title }}
    </label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        class="border p-3 w-full rounded-lg @error($name) border-red-500 @enderror"
        value="@isset($value){{ $value }}@endisset"
    >
    @error($name)
        <p class=" bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{ $message }}</p>
    @enderror
</div>
