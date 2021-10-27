<x-fos.layout class="!pt-0">
    <x-fos.content>
        <x-auth.navigation/>
        <div class="mt-12">
            <div class="hidden sm:flex">
                <div class="w-1/2"></div>
                <div class="w-1/2">
                    <h2 class="dark:text-cool-gray-400 font-merriweather text-center text-2xl mb-10">
                        All Blog Posts
                    </h2>
                </div>
            </div>
            <div class="flex flex-col flex-col-reverse divide-y divide-y-reverse sm:flex-row sm:divide-x sm:divide-y-0 dark:divide-cool-gray-700">
                <div class="sm:w-1/2 px-4 sm:px-12">derp</div>
                <div class="sm:w-1/2 px-4 sm:px-12">
                    <h2 class="block sm:hidden dark:text-cool-gray-300 font-merriweather font-bold text-center text-2xl mb-6">
                        All Blog Posts
                    </h2>
                    <livewire:fos.blog-posts-list/>
                </div>
            </div>
        </div>
    </x-fos.content>
</x-fos.layout>
