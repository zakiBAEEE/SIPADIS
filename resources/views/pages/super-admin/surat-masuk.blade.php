@extends('layouts.super-admin-layout')

@section('content')
    <div class="bg-white w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4">
        <div class="flex flex-row justify-between items-center w-full">
            <div>
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-2xl text-gray-600">Data Surat Masuk
                </h4>
                <h6 class="font-sans text-base font-bold antialiased md:text-lg lg:text-lg text-gray-600">LLDIKTI Wilayah 2
                </h6>
            </div>
            <div class="flex flex-row gap-2">
                @include('components.base.collapse-button', [
                    'dataTarget' => 'collapseFilterSurat',
                    'label' => 'Filter',
                ])
                @include('components.layout.modal-tambah-surat')
            </div>
        </div>
        <hr class="w-full border-t border-gray-300 my-4" />
        <div>
            @include('components.layout.collapse-filter')
        </div>
        @include('components.table.table', ['surats' => $surats])
        <div class="mt-4 flex flex-row justify-end">
            @include('components.base.pagination')
        </div>
    </div>
@endsection
