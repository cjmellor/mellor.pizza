Logged in as: {{ auth()->user()->name }}
<hr>
<p>
    <x-link to="{{ route('fos.index') }}">Admin</x-link>
</p>
<x-link to="/two-factor-auth">2FA</x-link>
<x-form action="/logout">
    <input type="submit" value="Log out">
</x-form>