<div class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border h-[400px]">
<table class="w-full text-left table-auto text-slate-800 min-w-0">
    <thead class="bg-slate-50">
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
                <th class="border border-slate-300 px-3 py-2 text-left text-slate-500 bg-slate-100">
                    {{ $header }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($suratMasuk as $surat)
            @foreach ($surat->disposisis as $disposisi)
                <tr class="hover:bg-slate-50">
                    <td class="border border-slate-300 px-3 py-2 text-center text-slate-800">
                        {{ $surat->nomor_agenda }}
                    </td>
                    <td class="border border-slate-300 px-3 py-2 text-slate-800">
                        {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d M Y') }}
                    </td>
                    <td class="border border-slate-300 px-3 py-2 text-slate-800">
                        {{ $surat->pengirim }}
                    </td>
                    <td class="border border-slate-300 px-3 py-2 text-slate-800">
                        {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d M Y') }}
                    </td>
                    <td class="border border-slate-300 px-3 py-2 text-slate-800">
                        {{ $surat->nomor_surat }}
                    </td>
                    <td class="border border-slate-300 px-3 py-2 text-slate-800">
                        {{ $surat->perihal }}
                    </td>

                    <td class="border border-slate-300 px-3 py-2 text-slate-800">
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

                    <td class="border border-slate-300 px-3 py-2 text-slate-800">
                        {{ $disposisi->catatan ?? '-' }}
                    </td>

                    <td class="border border-slate-300 px-3 py-2 text-center text-slate-800">
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
</div>


