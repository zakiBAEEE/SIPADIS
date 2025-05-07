<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Disposisi</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .kop {
            text-align: center;
            border-bottom: 2px solid black;
            margin-bottom: 20px;
        }

        .content {
            margin: 20px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="kop-surat">
        <h2>{{ $lembaga->nama_lembaga }}</h2>
        <p>{{ $lembaga->alamat }} | Telp: {{ $lembaga->telepon }}</p>
    </div>

    <h3>LEMBAR DISPOSISI</h3>
    <p><strong>No. Surat:</strong> {{ $surat->nomor_surat }}</p>
    <p><strong>Perihal:</strong> {{ $surat->perihal }}</p>

    @foreach ($disposisis as $disposisi)
        <hr>
        <p><strong>Dari:</strong> {{ $disposisi->pengirim->name ?? '-' }}</p>
        <p><strong>Kepada:</strong> {{ $disposisi->penerima->name ?? '-' }}</p>
        <p><strong>Isi Disposisi:</strong> {{ $disposisi->catatan }}</p>
        <p><strong>Tanggal Disposisi:</strong> {{ $disposisi->tanggal_disposisi }}</p>
    @endforeach


</body>

</html>
