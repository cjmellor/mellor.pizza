{{--Template--}}
<div x-data="{ editMode: @js($editMode), type: '{{ $type }}' }">
    <template x-if="editMode === false">
        <ul class="flex space-x-4 mb-3">
            <li class="text-sm dark:text-dark-gray dark:hover:text-white cursor-pointer"
                x-bind:class="{ 'underline decoration-pizza dark:decoration-pizza-dark': type === 'html' }"
                x-on:click="type = 'html'">
                HTML
            </li>
            <li class="text-sm dark:text-dark-gray hover:text-white cursor-pointer"
                x-bind:class="{ 'underline decoration-pizza dark:decoration-pizza-dark': type === 'markdown' }"
                x-on:click="type = 'markdown'">
                Markdown
            </li>
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
