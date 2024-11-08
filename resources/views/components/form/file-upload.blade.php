<div
    class="flex justify-center items-center border-2 @if ($errors->has('post_image')) border-red-400 dark:border-[#fd6f6e] @else border-gray-300 dark:border-dark-line @endif border-dashed rounded-md h-48 overflow-y-hidden"
    :class="imageUrl && 'border-pizza dark:border-pizza-dark'"
    x-data="fileUpload"
>
    <template x-if="!imageUrl">
        <div class="space-y-1 text-center px-6 pt-5 pb-6 w-full">
            <svg
                class="mx-auto h-12 w-12 text-gray-400"
                aria-hidden="true"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 48 48"
            >
                <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                />
            </svg>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                <label
                    class="relative cursor-pointer bg-transparent rounded-md font-medium text-pizza dark:text-pizza-dark"
                    for="post_image"
                >
                    <p class="text-gray-500 dark:text-white space-y-1">
                        <span class="text-pizza dark:text-pizza-dark">Upload a file</span>
                        <span class="block text-xs text-gray-500">PNG, JPG, AVIF, WEBP up to 3 MB</span>
                    </p>
                    {{-- File input moved outside of template so to not be overwritten by the x-if --}}
                </label>
            </div>
        </div>

        @if ($post->post_image)
            <img
                src="{{ Storage::disk(config('filesystems.default'))->url($post->post_image) }}"
                alt=""
                x-bind:class="{ 'hidden': !imageUrl }"
            >
        @endif
    </template>

    <template x-if="imageUrl">
        <div class="object-contain group relative">
            <div
                class="hidden group-hover:flex absolute justify-center items-center m-auto text-white tracking-wider uppercase bg-transparent h-full w-full hover:bg-black/75 hover:cursor-pointer"
                x-on:click="removeImage"
            >
                Remove
            </div>
            <img
                alt=""
                :src="imageUrl"
                x-bind:class="{ 'hidden': !imageUrl }"
            >
        </div>
    </template>

    <input
        class="sr-only"
        id="post_image"
        name="post_image"
        type="file"
        x-on:change="selectFile"
    >

    <template x-if="imageUrl">
        <input
            id="post_header_delete"
            name="post_header_delete"
            type="hidden"
            value="delete"
            x-ref="post_header_delete"
        />
    </template>
</div>

@error('post_image')
    <p class="text-red-500 dark:text-red-400 text-sm mt-2.5">{{ $message }}</p>
@enderror

<script
    async
    defer
>
    document.addEventListener('alpine:init', () => {
        Alpine.data('fileUpload', () => ({
            imageUrl: '{{ $post->post_image ? Storage::disk(config('filesystems.default'))->url($post->post_image) : '' }}',

            removeImage() {
                this.imageUrl = ''
            },

            selectFile(event) {
                const file = event.target.files[0]
                const reader = new FileReader()

                if (event.target.files.length < 1) {
                    return
                }

                reader.readAsDataURL(file)

                reader.onload = () => (this.imageUrl = reader.result)
                this.$refs.post_header_delete.setAttribute('value', file.name)
            },
        }))
    })
</script>
