<div class="relative tab-group">
    <div class="flex border-b border-slate-200 relative" role="tablist">
        <div
            class="absolute bottom-0 h-0.5 bg-slate-800 transition-transform duration-300 transform scale-x-0 translate-x-0 tab-indicator">
        </div>

        <a href="#"
            class="tab-link text-sm active inline-block py-2 px-4 text-slate-800 transition-colors duration-300 mr-1"
            data-tab-target="tab1-group4">
            Metadata
        </a>
        <a href="#"
            class="tab-link text-sm inline-block py-2 px-4 text-slate-800 transition-colors duration-300 mr-1"
            data-tab-target="tab2-group4">
            Disposisi
        </a>
    </div>
    <div class="mt-4 tab-content-container">
        <div id="tab1-group4" class="tab-content text-slate-800 block">
            <div class="p-4">
                <div class="flex flex-row gap-3">
                    <div class="mb-4 space-y-1.5 w-1/2">
                        <div>
                            <label for="email"
                                class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2"> Nomor
                                Surat</label>
                            <div class="relative w-full">
                                <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                    id="modal_nomor_surat">
                                    0139/R/UMDP/2027 </h6>
                            </div>
                        </div>

                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        <div>
                            <label for="email"
                                class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2"> Tanggal
                                Surat</label>
                            <div class="relative w-full">
                                <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                    id="modal_tgl_surat">
                                    19 Oktober 2027 </h6>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        <div>
                            <label for="email"
                                class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2"> Tanggal
                                Terima</label>
                            <div class="relative w-full">
                                <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                    id="modal_tgl_terima">
                                    1 Maret 2027 </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row gap-3 items-center">
                    <div class="mb-4 space-y-1.5 w-1/2">
                        <div>
                            <label for="email"
                                class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
                                Pengirim</label>
                            <div class="relative w-full">
                                <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                    id="modal_pengirim">
                                    Universitas Multi Data Palembang </h6>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        <div>
                            <label for="email"
                                class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
                                Klasifikasi</label>
                            <div class="relative w-full">
                                <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                    id="modal_klasifikasi">
                                    Umum </h6>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        <div>
                            <label for="email"
                                class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2"> Sifat</label>
                            <div class="relative w-full">
                                <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                    id="modal_sifat">
                                    Rahasia </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    <div>
                        <label for="email" class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
                            Perihal</label>
                        <div class="relative w-full">
                            <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                id="modal_perihal">
                                Permintaan Beasiswa </h6>
                        </div>
                    </div>
                </div>
                <div class="space-y-1.5">
                    @include('components.base.file-picker', [
                        'label' => 'Pilih Dokumen Surat',
                        'placeholder' => 'Pilih Dokumen',
                    ])
                </div>

            </div>
        </div>
        <div id="tab2-group4" class="tab-content text-slate-800 hidden">
            <p>We're not always in the position that we want to be at. We're constantly growing. We're constantly making
                mistakes. We're constantly trying to express ourselves and actualize our dreams.</p>
        </div>
    </div>
</div>
