<div
    class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border h-[400px]">

    <table class="w-full text-left table-auto text-slate-800 min-w-0">
        {{-- THEAD YANG DIMODIFIKASI --}}
        <thead>
            <tr class="text-slate-500 border-b border-slate-300 bg-slate-50">
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
                    <th class="p-3 text-left">
                        
                        <p class="text-sm leading-none font-semibold whitespace-normal break-words">
                            {{ $header }}
                        </p>
                    </th>
                @endforeach
            </tr>
        </thead>
        {{-- Akhir THEAD YANG DIMODIFIKASI --}}

        <tbody>
            @foreach ($suratMasuk as $surat)
                <tr class="break-inside-avoid">
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

                    @php
                        $disposisis = $surat->disposisis->take(3);
                    @endphp

                    @for ($i = 0; $i < 3; $i++)
                        @php
                            $disposisi = $disposisis[$i] ?? null;
                        @endphp

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

                        <td class="border border-black px-1 py-1 text-center break-words whitespace-normal">
                            {{ $disposisi ? \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->translatedFormat('d M Y') : '-' }}
                        </td>

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

                        <td class="border border-black px-1 py-1 break-words whitespace-normal">
                            {{ $disposisi?->catatan ?? '-' }}
                        </td>

                        <td class="border border-black px-1 py-1 break-words whitespace-normal text-center">
                            {{-- Biarkan kosong untuk paraf --}}
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>
</div>