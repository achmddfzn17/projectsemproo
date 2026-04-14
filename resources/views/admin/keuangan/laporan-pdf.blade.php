<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - {{ $tanggalAwal }} s/d {{ $tanggalAkhir }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #1e40af;
        }
        .header h1 {
            font-size: 18px;
            color: #1e40af;
            margin-bottom: 5px;
        }
        .header h2 {
            font-size: 14px;
            color: #333;
            font-weight: normal;
        }
        .header p {
            font-size: 10px;
            color: #666;
        }
        .info-box {
            margin-bottom: 20px;
            padding: 10px;
            background: #f3f4f6;
            border-radius: 5px;
        }
        .info-box table {
            width: 100%;
        }
        .info-box td {
            padding: 3px 0;
        }
        .info-box .label {
            font-weight: bold;
            width: 150px;
        }
        .summary {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        .summary-box {
            display: table-cell;
            width: 33%;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            margin-right: 10px;
        }
        .summary-box.masuk {
            background: #dcfce7;
            border: 1px solid #86efac;
        }
        .summary-box.keluar {
            background: #fee2e2;
            border: 1px solid #fca5a5;
        }
        .summary-box.saldo {
            background: #dbeafe;
            border: 1px solid #93c5fd;
        }
        .summary-box .amount {
            font-size: 14px;
            font-weight: bold;
            margin-top: 5px;
        }
        .summary-box.masuk .amount { color: #166534; }
        .summary-box.keluar .amount { color: #991b1b; }
        .summary-box.saldo .amount { color: #1e40af; }
        h3 {
            font-size: 13px;
            color: #1e40af;
            margin: 20px 0 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e5e7eb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table th {
            background: #1e40af;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 10px;
        }
        table td {
            padding: 6px 8px;
            border-bottom: 1px solid #e5e7eb;
        }
        table tr:nth-child(even) {
            background: #f9fafb;
        }
        table .text-right {
            text-align: right;
        }
        table .text-center {
            text-align: center;
        }
        .total-row {
            font-weight: bold;
            background: #e5e7eb !important;
        }
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            font-size: 9px;
            color: #666;
            text-align: center;
        }
        .signature {
            margin-top: 40px;
            width: 100%;
        }
        .signature td {
            text-align: center;
            padding: 0 20px;
        }
        .signature .line {
            margin-top: 50px;
            border-top: 1px solid #333;
            padding-top: 5px;
        }
        @media print {
            body { font-size: 10px; }
            .page-break { page-break-before: always; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN KEUANGAN</h1>
        <h2>Karang Taruna "Generasi Emas"</h2>
        <p>Periode: {{ \Carbon\Carbon::parse($tanggalAwal)->format('d F Y') }} - {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d F Y') }}</p>
    </div>

    <div class="info-box">
        <table>
            <tr>
                <td class="label">Tanggal Cetak</td>
                <td>: {{ now()->format('d F Y, H:i') }} WIB</td>
            </tr>
            <tr>
                <td class="label">Dicetak Oleh</td>
                <td>: {{ auth()->user()->name ?? 'Administrator' }}</td>
            </tr>
        </table>
    </div>

    <div class="summary">
        <div class="summary-box masuk">
            <div>Total Kas Masuk</div>
            <div class="amount">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</div>
        </div>
        <div class="summary-box keluar">
            <div>Total Kas Keluar</div>
            <div class="amount">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</div>
        </div>
        <div class="summary-box saldo">
            <div>Saldo Periode</div>
            <div class="amount">Rp {{ number_format($saldo, 0, ',', '.') }}</div>
        </div>
    </div>

    <h3>📥 Rincian Kas Masuk</h3>
    <table>
        <thead>
            <tr>
                <th width="15%">Tanggal</th>
                <th width="25%">Kategori</th>
                <th width="35%">Keterangan</th>
                <th width="25%">Sumber</th>
                <th class="text-right">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kasMasuk as $item)
            <tr>
                <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->sumber_dana ?? '-' }}</td>
                <td class="text-right">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada transaksi kas masuk</td>
            </tr>
            @endforelse
            <tr class="total-row">
                <td colspan="4">TOTAL KAS MASUK</td>
                <td class="text-right">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <h3>📤 Rincian Kas Keluar</h3>
    <table>
        <thead>
            <tr>
                <th width="15%">Tanggal</th>
                <th width="25%">Kategori</th>
                <th width="30%">Keterangan</th>
                <th width="15%">Penerima</th>
                <th class="text-right">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kasKeluar as $item)
            <tr>
                <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->penerima ?? '-' }}</td>
                <td class="text-right">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada transaksi kas keluar</td>
            </tr>
            @endforelse
            <tr class="total-row">
                <td colspan="4">TOTAL KAS KELUAR</td>
                <td class="text-right">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <h3>📊 Rekapitulasi</h3>
    <table>
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th class="text-right">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Kas Masuk</td>
                <td class="text-right">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Kas Keluar</td>
                <td class="text-right">(Rp {{ number_format($totalKeluar, 0, ',', '.') }})</td>
            </tr>
            <tr class="total-row" style="background: #dbeafe !important;">
                <td><strong>SALDO PERIODE</strong></td>
                <td class="text-right"><strong>Rp {{ number_format($saldo, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <table class="signature">
        <tr>
            <td width="50%">
                <div class="line">
                    Mengetahui,<br>
                    Ketua Karang Taruna
                </div>
            </td>
            <td width="50%">
                <div class="line">
                    {{ now()->format('d F Y') }}<br>
                    Bendahara
                </div>
            </td>
        </tr>
    </table>

    <div class="footer">
        <p>Sistem Informasi Manajemen Karang Taruna "Generasi Emas" | Dicetak secara otomatis</p>
    </div>
</body>
</html>
