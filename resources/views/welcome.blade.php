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

<script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
        content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
    }
</script>

  <main id="content">
    <!-- advertisement -->

    <header class="h-screen">
      <div class="w-full h-screen  bg-center bg-cover"
      style="background-image: url('{{ asset('portal/hero-image.jpeg') }}');">
        <div class="flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-60 py-12">
          <div class="text-center">
            <div class="container px-4 mx-auto">
              <div class="max-w-4xl mx-auto text-center">
                {{-- <span class="text-gray-200 font-semibold uppercase tracking-widest">Catastro</span> --}}
                <h2 class="mt-8 mb-6 text-4xl lg:text-5xl font-bold text-gray-100">Catastro</h2>
                <p class="max-w-3xl mx-auto mb-10 text-lg text-gray-300">
                  "Por un Municipio Organizado y Eficiente, Comprometido con la Transparencia, la Participación Ciudadana, la Innovación Tecnológica, la Sostenibilidad Ambiental y el Desarrollo Integral de su Comunidad"
                </p>
                {{-- <a class="inline-block w-full md:w-auto mb-4 md:mr-6 py-5 px-8 text-sm font-bold uppercase border-2 border-transparent bg-gray-200 rounded hover:bg-gray-100 text-gray-800 transition duration-200"
                  href="#">start your free trial</a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class=" m-auto w-4/5 bg-white mb-12">  

      <div class="container m-auto px-2 text-gray-600 md:px-2 xl:px-2">
        <h1 id="acerca" class="text-2xl mb-10 text-gray-900 font-bold md:text-4xl border-b-2 border-gray-300 my-4  ">Misión y Visión</h1>

          <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
            <div class=" md:5/12 lg:w-5/12 rounded-sm">
              <img class="rounded-xl" src="{{ asset('portal/nosotros.jpg') }}" alt="image" loading="lazy" width="600" height="auto">
            </div>
            <div class="md:7/12 lg:w-6/12">
              <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">Misión</h2>
              <p class="my-6 text-gray-600">Brindar servicios catastrales precisos, eficientes y accesibles, facilitando la gestión territorial a través de la recolección, actualización y difusión de información geográfica y de propiedad. Promover la transparencia y equidad en la valoración y registro de bienes inmuebles, contribuyendo al desarrollo sostenible y ordenado de la sociedad</p>
              <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">Visión</h2>
              <p class="my-6 text-gray-600">Ser la entidad líder en innovación y tecnología catastral, reconocida por la precisión de sus datos, la excelencia en su servicio y su compromiso con la mejora continua. Convertirnos en un referente internacional en la gestión y administración de la información territorial, apoyando la toma de decisiones estratégicas y el desarrollo sostenible de las comunidades.</p>
            </div>
          </div>
      </div>
    </div>


    <section id="ubicacion" class="bg-gray-100">
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
          <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
              <h2 class="text-3xl font-bold text-gray-900">Visitanos!</h2>
              {{-- <p class="mt-4 text-lg text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> --}}
          </div>
          <div class="mt-16 lg:mt-20 m-auto w-4/5 ">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                  <div class="rounded-lg overflow-hidden">
                      <iframe
                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d707.6646309049809!2d-67.54656242975803!3d10.170912372379478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e80229f59948c63%3A0x1d84f43f8310959e!2sAlcaldia%20Bolivariana%20del%20Municipio%20Libertador!5e0!3m2!1ses!2sus!4v1720707097324!5m2!1ses!2sus" width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy" 
                          ></iframe>
                  </div>
                  <div>
                      <div class="max-w-full mx-auto rounded-lg overflow-hidden">
                          <div class="px-6 py-4">
                              <h3 class="text-lg font-medium text-gray-900">Nuestra dirección</h3>
                              <p class="mt-1 text-gray-600">Calle Gran Democrata, Edificio del consejo Munipipal, a media Cuadra de la plaza</p>
                          </div>
                          <div class="border-t border-gray-200 px-6 py-4">
                              <h3 class="text-lg font-medium text-gray-900">Horarios</h3>
                              <p class="mt-1 text-gray-600">Lunes - Viernes: 8am - 4pm</p>
                              <p class="mt-1 text-gray-600">Sabado - Domingo: Cerrado</p>
                          </div>
                          <div class="border-t border-gray-200 px-6 py-4">
                              <h3 class="text-lg font-medium text-gray-900">Contacto</h3>
                              <p class="mt-1 text-gray-600">Email: catastromunliber@gmail.com</p>
                              <p class="mt-1 text-gray-600">Phone: 0414-421-1214</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>






  </main><!-- end main -->

  <!-- =========={ FOOTER }==========  -->
  <footer class="bg-gray-800 text-gray-400">
    <!--Footer content-->
    <!--Start footer copyright-->
    <div class="footer-dark">
      <div class="container mx-auto py-4 border-t border-gray-200 border-opacity-10">
        <div class="row">
          <div class="col-12 col-md text-center">
            <p class="my-3">Copyright © Catastro Municipio Libertador | Todos los derechos Reservados.</p>
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