<div class="px-6 py-4">
    <h2 class="text-xl font-bold text-center mb-4">AGENDA DISPOSISI KBU</h2>

    <div class="overflow-x-auto">
        <table class="w-full border border-slate-400 text-sm">
            <thead>
                <tr class="bg-slate-100 text-left text-slate-700">
                    @php
                        $headers = ['No. Agenda', 'Tgl Terima', 'Pengirim', 'Tgl Srt', 'No Srt', 'Perihal'];
                        for ($i = 1; $i <= 3; $i++) {
                            $headers[] = 'Pengirim Disposisi';
                            $headers[] = 'Tgl';
                            $headers[] = 'Tujuan';
                            $headers[] = 'Instruksi';
                            $headers[] = 'Paraf';
                        }
                    @endphp
                    @foreach ($headers as $header)
                        <th class="border border-slate-400 px-2 py-2">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($suratMasuk as $surat)
                    <tr class="even:bg-slate-50">
                        {{-- Informasi Surat --}}
                        <td class="border border-slate-300 px-2 py-1">{{ $surat->id }}</td>
                        <td class="border border-slate-300 px-2 py-1">
                            {{ \Carbon\Carbon::parse($surat->tanggal_terima)->format('d-m-Y') }}
                        </td>
                        <td class="border border-slate-300 px-2 py-1">{{ $surat->pengirim }}</td>
                        <td class="border border-slate-300 px-2 py-1">
                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d-m-Y') }}
                        </td>
                        <td class="border border-slate-300 px-2 py-1">{{ $surat->nomor_surat }}</td>
                        <td class="border border-slate-300 px-2 py-1">{{ $surat->perihal }}</td>

                        {{-- Maksimal 3 disposisi --}}
                        @php
                            $disposisis = $surat->disposisis->take(3);
                        @endphp

                        @for ($i = 0; $i < 3; $i++)
                            @php $disposisi = $disposisis[$i] ?? null; @endphp

                            {{-- Pengirim --}}
                            <td class="border border-slate-300 px-2 py-1">
                                {{ $disposisi?->dariRole->name ?? '-' }}
                            </td>

                            {{-- Tanggal --}}
                            <td class="border border-slate-300 px-2 py-1">
                                {{ $disposisi?->tanggal_disposisi?->format('d-m-Y') ?? '-' }}
                            </td>

                            {{-- Tujuan --}}
                            <td class="border border-slate-300 px-2 py-1">
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
                            <td class="border border-slate-300 px-2 py-1">
                                {{ $disposisi?->catatan ?? '-' }}
                            </td>

                            {{-- Paraf --}}
                            <td class="border border-slate-300 px-2 py-1">&nbsp;</td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
