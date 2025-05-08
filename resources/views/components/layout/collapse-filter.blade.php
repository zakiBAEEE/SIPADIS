{{-- <div class="flex-col transition-[max-height] duration-300 ease-in-out max-h-0 mt-1" id = "collapseFilterSurat">
    <form action="{{ route('surat.index') }}" method="GET">
        <div class="px-4 py-2">
            <div class="mb-4 space-y-1.5 w-full">
                @include('components.base.input-surat', [
                    'label' => 'Nomor Agenda',
                    'placeholder' => 'Masukkan Nomor Agenda',
                    'name' => 'nomor_agenda',
                ])
            </div>
            <div class="flex flex-row gap-3">
                <div class="mb-4 space-y-1.5 w-1/2">
                    @include('components.base.input-surat', [
                        'label' => 'Nomor Surat',
                        'placeholder' => 'Masukkan Nomor Surat',
                        'name' => 'nomor_surat',
                    ])
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    @include('components.base.datepicker', [
                        'label' => 'Tanggal Surat',
                        'placeholder' => 'Pilih Tanggal Surat',
                        'id' => 'tanggal_surat',
                        'name' => 'tanggal_surat',
                    ])
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    @include('components.base.datepicker', [
                        'label' => 'Tanggal Terima',
                        'placeholder' => 'Pilih Tanggal Terima',
                        'id' => 'tanggal_terima',
                        'name' => 'tanggal_terima',
                    ])
                </div>
            </div>
            <div class="flex flex-row gap-3 items-center">
                <div class="mb-4 space-y-1.5 w-1/2">
                    @include('components.base.input-surat', [
                        'label' => 'Pengirim',
                        'placeholder' => 'Masukkan Pengirim Surat',
                        'name' => 'pengirim',
                    ])
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    @include('components.base.dropdown', [
                        'label' => 'Klasifikasi',
                        'value' => ['Umum', 'Pengaduan', 'Permintaan Informasi'],
                        'name' => 'klasifikasi_surat',
                    ])
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    @include('components.base.dropdown', [
                        'label' => 'Sifat',
                        'value' => ['Rahasia', 'Penting', 'Segera', 'Rutin'],
                        'name' => 'sifat',
                    ])
                </div>
            </div>
            <div class="space-y-1.5 mb-4">
                @include('components.base.input-surat', [
                    'label' => 'Perihal',
                    'placeholder' => 'Masukkan Perihal Surat',
                    'name' => 'perihal',
                ])
            </div>
        </div>
        <div class="flex flex-row justify-end mb-5 gap-4">
            <a href="{{ route('surat.index') }}"
                class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-red-800 border-red-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700">
                Reset
            </a>
            <button type="submit"
                class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-slate-800 border-slate-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700">
                Terapkan
            </button>
        </div>
    </form>

</div> --}}

<div class="flex-col transition-[max-height] duration-300 ease-in-out max-h-0 mt-1" id="collapseFilterSurat">
    <form action="{{ route('surat.index') }}" method="GET">
        <div class="px-4 py-2">
            <div class="mb-4 space-y-1.5 w-full">
                @include('components.base.input-surat', [
                    'label' => 'Nomor Agenda',
                    'placeholder' => 'Masukkan Nomor Agenda',
                    'name' => 'nomor_agenda',
                    'value' => request('nomor_agenda'),
                ])
            </div>
            <div class="flex flex-row gap-3">
                <div class="mb-4 space-y-1.5 w-1/2">
                    @include('components.base.input-surat', [
                        'label' => 'Nomor Surat',
                        'placeholder' => 'Masukkan Nomor Surat',
                        'name' => 'nomor_surat',
                        'value' => request('nomor_surat'),
                    ])
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    @include('components.base.datepicker', [
                        'label' => 'Tanggal Surat',
                        'placeholder' => 'Pilih Tanggal Surat',
                        'id' => 'tanggal_surat',
                        'name' => 'tanggal_surat',
                        'value' => request('tanggal_surat'),
                    ])
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    @include('components.base.datepicker', [
                        'label' => 'Tanggal Terima',
                        'placeholder' => 'Pilih Tanggal Terima',
                        'id' => 'tanggal_terima',
                        'name' => 'tanggal_terima',
                        'value' => request('tanggal_terima'),
                    ])
                </div>
            </div>
            <div class="flex flex-row gap-3 items-center">
                <div class="mb-4 space-y-1.5 w-1/2">
                    @include('components.base.input-surat', [
                        'label' => 'Pengirim',
                        'placeholder' => 'Masukkan Pengirim Surat',
                        'name' => 'pengirim',
                        'value' => request('pengirim'),
                    ])
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    @include('components.base.dropdown', [
                        'label' => 'Klasifikasi',
                        'value' => ['Umum', 'Pengaduan', 'Permintaan Informasi'],
                        'name' => 'klasifikasi_surat',
                        'selected' => request('klasifikasi_surat'),
                    ])
                </div>
                <div class="mb-4 space-y-1.5 w-1/3">
                    @include('components.base.dropdown', [
                        'label' => 'Sifat',
                        'value' => ['Rahasia', 'Penting', 'Segera', 'Rutin'],
                        'name' => 'sifat',
                        'selected' => request('sifat'),
                    ])
                </div>
            </div>
            <div class="space-y-1.5 mb-4">
                @include('components.base.input-surat', [
                    'label' => 'Perihal',
                    'placeholder' => 'Masukkan Perihal Surat',
                    'name' => 'perihal',
                    'value' => request('perihal'),
                ])
            </div>
        </div>
        <div class="flex flex-row justify-end mb-5 gap-4">
            <a href="{{ route('surat.index') }}"
                class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-red-800 border-red-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700">
                Reset
            </a>
            <button type="submit"
                class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-slate-800 border-slate-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700">
                Terapkan
            </button>
        </div>
    </form>
</div>
