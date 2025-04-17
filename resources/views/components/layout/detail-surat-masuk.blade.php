<div class="flex justify-center">
    <tr class="hover:bg-slate-50 cursor-pointer" data-toggle="modal" data-target="#modalDetailSurat">
        <td class="p-4">
            <p class="text-sm font-bold">
                122
            </p>
        </td>
        <td class="p-4">
            <p class="text-sm">
                0346/TU/2025
            </p>
        </td>
        <td class="p-4">
            <p class="text-sm">
                1 Maret 2025
            </p>
        </td>
        <td class="p-4">
            <p class="text-sm">
                Universitas Multi Data Palembang
            </p>
        </td>
        <td class="p-4">
            <p class="text-sm">
                19 Oktober 1945
            </p>
        </td>
        <td class="p-4">
            <p class="text-sm">
                0139/R/UMDP/2027
            </p>
        </td>
        <td class="p-4">
            <p class="text-sm">
                Permohonan Beasiswa
            </p>
        </td>
    </tr>

    <div class="fixed antialiased inset-0 bg-slate-950/50 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
        id="modalDetailSurat" aria-hidden="true">

        <div class="bg-white rounded-lg w-10/12 lg:w-8/12 transition-transform duration-300 ease-out scale-100">
            <div class="pt-4 px-4 flex justify-between items-start overflow-auto min-h-[550px]">
                <div class="flex flex-col gap-2 w-full">
                    <div class="flex flex-col">
                        @include('components.layout.tabs')
                    </div>
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
            {{-- <div class="p-4">
                <div class="flex flex-row gap-3">
                    <div class="mb-4 space-y-1.5 w-1/2">
                        @include('components.base.input-surat', [
                            'label' => 'Nomor Surat',
                            'placeholder' => 'Masukkan Nomor Surat',
                        ])
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.base.datepicker', [
                            'label' => 'Tanggal Surat',
                            'placeholder' => 'Pilih Tanggal Surat',
                            'id' => 'tanggal_surat',
                        ])
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.base.datepicker', [
                            'label' => 'Tanggal Terima',
                            'placeholder' => 'Pilih Tanggal Terima',
                            'id' => 'tanggal_terima',
                        ])
                    </div>
                </div>
                <div class="flex flex-row gap-3 items-center">
                    <div class="mb-4 space-y-1.5 w-1/2">
                        @include('components.base.input-surat', [
                            'label' => 'Pengirim',
                            'placeholder' => 'Masukkan Pengirim Surat',
                        ])
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.base.collapse', [
                            'label' => 'Klasifikasi',
                            'value' => ['Umum', 'Pengaduan', 'Permintaan Informasi'],
                        ])
                    </div>
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.base.collapse', [
                            'label' => 'Sifat',
                            'value' => ['Rahasia', 'Penting', 'Segera', 'Rutin'],
                        ])
                    </div>
                </div>
                <div class="space-y-1.5 mb-4">
                    @include('components.base.textarea-surat', [
                        'label' => 'Perihal',
                        'placeholder' => 'Masukkan Perihal Surat',
                    ])
                </div>
                <div class="space-y-1.5">
                    @include('components.base.file-picker', [
                        'label' => 'Pilih Dokumen Surat',
                        'placeholder' => 'Pilih Dokumen',
                    ])
                </div>

            </div> --}}

            <div class=" px-4 pb-4 flex  justify-end gap-2">
                @include('components.base.tombol-simpan-surat')
            </div>
        </div>
    </div>
</div>
