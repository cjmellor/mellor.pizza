<x-fos.layout title="Posts">
    <h1>Blog Posts</h1>

    @if(session('alert_status'))
        <x-alert type="success">{{ session()->get('alert_status') }}</x-alert>
    @endif

    @foreach($posts as $post)
        <ul>
            <li>
                <x-link to="{{ route('posts.show', $post) }}">{{ $post->title }}</x-link>
                <p><em>Status: {{ $post->published ? 'Published' : 'Draft' }}</em> - Published: {{ $post->published_at->diffForHumans() }}
                    by {{ $post->author->name }}</p>
                <p>{{ $post->excerpt }}</p>
            </li>
        </ul>
    @endforeach
</x-fos.layout>
