{{--Template--}}
<div>
    <div x-data x-init="easyMDE">
        {{--This hidden field is used to identify that the post is written in Markdown--}}
        <input type="hidden" name="is_markdown" value="true">
        <label for="{{ $id }}"></label>
        <textarea {{ $attributes }} id="{{ $id }}" name="{{ $name ?? $id }}">{{ old($name ?? $id, $slot) }}</textarea>
    </div>
</div>
{{--End Template--}}

@push('stylesheets')
    {{--I know it's not a stylesheet, but placing this before </body> doesn't work--}}
    <script src="https://unpkg.com/easymde/dist/easymde.min.js" defer></script>
@endpush

@push('scripts')
    <script>
        const easyMDE = function easyMDE () {
            return new EasyMDE({
                element: document.getElementById('{{ $id }}'),
                imageUploadFunction: function (file, onSuccess, onError) {
                    const formData = new FormData()
                    formData.append('file', file)

                    axios.post('/trix/add-attachment', formData)
                        .then(request => {
                            let imageUrl = '{{ $endpointBaseUrl() }}' + '/storage/trix-attachments/' + request.data
                            return onSuccess(imageUrl)
                        })
                }
                {!! $optionsToJson() !!}
            })
        }
    </script>
@endpush
