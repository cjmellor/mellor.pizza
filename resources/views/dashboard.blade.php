Logged in as: {{ auth()->user()->name }}
<hr>
<x-link to="/two-factor-auth">2FA</x-link>
<x-form action="/logout">
    <input type="submit" value="Log out">
</x-form>
