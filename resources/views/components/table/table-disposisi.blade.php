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

                    {{-- PENGIRIM --}}
                    <td class="p-3">
                        {{ $disposisi->dariRole->name ?? '-' }}
                    </td>

                    {{-- CATATAN --}}
                    <td class="p-3">
                        {{ $disposisi->catatan ?? '-' }}
                    </td>

                    {{-- PENERIMA --}}
                    <td class="p-3">
                        @switch(class_basename($disposisi->penerima_type))
                            @case('Divisi')
                                {{ $disposisi->penerima->nama_divisi ?? '-' }}
                            @break

                            @case('Role')
                                {{ $disposisi->penerima->name ?? '-' }}
                            @break

                            @default
                                -
                        @endswitch
                    </td>

                    {{-- AKSI --}}
                    <td class="p-3">
                        <div class="flex flex-row gap-x-3 items-center">

                            {{-- Tombol edit --}}
                            <button type="button" class="js-edit-disposisi-btn text-yellow-600 hover:text-yellow-900"
                                data-update-url="{{ route('disposisi.update', $disposisi->id) }}"
                                data-tanggal="{{ \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->format('Y-m-d') }}"
                                data-penerima="{{ class_basename($disposisi->penerima_type) . ':' . $disposisi->penerima_id }}"
                                data-catatan="{{ $disposisi->catatan }}">
                                @include('components.base.ikon-edit')
                            </button>

                            {{-- Tombol hapus --}}
                            <form method="POST" action="{{ route('disposisi.destroy', $disposisi->id) }}"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus disposisi ini?');">
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
                        <td colspan="5" class="text-center p-3">Belum ada disposisi.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    @include('components.layout.modal-edit-disposisi', ['users' => $daftarPelakuDisposisi])
