<x-fos.layout title="Editing Post: {{ $post->title }}">
    <header>
        <h1>Editing: <em>{{ $post->title }}</em></h1>
    </header>

    <x-fos.content>
        <x-form action="{{ route('posts.update', $post) }}" method="patch">
            <section>
                <div>
                    <label for="is_published">Is Post Published?</label>
                    <input id="is_published" name="is_published" type="checkbox" {{ $post->is_published ? 'checked' : '' }}>
                </div>

                <div>
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}">
                </div>

                <div>
                    <label for="category">Category</label>
                    <select id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option {{ $post->category->id === $category->id ? 'selected' : ''  }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
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

                <div>
                    <label for="tag_id">Tags</label>
                    <select id="tag_id" multiple name="tag_id[]">
                        @foreach($tags as $tag)
                            <option {{ $post->tags()->firstWhere('id', $tag->id) ? 'selected' : '' }}
                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <x-trix :content="$post->body" name="body"/>
            </section>
            <input type="submit" value="Update">
        </x-form>
    </x-fos.content>
</x-fos.layout>
