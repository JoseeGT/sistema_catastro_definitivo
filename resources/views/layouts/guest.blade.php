<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CAMLI') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- component -->
<div class="bg-gray-200 flex {{-- justify-center items-center --}} h-screen">
    <!-- Left: Image -->
<div class="w-2/3 h-screen hidden lg:block">
  <img src="{{ asset('logo/planomun.png') }}" alt="Placeholder Image" class="object-cover w-full h-full brightness-75">
</div>
<!-- Right: Login Form -->
<div class="lg:p-10 md:p-52 sm:20 p-8 w-full lg:w-1/3">
    <div class="flex justify-center my-10">
        <x-application-logo class="block h-32 w-auto fill-black  text-gray-800" />

    </div>
<div>

</div>
    <h1 class="text-4xl font-semibold mb-4">CAMLI</h1>
    <h2 class="text 2xl font-semibold mb-4">Inicio de Sesión</h1>
    
    {{ $slot }}

  </div>
</div>
</div>
{{--         <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900">
            <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            



            <div class="w-full absolute h-screen sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}

            </div>
        </div> --}}
    </body>
</html>
