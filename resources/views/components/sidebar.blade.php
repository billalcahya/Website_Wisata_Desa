  <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
      aria-controls="sidebar-multi-level-sidebar" type="button"
      class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
      <span class="sr-only">Open sidebar</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" fill-rule="evenodd"
              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
          </path>
      </svg>
  </button>

  <aside id="sidebar-multi-level-sidebar"
      class="fixed top-0 left-0 z-40 max-w-screen-2xl h-screen transition-transform -translate-x-full sm:translate-x-0"
      aria-label="Sidebar">
      <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-00">
          <div class="px-6 py-4 flex flex-col items-center border-b">
              <img src="{{ asset('img/logodesalerep.png') }}" alt="Logo DWL" class="w-50 h-50 mb-6 mt-6" />
              <p class="text-sm text-gray-400">ADMIN</p>
          </div>
          <ul class="space-y-2 font-medium">
              <li>
                  <a href="{{ route('adminuser.index') }}"
                      class=" flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200 group">
                      <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-grey"
                          aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                          <path
                              d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                      </svg>
                      <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('packages.index') }}" <a href="#"
                      class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200 group">
                      <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-700"
                          xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                          viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <path d="M12 3v12m0 0l-4-4m4 4l4-4" />
                          <path d="M5 21h14a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2z" />
                      </svg>
                      <span class="flex-1 ms-3 whitespace-nowrap">Upload Paket Wisata</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('wisata.index') }}"
                      class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200 group">
                      <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-700"
                          xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                          viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <path d="M21 10c0 6-9 13-9 13s-9-7-9-13a9 9 0 1 1 18 0z" />
                          <circle cx="12" cy="10" r="3" />
                      </svg>
                      <span class="flex-1 ms-3 whitespace-nowrap">Upload Daftar Wisata</span>
                  </a>
              </li>
              <li>
                  <a href="{{ url('/logout') }}"
                      class=" flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200 group">
                      <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-grey"
                          aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                          stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                          <polyline points="16 17 21 12 16 7" />
                          <line x1="21" y1="12" x2="9" y2="12" />
                      </svg>
                      <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                  </a>
              </li>
          </ul>
      </div>
  </aside>
