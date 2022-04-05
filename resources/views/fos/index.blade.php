<x-fos.layout class="!pt-0">
    <x-fos.content>
        <x-auth.navigation />

        @if(session('alert_status'))
            <x-alert type="success">{{ session()->get('alert_status') }}</x-alert>
        @endif

        <div class="mt-12">
            <div class="hidden sm:flex">
                <div class="w-1/2">
                    <h2 class="dark:text-gray-400 font-merriweather text-center text-2xl mb-10">
                        User Settings
                    </h2>
                </div>
                <div class="w-1/2">
                    <h2 class="dark:text-gray-400 font-merriweather text-center text-2xl mb-10">
                        All Blog Posts
                    </h2>
                </div>
            </div>
            <div class="flex flex-col flex-col-reverse divide-y divide-y-reverse sm:flex-row sm:divide-x sm:divide-y-0 dark:divide-gray-700">
                <div class="sm:w-1/2 px-4 sm:px-12">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-4">
                            <h3 class="text-xl mb-4 font-merriweather font-semibold text-gray-800 dark:text-gray-400">Two-Factor Auth</h3>
                            <div class="flex">
                                <div class="w-1/2">
                                    <p class="text-md ml-4 font-bold text-gray-900 dark:text-gray-400">{{ request()->user()->two_factor_enabled ? 'Disable' : 'Enable' }}
                                        2FA</p>
                                </div>
                                <div class="w-1/2 flex justify-end">
                                    <x-link :to="route('two-factor-auth')" :underline="false">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path clip-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                                  fill-rule="evenodd"></path>
                                        </svg>
                                    </x-link>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sm:w-1/2 px-4 sm:px-12">
                    <h2 class="block sm:hidden dark:text-gray-300 font-merriweather font-bold text-center text-2xl mb-6">
                        All Blog Posts
                    </h2>
                    <livewire:fos.blog-posts-list />
                </div>
            </div>
        </div>
    </x-fos.content>
</x-fos.layout>
