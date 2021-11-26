{{--Template--}}
<div>
    <div x-data x-init="easyMDE">
        <label for="{{ $id }}"></label>
        <textarea {{ $attributes }} id="{{ $id }}" name="{{ $name ?? $id }}">{{ old($name ?? $id, $slot) }}</textarea>
    </div>
</div>
{{--End Template--}}

@push('stylesheets')
    {{--I know it's not a stylesheet, but placing this before </body> doesn't work--}}
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
@endpush

@push('scripts')
    <script>
        const easyMDE = new EasyMDE({
            element: document.getElementById('{{ $id }}'),
            imageUploadFunction: (file, onSuccess, onError) => {
                const formData = new FormData();
                formData.append('file', file);

                axios.post('/attachments/add-attachment', formData).then((request) => {
                    const imageUrl = `${'{{ $endpointBaseUrl() }}/storage/attachments/'}${request.data}`;
                    return onSuccess(imageUrl);
                }).catch((error) => {
                    return onError(error);
                });
            }
            {!! $optionsToJson() !!}
        });
    </script>
@endpush
