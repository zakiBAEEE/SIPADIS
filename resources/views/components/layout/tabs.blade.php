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

            </div>
        </div>
        <div id="tab2-group4" class="tab-content text-slate-800 hidden">
            <p>We're not always in the position that we want to be at. We're constantly growing. We're constantly making
                mistakes. We're constantly trying to express ourselves and actualize our dreams.</p>
        </div>
    </div>
</div>
