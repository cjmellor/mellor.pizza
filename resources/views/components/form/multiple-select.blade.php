{{--Template--}}
<select {{ $attributes }}
        id="{{ $id }}"
        multiple
        name="{{ $name ?? \Str::singular($id) }}_id[]"
        x-data
        x-init="multiSelect($refs.select)"
        x-ref="select">
    {{ $slot }}
</select>
{{--End Template--}}

{{--Scripts--}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@1.1/dist/js/tom-select.complete.min.js"></script>

    <script>
        const multiSelect = ref => {
            const options = {
                create: true,
                plugins: [
                    'no_backspace_delete',
                    'remove_button',
                ]
            }

            new TomSelect(ref, options)
        }
    </script>
@endpush
{{--End Scripts--}}

{{--Styles--}}
@push('stylesheets')

@endpush
{{--End Styles--}}
