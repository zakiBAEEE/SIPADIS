 <div class="px-4 py-1">
     <div class="flex flex-row gap-3">
         <div class="mb-4 space-y-1.5 w-1/2">
             @include('components.base.input-surat', [
                 'label' => 'Nomor Surat',
                 'placeholder' => 'Masukkan Nomor Surat',
                 'name'=>"nomor_surat"
             ])
         </div>
         <div class="mb-4 space-y-1.5 w-1/3">
             @include('components.base.datepicker', [
                 'label' => 'Tanggal Surat',
                 'placeholder' => 'Pilih Tanggal Surat',
                 'id' => 'tanggal_surat',
                 'name' => 'tanggal_surat',
             ])
         </div>
         <div class="mb-4 space-y-1.5 w-1/3">
             @include('components.base.datepicker', [
                 'label' => 'Tanggal Terima',
                 'placeholder' => 'Pilih Tanggal Terima',
                 'id' => 'tanggal_terima',
                 'name' => 'tanggal_terima',
             ])
         </div>
     </div>
     <div class="flex flex-row gap-3 items-center">
         <div class="mb-4 space-y-1.5 w-1/2">
             @include('components.base.input-surat', [
                 'label' => 'Pengirim',
                 'placeholder' => 'Masukkan Pengirim Surat',
                 'name' => 'pengirim',
             ])
         </div>
         <div class="mb-4 space-y-1.5 w-1/3">
             @include('components.base.dropdown', [
                 'label' => 'Klasifikasi',
                 'value' => ['Umum', 'Pengaduan', 'Permintaan Informasi'],
                 'name' => 'klasifikasi_surat',
             ])
         </div>
         <div class="mb-4 space-y-1.5 w-1/3">
             @include('components.base.dropdown', [
                 'label' => 'Sifat',
                 'value' => ['Rahasia', 'Penting', 'Segera', 'Rutin'],
                 'name' => 'sifat',
             ])
         </div>
     </div>
     <div class="space-y-1.5 mb-4">
         @include('components.base.input-surat', [
             'label' => 'Perihal',
             'placeholder' => 'Masukkan Perihal Surat',
             'name' => 'perihal',
         ])
     </div>
 </div>
