<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Buku Besar</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { background-color: #f2f2f2; text-align: center; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Laporan Buku Besar</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bukuBesar as $item)
                <tr>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y, H:i') }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td class="text-right">
                        @if ($item->debit > 0)
                            {{ number_format($item->debit, 2, ',', '.') }}
                        @endif
                    </td>
                    <td class="text-right">
                        @if ($item->kredit > 0)
                            {{ number_format($item->kredit, 2, ',', '.') }}
                        @endif
                    </td>
                    <td class="text-right">{{ number_format($item->saldo, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
