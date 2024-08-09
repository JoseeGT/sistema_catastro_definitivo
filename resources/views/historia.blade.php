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
    <div class="max-w-screen-xl mx-auto p-5 sm:p-8 md:p-12 relative">
      <div class="bg-cover h-64 text-center overflow-hidden"
          style="height: 450px; background-image: url('{{ asset('portal/hero-image.jpeg') }}')">
      </div>
      <div class="max-w-2xl mx-auto">
          <div
              class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
            
              <div class="">
                 <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">Historia
                </h1>
                <h3 class="text-2xl font-bold my-5">Origenes y fundación</h3>


                  </p>
                  
                  <p class="text-base leading-8 my-5">
                    La Oficina Municipal de Catastro, ubicada en Palo Negro, estado Aragua, tiene sus raíces en la fundación 
                    del municipio Libertador en 1989, juntamente con otras instituciones y dependencias municipales bajo la 
                    administración del primer alcalde de Palo Negro, Guillermo Morales Contreras.Dicho municipio, antes de ser 
                    independiente, era parte del Municipio Santiago Mariño. Esto también aplicaba a sus oficinas, ya que no se 
                    contaba con una alcaldía propia, lo que obligaba a los contribuyentes a desplazarse desde Palo Negro hasta
                     las oficinas gubernamentales para realizar cualquier trámite de carácter público.
                  </p>
  
                  <h3 class="text-2xl font-bold my-5">Independencia del Municipio Libertador
                  </h3>
  
                  <p class="text-base leading-8 my-5">
                    La situación cambió el 23 de octubre de 1989, cuando el municipio alcanzó la independencia y se conformó
                    como el Municipio Autónomo Libertador. A principios del siguiente año, más precisamente en marzo de 1990,
                    se estableció la alcaldía municipal Libertador en Palo Negro. Entre las primeras dependencias establecidas
                    se encontraba la encargada de manejar el catastro del municipio.
                  </p>

                  <h3 class="text-2xl font-bold my-5">Retos Iniciales de la Oficina de Catastro

                  </h3>
  
                  <p class="text-base leading-8 my-5">
                    A pesar de estar establecida, la Oficina Municipal de Catastro del Municipio Libertador tardó un par de años
                    en poder realizar sus actividades de manera óptima. Esto se debió a que tuvieron que llevar a cabo proyectos 
                    relacionados con el catastro municipal de los inmuebles. La alcaldía del municipio Santiago Mariño, al tener
                    dificultades para mantener el catastro de ambos municipios, había sacrificado el detalle de cada inmueble, 
                    colocando solo el sector dentro del municipio en el código catastral y dejando de lado el número de manzana 
                    y parcela. La recién fundada oficina municipal de catastro tuvo que pasar un tiempo actualizando la información
                    de los inmuebles con los que se contaba.
                  </p>
                  <h3 class="text-2xl font-bold my-5">Papel Crucial y Desafíos Actuales
                  </h3>
  
                  <p class="text-base leading-8 my-5">
                    Desde entonces, la Oficina Municipal de Catastro ha desempeñado un papel crucial en la gestión y organización 
                    territorial de la región. Sin embargo, a pesar de su importancia, esta oficina enfrenta desafíos relacionados 
                    con la obsolescencia tecnológica, teniendo que realizar procesos internos de actualización de datos y cálculos 
                    de manera manual, lo que afecta la eficiencia y eficacia de sus procesos.
                  </p>

                  {{-- <a href="#"
                      class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                      #Election
                  </a>,
                  <a href="#"
                      class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                      #people
                  </a>,
                  <a href="#"
                      class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                      #Election2020
                  </a>,
                  <a href="#"
                      class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                      #trump
                  </a>,
                  <a href="#"
                      class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                      #Joe
                  </a>
   --}}
              </div>
  
          </div>
      </div>
  </div>
  </div>




  </main><!-- end main -->

  <!-- =========={ FOOTER }==========  -->
  <footer class="bg-gray-800 text-gray-400">
    <!--Footer content-->
    <!--Start footer copyright-->
    <div class="footer-dark">
      <div class="container py-4 border-t mx-auto border-gray-200 border-opacity-10">
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