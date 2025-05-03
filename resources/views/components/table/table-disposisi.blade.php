<div
    class="relative flex flex-col w-full max-h-[400px] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border h-[400px]">
    <table class="w-full text-left table-auto text-slate-800 min-w-0">
        <thead class="border-b border-slate-200 bg-slate-100 text-sm font-medium text-slate-600 dark:bg-slate-900">
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
            </tr>
        </thead>
        <tbody class="group text-sm text-slate-800 dark:text-white">
            @forelse ($disposisis as $disposisi)
                <tr class="even:bg-slate-100 dark:even:bg-slate-900">
                    <td class="p-3">
                        {{ \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->translatedFormat('d F Y') }}
                    </td>
                    <td class="p-3">
                        {{ $disposisi->dari_user_id }}
                    </td>
                    <td class="p-3">
                        {{ $disposisi->catatan }}
                    </td>
                    <td class="p-3">
                        {{ $disposisi->ke_user_id }}
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
