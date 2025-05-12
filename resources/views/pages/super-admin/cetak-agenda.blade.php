@extends('layouts.super-admin-layout')

@section('content')
    <div class="bg-white w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4">

        <div class="flex flex-row justify-between items-center w-full">
            <div>
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-2xl text-gray-600">Cetak Agenda
                    Surat
                    Masuk
                </h4>
                <h6 class="font-sans text-base font-bold antialiased md:text-lg lg:text-lg text-gray-600">LLDIKTI Wilayah
                    2
                </h6>
            </div>
        </div>
        <hr class="w-full border-t border-gray-300 my-4" />
        <div class="">
            <div class="">
                <form action="{{ route('surat.printAgenda') }}" method="GET" target="blank">
                    <div class="flex flex-col justify-center gap-2  ">
                        <div class="">
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
                                        'id' => 'cetak-agenda-tanggal-surat',
                                        'name' => 'cetak-agenda-tanggal-surat',
                                        'value' => request('cetak-agenda-tanggal-surat'),
                                    ])
                                </div>
                                <div class="mb-4 space-y-1.5 w-1/3">
                                    @include('components.base.datepicker', [
                                        'label' => 'Tanggal Terima',
                                        'placeholder' => 'Pilih Tanggal Terima',
                                        'id' => 'cetak-agenda-tanggal-terima',
                                        'name' => 'cetak-agenda-tanggal-terima',
                                        'value' => request('cetak-agenda-tanggal-terima'),
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
                            <a href="{{ route('surat.cetakAgenda') }}"
                                class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-red-800 border-red-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700">
                                Reset
                            </a>
                            <button type="submit"
                                class="inline-flex border font-medium font-sans text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md px-1 shadow-sm hover:shadow-md bg-transparent border-slate-800 text-slate-800 flex-row justify-center items-center gap-1"
                                target="_blank">
                                @include('components.base.ikon-print') Cetak
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
