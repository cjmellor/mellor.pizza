<x-fos.layout>
    <header>
        <h1>Create a New Post</h1>
    </header>
    <x-fos.content>
        <x-form.form action="{{ route('posts.store') }}" method="post">
            <section>
                <div>
                    <label for="is_published">Publish</label>
                    <input id="is_published" name="is_published" type="checkbox" value="{{ old('is_published') }}">
                </div>

                <div>
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" value="{{ old('title') }}">
                </div>

                <div>
                    <label for="category">Category</label>
                    <select id="category" name="category_id">
                        <option disabled selected value="0">--- Choose Category ---</option>
                        @foreach($categories as $category)
                            <option value="{{ old('category_id', $category->id) }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="excerpt">Excerpt</label>
                    <input id="excerpt" name="excerpt" type="text" value="{{ old('excerpt') }}">
                </div>

                {{--TODO: Add fields for post image (post_image)--}}

                <div>
                    <label for="tags">Tags</label>
                    <x-form.multiple-select id="tags" placeholder="Add some tags...">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </x-form.multiple-select>
                </div>

                <x-content-editor type="html"></x-content-editor>

            </section>
            <input type="submit" value="Create Post">
        </x-form.form>
    </x-fos.content>
</x-fos.layout>
