<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan {{$title}} - Kios {{$kios}}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .center, h2 {
            font-family: arial, sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Keuangan {{$title}}<br>Kios {{$kios}}</h2>
    <table>
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width>Transaksi</th>
                <th width="20%">Debit</th>
                <th width="20%">Kredit</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td class="center">1</td>
            <td>Saldo Awal</td>
            <td>
                @if (count($kas_banks)>0)
                    @if ($kas_banks[0]->jenis == "PK")
                        Rp {{number_format($kas_banks[0]->sisa-$kas_banks[0]->jumlah,0,",",".")}}
                    @else
                        Rp {{number_format($kas_banks[0]->sisa+$kas_banks[0]->jumlah,0,",",".")}}
                    @endif
                @else
                    Rp 0
                @endif
            </td>
            <td></td>
        </tr>
        @foreach ($kas_banks as $kas_bank)
            <tr>
                <td class="center">{{$loop->iteration+1}}</td>
                @switch($kas_bank->jenis)
                    @case("CO")
                        <td>Cash Opname</td>
                        <td></td>
                        <td>Rp {{number_format($kas_bank->jumlah,0,",",".")}}</td>
                        @break
                    @case("PK")
                        <td>Pengisian Kas</td>
                        <td>Rp {{number_format($kas_bank->jumlah,0,",",".")}}</td>
                        <td></td>
                        @break
                    @case("P")
                        <td>Pencairan a.n {{$kas_bank->order->konsumen->nama}}</td>
                        <td></td>
                        <td>Rp {{number_format($kas_bank->jumlah,0,",",".")}}</td>
                        @break
                @endswitch
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td><b>Saldo Akhir</b></td>
            <td>
                <b>
                    @if (count($kas_banks)>0)
                        Rp {{number_format($kas_banks[count($kas_banks)-1]->sisa,0,",",".")}}
                    @else
                        Rp 0
                    @endif
                </b>
            </td>
        </tr>
        </tbody>
    </table>
</body>
</html>