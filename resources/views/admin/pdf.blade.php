<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Event Pertandingan Olahraga</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            font-size: 11pt;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #4f46e5;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            color: #4f46e5;
            font-size: 18pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 10pt;
        }

        .student-info {
            margin-bottom: 20px;
            font-size: 10pt;
            background-color: #f8fafc;
            padding: 10px 15px;
            border-radius: 6px;
            border-left: 4px solid #4f46e5;
        }

        .student-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .student-info td {
            padding: 3px 0;
        }

        .report-title {
            text-align: center;
            font-size: 13pt;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table.data-table th, table.data-table td {
            border: 1px solid #cbd5e1;
            padding: 10px 8px;
            text-align: left;
            font-size: 9.5pt;
        }

        table.data-table th {
            background-color: #f1f5f9;
            color: #1e293b;
            font-weight: bold;
        }

        table.data-table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: right;
            font-size: 8pt;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 5px;
        }

        .sign-area {
            margin-top: 50px;
            float: right;
            width: 200px;
            text-align: center;
            font-size: 10pt;
        }

        .sign-space {
            height: 70px;
        }
    </style>
</head>
<body>

    <!-- Header / Kop Surat -->
    <div class="header">
        <h2>Portal Event Olahraga</h2>
        <p>Sistem Informasi &amp; Manajemen Data Event Pertandingan Olahraga</p>
        <p style="font-size: 9pt;">Alamat: Jl. Raya Puspiptek, Kota Tangerang Selatan, Banten</p>
    </div>

    <!-- Student and Meta Info -->
    <div class="student-info">
        <table>
            <tr>
                <td style="width: 20%; font-weight: bold;">Mata Kuliah</td>
                <td style="width: 45%;">: Pemrograman Web (UAS)</td>
                <td style="width: 15%; font-weight: bold;">Tanggal Cetak</td>
                <td style="width: 20%;">: {{ date('d-m-Y') }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Nama Mahasiswa</td>
                <td>: Andreansyah</td>
                <td style="font-weight: bold;">NIM</td>
                <td>: 241011750024</td>
            </tr>
        </table>
    </div>

    <div class="report-title">
        Laporan Data Event Pertandingan Olahraga
    </div>

    <!-- Data Table -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%; text-align: center;">No</th>
                <th style="width: 15%; text-align: center;">ID Event</th>
                <th style="width: 30%;">Nama Event</th>
                <th style="width: 15%;">Tanggal</th>
                <th style="width: 15%;">Tempat</th>
                <th style="width: 20%;">Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemains as $index => $pemain)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td style="text-align: center; font-weight: bold;">E{{ str_pad($pemain->id_event, 3, '0', STR_PAD_LEFT) }}</td>
                    <td style="font-weight: bold; color: #4f46e5;">{{ $pemain->nama_event }}</td>
                    <td style="white-space: nowrap;">{{ \Carbon\Carbon::parse($pemain->tanggal)->translatedFormat('d-m-Y') }}</td>
                    <td>{{ $pemain->tempat }}</td>
                    <td>{{ $pemain->penanggung_jawab }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #666; padding: 20px;">Belum ada data event pertandingan olahraga yang terdaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Signature Area -->
    <div class="sign-area">
        <p>Tangerang Selatan, {{ date('d F Y') }}</p>
        <p>Mengetahui,</p>
        <p style="font-weight: bold; margin-top: 5px;">Penanggung Jawab Sistem</p>
        <div class="sign-space"></div>
        <p style="text-decoration: underline; font-weight: bold;">Andreansyah</p>
        <p style="font-size: 8pt; color: #666;">NIM. 241011750024</p>
    </div>

    <!-- Page Footer -->
    <div class="footer">
        Halaman 1 dari 1 | Cetak Otomatis via Portal Event Olahraga
    </div>

</body>
</html>
