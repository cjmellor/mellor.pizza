<x-fos.layout title="Editing Post: {{ $post->title }}">
    <x-fos.content>
        <x-auth.navigation></x-auth.navigation>
        <div class="space-y-6">
            <x-form.form action="{{ route('fos.posts.update', $post) }}" enctype="multipart/form-data" method="patch">
                <div class="space-y-10">
                    <x-auth.container>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1 space-y-4">
                                <h3 class="text-xl font-medium leading-6 text-gray-800 dark:text-gray-400">Post Information</h3>
                                {{--<p class="mt-1 text-sm text-gray-500">
                                    Something here maybe
                                </p>--}}
                            </div>

                            {{--Title--}}
                            <div class="space-y-8 mt-5 md:mt-0 md:col-span-2">
                                <div class="grid grid-cols-2 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <x-form.label for="title">
                                            <x-form.input for="title">{{ $post->title }}</x-form.input>
                                        </x-form.label>
                                    </div>
                                </div>

                                {{--Categories--}}
                                <div>
                                    <x-form.label for="category">
                                        <x-auth.select for="category" name="category_id">
                                            <option disabled selected value="0">--- Choose Category ---</option>
                                            @foreach($categories as $category)
                                                <option {{ $post->category->id === $category->id ? 'selected' : ''  }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </x-auth.select>
                                    </x-form.label>
                                </div>

                                {{--Excerpt--}}
                                <div>
                                    <x-form.label for="excerpt">
                                        <x-form.input for="excerpt" type="text" value="{{ old('excerpt', $post->excerpt) }}"/>
                                    </x-form.label>
                                </div>

                                {{--Blog Post Head Image--}}
                                <div>
                                    <x-form.label class="mb-2.5">
                                        Post Image
                                    </x-form.label>
                                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-[#424c55] border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg aria-hidden="true" class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                                 viewBox="0 0 48 48">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                            </svg>
                                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                                <label
                                                    class="relative cursor-pointer bg-white dark:bg-dark rounded-md font-medium text-pizza dark:text-pizza-dark focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pizza dark:focus-within:ring-pizza-dark"
                                                    for="file-upload">
                                                    <span>Upload a file</span>
                                                    <input class="sr-only" id="file-upload" name="file-upload" type="file">
                                                    <x-form.input type="hidden" for="post_header_delete" :value="$post->post_image"/>
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">
                                                PNG, JPG up to *MB
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </x-auth.container>

                    <x-auth.container>
                        {{--Content--}}
                        <div class="md:grid md:grid-cols-2 md:gap-6">
                            <div class="md:col-span-1">
                                <h3 class="text-xl font-medium leading-6 text-gray-800 dark:text-gray-400">Content</h3>
                            </div>
                            <div class="space-y-8 mt-5 md:mt-0 md:col-span-2">
                                <x-content-editor edit-mode :type="$post->content_type">{{ $post->content }}</x-content-editor>
                            </div>
                        </div>
                    </x-auth.container>

                    <x-auth.container>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1 md:w-2/3">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-400">Publish</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Mark the post as a draft, or publish it for public viewing.
                                </p>
                            </div>

                            <div class="space-y-8 mt-5 md:mt-0 md:col-span-2">
                                {{--Tags--}}
                                <div>
                                    <x-form.label class="mb-2.5" for="tags"></x-form.label>
                                    <x-form.multiple-select id="tags" placeholder="Add some tags...">
                                        @foreach($tags as $tag)
                                            <option {{ $post->tags->firstWhere('id', $tag->id) ? 'selected' : '' }}
                                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </x-form.multiple-select>
                                </div>

                                {{--State--}}
                                <div>
                                    <div>
                                        <x-form.label class="mb-2.5" for="is_published" text="State"></x-form.label>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <x-form.checkbox :checked="$post->is_published" name="is_published"/>
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <p class="text-gray-500 dark:text-gray-400">Choose if the post will be published, or a draft</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-auth.container>

                    {{--Buttons--}}
                    <div class="mx-auto w-11/12 sm:w-full flex justify-end space-x-3 sm:px-6 lg:px-8">
                        <x-form.button.cancel>Cancel</x-form.button.cancel>
                        <x-form.button.submit>Submit</x-form.button.submit>
                    </div>
                </div>
            </x-form.form>
        </div>
    </x-fos.content>
</x-fos.layout>
