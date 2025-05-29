<div
    class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border h-[400px]">

    <table class="w-full text-left table-auto text-slate-800 min-w-0">
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
