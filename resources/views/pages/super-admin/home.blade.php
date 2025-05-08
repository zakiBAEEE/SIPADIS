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
                <h5 class="font-sans text-lg font-bold antialiased md:text-xl lg:text-xl text-gray-600">Hari Ini</h5>
                <hr class="w-full border-t border-gray-300 my-1" />
            </div>
            {{-- Rekapitulasi Harian (Selalu Ada) --}}
            <div class="flex flex-row gap-4 items-center justify-evenly">
                @include('components.layout.card-dashboard', ['jenis' => 'total', 'count' => $totalToday])
                @include('components.base.ikon-panah-kanan')
                <div class="flex flex-row gap-2">
                    @include('components.layout.card-dashboard', [
                        'jenis' => 'umum',
                        'count' => $umumToday,
                    ])
                    @include('components.layout.card-dashboard', [
                        'jenis' => 'pengaduan',
                        'count' => $pengaduanToday,
                    ])
                    @include('components.layout.card-dashboard', [
                        'jenis' => 'permintaan informasi',
                        'count' => $permintaanInformasiToday,
                    ])
                </div>
            </div>

        </div>
        <div class="flex flex-col gap-y-4">
            <div>
                <h5 class="font-sans text-lg font-bold antialiased md:text-xl lg:text-xl text-gray-600">Rekapitulasi Surat
                    Masuk</h5>
                <hr class="w-full border-t border-gray-300 my-1" />
            </div>
            <form action="{{ route('surat.home') }}" method="GET" class="flex flex-row px-2 gap-x-4 my-1 items-end">
                <div>
                    <label for="startDate" class="block text-gray-700 text-sm font-semibold mb-2">Pilih Rentang
                        Tanggal</label>
                    <input type="text" name="tanggal_range" id="startDate"
                        class="flatpickr w-full px-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Select Date Range" value="{{ $tanggalRange ?? '' }}" />
                </div>
                <div>
                    <button type="submit"
                        class="mt-6 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                        Tampilkan
                    </button>
                </div>
            </form>

            {{-- Rekapitulasi Berdasarkan Rentang Tanggal (Jika Ada) --}}
            <div class="mt-8">
                <h2 class="text-lg font-bold text-gray-800 mb-4">
                    Rekapitulasi Surat Tanggal: {{ $tanggalRange ?? '-' }}
                </h2>
                <div class="flex flex-row gap-4 items-center justify-evenly">
                    @include('components.layout.card-dashboard', [
                        'jenis' => 'total',
                        'count' => $rekapRange['total'] ?? 0,
                    ])
                    @include('components.base.ikon-panah-kanan')
                    <div class="flex flex-row gap-2">
                        @include('components.layout.card-dashboard', [
                            'jenis' => 'umum',
                            'count' => $rekapRange['umum'] ?? 0,
                        ])
                        @include('components.layout.card-dashboard', [
                            'jenis' => 'pengaduan',
                            'count' => $rekapRange['pengaduan'] ?? 0,
                        ])
                        @include('components.layout.card-dashboard', [
                            'jenis' => 'permintaan informasi',
                            'count' => $rekapRange['permintaan_informasi'] ?? 0,
                        ])
                    </div>
                </div>
            </div>


            @php
                $series = [
                    ['name' => 'Umum', 'data' => [12, 20, 25, 30, 28, 15]],
                    ['name' => 'Pengaduan', 'data' => [5, 10, 8, 6, 7, 9]],
                    ['name' => 'Permintaan Informasi', 'data' => [3, 5, 2, 4, 6, 5]],
                ];

                $categories = [
                    '2025-01-01 GMT',
                    '2025-02-01 GMT',
                    '2025-03-01 GMT',
                    '2025-04-01 GMT',
                    '2025-05-01 GMT',
                    '2025-06-01 GMT',
                ];
            @endphp

            @include('components.layout.chart', [
                'id' => 'suratChartBulanan',
                'series' => $series,
                'categories' => $categories,
            ])

        </div>
    </div>
@endsection
