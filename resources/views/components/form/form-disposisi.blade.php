<div class="px-4 py-2">
    <div class="flex flex-row gap-3">
        <div class="mb-4 space-y-1.5 w-1/3">
            @include('components.base.datepicker', [
                'label' => 'Tanggal Disposisi',
                'placeholder' => 'Pilih Tanggal Disposisi',
                'id' => 'tanggal_disposisi',
                'name' => 'tanggal_disposisi',
            ])
        </div>
        <div class="mb-4 space-y-1.5 w-1/3">
            @include('components.base.dropdown', [
                'label' => 'Disposisi Dari',
                'value' => ['Kepala', 'KBU', 'HEHE'],
                'name' => 'dari_user_id',
            ])
        </div>
        <div class="mb-4 space-y-1.5 w-1/3">
            @include('components.base.dropdown', [
                'label' => 'Tujuan Disposisi',
                'value' => ['Kepala', 'KBU', 'HEHE'],
                'name' => 'ke_user_id',
            ])
        </div>
    </div>
    <div class="space-y-1.5 mb-4">
        @include('components.base.input-surat', [
            'label' => 'Instruksi',
            'placeholder' => 'Masukkan Instruksi Disposisi',
            'name' => 'catatan',
        ])
    </div>
    <div></div>
</div>
