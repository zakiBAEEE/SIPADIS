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
                margin: 1cm;
            }
        }

        body {
            font-size: 9px;
        }

        table th,
        table td {
            font-size: 8px;
        }
    </style>
</head>

<body onload="window.print()" class="font-sans p-4 bg-white text-black">

    <!-- Judul -->
    <h2 class="text-center text-sm font-bold mb-4 uppercase">Cetak Agenda Surat Masuk</h2>

    <!-- Tabel Agenda -->
    <div class="overflow-x-auto">
        <table class="w-full table-fixed border border-black border-collapse text-[8px]">
            <thead class="bg-gray-200">
                <tr>
                    @php
                        $headers = ['No. Agenda', 'Tgl Terima', 'Pengirim', 'Tgl Srt', 'No Srt', 'Perihal'];

                        for ($i = 1; $i <= 3; $i++) {
                            $headers[] = 'Disposisi';
                            $headers[] = 'Tgl';
                            $headers[] = 'Tujuan Disposisi';
                            $headers[] = 'Instruksi';
                            $headers[] = 'Paraf';
                        }
                    @endphp

                    @foreach ($headers as $header)
                        <th class="border border-black px-1 py-1 break-words whitespace-normal text-wrap text-center">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($suratMasuk as $surat)
                    <tr class="break-inside-avoid">
                        <!-- Data Surat Masuk -->
                        <td class="border border-black px-1 py-1 text-center break-words whitespace-normal">
                            {{ $surat->nomor_agenda }}
                        </td>
                        <td class="border border-black px-1 py-1 text-center break-words whitespace-normal">
                            {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d M Y') }}
                        </td>
                        <td class="border border-black px-1 py-1 break-words whitespace-normal">
                            {{ $surat->pengirim }}
                        </td>
                        <td class="border border-black px-1 py-1 text-center break-words whitespace-normal">
                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d M Y') }}
                        </td>
                        <td class="border border-black px-1 py-1 break-words whitespace-normal">
                            {{ $surat->nomor_surat }}
                        </td>
                        <td class="border border-black px-1 py-1 break-words whitespace-normal">
                            {{ $surat->perihal }}
                        </td>

                        <!-- Data Disposisi (max 3) -->
                        @php
                            $disposisis = $surat->disposisis->take(3);
                        @endphp

                        @for ($i = 0; $i < 3; $i++)
                            @php
                                $disposisi = $disposisis[$i] ?? null;
                            @endphp

                            <!-- Pengirim -->
                            <td class="border border-black px-1 py-1 break-words whitespace-normal text-center">
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

                            <!-- Tanggal Disposisi -->
                            <td class="border border-black px-1 py-1 text-center break-words whitespace-normal">
                                {{ $disposisi ? \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->translatedFormat('d M Y') : '-' }}
                            </td>

                            <!-- Tujuan -->
                            <td class="border border-black px-1 py-1 break-words whitespace-normal text-center">
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

                            <!-- Instruksi -->
                            <td class="border border-black px-1 py-1 break-words whitespace-normal">
                                {{ $disposisi?->catatan ?? '-' }}
                            </td>

                            <!-- Paraf -->
                            <td class="border border-black px-1 py-1 break-words whitespace-normal text-center">
                                {{-- Biarkan kosong untuk paraf --}}
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
