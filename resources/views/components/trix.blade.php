<div>
    <div>
        <input id="{{ $id ?? $name }}"
               name="{{ $name }}"
               type="hidden"
               value="{{ old($name, $slot) }}"
        >
        <trix-editor
            class="prose dark:prose-invert prose-md max-w-none"
            input="{{ $name ?? $id }}"
        />
    </div>

    @error($name)
    <p class="text-red-500 dark:text-red-400 text-sm mt-2.5">{{ $message }}</p>
    @enderror
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" defer></script>
@endpush
