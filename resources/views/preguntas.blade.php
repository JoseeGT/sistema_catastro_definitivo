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

  <div class="py-24 px-8 max-w-5xl mx-auto flex flex-col md:flex-row gap-12">
    <div class="flex flex-col text-left basis-1/2">
        <p class="sm:text-4xl text-3xl font-extrabold text-base-content">Preguntas Frecuentes</p>
        <img  class="mt-4" src="{{ asset('portal/ficha_ejemplo.png') }}" alt="Ficha catastral">
    </div>
    <ul class="basis-1/2">
        <li>
            <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                <span class="flex-1 text-base-content">¿Cómo se actualiza la información catastral?</span>
                <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                </svg>
            </button>
            <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                <div class="pb-5 leading-relaxed">
                    <div class="space-y-2 leading-relaxed">La información catastral se actualiza a través de procesos periódicos de revisión y actualización, que pueden incluir modificaciones por nuevas construcciones, reformas o cambios en el uso del suelo.</div>
                </div>
            </div>
        </li>
        <li>
            <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                <span class="flex-1 text-base-content">¿Cómo puedo consultar la información catastral de un inmueble?</span>
                <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                </svg>
            </button>
            <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                <div class="pb-5 leading-relaxed">
                    <div class="space-y-2 leading-relaxed">A través de consultas presenciales en las oficinas correspondientes.</div>
                </div>
            </div>
        </li>
        <li>
          <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
              <span class="flex-1 text-base-content">¿Cómo puedo saber el codigo catastral de mi inmueble?</span>
              <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                  <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                  <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
              </svg>
          </button>
          <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
              <div class="pb-5 leading-relaxed">
                  <div class="space-y-2 leading-relaxed">este aparece en la ficha catastral de su inmueble(como en la imagen de la izquierda) así, tambien puede aparecer en documento del inmueble.</div>
              </div>
          </div>
      </li>
      <li>
        <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
            <span class="flex-1 text-base-content">¿Cómo puedo consultar la información catastral de un inmueble?</span>
            <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
            </svg>
        </button>
        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
            <div class="pb-5 leading-relaxed">
                <div class="space-y-2 leading-relaxed">través de consultas presenciales en las oficinas correspondientes.</div>
            </div>
        </div>
    </li>
        <li>
            <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                <span class="flex-1 text-base-content">¿Cuales son los requitos para la Inscripción catastral?</span>
                <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                </svg>
            </button>
            <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                <div class="pb-5 leading-relaxed">
                  <ol class="list-decimal pl-6">
                    <li>Copia de la cédula de identidad</li>
                    <li>Copia del título o documento de propiedad</li>
                    <li>Una carpeta manila tamaño oficio con gancho</li>
                </ol>
                </div>
            </div>
        </li>
    </ul>
</div>





    
  
  </div>




  </main><!-- end main -->

  <!-- =========={ FOOTER }==========  -->
  <footer class="bg-gray-800 text-gray-400">
    <!--Footer content-->
    <!--Start footer copyright-->
    <div class="footer-dark">
      <div class="container py-4 border-t m-auto border-gray-200 border-opacity-10">
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
  <script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
        content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
    }
</script>
  <!-- Production js -->
  <!-- <script src="dist/js/scripts.js"></script> -->
</body>
</html>