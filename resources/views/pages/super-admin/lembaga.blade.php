@extends('layouts.super-admin-layout')

@section('content')
    <div
        class="bg-white min-w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4 flex flex-col gap-y-6">
        <div class="flex flex-col">
            <div>
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-2xl text-gray-600">Data Lembaga
                </h4>
                <h6 class="font-sans text-base font-bold antialiased md:text-lg lg:text-lg text-gray-600">LLDIKTI Wilayah 2
                </h6>
                <hr class="w-full border-t border-gray-300 my-1" />
            </div>
            <div class="flex flex-row">
                <div class="flex flex-col">
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
                    <div class="flex flex-row">
                        <div class="flex flex-col">
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
                        <div class="flex flex-col">
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
                @include('components.base.file-picker', ['label' => 'Upload Surat'])
            </div>
        </div>
    </div>
@endsection
