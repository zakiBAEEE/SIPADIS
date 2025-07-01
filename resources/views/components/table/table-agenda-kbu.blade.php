<div class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border h-[400px]">
    <table class="w-full text-left table-auto text-slate-800 min-w-0">
        {{-- THEAD --}}
        <thead>
            <tr class="text-slate-500 border-b border-slate-300 bg-slate-50">
                @php
                    $headers = ['No. Agenda', 'Tgl Terima', 'Pengirim', 'Tgl Srt', 'No Srt', 'Perihal'];
                    for ($i = 1; $i <= 3; $i++) {
                        $headers[] = 'Pengirim Disposisi';
                        $headers[] = 'Tgl';
                        $headers[] = 'Tujuan';
                        $headers[] = 'Instruksi';
                    }
                @endphp
                @foreach ($headers as $header)
                    <th class="p-3 text-left">
                        <p class="text-sm font-semibold whitespace-normal break-words">{{ $header }}</p>
                    </th>
                @endforeach
            </tr>
        </thead>

        {{-- TBODY --}}
        <tbody>
            @foreach ($suratMasuk as $surat)
                <tr class="hover:bg-slate-50 cursor-pointer" onclick="window.location='{{ route('surat.show', $surat->id) }}'">
                    {{-- Informasi Surat --}}
                    <td class="p-3"><p class="text-sm">{{ $surat->id }}</p></td>
                    <td class="p-3"><p class="text-sm">{{ $surat->tanggal_terima ? \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d M Y') : '-' }}</p></td>
                    <td class="p-3"><p class="text-sm">{{ $surat->pengirim }}</p></td>
                    <td class="p-3"><p class="text-sm">{{ $surat->tanggal_surat ? \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d M Y') : '-' }}</p></td>
                    <td class="p-3"><p class="text-sm">{{ $surat->nomor_surat }}</p></td>
                    <td class="p-3"><p class="text-sm">{{ $surat->perihal }}</p></td>

                    {{-- Ambil maksimal 3 disposisi --}}
                    @php
                        $disposisis = $surat->disposisis->take(3);
                    @endphp

                    @for ($i = 0; $i < 3; $i++)
                        @php
                            $disposisi = $disposisis[$i] ?? null;
                        @endphp

                        {{-- Pengirim Disposisi --}}
                        <td class="p-3 text-sm">
                            @if ($disposisi && $disposisi->dariRole)
                                {{ $disposisi->dariRole->name }}
                            @else
                                -
                            @endif
                        </td>

                        {{-- Tanggal Disposisi --}}
                        <td class="p-3 text-sm">
                            {{ $disposisi && $disposisi->tanggal_disposisi ? $disposisi->tanggal_disposisi->translatedFormat('d M Y') : '-' }}
                        </td>

                        {{-- Tujuan Disposisi --}}
                        <td class="p-3 text-sm">
                            @php $penerima = $disposisi?->penerima; @endphp
                            @if ($penerima instanceof \App\Models\Divisi)
                                {{ $penerima->nama_divisi }}
                            @elseif ($penerima instanceof \App\Models\Role)
                                {{ $penerima->name }}
                            @else
                                -
                            @endif
                        </td>

                        {{-- Instruksi --}}
                        <td class="p-3 text-sm">
                            {{ $disposisi->catatan ?? '-' }}
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
