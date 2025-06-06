<div
    class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border h-[400px]">
    <table class="w-full text-left table-auto text-slate-800 min-w-0">
        <thead class="border-b border-slate-200 bg-slate-100 text-sm font-medium text-slate-600">
            <tr>
                <th class="px-2.5 py-2 text-start font-bold">
                    Tanggal
                </th>
                <th class="px-2.5 py-2 text-start font-bold">
                    Disposisi Dari
                </th>
                <th class="px-2.5 py-2 text-start font-bold">
                    Instruksi
                </th>
                <th class="px-2.5 py-2 text-start font-bold">
                    Tujuan Disposisi
                </th>
                <th class="px-2.5 py-2 text-start font-bold">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class="group text-sm text-slate-800">
            @forelse ($surat->disposisis as $disposisi)
                <tr class="even:bg-slate-100">
                    <td class="p-3">
                        {{ \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->translatedFormat('d F Y') }}
                    </td>
                    <td class="p-3">
                        @if ($disposisi->pengirim && $disposisi->pengirim->divisi)
                            {{ $disposisi->pengirim->divisi->nama_divisi }}
                        @else
                            {{ $disposisi->pengirim->role->name ?? '-' }}
                        @endif
                    </td>
                    <td class="p-3">
                        {{ $disposisi->catatan }}
                    </td>
                    <td class="p-3">
                        @if ($disposisi->penerima && $disposisi->penerima->divisi)
                            {{ $disposisi->penerima->divisi->nama_divisi }}
                        @else
                            {{ $disposisi->penerima->role->name ?? '-' }}
                        @endif
                    </td>
                    <td class="p-3">
                        <div class="flex flex-row gap-x-1">
                            <a href="">
                                @include('components.base.ikon-edit')
                            </a>
                            <form method="POST" action="" class="inline-block ml-4"
                                onsubmit="return confirm('PENTING: Menghapus surat ini akan menghapus seluruh data disposisi terkait. Apakah Anda yakin ingin melanjutkan?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    @include('components.base.ikon-hapus')
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-3">Belum ada disposisi.</td>
                </tr>
            @endforelse
        </tbody>


    </table>
</div>
