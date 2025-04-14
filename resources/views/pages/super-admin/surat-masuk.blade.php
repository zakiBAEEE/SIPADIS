@extends('layouts.super-admin-layout')

@section('content')
    <div class="bg-white w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-auto p-4">
        <div class="flex flex-row justify-between items-center w-full">
            <div>
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-2xl text-gray-600">Data Surat Masuk
                </h4>
                <h6 class="font-sans text-base font-bold antialiased md:text-lg lg:text-lg text-gray-600">LLDIKTI Wilayah 2
                </h6>
            </div>
            <div class="flex flex-row gap-2">
                @include('components.button-filter')
                @include('components.modal-tambah-surat')
            </div>
        </div>
        <hr class="w-full border-t border-gray-300 my-4" />
        @include('components.table')
    </div>
@endsection
