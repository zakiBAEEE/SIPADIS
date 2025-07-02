<div
    class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border h-[400px]">
    <table class="w-full text-left table-auto text-slate-800 min-w-0">
        <thead>
            <tr class="text-slate-500 border-b border-slate-300 bg-slate-50">

                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Nomor Agenda
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Nomor Surat
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Pengirim
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Tgl Terima
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Tgl Surat
                    </p>
                </th>
                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Perihal
                    </p>
                </th>

                <th class="p-3">
                    <p class="text-sm leading-none font-normal">
                        Klasifikasi
                    </p>
                </th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($surats as $surat)
                <tr onclick="window.location='{{ route('surat.show', ['id' => $surat->id]) }}'"
                    class="cursor-pointer hover:bg-blue-100">
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->id }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->nomor_surat }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->pengirim }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">
                            {{ \Carbon\Carbon::parse($surat->tanggal_terima)->translatedFormat('d F Y') }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">
                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d F Y') }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->perihal }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->klasifikasi_surat }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
