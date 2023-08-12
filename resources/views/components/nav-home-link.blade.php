@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'block py-2 pl-3 pr-4 text-white bg-blue-700 font- rounded md:bg-transparent font-medium md:text-blue-700 md:p-0 md:dark:text-blue-500 transition duration-150 ease-in-out'
                : 'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 font-medium md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
