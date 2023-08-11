<div class="w-48 h-48 lg:w-56 lg:h-56 relative flex -z-[10]">
    <div class="rounded-full z-10 absolute w-full h-full flex justify-center items-center bg-white dark:bg-dark"></div>
    <div class="rounded-full absolute w-full h-full bg-pizza dark:bg-pizza-dark blur-xl"></div>
    <div class="rounded-full absolute w-full h-full bg-pizza dark:bg-pizza-dark opacity-60 blur-2xl animate-pulse"></div>
    <div class="rounded-full absolute -inset-0.5 bg-pizza dark:bg-pizza-dark"></div>
    <div class="rounded-full z-10 absolute">
        <picture>
            <source
                srcset="{{ asset('storage/faces/avatar-face.avif') }}"
                type="image/avif"
            >
            <source
                srcset="{{ asset('storage/faces/avatar-face.webp') }}"
                type="image/webp"
            >
            <img
                class="w-48 h-48 lg:w-56 lg:h-56 rounded-full grayscale dark:sepia"
                src="{{ asset('storage/faces/avatar-face.png') }}"
                alt="It's me!"
                height="192"
                width="192"
            >
        </picture>
    </div>
</div>
