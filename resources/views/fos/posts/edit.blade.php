<x-fos.layout title="Editing Post: {{ $post->title }}">
    <header>
        <h1>Editing: <em>{{ $post->title }}</em></h1>
    </header>

    <x-fos.content>
        <form action="{{ route('posts.update') }}"> @csrf
            <section>
                <div>
                    <label for="is_published">Is Post Published?</label>
                    <input id="is_published" name="is_published" type="checkbox" {{ $post->is_published ? 'checked' : '' }}>
                </div>

                <div>
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}">
                    {{--On update, the `slug` property should be updated to match new title--}}
                </div>

                <div>
                    <label for="excerpt">Excerpt</label>
                    <input id="excerpt" name="excerpt" type="text" value="{{ old('excerpt', $post->excerpt) }}">
                </div>

                {{--<div>--}}
                {{--<label for="post_image">Change Post Image</label>--}}
                {{--<input id="post_image" name="post_image" type="file">--}}
                {{--<img alt="{{ $post->post_image_caption ?? 'none' }}" src="#">--}}
                {{--</div>--}}

                <x-trix :content="$post->body" name="body"/>

                {{--Based on the content used, update `is_markdown` appropriatly--}}
            </section>
            <input type="submit" value="Update">
        </form>
    </x-fos.content>
</x-fos.layout>
