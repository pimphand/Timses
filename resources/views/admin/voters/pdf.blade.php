<!DOCTYPE html>
<html>
<head>
    <title>Expense Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        .table_tr1 {
            background-color: rgb(224, 224, 224);
        }

        .table_tr1 td {
            padding: 7px 0px 7px 8px;
            font-weight: bold;
        }

        .table_tr2 td {
            padding: 7px 0px 7px 8px;
            border: 1px solid black;
        }
    </style>
</head>
<body style="min-width: 100%; min-height: 100%; overflow: hidden; alignment-adjust: central;">
<br/>
<div style="width: 100%; border-bottom: 2px solid black;">
    <table style="width: 100%; vertical-align: middle;">
        <tr>

            <td style="width: 35px;">
                <img style="width: 50px;height: 50px"
                     src="https://snippets-code.com/uploads/logo/logo_5ba4f5f44804c.png" alt="" class="img-circle"/>
            </td>
            <td>
                <p style="margin-left: 10px; font: 14px lighter;">Aplikasi Manajemen Data Kampanye</p>
            </td>


        </tr>
    </table>
</div>
<br/>
<div style="width: 100%;">
    <div style="width: 100%; background-color: rgb(224, 224, 224); padding: 1px 0px 5px 15px;">
        <table style="width: 100%;">
            <tr style="font-size: 20px;  text-align: center">
                <td style="padding: 10px;">Daftar Pemilih</td>
            </tr>
        </table>
    </div>
    <br/>
    <table style="width: 100%; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;">
        <tr class="table_tr1">
            <td style="border: 1px solid black;">No</td>
            <td style="border: 1px solid black;">Nama</td>
            <td style="border: 1px solid black;">Foto KTP</td>
            <td style="border: 1px solid black;">HP</td>
            <td style="border: 1px solid black;">Alamat</td>

        </tr>
        @php
            $no = 1;
        @endphp

        @if (!empty($ambildata))
            @foreach ($ambildata as $report)
                <tr class="table_tr2">
                    <td>{{ $no }}</td>
                    <td>{{ $report->namadpt }}</td>
                    <td>
                        <img src="{{ asset('assets/ktppemilihupload/' . $report->ktppemilih) }}" width="150px"
                             height="110"/>
                    </td>
                    <td>{{ $report->tlppemilih }}</td>
                    <td>
                        Kel: {{ $report->namakelurahan }} - Kec: {{ $report->namakecamatan }} -
                        Kab: {{ $report->namakabupaten }} - Prov: {{ $report->namaprovinsi }}
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        @else
            <tr>
                <td colspan="5">
                    <strong>Belum Ada Pemilih</strong>
                </td>
            </tr>
        @endif
    </table>
</div>
</body>
</html>
