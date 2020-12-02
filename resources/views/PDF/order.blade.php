<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Order {{$bulan," ", $tahun}}</title>
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
    <h2>Laporan Order {{$bulan," ", $tahun}}</h2>
    <table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th width="1%">No</th>
            <th width="15%">No Kontrak</th>
            <th>MCE</th>
            <th>Konsumen</th>
            <th width="1%">Telepon</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
        <tr>
            <td class="center">{{$loop->iteration}}</td>
            <td>{{$order->no_kontrak ? $order->no_kontrak : "-"}}</td>
            <td>{{$order->user->nama}}</td>
            <td>{{$order->konsumen->nama}}</td>
            <td>{{$order->konsumen->telp}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>