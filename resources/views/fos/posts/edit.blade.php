<x-fos.layout title="Editing Post: {{ $post->title }}">
    <header>
        <h1>Editing: <em>{{ $post->title }}</em></h1>
    </header>

    <x-fos.content>
        <x-form.form action="{{ route('fos.posts.update', $post) }}" enctype="multipart/form-data" method="patch">
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
                    <select id="category" name="category_id">
                        <option disabled selected value="0">--- Choose Category ---</option>
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

                <div>
                    <picture>
                        {{--TODO: If decided, add further size specific picture sources here--}}
                        {{--https://developer.mozilla.org/en-US/docs/Web/HTML/Element/picture--}}
                        <img alt="{{ $post->title }}" src="{{ asset('post_headers/'.$post->post_image) }}" loading="lazy" style="width: 16rem; height: 8rem">
                        <input type="hidden" name="post_header_delete" value="{{ $post->post_image }}">
                    </picture>
                    <label for="post_image">Change Post Header</label>
                    <input id="post_image" name="post_image" type="file">
                </div>

                <div>
                    <label for="tags">Tags</label>
                    <x-form.multiple-select id="tags" placeholder="Add some tags...">
                        @foreach($tags as $tag)
                            <option {{ $post->tags->firstWhere('id', $tag->id) ? 'selected' : '' }}
                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </x-form.multiple-select>
                </div>

                <x-content-editor edit-mode :type="$post->content_type">{{ $post->content }}</x-content-editor>
            </section>
            <input type="submit" value="Update">
        </x-form.form>
    </x-fos.content>
</x-fos.layout>
