<div class="w-full text-black">
    <table class="w-full border border-slate-400 text-sm text-left border-collapse">
        <thead>
            <tr class="bg-slate-200 border-b border-slate-400">
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
                    <th class="px-2 py-2 border border-slate-400 font-semibold">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($suratMasuk as $surat)
                @foreach ($surat->disposisis as $disposisi)
                    <tr class="border-b border-slate-300">
                        <td class="px-2 py-1 border border-slate-300">
                            {{ $surat->id }}
                        </td>
                        <td class="px-2 py-1 border border-slate-300">
                            {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d M Y') }}
                        </td>
                        <td class="px-2 py-1 border border-slate-300">
                            {{ $surat->pengirim }}
                        </td>
                        <td class="px-2 py-1 border border-slate-300">
                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d M Y') }}
                        </td>
                        <td class="px-2 py-1 border border-slate-300">
                            {{ $surat->nomor_surat }}
                        </td>
                        <td class="px-2 py-1 border border-slate-300">
                            {{ $surat->perihal }}
                        </td>
                        <td class="px-2 py-1 border border-slate-300">
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
                        <td class="px-2 py-1 border border-slate-300">
                            {{ $disposisi->catatan ?? '-' }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
