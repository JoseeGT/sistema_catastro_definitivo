<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title  -->
  <title>CATASTRO MUNICIPIO LIBERTADOR</title>
  <meta name="description" content="Portal web informativo de la oficina municipla de catastro del municipio libertador">

  <!-- Development css -->
  {{-- <link rel="stylesheet" href="src/css/style.css"> --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('\build\assets\app-iOyr5CFq.css') }}">

  <!-- Production css -->
  <!-- <link rel="stylesheet" href="dist/css/style.css"> -->

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

  <!-- Favicon  -->
  <link rel="icon" href="src/img/favicon.jpg">
</head>
<body class="text-gray-700 pt-9 sm:pt-10">
  <!-- ========== { HEADER }==========  -->
  <header class="fixed top-0 left-0 right-0 z-50">
     <nav class="bg-gray-800">
       <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
          <div class="flex justify-between">

          <div class="mx-w-10 text-2xl font-bold capitalize text-white flex items-center">        <x-application-logo class="block h-20 p-3 w-auto fill-white" />
            Catastro | Municipio Libertador</div>
            
            <div class="flex flex-row">
              <!-- nav menu -->
              <ul class="navbar hidden lg:flex lg:flex-row text-white text-sm items-center font-bold">

                <li class="relative border-l border-gray-800 hover:bg-gray-900">
                  <a class="block py-3 px-6 border-b-2 border-transparent" href="/">Inicio</a>
                </li>
                <li class="relative border-l border-gray-800 hover:bg-gray-900">
                  <a class="block py-3 px-6 border-b-2 border-transparent" href="/acerca">Historia</a>
                </li>
                <li class="relative border-l border-gray-800 hover:bg-gray-900">
                  <a class="block py-3 px-6 border-b-2 border-transparent" href="/preguntas">Preguntas Frecuentes</a>
                </li>
                <li class="relative border-l border-gray-800 hover:bg-gray-900">
                  <a class="block py-3 px-6 border-b-2 border-transparent" href="/archivos">Descargar Archivos</a>
                </li>
                <li class="relative border-l border-gray-900 bg-gray-700 hover:bg-gray-900">
                  <a class="block py-3 px-6 border-b-2 border-transparent" href="{{ route('login') }}">Iniciar Sesión Como Funcionario</a>
                </li>
              </ul>

              <!-- search form & mobile nav -->
              <div class="flex flex-row items-center text-gray-300">


                <div class="relative hover:bg-gray-800 block lg:hidden">
                  <button type="button" class="menu-mobile block py-3 px-6 border-b-2 border-transparent">
                    <span class="sr-only">Mobile menu</span>
                    <svg class="inline-block h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg> Menu
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
     </nav>
  </header><!-- end header -->

  <main id="content">
    <!-- advertisement -->

    <header class="h-4/6">
      <div class="w-full h-80  bg-center bg-cover"
      style="background-image: url('{{ asset('portal/hero-image.jpeg') }}');">
        <div class="flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-60 py-12">
          <div class="text-center">
            <div class="container px-4 mx-auto">
              <div class="max-w-4xl mx-auto text-center">
                {{-- <span class="text-gray-200 font-semibold uppercase tracking-widest">Catastro</span> --}}
                <h2 class="mt-8 mb-6 text-4xl lg:text-5xl font-bold text-gray-100">Archivos</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

{{--   
    <div class="max-w-2xl lg:max-w-4xl mx-auto text-center mt-10">
      <h2 class="text-3xl font-bold text-gray-900">Visitanos!</h2>
  </div> --}}
      
    <div class="max-w-2xl mx-auto my-10">
      <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start">
  
          <div class="relative w-32 h-32 flex-shrink-0 flex items-center justify-center">
              <img class="object-cover object-center transition duration-50" loading="lazy" src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" width="64px" height="64px">
          </div>
  
          <div class="flex flex-col gap-2 py-2">
  
              <p class="text-xl font-bold">Plano del municipio</p>
  
              <p class="text-gray-500">
                  Plano del Municipio en formato Pdf actualizado al año 2024.
              </p>
  
              <span class="flex items-center justify-start text-gray-500">
                  <svg class="w-4 h-4 mr-1 mt-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                  </svg>
                  <a href="{{ asset('portal/planomun.pdf') }}" target="_blank">Descargar</a>
              </span>
  
          </div>
  
      </div>
  </div>
  <div class="max-w-2xl mx-auto my-10">
    <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start">

        <div class="relative w-32 h-32 flex-shrink-0 flex items-center justify-center">
            <img class="object-cover object-center transition duration-50" loading="lazy" src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" width="64px" height="64px">
        </div>

        <div class="flex flex-col gap-2 py-2">

            <p class="text-xl font-bold">Ordenanza de Catastro</p>

            <p class="text-gray-500">
                Ordenanza con la que se riguen los datos de catastro asi como el calculo de los impuestos.
            </p>

            <span class="flex items-center justify-start text-gray-500">
                <svg class="w-4 h-4 mr-1 mt-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ asset('portal/CATASTRO_ARMONIZACION.pdf') }}" target="_blank">Descargar</a>
            </span>

        </div>

    </div>
</div>
<div class="max-w-2xl mx-auto my-10">
  <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start">

      <div class="relative w-32 h-32 flex-shrink-0 flex items-center justify-center">
          <img class="object-cover object-center transition duration-50" loading="lazy" src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" width="64px" height="64px">
      </div>

      <div class="flex flex-col gap-2 py-2">

          <p class="text-xl font-bold">Sectores del municipio Libertador</p>

          <p class="text-gray-500">
            conjunto de sectores, resaltados para ordenar, gestionar y verificar el desarrollo urbano de la localidad.
          </p>

          <span class="flex items-center justify-start text-gray-500">
              <svg class="w-4 h-4 mr-1 mt-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
              </svg>
              <a href="{{ asset('portal/SECTORES_MUNICIPIO_LIBERTADOR.pdf') }}" target="_blank">Descargar</a>
          </span>

      </div>

  </div>
</div>



  </main><!-- end main -->

  <!-- =========={ FOOTER }==========  -->
  <footer class="bg-gray-800 text-gray-400">
    <!--Footer content-->
    <!--Start footer copyright-->
    <div class="footer-dark">
      <div class="container py-4 border-t border-gray-200 m-auto border-opacity-10">
        <div class="row">
          <div class="col-12 col-md text-center">
            <p class="d-block my-3">Copyright © Catastro Municipio Libertador | Todos los derechos Reservados.</p>
          </div>
        </div>
      </div>
    </div><!--End footer copyright-->
  </footer><!-- end footer -->

  <!-- =========={ SCROLL TO TOP }==========  -->
  <a href="#" class="back-top fixed p-4 rounded bg-gray-100 border border-gray-100 text-gray-500 dark:bg-gray-900 dark:border-gray-800 right-4 bottom-4 hidden" aria-label="Scroll To Top">
    <svg width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
      <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z" clip-rule="evenodd"></path>
    </svg>
  </a>

  <!--Vendor js-->
  <script src="src/vendors/hc-sticky/dist/hc-sticky.js"></script>
  <script src="src/vendors/glightbox/dist/js/glightbox.min.js"></script>
  <script src="src/vendors/@splidejs/splide/dist/js/splide.min.js"></script>
  <script src="src/vendors/@splidejs/splide-extension-video/dist/js/splide-extension-video.min.js"></script>
  
  <!-- Start development js -->
  <script src="src/js/theme.js"></script>
  <!-- End development js -->

  <!-- Production js -->
  <!-- <script src="dist/js/scripts.js"></script> -->
</body>
</html>