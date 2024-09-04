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


        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <wireui:scripts />

    </head>
    <body class="font-sans antialiased">

        <div class="flex h-screen bg-gray-200">

            <!-- sidebar -->
            <div class="hidden md:flex flex-col w-76 bg-gray-800" >
                <div class="flex items-center justify-center h-28 bg-gray-900">
                    <span class="text-white font-bold uppercase"><div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" wire:navigate>
                            <x-application-logo class="block h-20 w-auto fill-white text-gray-800" />
                        </a>
                    </div></span>
                </div>
                <div class="flex flex-col flex-1 justify-between overflow-y-auto hidden-scrollbar">
                    <nav class="flex-1 px-2 py-4 bg-gray-800 space-between">
                        <div >
                            <a href="{{ route('dashboard') }}" {{-- :active="request()->routeIs('dashboard')" --}} wire:navigate class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                Inicio
                            </a>
    
                            <div x-data="{ expanded: false }" class="flex items-center justify-between px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                <div class="flex-col grow ">
                                    <button @click="expanded = ! expanded" class="w-full flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Registro
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    @can('ver propietarios')
                                    
                                    <a x-show="expanded" href="{{ route('propietarios') }}" wire:navigate class="flex items-center justify-between px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                        Propietarios
                                        <span class="justify-end"></span>
                                    </a>
                                    @endcan
                                    @can('ver inmuebles')
                                    <a x-show="expanded" href="{{ route('inmuebles') }}" wire:navigate class="flex items-center justify-between px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                        Inmuebles
                                        <span class="justify-end"></span>
                                    @endcan
                                        @can('ver sectores-calles')
                                        <a x-show="expanded" href="{{ route('sectores-calles') }}" wire:navigate class="flex items-center justify-between px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                            Sectores y Calles
                                        <span class="justify-end"></span>
                                        @endcan
                                   @can('ver usuarios')
                                   <a x-show="expanded" href="{{ route('usuarios') }}" wire:navigate class="flex items-center justify-between px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                    Usuarios
                                <span class="justify-end"></span>
                                   @endcan
    
                                    </a>
                                </div>
                            </div>
                            
                            
                            @can('ver calculos')
                            <a href="{{ route('calculo') }}" wire:navigate class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" stroke-width="1" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                                </svg>
                                Cálculo
                            </a>
                            
                            @endcan
    
                            @can('ver inspecciones')
                            <a href="{{ route('inspecciones') }}" wire:navigate class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                </svg>
                                Inspecciones
                            </a>
                            @endcan
                            @can('ver ficha-catastral')
                            <a href="{{ route('ficha-catastral') }}" wire:navigate class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                Expedición de Ficha Catastral
                            </a>
                            @endcan
                            @can('ver division-unificacion')                         
                            <a href="{{ route('division-unificacion') }}" wire:navigate class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                División y Unificación
                            </a>
                            @endcan
                            @can('ver tareas')
                                
                            <a href="{{ route('tareas') }}" wire:navigate class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" stroke-width="1" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>

                                Asignación de Tareas
                            </a>
                            @endcan
                            @can('ver auditoria')
                                
                            <a href="{{ route('auditoria') }}" wire:navigate class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">

                                <x-icon name="clock" class="w-6 h-6 mr-2" />
                                Auditoria
                            </a>
                            @endcan
                            @can('ver reportes')
                                
                            {{-- <a href="{{ route('reportes') }}" wire:navigate class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Reportes
                            </a> --}}
                            @endcan
    
                            @can('ver base de datos')
                                
                            <a href="{{ route('base-de-datos') }}" wire:navigate class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                                <x-icon name="circle-stack" class="w-6 h-6 mr-2" />

                                Base de Datos
                            </a>
                            @endcan
    
                        </div>




                    </nav>

                        <a href="{{ asset('portal/manual1.pdf') }}" target="_blank" class=" bg-gray-900 flex items-center justify-center h-14 px-4  py-2 mt-2 text-gray-100 hover:bg-gray-700">
                            <div class="flex items-center mr-8">
                                <x-icon name="question-mark-circle" class="w-5 h-5 mr-1" />                         
                                Ayuda
                            </div>

                        </a>
                    
                </div>
            </div>
            

            <div class="flex flex-col flex-1 overflow-y-auto" style="background-image: url('{{ asset('portal/imagen.png') }}');   background-position: center;
                 background-size: 150% ;" >
                <div class="flex flex-col flex-1 overflow-y-auto bg-gray-300 bg-opacity-40">
                    <div class="border-b border-gray-300"><livewire:layout.navigation /></div>
                    <div class="px-10 py-6  space-y-4">
                        <div class="pb-1 border-b-2 border-gray-800 w-fit px-3">
                              {{$header}}
                        </div>
                            {{ $slot }}
                    </div>
                </div>

                    
            </div>
        </div>
        <x-dialog />

    @livewire('wire-elements-modal')
    </body>
</html>
