Logged in as: {{ auth()->user()->name }}
<hr>
<a href="/two-factor-auth">2FA</a>
<form action="/logout" method="post">
    @csrf
    <input type="submit" value="Log out">
</form>
