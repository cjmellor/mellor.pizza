<button
    class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none"
    type="button"
    role="switch"
    aria-checked="false"
    {{ $attributes }}
    :class="{ 'bg-gray-200': !toggle, 'bg-pizza dark:bg-pizza-dark': toggle }"
    x-data="toggle"
>
    <span class="sr-only">Use setting</span>
    <span
        class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"
        aria-hidden="true"
        :class="{ 'translate-x-0': !toggle, 'translate-x-5': toggle }"
    ></span>
</button>

<script
    async
    defer
>
    document.addEventListener('alpine:init', () => {
        Alpine.data('toggle', () => ({
            toggle: {{ $enabled }}
        }));
    });
</script>
