<div @slideUp()
     x-data="{
         showContactMePopUp: @entangle('showContactMePopUp').defer,
         sent: @entangle('sent')
     }"
     x-show="showContactMePopUp"
     x-on:click.away="showContactMePopUp = false"
     x-on:show-contact.window="showContactMePopUp = ! showContactMePopUp"
     class="relative max-w-full md:max-w-screen-md lg:max-w-screen-xl p-8 shadow-2xl sticky bottom-0 sm:rounded-t-3xl h-screen sm:h-[42rem] text-gray-500 bg-white dark:bg-[#22272e] border border-gray-300 dark:border-[#424c55] border-b-0"
     x-cloak
>
    <div class="sm:hidden flex absolute top-1 sm:top-4 right-1 sm:right-4" x-on:click="showContactMePopUp = false">
        <span class="text-gray-500 dark:text-white font-semibold text-3xl sm:text-5xl rotate-45">+</span>
    </div>

    <div class="hidden sm:flex justify-center items-center contact-close" x-on:click="showContactMePopUp = false">
        <span class="text-gray-500 dark:text-white font-semibold text-2xl rotate-45">+</span>
    </div>

    {{--TODO: Add some form of honeypot for spam protection--}}
    <x-form.form action="#" method="post" wire:submit.prevent="send" wire:loading.remove>
        <div class="space-y-5">
            <div>
                <label class="block text-lg sm:text-sm font-medium text-gray-700 dark:text-dark-gray/70" for="contact_name">
                    What's your name?
                </label>
                <x-form.input for="contact_name" type="text" wire:model.lazy="contact_name"/>
            </div>
            <div>
                <label class="block text-lg sm:text-sm font-medium text-gray-700 dark:text-dark-gray/70" for="contact_email">
                    What's your email address?
                </label>
                <x-form.input for="contact_email" type="email" wire:model.lazy="contact_email"/>
            </div>
            <div>
                <label class="block text-lg sm:text-sm font-medium text-gray-700 dark:text-dark-gray/70" for="contact_message">
                    What's up?
                </label>
                <x-form.textarea cols="30" for="contact_message" rows="10" wire:model.lazy="contact_message"></x-form.textarea>
            </div>
            <div class="w-full sm:w-1/2 flex justify-end">
                <button class="inline-flex items-center space-x-3 button-pizza" type="submit">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                    </svg>
                    <span>Send message</span>
                </button>
            </div>
        </div>
    </x-form.form>
    <div class="space-y-6 w-full text-green-500 font-merriweather text-2xl" wire:loading>
        <p class="text-center">Sending the message now...</p>
        <p class="text-center">Thanks for your query! I will be in touch.</p>
    </div>
</div>
