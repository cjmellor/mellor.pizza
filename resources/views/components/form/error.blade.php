@if ($errors->any())
    <div>
        <div>
            {{-- Icon here --}}
        </div>
        <div>
            <h2>{{ $title ?? $errorCountTitle($errors) }}</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
