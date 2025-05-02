@extends('layouts.super-admin-layout')


@section('content')
    <div class="bg-white min-w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4">
        <form action="{{ route('surat.update', $surat->id) }}" method="POST">
            @csrf
            {{-- @method('PUT') --}}
            <div class="flex flex-col gap-4">
                <div class="flex flex-row justify-between">
                    <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-3xl text-gray-600">Edit Surat
                    </h4>
                    @include('components.base.tombol-kembali')
                </div>
                <hr class="w-full border-t border-gray-300 my-2" />
            </div>
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
                                            class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
                                            Nomor
                                            Surat</label>
                                        <div class="relative w-full">
                                            <input type="text" name="nomor_surat"
                                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-slate-800  placeholder:text-slate-600/60 bg-transparent ring-transparent border border-slate-200 transition-all duration-300 ease-in disabled:opacity-50 disabled:pointer-events-none data-[error=true]:border-error data-[success=true]:border-success select-none data-[shape=pill]:rounded-full text-sm rounded-md py-2 px-2.5 ring shadow-sm data-[icon-placement=start]:ps-9 data-[icon-placement=end]:pe-9 hover:border-slate-800 hover:ring-slate-800/10 focus:border-slate-800 focus:ring-slate-800/10 peer"lg:text-xl"
                                                value="{{ old('nomor_surat', $surat->nomor_surat) }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-4 space-y-1.5 w-1/3">
                                    <div>
                                        <label for="email"
                                            class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
                                            Tanggal
                                            Surat</label>
                                        <div class="relative w-full">
                                            <input type="date" name="tanggal_surat" id="tanggal_surat"
                                                value="{{ old('tanggal_surat', $surat->tanggal_surat) }}"
                                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-slate-800 dark:text-white placeholder:text-slate-600/60 bg-transparent ring-transparent border border-slate-200 transition-all duration-300 ease-in disabled:opacity-50 disabled:pointer-events-none data-[error=true]:border-error data-[success=true]:border-success select-none data-[shape=pill]:rounded-full text-sm rounded-md py-2 px-2.5 ring shadow-sm data-[icon-placement=start]:ps-9 data-[icon-placement=end]:pe-9 hover:border-slate-800 hover:ring-slate-800/10 focus:border-slate-800 focus:ring-slate-800/10 peer" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 space-y-1.5 w-1/3">
                                    <div>
                                        <label for="email"
                                            class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
                                            Tanggal
                                            Terima</label>
                                        <div class="relative w-full">
                                            <input type="date" name="tanggal_terima" id="tanggal_terima"
                                                value="{{ old('tanggal_terima', $surat->tanggal_terima) }}"
                                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-slate-800 dark:text-white placeholder:text-slate-600/60 bg-transparent ring-transparent border border-slate-200 transition-all duration-300 ease-in disabled:opacity-50 disabled:pointer-events-none data-[error=true]:border-error data-[success=true]:border-success select-none data-[shape=pill]:rounded-full text-sm rounded-md py-2 px-2.5 ring shadow-sm data-[icon-placement=start]:ps-9 data-[icon-placement=end]:pe-9 hover:border-slate-800 hover:ring-slate-800/10 focus:border-slate-800 focus:ring-slate-800/10 peer" />

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
                                            <input type="text" name="pengirim"
                                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-slate-800  placeholder:text-slate-600/60 bg-transparent ring-transparent border border-slate-200 transition-all duration-300 ease-in disabled:opacity-50 disabled:pointer-events-none data-[error=true]:border-error data-[success=true]:border-success select-none data-[shape=pill]:rounded-full text-sm rounded-md py-2 px-2.5 ring shadow-sm data-[icon-placement=start]:ps-9 data-[icon-placement=end]:pe-9 hover:border-slate-800 hover:ring-slate-800/10 focus:border-slate-800 focus:ring-slate-800/10 peer"
                                                value="{{ old('nomor_surat', $surat->pengirim) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 space-y-1.5 w-1/3">
                                    <div>
                                        <div class="relative w-full">
                                            @include('components.base.dropdown', [
                                                'label' => 'Klasifikasi',
                                                'value' => ['Umum', 'Pengaduan', 'Permintaan Informasi'],
                                                'name' => 'klasifikasi_surat',
                                                'selected' => $surat->klasifikasi_surat ?? null,
                                            ])
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 space-y-1.5 w-1/3">
                                    <div>
                                        <div class="relative w-full">
                                            @include('components.base.dropdown', [
                                                'label' => 'Sifat',
                                                'value' => ['Rahasia', 'Penting', 'Segera', 'Rutin'],
                                                'name' => 'sifat',
                                                'selected' => $surat->sifat ?? null,
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 space-y-1.5 w-1/3">
                                <div>
                                    <label for="email"
                                        class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
                                        Perihal</label>
                                    <div class="relative w-full">
                                        <input type="text" name="perihal"
                                            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-slate-800  placeholder:text-slate-600/60 bg-transparent ring-transparent border border-slate-200 transition-all duration-300 ease-in disabled:opacity-50 disabled:pointer-events-none data-[error=true]:border-error data-[success=true]:border-success select-none data-[shape=pill]:rounded-full text-sm rounded-md py-2 px-2.5 ring shadow-sm data-[icon-placement=start]:ps-9 data-[icon-placement=end]:pe-9 hover:border-slate-800 hover:ring-slate-800/10 focus:border-slate-800 focus:ring-slate-800/10 peer"
                                            value="{{ old('nomor_surat', $surat->perihal) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <p class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">Preview
                                    Dokumen:
                                </p>
                                @if ($surat->file_path)
                                    <div class="mt-4">
                                        @if (Str::endsWith($surat->file_path, '.pdf'))
                                            <iframe src="{{ asset('storage/' . $surat->file_path) }}"
                                                class="w-full h-[500px]" frameborder="0"></iframe>
                                        @else
                                            <img src="m" alt="Preview Dokumen" class="max-w-full h-auto">
                                        @endif
                                    </div>
                                @else
                                    <p class="text-sm text-slate-600">Tidak ada dokumen terlampir.</p>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div id="tab2-group4" class="tab-content text-slate-800 hidden">
                        <div class="flex justify-end">
                            <div class="flex flex-row gap-2">
                                @include('components.base.tombol-print-disposisi')
                                @include('components.layout.modal-tambah-disposisi')
                            </div>
                        </div>
                        <div class="p-4">
                            @include('components.table.table-disposisi')
                        </div>
                    </div>
                </div>
            </div>
            <div class=" px-4 pb-4 flex justify-end gap-2">
                @include('components.base.tombol-simpan-surat')
            </div>
        </form>
    </div>
@endsection
