<div
    class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border h-[400px]">
    <table class="w-full text-left table-auto text-slate-800 min-w-0">
        <thead>
            <tr class=""text-slate-500 border-b border-slate-300 bg-slate-50">
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
                    ];
                @endphp
                @foreach ($headers as $header)
                    <th class="  px-3 py-5 text-left text-slate-500 bg-slate-100">
                        <p class="text-sm leading-none font-semibold whitespace-normal break-words">
                            {{ $header }}
                        </p>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($suratMasuk as $surat)
                @foreach ($surat->disposisis as $disposisi)
                    <tr onclick="window.location='{{ route('surat.show', ['id' => $surat->id]) }}'"
                        class="cursor-pointer hover:bg-blue-100">
                        <td class="p-3">
                            {{ $surat->id }}
                        </td>
                        <td class="p-3">
                            {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d M Y') }}
                        </td>
                        <td class="p-3">
                            {{ $surat->pengirim }}
                        </td>
                        <td class="p-3">
                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d M Y') }}
                        </td>
                        <td class="p-3">
                            {{ $surat->nomor_surat }}
                        </td>
                        <td class="p-3">
                            {{ $surat->perihal }}
                        </td>

                        {{-- Kolom Tujuan Disposisi --}}
                        <td class="p-3">
                            @php
                                $penerima = $disposisi->penerima;
                            @endphp
                            @if ($penerima instanceof \App\Models\Divisi)
                                {{ $penerima->nama_divisi }}
                            @elseif ($penerima instanceof \App\Models\Role)
                                {{ $penerima->name }}
                            @else
                                -
                            @endif
                        </td>

                        {{-- Kolom Catatan --}}
                        <td class="p-3">
                            {{ $disposisi->catatan ?? '-' }}
                        </td>

                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
