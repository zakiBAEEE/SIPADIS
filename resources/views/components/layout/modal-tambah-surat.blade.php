<div class="flex justify-center">
    <button type="button" data-toggle="modal" data-target="#modalTambahSurat"
        class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-green-500 border-slate-300 text-slate-50 hover:bg-green-700 hover:border-slate-700">
        Tambah</button>
    <div class="fixed antialiased inset-0 bg-slate-950/50 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
        id="modalTambahSurat" aria-hidden="true">
        <div class="bg-white rounded-lg w-10/12 lg:w-8/12 transition-transform duration-300 ease-out scale-100">
            <div class="pt-4 px-4 flex justify-between items-start">
                <div class="flex flex-col gap-2 w-full">
                    <div class="flex flex-col">
                        <h1 class="text-xl text-gray-600 font-bold">Entry Surat Masuk</h1>
                    </div>
                    <hr class="w-full border-t border-gray-300" />
                </div>
                <button type="button" data-dismiss="modal" aria-label="Close"
                    class="inline-grid place-items-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none data-[shape=circular]:rounded-full text-sm min-w-[34px] min-h-[34px] rounded-full bg-transparent border-transparent text-slate-200-foreground hover:bg-slate-200/10 hover:border-slate-200/10 shadow-none hover:shadow-none outline-none absolute right-2 top-2">
                    <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-5 w-5">
                        <path
                            d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('components.form.form-surat-masuk')
                {{-- <div class=" px-4 pb-2">
                @include('components.base.file-picker', [
                    'label' => 'Pilih Dokumen Surat',
                    'placeholder' => 'Pilih Dokumen',
                    'name' => 'file_path'
                ])
            </div> --}}
                {{-- <div class="px-4 pb-4">
                <label class="font-sans text-sm text-slate-800 dark:text-white font-bold mb-2">Upload Surat</label>
                <div class="relative w-full">
                    <input type="file" name="file_path" />
                </div>
            </div> --}}
                <div class="px-4 pb-4">
                    <label class="block font-sans text-sm text-slate-800 dark:text-white font-bold mb-2">
                        Upload Surat
                    </label>

                    <div id="drop-area"
                        class="group relative w-full flex flex-col items-center justify-center px-4 py-10 border-2 border-dashed rounded-lg cursor-pointer transition-colors
                         border-slate-300 bg-white text-slate-500 hover:border-blue-400 hover:bg-blue-50
                         dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:border-blue-500 dark:hover:bg-slate-700">
                        <input type="file" name="file_path" id="fileInput"
                            class="absolute inset-0 opacity-0 z-10 cursor-pointer" />

                        <div class="flex flex-col items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-8 w-8 mb-2 text-slate-400 group-hover:text-blue-500 dark:group-hover:text-blue-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M4 12l8-8m0 0l8 8m-8-8v12" />
                            </svg>
                            <p id="drop-text" class="text-sm">Klik atau tarik file ke sini</p>
                        </div>
                    </div>
                </div>
                <div class=" px-4 pb-4 flex justify-end gap-2">
                    @include('components.base.tombol-simpan-surat')
                </div>
            </form>
        </div>
    </div>
</div>
