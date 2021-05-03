<x-layout title="2FA">
    <x-form.form action="/two-factor-challenge" method="post">
        <label><input type="text" name="code" id="code"></label>
        <input type="submit" value="Authenticate">
    </x-form.form>
</x-layout>
