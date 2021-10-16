<div {{ $attributes->class([
    'rounded-md',
    'p-4',
    'border-l-4',
    'bg-red-50 text-red-700 border-red-400' => $type == 'error',
    'bg-blue-50 text-blue-700 border-blue-400' => $type == 'info',
    'bg-yellow-50 text-yellow-700 border-yellow-400' => $type == 'warning',
    'bg-green-50 text-green-700 border-green-400' => $type == 'success',
]) }}>
    <div class="flex">
        <div class="flex-shrink-0">

            {{--error--}}
            @if($type == 'error')
                <svg aria-hidden="true" class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                          fill-rule="evenodd"/>
                </svg>
            @endif
            {{--success--}}
            @if($type == 'success')
                <svg aria-hidden="true" class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          fill-rule="evenodd"/>
                </svg>
            @endif
            {{--info--}}
            @if($type == 'info')
                <svg aria-hidden="true" class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          fill-rule="evenodd"/>
                </svg>
            @endif
            {{--warning--}}
            @if($type == 'warning')
                <svg aria-hidden="true" class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                          d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                          fill-rule="evenodd"/>
                </svg>
            @endif

        </div>

        <div class="ml-3">
            @if($title)
                <h3 class="mb-2 text-sm font-medium text-{{ $type }}-800">
                    {{ $title }}
                </h3>
            @endif
            <div class="text-sm text-{{ $type }}-700">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
