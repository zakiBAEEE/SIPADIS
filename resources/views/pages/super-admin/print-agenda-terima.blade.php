<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Agenda Terima</title>
    @vite('resources/css/app.css')
    <style>
        @media print {
            @page {
                size: landscape;
            }
        }
    </style>
</head>

<body onload="window.print()" class="text-[9px] font-sans p-4 bg-white text-black">
    <h2 class="text-center text-base font-bold mb-4 uppercase">Cetak Agenda Terima</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-fixed border border-black border-collapse text-[9px]">
            <thead class="bg-gray-200">
                <tr>
                    @php
                        $headers = [
                            'No. Agenda',
                            'Tgl Terima',
                            'Pengirim',
                            'Tgl Srt',
                            'No Srt',
                            'Perihal',
                            'Tujuan Disposisi',
                            'Instruksi',
                            'Paraf',
                        ];
                    @endphp
                    @foreach ($headers as $header)
                        <th class="border border-black px-1 py-1 break-words whitespace-normal text-wrap">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($suratMasuk as $surat)
                    @foreach ($surat->disposisis as $disposisi)
                        <tr class="break-inside-avoid">
                            <td class="border border-black px-1 py-1 text-center break-words whitespace-normal">
                                {{ $surat->nomor_agenda }}
                            </td>
                            <td class="border border-black px-1 py-1 break-words whitespace-normal">
                                {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d M Y') }}
                            </td>
                            <td class="border border-black px-1 py-1 break-words whitespace-normal">
                                {{ $surat->pengirim }}
                            </td>
                            <td class="border border-black px-1 py-1 break-words whitespace-normal">
                                {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d M Y') }}
                            </td>
                            <td class="border border-black px-1 py-1 break-words whitespace-normal">
                                {{ $surat->nomor_surat }}
                            </td>
                            <td class="border border-black px-1 py-1 break-words whitespace-normal">
                                {{ $surat->perihal }}
                            </td>

                            <td class="border border-black px-1 py-1 break-words whitespace-normal">
                                @if ($disposisi->penerima)
                                    @php
                                        $penerima = $disposisi->penerima;
                                        $penerimaRole = $penerima->role->name ?? null;
                                    @endphp
                                    {{ $penerimaRole === 'katimja' ? $penerima->divisi->nama_divisi ?? '-' : ucfirst($penerimaRole ?? '-') }}
                                @else
                                    -
                                @endif
                            </td>

                            <td class="border border-black px-1 py-1 break-words whitespace-normal">
                                {{ $disposisi->catatan ?? '-' }}
                            </td>

                            <td class="border border-black px-1 py-1 break-words whitespace-normal text-center">
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
