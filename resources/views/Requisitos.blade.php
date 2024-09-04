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
 </header><!-- end header -->- end header -->

  <div class="bg-gray-100 dark:bg-gray-800 py-8 mt-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover" src="https://cdn.pixabay.com/photo/2020/05/22/17/53/mockup-5206355_960_720.jpg" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add to Cart</button>
                    </div>
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Add to Wishlist</button>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Product Name</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                        <span class="text-gray-600 dark:text-gray-300">$29.99</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Availability:</span>
                        <span class="text-gray-600 dark:text-gray-300">In Stock</span>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="font-bold text-gray-700 dark:text-gray-300">Select Color:</span>
                    <div class="flex items-center mt-2">
                        <button class="w-6 h-6 rounded-full bg-gray-800 dark:bg-gray-200 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-red-500 dark:bg-red-700 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-blue-500 dark:bg-blue-700 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-yellow-500 dark:bg-yellow-700 mr-2"></button>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="font-bold text-gray-700 dark:text-gray-300">Select Size:</span>
                    <div class="flex items-center mt-2">
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">S</button>
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">M</button>
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">L</button>
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XL</button>
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XXL</button>
                    </div>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                        sed ante justo. Integer euismod libero id mauris malesuada tincidunt. Vivamus commodo nulla ut
                        lorem rhoncus aliquet. Duis dapibus augue vel ipsum pretium, et venenatis sem blandit. Quisque
                        ut erat vitae nisi ultrices placerat non eget velit. Integer ornare mi sed ipsum lacinia, non
                        sagittis mauris blandit. Morbi fermentum libero vel nisl suscipit, nec tincidunt mi consectetur.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>




{{-- 
    <div class="max-w-2xl mx-auto mt-24">
      <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start">
  
          <div class="relative w-32 h-32 flex-shrink-0">
              <img class="absolute left-0 top-0 w-full h-full object-cover object-center transition duration-50" loading="lazy" src="https://via.placeholder.com/150">
          </div>
  
          <div class="flex flex-col gap-2 py-2">
  
              <p class="text-xl font-bold">Post title</p>
  
              <p class="text-gray-500">
                  Description of your post/article,
                  Description of your post/article,
              </p>
  
              <span class="flex items-center justify-start text-gray-500">
                  <svg class="w-4 h-4 mr-1 mt-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                  </svg>
                  <a href="amitpachange.com" target="_blank">amitpachange.com</a>
              </span>
  
          </div>
  
      </div>
  
  </div> --}}
{{-- 
  <section>
    <!-- Container -->
    <div class="mx-auto w-full px-5 py-12 md:px-10 md:py-16 lg:py-16 bg-gray-700">
      <!-- Component -->
      <div class="flex flex-col items-center">
        <!-- Heading Content -->
        <div class="">
          <h2 class="mb-5 text-3xl font-bold md:text-5xl w-full max-w-3xl text-center text-white"> Descargas</h2>
        </div>
        <div class="w-full flex gap-10 flex-col items-center justify-center lg:flex-row">
          <!-- Item -->
          <div class="bg-gray-100 shadow-md rounded my-6 overflow-hidden w-full max-w-sm">
            <table class="w-full">
              <thead>
                <tr class="border-b border-gray-300">
                  <th colSpan="2" class="py-6 text-center text-lg w-full"> Documentos </th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-gray-300">
                  <td class="py-3 px-6 md:px-122 text-left whitespace-nowrap">
                    <div class="flex items-center">
                      <span class="font-semibold">Plano del Municipio.</span>
                    </div>
                  </td>
                  <td class="py-3 px-6 md:px-12 text-center">
                    <div class="relative flex gap-3 items-center justify-center">
                      <span class="font-semibold">Yes</span>
                      <div class="absolute -top-3 -left-6 md:-left-12 bg-gray-300 h-20 w-[1px]"></div>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          <!-- Item -->

        </div>
      </div>
    </div>
  </section> --}}
  <h2 class=" m-auto w-4/5  text-center mt-12 text-3xl font-bold text-gray-900">Requisitos para tramites</h2>

    <div class="w-4/5 m-auto bg-white border border-gray-200 divide-y divide-gray-200 rounded-xl my-12">
      <details class="p-6 group" open>
        <summary class="flex items-center justify-between cursor-pointer">
            <h5 class="text-lg font-medium text-gray-900">
                Inscripción catastral
            </h5>
            <span class="relative flex-shrink-0 ml-1.5 w-5 h-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
        </summary>
        <div class="mt-4 leading-relaxed text-gray-700">
            <ol class="list-decimal pl-6">
                <li>Copia de la cédula de identidad</li>
                <li>Copia del título o documento de propiedad</li>
                <li>Una carpeta manila tamaño oficio con gancho</li>
            </ol>
        </div>
    </details>
    
  
      {{-- <details class="p-6 group">
          <summary class="flex items-center justify-between cursor-pointer">
              <h5 class="text-lg font-medium text-gray-900">
....... 
              </h5>
  
              <span class="relative flex-shrink-0 ml-1.5 w-5 h-5">
                  <svg xmlns="http://www.w3.org/2000/svg"
                      class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
  
                  <svg xmlns="http://www.w3.org/2000/svg"
                      class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
              </span>
          </summary> --}}
  
          {{-- <p class="mt-4 leading-relaxed text-gray-700">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis
              molestias culpa in, recusandae laboriosam neque aliquid libero nesciunt
              voluptate dicta quo officiis explicabo consequuntur distinctio corporis
              earum similique!
          </p>
      </details>
  
      <details class="p-6 group">
          <summary class="flex items-center justify-between cursor-pointer">
              <h5 class="text-lg font-medium text-gray-900">
                ......
              </h5>
  
              <span class="relative flex-shrink-0 ml-1.5 w-5 h-5">
                  <svg xmlns="http://www.w3.org/2000/svg"
                      class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
  
                  <svg xmlns="http://www.w3.org/2000/svg"
                      class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
              </span>
          </summary>
  
          <p class="mt-4 leading-relaxed text-gray-700">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis
              molestias culpa in, recusandae laboriosam neque aliquid libero nesciunt
              voluptate dicta quo officiis explicabo consequuntur distinctio corporis
              earum similique!
          </p>
      </details> --}}
  </div>




  </main><!-- end main -->

  <!-- =========={ FOOTER }==========  -->
  <footer class="bg-gray-800 text-gray-400">
    <!--Footer content-->
    <!--Start footer copyright-->
    <div class="footer-dark">
      <div class="container py-4 border-t border-gray-200 border-opacity-10">
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