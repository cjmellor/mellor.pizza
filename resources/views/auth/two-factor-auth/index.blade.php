@php
    $isTwoFaEnabled = auth()->user()->two_factor_enabled;
@endphp

<x-layout.main
    container
    subTitle="Two Factor Authentication"
>
    <x-auth.container class="mx-auto sm:max-w-2xl">
        <x-slot name="breadcrumbs">
            <x-breadcrumbs
                class="mb-6"
                :lists="[
                    'Home' => route('fos.fos.index'),
                ]"
            />
        </x-slot>
        @if (session('status') == 'two-factor-authentication-disabled')
            <x-alert type="error">You have disabled Two-Factor Authentication. It is advised that you re-enable this.</x-alert>
        @endif

        @if (session('status') == 'two-factor-authentication-enabled')
            <x-alert type="success">Two-Factor Authentication is now enabled!</x-alert>
        @endif

        <ul
            class="divide-y-2 divide-gray-100 dark:divide-gray-700"
            role="list"
        >
            <li class="py-4">
                <div class="flex justify-between items-center mx-4">
                    <p class="font-medium text-sm text-gray-900 dark:text-gray-300">
                        Enable Two-Factor Authentication
                    </p>
                    <div>
                        <x-form.form
                            action="/user/two-factor-authentication"
                            :method="$isTwoFaEnabled ? 'delete' : 'post'"
                        >
                            <x-toggle
                                type="submit"
                                :enabled="$isTwoFaEnabled"
                            />
                        </x-form.form>
                    </div>
                </div>
            </li>
            @if (session('status') == 'two-factor-authentication-enabled')
                <li class="py-4">
                    <div class="flex justify-between items-center mx-4">
                        <div class="flex flex-col w-1/2 space-y-2">
                            <p class="font-medium text-sm text-gray-900 dark:text-gray-300">
                                QR Code
                            </p>
                            <p class="text-sm text-gray-500">
                                Scan this code using your preferred method.
                            </p>
                        </div>
                        <div>
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>
                    </div>
                </li>
                <li class="py-4">
                    <div class="flex justify-between items-center mx-4">
                        <div class="flex flex-col w-1/2 space-y-2">
                            <p class="font-medium text-sm text-gray-900 dark:text-gray-300">
                                Security Code
                            </p>
                            <p class="text-sm text-gray-500">
                                Use this code if you cannot scan a QR code.
                            </p>
                        </div>
                        <div class="bg-white dark:bg-dark border border-gray-300 dark:border-dark-line rounded-md">
                            <ul class="text-sm text-gray-900 dark:text-gray-300 divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="p-2">{{ decrypt(auth()->user()->two_factor_secret) }}</li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="py-4">
                    <div class="flex justify-between items-center mx-4">
                        <div class="flex flex-col w-1/2 space-y-2">
                            <p class="font-medium text-sm text-gray-900 dark:text-gray-300">
                                Recovery codes
                            </p>
                            <p class="text-sm text-gray-500">
                                You will need these recovery codes to be able to get back in. Make sure to store them somewhere securely.
                            </p>
                        </div>
                        <div class="bg-white dark:bg-dark border border-gray-300 dark:border-dark-line rounded-md">
                            <ul class="text-sm text-gray-900 dark:text-gray-300 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach (auth()->user()->recoveryCodes() as $recoveryCode)
                                    <li class="p-2">{{ $recoveryCode }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    </x-auth.container>

    <form action="{{ route('login') }}">
        <div class="mx-auto my-8 w-11/12 sm:max-w-2xl flex justify-end">
            <x-form.button.submit>Submit</x-form.button.submit>
        </div>
    </form>
</x-layout.main>
