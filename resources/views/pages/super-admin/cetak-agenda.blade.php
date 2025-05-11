@extends('layouts.super-admin-layout')

@section('content')
    <div class="bg-white w-full h-full rounded-xl shadow-neutral-400 shadow-lg overflow-scroll p-4">
        <div class="flex flex-row justify-between items-center w-full">
            <div>
                <h4 class="font-sans text-xl font-bold antialiased md:text-2xl lg:text-2xl text-gray-600">Cetak Agenda Surat
                    Masuk
                </h4>
                <h6 class="font-sans text-base font-bold antialiased md:text-lg lg:text-lg text-gray-600">LLDIKTI Wilayah 2
                </h6>
            </div>
        </div>
        <hr class="w-full border-t border-gray-300 my-4" />
        <div class="flex justify-center items-center">
            <div>
                <form action="{{ route('surat.printAgenda') }}" method="GET" target="blank">
                    <div class="mb-4 space-y-1.5 w-1/3">
                        @include('components.base.datepicker', [
                            'label' => 'Tanggal Surat',
                            'placeholder' => 'Pilih Tanggal Surat',
                            'id' => 'cetak-agenda',
                            'name' => 'cetak-agenda',
                        ])
                    </div>
                    <button type="submit"
                        class="inline-flex border font-medium font-sans text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md px-1 shadow-sm hover:shadow-md bg-transparent border-slate-800 text-slate-800 flex-row justify-center items-center gap-1"
                        target="_blank">
                        @include('components.base.ikon-print') Cetak
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
