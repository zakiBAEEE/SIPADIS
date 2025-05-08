{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Disposisi</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
        }

        .kop {
            border-bottom: 2px solid black;
            padding-bottom: 5px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .kop img {
            width: 80px;
            height: auto;
            margin-right: 15px;
        }

        .kop-text {
            flex: 1;
            text-align: center;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            margin: 10px 0;
            font-size: 20px;
        }

        .kotak-atas {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 10px;
        }

        .kotak-atas table {
            width: 100%;
            border-collapse: collapse;
        }

        .kotak-atas td {
            padding: 4px;
            vertical-align: top;
        }

        .tabel-disposisi {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .tabel-disposisi th,
        .tabel-disposisi td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
        }

        .checkbox-group {
            display: flex;
            gap: 10px;
            margin: 10px 0;
        }

        .checkbox-group label {
            display: inline-block;
            border: 1px solid black;
            padding: 4px 8px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="kop">
        <img src="{{ asset('storage/' . $lembaga->logo) }}" alt="Preview Dokumen" class="max-w-full h-auto border rounded">
        <div class="kop-text">
            <h3 style="margin: 0;">{{ $lembaga->nama_kementerian }}</h3>
            <h4 style="margin: 0;">{{ $lembaga->nama_lembaga }}</h4>
            <p style="margin: 0;">{{ $lembaga->alamat }}</p>
            <p style="margin: 0;">Telepon : {{ $lembaga->telepon }}</p>
            <p style="margin: 0;">Email : {{ $lembaga->email }}</p>
        </div>
    </div>

    <div class="judul">LEMBAR DISPOSISI</div>

    <div class="checkbox-group flex flex-row justify-center">
        <label>☐ RAHASIA</label>
        <label>☐ PENTING</label>
        <label>☐ SEGERA</label>
        <label>☐ RUTIN</label>
    </div>

    <div class="kotak-atas">
        <table>
            <tr>
                <td><strong>No. Agenda</strong></td>
                <td>: {{ $surat->nomor_agenda }}</td>
                <td><strong>Tanggal Diterima</strong></td>
                <td>: {{ \Carbon\Carbon::parse($surat->tanggal_terima)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td><strong>Perihal</strong></td>
                <td colspan="3">: {{ $surat->perihal }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Surat</strong></td>
                <td>: {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</td>
                <td><strong>Nomor Surat</strong></td>
                <td>: {{ $surat->nomor_surat }}</td>
            </tr>
            <tr>
                <td><strong>Pengirim</strong></td>
                <td colspan="3">: {{ $surat->pengirim }}</td>
            </tr>
        </table>
    </div>

    <table class="tabel-disposisi">
        <thead>
            <tr>
                <th>TGL TERIMA</th>
                <th>KEPADA</th>
                <th>HAL/INSTRUKSI/INFORMASI</th>
                <th>DISPOSISI DARI</th>
                <th>PARAF</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($disposisis as $disposisi)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->format('d M Y') }}</td>
                    <td>{{ $disposisi->penerima->name ?? '-' }}</td>
                    <td>{{ $disposisi->catatan }}</td>
                    <td>{{ $disposisi->pengirim->name ?? '-' }}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td style="text-align: center;" colspan="5">Belum ada data disposisi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

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

</html>
