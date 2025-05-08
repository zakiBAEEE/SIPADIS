{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Disposisi</title>
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
            @foreach ($disposisis as $disposisi)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($disposisi->tanggal_disposisi)->format('d M Y') }}</td>
                    <td>{{ $disposisi->penerima->name ?? '-' }}</td>
                    <td>{{ $disposisi->catatan }}</td>
                    <td>{{ $disposisi->pengirim->name ?? '-' }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html> --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Disposisi</title>
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

</html>
