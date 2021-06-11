<div x-data="{ showContactMePopUp: false }"
    x-cloak
    x-show="showContactMePopUp"
    x-on:click.away="showContactMePopUp = false"
    x-on:show-contact.window="showContactMePopUp = true"
    class="relative max-w-screen-2xl p-8 shadow-2xl sticky bottom-0 rounded-t-3xl h-[42rem] text-gray-500 bg-white dark:bg-[#22272e] border border-gray-300 dark:border-[#424c55] border-b-0"
    @slideUp()
>
    <div class="flex justify-center items-center contact-close" x-on:click="showContactMePopUp = false">
        <span class="text-gray-500 dark:text-white font-semibold text-2xl transform rotate-45">+</span>
    </div>

    <form action="#" method="post">
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-dark-gray dark:text-opacity-70" for="contact_name">What's your name?</label>
                <input class="form-pizza w-1/2 mt-1" id="contact_name" name="contact_name" type="text">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-dark-gray dark:text-opacity-70" for="contact_email">What's your email
                    address?</label>
                <input class="form-pizza w-1/2 mt-1" id="contact_email" name="contact_email" type="email">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-dark-gray dark:text-opacity-70" for="contact_message">What's up?</label>
                <textarea class="form-pizza w-1/2 mt-1" name="contact_message" id="contact_message" cols="30" rows="10"></textarea>
            </div>
            <div class="w-1/2 flex justify-end">
                <button class="inline-flex items-center space-x-3 button-pizza" type="submit">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                    </svg>
                    <span>Send message</span>
                </button>
            </div>
        </div>
    </form>
</div>
