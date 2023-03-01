<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laporan Periode {{ ucfirst($month) }} {{ $year }}</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tfoot td {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .text-light {
            color: #fff;
        }

        .table-responsive {
            overflow-x: auto;
        }

    </style>   
</head>
<body>
    <p style="font-size: 8pt">Merlyn Mansion</p>
    <h2 class="text-center" style="margin-bottom: 10px;">Laporan Pemasukan & Pengeluaran</h2>
    <h3 class="text-center" style="margin-top: 0px; margin-bottom: 50px;">Periode {{ Carbon\Carbon::parse($month)->format('M') }} {{ Carbon\Carbon::parse($year)->format('y') }}</h3>
    
    <div class="table-responsive">
        <table class="table table-hover table-borderless">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Tgl</th>
                <th scope="col">Keterangan</th>
                <th scope="col" class="text-end">Pemasukan</th>
                <th scope="col" class="text-end">Pengeluaran</th>
            </tr>
            </thead>
            <tbody>
                @if (isset($dates))
                    @if ($total_quantity != $saldo)
                        <tr>
                            <td>1</td>
                            <td>01-{{ Carbon\Carbon::parse($month)->format('M') }}-{{ Carbon\Carbon::parse($year)->format('y') }}</td>
                            <td>Saldo Awal</td>
                            <td class="text-end">{{ number_format($previous_saldo, 2, '.', ',') }}</td>
                            <td class="text-end"></td>
                        </tr>
                    @endif

                    @foreach ($dates as $date)
                        <tr>
                            @if ($total_quantity != $saldo)
                                <td>{{ $loop->iteration + 1 }}</td>
                            @else
                                <td>{{ $loop->iteration }}</td>
                            @endif
                            <td>{{ Carbon\Carbon::parse($date->transaction_date)->format('d-M-y') }}</td>
                            <td>{{ $date->description }}</td>

                            @if ($date->status == 'Masuk')
                                <td class="text-end">{{ number_format($date->quantity, 2, '.', ',') }}</td>
                                <td class="text-end"></td>
                            @elseif ($date->status == 'Keluar')
                                <td class="text-end"></td>
                                <td class="text-end">{{ number_format($date->quantity, 2, '.', ',') }}</td>
                            @endif
                            
                        </tr>
                    @endforeach
                    
                @else
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data.</td>
                    </tr>
                @endif
            </tbody>
            @if (isset($dates))
                <tfoot>
                    <tr>
                        <td colspan="3" class="fw-bold text-end">Total</td>
                        <td class="fw-bold text-end">{{ number_format($revenue, 2, '.', ',') }}</td>
                        <td class="fw-bold text-end">{{ number_format($expense, 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="fw-bold text-end">Saldo Akhir</td>
                        <td colspan="2" class="fw-bold text-end">{{ number_format($saldo, 2, '.', ',') }}</td>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
</body>
</html>
