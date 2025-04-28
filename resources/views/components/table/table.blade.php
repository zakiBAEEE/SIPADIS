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
                        Aksi
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surats as $surat)
                <tr class="hover:bg-slate-50">
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->nomor_agenda }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->nomor_surat }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->pengirim }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->tanggal_terima }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->tanggal_surat }}</p>
                    </td>
                    <td class="p-3">
                        <p class="text-sm">{{ $surat->perihal }}</p>
                    </td>
                    <td class="p-3">
                        <div class="flex flex-row gap-x-1">
                            <a href="{{ route('surat.show', ['id' => $surat->id]) }}">
                                @include('components.base.ikon-mata')
                            </a>
                            <a href="">@include('components.base.ikon-edit')</a>
                            <a href="">@include('components.base.ikon-hapus')</a>

                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
