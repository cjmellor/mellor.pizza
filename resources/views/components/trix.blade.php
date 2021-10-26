<div>
    <div {{ $attributes }}>
        <input id="{{ $id ?? $name }}"
               name="{{ $name }}"
               type="hidden"
               value="{{ old($name, $slot) }}"
        >
        <trix-editor
            class="prose dark:prose-dark prose-xl max-w-none"
            input="{{ $name ?? $id }}"
        />
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" defer></script>
@endpush
