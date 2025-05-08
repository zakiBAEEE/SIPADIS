{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Disposisi</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body onload="window.print()" class="text-xs font-sans min-h-screen p-4">

    <!-- Header / Kop -->
    <div class="border-b-2 border-black pb-2 mb-4 flex items-center">
        <img src="{{ asset('storage/' . $lembaga->logo) }}" alt="Logo" class="w-20 h-auto mr-4">
        <div class="flex-1 text-center">
            <h3 class="text-base font-bold m-0">{{ $lembaga->nama_kementerian }}</h3>
            <h4 class="text-sm font-semibold m-0">{{ $lembaga->nama_lembaga }}</h4>
            <p class="m-0">{{ $lembaga->alamat }}</p>
            <p class="m-0">Telepon: {{ $lembaga->telepon }}</p>
            <p class="m-0">Email: {{ $lembaga->email }}</p>
        </div>
    </div>

    <!-- Judul -->
    <div class="text-center font-bold text-lg mb-2">LEMBAR DISPOSISI</div>

    <!-- Checkbox Group -->
    <div class="flex justify-center gap-4 mb-4">
        <label class="border border-black px-2 py-1">☐ RAHASIA</label>
        <label class="border border-black px-2 py-1">☐ PENTING</label>
        <label class="border border-black px-2 py-1">☐ SEGERA</label>
        <label class="border border-black px-2 py-1">☐ RUTIN</label>
    </div>

    <!-- Informasi Surat -->
    <div class="border border-black p-3 mb-4">
        <table class="w-full table-fixed">
            <tr>
                <td class="w-1/4 font-semibold">No. Agenda</td>
                <td class="w-1/4">: {{ $surat->nomor_agenda }}</td>
                <td class="w-1/4 font-semibold">Tanggal Diterima</td>
                <td class="w-1/4">: {{ \Carbon\Carbon::parse($surat->tanggal_terima)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td class="font-semibold">Perihal</td>
                <td colspan="3">: {{ $surat->perihal }}</td>
            </tr>
            <tr>
                <td class="font-semibold">Tanggal Surat</td>
                <td>: {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</td>
                <td class="font-semibold">Nomor Surat</td>
                <td>: {{ $surat->nomor_surat }}</td>
            </tr>
            <tr>
                <td class="font-semibold">Pengirim</td>
                <td colspan="3">: {{ $surat->pengirim }}</td>
            </tr>
        </table>
    </div>

    <!-- Tabel Disposisi -->
    <div class="flex flex-col grow min-h-[400px]">
        <table class="w-full border border-black border-collapse table-fixed flex-grow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-2 py-1 text-left w-[15%]">TGL TERIMA</th>
                    <th class="border border-black px-2 py-1 text-left w-[15%]">KEPADA</th>
                    <th class="border border-black px-2 py-1 text-left w-[40%]">HAL/INSTRUKSI/INFORMASI</th>
                    <th class="border border-black px-2 py-1 text-left w-[20%]">DISPOSISI DARI</th>
                    <th class="border border-black px-2 py-1 text-left w-[10%]">PARAF</th>
                </tr>
            </thead>
            <tbody class="min-h-[300px] align-top">
                @forelse ($disposisis as $disposisi)
                    <tr>
                        <td class="border border-black px-2 py-1">
                            {{ \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->format('d M Y') }}</td>
                        <td class="border border-black px-2 py-1">{{ $disposisi->penerima->name ?? '-' }}</td>
                        <td class="border border-black px-2 py-1">{{ $disposisi->catatan }}</td>
                        <td class="border border-black px-2 py-1">{{ $disposisi->pengirim->name ?? '-' }}</td>
                        <td class="border border-black px-2 py-1"></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-black text-center py-10 text-gray-500">Belum ada data
                            disposisi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html> --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Disposisi</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body onload="window.print()" class="text-xs font-sans min-h-screen p-4">

    <!-- Kop Surat -->
    <div class="border-b-2 border-black pb-2 mb-4 flex items-start gap-2">
        <img src="{{ asset('storage/' . $lembaga->logo) }}" alt="Logo" class="w-20 h-auto">
        <div class="flex-1 text-center leading-tight">
            <h3 class="text-base font-bold">{{ $lembaga->nama_kementerian }}</h3>
            <h4 class="text-sm font-semibold">{{ $lembaga->nama_lembaga }}</h4>
            <p class="m-0">{{ $lembaga->alamat }}</p>
            <p class="m-0">Telepon: {{ $lembaga->telepon }}</p>
            <p class="m-0">Email: {{ $lembaga->email }}</p>
        </div>
    </div>

    <!-- Judul -->
    <div class="text-center font-bold text-lg mb-2">LEMBAR DISPOSISI</div>

    <!-- Checkbox -->
    <div class="flex justify-center gap-4 mb-4">
        <label class="border border-black px-2 py-1">☐ RAHASIA</label>
        <label class="border border-black px-2 py-1">☐ PENTING</label>
        <label class="border border-black px-2 py-1">☐ SEGERA</label>
        <label class="border border-black px-2 py-1">☐ RUTIN</label>
    </div>

    <!-- Metadata Surat -->
    <div class="border border-black p-3 mb-4">
        <table class="w-full table-fixed">
            <tr>
                <td class="w-1/4 font-bold">No. Agenda</td>
                <td class="w-1/4">: {{ $surat->nomor_agenda }}</td>
                <td class="w-1/4 font-bold">Tanggal Diterima</td>
                <td class="w-1/4">: {{ \Carbon\Carbon::parse($surat->tanggal_terima)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td class="font-bold">Perihal</td>
                <td colspan="3">: {{ $surat->perihal }}</td>
            </tr>
            <tr>
                <td class="font-bold">Tanggal Surat</td>
                <td>: {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</td>
                <td class="font-bold">Nomor Surat</td>
                <td>: {{ $surat->nomor_surat }}</td>
            </tr>
            <tr>
                <td class="font-bold">Pengirim</td>
                <td colspan="3">: {{ $surat->pengirim }}</td>
            </tr>
        </table>
    </div>

    <!-- Tabel Disposisi -->
    <div class="flex flex-col min-h-[500px]">
        <table class="w-full border border-black border-collapse table-fixed">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-2 py-2 text-left w-[15%]">TGL TERIMA</th>
                    <th class="border border-black px-2 py-2 text-left w-[15%]">KEPADA</th>
                    <th class="border border-black px-2 py-2 text-left w-[40%]">HAL/INSTRUKSI/INFORMASI</th>
                    <th class="border border-black px-2 py-2 text-left w-[20%]">DISPOSISI DARI</th>
                    <th class="border border-black px-2 py-2 text-left w-[10%]">PARAF</th>
                </tr>
            </thead>
            <tbody>
                @php $rowsFilled = 0; @endphp

                @foreach ($disposisis as $disposisi)
                    @php $rowsFilled++; @endphp
                    <tr class="align-top">
                        <td class="border border-black px-2 py-1">
                            {{ \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->format('d M Y') }}
                        </td>
                        <td class="border border-black px-2 py-2">
                            @if ($disposisi->penerima && $disposisi->penerima->divisi)
                                {{ $disposisi->penerima->divisi->nama_divisi }}
                            @else
                                {{ $disposisi->penerima->role->name ?? '-' }}
                            @endif
                        </td>
                        <td class="border border-black px-2 py-2">{{ $disposisi->catatan }}</td>
                        <td class="border border-black px-2 py-2">
                            @if ($disposisi->pengirim && $disposisi->pengirim->divisi)
                                {{ $disposisi->pengirim->divisi->nama_divisi }}
                            @else
                                {{ $disposisi->pengirim->role->name ?? '-' }}
                            @endif
                        </td>
                        <td class="border border-black px-2 py-2"></td>
                    </tr>
                @endforeach

                @for ($i = $rowsFilled; $i < 12; $i++)
                    <tr class="align-top h-[28px]">
                        <td class="border border-black px-2 py-2">&nbsp;</td>
                        <td class="border border-black px-2 py-2"></td>
                        <td class="border border-black px-2 py-2"></td>
                        <td class="border border-black px-2 py-2"></td>
                        <td class="border border-black px-2 py-2"></td>
                    </tr>
                @endfor
            </tbody>

        </table>
    </div>

</body>

</html>
