@props(['to'])

<form action="{{ $to }}" {{ $attributes }} method="post">
    @csrf
    @method('DELETE')

    <input type="submit" value="{{ $slot }}">
</form>
