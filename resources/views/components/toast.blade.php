<div class="relative flex justify-center z-10" x-data="toast">
    <div {{ $attributes }}
         class="animate-slide-in-down absolute text-center w-1/2 bg-green-100 rounded-b-md py-4 text-green-800 shadow-xl"
         x-cloak
         x-on:send-toast.window="sendEventData"
         x-show="show"
         x-transition:leave="transition ease-out duration-1000" x-transition:leave-start="translate-y-full" x-transition:leave-end="-translate-y-24"
    >
        <x-progress-circle class="absolute right-0 mr-6 cursor-pointer" width="w-6" height="h-6" strokeWidth="3" trackColor="text-green-800/50"
                           animationSpeed="6s" lineColor="text-green-800" x-on:click="close"/>
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

                setTimeout(() => {
                    this.close();
                }, 5000);
            },
        }));
    });
</script>
