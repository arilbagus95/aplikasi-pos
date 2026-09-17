<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; color: #1f2937; }
        .header { display: flex; justify-content: space-between; align-items: center; gap: 16px; }
        .statistics { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin: 20px 0; }
        .statistic { padding: 16px; background: #f3f4f6; border-radius: 6px; }
        .statistic-label { display: block; color: #6b7280; font-size: 14px; margin-bottom: 8px; }
        .statistic-value { font-size: 20px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #d1d5db; padding: 10px; text-align: left; }
        th { background: #f3f4f6; }
        .empty { text-align: center; color: #6b7280; }
        a { color: #2563eb; text-decoration: none; }
        @media (max-width: 700px) { .statistics { grid-template-columns: repeat(2, 1fr); } }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Penjualan</h1>
        <a href="{{ url('/') }}">Kembali ke Dashboard</a>
    </div>

    <div class="statistics">
        @foreach ($statistik as $item)
            <div class="statistic">
                <span class="statistic-label">{{ $item['barang'] }}</span>
                <span class="statistic-value">{{ $item['nilai'] }}</span>
            </div>
        @endforeach
    </div>

    <table>
        <thead>
            <tr>
                <th>Indikator</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistik as $item)
                <tr>
                    <td>{{ $item['barang'] }}</td>
                    <td>{{ $item['nilai'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
