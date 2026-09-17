<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk POS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .img-thumb { width: 60px; height: 60px; object-fit: cover; border-radius: 4px; }
        .header { display: flex; justify-content: space-between; align-items: center; }
        a { text-decoration: none; color: #2563eb; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Daftar Produk POS Toko</h2>
        <a href="{{ url('/') }}">Kembali ke Dashboard</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>SKU</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['sku'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>
                        <img src="{{ asset($item['foto']) }}"
                             alt="{{ $item['nama'] }}"
                             class="img-thumb">
                    </td>
                    <td>{{ $item['stok'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
