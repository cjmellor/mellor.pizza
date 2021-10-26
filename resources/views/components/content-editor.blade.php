{{--Template--}}
<div x-data="{ editMode: @js($editMode), type: '{{ $type }}' }">
    <template x-if="editMode === false">
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
