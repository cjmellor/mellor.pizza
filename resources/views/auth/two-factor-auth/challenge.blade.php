<x-layout.main
    container
    subTitle="Two-Factor Authentication"
>
    <x-auth.container class="mx-auto sm:max-w-2xl">
        <div class="font-medium text-lg tracking-wider mb-4 text-center">Enter 2FA Code</div>
        <x-form.form
            :action="route('two-factor.login')"
            method="post"
        >
            <div class="space-y-6">
                <label>
                    <x-form.input
                        for="code"
                        type="text"
                        autocomplete="one-time-code"
                        inputmode="numeric"
                        pattern="[0-9]*"
                    />
                </label>
                <input
                    class="button-pizza w-full"
                    type="submit"
                    value="Authenticate"
                >
            </div>
        </x-form.form>
    </x-auth.container>
</x-layout.main>
