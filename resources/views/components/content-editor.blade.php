{{--Template--}}
<div x-data="{ editMode: {{ json_encode($editMode) }}, type: '{{ $type }}' }">
    <template x-if="!editMode">
        <ul>
            {{--TODO: Define a class based on selected option--}}
            <li x-on:click="type = 'html'">HTML</li>
            <li x-on:click="type = 'markdown'">Markdown</li>
        </ul>
    </template>
    <div>
        {{--HTML Editor--}}
        <template x-if="type === 'html'">
            <x-trix name="post_content">{{ $slot }}</x-trix>
        </template>
        {{--Markdown Editor--}}
        <template x-if="type === 'markdown'">
            <x-markdown-editor name="post_content">{{ $slot }}</x-markdown-editor>
        </template>
    </div>
</div>
{{--End Template--}}

{{--Scripts--}}
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js" defer></script>
@endpush
{{--End Scripts--}}

{{--Styles--}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/nord.min.css" rel="stylesheet"/>
{{--End Styles--}}
