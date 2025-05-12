<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Agenda Surat Masuk</title>
    @vite('resources/css/app.css')
    <style>
        @media print {
            @page {
                size: landscape;
            }
        }
    </style>
</head>

<body onload="window.print()" class="text-xs font-sans p-4 bg-white text-black">

    <!-- Judul -->
    <h2 class="text-center text-base font-bold mb-4 uppercase">Cetak Agenda Surat Masuk</h2>

    <!-- Tabel Agenda -->
    <div class="overflow-x-auto">
        <table class="w-full table-fixed border border-black border-collapse text-[10px]">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-black px-1 py-1 w-[2%]">No</th>
                    <th class="border border-black px-1 py-1 w-[6%]">Tgl Terima</th>
                    <th class="border border-black px-1 py-1 w-[10%]">No Surat</th>
                    <th class="border border-black px-1 py-1 w-[6%]">Tgl Surat</th>
                    <th class="border border-black px-1 py-1 w-[12%]">Perihal</th>
                    <th class="border border-black px-1 py-1 w-[10%]">Pengirim</th>

                    @for ($i = 1; $i <= 3; $i++)
                        <th class="border border-black px-1 py-1 w-[6%]">Tgl Disposisi {{ $i }}</th>
                        <th class="border border-black px-1 py-1 w-[6%]">Dari</th>
                        <th class="border border-black px-1 py-1 w-[6%]">Kepada</th>
                        <th class="border border-black px-1 py-1 w-[12%]">Instruksi</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($suratMasuk as $index => $surat)
                    <tr class="break-inside-avoid">
                        <td class="border border-black px-1 py-1 text-center">{{ $index + 1 }}</td>
                        <td class="border border-black px-1 py-1">
                            {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d M Y') }}
                        </td>
                        <td class="border border-black px-1 py-1">{{ $surat->nomor_surat }}</td>
                        <td class="border border-black px-1 py-1">
                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d M Y') }}
                        </td>
                        <td class="border border-black px-1 py-1">{{ $surat->perihal }}</td>
                        <td class="border border-black px-1 py-1">{{ $surat->pengirim }}</td>

                        @php
                            $disposisis = $surat->disposisis->take(3); // maksimal 3 disposisi
                            $i = 0;
                        @endphp

                        @while ($i < 3)
                            @php
                                $disposisi = $disposisis[$i] ?? null;
                            @endphp

                            <td class="border border-black px-1 py-1">
                                {{ $disposisi ? \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->format('d M Y') : '' }}
                            </td>

                            <td class="border border-black px-1 py-1">
                                @if ($disposisi && $disposisi->pengirim)
                                    @php
                                        $pengirim = $disposisi->pengirim;
                                        $pengirimRole = $pengirim->role->name ?? null;
                                    @endphp
                                    {{ $pengirimRole === 'katimja' ? $pengirim->divisi->nama_divisi ?? '-' : ucfirst($pengirimRole ?? '-') }}
                                @else
                                    -
                                @endif
                            </td>

                            <td class="border border-black px-1 py-1">
                                @if ($disposisi && $disposisi->penerima)
                                    @php
                                        $penerima = $disposisi->penerima;
                                        $penerimaRole = $penerima->role->name ?? null;
                                    @endphp
                                    {{ $penerimaRole === 'katimja' ? $penerima->divisi->nama_divisi ?? '-' : ucfirst($penerimaRole ?? '-') }}
                                @else
                                    -
                                @endif
                            </td>

                            <td class="border border-black px-1 py-1">
                                {{ $disposisi?->catatan ?? '' }}
                            </td>

                            @php
                                $i++;
                            @endphp
                        @endwhile
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
