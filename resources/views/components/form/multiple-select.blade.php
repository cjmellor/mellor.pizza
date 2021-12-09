{{--Template--}}
<select {{ $attributes }}
        autocomplete="off"
        id="{{ $id }}"
        multiple
        name="{{ $name ?? Str::singular($id) }}_id[]"
        x-data
        x-init="multiSelect($refs.select)"
        x-ref="select">
    {{ $slot }}
</select>
{{--End Template--}}

{{--Scripts--}}
@once
    <script defer src="https://cdn.jsdelivr.net/npm/tom-select@1.7/dist/js/tom-select.complete.min.js"></script>

    <script async defer>
        const multiSelect = (ref) => {
            const options = {
                create: true,
                plugins: ['no_backspace_delete', 'remove_button'],
            };

            new TomSelect(ref, options);
        };
    </script>
@endonce
{{--End Scripts--}}

{{--Styles--}}
@push('stylesheets')

@endpush
{{--End Styles--}}
