<x-layout.main container title="Two-Factor Authentication">
    <x-auth.container class="mx-auto sm:max-w-2xl">
        <div class="font-medium text-lg tracking-wider mb-4 text-center">Enter 2FA Code</div>
        <x-form.form :action="route('two-factor.login')" method="post">
            <div class="space-y-6">
                <label>
                    <x-form.input autocomplete="one-time-code" for="code" inputmode="numeric" pattern="[0-9]*" type="text"/>
                </label>
                <input class="button-pizza w-full" type="submit" value="Authenticate">
            </div>
        </x-form.form>
    </x-auth.container>
</x-layout.main>
