@extends('layouts.super-admin-layout')

@section('content')
    <div
        class="bg-white min-w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4 flex flex-col gap-y-6">
        <div class="flex flex-col p-4">
            <div>
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-2xl text-gray-600">Data Lembaga
                </h4>
                <h6 class="font-sans text-base font-bold antialiased md:text-lg lg:text-lg text-gray-600">LLDIKTI Wilayah 2
                </h6>
                <hr class="w-full border-t border-gray-300 my-1" />
            </div>
            <div class="flex flex-col gap-5">
                <div class="flex flex-col">
                    <div class="flex flex-row gap-x-5">
                        <div class="flex flex-col w-5/6 gap-3">
                            @include('components.base.input-surat', [
                                'label' => 'Nama Kementrian',
                                'placeholder' => 'Masukkan Nama Kementrian',
                                'name' => 'nama_kementrian',
                            ])
                            @include('components.base.input-surat', [
                                'label' => 'Nama Lembaga',
                                'placeholder' => 'Masukkan Nama Lembaga',
                                'name' => 'nama_lembaga',
                            ])
                            <div class="flex flex-row w-full gap-3">
                                <div class="flex flex-col w-1/2 gap-3">
                                    @include('components.base.input-surat', [
                                        'label' => 'Email',
                                        'placeholder' => 'Masukkan Email',
                                        'name' => 'email',
                                    ])
                                    @include('components.base.input-surat', [
                                        'label' => 'Alamat',
                                        'placeholder' => 'Masukkan Alamat',
                                        'name' => 'alamat',
                                    ])
                                </div>
                                <div class="flex flex-col w-1/2 gap-3">
                                    @include('components.base.input-surat', [
                                        'label' => 'Telepon',
                                        'placeholder' => 'Masukkan Telepon',
                                        'name' => 'telepon',
                                    ])
                                    @include('components.base.input-surat', [
                                        'label' => 'Website',
                                        'placeholder' => 'Masukkan Alamat Website',
                                        'name' => 'website',
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="w-1/6 h-full">
                            @include('components.base.file-picker', ['label' => 'Upload Logo Lembaga'])
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="flex flex-row gap-3 w-full">
                        <div class="w-1/3">
                            @include('components.base.input-surat', [
                                'label' => 'Tahun',
                                'placeholder' => 'Masukkan Tahun',
                                'name' => 'tahun',
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('components.base.input-surat', [
                                'label' => 'Kota',
                                'placeholder' => 'Masukkan Nama Kota',
                                'name' => 'kota',
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('components.base.input-surat', [
                                'label' => 'Provinsi',
                                'placeholder' => 'Masukkan Nama Provinsi',
                                'name' => 'provinsi',
                            ])
                        </div>
                    </div>
                    <div class="flex flex-row gap-3">
                        <div class="w-1/3">
                            @include('components.base.input-surat', [
                                'label' => 'Nama Kementrian',
                                'placeholder' => 'Masukkan Nama Kementrian',
                                'name' => 'nama_kementrian',
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('components.base.input-surat', [
                                'label' => 'Kepala Kantor',
                                'placeholder' => 'Masukkan Nama Kepala Kantor',
                                'name' => 'kepala_kantor',
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('components.base.input-surat', [
                                'label' => 'NIP',
                                'placeholder' => 'Masukkan NIP Kepala Kantor',
                                'name' => 'nip_kepala_kantor',
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
