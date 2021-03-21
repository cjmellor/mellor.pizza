@props(['content'])

{{--<label for="body">Content</label>--}}
<div {{ $attributes }}>
    <input id="{{ $id ?? $name }}"
           name="{{ $name }}"
           type="hidden"
           value="{{ old($name, $content) }}"
    >
    <trix-editor
        class="trix-content"
        input="{{ $name ?? $id }}"
    />
</div>

@push('third-party-css')
    {{--Move to dedicated CSS file later--}}
    <style>
        .trix-content.x-code pre {
            background-color: hsl(220, 16%, 22%) !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/nord.min.css"/>
@endpush

@push('third-party-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('div.trix-content pre').forEach((block) => {
                hljs.highlightBlock(block)
            })
        })
    </script>
@endpush
