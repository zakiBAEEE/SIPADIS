<div class="w-full rounded-lg border shadow-sm bg-white border-slate-200 shadow-slate-950/5 max-w-[280px] h-screen">
    <a href="{{ route('surat.home') }}" class="rounded m-2 mx-4 mt-4 h-max mb-4 flex flex-row gap-5 items-center">
        <img src="{{ asset('images/logo-lldikti.jpg') }}" alt="" class="h-10 w-auto">
        <p class="font-sans antialiased text-current text-2xl font-semibold">SIPADIS</p>
    </a>

    <hr class="-mx-3 border-slate-200" />

    <div>
        @include('components.layout.user')
    </div>
    <hr class="-mx-3 mt-3 border-slate-200" />
    <div class="w-full h-max rounded p-3">
        <ul class="flex flex-col gap-0.5 min-w-60">
            <li>
                <a href="{{ route('surat.home') }}"
                    class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-slate-600 hover:text-slate-800 dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                    <span class="grid place-items-center shrink-0 me-2.5">
                        <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 9.75L12 3l9 6.75M4.5 10.5v8.25a.75.75 0 00.75.75h4.5v-5.25a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V19.5h4.5a.75.75 0 00.75-.75V10.5"
                                stroke="currentColor" />
                        </svg>
                    </span>
                    Home
                </a>

            </li>
            <li>
                <a href="/surat-masuk"
                    class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-slate-600 hover:text-slate-800 dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                    <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em"
                            stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            color="currentColor" class="h-[18px] w-[18px]">
                            <path d="M7 9L12 12.5L17 9" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M2 17V7C2 5.89543 2.89543 5 4 5H20C21.1046 5 22 5.89543 22 7V17C22 18.1046 21.1046 19 20 19H4C2.89543 19 2 18.1046 2 17Z"
                                stroke="currentColor"></path>
                        </svg>
                    </span>Surat Masuk
                </a>

            </li>
            <li>
                <a href="/surat/cetak-agenda"
                    class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-slate-600 hover:text-slate-800 dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                    <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em"
                            stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            color="currentColor" class="h-[18px] w-[18px]">
                            <path d="M7 6L17 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M7 9L17 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M9 17H15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M3 12H2.6C2.26863 12 2 12.2686 2 12.6V21.4C2 21.7314 2.26863 22 2.6 22H21.4C21.7314 22 22 21.7314 22 21.4V12.6C22 12.2686 21.7314 12 21.4 12H21M3 12V2.6C3 2.26863 3.26863 2 3.6 2H20.4C20.7314 2 21 2.26863 21 2.6V12M3 12H21"
                                stroke="currentColor"></path>
                        </svg>
                    </span>Cetak Agenda Surat
                </a>
            </li>
            <li>
                <a href="/surat/cetak-agenda-terima"
                    class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-slate-600 hover:text-slate-800 dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                    <span class="grid place-items-center shrink-0 me-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="20px" height="20px"
                            viewBox="0 0 32 32" version="1.1">

                            <path
                                d="M29.064 19.701c-0.421-0.177-0.91-0.28-1.423-0.28-0.577 0-1.123 0.13-1.611 0.362l0.023-0.010-5.778 2.595c0.003-0.047 0.026-0.087 0.026-0.134-0.015-1.371-1.129-2.476-2.502-2.476-0.069 0-0.137 0.003-0.204 0.008l0.009-0.001h-3.783l-4.76-1.395c-0.062-0.020-0.133-0.031-0.207-0.031-0.001 0-0.003 0-0.004 0h-2.169v-0.757c-0-0.414-0.336-0.75-0.75-0.75h-3.883c-0.414 0-0.75 0.336-0.75 0.75v0 12.208c0 0.414 0.336 0.75 0.75 0.75h3.883c0.414-0 0.75-0.336 0.75-0.75v0-1.005c1.818 0.284 3.445 0.742 4.987 1.367l-0.149-0.054c1.15 0.416 2.478 0.656 3.862 0.656 0.007 0 0.014 0 0.021-0h-0.001c0.005 0 0.011 0 0.017 0 1.604 0 3.133-0.319 4.528-0.898l-0.078 0.029c1.243-0.553 2.298-1.136 3.297-1.799l-0.082 0.051c0.338-0.209 0.674-0.418 1.014-0.619 1.633-0.967 2.945-1.816 4.129-2.672 0.579-0.412 1.083-0.819 1.563-1.253l-0.014 0.013c0.373-0.302 0.671-0.682 0.871-1.116l0.008-0.019c0.031-0.079 0.048-0.17 0.048-0.266 0-0.057-0.006-0.112-0.018-0.165l0.001 0.005c-0.146-1.017-0.755-1.866-1.603-2.337l-0.016-0.008zM5.181 29.041h-2.383v-10.709h2.383zM28.719 22.541c-0.412 0.37-0.86 0.729-1.328 1.062l-0.047 0.032c-1.143 0.826-2.418 1.65-4.014 2.596-0.348 0.205-0.691 0.418-1.037 0.631-0.854 0.573-1.837 1.12-2.864 1.586l-0.13 0.053c-1.152 0.474-2.49 0.748-3.892 0.748-1.203 0-2.359-0.203-3.436-0.575l0.074 0.022c-1.555-0.648-3.363-1.145-5.248-1.407l-0.117-0.013v-7.436h2.062l4.76 1.395c0.062 0.020 0.133 0.031 0.207 0.031 0.001 0 0.003 0 0.004 0h3.89c0.883 0 1.197 0.521 1.197 0.969s-0.314 0.969-1.197 0.969h-6.809c-0.414 0-0.75 0.336-0.75 0.75s0.336 0.75 0.75 0.75v0h7.781c0.001 0 0.003 0 0.004 0 0.11 0 0.214-0.024 0.307-0.068l-0.004 0.002 7.795-3.5c0.288-0.132 0.625-0.209 0.98-0.209 0.265 0 0.52 0.043 0.758 0.122l-0.017-0.005c0.383 0.23 0.658 0.604 0.752 1.046l0.002 0.011c-0.136 0.159-0.278 0.302-0.429 0.435l-0.005 0.004zM29.951 1.506h-3.883c-0.414 0-0.75 0.336-0.75 0.75v0 1.011c-1.814-0.279-3.443-0.74-4.981-1.374l0.143 0.052c-1.159-0.415-2.496-0.654-3.89-0.654-1.606 0-3.138 0.319-4.536 0.896l0.079-0.029c-1.242 0.552-2.297 1.136-3.295 1.8l0.081-0.051c-0.337 0.208-0.674 0.417-1.014 0.618-1.646 0.975-2.958 1.823-4.127 2.671-0.576 0.408-1.078 0.812-1.555 1.244l0.014-0.012c-0.377 0.304-0.678 0.686-0.882 1.123l-0.008 0.019c-0.032 0.081-0.051 0.175-0.051 0.273 0 0.056 0.006 0.11 0.017 0.162l-0.001-0.005c0.147 1.016 0.756 1.864 1.604 2.336l0.016 0.008c0.377 0.186 0.82 0.295 1.289 0.295 0.013 0 0.026-0 0.039-0l-0.002 0c0.612-0.008 1.191-0.142 1.715-0.377l-0.027 0.011 5.778-2.597c-0.003 0.047-0.026 0.088-0.026 0.135 0.014 1.371 1.129 2.477 2.502 2.477 0.069 0 0.136-0.003 0.204-0.008l-0.009 0.001h3.783l4.76 1.395c0.062 0.019 0.134 0.030 0.208 0.030 0.001 0 0.002 0 0.003 0h2.168v0.757c0 0.414 0.336 0.75 0.75 0.75h3.883c0.414-0 0.75-0.336 0.75-0.75v0-12.207c-0-0.414-0.336-0.75-0.75-0.75v0zM23.258 12.206l-4.76-1.394c-0.062-0.019-0.134-0.030-0.208-0.030-0.001 0-0.002 0-0.003 0h-3.89c-0.883 0-1.196-0.522-1.196-0.97s0.313-0.97 1.196-0.97h6.809c0.414 0 0.75-0.336 0.75-0.75s-0.336-0.75-0.75-0.75v0h-7.782c-0.111 0-0.217 0.024-0.312 0.067l0.005-0.002-7.793 3.503c-0.287 0.132-0.624 0.21-0.978 0.21-0.266 0-0.522-0.043-0.76-0.124l0.017 0.005c-0.382-0.229-0.657-0.604-0.751-1.045l-0.002-0.011c0.136-0.159 0.278-0.303 0.431-0.435l0.005-0.004c0.413-0.373 0.861-0.732 1.33-1.063l0.045-0.030c1.132-0.821 2.407-1.646 4.013-2.596 0.348-0.207 0.693-0.421 1.038-0.634 0.854-0.573 1.836-1.119 2.864-1.583l0.129-0.052c1.153-0.474 2.491-0.75 3.894-0.75 1.202 0 2.357 0.202 3.433 0.575l-0.074-0.022c1.554 0.647 3.362 1.145 5.245 1.409l0.118 0.014v7.434zM29.201 13.713h-2.383v-10.707h2.383z" />
                        </svg>
                    </span>Cetak Agenda Terima
                </a>
            </li>
            <hr class="-mx-3 my-3 border-slate-200" />
            <li>
                <div data-toggle="collapse" data-target="#sidebarCollapseList" aria-expanded="false"
                    aria-controls="sidebarCollapseList"
                    class="flex items-center justify-between min-w-60 cursor-pointer py-1.5 px-2.5 rounded-md align-middle transition-all duration-300 ease-in text-slate-600 hover:text-slate-800 dark:text-slate-300 dark:hover:text-white hover:bg-slate-200 dark:hover:bg-slate-700 focus:bg-slate-200 dark:focus:bg-slate-700 focus:text-slate-800 dark:focus:text-white">
                    <span class="flex items-center">
                        <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-4 w-4 me-3">
                            <path
                                d="M7 12.5C7.27614 12.5 7.5 12.2761 7.5 12C7.5 11.7239 7.27614 11.5 7 11.5C6.72386 11.5 6.5 11.7239 6.5 12C6.5 12.2761 6.72386 12.5 7 12.5Z"
                                fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M12 12.5C12.2761 12.5 12.5 12.2761 12.5 12C12.5 11.7239 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.7239 11.5 12C11.5 12.2761 11.7239 12.5 12 12.5Z"
                                fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M17 12.5C17.2761 12.5 17.5 12.2761 17.5 12C17.5 11.7239 17.2761 11.5 17 11.5C16.7239 11.5 16.5 11.7239 16.5 12C16.5 12.2761 16.7239 12.5 17 12.5Z"
                                fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Organisasi
                    </span>

                    <span data-icon
                        class="grid place-items-center shrink-0 transition-transform duration-300 ease-in-out">
                        <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" color="currentColor"
                            class="h-4 w-4 stroke-[1.5] dark:stroke-slate-300">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
                <div class="overflow-hidden transition-[max-height] duration-300 ease-in-out max-h-0"
                    id="sidebarCollapseList">
                    <ul class="flex flex-col gap-0.5 min-w-60">
                        <li>
                            <a href="/pegawai"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 dark:text-slate-300 dark:hover:text-white hover:bg-slate-200 dark:hover:bg-slate-700 focus:bg-slate-200 dark:focus:bg-slate-700 focus:text-slate-800 dark:focus:text-white">Pegawai</a>
                        </li>
                        <li>
                            <a href="/tim-kerja"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 dark:text-slate-300 dark:hover:text-white hover:bg-slate-200 dark:hover:bg-slate-700 focus:bg-slate-200 dark:focus:bg-slate-700 focus:text-slate-800 dark:focus:text-white">Tim
                                Kerja</a>
                        </li>
                        <li>
                            <a href="/lembaga"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 dark:text-slate-300 dark:hover:text-white hover:bg-slate-200 dark:hover:bg-slate-700 focus:bg-slate-200 dark:focus:bg-slate-700 focus:text-slate-800 dark:focus:text-white">Lembaga</a>
                        </li>
                    </ul>
                </div>
            </li>
            <hr class="-mx-3 my-3 border-slate-200" />
            <li
                class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent dark:hover:text-white dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70 text-red-500 hover:bg-red-500/10 hover:text-error focus:bg-error/10 focus:text-error">
                <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em"
                        stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        color="currentColor" class="h-[18px] w-[18px]">
                        <path d="M12 12H19M19 12L16 15M19 12L16 9" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M19 6V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V18"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>Logout
            </li>
        </ul>
    </div>
</div>
