<div @slideUp()
     x-data="{
         showContactMePopUp: @entangle('showContactMePopUp').defer
     }"
     x-show="showContactMePopUp"
     x-on:click.away="showContactMePopUp = false"
     x-on:show-contact.window="showContactMePopUp = ! showContactMePopUp"
     class="relative max-w-full md:max-w-screen-md lg:max-w-screen-xl p-8 shadow-2xl sticky bottom-0 sm:rounded-t-3xl h-screen sm:h-[42rem] text-gray-500 bg-white dark:bg-[#22272e] border border-gray-300 dark:border-dark-line-lighter border-b-0"
     x-cloak
>
    {{--Same button for different screen sizes--}}
    <div class="sm:hidden flex absolute top-1 sm:top-4 right-1 sm:right-4" wire:click="closePopUp">
        <span class="text-pizza dark:text-white font-semibold text-3xl sm:text-5xl rotate-45">&plus;</span>
    </div>

    <div class="hidden sm:flex justify-center items-center contact-close hover:bg-pizza/90 dark:hover:bg-pizza-dark/75" wire:click="closePopUp">
        <span class="text-pizza dark:text-white font-semibold text-2xl rotate-45 hover:text-white">&plus;</span>
    </div>
    {{--End--}}

    <x-form.form wire:submit.prevent="send">
        <div class="space-y-5">
            <div>
                <label class="block text-lg sm:text-sm font-medium text-gray-700 dark:text-dark-gray/70" for="contact_name">
                    What's your name?
                </label>
                <x-form.input class="sm:w-1/2" for="contact_name" type="text" wire:model.lazy="contact_name"/>
            </div>
            <div>
                <label class="block text-lg sm:text-sm font-medium text-gray-700 dark:text-dark-gray/70" for="contact_email">
                    What's your email address?
                </label>
                <x-form.input class="sm:w-1/2" for="contact_email" type="email" wire:model.lazy="contact_email"/>
                <x-honey/>
            </div>
            <div>
                <label class="block text-lg sm:text-sm font-medium text-gray-700 dark:text-dark-gray/70" for="contact_message">
                    What's up?
                </label>
                <x-form.textarea cols="30" for="contact_message" rows="10" wire:model.lazy="contact_message"></x-form.textarea>
            </div>
            <div class="w-full sm:w-1/2 flex justify-end">
                <button class="inline-flex items-center space-x-3 button-pizza" type="submit">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" wire:loading.remove wire:target="send" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                    </svg>
                    <svg class="animate-spin h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" wire:loading wire:target="send"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span wire:loading.remove wire:target="send">Send message</span>
                    <span wire:loading wire:target="send">Sending message...</span>
                </button>
            </div>
        </div>
    </x-form.form>
</div>
