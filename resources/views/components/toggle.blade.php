<button {{ $attributes }}
        aria-checked="false"
        class="bg-gray-200 relative inline-flex shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none"
        :class="{ 'bg-gray-200': toggle = false, 'bg-pizza dark:bg-pizza-dark': toggle = true }"
        role="switch" type="button" x-data="toggle">
    <span class="sr-only">Use setting</span>
    <span aria-hidden="true"
          class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow ring-0 transition ease-in-out duration-200"
          :class="{ 'translate-x-0': toggle = false, 'translate-x-5': toggle = true }"
    ></span>
</button>

<script async defer>
    document.addEventListener('alpine:init', () => {
        Alpine.data('toggle', () => ({
            toggle: {{ $enabled }}
        }));
    });
</script>
