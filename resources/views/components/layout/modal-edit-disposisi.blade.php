<div class="fixed antialiased inset-0 bg-slate-950/50 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
    id="modalEditDisposisi" aria-hidden="true">
    <div class="bg-white rounded-lg w-10/12 md:w-8/12 lg:w-6/12 transition-transform duration-300 ease-out scale-100">
        <div class="p-4 pb-2 flex justify-between items-center">
            <h1 class="text-lg text-slate-800 font-semibold">Edit Disposisi</h1>
            <button type="button" data-dismiss="modal" aria-label="Close" class="... (tombol close modal)">
                <svg ...></svg>
            </button>
        </div>

        <form id="formEditDisposisi" action="" method="POST">
            @csrf
            @method('PUT')
            <div class="p-4 flex flex-col gap-4">
                {{-- Beri ID unik pada setiap input --}}
                <div class="flex flex-row gap-4">
                    <div class="w-1/2">
                        <label for="edit_tanggal_disposisi" class="block text-gray-700 font-medium mb-2">Tanggal
                            Disposisi</label>
                        <input type="date" name="tanggal_disposisi" id="edit_tanggal_disposisi"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="w-1/2">
                        <label for="edit_ke_user_id" class="block text-gray-700 font-medium mb-2">Tujuan
                            Disposisi</label>
                        <select name="ke_user_id" id="edit_ke_user_id" class="w-full px-4 py-2 border rounded-lg">
                            @foreach ($users as $user)
                                <option value="{{ $user['value'] }}">{{ $user['display'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label for="edit_catatan" class="block text-gray-700 font-medium mb-2">Instruksi</label>
                    <textarea name="catatan" id="edit_catatan" rows="3" class="w-full px-4 py-2 border rounded-lg"></textarea>
                </div>
            </div>
            <div class="p-4 flex justify-end gap-2">
                <button type="button" data-dismiss="modal" class="...">Batal</button>
                <button type="submit" class="...">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
