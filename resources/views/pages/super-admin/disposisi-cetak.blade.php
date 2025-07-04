<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body onload="window.print()" class="text-xs font-sans min-h-screen p-4">

    <div class="border-b-2 border-black pb-2 mb-4 flex justify-center items-center gap-2">
        <img src="{{ asset('storage/' . $lembaga->logo) }}" alt="Logo" class="w-28 h-auto">
        <div class="text-center leading-tight">
            <h3 class="text-xl font-bold">{{ $lembaga->nama_kementerian }}</h3>
            <h4 class="text-lg font-semibold">{{ $lembaga->nama_lembaga }}</h4>
            <p class="m-0">{{ $lembaga->alamat }}</p>
            <p class="m-0">Telepon: {{ $lembaga->telepon }}</p>
            <p class="m-0">Laman : {{$lembaga->website}}</p>
        </div>
    </div>

    <div class="text-center font-bold text-lg mb-2">LEMBAR DISPOSISI</div>

    <div class="flex justify-center gap-4 mb-4">
        <label class="border border-black px-2 py-1">
            {{ $surat->sifat === 'Rahasia' ? '☑' : '☐' }} RAHASIA
        </label>
        <label class="border border-black px-2 py-1">
            {{ $surat->sifat === 'Penting' ? '☑' : '☐' }} PENTING
        </label>
        <label class="border border-black px-2 py-1">
            {{ $surat->sifat === 'Segera' ? '☑' : '☐' }} SEGERA
        </label>
        <label class="border border-black px-2 py-1">
            {{ $surat->sifat === 'Rutin' ? '☑' : '☐' }} RUTIN
        </label>
    </div>

    <div class="border border-black p-3 mb-4">
        <div class="w-full border border-gray-300 rounded-md divide-y divide-gray-200 text-sm">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 flex items-start border-b border-gray-200">
                    <div class="w-40 font-bold p-2 bg-gray-50">No. Agenda</div>
                    <div class="flex-1 p-2">: {{ $surat->id }}</div>
                </div>
                <div class="w-full md:w-1/2 flex items-start border-b border-gray-200">
                    <div class="w-40 font-bold p-2 bg-gray-50">Tanggal Diterima</div>
                    <div class="flex-1 p-2">:
                        {{ \Carbon\Carbon::parse($surat->tanggal_terima)->locale('id')->translatedFormat('d F Y') }}
                    </div>
                </div>
            </div>
            <div class="flex border-b border-gray-200">
                <div class="w-40 font-bold p-2 bg-gray-50">Perihal</div>
                <div class="flex-1 p-2">: {{ $surat->perihal }}</div>
            </div>
            <div class="flex flex-wrap border-b border-gray-200">
                <div class="w-full md:w-1/2 flex items-start">
                    <div class="w-40 font-bold p-2 bg-gray-50">Tanggal Surat</div>
                    <div class="flex-1 p-2">:
                        {{ \Carbon\Carbon::parse($surat->tanggal_surat)->locale('id')->translatedFormat('d F Y') }}
                    </div>
                </div>
                <div class="w-full md:w-1/2 flex items-start">
                    <div class="w-40 font-bold p-2 bg-gray-50">Nomor Surat</div>
                    <div class="flex-1 p-2">: {{ $surat->nomor_surat }}</div>
                </div>
            </div>
            <div class="flex">
                <div class="w-40 font-bold p-2 bg-gray-50">Pengirim</div>
                <div class="flex-1 p-2">: {{ $surat->pengirim }}</div>
            </div>
        </div>
    </div>

    {{-- Kontainer tabel dengan tinggi minimal yang cukup untuk diisi 5 baris tinggi --}}
    <div class="flex flex-col min-h-[450px]"> {{-- Anda bisa sesuaikan min-h ini --}}
        <table class="w-full border border-black border-collapse table-fixed">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-2 py-2 text-left w-[15%]">TGL TERIMA</th>
                    <th class="border border-black px-2 py-2 text-left w-[15%]">KEPADA</th>
                    <th class="border border-black px-2 py-2 text-left w-[40%]">HAL/INSTRUKSI/INFORMASI</th>
                    <th class="border border-black px-2 py-2 text-left w-[20%]">DISPOSISI DARI</th>
                    <th class="border border-black px-2 py-2 text-left w-[10%]">PARAF</th>
                </tr>
            </thead>
           <tbody>
    @php
        $maxDataRows = 5;
        $totalRowsToDisplay = 5;

        $actualDataRows = $disposisis->take($maxDataRows);
        $dataRowsCount = $actualDataRows->count();
        $emptyRowsNeeded = $totalRowsToDisplay - $dataRowsCount;

        $cellVerticalPadding = 'py-8';
    @endphp

    @foreach ($actualDataRows as $disposisi)
        <tr class="align-top">
            <td class="border border-black px-2 {{ $cellVerticalPadding }}">
                {{ \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->format('d M Y') }}
            </td>

            {{-- Tujuan Disposisi (penerima: bisa Divisi atau Role) --}}
            <td class="border border-black px-2 {{ $cellVerticalPadding }}">
                {{ $disposisi->penerima->nama_divisi ?? $disposisi->penerima->name ?? '-' }}
            </td>

            {{-- Isi Disposisi --}}
            <td class="border border-black px-2 {{ $cellVerticalPadding }}">
                {{ $disposisi->catatan }}
            </td>

            {{-- Pengirim (dari_role_id, relasi ke Role) --}}
            <td class="border border-black px-2 {{ $cellVerticalPadding }}">
                {{ $disposisi->dariRole->name ?? '-' }}
            </td>

            {{-- Kolom kosong (misalnya untuk tanda tangan) --}}
            <td class="border border-black px-2 {{ $cellVerticalPadding }}"></td>
        </tr>
    @endforeach

    {{-- Tambahkan baris kosong --}}
    @for ($i = 0; $i < $emptyRowsNeeded; $i++)
        <tr class="align-top">
            <td class="border border-black px-2 {{ $cellVerticalPadding }}">&nbsp;</td>
            <td class="border border-black px-2 {{ $cellVerticalPadding }}"></td>
            <td class="border border-black px-2 {{ $cellVerticalPadding }}"></td>
            <td class="border border-black px-2 {{ $cellVerticalPadding }}"></td>
            <td class="border border-black px-2 {{ $cellVerticalPadding }}"></td>
        </tr>
    @endfor
</tbody>

        </table>
    </div>
</body>
</html>