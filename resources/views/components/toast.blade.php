<div class="relative flex justify-center z-10" x-data="toast">
    <div {{ $attributes }}
         class="animate-slide-in-down absolute text-center w-1/2 bg-green-100 rounded-b-md py-4 text-green-800 shadow-xl"
         x-cloak
         x-on:send-toast.window="sendEventData"
         x-show="show"
         x-transition:leave="transition" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 -translate-y-24"
    >
        <span class="rotate-45 absolute top-0 right-0 text-3xl mr-6 mt-2 text-green-700/40 hover:text-green-800 cursor-pointer" x-on:click="close">+</span>
        <span x-text="message"></span>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('toast', () => ({
            show: false,
            message: '',

            close() {
                this.show = false;
            },

            sendEventData(event) {
                this.show = true;
                this.message = event.detail.messageContent;
            },
        }));
    });
</script>
