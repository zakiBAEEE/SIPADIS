@extends('layouts.super-admin-layout')


@section('content')
    <div class="bg-white min-w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4">
        <div class="flex flex-col gap-4">
            <div class="flex flex-row justify-between">
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-3xl text-gray-600">Detail Surat</h4>
                @include('components.base.tombol-kembali')
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
                        Metadata
                    </a>
                    <a href="#"
                        class="tab-link text-sm inline-block py-2 px-4 text-slate-800 transition-colors duration-300 mr-1"
                        data-tab-target="tab2-group4">
                        Disposisi
                    </a>
                </div>
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
                                            {{ $surat->nomor_surat }} </h6>
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
                                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d F Y') }}
                                        </h6>
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
                                            {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d F Y') }}
                                        </h6>
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
                                            {{ $surat->pengirim }} </h6>
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
                                            {{ $surat->klasifikasi_surat }} </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 space-y-1.5 w-1/3">
                                <div>
                                    <label for="email"
                                        class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
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
                                <label for="email"
                                    class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">
                                    Perihal</label>
                                <div class="relative w-full">
                                    <h6 class="font-sans text-base font-light antialiased md:text-lg lg:text-xl"
                                        id="modal_perihal">
                                        {{ $surat->perihal }} </h6>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <p class="font-sans  text-sm text-slate-800 dark:text-white font-bold mb-2">Preview Dokumen:</p>
                            @if ($surat->file_path)
                                <div class="mt-4">
                                    @if (Str::endsWith($surat->file_path, '.pdf'))
                                        <iframe src="{{ asset('storage/' . $surat->file_path) }}" class="w-full h-[500px]"
                                            frameborder="0"></iframe>
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
                    <div class="flex flex-col">
                        <div class="flex justify-end">
                            <div class="flex flex-row gap-2">
                                @include('components.base.tombol-print-disposisi')
                                @include('components.layout.modal-tambah-disposisi')
                            </div>
                        </div>
                        <div class="w-full overflow-hidden rounded-lg border border-slate-200">
                            <table class="w-full">
                                <thead
                                    class="border-b border-slate-200 bg-slate-100 text-sm font-medium text-slate-600 dark:bg-slate-900">
                                    <tr>
                                        <th class="px-2.5 py-2 text-start font-medium">
                                            Name
                                        </th>
                                        <th class="px-2.5 py-2 text-start font-medium">
                                            Job
                                        </th>
                                        <th class="px-2.5 py-2 text-start font-medium">
                                            Employed
                                        </th>
                                        <th class="px-2.5 py-2 text-start font-medium">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="group text-sm text-slate-800 dark:text-white">
                                    <tr class="border-b border-slate-200 last:border-0">
                                        <td class="p-3">
                                            John Michael
                                        </td>
                                        <td class="p-3">
                                            Manager
                                        </td>
                                        <td class="p-3">
                                            23/04/18
                                        </td>
                                        <td class="p-3">
                                            <a href="#"
                                                class="font-sans antialiased text-sm text-slate-800 font-medium hover:text-slate-600">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-slate-200 last:border-0">
                                        <td class="p-3">
                                            Alexa Liras
                                        </td>
                                        <td class="p-3">
                                            Developer
                                        </td>
                                        <td class="p-3">
                                            23/04/18
                                        </td>
                                        <td class="p-3">
                                            <a href="#"
                                                class="font-sans antialiased text-sm text-slate-800 font-medium hover:text-slate-600">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-slate-200 last:border-0">
                                        <td class="p-3">
                                            Laurent Perrier
                                        </td>
                                        <td class="p-3">
                                            Executive
                                        </td>
                                        <td class="p-3">
                                            19/09/17
                                        </td>
                                        <td class="p-3">
                                            <a href="#"
                                                class="font-sans antialiased text-sm text-slate-800 font-medium hover:text-slate-600">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-slate-200 last:border-0">
                                        <td class="p-3">
                                            Michael Levi
                                        </td>
                                        <td class="p-3">
                                            Developer
                                        </td>
                                        <td class="p-3">
                                            24/12/08
                                        </td>
                                        <td class="p-3">
                                            <a href="#"
                                                class="font-sans antialiased text-sm text-slate-800 font-medium hover:text-slate-600">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-slate-200 last:border-0">
                                        <td class="p-3">
                                            Richard Gran
                                        </td>
                                        <td class="p-3">
                                            Manager
                                        </td>
                                        <td class="p-3">
                                            04/10/21
                                        </td>
                                        <td class="p-3">
                                            <a href="#"
                                                class="font-sans antialiased text-sm text-slate-800 font-medium hover:text-slate-600">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
