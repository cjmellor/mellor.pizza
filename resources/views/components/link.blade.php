@props([
'darkColor' => 'hsl(331,94%,52%)',
'lightColor' => 'hsl(29,100%,52%)',
'livewire' => false,
'to' => null,
'underline' => 'true',
'active' => false,
])

{{--Template--}}
<div class="inline-flex underline-animate-container">
    <a {{ $attributes->class([
    'underline-animate-link' => $underline,
    'border-pizza dark:border-pizza-dark text-gray-900 dark:text-gray-200' => $active,
    'border-transparent text-gray-500 hover:text-gray-700 dark:text-slate-400 hover:dark:text-slate-200' => !$active,
    ]) }}
       @unless($livewire) href="{{ $to }} @endunless">
        {{ $slot }}
    </a>
</div>

{{--Styles--}}
@push('stylesheets')
    @once
        <style>
            .underline-animate-container,
            .underline-animate-link {
                position: relative;
            }

            .underline-animate-container .underline-animate-link::before,
            .underline-animate-container .underline-animate-link::after {
                content: "";
                background-color: {{ $lightColor }};
                position: absolute;
                bottom: -10px;
                width: 0;
                height: 2px;
                margin: 8px 0;
                transition: all 0.75s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            }

            @media (prefers-color-scheme: dark) {
                .underline-animate-container .underline-animate-link::before,
                .underline-animate-container .underline-animate-link::after {
                    background-color: {{ $darkColor }};
                }
            }

            .underline-animate-link::before,
            .underline-animate-link::after {
                left: 0;
            }

            /*.underline-animate-link::before {
                left: 50%;
            }

            .underline-animate-link::after {
                right: 50%;
            }*/

            .underline-animate-container:hover .underline-animate-link::before,
            .underline-animate-container:hover .underline-animate-link::after {
                /*width: 50%;*/
                width: 100%;
                opacity: 1;
            }
        </style>
    @endonce
@endpush
