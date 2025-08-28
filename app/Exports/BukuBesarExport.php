namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuBesarExport implements FromCollection, WithHeadings
{
    protected $bulan;

    public function __construct($bulan = null)
    {
        $this->bulan = $bulan;
    }

    public function collection()
    {
        $query = Transaksi::with('kategori')
            ->when($this->bulan, function ($q) {
                $q->whereMonth('created_at', $this->bulan);
            })
            ->get();

        return $query->map(function ($item) {
            return [
                $item->created_at->format('d-m-Y'),
                $item->jenis_transaksi,
                $item->kategori->nama_kategori ?? '-',
                $item->jumlah,
                $item->total,
                $item->total_laba,
                $item->status ?? '-',
                $item->keterangan ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return ['Tanggal', 'Jenis Transaksi', 'Kategori', 'Jumlah', 'Total', 'Saldo Saat Ini', 'Status', 'Keterangan'];
    }
}
