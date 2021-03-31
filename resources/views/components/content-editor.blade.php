{{--Template--}}
<div x-data="{ type: '{{ $type }}' }">
    <div>
        <ul>
            {{--TODO: Define a class based on selected option--}}
            <li x-on:click="type = 'html'">HTML</li>
            <li x-on:click="type = 'markdown'">Markdown</li>
        </ul>
    </div>
    <div>
        {{--HTML Editor--}}
        <template x-if="type === 'html'">
            <x-trix name="post_content"></x-trix>
        </template>
        {{--Markdown Editor--}}
        <template x-if="type === 'markdown'">
            <x-markdown-editor name="post_content"></x-markdown-editor>
        </template>
    </div>
</div>
{{--End Template--}}

{{--Scripts--}}
@push('scripts')
    <x-use-alpine/>
@endpush
{{--End Scripts--}}

{{--Styles--}}

{{--End Styles--}}
