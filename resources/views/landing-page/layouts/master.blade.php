<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content=""/>
    <meta name="keywords" content="bootstrap, bootstrap4"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }
    </style>

    <link rel="stylesheet" href="{{asset('./landing-page/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('./landing-page/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('./landing-page/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('./landing-page/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('./landing-page/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('./landing-page/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('./landing-page/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('./landing-page/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('./landing-page/css/style.css')}}">

    <title>Trip My Trip</title>
</head>

<body>


<x-nav-bar/>

<main>
    {{$slot}}
</main>

<x-footer/>

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

@include('landing-page.partials.scripts')

</body>

</html>

{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Trip My Trip</title>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="preconnect" href="https://fonts.bunny.net">--}}
{{--    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>--}}

{{--    <script>--}}
{{--        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
{{--            document.documentElement.classList.add('dark');--}}
{{--        } else {--}}
{{--            document.documentElement.classList.remove('dark')--}}
{{--        }--}}
{{--    </script>--}}

{{--    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>--}}

{{--    <!-- font flat-ui cdn 2.2.2 -->--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.2.2/css/flat-ui.min.css"--}}
{{--          integrity="sha512-PvB3Q4vTvWD/9aiiELYI3uebup/4mtou3Mc/uGudC/Zl+C9BdKUkAI+5jORfA+fvLK4DpzC5VyEN7P2kK43hjg=="--}}
{{--          crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--    <!-- Scripts -->--}}
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

{{--    <!-- Styles -->--}}
{{--    @livewireStyles--}}
{{--</head>--}}
{{--<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">--}}

{{--<x-nav-bar/>--}}

{{--<!-- Page Content -->--}}
{{--<main>--}}
{{--    {{$slot}}--}}
{{--</main>--}}

{{--<button type="button" id="backToTopBtn" onclick="goToTop()" class="hidden transition-all duration-500 fixed bottom-5 right-5 text-white bg-slate-700 hover:bg-slate-800 dark:bg-slate-700 dark:hover:bg-slate-800 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2">--}}
{{--    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">--}}
{{--        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>--}}
{{--    </svg>--}}
{{--    <span class="sr-only">Back to Top Button</span>--}}
{{--</button>--}}
{{--<x-footer/>--}}

{{--@livewireScripts--}}

{{--<script src="{{asset('js/script.js')}}"></script>--}}
{{--</body>--}}
{{--</html>--}}
