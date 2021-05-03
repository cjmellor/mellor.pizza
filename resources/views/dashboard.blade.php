<x-layout title="Dashboard">
    Logged in as: {{ auth()->user()->name }}
    <hr>
    <p>
        <x-link to="{{ route('fos.index') }}">Admin</x-link>
    </p>

    <section>
        <div>
            <img alt="{{ auth()->user()->name }}" src="{{ auth()->user()->avatar_path }}">
        </div>
        <div>
            <h2>About me</h2>
            <p>{{ auth()->user()->about }}</p>
        </div>
        <div>
            <h2>Socials</h2>
            <div>
                <div>{{ auth()->user()->social_github }}</div>
                <div>{{ auth()->user()->social_instagram }}</div>
                <div>{{ auth()->user()->social_github }}</div>
            </div>
        </div>
    </section>

    <x-link to="/two-factor-auth">2FA</x-link>
    <x-form.form action="/logout" method="post">
        <input type="submit" value="Log out">
    </x-form.form>
</x-layout>
