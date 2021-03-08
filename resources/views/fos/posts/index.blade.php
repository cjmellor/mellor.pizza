<x-fos.layout title="Posts">
    <h1>Blog Posts</h1>
    @foreach($posts as $post)
        <ul>
            <li>
                <x-link to="{{ route('posts.show', $post) }}">{{ $post->title }}</x-link>
                <p><em>Status: {{ $post->published ? 'Published' : 'Draft' }}</em> - Published: {{ $post->published_at->diffForHumans() }} by {{ $post->author->name }}</p>
            </li>
        </ul>
    @endforeach
</x-fos.layout>
