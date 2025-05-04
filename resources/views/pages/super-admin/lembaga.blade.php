@extends('layouts.super-admin-layout')

@section('content')
    <div
        class="bg-white min-w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4 flex flex-col gap-y-6">
        <div class="flex flex-col p-4">
            <div class="flex flex-row justify-between">
                <div>
                    <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-2xl text-gray-600">Data Lembaga
                    </h4>
                    <h6 class="font-sans text-base font-bold antialiased md:text-lg lg:text-lg text-gray-600">LLDIKTI Wilayah 2
                    </h6>
                    <hr class="w-full border-t border-gray-300 my-1" />
                </div>
                <a href="{{ route('lembaga.edit') }}"
                    class="flex border font-medium font-sans text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md px-1 shadow-sm hover:shadow-md  border-orange-400 text-slate-800  bg-orange-300 flex-row justify-center items-center gap-1 cursor-pointer">
                    @include('components.base.ikon-edit') Edit
                </a>
            </div>
            <div class="flex flex-col gap-5">
                <div class="flex flex-col">
                    <div class="flex flex-row gap-x-5">
                        <div class="flex flex-col w-5/6 gap-3">
                            @include('components.base.input-display', [
                                'label' => 'Nama Kementrian',
                                'value' => 'Test',
                            ])
                            @include('components.base.input-display', [
                                'label' => 'Nama Lembaga',
                                'value' => 'Test',
                            ])
                            <div class="flex flex-row w-full gap-3">
                                <div class="flex flex-col w-1/2 gap-3">
                                    @include('components.base.input-display', [
                                        'label' => 'Email',
                                        'value' => 'Test',
                                    ])
                                    @include('components.base.input-display', [
                                        'label' => 'Alamat',
                                        'value' => 'Test',
                                    ])
                                </div>
                                <div class="flex flex-col w-1/2 gap-3">
                                    @include('components.base.input-display', [
                                        'label' => 'Telepon',
                                        'value' => 'Test',
                                    ])
                                    @include('components.base.input-display', [
                                        'label' => 'Website',
                                        'value' => 'Test',
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
                            @include('components.base.input-display', [
                                'label' => 'Tahun',
                                'value' => 'Test',
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('components.base.input-display', [
                                'label' => 'Kota',
                                'value' => 'Test',
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('components.base.input-display', [
                                'label' => 'Provinsi',
                                'value' => 'Test',
                            ])
                        </div>
                    </div>
                    <div class="flex flex-row gap-3">
                        <div class="w-1/3">
                            @include('components.base.input-display', [
                                'label' => 'Kepala Kantor',
                                'value' => 'Test',
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('components.base.input-display', [
                                'label' => 'NIP',
                                'value' => 'Test',
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('components.base.input-display', [
                                'label' => 'Jabatan',
                                'value' => 'Test',
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
