@extends('layouts.super-admin-layout')

@section('content')
    <div
        class="bg-white min-w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4 flex flex-col gap-y-6">
        <div class="flex flex-col">
            <div>
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-2xl text-gray-600">Dashboard
                </h4>
                <h6 class="font-sans text-base font-bold antialiased md:text-lg lg:text-lg text-gray-600">LLDIKTI Wilayah 2
                </h6>
            </div>
        </div>
        <div class="flex flex-col gap-y-2">
            <div>
                <h5 class="font-sans text-lg font-bold antialiased md:text-xl lg:text-2xl">Hari Ini</h5>
                <hr class="w-full border-t border-gray-300 my-1" />
            </div>
            <div class="flex flex-row gap-4 items-center">
                @include('components.layout.card-dashboard', ['jenis' => 'total'])
                @include('components.base.ikon-panah-kanan')
                <div class="flex flex-row gap-2">
                    @include('components.layout.card-dashboard', ['jenis' => 'umum'])
                    @include('components.layout.card-dashboard', ['jenis' => 'pengaduan'])
                    @include('components.layout.card-dashboard', ['jenis' => 'permintaan informasi'])
                </div>
            </div>
        </div>
    </div>
@endsection
