   <nav class="bg-white pt-6 shadow-md border-b border-gray-200">
       <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
           <div class="flex h-16 mb-6 items-center justify-between">
               <div class="flex w-full items-center justify-between">
                   <div class="flex-shrink-0">
                       <a href="/"><img class="h-14 w-auto" src="{{ asset('img/logodesalerep.png') }}"
                               alt="logo-desa-lerep" />
                       </a>
                   </div>

                   <div class="hidden md:block">
                       <div class="flex items-center space-x-8">
                           <a href="/profil_lengkap_desa"
                               class="{{ request()->is('profil_lengkap_desa') ? 'bg-orange-100 text-[#E5770D]' : 'text-[#E5770D] hover:bg-orange-100 hover:text-[#cf650a]' }} rounded-md px-3 py-2 text-lg font-semibold transition"
                               aria-current="page">
                               Profile Desa
                           </a>

                           <a href="/daftar_wisata"
                               class="{{ request()->routeIs('daftar_wisata', 'wisata.show') ? 'bg-orange-100 text-[#E5770D]' : 'text-[#E5770D] hover:bg-orange-100 hover:text-[#cf650a]' }} rounded-md px-3 py-2 text-lg font-semibold transition">
                               Daftar Wisata Desa
                           </a>

                           <a href="/paket_wisata"
                               class="{{ request()->is('paket_wisata') ? 'bg-orange-100 text-[#E5770D]' : 'text-[#E5770D] hover:bg-orange-100 hover:text-[#cf650a]' }} rounded-md px-3 py-2 text-lg font-semibold transition">
                               Paket Wisata
                           </a>

                           <a href="/kontak"
                               class="{{ request()->is('kontak') ? 'bg-orange-100 text-[#E5770D]' : 'text-[#E5770D] hover:bg-orange-100 hover:text-[#cf650a]' }} rounded-md px-3 py-2 text-lg font-semibold transition">
                               Kontak
                           </a>
                       </div>
                   </div>


                   <div class="-mr-2 flex md:hidden">
                       <button type="button" @click="isOpen = !isOpen"
                           class="relative inline-flex items-center justify-center rounded-md bg-orange-100 p-2 text-[#E5770D] hover:bg-orange-200 hover:text-[#cf650a] focus:outline-none focus:ring-2 focus:ring-[#E5770D] focus:ring-offset-2 focus:ring-offset-orange-100 transition"
                           aria-controls="mobile-menu" aria-expanded="false">
                           <span class="absolute -inset-0.5"></span>
                           <span class="sr-only">Open main menu</span>

                           <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none"
                               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                               data-slot="icon">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                           </svg>

                           <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none"
                               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                               data-slot="icon">
                               <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                           </svg>
                       </button>
                   </div>
               </div>
           </div>
           <div x-show="isOpen" class="md:hidden" id="mobile-menu">
               <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                   <a href="/"
                       class="{{ request()->is('/') ? 'bg-orange-100 text-[#E5770D]' : 'text-[#E5770D] hover:bg-orange-100 hover:text-[#cf650a]' }} block rounded-md px-3 py-2 text-base font-medium transition"
                       aria-current="page">
                       Profile Desa
                   </a>

                   <a href="/daftar_wisata"
                       class="{{ request()->is('daftar_wisata') ? 'bg-orange-100 text-[#E5770D]' : 'text-[#E5770D] hover:bg-orange-100 hover:text-[#cf650a]' }} block rounded-md px-3 py-2 text-base font-medium transition">
                       Daftar Wisata
                   </a>

                   <a href="/paket_wisata"
                       class="{{ request()->is('paket_wisata') ? 'bg-orange-100 text-[#E5770D]' : 'text-[#E5770D] hover:bg-orange-100 hover:text-[#cf650a]' }} block rounded-md px-3 py-2 text-base font-medium transition">
                       Paket Wisata
                   </a>

                   <a href="/kontak"
                       class="{{ request()->is('kontak') ? 'bg-orange-100 text-[#E5770D]' : 'text-[#E5770D] hover:bg-orange-100 hover:text-[#cf650a]' }} block rounded-md px-3 py-2 text-base font-medium transition">
                       Kontak
                   </a>
               </div>
           </div>

   </nav>
