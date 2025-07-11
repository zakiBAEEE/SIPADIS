@extends('layouts.super-admin-layout')


@section('content')
    @if (session('success'))
        <div class="js-dismissable-alert fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md flex items-center justify-between rounded-lg bg-green-100 px-6 py-5 text-base text-green-700 shadow-lg transition-opacity duration-300"
            role="alert">
            <span>{{ session('success') }}</span>
            <button type="button" class="js-close-alert text-green-700 hover:text-green-900">
                &times;
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="js-dismissable-alert fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md flex items-center justify-between rounded-lg bg-red-100 px-6 py-5 text-base text-red-700 shadow-lg transition-opacity duration-300"
            role="alert">
            <span>{{ session('error') }}</span>
            <button type="button" class="js-close-alert text-red-700 hover:text-red-900">
                &times;
            </button>
        </div>
    @endif
    <div class="bg-white min-w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4">
        <div class="flex flex-col gap-4">
            <div class="flex flex-row justify-between">
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-3xl text-gray-600">Detail Surat</h4>
            </div>
            <hr class="w-full border-t border-gray-300 my-2" />
        </div>
        <div class="relative tab-group">
            <div class="flex border-b border-slate-200 relative justify-between" role="tablist">
                <div>
                    <div
                        class="absolute bottom-0 h-0.5 bg-slate-800 transition-transform duration-300 transform scale-x-0 translate-x-0 tab-indicator">
                    </div>

                    <a href="#"
                        class="tab-link text-sm active inline-block py-2 px-4 text-slate-800 transition-colors duration-300 mr-1"
                        data-tab-target="tab1-group4">
                        Data
                    </a>
                    @if ($surat->jenis_pengelolaan === 'Disposisi')
                        <a href="#"
                            class="tab-link text-sm inline-block py-2 px-4 text-slate-800 transition-colors duration-300 mr-1"
                            data-tab-target="tab2-group4">
                            Disposisi
                        </a>
                    @endif
                </div>
            </div>
            <div class="mt-4 tab-content-container">
                <div id="tab1-group4" class="tab-content text-slate-800 block">
                    <div class="flex justify-end gap-2">
                        <button onclick="window.location='{{ route('surat.edit', ['surat' => $surat->id]) }}'"
                            class="flex border font-medium font-sans text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md p-1 shadow-sm hover:shadow-md  border-orange-400 text-slate-800  bg-orange-300 flex-row items-center gap-1 cursor-pointer">
                            @include('components.base.ikon-edit') Edit Data Surat
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex flex-row gap-3">
                            <div class="mb-4 space-y-1.5 w-1/2">
                                <div>
                                    <label for="email" class="font-sans  text-sm text-slate-800 font-bold mb-2"> Nomor
                                        Surat</label>
                                    <div class="relative w-full">
                                        <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                            id="modal_nomor_surat">
                                            {{ $surat->nomor_surat }} </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 space-y-1.5 w-1/3">
                                <div>
                                    <label for="email" class="font-sans  text-sm text-slate-800 font-bold mb-2"> Tanggal
                                        Surat</label>
                                    <div class="relative w-full">
                                        <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                            id="modal_tgl_surat">
                                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d F Y') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 space-y-1.5 w-1/3">
                                <div>
                                    <label for="email" class="font-sans  text-sm text-slate-800 font-bold mb-2"> Tanggal
                                        Terima</label>
                                    <div class="relative w-full">
                                        <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                            id="modal_tgl_terima">
                                            {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d F Y') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row gap-3 items-center">
                            <div class="mb-4 space-y-1.5 w-1/2">
                                <div>
                                    <label for="email" class="font-sans  text-sm text-slate-800 font-bold mb-2">
                                        Pengirim</label>
                                    <div class="relative w-full">
                                        <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                            id="modal_pengirim">
                                            {{ $surat->pengirim }} </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 space-y-1.5 w-1/3">
                                <div>
                                    <label for="email" class="font-sans  text-sm text-slate-800 font-bold mb-2">
                                        Klasifikasi</label>
                                    <div class="relative w-full">
                                        <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                            id="modal_klasifikasi">
                                            {{ $surat->klasifikasi_surat }} </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 space-y-1.5 w-1/3">
                                <div>
                                    <label for="email" class="font-sans  text-sm text-slate-800 font-bold mb-2">
                                        Sifat</label>
                                    <div class="relative w-full">
                                        <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                            id="modal_sifat">
                                            {{ $surat->sifat }} </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 space-y-1.5 w-1/3">
                            <div>
                                <label for="email" class="font-sans  text-sm text-slate-800 font-bold mb-2">
                                    Perihal</label>
                                <div class="relative w-full">
                                    <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                        id="modal_perihal">
                                        {{ $surat->perihal }} </h6>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <p class="font-sans  text-sm text-slate-800 font-bold mb-2">Preview Dokumen:</p>
                            @if ($surat->file_path)
                                <div class="mt-4">
                                    @if (Str::endsWith($surat->file_path, '.pdf'))
                                        <iframe src="{{ asset('storage/' . $surat->file_path) }}" class="w-full h-[500px]"
                                            frameborder="0"></iframe>
                                    @else
                                        <img src="{{ asset('storage/' . $surat->file_path) }}" alt="Preview Dokumen"
                                            class="max-w-full h-auto border rounded">
                                    @endif
                                </div>
                            @else
                                <p class="text-sm text-slate-600">Tidak ada dokumen terlampir.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($surat->jenis_pengelolaan === 'Disposisi')
                    <div id="tab2-group4" class="tab-content text-slate-800 hidden">
                        <div class="flex justify-end">
                            <div class="flex flex-row gap-2">
                                @include('components.base.tombol-print-disposisi', ['surat' => $surat])
                                @include('components.layout.modal-tambah-disposisi')
                            </div>
                        </div>
                        <div class="p-4">
                            @include('components.table.table-disposisi', [
                                'disposisis' => $surat->disposisis,
                            ])
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.js-edit-disposisi-btn');
            const modal = document.getElementById('modalEditDisposisi');
            if (!modal) return;

            const form = document.getElementById('formEditDisposisi');
            const inputTanggal = document.getElementById('edit_tanggal_disposisi');
            const selectTujuan = document.getElementById('edit_ke_user_id');
            const textareaCatatan = document.getElementById('edit_catatan');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const data = this.dataset;
                    form.action = data.updateUrl;
                    inputTanggal.value = data.tanggal;
                    selectTujuan.value = data.ke_user_id;
                    textareaCatatan.value = data.catatan;
                    modal.classList.remove('opacity-0', 'pointer-events-none');
                });
            });

            const dismissButtons = modal.querySelectorAll('[data-dismiss="modal"]');
            dismissButtons.forEach(button => {
                button.addEventListener('click', function() {
                    modal.classList.add('opacity-0', 'pointer-events-none');
                });
            });
        });
    </script>
@endpush
