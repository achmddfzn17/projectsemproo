<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Absensi - {{ $kegiatan->nama_kegiatan }}</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #3B82F6; padding-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #3B82F6; color: white; font-weight: bold; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .hadir { color: green; font-weight: bold; }
        .belum { color: red; }
    </style>
</head>
<body>
    <div class="header">
        <h1>DAFTAR HADIR KEGIATAN</h1>
        <h2>{{ $kegiatan->nama_kegiatan }}</h2>
        <p>{{ $kegiatan->tanggal_mulai->format('d F Y') }} | {{ $kegiatan->lokasi }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 25%;">Nama Lengkap</th>
                <th style="width: 20%;">Email</th>
                <th style="width: 15%;">No. HP</th>
                <th style="width: 15%;">Instansi</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 10%;">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaran as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->instansi ?? '-' }}</td>
                <td>
                    @if($item->hadir)
                    <span class="hadir">✓ HADIR</span><br>
                    <small>{{ $item->waktu_hadir->format('H:i') }}</small>
                    @else
                    <span class="belum">-</span>
                    @endif
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 40px;">
        <p><strong>Total Peserta:</strong> {{ $pendaftaran->count() }} orang</p>
        <p><strong>Hadir:</strong> {{ $pendaftaran->where('hadir', true)->count() }} orang</p>
        <p><strong>Tidak Hadir:</strong> {{ $pendaftaran->where('hadir', false)->count() }} orang</p>
    </div>

    <div style="margin-top: 60px; text-align: right;">
        <p>Dicetak pada: {{ now()->format('d F Y H:i') }}</p>
    </div>
</body>
</html>
