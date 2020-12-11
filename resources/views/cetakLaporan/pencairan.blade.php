<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Penagihan</title>
    <style>
        body {
            font-family: arial, sans-serif;
        }

        table {
            width: 100%;
        }

        td, th {
            padding: 8px;
        }

        .center {
            text-align: center;
        }
        .page_break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <h3 align="center">Kwitansi Penagihan</h3>
    <table>
        <tr>
            <td width="23%">No</td>
            <td width="1%">:</td>
            <td>{{$order->id}}</td>
        </tr>
        <tr>
            <td>Sudah Terima Dari</td>
            <td width="1%">:</td>
            <td>FIFGROUP</td>
        </tr>
        <tr>
            <td>Banyaknya Uang</td>
            <td width="1%">:</td>
            <td>{{strtoupper($terbilang)}} RUPIAH</td>
        </tr>
        <tr>
            <td>Untuk Pembayaran</td>
            <td width="1%">:</td>
            <td>Pembiayaan Kredit</td>
        </tr>
        <tr>
            <td>Atas Nama</td>
            <td width="1%">:</td>
            <td>{{strtoupper($order->konsumen->nama)}}</td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td width="1%">:</td>
            <td>Rp {{number_format($order->pinjaman_disetujui,0,",",".")}}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td width="65%"></td>
            <td align="center">{{now()->format("d-m-Y")}}</td>
        </tr>
        <tr>
            <td width="65%"></td>
            <td height="50px"></td>
        </tr>
        <tr>
            <td width="65%"></td>
            <td align="center">({{Auth::user()->nama}})</td>
        </tr>
    </table>
    <br><br><hr><br><br>
    <h3 align="center">Tanda Terima Dana</h3>
    <table>
        <tr>
            <td width="23%">No</td>
            <td width="1%">:</td>
            <td>{{$order->id}}</td>
        </tr>
        <tr>
            <td>Sudah Terima Dari</td>
            <td width="1%">:</td>
            <td>Bersama Makmur Raharja</td>
        </tr>
        <tr>
            <td>Banyaknya Uang</td>
            <td width="1%">:</td>
            <td>{{strtoupper($terbilang)}} RUPIAH</td>
        </tr>
        <tr>
            <td>Untuk Pembayaran</td>
            <td width="1%">:</td>
            <td>Pembiayaan Kredit atas nama {{strtoupper($order->konsumen->nama)}}</td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td width="1%">:</td>
            <td>Rp {{number_format($order->pinjaman_disetujui,0,",",".")}}</td>
        </tr> 
    </table>
    <table>
        <tr>
            <td width="65%"></td>
            <td align="center">{{now()->format("d-m-Y")}}</td>
        </tr>
        <tr>
            <td width="65%"></td>
            <td height="50px"></td>
        </tr>
        <tr>
            <td width="65%"></td>
            <td align="center">({{$order->konsumen->nama}})</td>
        </tr>
    </table>
    <div class="page_break"></div>
    <h3 align="center">Surat Kuasa</h3>
    <table style="width:75%;text-align:justify;" align="center">
        <tr>
            <td>
                Menunjuk pada Perjanjian Pembiayaan bertandatangan di bawah ini : 
	            PT BERSAMA MAKMUR RAHARJA berkedudukan di KIOS {{strtoupper(Auth::user()->kios->nama)}} beralamat di {{strtoupper(Auth::user()->kios->alamat)}}    
                yang dalam hal ini diwakili oleh {{strtoupper(Auth::user()->nama)}} dalam jabatannya selaku ADMIN karenanya sah yang bertindak untuk dan atas nama
                PT BERSAMA MAKMUR RAHARJA selanjutnya disebut Pemberi Kuasa menerangkan dengan ini memberi kuasa kepada : {{strtoupper($order->konsumen->nama)}},
                lahir di {{strtoupper($order->konsumen->tmptlahir)}} pada tanggal {{date('d-m-Y', strtotime($order->tgllahir))}} bertempat tinggal di
                {{strtoupper($order->konsumen->alamatktp)}} pemegang KARTU TANDA PENDUDUK dengan Nomor Induk Kependudukan {{$order->konsumen->nik}} Warga Negara Indonesia 
	            selanjutnya disebut Penerima Kuasa.
            </td>
        </tr>
        <tr>
            <td><h3 align="center" style="margin-top:30px">Khusus</h3></td>
        </tr>
        <tr>
            <td>
                Untuk bertindak mewakili dan atas nama Pemberi Kuasa tersebut dalam melakukan perbuatan-perbuatan sebagai berikut :
	            Membeli barang dan/atau jasa sesuai dengan spesifikasi dan nilai sebagaimana tercantum dalam dokumen pembiayaan :
                <ol type="a">
                    <li>Melakukan pemeriksaan atas kondisi barang/jasa yang diterima dari pemasok barang dengan baik, termasuk surat-surat dan/atau dokumen-dokumen yang berkaitan dengan pembelian barang/jasa tersebut;</li>
                    <li>Melakukan pembayaran kepada pemasok sesuai dengan prosedur dan aturan yang disepakati bersama anatar Penerima Kuasa dengan pemasok;</li>
                    <li>Menerima surat-surat dan/atau dokumen-dokumen yang berkaitan dengan pembelian barang dari pemasok;</li>
                    <li>Menandatangani segala bentuk dokumen dan atau perjanjian yang diperlukan untuk kepentingan tersebut dengan senantiasa tetap memperhatikan peraturan perundang-undangan yang berlaku dan ketentuan-ketentuan dalam Perjanjian Pembiayaan. Surat kuasa ini dibuat dengan sebenarnya dan berlaku efetif terhitung sejak ditandatangani dan berakhir demi hukum setelah tindakan yang dikuasakan dalam. Surat Kuasa ini selesai dilaksanakan.</li>
                </ol>  
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td align="center">Pemberi Kuasa,</td>
            <td width="15%"></td>
            <td align="center">Penerima Kuasa,</td>
        </tr>
        <tr>
            <td></td>
            <td width="15%"></td>
            <td height="50px"></td>
        </tr>
        <tr>
            <td align="center">({{strtoupper(Auth::user()->nama)}})</td>
            <td width="15%"></td>
            <td align="center">({{strtoupper($order->konsumen->nama)}})</td>
        </tr>
    </table>
    <div class="page_break"></div>
    <h3 align="center">Surat Kuasa</h3>
    <table style="width:75%;text-align:justify;" align="center">
        <tr>
            <td>
                Menunjuk pada Perjanjian Pembiayaan bertandatangan di bawah ini : 
                {{strtoupper($order->konsumen->nama)}},
                lahir di {{strtoupper($order->konsumen->tmptlahir)}} pada tanggal {{date('d-m-Y', strtotime($order->tgllahir))}} bertempat tinggal di
                {{strtoupper($order->konsumen->alamatktp)}} pemegang KARTU TANDA PENDUDUK dengan Nomor Induk Kependudukan {{$order->konsumen->nik}} Warga Negara Indonesia 
	            selanjutnya disebut Pemberi Kuasa menerangkan dengan ini memberi kuasa kepada : 
                PT BERSAMA MAKMUR RAHARJA berkedudukan di KIOS {{strtoupper(Auth::user()->kios->nama)}} beralamat di {{strtoupper(Auth::user()->kios->alamat)}}    
                yang dalam hal ini diwakili oleh {{strtoupper(Auth::user()->nama)}} dalam jabatannya selaku ADMIN karenanya sah yang bertindak untuk dan atas nama
                PT BERSAMA MAKMUR RAHARJA
	            selanjutnya disebut Penerima Kuasa.
            </td>
        </tr>
        <tr>
            <td><h3 align="center" style="margin-top:30px">Khusus</h3></td>
        </tr>
        <tr>
            <td>
                Untuk bertindak mewakili dan atas nama Pemberi Kuasa tersebut dalam melakukan perbuatan-perbuatan sebagai berikut :
	            Membeli barang dan/atau jasa sesuai dengan spesifikasi dan nilai sebagaimana tercantum dalam dokumen pembiayaan :
                <ol type="a">
                    <li>Melakukan pemeriksaan atas kondisi barang/jasa yang diterima dari pemasok barang dengan baik, termasuk surat-surat dan/atau dokumen-dokumen yang berkaitan dengan pembelian barang/jasa tersebut;</li>
                    <li>Melakukan pembayaran kepada pemasok sesuai dengan prosedur dan aturan yang disepakati bersama anatar Penerima Kuasa dengan pemasok;</li>
                    <li>Menerima surat-surat dan/atau dokumen-dokumen yang berkaitan dengan pembelian barang dari pemasok;</li>
                    <li>Menandatangani segala bentuk dokumen dan atau perjanjian yang diperlukan untuk kepentingan tersebut dengan senantiasa tetap memperhatikan peraturan perundang-undangan yang berlaku dan ketentuan-ketentuan dalam Perjanjian Pembiayaan. Surat kuasa ini dibuat dengan sebenarnya dan berlaku efetif terhitung sejak ditandatangani dan berakhir demi hukum setelah tindakan yang dikuasakan dalam. Surat Kuasa ini selesai dilaksanakan.</li>
                </ol>  
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td align="center">Pemberi Kuasa,</td>
            <td width="15%"></td>
            <td align="center">Penerima Kuasa,</td>
        </tr>
        <tr>
            <td></td>
            <td width="15%"></td>
            <td height="50px"></td>
        </tr>
        <tr>
            <td align="center">({{strtoupper($order->konsumen->nama)}})</td>
            <td width="15%"></td>
            <td align="center">({{strtoupper(Auth::user()->nama)}})</td>
        </tr>
    </table>
</body>
</html>