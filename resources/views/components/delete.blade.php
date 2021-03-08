@props(['to'])

<form action="{{ $to }}" method="post">
    @csrf
    @method('DELETE')

    <input type="submit" value="{{ $slot }}">
</form>
