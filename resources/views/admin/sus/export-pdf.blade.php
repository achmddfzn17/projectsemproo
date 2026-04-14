<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Hasil Kuisioner SUS - {{ date('Y-m-d') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            padding: 25px;
            font-size: 11px;
            color: #1f2937;
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #3B82F6;
        }
        .header h1 {
            font-size: 20px;
            color: #1e40af;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .header h2 {
            font-size: 14px;
            color: #4b5563;
            font-weight: normal;
            margin-bottom: 3px;
        }
        .header p {
            font-size: 10px;
            color: #6b7280;
        }
        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 15px;
        }
        .summary-card {
            flex: 1;
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border: 1px solid #bfdbfe;
            border-radius: 8px;
            padding: 12px 15px;
            text-align: center;
        }
        .summary-card h3 {
            font-size: 9px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        .summary-card .value {
            font-size: 22px;
            font-weight: bold;
            color: #1e40af;
        }
        .summary-card .label {
            font-size: 9px;
            color: #6b7280;
            margin-top: 2px;
        }
        .kategori-section {
            margin-bottom: 20px;
        }
        .kategori-section h3 {
            font-size: 13px;
            color: #1f2937;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid #e5e7eb;
        }
        .kategori-grid {
            display: table;
            width: 100%;
        }
        .kategori-item {
            display: table-cell;
            width: 20%;
            text-align: center;
            padding: 10px;
            border: 1px solid #e5e7eb;
        }
        .kategori-item.excellent { background-color: #dcfce7; border-color: #86efac; }
        .kategori-item.good { background-color: #dbeafe; border-color: #93c5fd; }
        .kategori-item.average { background-color: #fef9c3; border-color: #fde047; }
        .kategori-item.poor { background-color: #fed7aa; border-color: #fb923c; }
        .kategori-item.worst { background-color: #fecaca; border-color: #f87171; }
        .kategori-item .grade {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 3px;
        }
        .kategori-item .label {
            font-size: 8px;
            color: #6b7280;
        }
        .kategori-item .count {
            font-size: 14px;
            font-weight: bold;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 9px;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 6px 8px;
            text-align: left;
            vertical-align: middle;
        }
        th {
            background-color: #1e40af;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
        tr:hover {
            background-color: #eff6ff;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .score-high {
            color: #16a34a;
            font-weight: bold;
        }
        .score-medium {
            color: #ca8a04;
            font-weight: bold;
        }
        .score-low {
            color: #dc2626;
            font-weight: bold;
        }
        .grade-badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: bold;
        }
        .grade-A { background-color: #dcfce7; color: #166534; }
        .grade-B { background-color: #dbeafe; color: #1e40af; }
        .grade-C { background-color: #fef9c3; color: #854d0e; }
        .grade-D { background-color: #fed7aa; color: #9a3412; }
        .grade-F { background-color: #fecaca; color: #991b1b; }
        .footer {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            font-size: 9px;
            color: #6b7280;
            text-align: right;
        }
        .page-break {
            page-break-after: always;
        }
        .questions-table th:nth-child(n+3):nth-child(-n+12) {
            text-align: center;
            width: 50px;
        }
        .questions-table td:nth-child(n+3):nth-child(-n+12) {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>Laporan Hasil Kuisioner SUS</h1>
        <h2>System Usability Scale</h2>
        <p>Karang Taruna | {{ now()->format('d F Y, H:i') }}</p>
    </div>

    <!-- Summary Cards -->
    <div class="summary">
        <div class="summary-card">
            <h3>Total Responden</h3>
            <div class="value">{{ $totalResponden }}</div>
            <div class="label">Orang</div>
        </div>
        <div class="summary-card">
            <h3>Rata-rata Skor SUS</h3>
            <div class="value">{{ $rataRataSkor }}</div>
            <div class="label">Dari skala 0-100</div>
        </div>
        <div class="summary-card">
            <h3>Kelayakan</h3>
            <div class="value">
                @if($rataRataSkor >= 68)
                    <span style="color: #16a34a;">Layak</span>
                @else
                    <span style="color: #dc2626;">Perlu Perbaikan</span>
                @endif
            </div>
            <div class="label">Threshold: 68</div>
        </div>
    </div>

    <!-- Kategori Breakdown -->
    <div class="kategori-section">
        <h3>Distribusi Kategori</h3>
        <div class="kategori-grid">
            <div class="kategori-item excellent">
                <div class="grade">A</div>
                <div class="label">Excellent</div>
                <div class="count">{{ $kategoriCount['A - Excellent'] }}</div>
            </div>
            <div class="kategori-item good">
                <div class="grade">B</div>
                <div class="label">Good</div>
                <div class="count">{{ $kategoriCount['B - Good'] }}</div>
            </div>
            <div class="kategori-item average">
                <div class="grade">C</div>
                <div class="label">Average</div>
                <div class="count">{{ $kategoriCount['C - Average'] }}</div>
            </div>
            <div class="kategori-item poor">
                <div class="grade">D</div>
                <div class="label">Poor</div>
                <div class="count">{{ $kategoriCount['D - Poor'] }}</div>
            </div>
            <div class="kategori-item worst">
                <div class="grade">F</div>
                <div class="label">Worst</div>
                <div class="count">{{ $kategoriCount['F - Worst'] }}</div>
            </div>
        </div>
    </div>

    <!-- Detail Responden -->
    <h3 style="font-size: 13px; color: #1f2937; margin-top: 20px; margin-bottom: 10px; padding-bottom: 5px; border-bottom: 2px solid #e5e7eb;">
        Detail Responden
    </h3>
    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 4%;">No</th>
                <th style="width: 15%;">Nama</th>
                <th style="width: 12%;">Email</th>
                <th style="width: 6%;" class="text-center">Usia</th>
                <th style="width: 10%;">Pendidikan</th>
                <th style="width: 12%;">Pengalaman</th>
                <th style="width: 6%;" class="text-center">Q1</th>
                <th style="width: 6%;" class="text-center">Q2</th>
                <th style="width: 6%;" class="text-center">Q3</th>
                <th style="width: 6%;" class="text-center">Q4</th>
                <th style="width: 6%;" class="text-center">Q5</th>
                <th style="width: 6%;" class="text-center">Q6</th>
                <th style="width: 6%;" class="text-center">Q7</th>
                <th style="width: 6%;" class="text-center">Q8</th>
                <th style="width: 6%;" class="text-center">Q9</th>
                <th style="width: 6%;" class="text-center">Q10</th>
                <th style="width: 7%;" class="text-center">Skor SUS</th>
                <th style="width: 8%;" class="text-center">Grade</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hasilSus as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td class="text-center">{{ $item->usia }}</td>
                <td>{{ $item->pendidikan }}</td>
                <td>{{ $item->pengalaman_komputer }}</td>
                <td class="text-center">{{ $item->q1 }}</td>
                <td class="text-center">{{ $item->q2 }}</td>
                <td class="text-center">{{ $item->q3 }}</td>
                <td class="text-center">{{ $item->q4 }}</td>
                <td class="text-center">{{ $item->q5 }}</td>
                <td class="text-center">{{ $item->q6 }}</td>
                <td class="text-center">{{ $item->q7 }}</td>
                <td class="text-center">{{ $item->q8 }}</td>
                <td class="text-center">{{ $item->q9 }}</td>
                <td class="text-center">{{ $item->q10 }}</td>
                <td class="text-center">
                    <strong class="{{ $item->sus_score >= 68 ? 'score-high' : ($item->sus_score >= 51 ? 'score-medium' : 'score-low') }}">
                        {{ number_format($item->sus_score, 1) }}
                    </strong>
                </td>
                <td class="text-center">
                    @php
                        $grade = '';
                        $gradeClass = '';
                        if ($item->sus_score >= 80.3) { $grade = 'A'; $gradeClass = 'grade-A'; }
                        elseif ($item->sus_score >= 68) { $grade = 'B'; $gradeClass = 'grade-B'; }
                        elseif ($item->sus_score == 68) { $grade = 'C'; $gradeClass = 'grade-C'; }
                        elseif ($item->sus_score >= 51) { $grade = 'D'; $gradeClass = 'grade-D'; }
                        else { $grade = 'F'; $gradeClass = 'grade-F'; }
                    @endphp
                    <span class="grade-badge {{ $gradeClass }}">{{ $grade }}</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="18" class="text-center" style="padding: 30px;">
                    <em>Belum ada data responden</em>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d F Y, H:i:s') }} WIB</p>
        <p style="margin-top: 3px;">Generated by Sistem Informasi Karang Taruna</p>
    </div>
</body>
</html>
