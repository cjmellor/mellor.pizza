<x-layout title="Login">
    @if($errors->any())
        <h3>Error!</h3>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <x-form.form action="{{ route('login') }}" method="post">
        <label><input type="text" name="email" id="email"></label>
        <label><input type="password" name="password" id="password"></label>
        <label><input type="checkbox" name="remember" id="remember"> Remember me</label>
        <button type="submit">Log in</button>
    </x-form.form>
</x-layout>
