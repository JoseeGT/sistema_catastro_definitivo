<!DOCTYPE html>
<html lang="es">
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
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: Arial, sans-serif;
    }
    .parallax-section {
        position: relative;
        height: 750px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }
    .parallax-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('portal/imagen.png') }}');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        z-index: -1;
        opacity: 0.50;
    }

    .parallax-content {
        position: relative;
        z-index: 1;
    }

    h1 {
        font-size: 3rem;
        margin: 0;
    }
    @media(max-width: 640px){
      .parallax-section{
        height: 2000px;
      }
    }
</style>
  <!-- Favicon  -->
  <link rel="icon" href="src/img/favicon.jpg">
</head>
<body class="text-gray-700 pt-9 sm:pt-10">
  <!-- ========== { HEADER }==========  -->
  <header class="fixed top-0 left-0 right-0 z-50">
    
     <nav class="bg-gray-800">
       <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
          <div class="flex justify-between">

          <div class="mx-w-10 text-2xl font-bold capitalize text-white flex items-center"><x-application-logo class="block h-20 p-3 w-auto fill-white" />
            Catastro | Municipio Libertador</div>
            
            <div class="flex flex-row">
              <!-- nav menu -->
              <ul class="navbar gap-2 hidden lg:flex lg:flex-row text-white text-sm items-center font-bold">

                <li class="relative border-l border-gray-800 ">
                  <a class="block py-3 px-3  hover:border-b-2 " href="/">Inicio</a>
                </li>
                <li class="relative border-l border-gray-800">
                  <a class="block py-3 px-3 hover:border-b-2" href="/acerca">Historia</a>
                </li>
                <li class="relative border-l border-gray-800">
                  <a class="block py-3 px-3  hover:border-b-2" href="/preguntas">Preguntas Frecuentes</a>
                </li>
                <li class="relative border-l border-gray-800">
                  <a class="block py-3 px-3 hover:border-b-2" href="/archivos">Descargar Archivos</a>
                </li>

                <li class="relative bg-gray-700 hover:bg-gray-900">
                  <a class="block py-3 px-3" href="{{ route('login') }}">Iniciar Sesión Como Funcionario</a>
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
                <h2 class="mt-8 mb-6 text-4xl lg:text-5xl font-bold text-gray-100">Catastro del Municipio Libertador</h2>
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
    <div class="container px-6 py-8 mx-auto">
      <div class="items-center lg:flex">
          <div class="w-full lg:w-1/2">
              <div data-aos="fade-right"      data-aos-duration="1000"
                class="lg:max-w-lg">
                  <h1 class="text-3xl font-semibold text-gray-800 dark:text-white lg:text-4xl">¿Qué es el Catastro? <br></h1>
                  <p class="mt-3 text-gray-600 dark:text-gray-400">El catastro es un registro detallado de los predios en un territorio, que incluye sus características físicas, jurídicas y económicas. Su propósito es ofrecer una base para la gestión territorial, la planificación y la fiscalidad.</p>
              </div>
          </div>

          <div data-aos="fade-up"      data-aos-duration="1000"      data-aos-delay="300"
          class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2">
              <img class="lg:max-w-xl" src="{{ asset('portal/intro.png ') }}" alt="Catalogue-pana.svg">
          </div>
      </div>
  </div>

  <div class="max-w-full mx-auto">
    <div id="custom-carousel" class="relative  overflow-hidden shadow-lg">
        <!-- Carousel wrapper -->
        <div class="carousel-inner relative flex transition-transform duration-700 ease-in-out" style="height:500px;">
            <!-- Item 1 -->
            <div class="carousel-item min-w-full relative">
              <!-- Imagen -->
              <img src="{{ asset('portal/slider/mapa.png') }}" class="object-cover w-full h-full" alt="Slide 1">
          
              <!-- Div superpuesto con fondo semitransparente -->
              <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-20">
                  <span class="text-white text-4xl font-semibold px-4 py-2 rounded">
                      Plano de Palo Negro       
                  </span>
              </div>
          </div>
          <div class="carousel-item min-w-full relative">
            <!-- Imagen -->
            <img src="{{ asset('portal/slider/satelital.png') }}" class="object-cover w-full h-full" alt="Slide 2">
        
            <!-- Div superpuesto con fondo semitransparente -->
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-20">
                <span class="text-white text-4xl font-semibold px-4 py-2 rounded">
                    Imagen satelital de Palo Negro       
                </span>
            </div>
        </div>

            <!-- Item 3 -->
            <div class="carousel-item min-w-full relative">
              <!-- Imagen -->
              <img src="{{ asset('portal/slider/sectores.png') }}" class="object-cover w-full h-full" alt="Slide 3">
          
              <!-- Div superpuesto con fondo semitransparente -->
              <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-20">
                  <span class="text-white text-4xl font-semibold px-4 py-2 rounded">
                      Sectores de Palo Negro       
                  </span>
              </div>
          </div>
        </div>

        <!-- Progress Bar -->
        {{-- <div class="progress-bar h-1 bg-blue-500 absolute bottom-0 left-0 transition-all duration-[5000ms]"></div> --}}

        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-2">
            <button type="button" class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
        </div>

        <!-- Slider controls -->
        <button type="button"
            class="carousel-prev flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button type="button"
            class="carousel-next flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

  
  <section class="m-auto w-4/5 bg-white mb-12">  
    
      <div class="container m-auto px-2 text-gray-600 md:px-2 xl:px-2">
        <h1 id="acerca" class="text-2xl mb-10 text-gray-900 font-bold md:text-4xl border-b-2 border-gray-300 my-4  ">Misión y Visión</h1>

          <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
            <div data-aos="fade-up" class=" md:5/12 lg:w-5/12 rounded-sm">
              <img class="rounded-xl" src="{{ asset('portal/nosotros.jpg') }}" alt="image" loading="lazy" width="600" height="auto">
            </div>
            <div class="md:7/12 lg:w-6/12">
              <h2 data-aos="fade-right"      data-aos-duration="1000"
                class="text-2xl text-gray-900 font-bold md:text-4xl">Misión</h2>
              <p  data-aos="fade-right"      data-aos-duration="1000" class="my-6 text-gray-600">Brindar servicios catastrales precisos, eficientes y accesibles, facilitando la gestión territorial a través de la recolección, actualización y difusión de información geográfica y de propiedad. Promover la transparencia y equidad en la valoración y registro de bienes inmuebles, contribuyendo al desarrollo sostenible y ordenado de la sociedad</p>
              <h2 data-aos="fade-right"      data-aos-duration="1000"      data-aos-delay="300"
               class="text-2xl text-gray-900 font-bold md:text-4xl">Visión</h2>
              <p data-aos="fade-right"      data-aos-duration="1000"      data-aos-delay="300"
              class="my-6 text-gray-600">Ser la entidad líder en innovación y tecnología catastral, reconocida por la precisión de sus datos, la excelencia en su servicio y su compromiso con la mejora continua. Convertirnos en un referente internacional en la gestión y administración de la información territorial, apoyando la toma de decisiones estratégicas y el desarrollo sostenible de las comunidades.</p>
            </div>
          </div>
      </div>
    </section>

    



  
  




  



    {{-- card --}}





    <section class="parallax-section">
      <div class="parallax-background"></div>
  
      <!-- Título centrado -->

  
      <!-- Contenedor de las tarjetas -->
      <div class="container grid sm:grid-cols-1 gap-1 md:grid-cols-2 lg:grid-cols-3 h-full items-center justify-center py-10">
            <div class="flex justify-center md:col-span-2 lg:col-span-3 col-span-3">
              <h2 data-aos="fade-right" class="text-3xl font-bold text-black">Actividades que Realizamos</h2>
            </div>
          <!-- Card -->
            <div data-aos="fade-up" data-aos-delay="100" class="group relative max-w-sm cursor-pointer overflow-hidden border-1 border-black bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-transform duration-300 hover:-translate-y-1 hover:shadow-2xl rounded-lg text-left">
                <!-- Background Circle -->
                <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-transform duration-300 group-hover:scale-[10]"></span>
                
                <div class="relative z-10">
                    <!-- Icon -->
                    <span class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-colors duration-300 group-hover:bg-sky-400 mr-auto">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white transition-all">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                      </svg>
                      
                    </span>
                    
                    <!-- Title -->
                    <div class="pt-5 text-base font-semibold leading-7 mr-auto">
                        <h3 class="text-sky-500 transition-colors duration-300 group-hover:text-white">Cálculo de impuestos sobre la propiedad</h3>
                    </div>
    
                    <!-- Text Content -->
                    <div class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-colors duration-300 group-hover:text-white mr-auto">
                        <p>Este proceso determina el monto que cada propietario debe pagar anualmente como impuesto por sus inmuebles.</p>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" class="group relative max-w-sm cursor-pointer overflow-hidden border-1 border-black bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-transform duration-300 hover:-translate-y-1 hover:shadow-2xl rounded-lg text-left">
              <!-- Background Circle -->
              <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-transform duration-300 group-hover:scale-[10]"></span>
              
              <div class="relative z-10">
                  <!-- Icon -->
                  <span class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-colors duration-300 group-hover:bg-sky-400 mr-auto">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-10 w-10 text-white transition-all" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                  </span>
                  
                  <!-- Title -->
                  <div class="pt-5 text-base font-semibold leading-7 mr-auto">
                      <h3 class="text-sky-500 transition-colors duration-300 group-hover:text-white">Expedición de Ficha Catastral</h3>
                  </div>

                  <!-- Text Content -->
                  <div class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-colors duration-300 group-hover:text-white mr-auto">
                      <p>Consiste en la emisión de un documento oficial que certifica la información registrada en el catastro sobre un bien inmueble.</p>
                  </div>
              </div>
          </div>
          <div data-aos="fade-up" data-aos-delay="300" class="group relative max-w-sm cursor-pointer overflow-hidden border-1 border-black bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-transform duration-300 hover:-translate-y-1 hover:shadow-2xl rounded-lg text-left">
            <!-- Background Circle -->
            <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-transform duration-300 group-hover:scale-[10]"></span>
            
            <div class="relative z-10">
                <!-- Icon -->
                <span class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-colors duration-300 group-hover:bg-sky-400 mr-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white transition-all" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
              </svg>
                </span>
                
                <!-- Title -->
                <div class="pt-5 text-base font-semibold leading-7 mr-auto">
                    <h3 class="text-sky-500 transition-colors duration-300 group-hover:text-white">Inspecciones</h3>
                </div>

                <!-- Text Content -->
                <div class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-colors duration-300 group-hover:text-white mr-auto">
                    <p>Evaluación física de un terreno para verificar su estado y asegurar que la información catastral sea precisa y esté al día.</p>
                </div>
            </div>
        </div>
        <div data-aos="fade-up" data-aos-delay="400" class="group relative max-w-sm cursor-pointer overflow-hidden border-1 border-black bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-transform duration-300 hover:-translate-y-1 hover:shadow-2xl rounded-lg text-left">
          <!-- Background Circle -->
          <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-transform duration-300 group-hover:scale-[10]"></span>
          
          <div class="relative z-10">
              <!-- Icon -->
              <span class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-colors duration-300 group-hover:bg-sky-400 mr-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white transition-all"fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
              </span>
              
              <!-- Title -->
              <div class="pt-5 text-base font-semibold leading-7 mr-auto">
                  <h3 class="text-sky-500 transition-colors duration-300 group-hover:text-white">Division de lotes</h3>
              </div>

              <!-- Text Content -->
              <div class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-colors duration-300 group-hover:text-white mr-auto">
                  <p>Proceso de subdividir un terreno en parcelas más pequeñas, facilitando así su gestión y administración catastral.</p>
              </div>
          </div>
      </div>
      <div data-aos="fade-up" data-aos-delay="500" class="group relative max-w-sm cursor-pointer overflow-hidden border-1 border-black bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-transform duration-300 hover:-translate-y-1 hover:shadow-2xl rounded-lg text-left">
        <!-- Background Circle -->
        <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-transform duration-300 group-hover:scale-[10]"></span>
        
        <div class="relative z-10">
            <!-- Icon -->
            <span class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-colors duration-300 group-hover:bg-sky-400 mr-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white transition-all"fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
            </span>
            
            <!-- Title -->
            <div class="pt-5 text-base font-semibold leading-7 mr-auto">
                <h3 class="text-sky-500 transition-colors duration-300 group-hover:text-white">Unificación de lotes</h3>
            </div>

            <!-- Text Content -->
            <div class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-colors duration-300 group-hover:text-white mr-auto">
                <p>Acción de combinar varios lotes en uno solo para simplificar la administración y mejorar la utilización del suelo.</p>
            </div>
        </div>
    </div>
    <div data-aos="fade-up" data-aos-delay="600" class="group relative max-w-sm cursor-pointer overflow-hidden border-1 border-black bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-transform duration-300 hover:-translate-y-1 hover:shadow-2xl rounded-lg text-left">
      <!-- Background Circle -->
      <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-transform duration-300 group-hover:scale-[10]"></span>
      
      <div class="relative z-10">
          <!-- Icon -->
          <span class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-colors duration-300 group-hover:bg-sky-400 mr-auto">
          
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white transition-all" >
          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
      </svg>
          </span>
          
          <!-- Title -->
          <div class="pt-5 text-base font-semibold leading-7 mr-auto">
              <h3 class="text-sky-500 transition-colors duration-300 group-hover:text-white">Planos de mensura</h3>
          </div>

          <!-- Text Content -->
          <div class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-colors duration-300 group-hover:text-white mr-auto">
              <p>Elaboración y reproducción de planos detallados que muestran las dimensiones y los límites de un terreno.</p>
          </div>
      </div>
  </div>
      </div>
  </section>
  
  
  
  



    <section id="ubicacion" class="bg-gray-200">
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
          <div data-aos="fade-up" class="max-w-2xl lg:max-w-4xl mx-auto text-center">
              <h2 class="text-3xl font-bold text-gray-900">Visitanos!</h2>
              {{-- <p class="mt-4 text-lg text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> --}}
          </div>
          <div class="mt-16 lg:mt-20 m-auto w-4/5  ">
              <div data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="300" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                  <div class="rounded-lg overflow-hidden shadow-2xl ">
                      <iframe
                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d707.6646309049809!2d-67.54656242975803!3d10.170912372379478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e80229f59948c63%3A0x1d84f43f8310959e!2sAlcaldia%20Bolivariana%20del%20Municipio%20Libertador!5e0!3m2!1ses!2sus!4v1720707097324!5m2!1ses!2sus" width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy" 
                          ></iframe>
                  </div>
                  <div data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="500"  >
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
                              <p class="mt-1 text-gray-600">Phone: 0414-4218712</p>
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
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const carouselInner = document.querySelector('.carousel-inner');
        const items = document.querySelectorAll('.carousel-item');
        const indicators = document.querySelectorAll('.carousel-indicator');
        const progressBar = document.querySelector('.progress-bar');
        let currentIndex = 0;
        const totalItems = items.length;
        const intervalTime = 3000; // 5 seconds

        function updateSlidePosition() {
            const newTranslateX = -currentIndex * 100;
            carouselInner.style.transform = `translateX(${newTranslateX}%)`;
        }

        function updateIndicators() {
            indicators.forEach((indicator, index) => {
                if (index === currentIndex) {
                    indicator.classList.add('bg-gray-800');
                    indicator.classList.remove('bg-gray-300');
                } else {
                    indicator.classList.add('bg-gray-300');
                    indicator.classList.remove('bg-gray-800');
                }
            });
        }

        function resetProgressBar() {
            progressBar.style.transition = 'none'; // Disable transition to reset width
            progressBar.style.width = '0%'; // Reset width to 0
            // Force reflow to restart the transition
            progressBar.offsetHeight; // Trigger reflow
            progressBar.style.transition = `width ${intervalTime}ms linear`; // Re-enable transition
            progressBar.style.width = '100%'; // Start new width animation
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalItems;
            updateSlidePosition();
            updateIndicators();
            resetProgressBar();
        }

        // Auto-slide with interval
        let autoSlide = setInterval(nextSlide, intervalTime);

        // Pause auto-slide on hover
        carouselInner.addEventListener('mouseover', () => clearInterval(autoSlide));
        carouselInner.addEventListener('mouseout', () => {
            autoSlide = setInterval(nextSlide, intervalTime);
        });

        // Manual control
        document.querySelector('.carousel-next').addEventListener('click', () => {
            nextSlide();
            clearInterval(autoSlide);
            autoSlide = setInterval(nextSlide, intervalTime);
        });

        document.querySelector('.carousel-prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            updateSlidePosition();
            updateIndicators();
            resetProgressBar();
            clearInterval(autoSlide);
            autoSlide = setInterval(nextSlide, intervalTime);
        });

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentIndex = index;
                updateSlidePosition();
                updateIndicators();
                resetProgressBar();
                clearInterval(autoSlide);
                autoSlide = setInterval(nextSlide, intervalTime);
            });
        });

        // Initially show the first slide and start progress bar
        updateSlidePosition();
        updateIndicators();
        resetProgressBar();
    });
</script>
  <!-- Start development js -->
  <script src="src/js/theme.js"></script>
  <!-- End development js -->

  <!-- Production js -->
  <!-- <script src="dist/js/scripts.js"></script> -->
</body>
<script>
  AOS.init();
</script>
</html>