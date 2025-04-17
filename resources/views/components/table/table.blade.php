<div
    class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto text-slate-800 min-w-0 ">
        <thead>
            <tr class="text-slate-500 border-b border-slate-300 bg-slate-50">
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Kode
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Nomor Agenda
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Tgl Terima
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Pengirim
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Tgl Surat
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Nomor Surat
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Perihal
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- @include('components.layout.detail-surat-masuk') --}}
            @foreach ($surats as $surat)
                <tr class="hover:bg-slate-50">
                    <td class="p-4">
                        <p class="text-sm font-bold">
                            {{ $surat->kode }}
                        </p>
                    </td>
                    <td class="p-4">
                        <p class="text-sm">
                            {{ $surat->nomor_agenda }}
                        </p>
                    </td>
                    <td class="p-4">
                        <p class="text-sm">
                            {{ $surat->tgl_terima }}
                        </p>
                    </td>
                    <td class="p-4">
                        <p class="text-sm">
                            {{ $surat->pengirim }}
                        </p>
                    </td>
                    <td class="p-4">
                        <p class="text-sm">
                            {{ $surat->tgl_surat }}
                        </p>
                    </td>
                    <td class="p-4">
                        <p class="text-sm">
                            {{ $surat->nomor_surat }}
                        </p>
                    </td>
                    <td class="p-4">
                        <p class="text-sm">
                            {{ $surat->perihal }}
                        </p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
