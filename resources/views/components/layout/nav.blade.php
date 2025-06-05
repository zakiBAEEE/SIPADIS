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
                    class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">
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
                <div data-toggle="collapse" data-target="#suratmasukcollapselist" aria-expanded="false"
                    aria-controls="sidebarCollapseList"
                    class="flex items-center justify-between min-w-60 cursor-pointer py-1.5 px-2.5 rounded-md align-middle transition-all duration-300 ease-in text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">
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
                        Surat Masuk
                    </span>

                    <span data-icon
                        class="grid place-items-center shrink-0 transition-transform duration-300 ease-in-out">
                        <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-4 w-4 stroke-[1.5]">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
                <div class="overflow-hidden transition-[max-height] duration-300 ease-in-out max-h-0"
                    id="suratmasukcollapselist">
                    <ul class="flex flex-col gap-0.5 min-w-60">
                        <li>
                            <a href="{{ route('surat.tambah') }}"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">Tambah
                                Surat</a>
                        </li>
                        <li>
                            <a href="{{ route('surat.index', ['with_disposisi' => true]) }}"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">Dengan
                                Disposisi</a>
                        </li>
                        <li>
                            <a href="{{ route('surat.index', ['with_disposisi' => false]) }}"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">Tanpa
                                Disposisi</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- ====================================================== --}}

            <li>
                <div data-toggle="collapse" data-target="#agendasuratcollapselist" aria-expanded="false"
                    aria-controls="sidebarCollapseList"
                    class="flex items-center justify-between min-w-60 cursor-pointer py-1.5 px-2.5 rounded-md align-middle transition-all duration-300 ease-in text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">
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
                        Agenda Surat
                    </span>

                    <span data-icon
                        class="grid place-items-center shrink-0 transition-transform duration-300 ease-in-out">
                        <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-4 w-4 stroke-[1.5]">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
                <div class="overflow-hidden transition-[max-height] duration-300 ease-in-out max-h-0"
                    id="agendasuratcollapselist">
                    <ul class="flex flex-col gap-0.5 min-w-60">
                        <li>
                            <a href="{{ route('surat.agendaKbu') }}"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">KBU</a>
                        </li>
                        <li>
                            <a href="{{ route('surat.agendaKepala') }}"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">Kepala
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <hr class="-mx-3 my-3 border-slate-200" />
            <li>
                <div data-toggle="collapse" data-target="#organisasicollapselist" aria-expanded="false"
                    aria-controls="sidebarCollapseList"
                    class="flex items-center justify-between min-w-60 cursor-pointer py-1.5 px-2.5 rounded-md align-middle transition-all duration-300 ease-in text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">
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
                            xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-4 w-4 stroke-[1.5]">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
                <div class="overflow-hidden transition-[max-height] duration-300 ease-in-out max-h-0"
                    id="organisasicollapselist">
                    <ul class="flex flex-col gap-0.5 min-w-60">
                        <li>
                            <a href="/pegawai"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">Pegawai</a>
                        </li>
                        <li>
                            <a href="/tim-kerja"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">Tim
                                Kerja</a>
                        </li>
                        <li>
                            <a href="/lembaga"
                                class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-200 focus:bg-slate-200 focus:text-slate-800">Lembaga</a>
                        </li>
                    </ul>
                </div>
            </li>
            <hr class="-mx-3 my-3 border-slate-200" />
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf {{-- Token CSRF untuk keamanan, wajib untuk request POST --}}
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                        {{-- Mencegah aksi default link & submit form --}}
                        class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-red-500 hover:bg-red-500/10 hover:text-error focus:bg-error/10 focus:text-error">
                        <span class="grid place-items-center shrink-0 me-2.5">
                            <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor"
                                class="h-[18px] w-[18px]">
                                <path d="M12 12H19M19 12L16 15M19 12L16 9" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M19 6V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V18"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        Logout
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
