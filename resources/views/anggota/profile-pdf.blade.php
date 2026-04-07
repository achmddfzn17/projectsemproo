<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile {{ $anggota->nama }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #3B82F6;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #3B82F6;
            margin: 0;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            background: #3B82F6;
            color: white;
            padding: 10px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .info-item {
            padding: 10px;
            background: #F3F4F6;
            border-left: 3px solid #3B82F6;
        }
        .info-label {
            font-size: 12px;
            color: #6B7280;
            margin-bottom: 5px;
        }
        .info-value {
            font-weight: bold;
            color: #1F2937;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 2px solid #E5E7EB;
            color: #6B7280;
            font-size: 12px;
        }
        .badge {
            display: inline-block;
            padding: 5px 15px;
            background: #10B981;
            color: white;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>PROFILE ANGGOTA</h1>
        <p>Karang Taruna Generasi Emas</p>
        <p><span class="badge">{{ strtoupper($anggota->status) }}</span></p>
    </div>

    <div class="section">
        <div class="section-title">INFORMASI PRIBADI</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Nama Lengkap</div>
                <div class="info-value">{{ $anggota->nama }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">NIK</div>
                <div class="info-value">{{ $anggota->nik }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Tempat, Tanggal Lahir</div>
                <div class="info-value">{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir->format('d M Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Umur</div>
                <div class="info-value">{{ $anggota->umur }} Tahun</div>
            </div>
            <div class="info-item">
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value">{{ $anggota->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Status Keanggotaan</div>
                <div class="info-value">{{ ucfirst($anggota->status) }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">KONTAK</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $anggota->email }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">No. HP</div>
                <div class="info-value">{{ $anggota->no_hp }}</div>
            </div>
            <div class="info-item" style="grid-column: 1 / -1;">
                <div class="info-label">Alamat</div>
                <div class="info-value">{{ $anggota->alamat }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">PENDIDIKAN & PEKERJAAN</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Pendidikan Terakhir</div>
                <div class="info-value">{{ $anggota->pendidikan_terakhir }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Pekerjaan</div>
                <div class="info-value">{{ $anggota->pekerjaan }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">INFORMASI KEANGGOTAAN</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Member ID</div>
                <div class="info-value">#{{ str_pad($anggota->id, 6, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Bergabung Sejak</div>
                <div class="info-value">{{ $anggota->created_at->format('d M Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Lama Bergabung</div>
                <div class="info-value">{{ $anggota->created_at->diffInDays(now()) }} Hari</div>
            </div>
            <div class="info-item">
                <div class="info-label">Terakhir Update</div>
                <div class="info-value">{{ $anggota->updated_at->format('d M Y H:i') }}</div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p><strong>Karang Taruna Generasi Emas</strong></p>
        <p>Dokumen ini digenerate otomatis pada {{ date('d M Y H:i') }}</p>
        <p>© {{ date('Y') }} Karang Taruna. All rights reserved.</p>
    </div>
</body>
</html>
