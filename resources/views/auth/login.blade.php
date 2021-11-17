<x-layout.main container title="Login">
    <x-auth.container class="mx-auto sm:max-w-2xl">
        <x-slot name="breadcrumbs">
            <x-breadcrumbs class="mb-6" :lists="[
                'Home' => route('homepage'),
            ]"/>
        </x-slot>
        <x-form.form action="{{ route('login') }}" class="space-y-6" method="post">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="email">
                    Email address
                </label>
                <div class="mt-1">
                    <x-form.input autocomplete="email" for="email" required type="email"></x-form.input>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="password">
                    Password
                </label>
                <div class="mt-1">
                    <x-form.input autocomplete="current-password" for="password" required type="password"></x-form.input>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input class="h-4 w-4 text-pizza dark:text-pizza-dark focus:ring-pizza dark:focus:ring-pizza-dark border-gray-300 rounded" id="remember" name="remember"
                           type="checkbox">
                    <label class="ml-2 block text-sm text-gray-900 dark:text-gray-400" for="remember">
                        Remember me
                    </label>
                </div>

                <div class="text-sm">
                    <x-link class="font-medium text-pizza dark:text-pizza-dark" to="#">
                        Forgot your password?
                    </x-link>
                </div>
            </div>

            <div>
                <button
                    class="w-full button-pizza"
                    type="submit">
                    Sign in
                </button>
            </div>
        </x-form.form>
    </x-auth.container>
</x-layout.main>
