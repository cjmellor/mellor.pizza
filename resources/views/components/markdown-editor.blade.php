<div x-data x-init="
    new EasyMDE({
        element: $refs.editor,
        imageUploadFunction: function (file, onSuccess, onError) {
            const formData = new FormData();
            formData.append('file', file);

            axios.post('/trix/add-attachment', formData)
                .then(request => {
                    let imageUrl = '{{ $endpointBaseUrl() }}' + '/storage/trix-attachments/' + request.data
                    return onSuccess(imageUrl)
                });
        }
        {{ $optionsToJson() }}
    })
">
    <label for="{{ $id }}"></label>
    <textarea {{ $attributes }} id="{{ $id }}" name="{{ $name ?? $id }}" x-ref="editor">
        {{ old($name ?? $id, $slot) }}
    </textarea>
</div>

@push('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/nord.min.css" rel="stylesheet"/>
    <link href="https://unpkg.com/easymde/dist/easymde.min.css" rel="stylesheet">
    {{--I know it's not a stylesheet, but placing this before </body> doesn't work--}}
    <script src="https://unpkg.com/easymde/dist/easymde.min.js" defer></script>
@endpush

@push('scripts')
    <x-use-alpine/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js" defer></script>
@endpush
