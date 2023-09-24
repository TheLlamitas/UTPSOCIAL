@if (session($status))
    <p class="{{ $class }} text-white my-2 rounded-lg p-2 text-center">{{ session($status) }}</p>
@endif
