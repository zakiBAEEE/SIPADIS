<div class="flex justify-center">
    <button type="button" data-toggle="modal" data-target="#exampleModalForm"
        class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-green-500 border-slate-300 text-slate-50 hover:bg-green-700 hover:border-slate-700">
        Tambah</button>

    <div class="fixed antialiased inset-0 bg-slate-950/50 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
        id="exampleModalForm" aria-hidden="true">

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
            <div class="p-4">
                <div class="flex flex-row gap-3">
                    <div class="mb-4 space-y-1.5 w-1/2">
                        @include('components.input-surat', [
                            'label' => 'Nomor Surat',
                            'placeholder' => 'Masukkan Nomor Surat',
                        ])
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.datepicker', [
                            'label' => 'Tanggal Surat',
                            'placeholder' => 'Pilih Tanggal Surat',
                            'id' => 'tanggal_surat',
                        ])
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.datepicker', [
                            'label' => 'Tanggal Terima',
                            'placeholder' => 'Pilih Tanggal Terima',
                            'id' => 'tanggal_terima',
                        ])
                    </div>
                </div>
                <div class="flex flex-row gap-3 items-center">
                    <div class="mb-4 space-y-1.5 w-1/2">
                        @include('components.input-surat', [
                            'label' => 'Pengirim',
                            'placeholder' => 'Masukkan Pengirim Surat',
                        ])
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.collapse', [
                            'label' => 'Klasifikasi',
                            'value' => ['Umum', 'Pengaduan', 'Permintaan Informasi'],
                        ])
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.collapse', [
                            'label' => 'Sifat',
                            'value' => ['Rahasia', 'Penting', 'Segera', 'Rutin'],
                        ])
                    </div>
                </div>
                <div class="space-y-1.5">
                    <label for="email"
                        class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">Perihal Surat</label>
                    <textarea rows="8" placeholder="Perihal Surat"
                        class="peer block w-full resize-none rounded-md border border-slate-200 bg-transparent p-2.5 text-sm leading-none text-slate-800 outline-none ring ring-transparent transition-all duration-300 ease-in placeholder:text-slate-600/60 hover:border-slate-800 hover:ring-slate-800/10 focus:border-slate-800 focus:outline-none focus:ring-slate-800/10 disabled:pointer-events-none disabled:opacity-50 dark:text-white"></textarea>

                </div>
            </div>
            <div class=" px-4 pb-4 flex  justify-end gap-2">
                @include('components.tombol-simpan-surat')
            </div>
        </div>
    </div>
</div>
