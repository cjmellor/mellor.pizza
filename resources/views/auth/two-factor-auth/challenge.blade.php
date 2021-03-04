<form action="/two-factor-challenge" method="post">
    @csrf
    <label><input type="text" name="code" id="code"></label>
    <input type="submit" value="Authenticate">
</form>
